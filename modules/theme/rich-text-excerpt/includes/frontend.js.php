(function($) {

	$(function() {
		$('html').on('click', '.fl-node-<?php echo $id; ?> .fl-rich-text-readmore, .fl-node-<?php echo $id; ?> .fl-rich-text-readless', function(){
			if ($('.fl-node-<?php echo $id; ?> .fl-rich-text-excerpts').hasClass('show-excerpt')) {
				$('.fl-node-<?php echo $id; ?> .fl-rich-text-excerpts').removeClass('show-excerpt');
			} else {
				$('.fl-node-<?php echo $id; ?> .fl-rich-text-excerpts').addClass('show-excerpt');
			}
		});
	});
	
})(jQuery);