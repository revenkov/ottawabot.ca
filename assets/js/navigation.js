import $ from 'jquery/src/jquery';

$(document).ready(function($) {
    const $document = $(document);
    const $body = $('body');
    const $siteHeader = $('.siteHeader');
    const $siteNav = $('.siteNav');
    const $menu = {
        list: $siteNav,
        btn: $('#btnMenu'),
        btnClose: $('#btnMenuClose'),
        init: function () {
            $body.append('<div id="navOverlay" class="navOverlay"/>');

            //$menu.list.css('max-height', windowHeight);
            $document.on('scroll', function () {
                //$menu.list.css('max-height', windowHeight);
            });
            $menu.btn.on('click', $menu.toggle);
            $menu.btnClose.on('click', $menu.close);
            $menu.list.on('click', '.menu-item-link-wrapper', function (e) {
                if ( window.outerWidth < 1600 ) {
                    var $item = $(this).closest('.menu-item');
                    $item.toggleClass('open');
                    $(this).next('.sub-menu').slideToggle();
                }
            });
        },
        toggle: function (e) {
            $menu.isOpen() ? $menu.close(e) : $menu.open(e);
        },
        open: function (e) {
            e.stopPropagation();
            $siteHeader.addClass('siteHeader--navVisible');
            $menu.btn.addClass('close');
            $menu.list.addClass('siteNav--visible');
            $('#navOverlay').addClass('navOverlay--visible');
            //$body.css('overflow', 'hidden');
        },
        close: function (e) {
            $siteHeader.removeClass('siteHeader--navVisible');
            $menu.btn.removeClass('close');
            $menu.list.removeClass('siteNav--visible');
            $('#navOverlay').removeClass('navOverlay--visible');
            //$body.css('overflow', '');
        },
        isOpen: function () {
            return $menu.list.hasClass('siteNav--visible');
        }
    };
    $menu.init();
})
