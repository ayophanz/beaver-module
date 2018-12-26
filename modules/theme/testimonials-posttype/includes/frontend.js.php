(function($) {
	$(function() {
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
		
		<?php if ( $settings->style != " center-sync") { ?>
			<?php 
				$margin = ( $settings->margin <> '' ) ? $settings->margin : '10';
				$dots = ( $settings->show_dots <> '' ) ? $settings->show_dots : 'true';
				$nav = ( $settings->show_nav <> '' ) ? $settings->show_nav : 'true';
				$items = ( $settings->items <> '' ) ? $settings->items : '3';
				$items_medium = ( $settings->items_medium <> '' ) ? $settings->items_medium : $items;
				$items_responsive = ( $settings->items_responsive <> '' ) ? $settings->items_responsive : $items_medium;
				$autoplay = ( $settings->autoplay <> '' ) ? $settings->autoplay : 'false';

				if ( $autoplay === 'false' ) {
					$loop = 'false';
				} else {
					$loop = 'true';
				}
			?>
			var owl = $(".fl-node-<?php echo $id; ?> .owl-carousel");
			owl.owlCarousel({
				margin: <?php echo $margin; ?>,
				dots: <?php echo $dots; ?>,
				nav: <?php echo $nav; ?>,
				autoplay: <?php echo $autoplay; ?>,
				autoplayHoverPause:true,
				loop: <?php echo $loop; ?>,
				autoHeight: true, 
				navText: [' ',' '],
				responsive : {
					0 : {
						items:<?php echo $items_responsive; ?>,
						slideBy: <?php echo $items_responsive; ?>,
					},
					767 : {
						items:<?php echo $items_medium; ?>,
						slideBy: <?php echo $items_medium; ?>,
					},
					1024 : {
						items:<?php echo $items; ?>,
						slideBy: <?php echo $items; ?>,
					}
				}
			});

			$(window).on("load scroll resize", function(){
				if (owl.visible(true)) {
					owl.trigger('play.owl.autoplay')
				} else {
					owl.trigger('stop.owl.autoplay')
				}
			});
		<?php } else { ?>
			$(".fl-node-<?php echo $id; ?> .testimonial-slides").flickity({
				prevNextButtons: false,
				wrapAround: true
			});
			$(".fl-node-<?php echo $id; ?> .testimonial-slides-nav").flickity({
				asNavFor: '.testimonial-slides', 
				contain: true, 
				pageDots: false, 
				prevNextButtons: false, 
				wrapAround: true
			});
		<?php } ?>
	});
})(jQuery);