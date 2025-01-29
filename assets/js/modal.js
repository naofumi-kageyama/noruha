$(function(){
    $('.js-modal-open-button').click(function(){
        const thisIndex = $(this).parent().index();
        const target = $('.js-modal').eq(thisIndex);
        target.addClass('is-open');
        // target.css("visiblity", "visible");
        // target.animate({"opacity": "1"}, 400, "swing");
    });

    $('.js-modal-close-button').click(function (){
        const target = $(this).closest($('.js-modal'));
        target.removeClass('is-open');
        // target.stop().animate({"opacity": "0"}, 400, "swing", function(){
        //     target.css("display", "none");
        // });
    });
});