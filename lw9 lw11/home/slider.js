document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.post__carousel').forEach(carousel => {
        const images = carousel.querySelectorAll('.post__carousel-photo');
        const prevBtn = carousel.querySelector('.post__carousel-arrow-left');
        const nextBtn = carousel.querySelector('.post__carousel-arrow-right');
        const counter = carousel.querySelector('.post__carousel-count');
        
        if (!images.length) return;
        
        let currentIndex = 0;
        
        function updateSlider() {
            images.forEach((img, index) => {
                if (index === currentIndex) {
                    img.classList.add('post__carousel-photo-active');
                    img.classList.remove('post__carousel-photo-hidden');
                } else {
                    img.classList.remove('post__carousel-photo-active');
                    img.classList.add('post__carousel-photo-hidden');
                }
            });
            
            if (counter) {
                counter.textContent = `${currentIndex + 1}/${images.length}`;
            }
        }
        
        if (prevBtn) {
            prevBtn.addEventListener('click', () => {
                currentIndex = (currentIndex - 1 + images.length) % images.length;
                updateSlider();
            });
        }
        
        if (nextBtn) {
            nextBtn.addEventListener('click', () => {
                currentIndex = (currentIndex + 1) % images.length;
                updateSlider();
            });
        }
        
        updateSlider();
    });
});