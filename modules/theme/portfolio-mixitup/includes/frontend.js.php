(function($) {
	$(function() {
		<?php 
			$effects = ( $settings->effects <> '' ) ? $settings->effects : 'rotateX';
			$duration = ( $settings->duration <> '' ) ? $settings->duration : '400';
		?>
		$('.fl-node-<?php echo $id; ?> .portfolio-items').mixItUp({
			selectors: {
			  filter: '.filter-<?php echo $id; ?>',
			},
			animation: {
				effects: 'fade <?php echo $effects; ?>',
				duration: <?php echo $duration; ?>
			}
		});

		
		
		<?php if ( $settings->source == 'posttype-portfolio' && $settings->button_link == 'lightbox-ajax' ) { ?>
			$('body').append('<div class="ajax-portfolio"></div>');
			$('body .ajax-portfolio').append('<button type="button" class="close"><span></span><span></span></button>');
			$('body .ajax-portfolio').append('<div class="loading-animation loading-cube-grid"><span class="loading-cube loading-cube1"></span><span class="loading-cube loading-cube2"></span><span class="loading-cube loading-cube3"></span><span class="loading-cube loading-cube4"></span><span class="loading-cube loading-cube5"></span><span class="loading-cube loading-cube6"></span><span class="loading-cube loading-cube7"></span><span class="loading-cube loading-cube8"></span><span class="loading-cube loading-cube9"></span></div>');
			$('body .ajax-portfolio').append('<div class="ajax-portfolio-lightbox"></div>');
			$(document).on('click', '.ajax-content', function(){
				$('body').css('overflow','hidden');
				$('.ajax-portfolio').removeClass('animate').removeClass('show-box');
				$('.ajax-portfolio .ajax-portfolio-lightbox').html('');
				var currentId = $(this).attr('data-post-id');
				$.ajax({
					url: '<?php echo admin_url( 'admin-ajax.php' ); ?>',
					type: 'post',
					dataType: 'html',
					data: { id: currentId , action: 'getPortfolioItemAjax' },
					beforeSend: function(){
						$('body').addClass('ajax-content-active');
						$('.ajax-portfolio').addClass('loading').addClass('show-box');
						$('.ajax-portfolio').attr('data-current-id',currentId);
					},
					complete: function(){
						$('.ajax-portfolio').removeClass('loading');
					},
					success: function(res){
						$('.ajax-portfolio').addClass('show-box');
						$('.ajax-portfolio-lightbox').html(res);
						setTimeout(function(){
							$('.ajax-portfolio').addClass('animate');
						}, 10);
						
						function centralized() {
							var windowHeight = $(window).outerHeight();
							var lightboxHeight = $('.ajax-portfolio-lightbox').outerHeight() + 200;
							if ( lightboxHeight < windowHeight ) {
								$('.ajax-portfolio-lightbox').addClass('centered');
							} else {
								$('.ajax-portfolio-lightbox').removeClass('centered');
							}
						}
						centralized();
						$(window).resize(function(){
							centralized();
						});
						
						$('.ajax-portfolio button.close').click(function(){
							$('.ajax-portfolio').removeClass('animate').removeClass('show-box');
							$('.ajax-portfolio .ajax-portfolio-lightbox').html('');
							$('body').removeClass('ajax-content-active').css('overflow','visible');
						});
					}
				}); 
			});
		<?php } ?>


	});
})(jQuery);