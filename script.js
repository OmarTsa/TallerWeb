document.addEventListener('DOMContentLoaded', () => {
    // --- LÓGICA DE LOS CARRUSELES ---
    const carousels = document.querySelectorAll('.carousel');
    carousels.forEach(carousel => {
        const moviesContainer = carousel.querySelector('.movies-container');
        const leftArrow = carousel.querySelector('.left-arrow');
        const rightArrow = carousel.querySelector('.right-arrow');

        // Asegurarse de que los elementos existen antes de añadir listeners
        if (moviesContainer && leftArrow && rightArrow) { 
            rightArrow.addEventListener('click', () => {
                // Scroll suave hacia la derecha
                moviesContainer.scrollBy({ left: moviesContainer.clientWidth * 0.8, behavior: 'smooth' });
            });
            leftArrow.addEventListener('click', () => {
                 // Scroll suave hacia la izquierda
                moviesContainer.scrollBy({ left: -moviesContainer.clientWidth * 0.8, behavior: 'smooth' });
            });
        }
    });

    // --- LÓGICA DEL MODAL DE VIDEO ---
    const modal = document.getElementById('video-modal');
    // Seleccionar el *primer* botón dentro de .hero-info (el de Play)
    const playButton = document.querySelector('.hero-info button:first-of-type'); 
    const closeButton = document.querySelector('.close-button');
    const video = document.getElementById('movie-video');

    if (modal && playButton && closeButton && video) {
        playButton.addEventListener('click', () => {
            modal.style.display = 'block';
            // Opcional: Iniciar video al abrir
            // video.play(); 
        });
        closeButton.addEventListener('click', () => {
            modal.style.display = 'none';
            video.pause(); // Pausar video al cerrar
        });
        // Cerrar modal al hacer clic fuera del contenido
        window.addEventListener('click', (event) => {
            if (event.target == modal) {
                modal.style.display = 'none';
                video.pause();
            }
        });
    }
});