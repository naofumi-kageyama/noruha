const gap = 60;
const moveSpeed = 500;
const fadeSpeed = 200;

function wait(ms: number): Promise<void> {
    return new Promise(resolve => setTimeout(resolve, ms));
}

function setMarginTop(els: HTMLElement[], value: string, duration: number): Promise<void> {
    els.forEach(el => {
        el.style.transition = `margin-top ${duration}ms`;
        el.style.marginTop = value;
    });
    return wait(duration);
}

function setOpacity(el: HTMLElement, value: string, duration: number): Promise<void> {
    el.style.transition = `opacity ${duration}ms`;
    el.style.opacity = value;
    return wait(duration);
}

async function open(description: HTMLElement, moveTargets: HTMLElement[], moveTo: number): Promise<void> {
    await setMarginTop(moveTargets, `${moveTo}px`, moveSpeed);
    description.classList.add('is-open');
    description.style.visibility = 'visible';
    await setOpacity(description, '1', fadeSpeed);
}

async function close(description: HTMLElement, moveTargets: HTMLElement[], originalGap: string): Promise<void> {
    description.classList.remove('is-open');
    await setOpacity(description, '0', fadeSpeed);
    description.style.visibility = 'hidden';
    await setMarginTop(moveTargets, originalGap, moveSpeed);
}

document.querySelectorAll<HTMLElement>('.js-member-open-button').forEach(button => {
    button.addEventListener('click', () => {
        const memberContainer = button.closest<HTMLElement>('.js-member-open-container');
        if (!memberContainer) return;
        const description = memberContainer.querySelector<HTMLElement>('.js-member-open-target');
        if (!description) return;

        const nextMember = memberContainer.nextElementSibling as HTMLElement | null;
        const memberColumn = button.closest<HTMLElement>('.js-member-open-column');
        const nextColumn = memberColumn?.nextElementSibling as HTMLElement | null;
        const columnWrapper = button.closest<HTMLElement>('.js-member-open-column-wrapper');
        const isMobile = window.matchMedia('(max-width: 768px)').matches;

        let moveTargets: HTMLElement[];
        let originalGap: string;

        if (nextMember) {
            moveTargets = [nextMember];
            originalGap = getComputedStyle(memberContainer).marginBottom;
        } else if (isMobile && nextColumn) {
            moveTargets = [nextColumn];
            originalGap = memberColumn ? getComputedStyle(memberColumn).marginBottom : '0px';
        } else {
            moveTargets = Array.from(document.querySelectorAll<HTMLElement>('.js-member-open-next-element'));
            originalGap = columnWrapper ? getComputedStyle(columnWrapper).marginBottom : '0px';
        }

        if (description.classList.contains('is-open')) {
            close(description, moveTargets, originalGap);
        } else {
            open(description, moveTargets, description.offsetHeight + gap);
        }
    });
});

export {};
