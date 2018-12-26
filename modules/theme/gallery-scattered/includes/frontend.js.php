(function($) {
	$(function() {
		new Photostack( document.getElementById( 'photostack-<?php echo $id; ?>' ), {
			callback : function( item ) {
				//console.log(item)
			}
		} );
	});
})(jQuery);