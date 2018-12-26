<?php
/**
 * Plugin Name: Beaver Builder Theme Modules
 * Description: Theme modules for beaver builder.
 * Version: 1.0
 * Author: Jford Ayop
 */
define( 'FL_MODULE_THEME_DIR', plugin_dir_path( __FILE__ ) );
define( 'FL_MODULE_THEME_URL', plugins_url( '/', __FILE__ ) );

/**
 * Custom modules
 */
if ( class_exists( 'FLBuilder' ) ) {
	function fl_load_theme_modules() {
		global $foldercategory;
		$foldercategory = 'Theme Modules';
		global $themeDIR;
		$themeDIR = 'theme';

		/*Modify*/
		require_once 'modules/'.$themeDIR.'/rich-text-advanced/rich-text-advanced.php';
		require_once 'modules/'.$themeDIR.'/rich-text-excerpt/rich-text-excerpt.php';
		require_once 'modules/'.$themeDIR.'/sidebar-advanced/sidebar-advanced.php';
		require_once 'modules/'.$themeDIR.'/photo-advanced/photo-advanced.php';

		/*Buttons*/
		require_once 'modules/'.$themeDIR.'/advanced-button/advanced-button.php';
		/*content*/
		require_once 'modules/'.$themeDIR.'/box-link/box-link.php';
		require_once 'modules/'.$themeDIR.'/column-background/column-background.php';
		require_once 'modules/'.$themeDIR.'/counter-bar/counter-bar.php';
		require_once 'modules/'.$themeDIR.'/faq/faq.php';
		require_once 'modules/'.$themeDIR.'/form-box/form-box.php';
		require_once 'modules/'.$themeDIR.'/form-box-newsletter/form-box-newsletter.php';
		require_once 'modules/'.$themeDIR.'/form-newsletter/form-newsletter.php';
		
		require_once 'modules/'.$themeDIR.'/icon-box-toggle/icon-box-toggle.php';
		require_once 'modules/'.$themeDIR.'/skills-bar/skills-bar.php';
		require_once 'modules/'.$themeDIR.'/video-box/video-box.php';
		require_once 'modules/'.$themeDIR.'/map-advanced/map-advanced.php';
		require_once 'modules/'.$themeDIR.'/lists/lists.php';
		require_once 'modules/'.$themeDIR.'/tabs-icon/tabs-icon.php';
		require_once 'modules/'.$themeDIR.'/social-media-icons/social-media-icons.php';
		/*headings*/
		require_once 'modules/'.$themeDIR.'/call-to-action/call-to-action.php';
		require_once 'modules/'.$themeDIR.'/heading-advance/heading-advance.php';
		/*header*/
		require_once 'modules/'.$themeDIR.'/header-sticky/header-sticky.php';
		require_once 'modules/'.$themeDIR.'/header-headroom/header-headroom.php';
		/*grids*/
		require_once 'modules/'.$themeDIR.'/blog/blog.php';
		require_once 'modules/'.$themeDIR.'/blog-category/blog-category.php';
		require_once 'modules/'.$themeDIR.'/portfolio-mixitup/portfolio-mixitup.php';
		require_once 'modules/'.$themeDIR.'/video-mixitup/video-mixitup.php';
		require_once 'modules/'.$themeDIR.'/gallery-scattered/gallery-scattered.php';
		require_once 'modules/'.$themeDIR.'/testimonials-posttype/testimonials-posttype.php';
		require_once 'modules/'.$themeDIR.'/teams/teams.php';
		require_once 'modules/'.$themeDIR.'/partners-logo/partners-logo.php';
		require_once 'modules/'.$themeDIR.'/client-mixitup/client-mixitup.php';
		/*separator and effects*/
		require_once 'modules/'.$themeDIR.'/parallax/parallax.php';
		require_once 'modules/'.$themeDIR.'/row-separator/row-separator.php';
		/*slider*/
		require_once 'modules/'.$themeDIR.'/slideshow-image/slideshow-image.php';
		require_once 'modules/'.$themeDIR.'/slideshow-content/slideshow-content.php';
		require_once 'modules/'.$themeDIR.'/slider-flickity/slider-flickity.php';
		require_once 'modules/'.$themeDIR.'/slider-flickity-thumb/slider-flickity-thumb.php';
		require_once 'modules/'.$themeDIR.'/slider/slider.php';
		require_once 'modules/'.$themeDIR.'/carousel/carousel.php';
		/*shop*/
		require_once 'modules/'.$themeDIR.'/woocommerce/woocommerce.php';
		require_once 'modules/'.$themeDIR.'/woocommerce-featured/woocommerce-featured.php';
		require_once 'modules/'.$themeDIR.'/woocommerce-latest/woocommerce-latest.php';
		require_once 'modules/'.$themeDIR.'/woocommerce-category/woocommerce-category.php';
	}
	add_action( 'init', 'fl_load_theme_modules' );
	
	

	/*Register Global CSS and JS*/
	wp_register_style( 'button-css', FL_MODULE_THEME_URL.'assets/css/button.css' ); 
	wp_enqueue_style( 'fl-builder', FL_MODULE_THEME_URL.'assets/css/fl-builder.css' );
	wp_enqueue_script( 'fl-builder', FL_MODULE_THEME_URL . 'assets/js/fl-builder.js', array( 'jquery' ) );

	/*Custom fieldstype*/
	include_once( FL_MODULE_THEME_DIR . 'fields/datedropper/datedropper.php' ); 	/* 'type' => 'datedropper', */
	include_once( FL_MODULE_THEME_DIR . 'fields/timedropper/timedropper.php' ); 	/* 'type' => 'timedropper', */
	include_once( FL_MODULE_THEME_DIR . 'fields/switch/switch.php' ); 	/* 'type' => 'switch', */
	include_once( FL_MODULE_THEME_DIR . 'fields/radio/radio.php' ); 	/* 'type' => 'switch', */
	include_once( FL_MODULE_THEME_DIR . 'fields/sliderfield/sliderfield.php' ); 	/* 'type' => 'switch', */

	/*Custom Posttype*/
	include_once( FL_MODULE_THEME_DIR . 'posttype/posttype_clients.php' );
	// include_once( FL_MODULE_THEME_DIR . 'posttype/posttype_portfolio.php' );
	// include_once( FL_MODULE_THEME_DIR . 'posttype/posttype_video.php' );
	// include_once( FL_MODULE_THEME_DIR . 'posttype/posttype_services.php' );
	// include_once( FL_MODULE_THEME_DIR . 'posttype/posttype_team.php' );
	// include_once( FL_MODULE_THEME_DIR . 'posttype/posttype_testimonials.php' );

	/*ext*/
	if ( FL_BUILDER_LITE === false ) {
		require_once( FL_MODULE_THEME_DIR . 'ext/templates/templates.php' );
	}
}
