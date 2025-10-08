import $ from 'jquery/src/jquery';

$(document).ready(function($) {
    function textImageBlockHandler() {
        $('.textImageBlock__text2').each(function (index, element) {
            const $element = $(element);
            const $textImageBlock = $element.parents('.textImageBlock');
            const $textCol = $textImageBlock.find('.textImageBlock__textInner');
            if ( window.outerWidth > 1260 ) {
                $element.appendTo($textCol);
            } else {
                $element.appendTo($textImageBlock);
            }
        });
    }
    textImageBlockHandler();
    $(window).resize(textImageBlockHandler);
})