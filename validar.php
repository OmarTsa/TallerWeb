<?php
session_start();

$email_ingresado = $_POST['email'];
$password_ingresada = $_POST['password'];

$archivo_usuarios = 'usuarios.json';
$usuarios = json_decode(file_get_contents($archivo_usuarios), true);

$credenciales_correctas = false;

// Recorremos la lista de usuarios para encontrar el email
foreach ($usuarios as $usuario) {
    // Verificamos si el email coincide
    if ($usuario['email'] === $email_ingresado) {
        // Si el email coincide, verificamos la contraseña encriptada
        if (password_verify($password_ingresada, $usuario['password'])) {
            $credenciales_correctas = true;
            break; // Usuario y contraseña correctos
        }
    }
}

if ($credenciales_correctas) {
    $_SESSION['usuario'] = $email_ingresado;
    header('Location: index.php');
    exit();
} else {
    // Si las credenciales son incorrectas, lo devolvemos al login
    header('Location: login.php');
    exit();
}
?>