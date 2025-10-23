<?php
// 1. INICIAMOS LA SESIÓN
session_start();

// 2. VERIFICAMOS SI EL USUARIO HA INICIADO SESIÓN
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit();
}

// 3. LEEMOS LOS DATOS DESDE EL ARCHIVO JSON
$json_data = file_get_contents('peliculas.json');
$peliculas = json_decode($json_data, true);

// Asignamos las películas a las variables correspondientes (con verificación por si el JSON está mal formado)
$mi_lista = isset($peliculas['mi_lista']) ? $peliculas['mi_lista'] : [];
$tendencias = isset($peliculas['tendencias']) ? $peliculas['tendencias'] : [];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clon de Netflix</title>
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
    
    <main>
        <section class="hero-section">
            <div class="hero-info">
                <h2>Película Destacada</h2>
                <p>Esta es una breve descripción de la película o serie que estamos destacando.</p>
                <button><i class="fa-solid fa-play"></i> <span>Reproducir</span></button>
                <button><i class="fa-solid fa-circle-info"></i> <span>Más Información</span></button>
            </div>
        </section>
        
        <section class="movies-row">
            <h2>Mi Lista</h2>
            <div class="carousel">
                <button class="arrow left-arrow">‹</button>
                <div class="movies-container">
                    <?php foreach ($mi_lista as $pelicula): ?>
                        <div class="movie-item"><img src="<?= htmlspecialchars($pelicula['poster_url']) ?>" alt="<?= htmlspecialchars($pelicula['titulo']) ?>"></div>
                    <?php endforeach; ?>
                </div>
                <button class="arrow right-arrow">›</button>
            </div>
        </section>

        <section class="movies-row">
            <h2>Tendencias</h2>
            <div class="carousel">
                <button class="arrow left-arrow">‹</button>
                <div class="movies-container">
                    <?php foreach ($tendencias as $pelicula): ?>
                        <div class="movie-item"><img src="<?= htmlspecialchars($pelicula['poster_url']) ?>" alt="<?= htmlspecialchars($pelicula['titulo']) ?>"></div>
                    <?php endforeach; ?>
                </div>
                <button class="arrow right-arrow">›</button>
            </div>
        </section>
    </main>

    <div id="video-modal" class="modal">
        <div class="modal-content">
            <span class="close-button">&times;</span>
            <video id="movie-video" width="100%" controls><source src="http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4" type="video/mp4"></video>
        </div>
    </div>

    <footer class="main-footer">
        <div class="footer-links">
            <a href="#">Preguntas frecuentes</a><a href="#">Centro de ayuda</a><a href="#">Términos de uso</a><a href="#">Privacidad</a>
        </div>
        <p class="copyright">&copy; <?= date("Y") ?> Mi Netflix Clon. Todos los derechos reservados.</p>
    </footer>

    <script src="script.js"></script>
</body>
</html>




    <footer class="main-footer">
        <div class="footer-links">
            <a href="#">Preguntas frecuentes</a><a href="#">Centro de ayuda</a><a href="#">Términos de uso</a><a href="#">Privacidad</a>
        </div>
        <p class="copyright">&copy; <?= date("Y") ?> Mi Netflix Clon. Todos los derechos reservados.</p>
    </footer>

    <script src="script.js"></script>
</body>
</html>