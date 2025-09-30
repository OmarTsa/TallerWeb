<?php
// Simulamos una base de datos de películas con un array en PHP

$mi_lista = [
    ["titulo" => "Película 1", "poster" => "https://via.placeholder.com/200x300?text=Pelicula+1"],
    ["titulo" => "Película 2", "poster" => "https://via.placeholder.com/200x300?text=Pelicula+2"],
    ["titulo" => "Película 3", "poster" => "https://via.placeholder.com/200x300?text=Pelicula+3"],
    ["titulo" => "Película 4", "poster" => "https://via.placeholder.com/200x300?text=Pelicula+4"],
    ["titulo" => "Película 5", "poster" => "https://via.placeholder.com/200x300?text=Pelicula+5"],
];

$tendencias = [
    ["titulo" => "Película A", "poster" => "https://via.placeholder.com/200x300?text=Pelicula+A"],
    ["titulo" => "Película B", "poster" => "https://via.placeholder.com/200x300?text=Pelicula+B"],
    ["titulo" => "Película C", "poster" => "https://via.placeholder.com/200x300?text=Pelicula+C"],
    ["titulo" => "Película D", "poster" => "https://via.placeholder.com/200x300?text=Pelicula+D"],
    ["titulo" => "Película E", "poster" => "https://via.placeholder.com/200x300?text=Pelicula+E"],
    ["titulo" => "Película F", "poster" => "https://via.placeholder.com/200x300?text=Pelicula+F"],
];

?>

<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clon de Netflix</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="Estilo.css">
</head>
<body>

    <header class="main-header">
        <nav>
            <a href="#" class="logo">
                <img src="https://upload.wikimedia.org/wikipedia/commons/7/7a/Logonetflix.png" alt="Logo de Netflix">
            </a>
            <ul class="nav-links">
                <li><a href="#">Inicio</a></li>
                <li><a href="#">Series</a></li>
                <li><a href="#">Películas</a></li>
                <li><a href="#">Mi Lista</a></li>
            </ul>
        </nav>
    </header>
    
    <main>
        <section class="hero-section">
            <div class="hero-info">
                <h2>Nombre de la Película Destacada</h2>
                <p>Esta es una breve descripción de la película o serie que estamos destacando. Atrapa la atención del usuario.</p>
                <button>▶ Reproducir</button>
                <button>ℹ️ Más Información</button>
            </div>
        </section>
        
        <section class="movies-row">
            <h2>Mi Lista</h2>
            <div class="carousel">
                <button class="arrow left-arrow">‹</button>
              <div class="movies-container">
                <?php foreach ($mi_lista as $pelicula): ?>
                    <div class="movie-item">
                        <img src="<?= htmlspecialchars($pelicula['poster']) ?>" alt="<?= htmlspecialchars($pelicula['titulo']) ?>">
                    </div>
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
                    <div class="movie-item">
                        <img src="<?= htmlspecialchars($pelicula['poster']) ?>" alt="<?= htmlspecialchars($pelicula['titulo']) ?>">
                    </div>
                <?php endforeach; ?>
            </div>
                <button class="arrow right-arrow">›</button>
            </div>
        </section>
    </main>

    <footer class="main-footer">
        <div class="footer-links">
            <a href="#">Preguntas frecuentes</a>
            <a href="#">Centro de ayuda</a>
            <a href="#">Términos de uso</a>
            <a href="#">Privacidad</a>
        </div>
        <p class="copyright">&copy; 2025 Mi Netflix Clon. Todos los derechos reservados.</p>
         <div id="video-modal" class="modal">
        <div class="modal-content">
            <span class="close-button">&times;</span>
            <video id="movie-video" width="100%" controls>
                <source src="http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4" type="video/mp4">
                Tu navegador no soporta el elemento de video.
            </video>
        </div>
    </div>

    <footer class="main-footer">
        ```
    </footer>

    <script src="script.js"></script>
</body>
</html>