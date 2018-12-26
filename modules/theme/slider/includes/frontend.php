<?php	
$output = '<div class="'.$module->get_classname().' owl-carousel '.$settings->height.' '.$settings->loop_animation.'">';
	for($i = 0; $i < count($settings->items); $i++) : if(!is_object($settings->items[$i])) continue;
		$mobile_bg = '';
		if ( !empty( $settings->items[$i]->slider_bg_image_mobile ) ) {
			$mobile_bg = ' mobile-bg-enable';
		}
		$img_delay 			= ' animation-delay-01';
		$title_delay 		= ' animation-delay-05';
		$desc_delay 		= ' animation-delay-10';
		$btn_title_delay 	= ' animation-delay-15';
		$btn_delay 			= ' animation-delay-20';
		$img_delay_bottom 	= ' animation-delay-25';
		if ( $settings->loop_animation == 'slide' ) {
			$img_delay 			= ' animation-delay-10';
			$title_delay 		= ' animation-delay-15';
			$desc_delay 		= ' animation-delay-20';
			$btn_title_delay 	= ' animation-delay-25';
			$btn_delay 			= ' animation-delay-30';
			$img_delay_bottom 	= ' animation-delay-35';
		}
		if ($settings->items[$i]->slider_style == 'left' ) {
			$animation = ' animation fl_right-to-left';
		} else if ($settings->items[$i]->slider_style == 'right' ) {
			$animation = ' animation fl_left-to-right';
		} else {
			$animation = ' animation fl_appear';
		}
		$slideImage = $slideBottomImage = '';
		if ( !empty( $settings->items[$i]->slider_image ) ) $slideImage = ' slide-image-enable';
		if ( !empty( $settings->items[$i]->slider_bottom_image ) ) $slideBottomImage = ' slide-image-bottom-enable';
		$output .= '<div class="slide-item slide-'.($i+1).' '.$settings->items[$i]->slider_style.$mobile_bg.'">';
				$output .= '<div class="fl-row-fixed-width">';
					$output .= '<div class="slider-info'.$slideImage.$slideBottomImage.'">';
						if ( !empty( $settings->items[$i]->slider_image ) ) {
							$output .='<div class="slider-image'.$animation.$img_delay.'"><img src="'.$settings->items[$i]->slider_image_src.'" alt="'.$settings->items[$i]->slider_title.'"></div>';
						}
						$output .='<div class="slider-info-content">';
							if ( !empty( $settings->items[$i]->slider_title ) ) {
								$desc = '';
								if ( empty( $settings->items[$i]->slider_text ) ) { $desc =' no-desc'; }
								$output .='<h2 class="slider-title'.$animation.$desc.$title_delay.'">'.$settings->items[$i]->slider_title.'</h2>';
							}
							if ( !empty( $settings->items[$i]->slider_text ) ) {
								$output .='<p class="slider-text'.$animation.$desc_delay.'">';
									$output .= $settings->items[$i]->slider_text;
								$output .='</p>';
							}
							if ( !empty( $settings->items[$i]->slider_btn_title ) ) {
								$output .='<h3 class="slider-button-title'.$animation.$btn_title_delay.'">'.$settings->items[$i]->slider_btn_title.'</h3>';
							}
							if ( !empty( $settings->items[$i]->slider_btn_1_link ) ) {
								$output .='<div class="display-inline'.$animation.$btn_delay.'">';
									$output .='<a class="slider-button slider-button-1 highlight" href="'.$settings->items[$i]->slider_btn_1_link.'" title="'.$settings->items[$i]->slider_btn_1_label.'">'.$settings->items[$i]->slider_btn_1_label.'</a>';
								$output .='</div>';
							}
							if ( !empty( $settings->items[$i]->slider_btn_2_link ) ) {
								$output .='<div class="display-inline'.$animation.$btn_delay.'">';
									$output .='<a class="slider-button slider-button-2" href="'.$settings->items[$i]->slider_btn_2_link.'" title="'.$settings->items[$i]->slider_btn_2_label.'">'.$settings->items[$i]->slider_btn_2_label.'</a>';
								$output .='</div>';
							}
							if ( !empty( $settings->items[$i]->slider_bottom_image ) ) {
								$output .='<div class="slider-image-bottom'.$animation.$img_delay_bottom.'"><img src="'.$settings->items[$i]->slider_bottom_image_src.'" alt="'.$settings->items[$i]->slider_title.'"></div>';
							}
						$output .='</div>';
					$output .= '</div>';
				$output .= '</div>';
		$output .= '</div>';
	endfor;
$output .= '</div>';
echo $output;
?>