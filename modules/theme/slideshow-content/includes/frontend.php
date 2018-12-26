<?php	
global $wp_embed;
$output = '<div class="'.$module->get_classname().' owl-carousel '.$settings->height.' '.$settings->loop_animation.'">';
	for($i = 0; $i < count($settings->items); $i++) : if(!is_object($settings->items[$i])) continue;
		$output .= '<div class="slideshow-content-slide-'.($i+1).'">';
			$output .= '<div class="slideshow-content-info">';
				if ( ! empty( $settings->items[$i]->title ) ) {
					$output .='<'.$settings->items[$i]->title_tag.' class="slideshow-content-title">'.$settings->items[$i]->title.'</'.$settings->items[$i]->title_tag.'>';
				}
				if ( ! empty( $settings->items[$i]->text ) ) {
				$output .='<div class="slideshow-content-text">';
					$output .= wpautop( $wp_embed->autoembed( $settings->items[$i]->text ) );
				$output .='</div>';
				}
				if ( ! empty( $settings->items[$i]->btn_1_link ) ) {
					$output .='<a class="slideshow-content-button slideshow-content-button-1 hightlight" href="'.$settings->items[$i]->btn_1_link.'" title="'.$settings->items[$i]->btn_1_label.'">'.$settings->items[$i]->btn_1_label.'</a>';
				}
				if ( ! empty( $settings->items[$i]->btn_2_link ) ) {
					$output .='<a class="slideshow-content-button slideshow-content-button-2" href="'.$settings->items[$i]->btn_2_link.'" title="'.$settings->items[$i]->btn_2_label.'">'.$settings->items[$i]->btn_2_label.'</a>';
				}
			$output .= '</div>';
		$output .= '</div>';
	endfor;
$output .= '</div>';
echo $output;
?>