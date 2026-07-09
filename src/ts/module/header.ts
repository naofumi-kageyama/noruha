document.addEventListener('DOMContentLoaded', () => {
    const header = document.querySelector<HTMLElement>('.js-header');
    if (!header) return;

    const mql = window.matchMedia('screen and (max-width: 768px)');
    let lastScrollY = window.scrollY;
    let ticking = false;

    const update = () => {
        const currentScrollY = window.scrollY;

        if (mql.matches && currentScrollY > header.offsetHeight) {
            header.classList.toggle('is-hidden', currentScrollY > lastScrollY);
        } else {
            header.classList.remove('is-hidden');
        }

        lastScrollY = currentScrollY;
        ticking = false;
    };

    window.addEventListener('scroll', () => {
        if (ticking) return;
        ticking = true;
        requestAnimationFrame(update);
    });
});