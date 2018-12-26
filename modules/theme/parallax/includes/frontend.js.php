(function($) {
	$(function() {
		parallax = skrollr.init({
			forceHeight: false,
			<?php if ( $settings->smoothscrolling == 'true' ) { ?>
				smoothScrolling: true,
			<?php } else if ( $settings->smoothscrolling == 'custom' && isset($settings->smoothscrolling_custom) ) { ?>
				smoothScrollingDuration: <?php echo $settings->smoothscrolling_custom; ?>,
			<?php } else { ?>
				smoothScrolling: false,
			<?php } ?>
		});

		setTimeout(function(){
			parallax.refresh();
			$('.parallax').closest('.fl-col-group').addClass('parallax-wrapper');
			if (parallax.isMobile()) {
				parallax.destroy();
			}
		}, 2000);

	});
})(jQuery);