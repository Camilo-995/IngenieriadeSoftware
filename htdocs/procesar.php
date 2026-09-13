<?php
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: formulario.php");
    exit;
}

$nombre = trim($_POST["nombre"] ?? "");
$email = trim($_POST["email"] ?? "");
$asunto = trim($_POST["asunto"] ?? "");
$mensaje = trim($_POST["mensaje"] ?? "");

// Función auxiliar para redirigir enviando los datos de regreso al formulario
function redirigirConError($tipoError, $nombre, $email, $asunto, $mensaje) {
    $params = http_build_query([
        'error' => $tipoError,
        'nombre' => $nombre,
        'email' => $email,
        'asunto' => $asunto,
        'mensaje' => $mensaje
    ]);
    header("Location: formulario.php?" . $params);
    exit;
}

if ($nombre === "" || $email === "" || $asunto === "" || $mensaje === "") {
    redirigirConError("campos_vacios", $nombre, $email, $asunto, $mensaje);
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    redirigirConError("email_invalido", $nombre, $email, $asunto, $mensaje);
}

// CÓDIGO TEMPORAL DE PRUEBA:
// if ($asunto === "error") {
//     redirigirConError("email_invalido", $nombre, $email, $asunto, $mensaje);
// }

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensaje recibido</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <main class="contenedor resultado">
        <h1>Mensaje recibido</h1>
        <p>Gracias, <strong><?= htmlspecialchars($nombre) ?></strong>.</p>
        <p>Hemos recibido correctamente tu mensaje.</p>

        <div class="resumen">
            <p><strong>Email:</strong> <?= htmlspecialchars($email) ?></p>
            <p><strong>Asunto:</strong> <?= htmlspecialchars($asunto) ?></p>
            <p><strong>Mensaje:</strong></p>
            <p><?= nl2br(htmlspecialchars($mensaje)) ?></p>
        </div>

        <a class="boton" href="index.html">Volver al inicio</a>
    </main>
</body>
</html>