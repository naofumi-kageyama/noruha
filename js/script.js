$(function(){

    //notoフォント
    window.WebFontConfig = {
        custom: { families: ['Noto Sans CJK JP Subset'],
        urls: ['/wp-content/themes/noruha2022/fonts/noto-fonts/noto.css'] },
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

    //テロップ
    $(function($) {
        $('#noruha-copy').marquee({
        direction: 'left',
        duration: 4500,
        delayBeforeStart: 0,
        /*  pauseOnHover: false,*/
    
        });
    });

    //DOMロード時
    $(function() {
        //画面スクロール関数
        function moveTo(target){
            const targetTop = $(target).offset().top;
            const headerHeight = $('#header').height();
            const moveTo = targetTop - headerHeight;
            $(window).scrollTop(moveTo);
        }

        //hash時画面位置調整
        const hash = $(location).attr('hash');
        if(hash){
            moveTo(hash);
        }

        //フォーム表示
        const hostUrl = $(location).attr('host');
        const topUrl = ( "https://" + hostUrl + "/" );
        const unctfUrl = ( "http://" + hostUrl + "/" );
        const presentUrl = $(location).attr('href');

        const fadespeed = 1000;
        const delayTime = 500;

        if( presentUrl == topUrl || presentUrl == unctfUrl){
            $('.form').css("display", "block");
            $('.form').delay(delayTime).animate({"opacity":"1"}, fadespeed);
        }

        //プロフィールある場合書式変更
        $('.open-profile').each(function(){
            const profile = $(this).parent().find('.profile');
            const profLength = profile.length;
            const css = {
                "text-decoration" : "underline",
                "cursor" : "pointer"
            }

            if ( profLength !== 0 ){
                $(this).css(css);
            }
        });

        //プロフィールある場合書式変更（改良版）
        $('.js-open-profile-btn').each(function(){
            const profile = $(this).parent().find('.js-open-profile-content');
            const profLength = profile.length;
            const css = {
                "text-decoration" : "underline",
                "cursor" : "pointer"
            }

            if ( profLength !== 0 ){
                $(this).css(css);
            }
        });
    });

    //フォーム非表示
    $('.form-batsu').click(function(){
        const target = $(this).parent();
        const fadespeed = 300;

        target.animate({"opacity":"0"}, fadespeed);
    });

    //menu:about
    $('.moveto-about').click(function(){
        const hostUrl = $(location).attr('host');
        const hash = "#declaration";
        const topUrl = ( "https://" + hostUrl + "/" );
        const targetUrl = ( topUrl + hash );

        const presentUrl = $(location).attr('href');

        if( presentUrl == topUrl || presentUrl == targetUrl ){
            moveTo(hash);
        } else {
            window.location.href = targetUrl;
        }
    });

    //プロフィール写真表示オンオフ
    $('.member-photo').mouseenter(function(){
        $(this).find('.img-off').css("display","none");
        $(this).find('.img-on').css("display","inline");
    }).mouseleave(function(){
        $(this).find('.img-on').css("display","none");
        $(this).find('.img-off').css("display","inline");
    });

    //プロフィール文オンオフ
    $('.member-photo').click(function(){
        const description = $(this).next().find('.member-description');

        const height = description.height()
        const gap = 62;
        const originalGap = 77;
        const moveTo = height + gap
        const moveSpeed = 500;
        const fadeSpeed = 200;

        const nextChild = $(this).parent().next();
        const nextParent = $(this).parent().parent().next();

        const parentIndex = $(this).parent().parent().index();
        const childIndex = $(this).parent().index();

    	if (window.matchMedia('(min-width: 1280px)').matches) {
            if (childIndex == 0){
                target = [nextChild];
            } else {
                target = "";
            }
        
        } else {

            if (childIndex == 0){
                target = [nextChild];
            } else if (childIndex == 1 && parentIndex == 0){
                target = [nextParent];
            } else if (childIndex == 1 && parentIndex == 1){
                target = $('.members-photo-credit');
            }        
        }

        function close(target){
            description.removeClass("opened");
            description.stop().animate({"opacity":"0"}, fadeSpeed, function() {
                if (target !== ""){
                    $.each(target, function(){
                        $(this).animate({"marginTop" : originalGap}, moveSpeed);
                    })
                }
                description.css("display","none");
            });
        }

        function open(target){
            function openAnimation() {
                description.addClass("opened");
                description.stop().animate({"opacity":"1"}, fadeSpeed);
                description.css("display","block");
            }
            if (target !== ""){
                $.each(target, function(){
                    $(this).stop().animate({"marginTop" : moveTo}, moveSpeed, function(){
                            openAnimation();
                    });
                })
            } else {
                openAnimation();
            }
        }

        if (description.hasClass("opened")) {
            close(target);
        } else {
            open(target);
        }
    });

    //nextプロフィール表示
    $('.open-profile').click(function(){
        const profile = $(this).parent().find('.profile');

        const height = profile.outerHeight(true);
        const gap = 20;
        const originalGap = 5;
        const moveTo = height + gap;
        const moveSpeed = 500;
        const fadeSpeed = 200;

        const nextChild = $(this).parent().next();
        const nextParent = $(this).parent().parent().parent().next();

        const length = $(this).parent().parent().children().length;
        const index = $(this).parent().index();
        const correctIndex = index + 1;

    	if (correctIndex == length){
                target = [nextParent];
        } else {
                target = [nextChild];
        }

        function open(target){
            function openAnimation() {
                profile.addClass("opened");
                profile.stop().animate({"opacity":"1"}, fadeSpeed);
                profile.css("display","inline-block");
            }
            
            $.each(target, function(){
                $(this).stop().animate({"marginTop" : moveTo}, moveSpeed, function(){
                        openAnimation();
                });
            })
        }

        function close(target){
            profile.removeClass("opened");
            profile.stop().animate({"opacity":"0"}, fadeSpeed, function() {
                $.each(target, function(){
                    $(this).animate({"marginTop" : originalGap}, moveSpeed);
                })
                profile.css("display","none");
            });
        }

        if ($(this).hasClass("non-credit")) {
            ;
        } else if (profile.hasClass("opened")) {
            close(target);
        } else {
            open(target);
        }
    });    

    $('.batsu').click(function(){
        const profile = $(this).parent().parent().find('.profile');

        const originalGap = 5;
        const moveSpeed = 500;
        const fadeSpeed = 200;

        const nextChild = $(this).parent().parent().next();
        const nextParent = $(this).parent().parent().parent().parent().next();

        const length = $(this).parent().parent().parent().children().length;
        const index = $(this).parent().parent().index();
        const correctIndex = index + 1;

    	if (correctIndex == length){
                target = [nextParent];
        } else {
                target = [nextChild];
        }

        profile.removeClass("opened");
        profile.stop().animate({"opacity":"0"}, fadeSpeed, function() {
            $.each(target, function(){
                $(this).animate({"marginTop" : originalGap}, moveSpeed);
            })
            profile.css("display","none");
        });        
    });

    //nextプロフィール表示（改良版）
    $('.js-open-profile-btn').click(function(){
        const parent = $('.js-open-profile-parent');
        const child = $('.js-open-profile-child');
        const content = $('.js-open-profile-content');
        const $child = $(this).closest(child);
        const $parent = $(this).closest(parent);

        const $profile = $child.find(content);

        const height = $profile.outerHeight(true);
        const gap = 20;
        const originalGap = 5;
        const moveTo = height + gap;
        const moveSpeed = 500;
        const fadeSpeed = 200;

        const nextChild = $child.next();
        const nextParent = $parent.next();

        const length = $child.parent().children().length;
        const index = $child.index();
        const correctIndex = index + 1;

    	if (correctIndex == length){
                target = [nextParent];
        } else {
                target = [nextChild];
        }

        function open(target){
            function openAnimation() {
                $profile.addClass("opened");
                $profile.stop().animate({"opacity":"1"}, fadeSpeed);
                $profile.css("display","inline-block");
            }
            
            $.each(target, function(){
                $(this).stop().animate({"marginTop" : moveTo}, moveSpeed, function(){
                        openAnimation();
                });
            })
        }

        function close(target){
            $profile.removeClass("opened");
            $profile.stop().animate({"opacity":"0"}, fadeSpeed, function() {
                $.each(target, function(){
                    $(this).animate({"marginTop" : originalGap}, moveSpeed);
                })
                $profile.css("display","none");
            });
        }

        if ($(this).hasClass("non-credit")) {
            ;
        } else if ($profile.hasClass("opened")) {
            close(target);
        } else {
            open(target);
        }
    });
    
    $('.js-open-profile-close').click(function(){
        const parent = $('.js-open-profile-parent');
        const child = $('.js-open-profile-child');
        const content = $('.js-open-profile-content');
        const $child = $(this).closest(child);
        const $parent = $(this).closest(parent);

        const $profile = $child.find(content);

        const originalGap = 5;
        const moveSpeed = 500;
        const fadeSpeed = 200;


        const nextChild = $child.next();
        const nextParent = $parent.next();

        const length = $child.parent().children().length;
        const index = $child.index();
        const correctIndex = index + 1;

    	if (correctIndex == length){
                target = [nextParent];
        } else {
                target = [nextChild];
        }

        $profile.removeClass("opened");
        $profile.stop().animate({"opacity":"0"}, fadeSpeed, function() {
            $.each(target, function(){
                $(this).animate({"marginTop" : originalGap}, moveSpeed);
            })
            $profile.css("display","none");
        });        
    });

    //ポップアップテキスト
    $('.open-text').click(function(){
        const thisIndex = $(this).parent().index();
        const target = $('.opened-text-wrapper').eq(thisIndex);

        console.log(thisIndex);

        target.css("display", "block");
        target.animate({"opacity": "1"}, 400, "swing");
    });

    $('.opened-text-batsu').click(function (){
        const target = $(this).parent();

        target.stop().animate({"opacity": "0"}, 400, "swing", function(){
            target.css("display", "none");
        });
    });

});