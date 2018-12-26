<?php
$output = '<div class="'.$module->get_classname().'">';
	if ( $settings->style == " center-sync") {
		$output .= '<div class="testimonial-slides-nav flickity-slides-nav">';
			$query_args = array(
				'post_type' => $settings->posttype,
				'posts_per_page' => $settings->totalpost,
				'orderby' => 'menu_order',
			);
			$query = new WP_Query($query_args);
			while ($query->have_posts()) : $query->the_post();
				$testimonialAvatar = wp_get_attachment_image_src( get_post_thumbnail_id( $query->ID ), 'testimonial-avatar-nav' );
				$testimonialAvatarSRC = $testimonialAvatar[0] <> '' ? $testimonialAvatar[0] : $this->url.'images/avatar.jpg';
				if( ! empty($testimonialAvatarSRC) ) {
					$output .= '<figure class="avatar"><img src="'.$testimonialAvatarSRC.'" alt="'.get_the_title().'"></figure>'; 
				}
			endwhile; wp_reset_query();
		$output .= '</div>';
	}
if ( $settings->style == " center-sync") {
	$output .= '<div class="testimonial-slides flickity-slides">';
} else {
	$output .= '<div class="testimonial-slides owl-carousel">';
}
		$query_args = array(
			'post_type' => $settings->posttype,
			'posts_per_page' => $settings->totalpost,
			'orderby' => 'menu_order',
		);
		$query = new WP_Query($query_args);
		while ($query->have_posts()) : $query->the_post();
			if ( $settings->style != " center-sync") {
				$testimonialAvatar = wp_get_attachment_image_src( get_post_thumbnail_id( $query->ID ), 'testimonial-avatar' );
				$testimonialAvatarSRC = $testimonialAvatar[0];
				if( ! empty($testimonialAvatarSRC) ) {
					$avatar = '<figure class="avatar"><img src="'.$testimonialAvatarSRC.'" alt="'.get_the_title().'"></figure>'; 
					if ( $settings->avatar_position == "top" && $settings->style <> " bordered") {
						$avatar_top = $avatar;
					} else {
						$avatar_bottom = $avatar;
					}
				}
			}
			$output .= '<div class="testimonial-post">'; 
				$output .=  '<blockquote>'; 
					$output .=  '<div class="message'.$settings->message_quote.$settings->message_font_style.'">'.get_the_content().'</div>'; 
					$output .=  $avatar_top; 
					$ratings = ''; 
					$star = '<i class="material-icons star">&#xE838;</i>';
					$star_haft = '<i class="material-icons star-half">&#xE83A;</i>';
					$star_o = '<i class="material-icons star-o">&#xE83A;</i>';
					if ( $settings->style == " center-sync") {
						if( class_exists('acf') ) {
							if( $settings->company_show == 'true' && get_field('company') ) { 
								$company_text = ', '.get_field('company'); 
							}
							if( $settings->date_show == 'true' && get_field('date') ) { 
								$date = '';
								$date = get_field('date', false, false);
								$date = new DateTime($date);
								$date_text = ', '.$date->format('F Y'); 
							}
							$output .= '<h6 class="author">'.get_the_title().$company_text.$date_text.'</h6>'; 
							if( $settings->rating_show == 'true' && get_field('rating') ) { 
								if ( get_field('rating') == '1' ) 	$ratings = $star.$star_o.$star_o.$star_o.$star_o;
								if ( get_field('rating') == '1.5' ) $ratings = $star.$star_haft.$star_o.$star_o.$star_o;
								if ( get_field('rating') == '2' ) 	$ratings = $star.$star.$star_o.$star_o.$star_o;
								if ( get_field('rating') == '2.5' ) $ratings = $star.$star.$star_haft.$star_o.$star_o;
								if ( get_field('rating') == '3' ) 	$ratings = $star.$star.$star.$star_o.$star_o;
								if ( get_field('rating') == '3.5' ) $ratings = $star.$star.$star.$star_haft.$star_o;
								if ( get_field('rating') == '4' ) 	$ratings = $star.$star.$star.$star.$star_o;
								if ( get_field('rating') == '4.5' ) $ratings = $star.$star.$star.$star.$star_haft;
								if ( get_field('rating') == '5' ) 	$ratings = $star.$star.$star.$star.$star;
								$output .= '<h6 class="rating">'.$ratings.'</h6>'; 
							}
						}
					} else {
						$output .= '<h4 class="author">'.get_the_title().'</h4>'; 
						if( class_exists('acf') ) {
							if( $settings->company_show == 'true' && get_field('company') ) { 
								$output .= '<h6 class="company">'.get_field('company').'</h6>'; 
							}
							if( $settings->date_show == 'true' && get_field('date') ) { 
								$date = '';
								$date = get_field('date', false, false);
								$date = new DateTime($date);
								$output .= '<h6 class="date">'.$date->format('F Y').'</h6>'; 
							}
							if( $settings->rating_show == 'true' && get_field('rating') ) { 
								if ( get_field('rating') == '1' ) 	$ratings = $star.$star_o.$star_o.$star_o.$star_o;
								if ( get_field('rating') == '1.5' ) $ratings = $star.$star_haft.$star_o.$star_o.$star_o;
								if ( get_field('rating') == '2' ) 	$ratings = $star.$star.$star_o.$star_o.$star_o;
								if ( get_field('rating') == '2.5' ) $ratings = $star.$star.$star_haft.$star_o.$star_o;
								if ( get_field('rating') == '3' ) 	$ratings = $star.$star.$star.$star_o.$star_o;
								if ( get_field('rating') == '3.5' ) $ratings = $star.$star.$star.$star_haft.$star_o;
								if ( get_field('rating') == '4' ) 	$ratings = $star.$star.$star.$star.$star_o;
								if ( get_field('rating') == '4.5' ) $ratings = $star.$star.$star.$star.$star_haft;
								if ( get_field('rating') == '5' ) 	$ratings = $star.$star.$star.$star.$star;
								$output .= '<h6 class="rating">'.$ratings.'</h6>'; 
							}
						}
					}
					$output .=  $avatar_bottom; 
				$output .=  '</blockquote>'; 
			$output .=  '</div>'; 
		endwhile; wp_reset_query();
	$output .= '</div>';
$output .= '</div>';


echo $output;
?>