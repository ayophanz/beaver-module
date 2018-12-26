<?php global $wp_embed;
$output = '<div class="'.$module->get_classname().'">';
	$output .= '<'.$settings->title_tag.' class="form-box-newsletter-title">'.$settings->title.'</'.$settings->title_tag.'>';
	$output .= '<p class="form-box-newsletter-desc">'.$settings->desc.'</p>';
	$output .= '<div class="form-box-newsletter-form">'.$settings->content.'</div>';
	$output .= '<p class="form-box-newsletter-note">'.$settings->note.'</p>';
$output .= '</div>';
echo $output;
?>