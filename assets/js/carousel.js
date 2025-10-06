import $ from 'jquery/src/jquery';
import { tns } from 'tiny-slider';

$(document).ready(function($) {
    $('.carousel').each(function(index, element) {
        const $carousel = $(element);
        const $container = $carousel.find('[class*="__slides"]');
        tns({
            container: $container[0],
            loop: false,
            gutter: 0,
            autoplay: false,
            autoplayButtonOutput: false,
            autoplayHoverPause: true,
            nav: false,
            navPosition: 'bottom',
            controls: true,
            controlsText: ['', ''],
            controlsPosition: 'bottom',
            autoHeight: false,
            responsive: {
                0: {

                },
                640: {
                    gutter: 34,
                },
                1600: {
                    items: 2,
                    gutter: 36,
                }
            }
        });
    })
});