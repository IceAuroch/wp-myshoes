jQuery( document ).ready( function($){
    var update_wishlist_count = function() {
        $.ajax({
            data      : {
                action: 'update_wishlist_count'
            },
            success   : function (data) {
                $('.favourites span').html( data.substring(0, data.length - 1) ).css('opacity', '1');
            },

            url: yith_wcwl_l10n.ajax_url
        });
    };

    $('body').on( 'added_to_wishlist removed_from_wishlist', update_wishlist_count );
} );