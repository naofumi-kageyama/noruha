$(function(){
    const gap = 20;
    const moveSpeed = 500;
    const fadeSpeed = 200;

    function open(openTarget, moveTarget, moveTo){
        function openAnimation() {
            openTarget.addClass("is-open");
            openTarget.css("visibility", "visible");
            openTarget.stop().animate({"opacity":"1"}, fadeSpeed);
        }
        $.each(moveTarget, function(){
            $(this).stop().animate({"marginTop" : moveTo}, moveSpeed, function(){
                openAnimation();
            });
        })
    }

    function close(openTarget, moveTarget, originalGap){
        openTarget.removeClass("is-open");
        openTarget.stop().animate({"opacity":"0"}, fadeSpeed, function() {
            openTarget.css("visibility", "hidden");
            $.each(moveTarget, function(){
                $(this).animate({"marginTop" : originalGap}, moveSpeed);
            })
        });
    }

    $('.js-open-profile-container').each(function(){
        const profile = $(this).find('.js-open-profile-target');
        const profileLength = profile.length;
        if ( profileLength !== 0 ){
            $(this).addClass('has-credit');
        }
    });

    $('.js-open-profile-button').click(function(){
        const openTarget = $(this).closest('.js-open-profile-container').find('.js-open-profile-target');
        const height = openTarget.outerHeight(true);
        const moveTo = height + gap;
        
        let moveTarget = "";
        let originalGap = "";
        const length = $(this).closest('.js-open-profile-children-wrapper').children().length;
        const thisIndex = $(this).closest('.js-open-profile-child').index();
        const nextChild = $(this).closest('.js-open-profile-child').next();
        const nextParent = $(this).closest('.js-open-profile-parent').next();
        if (thisIndex + 1 == length){
            const parentLength =  $(this).closest('.js-open-profile-parent-wrapper').children().length;
            const parentIndex = $(this).closest('.js-open-profile-parent').index();
            if(parentIndex + 1 == parentLength) {
                originalGap = $(this).closest('.js-open-profile-parent-wrapper').css('margin-bottom');
                moveTarget = $('.js-open-profile-next-element');
            } else {
                originalGap = $(this).closest('.js-open-profile-parent').css('margin-bottom');
                moveTarget = nextParent;
            }
        } else {
            originalGap = $(this).closest('.js-open-profile-child').css('margin-bottom');
            moveTarget = nextChild;
        }
        
        if($(this).closest('.js-open-profile-container').hasClass("has-credit")) {
            if (openTarget.hasClass("is-open")) {
                close(openTarget, moveTarget, originalGap);
            } else {
                open(openTarget, moveTarget, moveTo);
            }
        }
    });
});