<?php
session_start();

// Obtenemos los datos del formulario de login
$email_ingresado = $_POST['email'];
$password_ingresada = $_POST['password'];

// Ruta a nuestro archivo de usuarios
$archivo_usuarios = 'usuarios.json';
$usuarios = json_decode(file_get_contents($archivo_usuarios), true);

// Variable para verificar si encontramos una coincidencia
$credenciales_correctas = false;

// Recorremos la lista de usuarios guardados
foreach ($usuarios as $usuario) {
    // Verificamos si el email y la contraseña coinciden
    if ($usuario['email'] === $email_ingresado && $usuario['password'] === $password_ingresada) {
        $credenciales_correctas = true;
        break; // Si encontramos al usuario, no necesitamos seguir buscando
    }
}

// Verificamos el resultado de la búsqueda
if ($credenciales_correctas) {
    // Si son correctos, guardamos el email en la sesión
    $_SESSION['usuario'] = $email_ingresado;
    
    // Redirigimos al usuario a la página principal
    header('Location: index.php');
    exit();
} else {
    // Si son incorrectos, lo devolvemos a la página de login
    header('Location: login.php');
    exit();
}
?>