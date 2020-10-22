jQuery(document).ready(function ($) {
	$(".banner__slider").owlCarousel({
      loop: true,
      margin: 10,
      items: 1,
      autoplay: true,
  });
  $(".product-cat__slider").owlCarousel({
      loop: true,
      margin: 15,
      items: 5,
      autoplay: true,
      smartSpeed: 400,
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
  $(".recent-post__slider").owlCarousel({
      loop: true,
      margin: 30,
      items: 3,
      autoplay: false,
      smartSpeed: 400,
      dots: false,
      responsive: {
          0: {
              items: 1,
          },
          560: {
              items: 2,
          },
          768: {
              items: 3,
          }
      }
  });

   $('.product-cat-menu__cnt__item').slice(1).hide();

  $('body').on('click', '.product-cat-menu__tab li a', function (e) {

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
})
