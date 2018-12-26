<?php 	
$output = '<div class="'.$module->get_classname().'">';
	$output .= '<div class="branding-wrapper">';
		for($i = 0; $i < count($settings->logos); $i++) : if(!is_object($settings->logos[$i])) continue;
			$title = $link_start = $link_start = $link_end ='';
			$output .= '<figure class="branding-logo">';
				if ( ! empty( $settings->logos[$i]->title ) ) {
					$title = $settings->logos[$i]->title ? $settings->logos[$i]->title : 'Partner';
				}
				if ( ! empty( $settings->logos[$i]->link ) ) {
					$link_start = '<a href="'.$settings->logos[$i]->link.'" title="'.$title.'" target="_blank">';
					$link_end .= '</a>';
				}
				$logo = FLBuilderPhoto::get_attachment_data($settings->logos[$i]->logo);
				if(!empty($logo->alt)) { $logo_alt = htmlspecialchars($logo->alt); }
				if(!empty($logo->title)) { $logo_title = htmlspecialchars($logo->title); }
				$alt = ($logo_alt <> '') ? $logo_alt : $logo_title;

				$output .= $link_start.'<img src="'.$settings->logos[$i]->logo_src.'" alt="'.$alt.'">'.$link_end;
			$output .= '</figure>';
		endfor;
	$output .= '</div>';
$output .= '</div>';
echo $output;
?>