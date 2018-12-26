(function($) {
	$(function() {
		<?php if ( $settings->height == 'fullscreen' ) { ?>
			var $window = $(window);
			$window.resize(function resize() {
				var adminbarHeight = 0,
					headHeight = 0;
				if ($('#wpadminbar').length ) {
					var adminbarHeight = $("#wpadminbar").outerHeight();
				}
				var pageHeight = $(window).outerHeight(),
					<?php if ( $settings->fullscreen_setting == 'yes' ) { ?>
					headHeight = $("#header").outerHeight(),
					<?php } ?>
					sliderHeight = pageHeight - headHeight - adminbarHeight;
				$(".fl-node-<?php echo $id; ?> .fullscreen .fl-row-fixed-width .slider-info").css('height', sliderHeight);
				
			}).trigger('resize');
		<?php } ?>

		<?php 
			$autoplay = ( $settings->autoplay <> '' ) ? $settings->autoplay : 'false';
			$dots = ( $settings->show_dots <> '' ) ? $settings->show_dots : 'true';
			$nav = ( $settings->show_nav <> '' ) ? $settings->show_nav : 'true';
			$delay = $settings->autoplay_delay <> '' ? $settings->autoplay_delay : '7000';
			$speed = $settings->autoplay_speed <> '' ? $settings->autoplay_speed : '1500'; 
		?>
		var owl = $(".fl-node-<?php echo $id; ?> .owl-carousel");
		owl.owlCarousel({
			items: 1,
			margin: 0,
			navText: ['',''],
			autoplay: <?php echo $autoplay; ?>,
			autoplayTimeout: <?php echo $delay ?>,
			autoplaySpeed: <?php echo $speed ?>,
			dragEndSpeed: <?php echo $speed ?>,
			autoplayHoverPause: <?php echo $autoplay; ?>,
			dotsSpeed: <?php echo $speed ?>,
			navSpeed: <?php echo $speed ?>,
			fluidSpeed: <?php echo $speed ?>,
			smartSpeed: <?php echo $speed ?>,
			<?php for($i = 0; $i < count($settings->items); $i++) : if(!is_object($settings->items[$i])) continue; endfor; 
			if ( $i > 1 ) { ?>
				loop: true,
				dots: <?php echo $dots; ?>,
				nav: <?php echo $nav; ?>,
			<?php } else { ?>
				loop: false,
				dots: false,
				nav: false,
				touchDrag: false,
			<?php } ?>
			autoHeight: true,
			<?php if ( $settings->loop_animation == 'fade' ) { ?>
			animateOut: 'fadeOut',
			responsive : {
				0 : {
					mouseDrag: true,
				},
				1280 : {
					mouseDrag: false,
				}
			}
			<?php } ?>
		});
		
		<?php if ( $autoplay === 'true' ) { ?>
			$.fn.visible = function(partial) {		
				var $t            = $(this),
					$w            = $(window),
					viewTop       = $w.scrollTop(),
					viewBottom    = viewTop + $w.height(),
					_top          = $t.offset().top,
					_bottom       = _top + $t.height(),
					compareTop    = partial === true ? _bottom : _top,
					compareBottom = partial === true ? _top : _bottom;		
				return ((compareBottom <= viewBottom) && (compareTop >= viewTop));
			};
			$(window).on("load scroll resize", function(){
				if (owl.visible(true)) {
					owl.trigger('play.owl.autoplay')
				} else {
					owl.trigger('stop.owl.autoplay')
				}
			});
			$(window).on("load scroll resize", function(){
				if (owl.visible(true)) {
					owl.trigger('play.owl.autoplay')
				} else {
					owl.trigger('stop.owl.autoplay')
				}
			});
		<?php } ?>
	});
	
})(jQuery);