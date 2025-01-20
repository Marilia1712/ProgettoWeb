document.getElementById("menu-button").addEventListener("click", function() {
    const mobileMenu = document.querySelector(".mobile-menu");
    mobileMenu.classList.toggle("hidden");
});


/*carosello circolare*/
document.addEventListener('DOMContentLoaded', () => {
    const carousel = document.querySelector('.carousel');
    const slides = document.querySelectorAll('.carousel a');
    const totalSlides = slides.length;
    let currentIndex = 0;

    const firstSlide = slides[0].cloneNode(true);
    const lastSlide = slides[totalSlides - 1].cloneNode(true);
    carousel.appendChild(firstSlide);
    carousel.insertBefore(lastSlide, slides[0]);
    const slideWidth = slides[0].offsetWidth;
    carousel.style.transform = `translateX(-${slideWidth}px)`;

    setInterval(() => {
        currentIndex++;
        carousel.style.transition = 'transform 0.5s ease-in-out';
        carousel.style.transform = `translateX(-${(currentIndex + 1) * slideWidth}px)`;
        if (currentIndex >= totalSlides) {
            setTimeout(() => {
                carousel.style.transition = 'none'; // Disable transition
                carousel.style.transform = `translateX(-${slideWidth}px)`; // Reset to first real slide
                currentIndex = 0;
            }, 500);
        }
        if (currentIndex < 0) {
            setTimeout(() => {
                carousel.style.transition = 'none';
                carousel.style.transform = `translateX(-${totalSlides * slideWidth}px)`;
                currentIndex = totalSlides - 1;
            }, 500);
        }
    }, 3000);
});
