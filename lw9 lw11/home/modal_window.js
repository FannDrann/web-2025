document.addEventListener('DOMContentLoaded', () => {
    const modal = document.querySelector('.modal');
    const modalImagesContainer = modal.querySelector('.modal__images');
    const modalCounter = modal.querySelector('.modal__counter');
    const leftArrow = modal.querySelector('.modal__arrow-left');
    const rightArrow = modal.querySelector('.modal__arrow-right');
    const closeModalBtn = modal.querySelector('.modal__close');

    let currentIndex = 0;
    let modalImages = [];

    function showImage(index) {
        if (!modalImages.length) return;

        currentIndex = (index + modalImages.length) % modalImages.length;

        modalImages.forEach((img, i) => {
            img.classList.toggle('modal__image_active', i === currentIndex);
            img.classList.toggle('modal__image_disabled', i !== currentIndex);
        });

        modalCounter.textContent = `${currentIndex + 1}/${modalImages.length}`;
    }

    function openModal(imagesArray, startIndex) {
        modalImagesContainer.innerHTML = imagesArray.map(src => `
            <img src="${src}" class="modal__image modal__image_disabled">
        `).join('');

        modalImages = Array.from(modalImagesContainer.querySelectorAll('.modal__image'));

        if (modalImages.length > 1) {
            modalCounter.classList.remove('modal__arrow-disabled');
            leftArrow.classList.remove('modal__arrow_disabled');
            rightArrow.classList.remove('modal__arrow_disabled');
        } else {
            modalCounter.classList.add('modal__arrow-disabled');
            leftArrow.classList.add('modal__arrow_disabled');
            rightArrow.classList.add('modal__arrow_disabled');
        }

        currentIndex = startIndex;
        showImage(currentIndex);

        modal.classList.add('modal_active');
        modal.classList.remove('modal_disabled');
        document.body.style.overflow = 'hidden';
    }

    function closeModal() {
        modal.classList.remove('modal_active');
        modal.classList.add('modal_disabled');
        document.body.style.overflow = 'auto';
    }

    closeModalBtn.addEventListener('click', closeModal);
    leftArrow.addEventListener('click', () => showImage(currentIndex - 1));
    rightArrow.addEventListener('click', () => showImage(currentIndex + 1));
    document.addEventListener('keydown', e => {
        if (!modal.classList.contains('modal_active')) return;
        if (e.key === 'Escape') closeModal();
        if (e.key === 'ArrowLeft') showImage(currentIndex - 1);
        if (e.key === 'ArrowRight') showImage(currentIndex + 1);
    });

    document.querySelectorAll('.post__carousel-photo').forEach(img => {
        img.addEventListener('click', () => {
            const post = img.closest('.post');
            const images = Array.from(post.querySelectorAll('.post__carousel-photo'));
            const sources = images.map(image => image.src);
            const index = images.indexOf(img);

            openModal(sources, index);
        });
    });
});
