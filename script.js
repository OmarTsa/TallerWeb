document.addEventListener('DOMContentLoaded', () => {
    
    // ==========================================
    // SEMANA 11 y 12: Variables y Saludo Dinámico
    // ==========================================
    const userMenuSpan = document.querySelector('.user-menu span');
    
    if (userMenuSpan) {
        const horaActual = new Date().getHours();
        let saludo = "Hola"; 

        if (horaActual < 12) {
            saludo = "Buenos días";
        } else if (horaActual < 18) {
            saludo = "Buenas tardes";
        } else {
            saludo = "Buenas noches";
        }

        // Mantiene el nombre original del usuario
        let nombreUsuario = userMenuSpan.textContent.replace('Bienvenido, ', '');
        userMenuSpan.textContent = `${saludo}, ${nombreUsuario}`;
    }

    // ==========================================
    // SEMANA 12: Arreglos (Historial de Calificaciones)
    // ==========================================
    const historialCalificaciones = [];

    // ==========================================
    // SEMANA 14: Menú Responsivo
    // ==========================================
    const menuToggle = document.querySelector('.menu-toggle');
    const navLinks = document.querySelector('.nav-links');

    if (menuToggle && navLinks) {
        menuToggle.addEventListener('click', () => {
            navLinks.classList.toggle('active');
            
            // Cambiar ícono de hamburguesa a X
            const icon = menuToggle.querySelector('i');
            if (navLinks.classList.contains('active')) {
                icon.classList.remove('fa-bars');
                icon.classList.add('fa-xmark');
            } else {
                icon.classList.remove('fa-xmark');
                icon.classList.add('fa-bars');
            }
        });
    }

    // ==========================================
    // SEMANA 13: Manipulación del DOM (Calificaciones)
    // ==========================================
    const peliculas = document.querySelectorAll('.movie-item');

    peliculas.forEach(pelicula => {
        pelicula.addEventListener('click', () => {
            const img = pelicula.querySelector('img');
            const tituloPelicula = img ? img.alt : "Película";

            const quiereCalificar = confirm(`¿Te gustaría calificar "${tituloPelicula}"?`);

            if (quiereCalificar) {
                let puntaje = prompt("Del 1 al 5, ¿cuántas estrellas le das?");

                if (puntaje !== null && puntaje >= 1 && puntaje <= 5) {
                    
                    historialCalificaciones.push({
                        titulo: tituloPelicula,
                        nota: puntaje,
                        fecha: new Date().toLocaleTimeString()
                    });
                    
                    console.log("Historial:", historialCalificaciones);
                    alert(`¡Genial! Has calificado "${tituloPelicula}" con ${puntaje} estrellas.`);

                    // --- Insertar Badge en el DOM ---
                    const badgeExistente = pelicula.querySelector('.rating-badge');
                    if (badgeExistente) badgeExistente.remove();

                    const nuevoBadge = document.createElement('span');
                    nuevoBadge.classList.add('rating-badge');
                    nuevoBadge.textContent = `⭐ ${puntaje}`;

                    // Estilos dinámicos
                    nuevoBadge.style.position = "absolute";
                    nuevoBadge.style.top = "10px";
                    nuevoBadge.style.right = "10px";
                    nuevoBadge.style.backgroundColor = "#e50914";
                    nuevoBadge.style.color = "white";
                    nuevoBadge.style.padding = "5px 8px";
                    nuevoBadge.style.borderRadius = "4px";
                    nuevoBadge.style.fontWeight = "bold";
                    nuevoBadge.style.boxShadow = "0 2px 5px rgba(0,0,0,0.5)";

                    pelicula.style.position = "relative";
                    pelicula.appendChild(nuevoBadge);

                } else {
                    alert("Por favor ingresa un número válido entre 1 y 5.");
                }
            }
        });
    });

    // --- LÓGICA CARRUSELES ---
    const carousels = document.querySelectorAll('.carousel');
    carousels.forEach(carousel => {
        const moviesContainer = carousel.querySelector('.movies-container');
        const leftArrow = carousel.querySelector('.left-arrow');
        const rightArrow = carousel.querySelector('.right-arrow');

        if (moviesContainer && leftArrow && rightArrow) { 
            rightArrow.addEventListener('click', () => {
                moviesContainer.scrollBy({ left: moviesContainer.clientWidth * 0.8, behavior: 'smooth' });
            });
            leftArrow.addEventListener('click', () => {
                moviesContainer.scrollBy({ left: -moviesContainer.clientWidth * 0.8, behavior: 'smooth' });
            });
        }
    });

    // ==========================================
    // SEMANA 14: Ventana Flotante (Modal Video)
    // ==========================================
    const modal = document.getElementById('video-modal');
    const playButton = document.querySelector('.hero-info button:first-of-type'); 
    const closeButton = document.querySelector('.close-button');
    const video = document.getElementById('movie-video');

    if (modal && playButton && closeButton && video) {
        playButton.addEventListener('click', () => {
            modal.style.display = 'block';
        });
        closeButton.addEventListener('click', () => {
            modal.style.display = 'none';
            video.pause(); 
        });
        window.addEventListener('click', (event) => {
            if (event.target == modal) {
                modal.style.display = 'none';
                video.pause();
            }
        });
    }
});