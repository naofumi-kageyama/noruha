$(function(){
    //notoフォント
    window.WebFontConfig = {
        custom: { families: ['Noto Sans CJK JP Subset'],
        urls: ['/wp-content/themes/noruha2022/assets/fonts/noto-fonts/noto.css'] },
        active: function() {
            sessionStorage.fonts = true;
        }
    };

    (function() {
        var wf = document.createElement('script');
        wf.src = 'https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js';
        wf.type = 'text/javascript';
        wf.async = 'true';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(wf, s);
    })();

    //アンカーリンククリック
    $('a[href^="#"]').click(function() {
        const href = $(this).attr("href");
        const target = $(href == "#" || href == "" ? 'html' : href);
        if(target.length){
            const targetTop = target.offset().top;
            const headerHeight = $('.js-header-height').height();
            const position = targetTop - headerHeight;
            $('body,html').animate({scrollTop:position}, 1000, 'swing');
            return false;
        }
    });
});