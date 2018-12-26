<?php	
$output = '<div class="'.$module->get_classname().' owl-carousel '.$settings->item_style.'">';
	for($i = 0; $i < count($settings->items); $i++) : if(!is_object($settings->items[$i])) continue;
		$link_image_src = $bg_image = '';
		if ( !empty( $settings->items[$i]->carousel_image) ) {
			$bg_image = ' style=" background-image: url('.$settings->items[$i]->carousel_image_src.'); "';
			$link_image = wp_get_attachment_image_src($settings->items[$i]->carousel_image, 'large' );
			$link_image_src = $link_image[0];
		}
			if( !empty($settings->items[$i]->carousel_linkto)) {
				$tabbing = '';
				if($settings->items[$i]->carousel_newtab=='new_tab') {
					$tabbing = 'blank';
				}
				$output .= '<a target="'.$tabbing.'" href="'.$settings->items[$i]->carousel_linkto.'" class="carousel-item carouse-'.($i+1).'"'.$bg_image.' data-slb-group="simple-lightbox-'.$id.'" title="'.$settings->items[$i]->carousel_title.'"><img class="small-icon-link" src="'.get_stylesheet_directory_uri().'/images/circle2.svg'.'">';
			}else{
				$output .= '<a href="'.$link_image_src.'" class="carousel-item carouse-'.($i+1).'"'.$bg_image.' data-slb-group="simple-lightbox-'.$id.'" title="'.$settings->items[$i]->carousel_title.'"><img class="small-icon-link" src="'.get_stylesheet_directory_uri().'/images/circle2.svg'.'">';
			}
			if ( !empty($settings->items[$i]->carousel_title) ) {
				$output .= '<h4 class="carousel-title"><span>'.$settings->items[$i]->carousel_title.'</span></h4>';
			}
			$output .= '</a>';
	endfor;
$output .= '</div>';
echo $output;
?>