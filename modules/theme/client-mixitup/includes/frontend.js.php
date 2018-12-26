(function($) {
	$(function() {
		<?php 
			$effects = ( $settings->effects <> '' ) ? $settings->effects : 'rotateX';
			$duration = ( $settings->duration <> '' ) ? $settings->duration : '400';
		?>
		$('.fl-node-<?php echo $id; ?> .client-items').mixItUp({
			selectors: {
			  filter: '.filter-<?php echo $id; ?>',
			},
			animation: {
				effects: 'fade <?php echo $effects; ?>',
				duration: <?php echo $duration; ?>
			}
		});

		
		
		<?php if ( $settings->source == 'posttype-client' && $settings->button_link == 'lightbox-ajax' ) { ?>
			$('body').append('<div class="ajax-client"></div>');
			$('body .ajax-client').append('<button type="button" class="close"><span></span><span></span></button>');
			$('body .ajax-client').append('<div class="loading-animation loading-cube-grid"><span class="loading-cube loading-cube1"></span><span class="loading-cube loading-cube2"></span><span class="loading-cube loading-cube3"></span><span class="loading-cube loading-cube4"></span><span class="loading-cube loading-cube5"></span><span class="loading-cube loading-cube6"></span><span class="loading-cube loading-cube7"></span><span class="loading-cube loading-cube8"></span><span class="loading-cube loading-cube9"></span></div>');
			$('body .ajax-client').append('<div class="ajax-client-lightbox"></div>');
			$(document).on('click', '.ajax-content', function(){
				$('body').css('overflow','hidden');
				$('.ajax-client').removeClass('animate').removeClass('show-box');
				$('.ajax-client .ajax-client-lightbox').html('');
				var currentId = $(this).attr('data-post-id');
				$.ajax({
					url: '<?php echo admin_url( 'admin-ajax.php' ); ?>',
					type: 'post',
					dataType: 'html',
					data: { id: currentId , action: 'getClientItemAjax' },
					beforeSend: function(){
						$('body').addClass('ajax-content-active');
						$('.ajax-client').addClass('loading').addClass('show-box');
						$('.ajax-client').attr('data-current-id',currentId);
					},
					complete: function(){
						$('.ajax-client').removeClass('loading');
					},
					success: function(res){
						$('.ajax-client').addClass('show-box');
						$('.ajax-client-lightbox').html(res);
						setTimeout(function(){
							$('.ajax-client').addClass('animate');
						}, 10);
						
						function centralized() {
							var windowHeight = $(window).outerHeight();
							var lightboxHeight = $('.ajax-client-lightbox').outerHeight() + 200;
							if ( lightboxHeight < windowHeight ) {
								$('.ajax-client-lightbox').addClass('centered');
							} else {
								$('.ajax-client-lightbox').removeClass('centered');
							}
						}
						centralized();
						$(window).resize(function(){
							centralized();
						});
						
						$('.ajax-client button.close').click(function(){
							$('.ajax-client').removeClass('animate').removeClass('show-box');
							$('.ajax-client .ajax-client-lightbox').html('');
							$('body').removeClass('ajax-content-active').css('overflow','visible');
						});
					}
				}); 
			});
		<?php } ?>


	});
})(jQuery);