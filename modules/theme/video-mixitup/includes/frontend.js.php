(function($) {
	$(function() {
		<?php 
			$effects = ( $settings->effects <> '' ) ? $settings->effects : 'rotateX';
			$duration = ( $settings->duration <> '' ) ? $settings->duration : '400';
		?>
		$('.fl-node-<?php echo $id; ?> .video-items').mixItUp({
			selectors: {
			  filter: '.filter-<?php echo $id; ?>',
			},
			animation: {
				effects: 'fade <?php echo $effects; ?>',
				duration: <?php echo $duration; ?>
			}
		});
		$('a.video-mixitup-photo[href*="youtube.com/watch?"], a.video-mixitup-photo[href*="vimeo.com/"], a.video-mixitup-photo[href*=".mp4"], a.video-mixitup-photo[href*=".mp3"], a.video-mixitup-photo[href*=".mpeg"], a.video-mixitup-photo[href*=".webm"]').addClass('video-lightbox');
		$('a.video-mixitup-photo.video-lightbox').magnificPopup({ type: 'iframe', mainClass: 'mfp-fade', removalDelay: 160, preloader: false, fixedContentPos: false });
	});
})(jQuery);