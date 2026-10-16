const INTERVAL = 4000;

document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll<HTMLElement>('.js-slideshow').forEach(slideshow => {
        const slides = slideshow.querySelectorAll<HTMLElement>('.js-slideshow-slide');
        const dots = slideshow.querySelectorAll<HTMLElement>('.js-slideshow-dot');
        const captions = slideshow.querySelectorAll<HTMLElement>('.js-slideshow-caption');
        if (slides.length < 2) return;

        let current = 0;
        let timer: number | undefined;

        const show = (index: number) => {
            current = (index + slides.length) % slides.length;
            slides.forEach((slide, i) => slide.classList.toggle('is-active', i === current));
            dots.forEach((dot, i) => dot.classList.toggle('is-active', i === current));
            captions.forEach((caption, i) => caption.classList.toggle('is-active', i === current));
        };

        const start = () => {
            stop();
            timer = window.setInterval(() => show(current + 1), INTERVAL);
        };
        const stop = () => window.clearInterval(timer);

        slideshow.querySelector('.js-slideshow-prev')?.addEventListener('click', () => {
            show(current - 1);
            start();
        });
        slideshow.querySelector('.js-slideshow-next')?.addEventListener('click', () => {
            show(current + 1);
            start();
        });
        dots.forEach((dot, i) => dot.addEventListener('click', () => {
            show(i);
            start();
        }));

        slideshow.addEventListener('mouseenter', stop);
        slideshow.addEventListener('mouseleave', start);

        if (!window.matchMedia('(prefers-reduced-motion: reduce)').matches) start();
    });
});
