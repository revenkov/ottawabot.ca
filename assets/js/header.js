import $ from 'jquery/src/jquery';

$(window).on("load scroll", function () {
    let scrollTop = $(document).scrollTop();
    $('.siteHeader').toggleClass('siteHeader--sticky', Boolean(scrollTop));
});