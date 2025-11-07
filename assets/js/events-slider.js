import $ from 'jquery/src/jquery';
import { tns } from 'tiny-slider';

$(document).ready(function($) {
    $('.eventsSlider').each(function(index, element) {
        const $element = $(element);
        const $container = $element.find('[class*="__slides"]');
        const slider = tns({
            container: $container[0],
            loop: true,
            gutter: 36,
            autoplay: true,
            autoplayButtonOutput: false,
            autoplayHoverPause: true,
            autoplayTimeout: 5000,
            nav: false,
            navPosition: 'bottom',
            controls: true,
            controlsText: ['', ''],
            controlsPosition: 'bottom',
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