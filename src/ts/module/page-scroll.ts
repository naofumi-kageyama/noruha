document.addEventListener('DOMContentLoaded', () => {
    //アンカーリンククリック時スクロール
    document.querySelectorAll<HTMLAnchorElement>('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', e => {
            const href = anchor.getAttribute('href') ?? '';
            const selector = href === '#' || href === '' ? 'html' : href;
            const targetEl = document.querySelector<HTMLElement>(selector);
            if (!targetEl) return;
            e.preventDefault();
            const targetTop = targetEl.getBoundingClientRect().top + window.scrollY;
            const header = document.querySelector<HTMLElement>('.js-header');
            const headerHeight = header?.offsetHeight ?? 0;
            window.scrollTo({ top: targetTop - headerHeight, behavior: 'smooth' });
        });
    });
});
