$(function(){
    const $imgs = $('.js-set-attr-size').find('img');
    $imgs.each(function(){
        const width = $(this).attr('width');
        const height = $(this).attr('height');
        $(this).css({
            'width': width,
            'height': height
        });
    });
});