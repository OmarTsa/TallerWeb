/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/ClientSide/javascript.js to edit this template
 */
// Espera a que todo el contenido de la página se cargue antes de ejecutar el código
document.addEventListener('DOMContentLoaded', () => {

    // Seleccionamos TODOS los carruseles de la página
    const carousels = document.querySelectorAll('.carousel');

    // Por cada carrusel que encontramos, le aplicamos la lógica de las flechas
    carousels.forEach(carousel => {
        const moviesContainer = carousel.querySelector('.movies-container');
        const leftArrow = carousel.querySelector('.left-arrow');
        const rightArrow = carousel.querySelector('.right-arrow');

        // Evento para la flecha derecha
        rightArrow.addEventListener('click', () => {
            // Nos desplazamos hacia la derecha el ancho de un póster
            const scrollAmount = moviesContainer.clientWidth * 0.8; // Desplazamos un 80% del ancho visible
            moviesContainer.scrollBy({ left: scrollAmount, behavior: 'smooth' });
        });

        // Evento para la flecha izquierda
        leftArrow.addEventListener('click', () => {
            // Nos desplazamos hacia la izquierda
            const scrollAmount = moviesContainer.clientWidth * 0.8;
            moviesContainer.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
        });
    });
});

// --- LÓGICA DEL MODAL DE VIDEO ---
    
    // Seleccionamos los elementos necesarios
    const modal = document.getElementById('video-modal');
    const playButton = document.querySelector('.hero-info button'); // El primer botón
    const closeButton = document.querySelector('.close-button');
    const video = document.getElementById('movie-video');

    // Cuando el usuario hace clic en "Reproducir", mostramos el modal
    playButton.addEventListener('click', () => {
        modal.style.display = 'block';
    });

    // Cuando el usuario hace clic en la 'X', cerramos el modal y pausamos el video
    closeButton.addEventListener('click', () => {
        modal.style.display = 'none';
        video.pause();
    });

    // También cerramos el modal si el usuario hace clic fuera del contenido
    window.addEventListener('click', (event) => {
        if (event.target == modal) {
            modal.style.display = 'none';
            video.pause();
        }
    });


