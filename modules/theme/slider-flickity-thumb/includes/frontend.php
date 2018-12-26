<?php
$customheight_style = $mobileBg = '';
if ( $settings->height == 'customheight' ) {
	$customheight_style = ' style=" height:'.$settings->customheight.'px;"';
}

$output = '<div class="'.$module->get_classname().' '.$settings->style.'"'.$customheight_style.'>';
	for($i = 0; $i < count($settings->items); $i++) : if(!is_object($settings->items[$i])) continue;
		$output .= '<div class="slider-flickity-thumb-item '.$settings->items[$i]->style.' item-'.($i+1).'">';
			$output .= '<div class="slider-flickity-thumb-info '.$settings->items[$i]->position.'">';
				$output .= '<div class="slider-flickity-thumb-info-content">';
					if ( ! empty( $settings->items[$i]->slider_title ) ) {
						$output .= '<h2 class="title">'.$settings->items[$i]->slider_title.'</h2>';
					}
					if ( ! empty( $settings->items[$i]->slider_description ) ) {
						$description_width_style = '';
						if ( ! empty( $settings->items[$i]->slider_description_width ) ) {
							$description_width_style = ' style="max-width:'.$settings->items[$i]->slider_description_width.'px"';
						}
						$output .= '<p class="description"'.$description_width_style.'>'.$settings->items[$i]->slider_description.'</p>';
					}
					if ( ! empty( $settings->items[$i]->slider_btn_1_label ) && ! empty( $settings->items[$i]->slider_btn_1_link ) ) {
						$output .= '<a class="btn btn-primary" href="'.slider_btn_1_link.'" title="'.$settings->items[$i]->slider_btn_1_label.'" target="'.$settings->items[$i]->slider_btn_1_target.'">'.$settings->items[$i]->slider_btn_1_label.'</a>';
					}
					if ( ! empty( $settings->items[$i]->slider_btn_2_label ) && ! empty( $settings->items[$i]->slider_btn_2_link ) ) {
						$output .= '<a class="btn btn-outline" href="'.slider_btn_2_link.'" title="'.$settings->items[$i]->slider_btn_2_label.'" target="'.$settings->items[$i]->slider_btn_2_target.'">'.$settings->items[$i]->slider_btn_2_label.'</a>';
					}
				$output .= '</div>';
			$output .= '</div>';
			if ( ! empty( $settings->items[$i]->slider_image ) ) {
				$output .= '<img class="slider-flickity-thumb-image" src="'.$settings->items[$i]->slider_image_src.'" alt="'.$settings->items[$i]->slider_title.'">';
			}
		$output .= '</div>';
	endfor;
$output .= '</div>';
$output .= '<div class="slider-flickity-thumb-nav">';
	for($i = 0; $i < count($settings->items); $i++) : if(!is_object($settings->items[$i])) continue;
		$output .= '<figure class="slider-flickity-thumb-nav-item item-'.($i+1).'">';
			$altText = $settings->items[$i]->slider_nav_label <> '' ? $settings->items[$i]->slider_nav_label : $settings->items[$i]->slider_title;
			$output .= '<img src="'.$settings->items[$i]->slider_nav_image_src.'" alt="'.$altText.'">';
			$output .= '<figcaption class="nav_title">'.$settings->items[$i]->slider_nav_label.'</figcaption>';
		$output .= '</figure>';
	endfor;
$output .= '</div>';
echo $output;
?>