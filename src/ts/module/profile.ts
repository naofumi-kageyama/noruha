document.addEventListener('DOMContentLoaded', () => {
    const gap = 20;
    const moveSpeed = 500;
    const fadeSpeed = 200;

    function getOuterHeight(el: HTMLElement): number {
        const style = getComputedStyle(el);
        return el.offsetHeight + parseFloat(style.marginTop) + parseFloat(style.marginBottom);
    }

    function siblingIndex(el: HTMLElement): number {
        return el.parentElement ? Array.from(el.parentElement.children).indexOf(el) : -1;
    }

    function animateMarginTop(els: HTMLElement[], value: string, duration: number, callback?: () => void): void {
        if (els.length === 0) {
            callback?.();
            return;
        }
        let completed = 0;
        els.forEach(el => {
            el.style.transition = `margin-top ${duration}ms`;
            el.style.marginTop = value;
            const handler = (e: TransitionEvent) => {
                if (e.target === el && e.propertyName === 'margin-top') {
                    el.removeEventListener('transitionend', handler);
                    if (++completed === els.length) callback?.();
                }
            };
            el.addEventListener('transitionend', handler);
        });
    }

    function animateOpacity(el: HTMLElement, value: string, duration: number, callback?: () => void): void {
        el.style.transition = `opacity ${duration}ms`;
        el.style.opacity = value;
        if (callback) {
            const handler = (e: TransitionEvent) => {
                if (e.target === el && e.propertyName === 'opacity') {
                    el.removeEventListener('transitionend', handler);
                    callback();
                }
            };
            el.addEventListener('transitionend', handler);
        }
    }

    function open(openTarget: HTMLElement, moveTargets: HTMLElement[], moveTo: number): void {
        animateMarginTop(moveTargets, `${moveTo}px`, moveSpeed, () => {
            openTarget.classList.add('is-open');
            openTarget.style.visibility = 'visible';
            animateOpacity(openTarget, '1', fadeSpeed);
        });
    }

    function close(openTarget: HTMLElement, moveTargets: HTMLElement[], originalGap: string): void {
        openTarget.classList.remove('is-open');
        animateOpacity(openTarget, '0', fadeSpeed, () => {
            openTarget.style.visibility = 'hidden';
            animateMarginTop(moveTargets, originalGap, moveSpeed);
        });
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

            const moveTo = getOuterHeight(openTarget) + gap;

            const childrenWrapper = button.closest<HTMLElement>('.js-open-profile-children-wrapper');
            const child = button.closest<HTMLElement>('.js-open-profile-child');
            const parent = button.closest<HTMLElement>('.js-open-profile-parent');
            const parentWrapper = button.closest<HTMLElement>('.js-open-profile-parent-wrapper');

            const length = childrenWrapper?.children.length ?? 0;
            const thisIndex = child ? siblingIndex(child) : -1;
            const nextChild = child?.nextElementSibling as HTMLElement | null;
            const nextParent = parent?.nextElementSibling as HTMLElement | null;

            let moveTargets: HTMLElement[] = [];
            let originalGap = '0px';

            if (thisIndex + 1 === length) {
                const parentLength = parentWrapper?.children.length ?? 0;
                const parentIndex = parent ? siblingIndex(parent) : -1;
                if (parentIndex + 1 === parentLength) {
                    originalGap = parentWrapper ? getComputedStyle(parentWrapper).marginBottom : '0px';
                    moveTargets = Array.from(document.querySelectorAll<HTMLElement>('.js-open-profile-next-element'));
                } else {
                    originalGap = parent ? getComputedStyle(parent).marginBottom : '0px';
                    if (nextParent) moveTargets = [nextParent];
                }
            } else {
                originalGap = child ? getComputedStyle(child).marginBottom : '0px';
                if (nextChild) moveTargets = [nextChild];
            }

            if (openTarget.classList.contains('is-open')) {
                close(openTarget, moveTargets, originalGap);
            } else {
                open(openTarget, moveTargets, moveTo);
            }
        });
    });
});