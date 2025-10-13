import $ from 'jquery/src/jquery';
import { tns } from 'tiny-slider';

$(document).ready(function($) {
    $('.eventsSlider').each(function(index, element) {
        const $element = $(element);
        const $container = $element.find('[class*="__slides"]');
        tns({
            container: $container[0],
            loop: true,
            gutter: 36,
            autoplay: true,
            autoplayButtonOutput: false,
            autoplayHoverPause: true,
            autoplayTimeout: 5000,
            nav: true,
            navPosition: 'bottom',
            controls: false,
            autoHeight: true,
            mouseDrag: true,
        });
    });
});