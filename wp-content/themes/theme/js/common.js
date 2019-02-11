jQuery.noConflict();
(function($) {
    $(function() {

        $window = $(window);

        function equalizer() {
            var row = $('.equalizer');

            $.each(row, function() {
                var maxh = 0;
                $.each($(this).children('.column'), function() {
                    $(this).css('height','auto');
                    if($(this).height() > maxh)
                        maxh=$(this).height();
                });

                $.each($(this).children('.column'), function() {
                    $(this).height(maxh);
                });
            });
        }
        equalizer();
        $window.load(equalizer);
        $window.change(equalizer);
        $window.resize(equalizer);

        function sameHeight() {
            var row = $('#featured');

            $.each(row, function() {
                var maxh = 0;
                $.each($(this).find('.prodict-inner'), function() {
                    $(this).css('height','auto');
                    if($(this).height() > maxh)
                        maxh=$(this).height();
                });

                $.each($(this).find('.prodict-inner'), function() {
                    $(this).height(maxh);
                });
            });
        }
        $window.load(sameHeight);
        $window.resize(sameHeight);

        $('.textwidget').each(function(){
            $(this).replaceWith( $(this).contents() );
        });

        $('a[href*=".jpg"], a[href*=".jpeg"], a[href*=".png"]').colorbox({
            maxWidth: "100%",
            maxHeight: "80%"
        });

        $('.filter_toggler').on('click', function(){
            $(this).toggleClass('open');
            $('.main_nav').slideToggle();
        });

        $('input[type=tel]').mask('+38 (999) 999-99-99');

        function promotionColumnHeight() {
            var smallPromo = $('.small-promotion'),
                mediumPromo = $('.medium-promotion'),
                verticalPromo = $('.vertical-promotion');

            $.each(smallPromo, function(){
                var thisWidth = $(this).width();
                $(this).height(thisWidth);
            });

            var mediumWidth = mediumPromo.width();
            mediumPromo.height( ( mediumWidth / 2 ) - 5 );

            var verticalWidth = verticalPromo.width();
            verticalPromo.height( ( verticalWidth * 2 ) + 10 );

            $('#promotion a img').imageScale();
        }

        promotionColumnHeight();
        $(window).resize(promotionColumnHeight);

        var owl = $('#featured, .testimonials');
        owl.owlCarousel({
            loop: false,
            nav: true,
            items: 1,
            dots: false,
            margin: 40,
            autoplayTimeout: 3000,
            autoplayHoverPause: true,
            autoplay: true,
            onInitialized: hideArrow,
            onTranslated: hideArrow,
            responsive: {
                640 : {
                    items: 2
                },
                1024 : {
                    items: 3
                },
                1280 : {
                    items: 4
                }
            }
        });

        $('.brands-list').owlCarousel({
            loop: true,
            nav: true,
            items: 1,
            dots: false,
            margin: 60,
            autoplayTimeout: 3000,
            autoplayHoverPause: true,
            autoplay: true,
            responsive: {
                480 : {
                    items: 2
                },
                640 : {
                    items: 3
                },
                1024 : {
                    items: 4
                },
                1280 : {
                    items: 5
                }
            }
        });

        $('.thumbnails').owlCarousel({
            loop: false,
            nav: true,
            items: 2,
            dots: false,
            margin: 15,
            onInitialized: hideArrow,
            onTranslated: hideArrow,
            responsive: {
                640 : {
                    items: 3
                },
                1024 : {
                    items: 5
                }
            }
        });

        function hideArrow() {
            $('.owl-carousel').each(function(){
                var first = $(this).find('.owl-item:first'),
                    last = $(this).find('.owl-item:last'),
                    carousel = $(this);

                if ( last.hasClass('active') ) {
                    carousel.find('.owl-next').hide();
                }

                if ( first.hasClass('active') ) {
                    carousel.find('.owl-prev').hide();
                }
            });
        }

        $('.top-slider').owlCarousel({
            loop: true,
            nav: true,
            items: 1,
            dots: false,
            autoplay: true,
            autoplayTimeout: 4000
        });

        $('.open-search').on('click', function(){
            $('.searchbox').fadeIn();
            $('.searchbox input').focus();
        });

        $('.searchbox .close').on('click', function(){
            $('.searchbox').fadeOut();
        });

        $('.variations input[type="radio"], .variations-one-click input[type="radio"]').each(function(){
            this.checked = false;
        });

        $('.q_down').on('click', function(event){
            event.preventDefault();
            var val = $(this).next('.quantity_wanted').val();
            if ( val <= 1 ) {
                $(this).next('.quantity_wanted').val(1);
            } else {
                val = parseInt(val) - 1;
                $(this).next('.quantity_wanted').val( val);
            }
        });

        $('.q_up').on('click', function(event){
            event.preventDefault();
            var val = $(this).prev('.quantity_wanted').val();
            if ( val <= 99 ) {
                val = parseInt(val) + 1;
                $(this).prev('.quantity_wanted').val( val );
            } else {
                $(this).prev('.quantity_wanted').val(99);
            }
        });

        if ( $('.favourites span').text() !== '0' ) {
            $('.favourites span').css('opacity', '1');
        }

        $('#leave-a-reply').on('click', function(){
            $('.feedback').slideUp();
            $('#review_form_wrapper').slideDown();
        });

        $('#one-click').on('click', function(){
            var elem = $('.one-click-form');

            elem.fadeIn().css({
                'margin-left': -elem.outerWidth() / 2,
                'margin-top': -elem.outerHeight() / 2
            });

            $('.outer').fadeIn();

            if ( $(window).width() < 640 ) {
                console.log('small')
                $('body,html').animate({
                    scrollTop: 0
                }, 600);
            }
        });

        $('span.user').on('click', function(){
            var elem = $('.auth');

            elem.fadeIn().css({
                'margin-left': -elem.outerWidth() / 2,
                'margin-top': -elem.outerHeight() / 2
            });

            $('.outer').fadeIn();

            $('body').addClass('blur');
        });

        function banners() {
            var banners = $('.banners');

            banners.css({
                'margin-top': - ( banners.outerHeight() / 2 ),
                'margin-left': - ( banners.outerWidth() / 2 )
            });

            $('.banners .close').on('click', function(){
                $(this).parent().fadeOut();
            });
        }

        banners();
        $(window).resize(banners);

        $(window).on('load', function(){
            $('.banners').animate({
                opacity: 1
            }, 500);
        });

        function adv() {
            if ( $(window).width() > 640 ) {
                $('.advantages > div').on('click', function(){
                    var index = $('.advantages > div').index(this);
                    $('.advantages > div').removeClass('adv-active');
                    $(this).addClass('adv-active');

                    $('.advantage-full-text .advantage-item').slideUp();
                    $('.advantage-full-text .advantage-item').eq(index).slideDown();
                    $('.advantage-full-text').css('border-bottom', '1px solid #e9e9e9');
                });

                $('.advantage-full-text .close').on('click', function(){
                    $('.advantages > div').removeClass('adv-active');
                    $('.advantage-full-text .advantage-item').slideUp();
                    $('.advantage-full-text').css('border-bottom', 'none');
                });
            }
        }
        adv();
        $(window).resize(adv);



        function allClose() {
            $('.outer').fadeOut();
            $('body').removeClass('blur');
            $('.one-click-form, .auth, .one-click-form-single').fadeOut();
        }

        $('.outer').on('click', function(){
            allClose();
        });

        $(document).keydown(function(eventObject) {
            if (eventObject.which == 27) {
                allClose();
            }
        });



        $('.show-register').on('click', function(){
            $('.login-container, .register-container').slideToggle();
        });

        $('.product-link').on('click', function(){
            var form = $('.one-click-form');
            var modelImg = $(this).parent().children('#i-model-img').val(),
                modelName = $(this).parent().children('#i-model-name').val(),
                modelPrice = $(this).parent().children('#i-model-price').val();

            $('#model-name').text(modelName);
            $('#model').val(modelName);
            $('#model-img').html('<img src="' + modelImg + '" />' ),
            $('#model-price .amount').html( modelPrice + " грн.");
            form.fadeIn();
            form.fadeIn().css({
                'margin-left': -form.outerWidth() / 2,
                'margin-top': -form.outerHeight() / 2
            });
            $('.outer').fadeIn();
            $('body').addClass('blur');
            if ( $(window).width() < 640 ) {
                //console.log('small')
                $('body,html').animate({
                    scrollTop: 0
                }, 600);
            }
        });

        $('#one-click-single').on('click', function(){
            var form = $('.one-click-form-single');
            form.fadeIn();
            form.fadeIn().css({
                'margin-left': -form.outerWidth() / 2,
                'margin-top': -form.outerHeight() / 2
            });
            $('.outer').fadeIn();
            if ( $(window).width() < 640 ) {
                //console.log('small')
                $('body,html').animate({
                    scrollTop: 0
                }, 600);
            }
        });

        function success() {
            var form_data = $('#fast-form').serialize();
            $.ajax({
            type: "POST",
            url: "https://www.myshoes.space/wp-content/themes/theme/one-click-send.php",
            data: form_data,
            success: function() {
                   $('.success-message').fadeIn();
                   $('.error-message').hide();
                   setTimeout(function() { $('.one-click-form, .outer').fadeOut(); }, 3000);
               }
            });
        }

        function success_single() {
            var form_data = $('#fast-form-single').serialize();
            $.ajax({
            type: "POST",
            url: "https://www.myshoes.space/wp-content/themes/theme/one-click-send-single.php",
            data: form_data,
            success: function() {
                   $('.success-message').fadeIn();
                   $('.error-message').hide();
                   setTimeout(function() { $('.one-click-form-single, .outer').fadeOut(); }, 3000);
               }
            });
        }

        $(".one-click-buy").click(function(e) {
            var o_name = $('#o-name').val().length,
                o_tel = $('#o-tel').val().length;

            if ( ( o_name > 2 ) && ( o_tel > 8 ) ) { success(); }
            else {
                $('.error-message').fadeIn();
            }
        });

        $('.one-click-buy-single').click(function(e) {
            var o_name_single = $('#o-name-single').val().length,
                o_tel_single = $('#o-tel-single').val().length;

            if ( ( o_name_single > 2 ) && ( o_tel_single > 8 ) ) { success_single(); }
            else { $('.error-message').fadeIn(); }
        });

        function aboutEntry() {
            if ( $(window).width() > 640 ) {
                $('.about-entry-odd').each(function(){
                    $(this).children('.simple-image').appendTo( $(this) );
                });
            }
        }
        aboutEntry();
        $(window).resize(aboutEntry);

        function footer() {
            var footer = $('footer').innerHeight();

            $('footer').css('margin-top', -footer);
            $('.layout').css('padding-bottom', footer);

        }
        footer();
        $(window).resize(footer);

        $('a[href^="#reset"]').on('click', function(){
            $('.variations input[type="radio"]').prop({ checked: false});
            //$('.single_add_to_cart_button').prop({ disabled: true });
            $(this).fadeOut();
        });

        $('a[href^="#featured"]').on('click', function(event) {
            event.preventDefault();
            var id = $(this).attr('href'),
                top = $(id).offset().top;

            $('body,html').animate({
                scrollTop: top
            }, 1000);
        });

        $('.woocommerce-message, .woocommerce-info, .woocommerce-error').each(function(){

            $(this).css({
                'margin-left': -$(this).outerWidth() / 2,
                'margin-top': -$(this).outerHeight() / 2
            });

            $('.woocommerce-message, .woocommerce-info, .woocommerce-error').animate({ opacity: 1 });

            //setTimeout( function() { $('.woocommerce-message, .woocommerce-info, .woocommerce-error').fadeOut() },10000 );
        });

        $('a[href^="#callback"]').on('click', function(event){
            event.preventDefault();
            var elem = $('.callback-message');

            elem.css({
                'margin-left': -elem.outerWidth() / 2,
                'margin-top': -elem.outerHeight() / 2
            });

            elem.fadeIn();
        });

        $('a[href^="#feedback"]').on('click', function(event){
            event.preventDefault();
            var elem = $('.feedback-message');

            elem.css({
                'margin-left': -elem.innerWidth() / 2,
                'margin-top': -elem.innerHeight() / 2
            });

            elem.fadeIn();
        });

        $('.close').on('click', function(){
            $('.woocommerce-message, .woocommerce-info, .outer, .one-click-form, .auth, .woocommerce-error, .feedback-message, .callback-message, .one-click-form-single').fadeOut();
        });

        function mainNav() {
            if ( $(window).width() > 640 ) {
                $('.filters').show();
            }
        }

        mainNav();
        $(window).resize(mainNav);

        $.fn.extend({
          toggleText: function (a, b){
            if (this.text() == a) { this.text(b); }
            else { this.text(a) }
            }
        });

        $('.show-filter > span').on('click', function(){
            var text = $(this).find('span').text;
            $(this).find('span').toggleText( 'Показать фильтр' , 'Спрятать фильтр' );
            $('.filters').slideToggle();
        });

        $('.show-phones').on('click', function(){
            $('.hidden-phones').fadeToggle();
            $(this).children().toggleClass('fa-phone fa-times');
        });


        function open(elem) {
		    if (document.createEvent) {
		        var e = document.createEvent("MouseEvents");
		        e.initMouseEvent("mousedown", true, true, window, 0, 0, 0, 0, 0, false, false, false, false, 0, null);
		        elem[0].dispatchEvent(e);
		    } else if (element.fireEvent) {
		        elem[0].fireEvent("onmousedown");
		    }
		}


        $("#city_input").keyup(function() {
            cityList();
            //open( $('#city_list') );
        });

        function cityList() {
            var city_input_value = $("#city_input").val();
            var upletter = city_input_value.charAt(0).toUpperCase() + city_input_value.slice(1).toLowerCase();
            $.post('/NovaPoshta/city.php',{city_key: upletter}, function(data){
                $('#city_list').html(data).fadeIn();

                if ( $('#city_list option').length === 1 ) {
                    var thisCity = $('#city_list option').val();

                    $('#city_input').val(thisCity);

                    $.post('/NovaPoshta/ajax.php',{ id: thisCity }, function(data){
                        $('#street').html(data).prop('disabled', false);
                        $('#city_list').fadeOut();
                        var street = $('#street').val();
                        $('#delivery_address').val(street);
                    });
                }

                if ( $('#city_list option').length === 0 ) {
                	$('#city_list').fadeOut();
                }
            });
        }

        $("#city_list").on('change', function(){
            var city_list = $(this).val();

            $.post('/NovaPoshta/ajax.php',{ id: city_list }, function(data){
                $('#street').html(data).prop('disabled', false);
                $('#city_list').fadeOut();
                var street = $('#street').val();
                $('#delivery_address').val(street);
            });

            $( "#city_input").val(city_list);
        });

        $('#street').on('change', function(){
            var street = $(this).val();
            $('#delivery_address').val(street);
            $('#city_list').fadeOut();
        });

        $('.city_link').on('click', function(e){
            e.preventDefault();
            var city_link = $(this).text();
            $('#city_input').val(city_link);

            cityList();
        });





        function shippingMethod() {
            if ( $('#shipping_method_0_free_shipping').prop('checked') ) {
                $('.extra-fields').show();
            } else {
                $('.extra-fields').hide();
            }
        }

        shippingMethod();

        $('.thumbnails .zoom:first').addClass('current-thumb');
        $('.thumbnails').find("a.zoom").unbind('click');
        $('.thumbnails .zoom').on('click', function() {
            $('.thumbnails .zoom').removeClass('current-thumb');
            $(this).addClass('current-thumb');
            var photo_fullsize = $(this).find('img').attr('src').replace('-180x180','');
            var photo_srcset = $(this).find('img').attr('srcset').replace('-180x180','');
            $('.woocommerce-main-image img').attr('src', photo_fullsize);
            $('.woocommerce-main-image img').attr('srcset', photo_srcset);
            return false;
        });

        var sym = $('.product-description').height();

        if ( sym > 70 ) {
            $('.product-description').css({
                height: 70,
                'overflow': 'hidden'
            }).addClass('sliced');
            $('.product-description').after('<div class="open-sliced"><span class="dotted">Развернуть</span></div>');
        }

        $('.open-sliced span').on('click', function(){
            $(this).toggleText( 'Развернуть' , 'Свернуть' );
            if ( $(this).hasClass('slice-opened') ) {
                $(this).removeClass('slice-opened');
                $('.product-description').animate({
                    height: 70
                }).addClass('sliced');
            } else {
                $(this).addClass('slice-opened');
                $('.product-description').animate({
                    height: sym
                }).removeClass('sliced');
            }
        });

        $('#billing_email').after('<p><small><em>Обязуемся не высылать Вам спам-контент.</em></small></p>');

        $("#liqPay").on('click', function(){
			$('#form_responce').submit();
		});

    });
})(jQuery)