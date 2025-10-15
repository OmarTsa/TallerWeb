<?php
session_start();
$email_ingresado = $_POST['email'];
$password_ingresada = $_POST['password'];
$archivo_usuarios = 'usuarios.json';
$usuarios = json_decode(file_get_contents($archivo_usuarios), true);
$credenciales_correctas = false;

foreach ($usuarios as $usuario) {
    if ($usuario['email'] === $email_ingresado && $usuario['password'] === $password_ingresada) {
        $credenciales_correctas = true;
        break;
    }
}

if ($credenciales_correctas) {
    $_SESSION['usuario'] = $email_ingresado;
    header('Location: index.php');
    exit();
} else {
    header('Location: login.php');
    exit();
}
?>