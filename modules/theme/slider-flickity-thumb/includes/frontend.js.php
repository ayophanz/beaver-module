(function($) {
	$(function() {
		<?php 
			if ( $settings->autoplay_delay == '' ) {
				$autoplay_delay = '6000';
			} else {
				$autoplay_delay = $settings->autoplay_delay;
			}
			if ( $settings->height == 'fullheight' ) {
				$heightStyle = '"adaptiveHeight": true,';
			}
			if ( $settings->height == 'autoheight' ) {
				$heightStyle = '"adaptiveHeight": true,';
			}
			if ( $settings->height == 'customheight' ) {
				$heightStyle = '';
			}
		?>
		$(".fl-node-<?php echo $id; ?> .slider-flickity-thumb").flickity({
			autoPlay: <?php echo $autoplay_delay; ?>,
			pauseAutoPlayOnHover: false,
			<?php echo $heightStyle; ?>
			wrapAround: true,
			prevNextButtons: false,
			pageDots: false,
			selectedAttraction: 0.003,
			friction: 0.1
		});
		$(".fl-node-<?php echo $id; ?> .slider-flickity-thumb-nav").flickity({
			asNavFor: '.fl-node-<?php echo $id; ?> .slider-flickity-thumb', 
			pauseAutoPlayOnHover: true,
			autoPlay: false,
			contain: true, 
			pageDots: false, 
			prevNextButtons: false
		});
		<?php if ($settings->autoplay == 'true') { ?>
			var $carousel = $(".fl-node-<?php echo $id; ?> .slider-flickity-thumb");
			var $navCarousel = $(".fl-node-<?php echo $id; ?> .slider-flickity-thumb-nav");
			$navCarousel.on( 'mouseenter', function() {
			  $carousel.flickity('pausePlayer');
			  $navCarousel.on( 'mouseleave', onNavMouseleave );
			});
			function onNavMouseleave() {
			  $carousel.flickity('playPlayer');
			  $navCarousel.off( 'mouseleave', onNavMouseleave );
			};
		<?php } ?>
	});
})(jQuery);