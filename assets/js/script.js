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

    //画面スクロール関数
    function moveTo(target){
        const targetTop = $(target).offset().top;
        const headerHeight = $('.js-header-height').height();
        const moveTo = targetTop - headerHeight;
        $(window).scrollTop(moveTo);
    }

    //hash時画面位置調整
    const hash = $(location).attr('hash');
    if(hash){
        moveTo(hash);
    }
});