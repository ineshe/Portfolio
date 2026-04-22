(function () {
    const cards = document.querySelectorAll('.js-redundant-click-card');

    cards.forEach((card) => {
        const link = card.querySelector('.js-primary-link');

        if (!link) {
            return;
        }

        let downTime = 0;

        card.classList.add('redundant-click');
        card.style.cursor = 'pointer';

        card.addEventListener('mousedown', (event) => {
            if (event.button !== 0) {
                return;
            }

            downTime = Date.now();
        });

        card.addEventListener('mouseup', (event) => {
            if (event.button !== 0 || downTime === 0) {
                return;
            }

            if (event.target === link || link.contains(event.target)) {
                downTime = 0;
                return;
            }

            const isShortClick = (Date.now() - downTime) < 200;
            const selectedText = window.getSelection ? window.getSelection().toString() : '';

            downTime = 0;

            if (!isShortClick || selectedText.length > 0) {
                return;
            }

            link.click();
        });
    });
})();
