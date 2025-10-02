import $ from 'jquery/src/jquery';
import 'jquery-ui/ui/widgets/accordion';

const $window = $(window);
const $document = $(document);
$(document).ready(function($) {
    const $timeline = $('.timeline');

    if ( $timeline.length === 0 ) return;

    const $timelineNav = $('.timeline__nav');
    const $timelineItems = $('.timeline__items');
    const styles = window.getComputedStyle(document.body);
    const sectionMargin = parseInt(styles.getPropertyValue('--section-margin'));
    const headerOffset = parseInt(styles.getPropertyValue('--header-offset'));
    function timelineHandler() {
        $timeline.css('height', '');
        $timelineNav.css('height', '' );
        $timelineItems.css('height', '' );
        $timelineItems.find('.timeline__item:last-child').css('min-height', '');

        $timelineItems.find('.timeline__item:last-child').css('min-height', window.outerHeight - sectionMargin * 2 - headerOffset);
        $timeline.css('height', $timelineItems.outerHeight());
        $timelineNav.css('height', window.outerHeight - sectionMargin * 2 - headerOffset );
        $timelineItems.css('height', window.outerHeight - sectionMargin * 2 - headerOffset );
    }
    function positionTimeline() {
        let scrollTop = $document.scrollTop();
        $timelineItems.scrollTop( scrollTop - $timeline.offset().top + sectionMargin + headerOffset );
    }
    $document.on('scroll', positionTimeline);
    $timelineItems.on('scroll', function () {
        let scrollTop = $(this).scrollTop();
        //console.log( scrollTop);
        const $items = $(this).find('.timeline__item');
        $items.each(function (index, element) {
            if ( parseInt($(element).offset().top - $timeline.offset().top) <= scrollTop /*&& $(element).position().top + $(element).outerHeight() <= scrollTop || $(element).position().top + $(element).outerHeight === scrollTop + $items.outerHeight()*/ ) {
                $items.not(this).removeClass('active');
                $(element).addClass('active');
                const id = $(element).attr('id');
                $timelineNav.find('button').removeClass('active');
                $timelineNav.find('button[data-id="'+id+'"]').addClass('active');
            }
        });
    });
    $timelineNav.on('click', 'button', function (e) {
        const id = $(this).data('id');
        const $item = $timelineItems.find('#'+id);
        if ( $item.length ) {
            window.scrollTo({
                left: 0,
                top: $timelineItems.offset().top + $item.position().top - sectionMargin - headerOffset,
                behavior: 'smooth'
            });
        }
    });
    timelineHandler();
    $( ".timeline .accordion" )
        .on( "accordionactivate", function( event, ui ) {
            let scrollTop = $timelineItems.scrollTop();
            let documentTop = $document.scrollTop();
            timelineHandler();
            //$timelineItems.trigger('scroll');
            $timelineItems.scrollTop( scrollTop );
            //console.log( ui.newHeader.offset().top - $timeline.offset().top )
            $document.scrollTop( documentTop );
            //$document.scrollTop( $(ui.newHeader).offset().top - $timeline.offset().top );
            //$timelineItems.scrollTop( $(ui.newHeader).offset().top );
            /*window.scrollTo({
                left: 0,
                top: $(ui.newHeader).offset().top,
                behavior: 'smooth'
            });*/
            /*if ( scrollTop > $timeline.offset().top && scrollTop > $timeline.offset().top + $timeline.outerHeight() + sectionMargin*2 + headerOffset ) {
                $document.scrollTop( scrollTop + $timeline.offset().top - sectionMargin - headerOffset );
            }
            */
        } )
        .on( "accordioncreate", function( event, ui ) {
            timelineHandler();
            positionTimeline();
        } )
        .each(function(index, element) {
            $(element).accordion({
                active: index === 0 ? 0 : false,
                collapsible: true,
                heightStyle: "content",
                header: '.accordion__header',
            });
        })
    $window.resize(timelineHandler);
});