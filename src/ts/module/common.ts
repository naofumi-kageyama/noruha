document.addEventListener('DOMContentLoaded', () => {

    //webフォントの非同期読み込み
    (window as any).WebFontConfig = {
        custom: {
            families: ['Noto Sans CJK JP Subset'],
            urls: ['/wp-content/themes/noruha2022/assets/fonts/noto-fonts/noto.css'],
        },
        active() {
            sessionStorage.fonts = 'true';
        },
    };

    (() => {
        const wf = document.createElement('script');
        wf.src = 'https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js';
        wf.type = 'text/javascript';
        wf.async = true;
        const s = document.getElementsByTagName('script')[0];
        s.parentNode?.insertBefore(wf, s);
    })();

    //アンカーリンククリック時スクロール
    document.querySelectorAll<HTMLAnchorElement>('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', e => {
            const href = anchor.getAttribute('href') ?? '';
            const selector = href === '#' || href === '' ? 'html' : href;
            const targetEl = document.querySelector<HTMLElement>(selector);
            if (!targetEl) return;
            e.preventDefault();
            const targetTop = targetEl.getBoundingClientRect().top + window.scrollY;
            const header = document.querySelector<HTMLElement>('.js-header-height');
            const headerHeight = header?.offsetHeight ?? 0;
            window.scrollTo({ top: targetTop - headerHeight, behavior: 'smooth' });
        });
    });
});
