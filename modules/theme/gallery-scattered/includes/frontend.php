<?php 	
$output = '<div class="'.$module->get_classname().'">';
	if ( ! empty( $settings->title ) ) {
		$output .='<div class="container">';
			$output .='<h2 class="title">';
				$output .= $settings->title;
				if ( ! empty( $settings->sub_title ) ) {
					$output .= '<span class="sub-title">'.$settings->sub_title.'</span>';
				}
			$output .='</h2>';
		$output .='</div>';
	}
	$gallerySetting = ($settings->gallery_setting) ? ' '.$settings->gallery_setting : '';
	$output .= '<div id="photostack-'.$id.'" class="photostack'.$gallerySetting.'">';
		$output .= '<div class="photostack-inner">';
			$images = $settings->gallery;
			if ( !empty($images) ) {
				foreach ( $images as $i => $image ) {
					$photo_thumb = wp_get_attachment_image_src($image, 'gallery-scattered' );
					$photo_thumb_src = $photo_thumb[0];
					
					$photo = FLBuilderPhoto::get_attachment_data($image);
					$photo_url = $photo_alt = $photo_title = $photo_description = $photo_caption = $dummy_photo = '';/*value reset*/
					if(!empty($photo->url)) 		{ $photo_url = htmlspecialchars($photo->url); }
					if(!empty($photo->alt)) 		{ $photo_alt = htmlspecialchars($photo->alt); }
					if(!empty($photo->title)) 		{ $photo_title = htmlspecialchars($photo->title); }
					if(!empty($photo->description)) { $photo_description = htmlspecialchars($photo->description); $dummy_photo = ' data-dummy'; }
					if(!empty($photo->caption)) 	{ $photo_caption = htmlspecialchars($photo->caption); }
					$photo_alt = ($photo_alt <> '') ? $photo_alt : $photo_title;
					$photo_title = ($photo_title <> '') ? $photo_title : $photo_alt;
					
					$output .= '<figure'.$dummy_photo.'>';
						$output .= '<a href="'.$photo_url.'" class="photostack-img" title="'.$photo_title.'">';
							$output .= '<img src="'.$photo_thumb_src.'" alt="'.$photo_alt.'">';
						$output .= '</a>';
						$output .= '<figcaption>';
							$output .= '<h2 class="photostack-title">'.$photo_title.'</h2>';
							if(!empty($photo->caption)) {
								$output .= '<div class="photostack-back">';
									$output .= '<p>'.$photo_caption.'</p>';
								$output .= '</div>';
							}
						$output .= '</figcaption>';
					$output .= '</figure>';
				}
			}
		$output .= '</div>';
	$output .= '</div>';
$output .= '</div>';


echo $output;
?>