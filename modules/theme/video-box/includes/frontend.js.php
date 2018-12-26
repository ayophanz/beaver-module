(function($) {

	$(function() {
		videojs('videojs_<?php echo $id; ?>', {
			"height": "auto",
			"width": "auto"
		}).ready(function() {
			var myPlayer = this;
			var aspectRatio = <?php if (!empty($settings->aspectratio)) { echo $settings->aspectratio; } else { echo '5 / 12'; } ?>; // aspect ratio 12:5 (video frame 960x400)
			function resizeVideoJS() {
				var width = document.getElementById(myPlayer.id()).parentElement.offsetWidth;
				myPlayer.width(width).height(width * aspectRatio);
			}
			var $window = $(window);
			$window.resize(function resize() {
				$( '.fl-builder-content' ).on( 'fl-builder.layout-rendered', resizeVideoJS() );
			}).trigger('resize');
		});

	});
})(jQuery);