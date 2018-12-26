(function($) {

	$(function() {
		var $window = $(window);
		$window.resize(function resize() {
			$('.fl-node-<?php echo $id; ?> .faq .faq-desc .faq-desc-content').each( function(){
				var faqHeight = $(this).outerHeight();
				$(this).parent('.faq-desc').css('max-height', faqHeight+'px');
			});
		}).trigger('resize');
		
		<?php if ( !empty($settings->active_collapse) ) { ?>
		$('.fl-node-<?php echo $id; ?> .faq-item-<?php echo $settings->active_collapse; ?>').addClass('active');
		<?php } ?>

		$('.fl-node-<?php echo $id; ?> .faq').on('click', '.faq-title', function(){
			$(this).parent('.faq-item').toggleClass('active');
			<?php if ( $settings->auto_collapse == 'yes' ) { ?>
				$(this).parent().siblings().removeClass('active');
			<?php } ?>
		});
	});
	
})(jQuery);