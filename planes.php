<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuestros Planes - Clon de Netflix</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="Estilo.css">
</head>
<body>

    <header class="main-header">
         <nav>
            <a href="index.php" class="logo"><img src="https://upload.wikimedia.org/wikipedia/commons/7/7a/Logonetflix.png" alt="Logo de Netflix"></a>
            <ul class="nav-links">
                <li><a href="index.php">Inicio</a></li>
                <li><a href="explorar.php">Explorar</a></li>
                <li><a href="planes.php">Planes</a></li>
            </ul>
             <form action="buscar.php" method="GET" class="search-form">
                <input type="search" name="q" placeholder="Buscar títulos...">
                <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
        </nav>
        <div class="user-menu">
            <span>Bienvenido, <?= htmlspecialchars($_SESSION['usuario']) ?></span>
            <a href="logout.php" class="logout-link">Cerrar Sesión</a>
        </div>
    </header>
    
    <main class="plans-container">
        <h1>Elige el plan ideal para ti</h1>
        
        <table class="plans-table">
            <caption>Comparación de Planes de Suscripción</caption>
            <thead>
                <tr>
                    <th>Características</th>
                    <th>Básico</th>
                    <th>Estándar</th>
                    <th>Premium</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Precio mensual</td>
                    <td>S/ 24.90</td>
                    <td>S/ 34.90</td>
                    <td>S/ 44.90</td>
                </tr>
                <tr>
                    <td>Calidad de video</td>
                    <td>Buena (480p)</td>
                    <td>Mejor (1080p)</td>
                    <td>Óptima (4K+HDR)</td>
                </tr>
                <tr>
                    <td>Dispositivos a la vez</td>
                    <td>1</td>
                    <td>2</td>
                    <td>4</td>
                </tr>
                <tr>
                    <td>Descargas</td>
                    <td><i class="fa-solid fa-check"></i></td>
                    <td><i class="fa-solid fa-check"></i></td>
                    <td><i class="fa-solid fa-check"></i></td>
                </tr>
                 <tr>
                    <td>Sin anuncios</td>
                    <td><i class="fa-solid fa-check"></i></td>
                    <td><i class="fa-solid fa-check"></i></td>
                    <td><i class="fa-solid fa-check"></i></td>
                </tr>
            </tbody>
        </table>
    </main>
    
     <footer class="main-footer">
        <div class="footer-links">
            <a href="#">Preguntas frecuentes</a><a href="#">Centro de ayuda</a><a href="#">Términos de uso</a><a href="#">Privacidad</a>
        </div>
        <p class="copyright">&copy; <?= date("Y") ?> Mi Netflix Clon. Todos los derechos reservados.</p>
    </footer>

</body>
</html>