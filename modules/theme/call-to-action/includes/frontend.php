<?php global $wp_embed;
$btn_icon = $icon_before = $icon_after = $nofollow = '';

$output ='<div class="'.$module->get_classname().'">';
	if ($settings->content_align == 'right' && $settings->content_style == 'inline' ) {
		$output .= '<div class="cta-buttons '.$settings->btn_align.'">';
			for($i = 0; $i < count($settings->items); $i++) : if(!is_object($settings->items[$i])) continue;
				if ( $settings->items[$i]->btn_link_nofollow === 'yes' ) { 
					$nofollow = ' rel="nofollow"';
				}
				if ( ! empty( $settings->items[$i]->btn_icon ) ) { 
					$icon_before = $icon_after = '';
					if ('before' == $settings->items[$i]->btn_icon_position) {
						$icon_before = '<i class="'.$settings->items[$i]->btn_icon.'"></i>';
					} else if ('after' == $settings->items[$i]->btn_icon_position) {
						$icon_after = '<i class="'.$settings->items[$i]->btn_icon.'"></i>';
					}
				}
				$output .='<a class="btn-'.$i.' btn '.$settings->items[$i]->btn_type.$settings->items[$i]->btn_icon_animation.$settings->items[$i]->btn_style.$settings->items[$i]->btn_bg_gradient_border.$settings->items[$i]->btn_effects.' '.$settings->btn_size.$settings->btn_corners.$settings->btn_width.'" href="'.$settings->items[$i]->btn_link.'" target="'.$settings->items[$i]->btn_link_target.'" role="button"'.$nofollow.'>';
					$output .=$icon_before.'<span>'.$settings->items[$i]->btn_text.'</span>'.$icon_after;
				$output .='</a>';
			endfor;
		$output .='</div>';
	}
	$output .= '<div class="cta-content">';
		if ( !empty($settings->content_title_tag) ) {
		$output .= '<'.$settings->content_title_tag.' class="cta-title">'.$settings->title.'</'.$settings->content_title_tag.'>';
		}
		if ( !empty($settings->text) ) {
			$output .= '<div class="cta-desc">'.wpautop( $wp_embed->autoembed( $settings->text ) ).'</div>';
		}
	$output .= '</div>';
	$output .= '<div class="cta-buttons '.$settings->btn_align.'">';
		for($i = 0; $i < count($settings->items); $i++) : if(!is_object($settings->items[$i])) continue;
			if ( $settings->items[$i]->btn_link_nofollow == 'yes' ) { 
				$nofollow = ' rel="nofollow"';
			}
			if ( ! empty( $settings->items[$i]->btn_icon ) ) { 
				$icon_before = $icon_after = '';
				$btn_icon = 'btn-icon ';
				if ('before' == $settings->items[$i]->btn_icon_position) {
					$icon_before = '<i class="'.$settings->items[$i]->btn_icon.'"></i>';
				} else if ('after' == $settings->items[$i]->btn_icon_position) {
					$icon_after = '<i class="'.$settings->items[$i]->btn_icon.'"></i>';
				}
			}
			$output .='<a class="btn-'.$i.' btn '.$btn_icon.$settings->items[$i]->btn_type.$settings->items[$i]->btn_icon_animation.$settings->items[$i]->btn_style.$settings->items[$i]->btn_bg_gradient_border.$settings->items[$i]->btn_effects.' '.$settings->btn_size.$settings->btn_corners.$settings->btn_width.'" href="'.$settings->items[$i]->btn_link.'" target="'.$settings->items[$i]->btn_link_target.'" role="button"'.$nofollow.'>';
				$output .=$icon_before.'<span>'.$settings->items[$i]->btn_text.'</span>'.$icon_after;
			$output .='</a>';
		endfor;
	$output .='</div>';
$output .='</div>';
echo $output;
?>
