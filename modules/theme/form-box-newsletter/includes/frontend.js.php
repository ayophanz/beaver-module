(function($) {
	$(function() {
		
		wysijaButton();
		$( '.fl-builder-content' ).on( 'fl-builder.preview-rendered', wysijaButton );
		function wysijaButton() {
			if ($('.form-box-newsletter .widget_wysija').length ) {
				var value = $('.form-box-newsletter .widget_wysija .wysija-submit').attr('value');
				$('.form-box-newsletter .widget_wysija .wysija-submit').hide();
				$('.form-box-newsletter form.widget_wysija').append('<button class="wysija-submit wysija-submit-field" title="'+value+'"><span>'+value+'</span></button>');
			}
		}
		
	});
	
})(jQuery);