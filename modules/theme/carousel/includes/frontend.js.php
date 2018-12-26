(function($) {
	$(function() {
		<?php $spacing = ( $settings->spacing <> '' ) ? $settings->spacing : '30'; ?>
		<?php $autoplay = ( $settings->autoplay <> '' ) ? $settings->autoplay : 'false'; ?>
		<?php $delay = $settings->autoplay_delay <> '' ? $settings->autoplay_delay : '3000'; ?>
		<?php $speed = $settings->autoplay_speed <> '' ? $settings->autoplay_speed : '300'; ?>
		var owl = $(".fl-node-<?php echo $id; ?> .owl-carousel");
		owl.owlCarousel({
			margin: <?php echo $spacing; ?>,
			dots: <?php echo $settings->dots; ?>,
			nav: <?php echo $settings->nav; ?>,
			navText: ['',''],
			autoplay: <?php echo $autoplay; ?>,
			autoplayTimeout: <?php echo $delay ?>,
			autoplaySpeed: <?php echo $speed ?>,
			dragEndSpeed: <?php echo $speed ?>,
			dotsSpeed: <?php echo $speed ?>,
			navSpeed: <?php echo $speed ?>,
			fluidSpeed: <?php echo $speed ?>,
			smartSpeed: <?php echo $speed ?>,
			<?php for($i = 0; $i < count($settings->items); $i++) : if(!is_object($settings->items[$i])) continue; endfor; 
			if ( $i > 1 && $settings->loop == 'true' ) { ?>
				loop: true,
			<?php } else if ( $settings->loop == 'true' ) { ?>
				loop: true,
			<?php } else { ?>
				loop: false,
				rewind: false,
			<?php } ?>
			autoHeight: true,
			responsive : {
				0 : {
					items: 1,
					slideBy: 1,
				},
				568 : {
					items: 2,
					slideBy: 2,
				},
				768 : {
					items: 3,
					slideBy: 3,
				},
			}
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
		<?php } ?>
	});
	
})(jQuery);