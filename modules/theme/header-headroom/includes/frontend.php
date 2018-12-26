<?php global $wp_embed;
$output = '<div class="'.$module->get_classname().'">';
	$output .= '<div class="container">';
		$output .= '<a href="'.esc_url(home_url('/')).'" title="'.get_bloginfo().'" class="logo"><img src="'.$settings->logo_src.'"></a>';
		if ( !empty($settings->headroom_button_text) && !empty($settings->headroom_button_link) ) {
			$output .= '<a class="btn btn-outline btn-default btn-rounded" href="'.$settings->headroom_button_link.'" title="'.$settings->headroom_button_text.'">'.$settings->headroom_button_text.'</a>';
		}
		$output .= '<nav id="main-menu">';
			$primaryNav = '';
			if (function_exists('wp_nav_menu')) { $primaryNav = wp_nav_menu( array( 'theme_location' => 'primary-menu', 'container' => false, 'menu_class' => 'primary-menu', 'menu_id' => 'primary-menu', 'echo' => false ) ); }
			$output .= $primaryNav; 
			$output .= '<button id="responsive-menu" type="button"><span></span><span></span><span></span><span></span><span></span><span></span></button>';
		$output .= '</nav>';
	$output .= '</div>';
$output .= '</div>';
echo $output;
?>