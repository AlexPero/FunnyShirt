jQuery(document).ready(function ($) {
    console.log('ready');
    $('.slider-front').slick({
        fullwidth: true,
        autoplay: true,
        variableWidth: true,
        variableHeight: true,
        arrows: false,
    });
})