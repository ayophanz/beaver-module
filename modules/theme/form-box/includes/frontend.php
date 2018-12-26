<?php global $wp_embed;
$output = '<div class="'.$module->get_classname().'">';
	$output .= wpautop( $wp_embed->autoembed( $settings->content ) );
$output .= '</div>';
echo $output;
?>