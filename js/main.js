jQuery(document).ready(function ($) {

    $('body').on('click', '.first-search-input-wrap .category-toggle-button', function (e) {

        $('body').toggleClass('category-on'); // add class to body
    });

    $('body').on('click', '.cat-overlay, .mob-category .close', function (e) {

        $('body').removeClass('category-on'); // remove class from body
    });

    $('body').on('click', '.togMenu', function (e) {

        $('body').toggleClass('mob-menu-on'); // add class to body
    });

    $('body').on('click', '.cat-overlay, .mob-menu .close', function (e) {

        $('body').removeClass('mob-menu-on'); // remove class from body
    });


    /*sub toggle js*/


    $('.mob-menu .main-navigation li.has-sub-menu').append('<span class="sub-toggle"> <i class="icon-arrow-down"></i> </span>');
    $('.mob-menu .main-navigation .mega-menu .mega-sec').append('<span class="sub-toggle"> <i class="icon-arrow-down"></i> </span>');


    $('.mob-menu .sub-toggle').on('click', function () {

        $(this).toggleClass('active-submenu');

        $(this).parent('.has-sub-menu').children('.mega-menu').first().slideToggle('medium');
        $(this).parent('.has-sub-menu').children('ul.sub-menu').first().slideToggle('medium');
        $(this).parent('.mega-sec').children('ul.mega-sub-menu').first().slideToggle('medium');

        $(this).parent('.page_item_has_children').children('ul.children').first().slideToggle('medium');

        if ($(this).hasClass('active-submenu')) {

            $(this).find('.icon-arrow-down').removeClass('icon-arrow-down').addClass('icon-arrow-up');

        } else {

            $(this).find('.icon-arrow-up').removeClass('icon-arrow-up').addClass('icon-arrow-down');
        }

    });


    /*cat toggle js*/

    $(".category-header").click(function () {
        $(".header .category-nav").fadeToggle("fast", "linear");
    });


    /*main banner*/

    $(".layout-1 .slider-group").owlCarousel({
        loop: true,
        margin: 10,
        items: 1,
        autoplay: true,
    });

    $(".layout-2 .slider-group").owlCarousel({
        loop: true,
        margin: 0,
        items: 1,
        autoplay: true,
        animateOut: 'fadeOut',
        smartSpeed: 250,
        dots: false,
    });

    $(".layout-3 .banner-slider").owlCarousel({
        loop: true,
        margin: 0,
        items: 1,
        autoplay: true,
        animateOut: 'fadeOut',
        smartSpeed: 250,
        dots: false,
    });

    $(".partner-slider").owlCarousel({
        loop: true,
        margin: 30,
        items: 5,
        autoplay: true,
        smartSpeed: 350,
        dots: false,
    });
    $(".blog-slider").owlCarousel({
        loop: false,
        margin: 30,
        items: 3,
        autoplay: true,
        smartSpeed: 350,
        dots: false,
        responsive: {
            0: {
                items: 1,
            },
            640: {
                items: 2,
            },

            1000: {
                items: 3,
            }
        }
    });


    $(".product-list-carousel").owlCarousel({
        loop: true,
        margin: 15,
        items: 5,
        autoplay: true,
        smartSpeed: 350,
        dots: false,
        responsive: {
            0: {
                items: 1,
            },
            560: {
                items: 3,
            },
            768: {
                items: 4,
            },
            1000: {
                items: 5,
            }
        }
    });

    $(".product-list-carousel2").owlCarousel({
        loop: true,
        margin: 10,
        items: 3,
        autoplay: true,
        smartSpeed: 350,
        dots: false,
    });

    $(".product-Cwrap-slide").owlCarousel({
        loop: true,
        margin: 30,
        items: 3,
        autoplay: true,
        dots: false,
        nav: true,
        responsive: {
            0: {
                items: 1,
            },
            560: {
                items: 1,
            },
            768: {
                items: 2,
            },
            1100: {
                items: 3,
            }
        }
    });

    $(".product-Cwrap-slide-horizontal").owlCarousel({
        loop: true,
        margin: 30,
        items: 2,
        autoplay: true,
        dots: false,
        nav: true,
        responsive: {
            0: {
                items: 1,
            },
            1100: {
                items: 2,
            }
        }
    });



    /*Search pop up*/

    $(".header-cart .pop-up-button").click(function () {
        $(".pop-up-search").addClass("open");
    });
    $(".nav-cart .pop-up-button").click(function () {
        $(".pop-up-search").addClass("open");
    });

    $(".pop-close").click(function () {
        $(".pop-up-search").removeClass("open");
    });


    /**
     * Header search form, ajax.
     */
    var form = document.getElementById('galaxy-store-header-search');
    if (null !== form) {

        var searchField = '#header-search-keyword';
        var categoryField = '#header-search-product-category';
        $(form).on('input change paste', `${searchField}, ${categoryField}`, function () {
            var keyword, category = '';
            keyword = $(searchField).val();
            category = $(categoryField).find(':selected').val();

            $.ajax({
                url: galaxy_store.ajaxurl,
                type: 'post',
                data: {
                    action: 'galaxy_store_ajax_search',
                    keyword,
                    category
                },
                success: function (res) {
                    var results = '';
                    results = true === res.success && 'undefined' !== typeof res.data ? res.data : `<li class="no-item-found">${galaxy_store.notFound}</li>`;
                    $(form).find('#search-results').html(results);
                }
            });
            return;
        });

        var clickedItem = '#search-results > .matched-item > a';
        $(document).on('click', clickedItem, function(e) {
            e.preventDefault();
            var matchedItemText = '';
            matchedItemText = $(this).text();
            $(searchField).val(matchedItemText);
            return;
        });

    }


    /*countdown js*/

    $(".date-count").countdown({
        since: new Date(2020, 1 - 1, 25)
    });

    /*
    ==========================
    = Product category filter tab widget
    =======================================
    */

    $('div.tab-content').slice(1).hide();

    $('body').on('click', '.tab-nav ul li a', function (e) {

        e.preventDefault();

        var parentLi = $(this).parent();

        var activeA = parentLi.siblings().find('a.active');

        var activeARel = activeA.attr('rel');

        $(this).parents('div.tab-wrapper').find('div#' + activeARel).hide();

        activeA.removeClass('active');

        $(this).addClass('active');

        var currentARel = $(this).attr('rel');

        $(this).parents('div.tab-wrapper').find('div#' + currentARel).show();

    });

});