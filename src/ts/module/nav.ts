document.addEventListener('DOMContentLoaded', () => {
    const toggle = document.querySelector<HTMLElement>('.js-nav-toggle');
    const nav = document.querySelector<HTMLElement>('.js-nav');
    if (!toggle || !nav) return;

    toggle.addEventListener('click', () => {
        const isOpen = nav.classList.toggle('is-open');
        toggle.classList.toggle('is-open', isOpen);
    });

    nav.querySelectorAll<HTMLAnchorElement>('.p-nav__link').forEach(link => {
        link.addEventListener('click', () => {
            nav.classList.remove('is-open');
            toggle.classList.remove('is-open');
        });
    });
});
