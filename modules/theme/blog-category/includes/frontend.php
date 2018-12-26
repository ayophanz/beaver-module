<?php
echo '<div class="'.$module->get_classname().'">';
	echo '<div class="blog-wrapper '.$settings->column.'">';
		/*setting*/
		if ( $settings->categories != 'selected' || $settings->selected_categories == '' ) {
			$query_args = array(
				'post_type' => 'post',
				'posts_per_page' => $settings->totalpost,
				'orderby' => $settings->orderby,
				'order' => $settings->order,
				'offset' => $settings->offset,
			);
		} else {
			$query_args = array(
				'post_type' => 'post',
				'posts_per_page' => $settings->totalpost,
				'orderby' => $settings->orderby,
				'order' => $settings->order,
				'offset' => $settings->offset,
				'tax_query' => array( 
					array( 
						'taxonomy' => 'category', //or tag or custom taxonomy
						'field' => 'slug', 
						'terms' => $settings->selected_categories
					) 
				)
			);
		}
		$query = new WP_Query($query_args);
		while ($query->have_posts()) : $query->the_post();
			echo '<div class="blog-post">';
				$photo = wp_get_attachment_image_src( get_post_thumbnail_id( $query->ID ), $settings->image_size );
				$photoURL = $photo[0] ? $photo[0] : get_stylesheet_directory_uri().'/images/logo.svg';
				if ( empty($photo[0]) ) {
					$photoClass = ' no-image';
				}
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
				echo 'Posted by <span class="blog-post-author">'.get_the_author_meta('display_name', $author_id).'</span>';
					if ( $settings->post_date == 'true' ) {
						echo ' on <span class="blog-post-date">'.get_the_date($settings->date_format).'</span>';
					}
					// if ( $settings->post_date == 'true' && $settings->post_comment == 'true' ) {
					// 	echo '<span class="blog-post-separator"> | </span>';
					// }
					if ( $settings->post_category == 'true' ) {
						echo ' in <span class="blog-post-category">';
							$i = 0;
							foreach( (get_the_category()) as $category ) {
								$i++; if ( $i > 1 ) echo ', ';
								echo '<a href="'.get_category_link($category->cat_ID).'" title="'.$category->cat_name.'">'.$category->cat_name.'</a>';
							} 
						echo '</span>';
					}
					if ( $settings->post_comment == 'true' && $settings->post_category == 'true' ) {
						echo '<span class="blog-post-separator"> | </span>';
					}
					if ( $settings->post_comment == 'true' ) {
						echo '<span class="blog-post-comment">';
							comments_popup_link('0 Comments', '1 Comment', '% Comments');
						echo '</span>';
					}
					
				echo '</div>';
				if ( $settings->post_image == 'true' ) {
					echo '<a class="blog-thumb'.$photoClass.'" href="'.get_the_permalink().'" title="'.get_the_title().'" style=" background-image: url('.$photoURL.');"></a>'; 
				}
				echo '<div class="blog-info">'; 
					echo '<div class="blog-info-wrapper">'; 
						echo '<div class="blog-info-inner-wrapper">'; 
							
							if ( $settings->post_content == 'true' && $settings->style == 'normal' ) {
								echo content(102);
								// echo '<p class="blog-post-excerpt">';
								// 	if ( $settings->truncate_post != '' ) {
								// 		truncate_post(100);
								// 	} else {
								// 		echo content(102);
								// 	}
								// 	if ( $settings->post_readmore_position == 'inline' ) {
								// 		if ( $settings->post_readmore == 'true' && $settings->style == 'normal' ) {
								// 			$readmore = $settings->post_readmore_text <> '' ? $settings->post_readmore_text : 'read more';
								// 			echo ' <a class="blog-post-readmore" href="'.get_the_permalink().'" title="'.get_the_title().'">'.$readmore.'</a>';
								// 		}
								// 	}
								// echo '</p>';
							}
							// if ( $settings->post_readmore_position <> 'inline' ) {
							// 	if ( $settings->post_readmore == 'true' && $settings->style == 'normal' ) {
							// 		$readmore = $settings->post_readmore_text <> '' ? $settings->post_readmore_text : 'Read More';
							// 		echo '<a class="blog-post-readmore" href="'.get_the_permalink().'" title="'.get_the_title().'">'.$readmore.'</a>';
							// 	}
							// }
						echo '</div>'; 
					echo '</div>'; 
				echo '</div>'; 
			echo  '</div>'; 
		endwhile; wp_reset_query();
	echo '</div>';
echo '</div>';
?>