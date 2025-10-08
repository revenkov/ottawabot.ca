import $ from 'jquery/src/jquery';

$(document).ready(function ($) {

    $('.podcastListing').each(function (index, element) {
        let loading = false;
        var $listing = $(element);
        var $itemsContainer = $listing.find('.podcastListing__items');
        var itemSelector = '.podcastListing__item';
        var $items = $itemsContainer.find(itemSelector);
        var $pagination = $listing.find('.podcastListing__pagination');
        var itemsPerPage = 2;
        var visibleItemsNum = itemsPerPage;

        function filterItems() {
            $items.each(function (index, element) {
                var $item = $(element);
                $item.toggle( index < visibleItemsNum );
            });

            $pagination.toggle( visibleItemsNum < $items.length );
        }

        $(window).on('scroll', function(e) {
            var scrollTop = $(document).scrollTop();
            var windowHeight = $(window).height();
            var windowBottom = scrollTop + windowHeight;
            if ( $pagination.offset().top < windowBottom && !loading ) {
                loading = true;
                setTimeout(function () {
                    visibleItemsNum = visibleItemsNum + itemsPerPage;
                    filterItems();
                    loading = false;
                    $(window).trigger('scroll');
                }, 1000);
            }
        });

        filterItems();
    });
});