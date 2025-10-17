<?php
session_start(); 

$email_nuevo = $_POST['email'];
$password_nuevo = $_POST['password'];

if (empty($email_nuevo) || empty($password_nuevo)) {
    $_SESSION['error_registro'] = "Por favor, completa todos los campos.";
    header('Location: registro.php');
    exit();
}

$archivo_usuarios = 'usuarios.json';
$usuarios_actuales = file_exists($archivo_usuarios) ? json_decode(file_get_contents($archivo_usuarios), true) : [];
// Asegurarse que sea un array
if (!is_array($usuarios_actuales)) {
    $usuarios_actuales = [];
}

$email_existe = false;
foreach ($usuarios_actuales as $usuario) {
    if (isset($usuario['email']) && $usuario['email'] === $email_nuevo) {
        $email_existe = true;
        break;
    }
}

if ($email_existe) {
    $_SESSION['error_registro'] = "Este email ya está registrado. Intenta iniciar sesión.";
    header('Location: registro.php');
    exit();
}

$nuevo_usuario = [
    "email" => $email_nuevo,
    "password" => password_hash($password_nuevo, PASSWORD_DEFAULT) // Hashear la contraseña
];
$usuarios_actuales[] = $nuevo_usuario;
$json_actualizado = json_encode($usuarios_actuales, JSON_PRETTY_PRINT);
file_put_contents($archivo_usuarios, $json_actualizado);

unset($_SESSION['error_registro']);
header('Location: login.php');
exit();
?>