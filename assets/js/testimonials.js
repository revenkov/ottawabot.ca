import $ from 'jquery/src/jquery';
import { tns } from 'tiny-slider';

$(document).ready(function($) {
    $('.testimonialsSlider').each(function(index, element) {
        const $carousel = $(element);
        const $container = $carousel.find('[class*="__slides"]');
        tns({
            container: $container[0],
            items: 1,
            loop: false,
            gutter: 0,
            autoplay: false,
            autoplayButtonOutput: false,
            autoplayHoverPause: true,
            nav: true,
            navPosition: 'bottom',
            controls: false,
        });
    })
})