<?php
/**
 * PRUEBA AUTOMATIZADA (integracion) - procesar.php
 * Envia datos a procesar.php como se haria el formulario y revisa la respuesta.
 *
 * Uso:  php test_procesar.php [URL_DE_PROCESAR]
 * Ej.:  php test_procesar.php http://localhost:8000/procesar.php
 */
$url = $argv[1] ?? "http://localhost:8000/procesar.php";

// Envia un POST SIN seguir redirecciones, para poder ver el codigo 302 y el Location.
function enviar(string $url, array $datos, string $metodo = "POST"): array
{
    $ctx = stream_context_create(["http" => [
        "method"          => $metodo,
        "header"          => "Content-Type: application/x-www-form-urlencoded\r\n",
        "content"         => $metodo === "POST" ? http_build_query($datos) : "",
        "follow_location" => 0,
        "ignore_errors"   => true,
    ]]);
    $cuerpo = @file_get_contents($url, false, $ctx);
    if ($cuerpo === false && empty($http_response_header)) {
        echo "ERROR: no se pudo conectar a $url\n";
        echo "Enciende primero el servidor: php -S localhost:8000 -t htdocs\n";
        exit(2);
    }
    $codigo = (int) substr($http_response_header[0], 9, 3);
    $location = "";
    foreach ($http_response_header as $h) {
        if (stripos($h, "Location:") === 0) {
            $location = $h;
        }
    }
    return [$codigo, $location, (string) $cuerpo];
}

function verificar(string $nombre, bool $condicion, string $obtenido): bool
{
    echo ($condicion ? "OK     " : "FALLA  ") . $nombre . "\n";
    echo "         Obtenido: $obtenido\n";
    return $condicion;
}

echo "Probando: $url\n\n";
$todo = true;

// Prueba B: el HTML que escribe el usuario se muestra como texto (no se ejecuta)
[$c, $l, $b] = enviar($url, [
    "nombre" => "Ana", "email" => "ana@lasalle.edu.co",
    "asunto" => "Seguridad", "mensaje" => "<script>alert(1)</script>",
]);
$todo = verificar("B. El <script> del usuario aparece escapado",
    str_contains($b, "&lt;script&gt;") && !str_contains($b, "<script>alert(1)"),
    "HTTP $c") && $todo;

// Prueba C: un correo sin extension (test@d) debe ser rechazado por el servidor
[$c, $l, $b] = enviar($url, [
    "nombre" => "Ana", "email" => "test@d",
    "asunto" => "Prueba", "mensaje" => "Hola",
]);
$todo = verificar("C. El correo test@d es rechazado (302 + email_invalido)",
    $c === 302 && str_contains($l, "error=email_invalido"),
    $c === 200 ? "HTTP 200 (el servidor lo ACEPTO y mostro la confirmacion)" : "HTTP $c " . substr($l, 0, 60)) && $todo;

// Prueba E: entrar a procesar.php directo (sin formulario) redirige al formulario
[$c, $l, $b] = enviar($url, [], "GET");
$todo = verificar("E. Entrar directo por GET redirige al formulario (302)",
    $c === 302 && str_contains($l, "formulario"),
    "HTTP $c $l") && $todo;

echo "\nRESULTADO FINAL: " . ($todo ? "APROBADO" : "FALLIDO") . "\n";
exit($todo ? 0 : 1);
