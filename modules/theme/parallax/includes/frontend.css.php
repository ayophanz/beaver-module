<?php
	for($i = 0; $i < count($settings->items); $i++) : if(!is_object($settings->items[$i])) continue;
		echo '
			.fl-node-'.$id.' .parallax .parallax-'.($i+1).' {
				background-repeat: '.$settings->items[$i]->parallax_img_repeat.';
				background-size: '.$settings->items[$i]->parallax_img_size.';
			}
		';
	endfor;

	if ( !empty($settings->parallax_overlay) || $settings->parallax_overlay_opacity <> '' ) {
		echo '
			.fl-node-'.$id.' .parallax::before {
				background-color: #'.$settings->parallax_overlay.';
				opacity: '.( $settings->parallax_overlay_opacity/100 ).';
			}
		';
	}
	if ( $settings->parallax_style_overlay == ' parallax-blur-overlay' && !empty($settings->parallax_blur_overlay_color) ) {
		echo ' .fl-node-'.$id.' .parallax-blur-overlay.parallax::after { ';
			if ( !empty($settings->parallax_blur_overlay_color) ) {
				echo 'background-color: #'.$settings->parallax_blur_overlay_color.';';
			}
			if ( !empty($settings->parallax_blur_overlay_height) ) {
				echo 'height: '.$settings->parallax_blur_overlay_height.'%;';
			}
			if ( !empty($settings->parallax_blur_overlay_width) ) {
				echo 'width: '.$settings->parallax_blur_overlay_width.'%;';
			}
			if ( !empty($settings->parallax_blur_overlay_wide) ) {
				echo 'filter: blur('.$settings->parallax_blur_overlay_wide.'px);';
				echo '-webkit-filter: blur('.$settings->parallax_blur_overlay_wide.'px);';
			}
		echo ' }';
	}
	if ( $settings->parallax_style_overlay == ' parallax-gradient-overlay' && !empty($settings->parallax_overlay) && !empty($settings->parallax_gradient_overlay_color) ) {
		echo ' .fl-node-'.$id.' .parallax-gradient-overlay.parallax::before { ';
			if ( !empty($settings->parallax_overlay) && !empty($settings->parallax_gradient_overlay_color) ) {
				if ( $settings->parallax_gradient_overlay_orientation_reverse == "false" ) {
					echo 'background: #'.$settings->parallax_overlay.';';
					echo 'background: linear-gradient(to right,  #'.$settings->parallax_overlay.' 0%,#'.$settings->parallax_gradient_overlay_color.' 100%);';
					echo 'filter: progid:DXImageTransform.Microsoft.gradient( startColorstr="#'.$settings->parallax_overlay.'", endColorstr="#'.$settings->parallax_gradient_overlay_color.'",GradientType=1 );';
				} else {
					echo 'background: #'.$settings->parallax_gradient_overlay_color.';';
					echo 'background: linear-gradient(to right,  #'.$settings->parallax_gradient_overlay_color.' 0%,#'.$settings->parallax_overlay.' 100%);';
					echo 'filter: progid:DXImageTransform.Microsoft.gradient( startColorstr="#'.$settings->parallax_gradient_overlay_color.'", endColorstr="#'.$settings->parallax_overlay.'",GradientType=1 );';
				}
			}
		echo ' }';
	}
?>