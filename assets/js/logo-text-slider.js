import $ from 'jquery/src/jquery';
import { tns } from 'tiny-slider';

$(document).ready(function($) {
    $('.logoTextSlider').each(function(index, element) {
        const $element = $(element);
        const $container = $element.find('[class*="__slides"]');
        const slider = tns({
            container: $container[0],
            loop: true,
            gutter: 36,
            autoplay: true,
            autoplayButtonOutput: false,
            autoplayHoverPause: true,
            nav: true,
            navPosition: 'bottom',
            controls: false,
            autoHeight: true,
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
    });
});