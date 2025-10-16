<?php
$email_nuevo = $_POST['email'];
$password_nuevo = $_POST['password'];
if (empty($email_nuevo) || empty($password_nuevo)) {
    header('Location: registro.php');
    exit();
}
$archivo_usuarios = 'usuarios.json';
$usuarios_actuales = json_decode(file_get_contents($archivo_usuarios), true);
$nuevo_usuario = [
    "email" => $email_nuevo,
    "password" => password_hash($password_nuevo, PASSWORD_DEFAULT)
];
$usuarios_actuales[] = $nuevo_usuario;
$json_actualizado = json_encode($usuarios_actuales, JSON_PRETTY_PRINT);
file_put_contents($archivo_usuarios, $json_actualizado);
header('Location: login.php');
exit();
?>