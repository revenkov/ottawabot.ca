import $ from 'jquery/src/jquery';
import { tns } from 'tiny-slider';

$(document).ready(function($) {
    $('.eventsSlider').each(function(index, element) {
        const $element = $(element);
        const $container = $element.find('[class*="__slides"]');
        tns({
            container: $container[0],
            loop: true,
            gutter: 0,
            autoplay: false,
            autoplayButtonOutput: false,
            autoplayHoverPause: true,
            nav: true,
            navPosition: 'bottom',
            controls: false,
            autoHeight: true
        });
    });
});