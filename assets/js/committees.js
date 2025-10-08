import $ from 'jquery/src/jquery';
import '@fancyapps/fancybox';
import "@fancyapps/fancybox/dist/jquery.fancybox.css";

$(document).ready(function ($) {
    $('[data-fancybox]').fancybox({
        infobar: false,
        toolbar: false,
        smallBtn: true,
        touch: false,
        buttons: [
            //"zoom",
            //"share",
            //"slideShow",
            //"fullScreen",
            //"download",
            //"thumbs",
            "close"
        ],
        btnTpl: {
            download: '<a download data-fancybox-download class="fancybox-button fancybox-button--download" title="{{DOWNLOAD}}" href="javascript:;"></a>',
            zoom: '<button data-fancybox-zoom class="fancybox-button fancybox-button--zoom" title="{{ZOOM}}"></button>',
            close: '<button data-fancybox-close class="fancybox-button fancybox-button--close" title="{{CLOSE}}"></button>',
            arrowLeft: '<button data-fancybox-prev class="fancybox-button fancybox-button--arrow_left" title="{{PREV}}"></button>',
            arrowRight: '<button data-fancybox-next class="fancybox-button fancybox-button--arrow_right" title="{{NEXT}}"></button>',
            smallBtn: '<button type="button" data-fancybox-close class="fancybox-button fancybox-close-small" title="{{CLOSE}}"></button>'
        },
        mobile: {
            clickContent: function(current, event) {
                return current.type === "image" ? false : false;
            },
            clickSlide: function(current, event) {
                return current.type === "image" ? "close" : "close";
            },
        },
    });
});