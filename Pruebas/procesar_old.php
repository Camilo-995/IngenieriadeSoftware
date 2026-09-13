<?php
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: formulario.html");
    exit;
}

$nombre = trim($_POST["nombre"] ?? "");
$email = trim($_POST["email"] ?? "");
$asunto = trim($_POST["asunto"] ?? "");
$mensaje = trim($_POST["mensaje"] ?? "");

if ($nombre === "" || $email === "" || $asunto === "" || $mensaje === "") {
    die("Todos los campos son obligatorios.");
}

// if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
//     die("El email ingresado no es válido.");
// }

// if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
//     header("Location: formulario.html?error=email_invalido");
//     exit;
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
