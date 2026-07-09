const buttons = document.querySelectorAll<HTMLElement>('.js-about-button');
const targets = document.querySelectorAll<HTMLElement>('.js-about-target');

const activate = (index: number) => {
    buttons.forEach(b => b.classList.remove('is-on'));
    targets.forEach(t => t.classList.remove('is-show'));

    buttons[index]?.classList.add('is-on');
    targets[index]?.classList.add('is-show');
};

buttons.forEach((button, index) => {
    button.addEventListener('click', () => {
        activate(index);
    });
});

if (location.hash) {
    const targetIndex = Array.from(targets).findIndex(t => `#${t.id}` === location.hash);
    if (targetIndex !== -1) {
        activate(targetIndex);
    }
}

export {};