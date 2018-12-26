<?php
echo '<div class="'.$module->get_classname().'">';
	echo '<div class="blog-wrapper '.$settings->column.'">';
		$query_args = array(
			'post_type' => $settings->posttype,
			'posts_per_page' => $settings->totalpost,
			'order' => $settings->order,
			'orderby' => 'menu_order',
		);
		$query = new WP_Query($query_args);
		while ($query->have_posts()) : $query->the_post();
			echo '<div class="blog-post">';
				$photo = wp_get_attachment_image_src( get_post_thumbnail_id( $query->ID ), $settings->image_size );
				$photoURL = $photo[0] ? $photo[0] : $module->url.'img/photo.jpg';
				if ( $settings->post_image == 'true' ) {
					echo '<a class="blog-thumb" href="'.get_the_permalink().'" title="'.get_the_title().'" style=" background-image: url('.$photoURL.');"></a>'; 
				}
				echo '<div class="blog-info">'; 
					echo '<div class="blog-info-wrapper">'; 
						echo '<div class="blog-info-inner-wrapper">'; 
							if ( $settings->post_title == 'true' ) {
								echo '<h4 class="blog-post-title"><a href="'.get_the_permalink().'" title="'.get_the_title().'">';
									if ( $settings->truncate_title != '' ) {
										truncate_title(25);
									} else {
										the_title();
									}
								echo '</a></h4>'; 
							}
							echo '<div class="blog-post-meta">';
								if ( $settings->post_date == 'true' ) {
									echo '<span class="blog-post-date">'.get_the_date($settings->date_format).'</span>';
								}
								if ( $settings->post_date == 'true' && $settings->post_comment == 'true' ) {
									echo '<span class="blog-post-separator"> | </span>';
								}
								if ( $settings->post_comment == 'true' ) {
									echo '<span class="blog-post-comment">';
										comments_popup_link('0 Comments', '1 Comment', '% Comments');
									echo '</span>';
								}
							echo '</div>';
							if ( $settings->post_content == 'true' && $settings->style == 'normal' ) {
								echo '<p class="blog-post-excerpt">';
									if ( $settings->truncate_post != '' ) {
										truncate_post(100);
									} else {
										the_excerpt();
									}
								echo '</p>';
							}
							if ( $settings->post_readmore == 'true' && $settings->style == 'normal' ) {
								$readmore = $settings->post_readmore_text <> '' ? $settings->post_readmore_text : 'Read More';
								echo '<a class="blog-post-readmore" href="'.get_the_permalink().'" title="'.get_the_title().'">'.$readmore.'</a>';
							}
						echo '</div>'; 
					echo '</div>'; 
				echo '</div>'; 
			echo  '</div>'; 
		endwhile; wp_reset_query();
	echo '</div>';
echo '</div>';
?>