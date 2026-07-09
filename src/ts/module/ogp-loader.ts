const OGP_API_BASE = '/wp-json/noruha/v1/ogp';

async function loadOgp(item: HTMLElement): Promise<void> {
    const url = item.dataset.ogpUrl;
    if (!url) return;

    try {
        const res = await fetch(`${OGP_API_BASE}?url=${encodeURIComponent(url)}`);
        if (!res.ok) return;

        const ogp: Record<string, string> = await res.json();
        const image = ogp['image'];
        if (!image) return;

        const title = ogp['title'] ?? '';
        const imageAlt = ogp['image:alt'] ?? ogp['image.alt'] ?? '';

        const figure = document.createElement('figure');
        figure.className = 'relative block aspect-video w-full max-w-[570px] h-auto mx-auto mt-8';

        const img = document.createElement('img');
        img.src = image;
        img.alt = imageAlt;
        img.className = 'w-full h-full object-cover m-0 rounded-[2cqw]';
        figure.appendChild(img);

        if (title) {
            const figcaption = document.createElement('figcaption');
            figcaption.className = 'absolute bottom-[1em] right-[1em] ml-[1em] py-[0.5em] px-[2em] bg-black/60 text-white text-sm';
            figcaption.textContent = title;
            figure.appendChild(figcaption);
        }

        const link = document.createElement('a');
        link.href = url;
        link.target = '_blank';
        link.className = 'block w-full h-full absolute top-0 left-0';
        figure.appendChild(link);

        item.appendChild(figure);
    } catch {
        // OGPは補助的なコンテンツなので取得失敗は無視する
    }
}

document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll<HTMLElement>('[data-ogp-url]').forEach(loadOgp);
});

export {};