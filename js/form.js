$(function(){
    const openFadeSpeed = 1000;
    const closeFadeSpee = 300;
    const delayTime = 500;
    $('.js-form-container').delay(delayTime).animate({"opacity":"1"}, openFadeSpeed);
    $('.js-form-close').click(function(){
        const target = $(this).closest('.js-form-container');
        target.animate({"opacity":"0"}, closeFadeSpee);
    });
});