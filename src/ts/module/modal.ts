document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll<HTMLElement>('.js-modal-open-button').forEach(button => {
        button.addEventListener('click', () => {
            const parent = button.parentElement;
            if (!parent?.parentElement) return;
            const index = Array.from(parent.parentElement.children).indexOf(parent);
            document.querySelectorAll<HTMLElement>('.js-modal')[index]?.classList.add('is-open');
        });
    });

    document.querySelectorAll<HTMLElement>('.js-modal-close-button').forEach(button => {
        button.addEventListener('click', () => {
            button.closest<HTMLElement>('.js-modal')?.classList.remove('is-open');
        });
    });
});
