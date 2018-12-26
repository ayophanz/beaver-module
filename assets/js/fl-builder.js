jQuery(document).ready(function($) {
	if ($('.fl-builder-bar-actions').length ) {
		$('.fl-builder-bar-actions .fl-clear').before('<span class="fl-builder-hover-content-button fl-builder-button"><i class="fa fa-eye"></i> Quick Test</span>');
		$('.fl-builder-hover-content-button').click(function(){
			if ($(this).hasClass('active')) {
				$(this).removeClass('active');
				$('html').removeClass('hover-active');
			} else {
				$(this).addClass('active');
				$('html').addClass('hover-active');
			}
		});
	}
});