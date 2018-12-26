<?php	
$autoheight_maxheight_class = '';
if ( $settings->autoheight_maxheight <> '' ) {
	$autoheight_maxheight_class = ' maxheight';
}

$output = '<div class="'.$module->get_classname().' owl-carousel '.$settings->height.$autoheight_maxheight_class.' '.$settings->effect.'">';
	$images = $settings->gallery;
	if ( !empty($images) ) {
		foreach ( $images as $i => $image ) {
			$image_thumb = wp_get_attachment_image_src($image, 'large' );
			$image_thumb_src = $image_thumb[0];
			$image = FLBuilderPhoto::get_attachment_data($image);
			$image_url = $image_alt = $image_title = $image_caption = '';/*value reset*/
			if(!empty($image->url)) 		{ $image_url = htmlspecialchars($image->url); }
			if(!empty($image->alt)) 		{ $image_alt = htmlspecialchars($image->alt); }
			if(!empty($image->title)) 		{ $image_title = htmlspecialchars($image->title); }
			if(!empty($image->caption)) 	{ $image_caption = htmlspecialchars($image->caption); }
			$image_alt = ($image_alt <> '') ? $image_alt : $image_title;
			
			$autoheight_class = '';
			if ( $settings->autoheight_maxheight <> '' ) {
				$autoheight_class = ' autoheight';
			}
			
			$bgImage = $bgImage_class = '';
			if ( $settings->height <> 'autoheight' ) {
				$bgImage = ' style="background-image: url('.$image_thumb_src.');"';
			}
			if ( $settings->customheight_image_display <> '' ) {
				$bgImage_class = ' '.$settings->customheight_image_display;
			}
			
			
			
			if ( $settings->link_image == 'true' ) {
				$output .= '<a href="'.$image_thumb_src.'" class="slide'.$bgImage_class.'"'.$bgImage.' data-slb-group="simple-lightbox-'.$id.'" title="'.$image_alt.'">';
			} else {
				$output .= '<div class="slide'.$bgImage_class.'"'.$bgImage.'>';
			}
				if ( $settings->height == 'autoheight' ) {
					$output .= '<img src="'.$image_thumb_src.'" alt="'.$image_alt.'">';
				}
				if ( $settings->show_caption == 'true' ) {
					$output .= '<div class="slideshow-caption">'.$image_caption.'</div>';
				}
			if ( $settings->link_image == 'true' ) {
				$output .= '</a>';
			} else {
				$output .= '</div>';
			}
		}
	}
$output .= '</div>';
echo $output;
?>