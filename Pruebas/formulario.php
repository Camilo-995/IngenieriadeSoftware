<?php
// Capturar los valores enviados de vuelta desde procesar.php (si existen)
$nombre = $_GET['nombre'] ?? '';
$email = $_GET['email'] ?? '';
$asunto = $_GET['asunto'] ?? '';
$mensaje = $_GET['mensaje'] ?? '';
$error = $_GET['error'] ?? '';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de contacto</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <header>
        <h1>Formulario de contacto</h1>
        <p>Completa los siguientes campos para enviar tu mensaje.</p>
    </header>

    <main class="contenedor">

        <!-- ALERTA DE ERROR -->
        <?php if ($error === 'email_invalido'): ?>
            <div class="alerta-error">
                El correo electrónico ingresado no es válido. Debe tener un formato correcto y una extensión (ejemplo: .com, .org, .edu).
            </div>
        <?php elseif ($error === 'campos_vacios'): ?>
            <div class="alerta-error">
                Por favor completa todos los campos del formulario.
            </div>
        <?php endif; ?>

        <form id="miFormulario" action="procesar.php" method="POST">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="<?= htmlspecialchars($nombre) ?>" required>

            <label for="email">Email:</label>
            <input 
                type="email" 
                id="email" 
                name="email" 
                value="<?= htmlspecialchars($email) ?>" 
                pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}" 
                title="Ingresa un correo válido con una extensión (ej. .com, .org)" 
                required
            >

            <label for="asunto">Asunto:</label>
            <input type="text" id="asunto" name="asunto" value="<?= htmlspecialchars($asunto) ?>" required>

            <label for="mensaje">Mensaje:</label>
            <textarea id="mensaje" name="mensaje" rows="6" required><?= htmlspecialchars($mensaje) ?></textarea>

            <button type="submit" class="boton">Enviar mensaje</button>
        </form>

        <a class="volver" href="index.html">← Volver a la página principal</a>
    </main>

    <footer>
        <p>&copy; 2026 Mi sitio web</p>
    </footer>

    <script>
        document.getElementById('miFormulario').addEventListener('submit', function(event) {
            const emailInput = document.getElementById('email').value.trim();
            const regexEmail = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

            if (!regexEmail.test(emailInput)) {
                event.preventDefault();
                alert('Por favor ingresa un correo con extensión válida (ejemplo: .com, .org, .edu).');
            }
        });
    </script>
</body>
</html>