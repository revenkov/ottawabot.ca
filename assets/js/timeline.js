import $ from 'jquery/src/jquery';
import 'jquery-ui/ui/widgets/accordion';

const $window = $(window);
const $document = $(document);
$(document).ready(function($) {
    const $timeline = $('.timeline');
    const $timelineNav = $('.timeline__nav');
    const $timelineItems = $('.timeline__items');
    const styles = window.getComputedStyle(document.body);
    const sectionMargin = parseInt(styles.getPropertyValue('--section-margin'));
    const headerOffset = parseInt(styles.getPropertyValue('--header-offset'));
    function timelineHandler() {
        $timeline.css('height', '');
        $timelineNav.css('height', '' );
        $timelineItems.css('height', '' );

        $timeline.css('height', $timelineItems.outerHeight());
        $timelineNav.css('height', window.outerHeight - sectionMargin * 2 - headerOffset );
        $timelineItems.css('height', window.outerHeight - sectionMargin * 2 - headerOffset );
    }
    $document.on('scroll', function () {
        let scrollTop = $document.scrollTop();
        $timelineItems.scrollTop( scrollTop - $timeline.offset().top + sectionMargin + headerOffset );
    });
    $timelineItems.on('scroll', function () {
        let scrollTop = $(this).scrollTop();
        const $items = $(this).find('.timeline__item');
        $items.each(function (index, element) {
            if ( $(element).position().top + $items.outerHeight()/2 <= scrollTop  || $(element).position().top + $(element).outerHeight === scrollTop + $items.outerHeight() ) {
                $items.not(this).removeClass('active');
                $(element).addClass('active');
                const id = $(element).attr('id');
                $timelineNav.find('a').removeClass('active');
                $timelineNav.find('a[data-id="'+id+'"]').addClass('active');
            }
        })
    });
    $timelineNav.on('click', 'a', function (e) {
        e.preventDefault();
        const id = $(this).data('id');
        const $item = $timelineItems.find('#'+id);
        if ( $item.length ) {
            window.scrollTo({
                left: 0,
                top: $timelineItems.offset().top + $item.position().top - sectionMargin - headerOffset + 1,
                behavior: 'smooth'
            });
        }
    });
    $( ".timeline .accordion" )
        .on( "accordionactivate", function( event, ui ) {
            let scrollTop = $timelineItems.scrollTop();
            let documentTop = $document.scrollTop();
            timelineHandler();
            $timelineItems.scrollTop( scrollTop );
            $document.scrollTop( documentTop );
        } )
        .on( "accordioncreate", function( event, ui ) {
            timelineHandler();
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