const openFadeSpeed = 1000;
const closeFadeSpeed = 300;
const delayTime = 500;

document.querySelectorAll<HTMLElement>('.js-form-container').forEach(container => {
    setTimeout(() => {
        container.style.transition = `opacity ${openFadeSpeed}ms`;
        container.style.opacity = '1';
    }, delayTime);
});

document.querySelectorAll<HTMLElement>('.js-form-close').forEach(button => {
    button.addEventListener('click', () => {
        const target = button.closest<HTMLElement>('.js-form-container');
        if (!target) return;
        target.style.transition = `opacity ${closeFadeSpeed}ms`;
        target.style.opacity = '0';
    });
});

export {};
