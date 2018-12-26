(function($) {
	$(function() {
		var owl = $(".fl-node-<?php echo $id; ?> .owl-carousel");
		owl.owlCarousel({
			items: 1,
			margin: 0,
			nav: <?php echo $settings->show_nav; ?>,
			dots: <?php echo $settings->show_dots; ?>,
			navText: ['',''],
			autoplay: <?php echo $settings->autoplay; ?>,
			autoplayTimeout: <?php echo $settings->delay ?>,
			autoplaySpeed: <?php echo $settings->speed ?>,
			smartSpeed: <?php echo $settings->speed ?>,
			loop: <?php echo $settings->autoplay; ?>,
			<?php if ($settings->autoplay == 'false') { ?>
			rewind: false,
			<?php } ?>
			<?php if ( $settings->height == 'autoheight' ) { ?>autoHeight: true,<?php } ?>
			<?php if ( $settings->style == 'fade' ) { ?>animateOut: 'fadeOut',<?php } ?>
		});

		$( '.fl-builder-content' ).on( 'fl-builder.preview-rendered', refreshOwl );
		function refreshOwl() {
			$owl.trigger('refresh.owl.carousel');
		}

		<?php if ( $settings->autoplay == 'true' ) { ?>
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
				owl.trigger('play.owl.autoplay',<?php echo $settings->delay ?>)
			} else {
				owl.trigger('stop.owl.autoplay')
			}
		});
		<?php } ?>
	});
	
})(jQuery);