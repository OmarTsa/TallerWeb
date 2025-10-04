<?php
// Iniciamos la sesión para poder guardar variables que persistan entre páginas
session_start();

// Simulación de un usuario y contraseña correctos
$usuario_correcto = "alumno@utp.edu.pe";
$password_correcto = "12345";

// Obtenemos los datos del formulario de login.php
$email_ingresado = $_POST['email'];
$password_ingresada = $_POST['password'];

// Verificamos si el usuario y la contraseña son correctos
if ($email_ingresado === $usuario_correcto && $password_ingresada === $password_correcto) {
    
    // Si son correctos, guardamos el email en una variable de sesión
    $_SESSION['usuario'] = $email_ingresado;
    
    // Redirigimos al usuario a la página principal
    header('Location: index.php');
    exit();
    
} else {
    // Si son incorrectos, lo redirigimos de vuelta al login
    header('Location: login.php');
    exit();
    
    // 
    
    //
}
?>