<?php 	
global $post;
if ( ! empty( $settings->color ) ) {
	$color = ( $settings->color <> '' ) ? $settings->color : 'dark';
	$colorclass = ' '.$color;
}

$output = '<div class="'.$module->get_classname().'">';
	if ( $settings->categories_nav != 'hide' ) {
		$output .= '<ul class="video-filter">';
			$output .= '<li class="video-button filter-'.$id.'" data-filter="all">All</li>';
			if ( $settings->categories != 'selected' || $settings->selected_categories == '' ) {
				$terms = get_terms('video_category');
				$count = count($terms);
				$i = 0;
				if($count > 0){
					foreach($terms as $term){
						$output .= '<li class="video-button filter-'.$id.'" data-filter=".'.$term->slug.'">'.$term->name.'</li>';
					}
				}
			} else {
				$terms = $settings->selected_categories;
				$count = count($terms);
				$i = 0;
				if($count > 0){
					foreach($terms as $term){
						$output .= '<li class="video-button filter-'.$id.'" data-filter=".'.$term.'">'.$term.'</li>';
					}
				}
			}
		$output .= '</ul>';
	}

	$output .= '<div class="grids video-items">';
		/*setting*/
		if ( $settings->categories != 'selected' || $settings->selected_categories == '' ) {
			$query_args = array(
				'post_type' => 'video',
				'posts_per_page' => $settings->totalpost,
				'orderby' => $settings->orderby,
				'order' => $settings->order,
				'offset' => $settings->offset,
			);
		} else {
			$query_args = array(
				'post_type' => 'video',
				'posts_per_page' => $settings->totalpost,
				'orderby' => $settings->orderby,
				'order' => $settings->order,
				'offset' => $settings->offset,
				'tax_query' => array( 
					array( 
						'taxonomy' => 'video_category', //or tag or custom taxonomy
						'field' => 'slug', 
						'terms' => $settings->selected_categories
					) 
				)
			);
		}
		$grid = ( $settings->grid <> '' ) ? $settings->grid : 'grid-4';
		$query = new WP_Query($query_args);
		while ($query->have_posts()) : $query->the_post();
			$output .= '<article class="mix '.$grid;
			$allClasses = get_the_terms( get_the_ID(), 'video_category' ); 
			if(! empty($allClasses)){
				foreach ($allClasses as $class) { 
					$output .= ' '.$class->slug;
				}
			}
			$output .= '">'; 
				$output .= '<figure>'; 
					$buttonlink = '';
					if ( $settings->button_link == 'lightbox' ) {
						if( class_exists('acf') ) {
							if( get_field('source') == 'online' && get_field('video') ) {
								$buttonlink = get_field('video');
							} else if ( get_field('source') == 'media' && get_field('video_file') ) {
								$buttonlink = get_field('video_file');
							} else {
								$buttonlink = '#no-video';
							}
						}
					} else {
						$buttonlink = get_the_permalink();
					}
					$img = $imageClass = '';
					if ( $grid == 'grid-12') {
						$img = wp_get_attachment_image_src( get_post_thumbnail_id( $query->ID ), 'full' );
					} else if ($grid == 'grid-6') {
						$img = wp_get_attachment_image_src( get_post_thumbnail_id( $query->ID ), 'medium-large' );
					} else if ($grid == 'grid-4' || $grid == 'grid-3') {
						$img = wp_get_attachment_image_src( get_post_thumbnail_id( $query->ID ), 'video-mixitup-large' );
					} else {
						$img = wp_get_attachment_image_src( get_post_thumbnail_id( $query->ID ), 'video-mixitup' );
					}
					$imgSRC = ( $img ) ? $img[0] : $module->url .'/img/default.jpg';
					if ( empty($img[0]) ) {
						$imageClass = ' no-image';
					}

					if ( $settings->image_link == 'yes' ) {
						$output .=  '<a class="video-mixitup-photo'.$imageClass.'" href="'.$buttonlink.'" title="View '.get_the_title().'"><div class="video-mix-bg" style=" background-image: url('.$imgSRC.');"></div>'; 
					} else {
						$output .=  '<div class="video-mixitup-photo'.$imageClass.'"><div class="video-mix-bg" style=" background-image: url('.$imgSRC.');"></div>'; 
					}
							$output .= '<svg xmlns="http://www.w3.org/2000/svg" width="84" height="84" viewBox="0 0 84 84" preserveAspectRatio="xMidYMid"> <circle class="outline" style="fill-opacity: 0.5; stroke: #fff; stroke-linejoin: round; stroke-width: 3px; opacity: 0.5;" cx="42" cy="42" r="38.5"/> <path class="play" data-name="play" style=" fill: #fff; fill-rule: evenodd;" d="M387.381,3461.31l-27.524,16.24a3.134,3.134,0,0,1-1.619.46,3.6,3.6,0,0,1-1.619-.41,3.106,3.106,0,0,1-1.619-2.84v-32.47a3.106,3.106,0,0,1,1.619-2.84,3.009,3.009,0,0,1,3.238.05l27.524,16.23A3.213,3.213,0,0,1,387.381,3461.31Z" transform="translate(-327.5 -3416.5)"/> </svg> ';
							$output .= '<img src="'.$imgSRC.'" alt="'.get_the_title().'">'; 
					if ( $settings->image_link == 'yes' ) {
						$output .=  '</a>'; 
					} else {
						$output .=  '</div>'; 
					}
					$output .=  '<figcaption>'; 
						$output .=  '<'.$settings->grid_info_title_tag.' class="video-title">'.get_the_title().'</'.$settings->grid_info_title_tag.'>'; 
						if ( $settings->grid_category == 'enable' ) {
							$allCat = get_the_terms( get_the_ID(), 'video_category' ); 
							if ( $allCat && ! is_wp_error( $allCat ) ) {
								$the_category = array();
								foreach ($allCat as $currentCat) { 
									$currentCat_link = get_term_link( $currentCat );
									$the_category[] = ' <a href="'.$currentCat_link.'" title="'.$currentCat->name.'">'.$currentCat->name.'</a>';
								}
								$the_categories = join( ", ", $the_category );
								$output .=  '<p class="in-category">in '.$the_categories.'</p>';
							}
						}
						if ( $settings->grid_button_text <> '' ) {
							$output .=  '<a href="'.$buttonlink.'" title="'.$settings->grid_button_text.'" class="video-button">'.$settings->grid_button_text.'</a>'; 
						}
					$output .=  '</figcaption>'; 
				$output .=  '</figure>'; 
			$output .=  '</article>'; 
		endwhile; wp_reset_query();
	$output .= '</div>';
$output .= '</div>';


echo $output;
?>