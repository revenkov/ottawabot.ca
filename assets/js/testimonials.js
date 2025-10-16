import $ from 'jquery/src/jquery';
import { tns } from 'tiny-slider';

$(document).ready(function($) {
    $('.testimonialsSlider').each(function(index, element) {
        const $carousel = $(element);
        const $container = $carousel.find('[class*="__slides"]');
        const slider = tns({
            container: $container[0],
            items: 1,
            loop: true,
            gutter: 36,
            autoplay: true,
            autoplayButtonOutput: false,
            autoplayHoverPause: true,
            autoplayTimeout: 5000,
            nav: true,
            navPosition: 'bottom',
            controls: false,
            mouseDrag: true,
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
    })
})