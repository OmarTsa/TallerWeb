<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regístrate - Clon de Netflix</title>
    <link rel="stylesheet" href="Estilo.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>
<body class="login-body">

    <div class="login-container">
        <h1>Regístrate</h1>

         <?php
        session_start(); 
        if (isset($_SESSION['error_registro'])) {
            echo '<p class="error-message">' . htmlspecialchars($_SESSION['error_registro']) . '</p>';
            unset($_SESSION['error_registro']); 
        }
        ?>

        <form action="procesar_registro.php" method="POST" class="login-form">
            <div class="form-group">
                <input type="email" name="email" placeholder="Email" required>
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="Contraseña" required>
            </div>
            <button type="submit" class="btn-submit">Crear Cuenta</button>
        </form>
        <p class="signup-link">¿Ya tienes una cuenta? <a href="login.php">Inicia sesión</a></p>
    </div>

</body>
</html>