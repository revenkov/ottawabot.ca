import $ from 'jquery/src/jquery';
import { tns } from 'tiny-slider';

$(document).ready(function($) {
    $('.carousel').each(function(index, element) {
        const $carousel = $(element);
        const $container = $carousel.find('[class*="__slides"]');
        const slider = tns({
            container: $container[0],
            loop: true,
            gutter: 0,
            autoplay: true,
            autoplayButtonOutput: false,
            autoplayHoverPause: true,
            autoplayTimeout: 5000,
            nav: false,
            navPosition: 'bottom',
            controls: true,
            controlsText: ['', ''],
            controlsPosition: 'bottom',
            autoHeight: false,
            mouseDrag: true,
            responsive: {
                0: {
                    gutter: 32,
                },
                640: {
                    gutter: 34,
                },
                1600: {
                    items: $carousel.attr('id') === 'advertisingCarousel' ? 1: 2,
                    gutter: 36,
                }
            }
        });
        slider.events.on('dragStart', function() {
            slider.pause();
        });
        slider.events.on('dragMove', function() {
            slider.pause();
        });
        slider.events.on('dragEnd', function() {
            slider.pause();
        });
    });
});