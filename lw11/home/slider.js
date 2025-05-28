document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.post__carousel').forEach(carousel => {
        const images = carousel.querySelectorAll('.post_photo');
        const prevBtn = carousel.querySelector('.post__arrow-left');
        const nextBtn = carousel.querySelector('.post__arrow-right');
        const counter = carousel.querySelector('.post__counter');
        
        if (!images.length) return;
        
        let currentIndex = 0;
        
        function updateSlider() {
            images.forEach((img, index) => {
                if (index === currentIndex) {
                    img.classList.add('active');
                    img.classList.remove('hidden');
                } else {
                    img.classList.remove('active');
                    img.classList.add('hidden');
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
        
        // Инициализация
        updateSlider();
    });
});