(function($) {
	$(function() {
				
		<?php 
			$margin = ( $settings->margin <> '' ) ? $settings->margin : '10';
			$dots = ( $settings->dots <> '' ) ? $settings->dots : 'true';
			$nav = ( $settings->nav <> '' ) ? $settings->nav : 'true';
			$column_items = $settings->column_items;
			if ($settings->column_items < 4 ) {
				$responsive_column_items = 2;
			} 
			if ($settings->column_items == 4 ) {
				$responsive_column_items = 3;
			} 
			if ($settings->column_items > 4 ) {
				$responsive_column_items = 4;
			}
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
			loop: <?php echo $loop; ?>,
			autoHeight: true, 
			navText: [' ',' '],
			responsive : {
				0 : {
					slideBy: 1,
					items: 1,
				},
				568 : {
					slideBy: <?php echo $responsive_column_items; ?>,
					items:<?php echo $responsive_column_items ?>,
				},
				960 : {
					slideBy: <?php echo $column_items; ?>,
					items:<?php echo $column_items; ?>,
				}
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