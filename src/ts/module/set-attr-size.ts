document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.js-set-attr-size').forEach(container => {
        container.querySelectorAll<HTMLImageElement>('img').forEach(img => {
            const width = img.getAttribute('width');
            const height = img.getAttribute('height');
            if (width) img.style.width = `${width}px`;
            if (height) img.style.height = `${height}px`;
        });
    });
});