import $ from 'jquery/src/jquery';

$(document).ready(function ($) {

    /**
     * Process hash links
     */
    $(document).on('click', 'a[href*=\\#]', function (e) {

        if ( $(this).hasClass('ui-tabs-anchor') )
            return false;

        var url = $(this).attr('href');
        var hash = url.substring(url.indexOf('#'));
        if (hash.length) {
            e.preventDefault();
            if ( hash.length > 1 && $(hash).length ) {
                processHash(hash);
            }
        }
    });

    function processHash(hash) {
        var $element = $(hash);
        var hashValue = hash.substr(1);

        if ($element.length) {
            var elementOffset = $element.offset().top;
            var elementHeight = $element.outerHeight();
            var elementCenter = elementOffset + elementHeight/2;

            $('html, body').animate({
                scrollTop: elementHeight > window.outerHeight ? elementOffset : elementCenter - window.outerHeight/2
            }, 'normal');
        }
    }

    $(window).on("load", function () {
        if (window.location.hash) {
            processHash(window.location.hash);
        }
    });
});