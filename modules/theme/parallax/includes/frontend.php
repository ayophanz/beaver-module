<?php global $wp_embed;
$output = '<div class="'.$module->get_classname().$settings->parallax_style_overlay.'">';
	for($i = 0; $i < count($settings->items); $i++) : if(!is_object($settings->items[$i])) continue;
		if ( $settings->items[$i]->parallax_reverse == 'yes' ) {
			$to = ($settings->items[$i]->parallax_from <> '') ? $settings->items[$i]->parallax_from : '0';
			$from = ($settings->items[$i]->parallax_to <> '') ? $settings->items[$i]->parallax_to : (($i+1)*100);
		} else {
			$from = ($settings->items[$i]->parallax_from <> '') ? $settings->items[$i]->parallax_from : '0';
			$to = ($settings->items[$i]->parallax_to <> '') ? $settings->items[$i]->parallax_to : (($i+1)*100);
		}
		if ( $settings->items[$i]->parallax_reverse_horizontal == 'yes' ) {
			$to_horizontal = ( $settings->items[$i]->parallax_from_horizontal <> '' ) ? $settings->items[$i]->parallax_from_horizontal : '50';
			$from_horizontal = ( $settings->items[$i]->parallax_to_horizontal <> '' ) ? $settings->items[$i]->parallax_to_horizontal : '50';
		} else {
			$from_horizontal = ( $settings->items[$i]->parallax_from_horizontal <> '' ) ? $settings->items[$i]->parallax_from_horizontal : '50';
			$to_horizontal = ( $settings->items[$i]->parallax_to_horizontal <> '' ) ? $settings->items[$i]->parallax_to_horizontal : '50';
		}
		if ( $settings->items[$i]->parallax_img_size == 'auto auto' ) {
			$bg_size_class = ' bg-size-auto';
		}

		$output .= '<div style="background-image: url('.$settings->items[$i]->parallax_img_src.'); z-index:'.($i+1).';" class="parallax-image parallax-'.($i+1).$bg_size_class.'" 
			data-bottom-top="background-position: '.$from_horizontal.'% '.$from.'%;" 
			data-top-bottom="background-position: '.$to_horizontal.'% '.$to.'%;"
		></div>';
	endfor;
$output .= '</div>';
echo $output;
?>