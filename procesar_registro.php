<?php
// Obtenemos los datos del formulario de registro.php
$email_nuevo = $_POST['email'];
$password_nuevo = $_POST['password'];

// Verificamos que los datos no estén vacíos
if (empty($email_nuevo) || empty($password_nuevo)) {
    // Si algo está vacío, redirigimos de vuelta a la página de registro
    header('Location: registro.php');
    exit();
}

// Ruta a nuestro archivo de "base de datos" de usuarios
$archivo_usuarios = 'usuarios.json';

// Leemos el contenido actual del archivo JSON
$usuarios_actuales = json_decode(file_get_contents($archivo_usuarios), true);

// Creamos el nuevo usuario como un array
$nuevo_usuario = [
    "email" => $email_nuevo,
    "password" => $password_nuevo 
    // NOTA: En un proyecto real, la contraseña NUNCA se guarda en texto plano.
    // Debería encriptarse con funciones como password_hash().
];

// Añadimos el nuevo usuario al array de usuarios existentes
$usuarios_actuales[] = $nuevo_usuario;

// Convertimos el array actualizado de vuelta a formato JSON con un formato legible
$json_actualizado = json_encode($usuarios_actuales, JSON_PRETTY_PRINT);

// Sobrescribimos el archivo usuarios.json con la lista actualizada
file_put_contents($archivo_usuarios, $json_actualizado);

// Una vez registrado, redirigimos al usuario a la página de login para que inicie sesión
header('Location: login.php');
exit();
?>