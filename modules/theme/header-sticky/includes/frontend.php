<?php global $wp_embed;
$data_scroll_logo = '';
$output = '<div class="'.$module->get_classname().'">';
	$output .= '<div class="container">';
		if ( !empty($settings->logo_scroll) ) {
			$data_scroll_logo = ' data-scroll-logo="'.$settings->logo_scroll_src.'"';
		}
		$output .= '<a href="'.esc_url(home_url('/')).'" title="'.get_bloginfo().'" class="logo"><img src="'.$settings->logo_src.'"'.$data_scroll_logo.' alt="'.get_bloginfo().'"></a>';
		if ( !empty($settings->sticky_button_text) && !empty($settings->sticky_button_link) ) {
			$output .= '<a class="btn btn-outline btn-default btn-rounded" href="'.$settings->sticky_button_link.'" title="'.$settings->sticky_button_text.'">'.$settings->sticky_button_text.'</a>';
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