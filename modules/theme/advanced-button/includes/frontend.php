<?php 
$output ='<div class="'.$module->get_classname().'">';
	for($i = 0; $i < count($settings->items); $i++) : if(!is_object($settings->items[$i])) continue;
		$icon = $icon_before = $icon_after = $nofollow = $icon_content = $icon_position = '';

		if ( $settings->items[$i]->btn_link_nofollow == 'yes' ) { 
			$nofollow = ' rel="nofollow"';
		}
		if ( $settings->items[$i]->btn_icon_type == '' && !empty( $settings->items[$i]->btn_icon ) ) { 
			$icon = 'btn-icon ';
			$icon_content = '<i class="'.$settings->items[$i]->btn_icon.'"></i>';
			if ('before' == $settings->items[$i]->btn_icon_position) {
				$icon_before = $icon_content;
				$icon_position = 'icon-before ';
			} else if ('after' == $settings->items[$i]->btn_icon_position) {
				$icon_after = $icon_content;
				$icon_position = 'icon-after ';
			}
		}
		if ( $settings->items[$i]->btn_icon_type == 'image' && !empty( $settings->items[$i]->btn_image ) ) { 
			$icon = 'btn-icon btn-image ';
			$icon_content = '<i><img src="'.$settings->items[$i]->btn_image_src.'" alt="i"></i>';
			if ('before' == $settings->items[$i]->btn_icon_position) {
				$icon_before = $icon_content;
				$icon_position = 'icon-before ';
			} else if ('after' == $settings->items[$i]->btn_icon_position) {
				$icon_after = $icon_content;
				$icon_position = 'icon-after ';
			}
		}

		$output .='<a class="btn-'.$i.' btn '.$icon.$icon_position.$settings->items[$i]->btn_type.$settings->items[$i]->btn_icon_animation.$settings->items[$i]->btn_style.$settings->items[$i]->btn_bg_gradient_border.$settings->items[$i]->btn_effects.' '.$settings->btn_size.$settings->btn_corners.$settings->btn_width.'" href="'.$settings->items[$i]->btn_link.'" target="'.$settings->items[$i]->btn_link_target.'" role="button"'.$nofollow.'>';
			$output .=$icon_before.'<span>'.$settings->items[$i]->btn_text.'</span>'.$icon_after;
		$output .='</a>';
	endfor;
$output .='</div>';
echo $output;
?>
