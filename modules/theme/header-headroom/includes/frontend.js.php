(function($) {
	$(function() {
		<?php 
			$headroom_tolerance = $settings->headroom_tolerance <> '' ? $settings->headroom_tolerance : '5';
			$headroom_offset = $settings->headroom_offset <> '' ? $settings->headroom_offset : '100';

			if( $settings->headroom_animation == 'slide' ) {
				$pinned = 'headroom_slideDown';
				$unpinned = 'headroom_slideUp';
			} else if( $settings->headroom_animation == 'swing' ) {
				$pinned = 'headroom_swingInX';
				$unpinned = 'headroom_swingOutX';
			} else if( $settings->headroom_animation == 'flip' ) {
				$pinned = 'headroom_flipInX';
				$unpinned = 'headroom_flipOutX';
			} else if( $settings->headroom_animation == 'bounce' ) {
				$pinned = 'headroom_bounceInDown';
				$unpinned = 'headroom_bounceOutUp';
			} else {
				$pinned = 'headroom_slideDown';
				$unpinned = 'headroom_slideUp';
			}
		?>
		var header = new Headroom(document.querySelector(".header-headroom"), {
			tolerance: '<?php echo $headroom_tolerance;?>',
			offset : '<?php echo $headroom_offset;?>',
			classes: {
			  initial: "headroom_animated",
			  pinned: "<?php echo $pinned;?>",
			  unpinned:  "<?php echo $unpinned;?>"
			}
		});
		header.init();
		
		var distance = $('body').offset().top;
		$window = $(window);
		if ( $window.scrollTop() > 0 ) {
			$('.header-headroom').addClass('headroom-middle');
		}
		$window.scroll(function() {
			if ( $window.scrollTop() >= distance ) {
				$('.header-headroom').addClass('headroom-middle');
			} else {
				$('.header-headroom').removeClass('headroom-middle');
			}
		});
		
		var $window = $(window);
		$window.resize(function resize() {
			setTimeout(function(){
				headroomBtn();
			}, 400);
		}).trigger('resize');
		
		function headroomBtn() {
			var btnWidth = $('.header-headroom .btn').outerWidth();
			$('#primary-menu, .header-headroom .btn + #main-menu #mega-menu-wrap-primary-menu #mega-menu-primary-menu').css('padding-right', 10+btnWidth+'px');
			$('.header-headroom #main-menu .mega-menu-toggle .mega-toggle-block:last-child').css('margin-right', 10+btnWidth+'px');
			$('#responsive-menu').css('margin-right', 30+btnWidth+'px');
		}
		$( '.fl-builder-content' ).on( 'fl-builder.layout-rendered', headroomBtn );
		
		
	});
})(jQuery);