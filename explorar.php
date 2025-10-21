<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit();
}
$json_data = file_get_contents('peliculas.json');
$peliculas_data = json_decode($json_data, true);
$todas_las_peliculas = array_merge(isset($peliculas_data['mi_lista']) ? $peliculas_data['mi_lista'] : [], isset($peliculas_data['tendencias']) ? $peliculas_data['tendencias'] : []);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explorar - Clon de Netflix</title>
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
    
    <main class="explore-container">
        <h1>Explorar Catálogo</h1>
        <div class="movie-grid">
            <?php if (!empty($todas_las_peliculas)): ?>
                <?php foreach ($todas_las_peliculas as $pelicula): ?>
                    <div class="movie-item">
                        <img src="<?= htmlspecialchars($pelicula['poster_url']) ?>" alt="<?= htmlspecialchars($pelicula['titulo']) ?>">
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                 <p>No hay películas para mostrar.</p>
            <?php endif; ?>
        </div>
    </main>

    <footer class="main-footer">
        <div class="footer-links">
            <a href="#">Preguntas frecuentes</a><a href="#">Centro de ayuda</a><a href="#">Términos de uso</a><a href="#">Privacidad</a>
        </div>
        <p class="copyright">&copy; <?= date("Y") ?> Mi Netflix Clon. Todos los derechos reservados.</p>
    </footer>

</body>
</html>

