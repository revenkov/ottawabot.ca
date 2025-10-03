import $ from 'jquery/src/jquery';
import { Flip } from 'number-flip';

function initFlip() {
    $('.number').each(function(index, element) {
        let scrollTop = $(document).scrollTop();
        if ( !$(element).hasClass('run') && $(element).offset().top < scrollTop + window.outerHeight ) {
            $(element).addClass('run');
            new Flip({
                node: $(element).find('.number__counter')[0],
                from: 0,
                to: $(element).data('to'),
                separator: ',',
                duration: 1,
                direct: false
            });
        }
    })
}
$(document).ready(initFlip);
$(document).on('scroll', initFlip);