document.addEventListener('DOMContentLoaded', () => {
    // --- LÓGICA DE LOS CARRUSELES ---
    const carousels = document.querySelectorAll('.carousel');
    carousels.forEach(carousel => {
        const moviesContainer = carousel.querySelector('.movies-container');
        const leftArrow = carousel.querySelector('.left-arrow');
        const rightArrow = carousel.querySelector('.right-arrow');

        if (leftArrow && rightArrow) {
            rightArrow.addEventListener('click', () => {
                moviesContainer.scrollBy({ left: moviesContainer.clientWidth * 0.8, behavior: 'smooth' });
            });
            leftArrow.addEventListener('click', () => {
                moviesContainer.scrollBy({ left: -moviesContainer.clientWidth * 0.8, behavior: 'smooth' });
            });
        }
    });

    // --- LÓGICA DEL MODAL DE VIDEO ---
    const modal = document.getElementById('video-modal');
    const playButton = document.querySelector('.hero-info button');
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