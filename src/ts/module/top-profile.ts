const gap = 60;
const moveSpeed = 500;
const fadeSpeed = 200;

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

document.querySelectorAll<HTMLElement>('.js-member-open-button').forEach(button => {
    button.addEventListener('click', () => {
        const memberContainer = button.closest<HTMLElement>('.js-member-open-container');
        if (!memberContainer) return;
        const description = memberContainer.querySelector<HTMLElement>('.js-member-open-target');
        if (!description) return;

        const height = description.offsetHeight;
        const moveTo = height + gap;

        const nextMember = memberContainer.nextElementSibling as HTMLElement | null;
        const memberColumn = button.closest<HTMLElement>('.js-member-open-column');
        const nextColumn = memberColumn?.nextElementSibling as HTMLElement | null;
        const memberIndex = siblingIndex(memberContainer);
        const columnIndex = memberColumn ? siblingIndex(memberColumn) : -1;

        let moveTargets: HTMLElement[] = [];
        let originalGap = '0px';

        if (window.matchMedia('(max-width: 768px)').matches) {
            if (memberIndex === 0) {
                originalGap = getComputedStyle(memberContainer).marginBottom;
                if (nextMember) moveTargets = [nextMember];
            } else if (memberIndex === 1 && columnIndex === 0) {
                originalGap = memberColumn ? getComputedStyle(memberColumn).marginBottom : '0px';
                if (nextColumn) moveTargets = [nextColumn];
            } else if (memberIndex === 1 && columnIndex === 1) {
                const columnWrapper = button.closest<HTMLElement>('.js-member-open-column-wrapper');
                originalGap = columnWrapper ? getComputedStyle(columnWrapper).marginBottom : '0px';
                moveTargets = Array.from(document.querySelectorAll<HTMLElement>('.js-member-open-next-element'));
            }
        } else {
            if (memberIndex === 0) {
                originalGap = getComputedStyle(memberContainer).marginBottom;
                if (nextMember) moveTargets = [nextMember];
            } else {
                const columnWrapper = button.closest<HTMLElement>('.js-member-open-column-wrapper');
                originalGap = columnWrapper ? getComputedStyle(columnWrapper).marginBottom : '0px';
                moveTargets = Array.from(document.querySelectorAll<HTMLElement>('.js-member-open-next-element'));
            }
        }

        function openAnimation() {
            description!.classList.add('is-open');
            description!.style.visibility = 'visible';
            animateOpacity(description!, '1', fadeSpeed);
        }

        function open() {
            animateMarginTop(moveTargets, `${moveTo}px`, moveSpeed, openAnimation);
        }

        function close() {
            description!.classList.remove('is-open');
            animateOpacity(description!, '0', fadeSpeed, () => {
                description!.style.visibility = 'hidden';
                animateMarginTop(moveTargets, originalGap, moveSpeed);
            });
        }

        if (description.classList.contains('is-open')) {
            close();
        } else {
            open();
        }
    });
});

export {};
