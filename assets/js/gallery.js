import $ from 'jquery/src/jquery';
//import AOS from "aos";

$(document).ready(function ($) {

    $('.galleryListing').each(function (index, element) {
        let loading = false;
        var $listing = $(element);
        var $itemsContainer = $listing.find('.galleryListing__items');
        var itemSelector = '.galleryListing__item';
        var $pagination = $listing.find('.galleryListing__pagination');
        let page = 2;

        $(window).on('scroll load', function(e) {
            var scrollTop = $(document).scrollTop();
            var windowBottom = scrollTop + window.outerHeight;
            if ( $pagination.is(':visible') && $pagination.offset().top < windowBottom && !loading ) {
                loading = true;
                $.ajax({
                    url: location.href,
                    type: 'GET',
                    data: {
                        pagination: page,
                    },
                    success: function(response) {
                        const $html = $(response);
                        const $newItems = $html.find(itemSelector);
                        $itemsContainer.append($newItems);
                        $pagination.toggle( $newItems.length === 6 );
                        page++;
                        loading = false;
                    }
                })
            }
        });
    });
});