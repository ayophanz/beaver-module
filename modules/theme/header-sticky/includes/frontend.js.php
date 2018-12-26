(function($) {
	$(function() {
		var defaultLogo = $('.header-sticky .logo img').attr("src");
		var scrollLogo = $('.header-sticky .logo img').attr("data-scroll-logo");
		var $window = $(window);
		$window.resize(function resize() {
			if ($(window).width() > 767) {
				$(window).scroll(function() {
					if ($(this).scrollTop() > 1){
						$('.header-sticky').addClass("sticky");
						$('.header-sticky .logo img').attr("src", scrollLogo);
					}
					else{
						$('.header-sticky').removeClass("sticky");
						$('.header-sticky .logo img').attr("src", defaultLogo);
					}
				});
			} else {
				$(window).scroll(function() {
					if ($(this).scrollTop() > 1){
						$('.header-sticky').removeClass("sticky");
						$('.header-sticky .logo img').attr("src", defaultLogo);
					}
					else{
						$('.header-sticky').removeClass("sticky");
						$('.header-sticky .logo img').attr("src", defaultLogo);
					}
				});
			}
			
			setTimeout(function(){
				stickyBtn();
			}, 400);
			
		}).trigger('resize');

		
		var distance = $('body').offset().top;
		$window = $(window);
		if ( $window.scrollTop() > 0 ) {
			$('.header-sticky').addClass('sticky');
		}
		$window.scroll(function() {
			if ( $window.scrollTop() >= distance ) {
				$('.header-sticky').addClass('sticky');
			} else {
				$('.header-sticky').addClass('sticky');
			}
		});

		function stickyBtn() {
			var btnWidth = $('.header-sticky .btn').outerWidth();
			$('#primary-menu, .header-sticky .btn + #main-menu #mega-menu-wrap-primary-menu #mega-menu-primary-menu').css('padding-right', 10+btnWidth+'px');
			$('.header-sticky #main-menu .mega-menu-toggle .mega-toggle-block:last-child').css('margin-right', 10+btnWidth+'px');
			$('#responsive-menu').css('margin-right', 30+btnWidth+'px');
		}
		$( '.fl-builder-content' ).on( 'fl-builder.layout-rendered', stickyBtn );

	});
})(jQuery);