<?php

/**
 * @class slideshowContentModule
 */
class slideshowContentModule extends FLBuilderModule {

	/** 
	 * @method __construct
	 */  
	public function __construct()
	{
		global $foldercategory;
		parent::__construct(array(
			'name'          	=> __('Slideshow Content', 'fl-builder'),
			'description'   	=> __('Content Slideshow.', 'fl-builder'),
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
		$classname = 'slideshow-content';
		return $classname;
	}
}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('slideshowContentModule', array(
	'slides'         => array(
		'title'         => __('Slides', 'fl-builder'),
		'sections'      => array(
			'general'       => array(
				'title'         => '',
				'fields'        => array(
					'items'         => array(
						'type'          => 'form',
						'label'         => __('Slide', 'fl-builder'),
						'form'          => 'slideshow_content_form', // ID from registered form below
						'preview_text'  => 'title', // Name of a field to use for the preview text
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
			'buttons'       => array(
				'title'         => 'Buttons',
				'fields'        => array(  
					'slider_button_color'       => array(
						'type'          => 'color',
						'label'         => 'Highlight Button Color',
						'show_reset'    => true,
						'rules'           => array(
							array(
								'selector'      => 'a.slider-ui-button.hightlight',
								'property'      => 'background-color',
							),
							array(
								'selector'      => 'a.slider-ui-button.hightlight',
								'property'      => 'border-color',
							),    
						)
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
							'selector'		=> '.slideshow-content .owl-dots .owl-dot',
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
							'selector'		=> '.slideshow-content .owl-dots .owl-dot.active',
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
									'selector'		=> '.slideshow-content .owl-dots .owl-dot',
									'property'      => 'width',
									'unit'      => 'px',
								),
								array(
									'selector'		=> '.slideshow-content .owl-dots .owl-dot',
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
									'selector'		=> '.slideshow-content .owl-dots .owl-dot',
									'property'      => 'margin-left',
									'unit'      => 'px',
								),
								array(
									'selector'		=> '.slideshow-content .owl-dots .owl-dot',
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
									'selector'		=> '.slideshow-content .owl-dots',
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
									'selector'		=> '.slideshow-content .owl-nav *',
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
									'selector'		=> '.slideshow-content .owl-nav *',
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
									'selector'		=> '.slideshow-content .owl-nav *::before',
									'property'      => 'background-color',
								),
								array(
									'selector'		=> '.slideshow-content .owl-nav *::after',
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
									'selector'		=> '.slideshow-content .owl-nav *:hover',
									'property'      => 'background-color',
								),
								array(
									'selector'		=> '.slideshow-content .owl-nav *:hover',
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
									'selector'		=> '.slideshow-content .owl-nav *:hover',
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
									'selector'		=> '.slideshow-content .owl-nav *:hover::before',
									'property'      => 'background-color',
								),
								array(
									'selector'		=> '.slideshow-content .owl-nav *:hover::after',
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
									'selector'		=> '.slideshow-content .owl-nav *',
									'property'      => 'width',
									'unit'      => 'px',
								),
								array(
									'selector'		=> '.slideshow-content .owl-nav *',
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
									'selector'		=> '.slideshow-content .owl-nav *',
									'property'      => 'border-radius',
									'unit'      => 'px',
								),
								array(
									'selector'		=> '.slideshow-content .owl-nav *',
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
									'selector'		=> '.slideshow-content .owl-nav .owl-prev',
									'property'      => 'margin-right',
									'unit'      => 'px',
								),
								array(
									'selector'		=> '.slideshow-content .owl-nav .owl-next',
									'property'      => 'margin-right',
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
									'selector'		=> '.slideshow-content .owl-nav *::before',
									'property'      => 'width',
									'unit'      => 'px',
								),
								array(
									'selector'		=> '.slideshow-content .owl-nav *::after',
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
									'selector'		=> '.slideshow-content .owl-nav *',
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
									'selector'		=> '.slideshow-content .owl-nav *::before',
									'property'      => 'border-radius',
									'unit'      => 'px',
								),
								array(
									'selector'		=> '.slideshow-content .owl-nav *::after',
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
									'selector'		=> '.slideshow-content .owl-nav',
									'property'      => 'margin-top',
									'unit'      => 'px',
								),
							),
						),
					),
				)
			),
		)
	),
	'padding_setting'        => array(
		'title'         => __('Padding', 'fl-builder'),
		'sections'      => array(
			'padding'       => array(
				'title'         => '',
				'fields'        => array(       
					'padding_top'       => array(
						'type'          => 'unit',
						'label'         => 'Top',
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
								'default'    => ( isset( $global_settings->padding_top ) ) ? $global_settings->padding_top : '0',
								'medium'     => ( isset( $global_settings->padding_top_medium ) ) ? $global_settings->padding_top_medium : '',
								'responsive' => ( isset( $global_settings->padding_top_responsive ) ) ? $global_settings->padding_top_responsive : '',
							)
						),
					),    
					'padding_bottom'       => array(
						'type'          => 'unit',
						'label'         => 'Bottom',
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
								'default'    => ( isset( $global_settings->padding_bottom ) ) ? $global_settings->padding_bottom : '0',
								'medium'     => ( isset( $global_settings->padding_bottom_medium ) ) ? $global_settings->padding_bottom_medium : '',
								'responsive' => ( isset( $global_settings->padding_bottom_responsive ) ) ? $global_settings->padding_bottom_responsive : '',
							)
						),
					),    
					'padding_left'       => array(
						'type'          => 'unit',
						'label'         => 'Left',
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
								'default'    => ( isset( $global_settings->padding_left ) ) ? $global_settings->padding_left : '0',
								'medium'     => ( isset( $global_settings->padding_left_medium ) ) ? $global_settings->padding_left_medium : '',
								'responsive' => ( isset( $global_settings->padding_left_responsive ) ) ? $global_settings->padding_left_responsive : '',
							)
						),
					),    
					'padding_right'       => array(
						'type'          => 'unit',
						'label'         => 'Right',
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
								'default'    => ( isset( $global_settings->padding_right ) ) ? $global_settings->padding_right : '0',
								'medium'     => ( isset( $global_settings->padding_right_medium ) ) ? $global_settings->padding_right_medium : '',
								'responsive' => ( isset( $global_settings->padding_right_responsive ) ) ? $global_settings->padding_right_responsive : '',
							)
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
FLBuilder::register_settings_form('slideshow_content_form', array(
	'title' => __('Slide Content', 'fl-builder'),
	'tabs'  => array(
		'slide'      => array(
			'title'         => __('Content Info', 'fl-builder'),
			'sections'      => array(
				'info'       => array(
					'title'         => __('', 'fl-builder'),
					'fields'        => array(
						'title_tag'        => array(
							'type'          => 'select',
							'label'         => __('Title Tag', 'fl-builder'),
							'default'       => 'h2',
							'options'       => array(
								'h1'      => __('H1', 'fl-builder'),
								'h2'      => __('H2', 'fl-builder'),
								'h3'      => __('H3', 'fl-builder'),
								'h4'      => __('H4', 'fl-builder'),
								'h5'      => __('H5', 'fl-builder'),
								'h6'      => __('H6', 'fl-builder'),
							),
						),
						'title'       => array(
							'type'          => 'text',
							'label'         => 'Title',
							'default'   => __('', 'fl-builder'),
							'placeholder'   => __('Heading', 'fl-builder'),
						),
						'text'       => array(
							'type'          => 'editor',
							'label'         => '',
							'rows'          => 13,
							'wpautop'		=> false,
						),
						'btn_1_label'       => array(
							'type'          => 'text',
							'label'         => 'Button 1 label',
							'default'   => __('GET STARTED', 'fl-builder'),
						),
						'btn_1_link'       => array(
							'type'          => 'link',
							'label'         => 'Button 1 Link',
						),
						'btn_2_label'       => array(
							'type'          => 'text',
							'label'         => 'Button 2 label',
							'default'   => __('MORE INFO', 'fl-builder'),
						),
						'btn_2_link'       => array(
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
						'title_size'       => array(
							'type'          => 'unit',
							'label'         => 'Title Size',
							'placeholder'   => '65',
							'description'   => 'px',
							'responsive'  => array(
								'placeholder' => array(
									'default'    => ( isset( $global_settings->title_size ) ) ? $global_settings->title_size : '65',
									'medium'     => ( isset( $global_settings->title_size_medium ) ) ? $global_settings->title_size_medium : '',
									'responsive' => ( isset( $global_settings->title_size_responsive ) ) ? $global_settings->title_size_responsive : '',
								)
							),
						),
						'text_size'       => array(
							'type'          => 'unit',
							'label'         => 'Text Size',
							'placeholder'   => '20',
							'description'   => 'px',
							'responsive'  => array(
								'placeholder' => array(
									'default'    => ( isset( $global_settings->text_size ) ) ? $global_settings->text_size : '20',
									'medium'     => ( isset( $global_settings->text_size_medium ) ) ? $global_settings->text_size_medium : '',
									'responsive' => ( isset( $global_settings->text_size_responsive ) ) ? $global_settings->text_size_responsive : '',
								)
							),
						),
						'btn_label_size'       => array(
							'type'          => 'unit',
							'label'         => 'Button Size',
							'placeholder'   => '16',
							'description'   => 'px',
							'responsive'  => array(
								'placeholder' => array(
									'default'    => ( isset( $global_settings->btn_label_size ) ) ? $global_settings->btn_label_size : '16',
									'medium'     => ( isset( $global_settings->btn_label_size_medium ) ) ? $global_settings->btn_label_size_medium : '',
									'responsive' => ( isset( $global_settings->btn_label_size_responsive ) ) ? $global_settings->btn_label_size_responsive : '',
								)
							),
						),
					)
				),
				'font_color'       => array(
					'title'         => __('Font Color', 'fl-builder'),
					'fields'        => array(
						'title_color'       => array(
							'type'          => 'color',
							'label'         => 'Title Color',
							'show_reset'    => true,
						),
						'text_color'       => array(
							'type'          => 'color',
							'label'         => 'Text Color',
							'show_reset'    => true,
						),
						'btn_label_color'       => array(
							'type'          => 'color',
							'label'         => 'Button Color',
							'show_reset'    => true,
						),
					)
				),
				'max_width'       => array(
					'title'         => __('Max Width', 'fl-builder'),
					'fields'        => array(
						'title_max_width'       => array(
							'type'          => 'unit',
							'label'         => 'Title Max Width',
							'placeholder'   => '30',
							'description'   => '%',
							'responsive'  => array(
								'placeholder' => array(
									'default'    => ( isset( $global_settings->title_max_width ) ) ? $global_settings->title_max_width : '30',
									'medium'     => ( isset( $global_settings->title_max_width_medium ) ) ? $global_settings->title_max_width_medium : '',
									'responsive' => ( isset( $global_settings->title_max_width_responsive ) ) ? $global_settings->title_max_width_responsive : '',
								)
							),
						),
						'text_max_width'       => array(
							'type'          => 'unit',
							'label'         => 'Text Max Width',
							'placeholder'   => '30',
							'description'   => '%',
							'responsive'  => array(
								'placeholder' => array(
									'default'    => ( isset( $global_settings->text_max_width ) ) ? $global_settings->text_max_width : '30',
									'medium'     => ( isset( $global_settings->text_max_width_medium ) ) ? $global_settings->text_max_width_medium : '',
									'responsive' => ( isset( $global_settings->text_max_width_responsive ) ) ? $global_settings->text_max_width_responsive : '',
								)
							),
						),
					)
				),
			)
		),
	)
));