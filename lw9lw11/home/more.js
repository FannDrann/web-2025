document.addEventListener('DOMContentLoaded', function() {
    const textBlocks = document.querySelectorAll('.post__content');

    textBlocks.forEach(textBlock => {
        const text = textBlock.querySelector('.post__text');
        const moreBtn = textBlock.querySelector('.post__more-btn');

        function checkTextOverflow() {
            text.style.display = 'block';
            text.style.webkitLineClamp = 'unset';
            
            const fullHeight = text.scrollHeight;
            const lineHeight = parseInt(window.getComputedStyle(text).lineHeight);
            const maxHeight = lineHeight * 2;
            
            text.style.display = '-webkit-box';
            text.style.webkitLineClamp = '2';
            
            if (fullHeight > maxHeight) {
                moreBtn.classList.remove('post__more-btn-hidden');
            } else {
                moreBtn.classList.add('post__more-btn-hidden');
            }
        }

        function toggleText() {
            const isExpanded = text.classList.toggle('expand');
            
            if (isExpanded) {
                text.style.webkitLineClamp = 'unset';
                text.style.display = 'block';
                moreBtn.textContent = 'свернуть';
            } else {
                text.style.webkitLineClamp = '2';
                text.style.display = '-webkit-box';
                moreBtn.textContent = '...ещё';
            }
        }

        checkTextOverflow();
        
        moreBtn.addEventListener('click', toggleText);
      
        window.addEventListener('resize', checkTextOverflow);
    });
});