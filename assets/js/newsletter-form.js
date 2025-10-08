import $ from 'jquery/src/jquery';
import 'jquery-validation'

$(document).ready(function ($) {
    $('.newsletterBlock__form').validate({
        ignore: [],
        errorElement: "span",
        errorPlacement: function(error, element) {
            error.appendTo( element.parent() );
        },
        submitHandler: function (form) {
            const $form = $(form);
            let $fancybox = null;
            $.ajax({
                method: 'POST',
                url: selectrum.ajax_url,
                data: $form.serialize(),
                beforeSend: function() {
                    $fancybox = $.fancybox.open('<div class="fancybox-loading"></div>', {
                        touch: false,
                        autoFocus: false,
                        smallBtn: false,
                        toolbar: false,
                        modal: true
                    });
                },
                success: function(response) {
                    if ( response.success ) {
                        $('.newsletterBlock__inner').html( response.data.content );
                        $.fancybox.close();
                    } else {
                        $fancybox.setContent( $fancybox.current, $.fancybox.defaults.btnTpl.smallBtn + response.data.content );
                    }
                }
            });
        }
    })
})