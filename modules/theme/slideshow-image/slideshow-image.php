<?php
/**
 * @class SlideshowImageModule
 */
class SlideshowImageModule extends FLBuilderModule {

	/** 
	 * @method __construct
	 */  
	public function __construct()
	{
		global $foldercategory;
		parent::__construct(array(
			'name'          	=> __('Slideshow Image', 'fl-builder'),
			'description'   	=> __('Image Slider.', 'fl-builder'),
			'category'      	=> __($foldercategory, 'fl-builder'),
			'partial_refresh'	=> true
		));
		// Register and enqueue your own.
		$this->add_css( 'owl-carousel', FL_MODULE_THEME_URL . 'assets/owlcarousel/owl.carousel.css' );
		$this->add_css( 'owl-carousel-theme', FL_MODULE_THEME_URL . 'assets/owlcarousel/owl.theme.default.min.css' );
		$this->add_js( 'owl-carousel', FL_MODULE_THEME_URL . 'assets/owlcarousel/owl.carousel.min.js', array(), '', true );
	}
	
	/**
	 * @method get_classname
	 */
	public function get_classname()
	{
		$classname = 'slideshow-image';
		return $classname;
	}
}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('SlideshowImageModule', array(
	'slides'         => array(
		'title'         => __('General', 'fl-builder'),
		'sections'      => array(
			'general'       => array(
				'title'         => '',
				'fields'        => array(
					'gallery'         => array(
						'type'          => 'multiple-photos',
						'label'         => __('Gallery', 'fl-builder'),
					),
					'height'        => array(
						'type'          => 'select',
						'label'         => __('Height', 'fl-builder'),
						'default'       => 'autoheight',
						'options'       => array(
							'autoheight'      => __('Auto Height', 'fl-builder'),
							'fullheight'    => __('Full Height', 'fl-builder'),
							'customheight'      => __('Custom Height', 'fl-builder'),
						),
						'toggle'        => array(
							'autoheight'        => array(
								'fields'        => array('autoheight_maxheight'),
							),
							'customheight'        => array(
								'fields'        => array('customheight', 'customheight_image_display'),
							),
						),
					),
					'autoheight_maxheight'        => array(
						'type'          => 'unit',
						'label'         => __('Add Max Height', 'fl-builder'),
						'description'   => 'px',
						'default'   => '',
						'placeholder'   => '300',
						'help'   => 'For PNG or Transparent Photo',
						'responsive'  => array(
							'placeholder' => array(
								'default'    => ( isset( $global_settings->autoheight_maxheight ) ) ? $global_settings->autoheight_maxheight : '400',
								'medium'     => ( isset( $global_settings->autoheight_maxheight_medium ) ) ? $global_settings->autoheight_maxheight_medium : '',
								'responsive' => ( isset( $global_settings->autoheight_maxheight_responsive ) ) ? $global_settings->autoheight_maxheight_responsive : '',
							)
						),
					),
					'customheight'        => array(
						'type'          => 'unit',
						'label'         => __('Custom Height', 'fl-builder'),
						'maxlength'     => '4',
						'size'          => '5',
						'description'   => 'px',
						'default'   => '400',
						'placeholder'   => '400',
						'responsive'  => array(
							'placeholder' => array(
								'default'    => ( isset( $global_settings->customheight ) ) ? $global_settings->customheight : '400',
								'medium'     => ( isset( $global_settings->customheight_medium ) ) ? $global_settings->customheight_medium : '',
								'responsive' => ( isset( $global_settings->customheight_responsive ) ) ? $global_settings->customheight_responsive : '',
							)
						),
					),
					'customheight_image_display'        => array(
						'type'          => 'select',
						'label'         => __('Custom Image Display', 'fl-builder'),
						'default'   => '',
						'help'   => 'Covers the entire container & Contain show the whole image',
						'options'       => array(
							''      => __('Cover', 'fl-builder'),
							'contain'    => __('Contain', 'fl-builder'),
						)
					),
				)
			),
		)
	),
	'settings'         => array(
		'title'         => __('Settings', 'fl-builder'),
		'sections'      => array(
			'setting'       => array(
				'title'         => '',
				'fields'        => array(
					'style'        => array(
						'type'          => 'select',
						'label'         => __('Style', 'fl-builder'),
						'default'       => 'slide',
						'options'       => array(
							'slide'      => __('Slide', 'fl-builder'),
							'fade'    => __('Fade', 'fl-builder'),
						)
					),
					'effect'        => array(
						'type'          => 'select',
						'label'         => __('Effect', 'fl-builder'),
						'default'       => '',
						'options'       => array(
							''      => __('Default', 'fl-builder'),
							'shadow'    => __('Shadow', 'fl-builder'),
						)
					),
					'autoplay'        => array(
						'type'          => 'select',
						'label'         => __('Autoplay', 'fl-builder'),
						'default'       => 'true',
						'options'       => array(
							'true'    => __('Yes', 'fl-builder'),
							'false'      => __('No', 'fl-builder'),
						),
						'toggle'        => array(
							'true'        => array(
								'fields'        => array('delay'),
							),
						),
					), 
					'delay'        => array(
						'type'          => 'unit',
						'label'         => __('Animation Delay', 'fl-builder'),
						'default'     	=> '7000',
						'description'   => 'Millisecond',
						'placeholder'   => '1000',
					),
					'speed'        => array(
						'type'          => 'unit',
						'label'         => __('Transition Speed', 'fl-builder'),
						'default'     => '1000',
						'description'   => 'Millisecond',
						'placeholder'   => '1000',
					),
					'link_image'        => array(
						'type'          => 'select',
						'label'         => __('Link Image', 'fl-builder'),
						'default'       => 'true',
						'options'       => array(
							'true'    => __('Yes', 'fl-builder'),
							'false'      => __('No', 'fl-builder'),
						),
					),
					'show_caption'        => array(
						'type'          => 'select',
						'label'         => __('Show Caption', 'fl-builder'),
						'default'       => 'false',
						'options'       => array(
							'true'    => __('Yes', 'fl-builder'),
							'false'      => __('No', 'fl-builder'),
						),
						'toggle'        => array(
							'true'        => array(
								'sections'        => array('caption'),
							),
						),
					),
					'show_dots'        => array(
						'type'          => 'select',
						'label'         => __('Show Dots', 'fl-builder'),
						'default'       => 'true',
						'options'       => array(
							'true'    => __('Yes', 'fl-builder'),
							'false'      => __('No', 'fl-builder'),
						),
						'toggle'        => array(
							'true'        => array(
								'sections'        => array('dots'),
							),
						),
					), 
					'show_nav'        => array(
						'type'          => 'select',
						'label'         => __('Show Nav', 'fl-builder'),
						'default'       => 'true',
						'options'       => array(
							'true'    => __('Yes', 'fl-builder'),
							'false'      => __('No', 'fl-builder'),
						),
						'toggle'        => array(
							'true'        => array(
								'sections'        => array('nav'),
							),
						),
					), 
				)
			),
			'caption'       => array(
				'title'         => 'Caption',
				'fields'        => array(             
					'caption_color'        => array(
						'type'          => 'color',
						'label'         => __('Caption Color', 'fl-builder'),
						'default'       => '',
						'show_reset'       => 'true',
						'preview'		=> array(
							'type'		=> 'css',
							'selector'		=> '.slideshow-caption',
							'property'      => 'color',
						),
					),
					'caption_size'        => array(
						'type'          => 'unit',
						'label'         => __('Caption Size', 'fl-builder'),
						'default'       => '400',
						'options'       => array(
						),
						'preview'		=> array(
							'type'		=> 'css',
							'selector'		=> '.slideshow-caption',
							'property'      => 'font-size',
							'unit'      	=> 'px',
						),
					),
					'caption_weight'        => array(
						'type'          => 'select',
						'label'         => __('Caption Weight', 'fl-builder'),
						'default' 		=> '',
						'options'       => array(
							''    	=> __('Default', 'fl-builder'),
							'100'    	=> __('100 Thin', 'fl-builder'),
							'200'    	=> __('200 Extra-Light', 'fl-builder'),
							'300'    	=> __('300 Light', 'fl-builder'),
							'400'    	=> __('400 Normal', 'fl-builder'),
							'500'    	=> __('500 Medium', 'fl-builder'),
							'600'    	=> __('600 Semi-Bold', 'fl-builder'),
							'700'    	=> __('700 Bold', 'fl-builder'),
							'800'    	=> __('800 Extra-Bold', 'fl-builder'),
							'900'    	=> __('900 Ultra-Bold', 'fl-builder'),
						),
						'preview'		=> array(
							'type'		=> 'css',
							'selector'		=> '.slideshow-caption',
							'property'      => 'font-weight',
						),
					),
					'caption_spacing_top'        => array(
						'type'          => 'unit',
						'label'         => __('Caption Spacing Top', 'fl-builder'),
						'default'       => '',
						'preview'		=> array(
							'type'		=> 'css',
							'selector'		=> '.slideshow-caption',
							'property'      => 'padding-top',
							'unit'      	=> 'px',
						),
					),
					'caption_spacing_bottom'        => array(
						'type'          => 'unit',
						'label'         => __('Caption Spacing Bottom', 'fl-builder'),
						'default'       => '',
						'preview'		=> array(
							'type'		=> 'css',
							'selector'		=> '.slideshow-caption',
							'property'      => 'padding-bottom',
							'unit'      	=> 'px',
						),
					),
				)
			),
			'dots'       => array(
				'title'         => 'Dots',
				'fields'        => array(             
					'dots_color'        => array(
						'type'          => 'color',
						'label'         => __('Dots Color', 'fl-builder'),
						'default'       => '',
						'show_reset'       => 'true',
						'preview'		=> array(
							'type'		=> 'css',
							'selector'		=> '.slideshow-image .owl-dots .owl-dot',
							'property'      => 'background-color',
						),
					),   
					'dots_active_color'        => array(
						'type'          => 'color',
						'label'         => __('Dots Active Color', 'fl-builder'),
						'default'       => '',
						'show_reset'       => 'true',
						'preview'		=> array(
							'type'		=> 'css',
							'selector'		=> '.slideshow-image .owl-dots .owl-dot.active',
							'property'      => 'background-color',
						),
					),
					'dots_size'        => array(
						'type'          => 'unit',
						'label'         => __('Dots Size', 'fl-builder'),
						'default'       => '',
						'preview'		=> array(
							'type'		=> 'css',
							'rules'           => array(
								array(
									'selector'		=> '.slideshow-image .owl-dots .owl-dot',
									'property'      => 'width',
									'unit'      => 'px',
								),
								array(
									'selector'		=> '.slideshow-image .owl-dots .owl-dot',
									'property'      => 'height',
									'unit'      => 'px',
								), 
							),
						),
					),
					'dots_spacing'        => array(
						'type'          => 'unit',
						'label'         => __('Dots Spacing', 'fl-builder'),
						'default'       => '',
						'preview'		=> array(
							'type'		=> 'css',
							'rules'           => array(
								array(
									'selector'		=> '.slideshow-image .owl-dots .owl-dot',
									'property'      => 'margin-left',
									'unit'      => 'px',
								),
								array(
									'selector'		=> '.slideshow-image .owl-dots .owl-dot',
									'property'      => 'margin-right',
									'unit'      => 'px',
								), 
							),
						),
					),
					'dots_margin_top'        => array(
						'type'          => 'unit',
						'label'         => __('Dots Top Margin', 'fl-builder'),
						'default'       => '',
						'preview'		=> array(
							'type'		=> 'css',
							'rules'           => array(
								array(
									'selector'		=> '.slideshow-image .owl-dots',
									'property'      => 'margin-top',
									'unit'      => 'px',
								),
							),
						),
					),
				)
			),
			'nav'       => array(
				'title'         => 'Navs',
				'fields'        => array(
					'nav_bg_color'        => array(
						'type'          => 'color',
						'label'         => __('Nav Background Color', 'fl-builder'),
						'default'       => 'eeeeee',
						'show_reset'    => true,
						'preview'		=> array(
							'type'		=> 'css',
							'rules'           => array(
								array(
									'selector'		=> '.slideshow-image .owl-nav *',
									'property'      => 'background-color',
								),
							),
						),
					),
					'nav_border_color'        => array(
						'type'          => 'color',
						'label'         => __('Nav Border Color', 'fl-builder'),
						'default'       => 'cccccc',
						'show_reset'    => true,
						'preview'		=> array(
							'type'		=> 'css',
							'rules'           => array(
								array(
									'selector'		=> '.slideshow-image .owl-nav *',
									'property'      => 'border-color',
								),
							),
						),
					),
					'nav_color'        => array(
						'type'          => 'color',
						'label'         => __('Nav Color', 'fl-builder'),
						'default'       => '',
						'description'   => 'default: #000000',
						'show_reset'    => false,
						'preview'		=> array(
							'type'		=> 'css',
							'rules'           => array(
								array(
									'selector'		=> '.slideshow-image .owl-nav *::before',
									'property'      => 'background-color',
								),
								array(
									'selector'		=> '.slideshow-image .owl-nav *::after',
									'property'      => 'background-color',
								), 
							),
						),
					),
					'nav_bg_color_hover'        => array(
						'type'          => 'color',
						'label'         => __('Nav Background Color Hover', 'fl-builder'),
						'default'       => 'eeeeee',
						'show_reset'    => true,
						'preview'		=> array(
							'type'		=> 'css',
							'rules'           => array(
								array(
									'selector'		=> '.slideshow-image .owl-nav *:hover',
									'property'      => 'background-color',
								),
								array(
									'selector'		=> '.slideshow-image .owl-nav *:hover',
									'property'      => 'background-color',
								), 
							),
						),
					),
					'nav_border_color_hover'        => array(
						'type'          => 'color',
						'label'         => __('Nav Border Color Hover', 'fl-builder'),
						'default'       => 'cccccc',
						'show_reset'    => true,
						'preview'		=> array(
							'type'		=> 'css',
							'rules'           => array(
								array(
									'selector'		=> '.slideshow-image .owl-nav *:hover',
									'property'      => 'border-color',
								),
							),
						),
					),
					'nav_color_hover'        => array(
						'type'          => 'color',
						'label'         => __('Nav Color Hover', 'fl-builder'),
						'default'       => '',
						'show_reset'    => true,
						'preview'		=> array(
							'type'		=> 'css',
							'rules'           => array(
								array(
									'selector'		=> '.slideshow-image .owl-nav *:hover::before',
									'property'      => 'background-color',
								),
								array(
									'selector'		=> '.slideshow-image .owl-nav *:hover::after',
									'property'      => 'background-color',
								), 
							),
						),
					),
					'nav_size'        => array(
						'type'          => 'unit',
						'label'         => __('Nav Size', 'fl-builder'),
						'default'       => '',
						'preview'		=> array(
							'type'		=> 'css',
							'rules'           => array(
								array(
									'selector'		=> '.slideshow-image .owl-nav *',
									'property'      => 'width',
									'unit'      => 'px',
								),
								array(
									'selector'		=> '.slideshow-image .owl-nav *',
									'property'      => 'height',
									'unit'      => 'px',
								), 
							),
						),
					),
					'nav_radius'        => array(
						'type'          => 'unit',
						'label'         => __('Nav Radius', 'fl-builder'),
						'default'       => '',
						'description'   => 'px',
						'preview'		=> array(
							'type'		=> 'css',
							'rules'           => array(
								array(
									'selector'		=> '.slideshow-image .owl-nav *',
									'property'      => 'border-radius',
									'unit'      => 'px',
								),
								array(
									'selector'		=> '.slideshow-image .owl-nav *',
									'property'      => 'border-radius',
									'unit'      => 'px',
								),
							),
						),
					),
					'nav_spacing'        => array(
						'type'          => 'unit',
						'label'         => __('Nav Spacing', 'fl-builder'),
						'default'       => '',
						'description'   => 'px',
						'preview'		=> array(
							'type'		=> 'css',
							'rules'           => array(
								array(
									'selector'		=> '.slideshow-image .owl-nav .owl-prev',
									'property'      => 'left',
									'unit'      => 'px',
								),
								array(
									'selector'		=> '.slideshow-image .owl-nav .owl-next',
									'property'      => 'right',
									'unit'      => 'px',
								), 
							),
						),
					),
					'nav_thick'        => array(
						'type'          => 'unit',
						'label'         => __('Nav Arrow Thickness', 'fl-builder'),
						'default'       => '',
						'description'   => 'px',
						'preview'		=> array(
							'type'		=> 'css',
							'rules'           => array(
								array(
									'selector'		=> '.slideshow-image .owl-nav *::before',
									'property'      => 'width',
									'unit'      => 'px',
								),
								array(
									'selector'		=> '.slideshow-image .owl-nav *::after',
									'property'      => 'width',
									'unit'      => 'px',
								),
							),
						),
					),
					'nav_border_thick'        => array(
						'type'          => 'unit',
						'label'         => __('Nav Border Thickness', 'fl-builder'),
						'default'       => '',
						'description'   => 'px',
						'preview'		=> array(
							'type'		=> 'css',
							'rules'           => array(
								array(
									'selector'		=> '.slideshow-image .owl-nav *',
									'property'      => 'border-width',
									'unit'      => 'px',
								),
							),
						),
					),
					'nav_arrow_radius'        => array(
						'type'          => 'unit',
						'label'         => __('Nav Arrow Radius', 'fl-builder'),
						'default'       => '',
						'description'   => 'px',
						'preview'		=> array(
							'type'		=> 'css',
							'rules'           => array(
								array(
									'selector'		=> '.slideshow-image .owl-nav *::before',
									'property'      => 'border-radius',
									'unit'      => 'px',
								),
								array(
									'selector'		=> '.slideshow-image .owl-nav *::after',
									'property'      => 'border-radius',
									'unit'      => 'px',
								),
							),
						),
					),
					'nav_margin_top'        => array(
						'type'          => 'unit',
						'label'         => __('Nav Top Margin', 'fl-builder'),
						'default'       => '',
						'preview'		=> array(
							'type'		=> 'css',
							'rules'           => array(
								array(
									'selector'		=> '.slideshow-image .owl-nav',
									'property'      => 'margin-top',
									'unit'      => 'px',
								),
							),
						),
					),
				)
			),
		)
	)
));