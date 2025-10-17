<?php
session_start();

$email_ingresado = $_POST['email'];
$password_ingresada = $_POST['password'];

$archivo_usuarios = 'usuarios.json';
// Verificar si el archivo existe antes de leerlo
$usuarios = file_exists($archivo_usuarios) ? json_decode(file_get_contents($archivo_usuarios), true) : [];

$credenciales_correctas = false;

if (is_array($usuarios)) {
    foreach ($usuarios as $usuario) {
        // Verificar si las claves 'email' y 'password' existen antes de usarlas
        if (isset($usuario['email']) && isset($usuario['password'])) {
            if ($usuario['email'] === $email_ingresado) {
                 // Usar password_verify para contraseñas hasheadas
                if (password_verify($password_ingresada, $usuario['password'])) {
                    $credenciales_correctas = true;
                    break; 
                }
            }
        }
    }
}

if ($credenciales_correctas) {
    $_SESSION['usuario'] = $email_ingresado;
    unset($_SESSION['error_login']); 
    header('Location: index.php');
    exit();
} else {
    $_SESSION['error_login'] = "Email o contraseña incorrectos.";
    header('Location: login.php');
    exit();
}
?>