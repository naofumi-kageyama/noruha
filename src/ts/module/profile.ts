document.addEventListener('DOMContentLoaded', () => {
    const gap = 20;
    const moveSpeed = 500;
    const fadeSpeed = 200;

    function getOuterHeight(el: HTMLElement): number {
        const style = getComputedStyle(el);
        return el.offsetHeight + parseFloat(style.marginTop) + parseFloat(style.marginBottom);
    }

    function animate(el: HTMLElement, cssProp: string, styleProp: 'marginTop' | 'opacity', value: string, duration: number): Promise<void> {
        return new Promise(resolve => {
            el.style.transition = `${cssProp} ${duration}ms`;
            el.style[styleProp] = value;
            el.addEventListener('transitionend', function handler(e: TransitionEvent) {
                if (e.target === el && e.propertyName === cssProp) {
                    el.removeEventListener('transitionend', handler);
                    resolve();
                }
            });
        });
    }

    function animateMarginTop(els: HTMLElement[], value: string, duration: number): Promise<void> {
        return Promise.all(els.map(el => animate(el, 'margin-top', 'marginTop', value, duration))).then(() => undefined);
    }

    function animateOpacity(el: HTMLElement, value: string, duration: number): Promise<void> {
        return animate(el, 'opacity', 'opacity', value, duration);
    }

    async function open(openTarget: HTMLElement, moveTargets: HTMLElement[], moveTo: number): Promise<void> {
        await animateMarginTop(moveTargets, `${moveTo}px`, moveSpeed);
        openTarget.classList.add('is-open');
        openTarget.style.visibility = 'visible';
        await animateOpacity(openTarget, '1', fadeSpeed);
    }

    async function close(openTarget: HTMLElement, moveTargets: HTMLElement[], originalGap: string): Promise<void> {
        openTarget.classList.remove('is-open');
        await animateOpacity(openTarget, '0', fadeSpeed);
        openTarget.style.visibility = 'hidden';
        await animateMarginTop(moveTargets, originalGap, moveSpeed);
    }

    document.querySelectorAll<HTMLElement>('.js-open-profile-container').forEach(container => {
        if (container.querySelectorAll('.js-open-profile-target').length > 0) {
            container.classList.add('has-credit');
        }
    });

    document.querySelectorAll<HTMLElement>('.js-open-profile-button').forEach(button => {
        button.addEventListener('click', () => {
            const container = button.closest<HTMLElement>('.js-open-profile-container');
            if (!container?.classList.contains('has-credit')) return;
            const openTarget = container.querySelector<HTMLElement>('.js-open-profile-target');
            if (!openTarget) return;

            const child = button.closest<HTMLElement>('.js-open-profile-child');
            const parent = button.closest<HTMLElement>('.js-open-profile-parent');
            const parentWrapper = button.closest<HTMLElement>('.js-open-profile-parent-wrapper');

            const nextChild = child?.nextElementSibling as HTMLElement | null;
            const nextParent = parent?.nextElementSibling as HTMLElement | null;

            let moveTargets: HTMLElement[];
            let originalGap: string;

            if (nextChild) {
                moveTargets = [nextChild];
                originalGap = getComputedStyle(child!).marginBottom;
            } else if (nextParent) {
                moveTargets = [nextParent];
                originalGap = getComputedStyle(parent!).marginBottom;
            } else {
                moveTargets = Array.from(document.querySelectorAll<HTMLElement>('.js-open-profile-next-element'));
                originalGap = parentWrapper ? getComputedStyle(parentWrapper).marginBottom : '0px';
            }

            if (openTarget.classList.contains('is-open')) {
                close(openTarget, moveTargets, originalGap);
            } else {
                open(openTarget, moveTargets, getOuterHeight(openTarget) + gap);
            }
        });
    });
});
