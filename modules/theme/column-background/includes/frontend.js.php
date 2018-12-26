(function($) {
	$(function() {
		var $window = $(window);
		$window.resize(function resize() {
			$( '.fl-builder-content' ).on( 'fl-builder.layout-rendered', column_bg() );
		}).trigger('resize');
		
	});
	
	function column_bg(){
		$('.column-background').each(function(){
			$(this).closest('.fl-row').addClass('column-background-wrapper');
			$(this).closest('.fl-col').addClass('column-background-inner');
				var rowW = $(this).closest('.fl-row').outerWidth();
				var rowInnerW = $(this).closest('.fl-row-content').outerWidth();
				var colW = $(this).closest('.fl-col').outerWidth();
				var bgW = ((rowW-rowInnerW)/2)+colW;
				var columnW = bgW/rowW*100;
				$(this).css('width', columnW+'%');
		});	
	}
})(jQuery);