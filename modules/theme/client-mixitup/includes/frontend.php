<?php global $post;
$output = '<div class="'.$module->get_classname().'">';
	if ( $settings->source != 'media-gallery' ) {
		if ( $settings->categories_nav != 'hide' ) {
			$button_aligment = $settings->categories_nav_aligment <> '' ? ' '.$settings->categories_nav_aligment : '';
			// $output .= '<ul class="client-filter'.$button_aligment.'">';
			// 	$button_all = $settings->categories_nav_all_text <> '' ? $settings->categories_nav_all_text : 'All';
			// 	$output .= '<li class="client-button filter-'.$id.'" data-filter="all">'. $button_all .'</li>';
			// 	if ( $settings->categories != 'selected' || $settings->selected_categories == '' ) {
			// 		$terms = get_terms('client_category');
			// 		$count = count($terms);
			// 		$i = 0;
			// 		if($count > 0){
			// 			foreach($terms as $term){
			// 				$output .= '<li class="client-button filter-'.$id.'" data-filter=".'.$term->slug.'">'.$term->name.'</li>';
			// 			}
			// 		}
			// 	} else {
			// 		$terms = $settings->selected_categories;
			// 		$count = count($terms);
			// 		$i = 0;
			// 		if($count > 0){
			// 			foreach($terms as $term){
			// 				$output .= '<li class="client-button filter-'.$id.'" data-filter=".'.$term.'">'.$term.'</li>';
			// 			}
			// 		}
			// 	}
			// $output .= '</ul>';
		}
	} 

	$output .= '<div class="grids client-items">';
		if ( $settings->source != 'media-gallery' ) {
			/*setting*/
			if ( $settings->categories != 'selected' || $settings->selected_categories == '' ) {
				$query_args = array(
					'post_type' => 'client',
					'posts_per_page' => $settings->totalpost,
					'orderby' => $settings->orderby,
					'order' => $settings->order,
					'offset' => $settings->offset,
				);
			} else {
				$query_args = array(
					'post_type' => 'client',
					'posts_per_page' => $settings->totalpost,
					'orderby' => $settings->orderby,
					'order' => $settings->order,
					'offset' => $settings->offset,
					'tax_query' => array( 
						array( 
							'taxonomy' => 'client_category', //or tag or custom taxonomy
							'field' => 'slug', 
							'terms' => $settings->selected_categories
						) 
					)
				);
			}
			$grid = ( $settings->grid <> '' ) ? $settings->grid : 'grid-4';
			$query = new WP_Query($query_args);
			while ($query->have_posts()) : $query->the_post();
				$postID = get_the_ID();
				$postSLUG = get_post_field( 'post_name', get_post() );
			
				$output .= '<article class="mix '.$grid;
				$allClasses = get_the_terms( get_the_ID(), 'client_category' ); 
				if(! empty($allClasses)){
					foreach ($allClasses as $class) { 
						$output .= ' '.$class->slug;
					}
				}
				$output .= '">'; 
					$output .= '<figure class="client-item-holder">'; 
						$buttonlink = '';
						if ( $settings->button_link == 'lightbox' ) {
							$lightboximg = wp_get_attachment_image_src( get_post_thumbnail_id( $postID ), 'medium-large' );
							$buttonlink = $lightboximg[0];
						} else if ( $settings->button_link == 'lightbox-ajax' ) {
							$buttonlink = '#'.$postSLUG;
						} else {
							$buttonlink = get_the_permalink();
						}

						if ( $settings->image_link == 'yes' ) {
							// if ( $settings->button_link == 'lightbox-ajax' ) {
							// 	$output .=  '<a class="ajax-content client-mixitup-photo" href="'.$buttonlink.'" title="View '.get_the_title().'" data-post-id="'.$postID.'" data-post-slug="'.$postSLUG.'">';
							// } else {
							// 	$output .=  '<a class="client-mixitup-photo" href="'.$buttonlink.'" title="View '.get_the_title().'">';
							// }
						} else {
							$output .=  '<div class="client-mixitup-photo">';
						}
							if ( $grid == 'grid-12') {
								$img = wp_get_attachment_image_src( get_post_thumbnail_id( $postID ), 'full' );
							} else if ($grid == 'grid-6') {
								$img = wp_get_attachment_image_src( get_post_thumbnail_id( $postID ), 'medium-large' );
							} else if ($grid == 'grid-4' || $grid == 'grid-3') {
								$img = wp_get_attachment_image_src( get_post_thumbnail_id( $postID ), 'client-mixitup-large' );
							} else {
								$img = wp_get_attachment_image_src( get_post_thumbnail_id( $postID ), 'client-mixitup' );
							}
							$imgSRC = $img <> '' ? $img[0] : $module->url .'/img/default.svg';
						    $imgSRCClass = $img <> '' ? ' has-image' : ' no-image';
						    $output .= '<div class="client-item-image'.$imgSRCClass.'" style="background-image: url('.$imgSRC.'); position: relative;"><img src="'.$imgSRC.'" alt="'.get_the_title().'">';
						    $output .='<div class="client-item-info">';
						    $output .= '<h1>'.get_the_title().'</h1>';
						    $output .= '<p>'.content(20).'</p>';
						    $output .= '<a href="'. get_post_permalink().'">READ MORE  <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>';
						    $output .='</div></div>'; 
						if ( $settings->image_link == 'yes' ) {
							$output .=  '</a>'; 
						} else {
							$output .=  '</div>'; 
						}

						// if ( $settings->grid_style != ' none') {
						// 	if ( $settings->grid_info_alignment <> '' )	$figcaption_classes = ' class="'.$settings->grid_info_alignment.'"';
						// 	$output .=  '<figcaption'.$figcaption_classes.'>'; 
						// 		$output .=  '<'.$settings->grid_info_title_tag.' class="client-title">'.get_the_title().'</'.$settings->grid_info_title_tag.'>'; 
						// 		if ( $settings->grid_category == 'enable' ) {
						// 			$allCat = get_the_terms( get_the_ID(), 'client_category' ); 
						// 			if ( $allCat && ! is_wp_error( $allCat ) ) {
						// 				$the_category = array();
						// 				foreach ($allCat as $currentCat) { 
						// 					$currentCat_link = get_term_link( $currentCat );
						// 					$the_category[] = ' <a href="'.$currentCat_link.'" title="'.$currentCat->name.'">'.$currentCat->name.'</a>';
						// 				}
						// 				$the_categories = join( ", ", $the_category );
						// 				$output .=  '<p class="in-category">in '.$the_categories.'</p>';
						// 			}
						// 		}
						// 		if ( $settings->grid_desc == 'enable' ) {
						// 			if ( $settings->grid_style == ' blurb' || $settings->grid_style == ' highlight' ) {
						// 				$output .=  '<p class="client-desc">'.get_the_excerpt().'</p>';
						// 			}
						// 		}
						// 		if ( $settings->grid_button_text <> '' ) {
						// 			if ( $settings->button_link == 'lightbox-ajax' ) {
						// 				$output .=  '<a href="'.$buttonlink.'" title="'.$settings->grid_button_text.'" class="ajax-content client-button" data-post-id="'.$postID.'" data-post-slug="'.$postSLUG.'">'.$settings->grid_button_text.'</a>'; 
						// 			} else {
						// 				$output .=  '<a href="'.$buttonlink.'" title="'.$settings->grid_button_text.'" class="client-button">'.$settings->grid_button_text.'</a>'; 
						// 			}
						// 		}
						// 	$output .=  '</figcaption>';
						// }
					$output .=  '</figure>'; 
				$output .=  '</article>'; 
			endwhile; wp_reset_query();
		} else {
			$images = $settings->media_gallery;
			if ( !empty($images) ) {
				foreach ( $images as $i => $image ) {
					$photo = FLBuilderPhoto::get_attachment_data($image);
					$photo_description = $photo_caption = '';
					if(!empty($photo->alt)) 		{ $photo_alt = htmlspecialchars($photo->alt); }
					if(!empty($photo->title)) 		{ $photo_title = htmlspecialchars($photo->title); }
					if(!empty($photo->description)) { $photo_description = htmlspecialchars($photo->description); }
					if(!empty($photo->caption)) 	{ $photo_caption = htmlspecialchars($photo->caption); }
					$photo_alt = ($photo_alt <> '') ? $photo_alt : $photo_title;
					$photo_title = ($photo_title <> '') ? $photo_title : $photo_alt;
					
					$grid = ( $settings->grid <> '' ) ? $settings->grid : 'grid-4';
					if ( $grid == 'grid-12') {
						$photo_thumb = wp_get_attachment_image_src($image, 'full' );
					} else if ($grid == 'grid-6') {
						$photo_thumb = wp_get_attachment_image_src($image, 'medium-large' );
					} else if ($grid == 'grid-4' || $grid == 'grid-3') {
						$photo_thumb = wp_get_attachment_image_src($image, 'client-mixitup-large' );
					} else {
						$photo_thumb = wp_get_attachment_image_src($image, 'client-mixitup' );
					}
					$output .= '<article class="mix '.$grid.'">'; 
						$output .= '<figure>';
							$buttonlink = ''; $lightboximg = wp_get_attachment_image_src($image, 'medium-large' ); $buttonlink = $lightboximg[0];
							if ( $settings->image_link == 'yes' ) {
								$output .=  '<a class="client-mixitup-photo" href="'.$buttonlink.'" title="View '.$photo_title.'">'; 
							} else {
								$output .=  '<div class="client-mixitup-photo">';
							}
								$output .= '<img src="'.$photo_thumb[0].'" alt="'.$photo_title.'">';
							if ( $settings->image_link == 'yes' ) {
								$output .=  '</a>'; 
							} else {
								$output .=  '</div>'; 
							}
					
							if ( $settings->grid_style != ' none') {
								$output .=  '<figcaption>'; 
									$output .=  '<'.$settings->grid_info_title_tag.' class="client-title">'.$photo_title.'</'.$settings->grid_info_title_tag.'>'; 
									if ( !empty($photo_caption) ) {
										$output .=  '<p class="client-caption">'.$photo_caption.'</p>';
									}
									if ( !empty($photo_description) ) {
										$output .=  '<p class="in-category">'.$photo_description.'</p>';
									}
								$output .=  '</figcaption>';
							}
						$output .= '</figure>';
					$output .= '</article>'; 
				}
			}
		}
	$output .= '</div>';
$output .= '</div>';


echo $output;
?>