$(function(){
    const gap = 60;
    const moveSpeed = 500;
    const fadeSpeed = 200;
    $('.js-member-open-button').click(function(){        
        const description = $(this).closest('.js-member-open-container').find('.js-member-open-target');
        const height = description.height()
        const moveTo = height + gap
        const nextMember = $(this).closest('.js-member-open-container').next();
        const nextColumn = $(this).closest('.js-member-open-column').next();
        const memberIndex = $(this).closest('.js-member-open-container').index();
        const columnIndex = $(this).closest('.js-member-open-column').index();

        let originalGap = "";
        let moveTarget = "";
    	if (window.matchMedia('(max-width: 768px)').matches) {
            if (memberIndex == 0){
                originalGap = $(this).closest('.js-member-open-container').css('margin-bottom');
                moveTarget = [nextMember];
            } else if (memberIndex == 1 && columnIndex == 0){
                originalGap = $(this).closest('.js-member-open-column').css('margin-bottom');
                moveTarget = [nextColumn];
            } else if (memberIndex == 1 && columnIndex == 1){
                originalGap = $(this).closest('.js-member-open-column-wrapper').css('margin-bottom');
                moveTarget = $('.js-member-open-next-element');
            }     
        } else {
            if (memberIndex == 0){
                originalGap = $(this).closest('.js-member-open-container').css('margin-bottom');
                moveTarget = [nextMember];
            } else {
                moveTarget = $('.js-member-open-next-element');
                originalGap = $(this).closest('.js-member-open-column-wrapper').css('margin-bottom');
            }
        }
        
        function openAnimation() {
            description.addClass("is-open");
            description.css("visibility", "visible");
            description.stop().animate({"opacity":"1"}, fadeSpeed);
        }

        function open(moveTarget){
            if (moveTarget !== ""){
                $.each(moveTarget, function(){
                    $(this).stop().animate({"marginTop" : moveTo}, moveSpeed, function(){
                        openAnimation();
                    });
                })
            } else {
                openAnimation();
            }
        }

        function close(moveTarget){
            description.removeClass("is-open");
            description.stop().animate({"opacity":"0"}, fadeSpeed, function() {
                description.css("visibility", "hidden");
                if (moveTarget !== ""){
                    $.each(moveTarget, function(){
                        $(this).animate({"marginTop" : originalGap}, moveSpeed);
                    })
                }
            });
        }

        if (description.hasClass("is-open")) {
            close(moveTarget);
        } else {
            open(moveTarget);
        }
    });
});