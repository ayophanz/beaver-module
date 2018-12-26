<?php

/**
 * @class sliderModule
 */
class sliderModule extends FLBuilderModule {

	/** 
	 * @method __construct
	 */  
	public function __construct()
	{
		global $foldercategory;
		parent::__construct(array(
			'name'          	=> __('Slider', 'fl-builder'),
			'description'   	=> __('Fullscreen Slideshow.', 'fl-builder'),
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
		$classname = 'slider';
		return $classname;
	}
}

/*Module Image Size*/
add_image_size( 'slider-ui-image', 1000 , 907, true );

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('sliderModule', array(
	'slides'         => array(
		'title'         => __('Slides', 'fl-builder'),
		'sections'      => array(
			'general'       => array(
				'title'         => '',
				'fields'        => array(
					'items'         => array(
						'type'          => 'form',
						'label'         => __('Slide', 'fl-builder'),
						'form'          => 'slider_form', // ID from registered form below
						'preview_text'  => 'slider_title', // Name of a field to use for the preview text
						'multiple'      => true
					),
				)
			)
		)
	),
	'setting'        => array(
		'title'         => __('Settings', 'fl-builder'),
		'sections'      => array(
			'general'       => array(
				'title'         => '',
				'fields'        => array(
					'height'        => array(
						'type'          => 'select',
						'label'         => __('Height', 'fl-builder'),
						'default'       => 'fullscreen',
						'options'       => array(
							'fullscreen'    => __('Full Screen', 'fl-builder'),
							'autoheight'      => __('Auto Height', 'fl-builder'),
							'customheight'      => __('Custom Height', 'fl-builder'),
						),
						'toggle'        => array(
							'fullscreen'        => array(
								'fields'        => array('fullscreen_setting')
							),
							'customheight'        => array(
								'fields'        => array('customheight')
							),
						),
					),
					'fullscreen_setting'        => array(
						'type'          => 'select',
						'label'         => __('Minus Header Height', 'fl-builder'),
						'default'       => 'no',
						'options'       => array(
							'yes'    => __('Yes', 'fl-builder'),
							'no'      => __('No', 'fl-builder'),
						),
					),
					'customheight'        => array(
						'type'          => 'unit',
						'label'         => __('Custom Height', 'fl-builder'),
						'maxlength'     => '4',
						'size'          => '5',
						'description'   => 'px',
						'placeholder'   => '600',
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
								'fields'        => array('autoplay_delay', 'autoplay_speed')
							),
						),
					),
					'autoplay_delay'        => array(
						'type'          => 'unit',
						'label'         => __('Autoplay Delay', 'fl-builder'),
						'placeholder'       => '7000',
						'description'       => 'Millisecond',
					),
					'autoplay_speed'        => array(
						'type'          => 'unit',
						'label'         => __('Autoplay Speed', 'fl-builder'),
						'placeholder'       => '1500',
						'description'       => 'Millisecond',
					),
					'loop_animation'        => array(
						'type'          => 'select',
						'label'         => __('Loop Animation', 'fl-builder'),
						'default'       => 'fade',
						'options'       => array(
							'fade'    => __('Fade', 'fl-builder'),
							'slide'      => __('Slide', 'fl-builder'),
						),
						'toggle'        => array(
							'slide'        => array(
								'fields'        => array('autoplay_speed')
							),
						),
					),
					'show_dots'        => array(
						'type'          => 'select',
						'label'         => __('Enable Pagination', 'fl-builder'),
						'default'       => 'true',
						'options'       => array(
							'true'   	=> __('Yes', 'fl-builder'),
							'false'     => __('No', 'fl-builder'),
						),
						'toggle'        => array(
							'true'      => array(
								'sections'        => array( 'dots' ),
							),
						)
					),
					'show_nav'        => array(
						'type'          => 'select',
						'label'         => __('Enable Navigation', 'fl-builder'),
						'default'       => 'true',
						'options'       => array(
							'true'   	=> __('Yes', 'fl-builder'),
							'false'     => __('No', 'fl-builder'),
						),
						'toggle'        => array(
							'true'      => array(
								'sections'        => array( 'nav' ),
							),
						)
					),
				)
			),
			'color'       => array(
				'title'         => 'Color',
				'fields'        => array(  
					'slider_bg_color'       => array(
						'type'          => 'color',
						'label'         => 'Background Color',
						'show_reset'    => true,
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.slider-bg',
							'property'      => 'background-color',
						)
					),  
				)
			),
			'overlay'       => array(
				'title'         => 'Overlay',
				'fields'        => array(     
					'overlay_color'       => array(
						'type'          => 'color',
						'label'         => 'Overlay Color',
						'show_reset'    => true,
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.slider-bg:before',
							'property'      => 'background-color',
						)
					),   
					'overlay_opacity'    => array(
						'type'          => 'unit',
						'label'         => __('Background Overlay Opacity', 'fl-builder'),
						'description'   => '0 to 1 eg: 0.6',
						'placeholder'   => '0.5',
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.slider-bg:before',
							'property'      => 'opacity',
						)
					),
				)
			),
			'buttons'       => array(
				'title'         => 'Buttons',
				'fields'        => array(  
					'slider_button_color'       => array(
						'type'          => 'color',
						'label'         => 'Button Color',
						'show_reset'    => true,
						'preview'       => array(
							'type'          => 'css',
							'rules'           => array(
								array(
									'selector'      => 'a.slider-button',
									'property'      => 'background-color',
								),
								array(
									'selector'      => 'a.slider-button',
									'property'      => 'border-color',
								),   
							) 
						)
					),  
					'slider_button_color_text'       => array(
						'type'          => 'color',
						'label'         => 'Button Text Color',
						'show_reset'    => true,
						'preview'       => array(
							'type'          => 'css',
							'rules'           => array(
								array(
									'selector'      => 'a.slider-button',
									'property'      => 'color',
								),
							) 
						)
					),
					'slider_button_color_highlight'       => array(
						'type'          => 'color',
						'label'         => 'Highlight/First Button Color',
						'show_reset'    => true,
						'preview'       => array(
							'type'          => 'css',
							'rules'           => array(
								array(
									'selector'      => 'a.slider-button.highlight',
									'property'      => 'background-color',
								),
								array(
									'selector'      => 'a.slider-button.highlight',
									'property'      => 'border-color',
								),   
							) 
						)
					),
					'slider_button_color_highlight_text'       => array(
						'type'          => 'color',
						'label'         => 'Highlight/First Button Text Color',
						'show_reset'    => true,
						'preview'       => array(
							'type'          => 'css',
							'rules'           => array(
								array(
									'selector'      => 'a.slider-button.highlight',
									'property'      => 'color',
								),
							) 
						)
					),
				)
			),
			'padding'       => array(
				'title'         => 'Padding',
				'fields'        => array(       
					'padding_top'       => array(
						'type'          => 'unit',
						'label'         => 'Top',
						'placeholder'         => '110',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px',
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.slider-info',
							'property'      => 'padding-top',
							'unit'          => 'px'
						),
						'responsive'  => array(
							'placeholder' => array(
								'default'    => ( isset( $global_settings->padding_top ) ) ? $global_settings->padding_top : '110',
								'medium'     => ( isset( $global_settings->padding_top_medium ) ) ? $global_settings->padding_top_medium : '60',
								'responsive' => ( isset( $global_settings->padding_top_responsive ) ) ? $global_settings->padding_top_responsive : '',
							)
						),
					),    
					'padding_bottom'       => array(
						'type'          => 'unit',
						'label'         => 'Bottom',
						'placeholder'         => '70',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px',
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.slider-info',
							'property'      => 'padding-bottom',
							'unit'          => 'px'
						),
						'responsive'  => array(
							'placeholder' => array(
								'default'    => ( isset( $global_settings->padding_bottom ) ) ? $global_settings->padding_bottom : '70',
								'medium'     => ( isset( $global_settings->padding_bottom_medium ) ) ? $global_settings->padding_bottom_medium : '60',
								'responsive' => ( isset( $global_settings->padding_bottom_responsive ) ) ? $global_settings->padding_bottom_responsive : '',
							)
						),
					),    
					'padding_left'       => array(
						'type'          => 'unit',
						'label'         => 'Left',
						'placeholder'         => '80',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px',
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.slider-info',
							'property'      => 'padding-left',
							'unit'          => 'px'
						),
						'responsive'  => array(
							'placeholder' => array(
								'default'    => ( isset( $global_settings->padding_left ) ) ? $global_settings->padding_left : '80',
								'medium'     => ( isset( $global_settings->padding_left_medium ) ) ? $global_settings->padding_left_medium : '20',
								'responsive' => ( isset( $global_settings->padding_left_responsive ) ) ? $global_settings->padding_left_responsive : '',
							)
						),
					),    
					'padding_right'       => array(
						'type'          => 'unit',
						'label'         => 'Right',
						'placeholder'         => '80',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px',
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.slider-info',
							'property'      => 'padding-right',
							'unit'          => 'px'
						),
						'responsive'  => array(
							'placeholder' => array(
								'default'    => ( isset( $global_settings->padding_right ) ) ? $global_settings->padding_right : '80',
								'medium'     => ( isset( $global_settings->padding_right_medium ) ) ? $global_settings->padding_right_medium : '20',
								'responsive' => ( isset( $global_settings->padding_right_responsive ) ) ? $global_settings->padding_right_responsive : '',
							)
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
							'selector'		=> '.slider .owl-dots .owl-dot',
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
							'selector'		=> '.slider .owl-dots .owl-dot.active',
							'property'      => 'background-color',
						),
					),
					/*'dots_size'        => array(
						'type'          => 'unit',
						'label'         => __('Dots Size', 'fl-builder'),
						'default'       => '',
						'preview'		=> array(
							'type'		=> 'css',
							'rules'           => array(
								array(
									'selector'		=> '.slider .owl-dots .owl-dot',
									'property'      => 'width',
									'unit'      => 'px',
								),
								array(
									'selector'		=> '.slider .owl-dots .owl-dot',
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
									'selector'		=> '.slider .owl-dots .owl-dot',
									'property'      => 'margin-left',
									'unit'      => 'px',
								),
								array(
									'selector'		=> '.slider .owl-dots .owl-dot',
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
									'selector'		=> '.slider .owl-dots',
									'property'      => 'margin-top',
									'unit'      => 'px',
								),
							),
						),
					),*/
				)
			),
			'nav'       => array(
				'title'         => 'Navs',
				'fields'        => array(
					'nav_bg_color'        => array(
						'type'          => 'color',
						'label'         => __('Nav Background Color', 'fl-builder'),
						'default'       => '',
						'show_reset'    => true,
						'preview'		=> array(
							'type'		=> 'css',
							'rules'           => array(
								array(
									'selector'		=> '.slider .owl-nav *',
									'property'      => 'background-color',
								),
							),
						),
					),
					'nav_border_color'        => array(
						'type'          => 'color',
						'label'         => __('Nav Border Color', 'fl-builder'),
						'default'       => '',
						'show_reset'    => true,
						'preview'		=> array(
							'type'		=> 'css',
							'rules'           => array(
								array(
									'selector'		=> '.slider .owl-nav *',
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
									'selector'		=> '.slider .owl-nav *::before',
									'property'      => 'background-color',
								),
								array(
									'selector'		=> '.slider .owl-nav *::after',
									'property'      => 'background-color',
								), 
							),
						),
					),
					'nav_bg_color_hover'        => array(
						'type'          => 'color',
						'label'         => __('Nav Background Color Hover', 'fl-builder'),
						'default'       => '',
						'show_reset'    => true,
						'preview'		=> array(
							'type'		=> 'css',
							'rules'           => array(
								array(
									'selector'		=> '.slider .owl-nav *:hover',
									'property'      => 'background-color',
								),
								array(
									'selector'		=> '.slider .owl-nav *:hover',
									'property'      => 'background-color',
								), 
							),
						),
					),
					'nav_border_color_hover'        => array(
						'type'          => 'color',
						'label'         => __('Nav Border Color Hover', 'fl-builder'),
						'default'       => '',
						'show_reset'    => true,
						'preview'		=> array(
							'type'		=> 'css',
							'rules'           => array(
								array(
									'selector'		=> '.slider .owl-nav *:hover',
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
									'selector'		=> '.slider .owl-nav *:hover::before',
									'property'      => 'background-color',
								),
								array(
									'selector'		=> '.slider .owl-nav *:hover::after',
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
									'selector'		=> '.slider .owl-nav *',
									'property'      => 'width',
									'unit'      => 'px',
								),
								array(
									'selector'		=> '.slider .owl-nav *',
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
									'selector'		=> '.slider .owl-nav *',
									'property'      => 'border-radius',
									'unit'      => 'px',
								),
								array(
									'selector'		=> '.slider .owl-nav *',
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
									'selector'		=> '.slider .owl-nav .owl-prev',
									'property'      => 'left',
									'unit'      => 'px',
								),
								array(
									'selector'		=> '.slider .owl-nav .owl-next',
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
									'selector'		=> '.slider .owl-nav *::before',
									'property'      => 'width',
									'unit'      => 'px',
								),
								array(
									'selector'		=> '.slider .owl-nav *::after',
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
									'selector'		=> '.slider .owl-nav *',
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
									'selector'		=> '.slider .owl-nav *::before',
									'property'      => 'border-radius',
									'unit'      => 'px',
								),
								array(
									'selector'		=> '.slider .owl-nav *::after',
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
									'selector'		=> '.slider .owl-nav',
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

/**
 * Register a settings form to use in the "form" field type above.
 */
FLBuilder::register_settings_form('slider_form', array(
	'title' => __('Slide', 'fl-builder'),
	'tabs'  => array(
		'slide'      => array(
			'title'         => __('Slide Info', 'fl-builder'),
			'sections'      => array(
				'info_bg'       => array(
					'title'         => __('Background', 'fl-builder'),
					'fields'        => array(
						'slider_bg_image'       => array(
							'type'          => 'photo',
							'label'         => 'Background Image',
							'show_remove' 	=> true,
						),
						'slider_bg_image_mobile'       => array(
							'type'          => 'photo',
							'label'         => 'Background Image Mobile',
							'show_remove' 	=> true,
						),
						'slider_bg_image_mobile_bottom_spacing'       => array(
							'type'          => 'unit',
							'label'         => 'Background Image Mobile Bottom Spacing',
							'placeholder'   => '320',
							'description'   => 'px',
						),
						'slider_bg_image_mobile_portrait_bottom_spacing'       => array(
							'type'          => 'unit',
							'label'         => 'Background Image Mobile Portrait Bottom Spacing',
							'placeholder'   => '220',
							'description'   => 'px',
						),
					),
				),
				'info_image'       => array(
					'title'         => __('Image Optional', 'fl-builder'),
					'fields'        => array(
						'slider_image'       => array(
							'type'          => 'photo',
							'label'         => 'Slide Image',
							'show_remove' 	=> true,
						),
						'slider_bottom_image'       => array(
							'type'          => 'photo',
							'label'         => 'Bottom Image',
							'show_remove' 	=> true,
						),
					),
				),
				'info_text'       => array(
					'title'         => __('Text', 'fl-builder'),
					'fields'        => array(
						'slider_style'        => array(
							'type'          => 'select',
							'label'         => __('Slide Style', 'fl-builder'),
							'default'       => 'left',
							'options'       => array(
								'left'    	=> __('Left', 'fl-builder'),
								'center'    => __('Center', 'fl-builder'),
								'right'     => __('Right', 'fl-builder'),
							),
							'toggle'        => array(
								'center'        => array(
									'fields'        => array('slider_bottom_image')
								),
							),
						),
						'slider_title'       => array(
							'type'          => 'text',
							'label'         => 'Title',
							'default'   => __('We are Marketing <em>for</em> E-Commerce', 'fl-builder'),
							'placeholder'   => __('We are Marketing <em>for</em> E-Commerce', 'fl-builder'),
						),
						'slider_text'       => array(
							'type'          => 'textarea',
							'label'         => 'Text',
							'default'   => __('Pellentesque eget fringilla turtpis. Integer sed felis id quam viverra tempus auctor vel lorem. Donec lobortis vehicula nibh in dictum. Pellentesque posuere ullamcorper neque non finibus. Nullam in lorem ipsum.', 'fl-builder'),
						),
						'slider_btn_title'       => array(
							'type'          => 'text',
							'label'         => 'Button Title',
							'default'   => __('Start now and get <em>free bonus</em> on your account', 'fl-builder'),
							'placeholder'   => __('Start now and get <em>free bonus</em> on your account', 'fl-builder'),
						),
						'slider_btn_1_label'       => array(
							'type'          => 'text',
							'label'         => 'Button 1 label',
							'default'   => __('GET STARTED', 'fl-builder'),
						),
						'slider_btn_1_link'       => array(
							'type'          => 'link',
							'label'         => 'Button 1 Link',
						),
						'slider_btn_2_label'       => array(
							'type'          => 'text',
							'label'         => 'Button 2 label',
							'default'   => __('MORE INFO', 'fl-builder'),
						),
						'slider_btn_2_link'       => array(
							'type'          => 'link',
							'label'         => 'Button 2 Link',
						),
					)
				),
			)
		),
		'slide_setting'      => array(
			'title'         => __('Slide Setting', 'fl-builder'),
			'sections'      => array(
				'font_size'       => array(
					'title'         => __('Font Size', 'fl-builder'),
					'fields'        => array(
						'slider_title_size'       => array(
							'type'          => 'unit',
							'label'         => 'Title Size',
							'placeholder'   => '65',
							'description'   => 'px',
							'responsive'  => array(
								'placeholder' => array(
									'default'    => ( isset( $global_settings->slider_title_size ) ) ? $global_settings->slider_title_size : '65',
									'medium'     => ( isset( $global_settings->slider_title_size_medium ) ) ? $global_settings->slider_title_size_medium : '',
									'responsive' => ( isset( $global_settings->slider_title_size_responsive ) ) ? $global_settings->slider_title_size_responsive : '',
								)
							),
						),
						'slider_text_size'       => array(
							'type'          => 'unit',
							'label'         => 'Text Size',
							'placeholder'   => '20',
							'description'   => 'px',
							'responsive'  => array(
								'placeholder' => array(
									'default'    => ( isset( $global_settings->slider_text_size ) ) ? $global_settings->slider_text_size : '20',
									'medium'     => ( isset( $global_settings->slider_text_size_medium ) ) ? $global_settings->slider_text_size_medium : '',
									'responsive' => ( isset( $global_settings->slider_text_size_responsive ) ) ? $global_settings->slider_text_size_responsive : '',
								)
							),
						),
						'slider_btn_title_size'       => array(
							'type'          => 'unit',
							'label'         => 'Buttons Title Size',
							'placeholder'   => '30',
							'description'   => 'px',
							'responsive'  => array(
								'placeholder' => array(
									'default'    => ( isset( $global_settings->slider_btn_title_size ) ) ? $global_settings->slider_btn_title_size : '30',
									'medium'     => ( isset( $global_settings->slider_btn_title_size_medium ) ) ? $global_settings->slider_btn_title_size_medium : '',
									'responsive' => ( isset( $global_settings->slider_btn_title_size_responsive ) ) ? $global_settings->slider_btn_title_size_responsive : '',
								)
							),
						),
						'slider_btn_label_size'       => array(
							'type'          => 'unit',
							'label'         => 'Button Size',
							'placeholder'   => '16',
							'description'   => 'px',
							'responsive'  => array(
								'placeholder' => array(
									'default'    => ( isset( $global_settings->slider_btn_label_size ) ) ? $global_settings->slider_btn_label_size : '16',
									'medium'     => ( isset( $global_settings->slider_btn_label_size_medium ) ) ? $global_settings->slider_btn_label_size_medium : '',
									'responsive' => ( isset( $global_settings->slider_btn_label_size_responsive ) ) ? $global_settings->slider_btn_label_size_responsive : '',
								)
							),
						),
					)
				),
				'font_color'       => array(
					'title'         => __('Font Color', 'fl-builder'),
					'fields'        => array(
						'slider_title_color'       => array(
							'type'          => 'color',
							'label'         => 'Title Color',
							'show_reset'    => true,
						),
						'slider_title_span_color'       => array(
							'type'          => 'color',
							'label'         => 'Title Span Color',
							'show_reset'    => true,
						),
						'slider_text_color'       => array(
							'type'          => 'color',
							'label'         => 'Text Color',
							'show_reset'    => true,
						),
						'slider_text_span_color'       => array(
							'type'          => 'color',
							'label'         => 'Text Span Color',
							'show_reset'    => true,
						),
						'slider_btn_title_color'       => array(
							'type'          => 'color',
							'label'         => 'Buttons Title Color',
							'show_reset'    => true,
						),
						'slider_btn_title_span_color'       => array(
							'type'          => 'color',
							'label'         => 'Buttons Title Span Color',
							'show_reset'    => true,
						),
						'slider_btn_label_color'       => array(
							'type'          => 'color',
							'label'         => 'Button label Color',
							'show_reset'    => true,
						),
						'slider_btn_label_span_color'       => array(
							'type'          => 'color',
							'label'         => 'Button label Span Color',
							'show_reset'    => true,
						),
						'slider_btn_border_color'       => array(
							'type'          => 'color',
							'label'         => 'Button Border Color',
							'show_reset'    => true,
						),
						'slider_btn_label_highlight_color'       => array(
							'type'          => 'color',
							'label'         => 'Button Highlight label Color',
							'show_reset'    => true,
						),
						'slider_btn_border_highlight_color'       => array(
							'type'          => 'color',
							'label'         => 'Button Highlight Border Color',
							'show_reset'    => true,
						),
					)
				),
				'max_width'       => array(
					'title'         => __('Max Width', 'fl-builder'),
					'fields'        => array(
						'slider_title_max_width'       => array(
							'type'          => 'unit',
							'label'         => 'Title Max Width',
							'placeholder'   => '30',
							'description'   => '%',
							'responsive'  => array(
								'placeholder' => array(
									'default'    => ( isset( $global_settings->slider_title_max_width ) ) ? $global_settings->slider_title_max_width : '30',
									'medium'     => ( isset( $global_settings->slider_title_max_width_medium ) ) ? $global_settings->slider_title_max_width_medium : '',
									'responsive' => ( isset( $global_settings->slider_title_max_width_responsive ) ) ? $global_settings->slider_title_max_width_responsive : '',
								)
							),
						),
						'slider_text_max_width'       => array(
							'type'          => 'unit',
							'label'         => 'Text Max Width',
							'placeholder'   => '30',
							'description'   => '%',
							'responsive'  => array(
								'placeholder' => array(
									'default'    => ( isset( $global_settings->slider_text_max_width ) ) ? $global_settings->slider_text_max_width : '30',
									'medium'     => ( isset( $global_settings->slider_text_max_width_medium ) ) ? $global_settings->slider_text_max_width_medium : '',
									'responsive' => ( isset( $global_settings->slider_text_max_width_responsive ) ) ? $global_settings->slider_text_max_width_responsive : '',
								)
							),
						),
					)
				),
			)
		),
	)
));