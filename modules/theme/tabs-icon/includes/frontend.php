<?php global $wp_embed;
$output = '<div class="'.$module->get_classname().'">';
	$output .= '<ul class="tabs-icon-nav">';
		for($i = 0; $i < count($settings->items); $i++) : if(!is_object($settings->items[$i])) continue;
			$output .='<li class="tab-icon-item tab-icon-item-'.($i+1).'">';
				$output .='<button class="tab-icon-nav-button" type="button">';
					if ( $settings->items[$i]->tab_icon_source <> '' ) {
						$output .= '<span class="tab-icon-nav-icon-wrapper">';
							if ( !empty($settings->items[$i]->tab_icon) &&  $settings->items[$i]->tab_icon_source == 'icon' ) {
								$output .= '<i class="tab-icon-nav-icon '.$settings->items[$i]->tab_icon.'"></i>';
							}
							if ( !empty($settings->items[$i]->tab_icon_img) &&  $settings->items[$i]->tab_icon_source == 'image' ) {
								$tab_icon_img = ''; 
								$tab_icon_img = $settings->items[$i]->tab_icon_img;
								$tab_icon_img_data = FLBuilderPhoto::get_attachment_data($tab_icon_img);
								$tab_icon_img_data_alt = $tab_icon_img_data->alt <> '' ? $tab_icon_img_data->alt : $tab_icon_img_data->title;
								$output .= '<img class="tab-icon-nav-icon" src="'.$settings->items[$i]->tab_icon_img_src.'" alt="'.$tab_icon_img_data_alt.'"></i>';
							}
						$output .= '</span>';
					}
					if (  !empty($settings->items[$i]->tab_title) ) {
						$output .= '<span class="tab-icon-nav-title">'.$settings->items[$i]->tab_title.'</span>';
					}
				$output .='</button>';
			$output .='</li>';
		endfor;
	$output .='</ul>';
	$output .='<div class="tabs-icon-content">';
		for($i = 0; $i < count($settings->items); $i++) : if(!is_object($settings->items[$i])) continue;
			$output .='<div class="tab-icon-item tab-icon-item-'.($i+1).' '.$settings->items[$i]->tab_content_image_aligment.'">';
				if ( !empty($settings->items[$i]->tab_content_image) ) {
					$tab_content_image = ''; 
					$tab_content_image = $settings->items[$i]->tab_content_image;
					$tab_content_image_data = FLBuilderPhoto::get_attachment_data($tab_content_image);
					$tab_content_image_data_alt = $tab_content_image_data->alt <> '' ? $tab_content_image_data->alt : $tab_content_image_data->title;
					$output .= '<div class="tab-icon-content-image">';
						$output .= '<img class="tab-icon-icon" src="'.$settings->items[$i]->tab_content_image_src.'" alt="'.$tab_content_image_data_alt.'"></i>';
					$output .= '</div>';
				}
				$output .= '<div class="tab-icon-content-text">';
					if ( !empty($settings->items[$i]->tab_content_title) ) {
						$output .= '<h3 class="tab-icon-title">'.$settings->items[$i]->tab_content_title.'</h3>';
					}
					$output .= '<div class="tab-icon-content">'.wpautop( $wp_embed->autoembed( $settings->items[$i]->tab_content_text ) ).'</div>';
					if ( $settings->items[$i]->btn_option === 'yes' ) { 
						if ( $settings->items[$i]->btn_link_nofollow === 'yes' ) { 
							$nofollow = ' rel="nofollow"';
						}
						$icon_before = $icon_after = '';
						if ( ! empty( $settings->items[$i]->btn_icon ) ) { 
							if ('before' == $settings->items[$i]->btn_icon_position) {
								$icon_before = '<i class="'.$settings->items[$i]->btn_icon.'"></i>';
							} else if ('after' == $settings->items[$i]->btn_icon_position) {
								$icon_after = '<i class="'.$settings->items[$i]->btn_icon.'"></i>';
							}
						}
						$output .='<a class="btn-'.$i.' btn '.$settings->items[$i]->btn_type.$settings->items[$i]->btn_icon_animation.$settings->items[$i]->btn_style.$settings->items[$i]->btn_bg_gradient_border.$settings->items[$i]->btn_effects.' '.$settings->btn_size.$settings->btn_corners.$settings->btn_width.'" href="'.$settings->items[$i]->btn_link.'" target="'.$settings->items[$i]->btn_link_target.'" role="button"'.$nofollow.'>';
							$output .=$icon_before.'<span>'.$settings->items[$i]->btn_text.'</span>'.$icon_after;
						$output .='</a>';
					}
				$output .= '</div>';
			$output .='</div>';
		endfor;
	$output .='</div>';
$output .= '</div>';
echo $output;
?>