<?php
	global $wp_embed;
	$output = '<div class="rich-text-advanced'.$settings->mobile_target_centered.'">';
		$output .= wpautop( $wp_embed->autoembed( $settings->text ) );
	$output .= '</div>';
	echo $output;
?>