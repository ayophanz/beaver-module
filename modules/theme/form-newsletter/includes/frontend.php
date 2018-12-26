<?php global $wp_embed;
$output = '<div class="'.$module->get_classname().'">';
	$output .= '<div class="form-newsletter-content">';
		$output .= '<div class="form-newsletter-info">';
				$output .= '<'.$settings->title_tag.' class="form-newsletter-title">'.$settings->title.'</'.$settings->title_tag.'>';
				$output .= '<p class="form-newsletter-desc">'.$settings->desc.'</p>';
		$output .= '</div>';
		$output .= '<div class="form-newsletter-form">'.$settings->content.'</div>';
	$output .= '</div>';
$output .= '</div>';
echo $output;
?>