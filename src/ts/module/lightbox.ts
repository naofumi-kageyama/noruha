document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll<HTMLElement>('.js-lightbox-trigger').forEach(trigger => {
        trigger.addEventListener('click', () => {
            const sourceImage = trigger.querySelector<HTMLImageElement>('.js-lightbox-source');
            const lightbox = document.querySelector<HTMLElement>('.js-lightbox');
            const lightboxImage = lightbox?.querySelector<HTMLImageElement>('.js-lightbox-image');
            if (!sourceImage || !lightbox || !lightboxImage) return;
            lightboxImage.src = sourceImage.currentSrc || sourceImage.src;
            lightboxImage.alt = sourceImage.alt;
            lightbox.classList.add('is-open');
        });
    });

    document.querySelectorAll<HTMLElement>('.js-lightbox-close').forEach(closer => {
        closer.addEventListener('click', () => {
            closer.closest<HTMLElement>('.js-lightbox')?.classList.remove('is-open');
        });
    });

    document.addEventListener('keydown', event => {
        if (event.key !== 'Escape') return;
        document.querySelectorAll<HTMLElement>('.js-lightbox.is-open').forEach(lightbox => {
            lightbox.classList.remove('is-open');
        });
    });
});
