import $ from 'jquery/src/jquery';

$(document).ready(function ($) {

    $('.newsletterListing').each(function (index, element) {
        let loading = false;
        var $listing = $(element);
        var $itemsContainer = $listing.find('.newsletterListing__items');
        var itemSelector = '.newsletterListing__item';
        var $items = $itemsContainer.find(itemSelector);
        var $pagination = $listing.find('.newsletterListing__pagination');
        var itemsPerPage = 6;
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