(function($) {

	$(function() {
		<?php if ( !empty($settings->active) ) { ?>
			$('.fl-node-<?php echo $id; ?> .tabs-icon-nav .tab-icon-item-<?php echo $settings->active; ?>').addClass('active');
			$('.fl-node-<?php echo $id; ?> .tabs-icon-content .tab-icon-item-<?php echo $settings->active; ?>').addClass('active in');
		<?php } ?>

		$('.fl-node-<?php echo $id; ?> .tabs-icon').on('click', '.tab-icon-nav-button', function(){
			$(this).parent('.tab-icon-item').addClass('active');
			$(this).parent().siblings().removeClass('active');
			
			var tabClass = $(this).parent().index()+1;
			$(this).parent().parent().siblings('.tabs-icon-content').find('.tab-icon-item').removeClass('in');
			setTimeout(function(){
				$('.fl-node-<?php echo $id; ?> .tabs-icon-content .tab-icon-item').removeClass('active');
				$('.fl-node-<?php echo $id; ?> .tabs-icon-content .tab-icon-item-'+tabClass).addClass('active');
			}, 150);
			setTimeout(function(){
				$('.fl-node-<?php echo $id; ?> .tabs-icon-content .tab-icon-item-'+tabClass).addClass('in');
			}, 300);
		});
	});
	
})(jQuery);