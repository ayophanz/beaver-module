<?php
/**
 * @class testimonialsModule
 */
class testimonialsModule extends FLBuilderModule {

	/** 
	 * @method __construct
	 */  
	public function __construct()
	{
		global $foldercategory;
		parent::__construct(array(
			'name'          	=> __('Testimonials', 'fl-builder'),
			'description'   	=> __('Display Testominials from Posttype.', 'fl-builder'),
			'category'      	=> __($foldercategory, 'fl-builder'),
			'partial_refresh'	=> true
		));
		// Register and enqueue your own.
	}
	
	/**
	 * @method get_classname
	 */
	public function get_classname()
	{
		$classname = 'testimonials'.$this->settings->style;
		return $classname;
	}
	
	public function enqueue_scripts()
	{
		if ( $this->settings->style == " center-sync" ) {
			$this->add_css( 'flickity', $this->url . 'css/flickity.css' );
			$this->add_js( 'flickity', $this->url . 'js/flickity.pkgd.min.js', array(), '', true );
		} else {
			$this->add_css( 'owl-carousel', FL_MODULE_THEME_URL . 'assets/owlcarousel/owl.carousel.css' );
			$this->add_css( 'owl-carousel-theme', FL_MODULE_THEME_URL . 'assets/owlcarousel/owl.theme.default.min.css' );
			$this->add_js( 'owl-carousel', FL_MODULE_THEME_URL . 'assets/owlcarousel/owl.carousel.min.js', array(), '', true );
		}
	}
}

/*Testimonial Avatar Size*/
add_image_size( 'testimonial-avatar', 80 , 80, true );
add_image_size( 'testimonial-avatar-nav', 134 , 134, true );

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('testimonialsModule', array(
	'slides'         => array(
		'title'         => __('General', 'fl-builder'),
		'sections'      => array(
			'general'       => array(
				'title'         => '',
				'fields'        => array(
					'posttype'         => array(
						'type'          => 'post-type',
						'label'         => __('Source', 'fl-builder'),
						'default'       => 'testimonial'
					),
					'totalpost'         => array(
						'type'          => 'unit',
						'label'         => __('Number of Testimonial display', 'fl-builder'),
						'default'       => '9',
						'placeholder'       => __('9', 'fl-builder'),
						'maxlength'     => '2',
					),
					'items'         => array(
						'type'          => 'unit',
						'label'         => __('Number of Column', 'fl-builder'),
						'default'       => '3',
						'maxlength'     => '6',
					),
					'items_medium'         => array(
						'type'          => 'unit',
						'label'         => __('Tablet Number of Column', 'fl-builder'),
						'default'       => '1',
						'maxlength'     => '6',
					),
					'items_responsive'         => array(
						'type'          => 'unit',
						'label'         => __('Mobile Number of Column', 'fl-builder'),
						'default'       => '1',
						'maxlength'     => '6',
					),
					'margin'         => array(
						'type'          => 'unit',
						'label'         => __('Column Margin', 'fl-builder'),
						'default'       => __('10', 'fl-builder'),
						'placeholder'       => __('10', 'fl-builder'),
						'maxlength'     => '3',
					),
					'autoplay'        => array(
						'type'          => 'select',
						'label'         => __('Autoplay', 'fl-builder'),
						'default'       => 'true',
						'options'       => array(
							'true'   	=> __('Yes', 'fl-builder'),
							'false'     => __('No', 'fl-builder'),
						)
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
			)
		)
	),
	'style'        => array(
		'title'         => __('Style', 'fl-builder'),
		'sections'      => array(
			'general'       => array(
				'title'         => '',
				'fields'        => array(             
					'style'        => array(
						'type'          => 'select',
						'label'         => __('Style', 'fl-builder'),
						'default'       => 'bordered',
						'options'       => array(
							' bordered'  => __('Bordered', 'fl-builder'),
							' form-box'   => __('Form Box', 'fl-builder'),
							' center-sync'   => __('Center Sync', 'fl-builder'),
							''      => __('None', 'fl-builder'),
						),
						'toggle'        => array(
							''      => array(
								'fields'        => array( 'avatar_position' ),
							),
							' form-box'      => array(
								'fields'        => array( 'avatar_position' ),
							),
						)
					),   
					'avatar_position'        => array(
						'type'          => 'select',
						'label'         => __('Style', 'fl-builder'),
						'default'       => '',
						'options'       => array(
							'bottom'    => __('bottom', 'fl-builder'),
							'top'  		=> __('Top', 'fl-builder'),
						),
					),    
					'color'        => array(
						'type'          => 'color',
						'label'         => __('Color', 'fl-builder'),
						'default'       => '',
						'show_reset'       => 'true',
						'preview'		=> array(
							'type'		=> 'css',
							'selector'		=> '.testimonials *',
							'property'      => 'color',
						),
					),  
					'testimonial_margin_bottom'        => array(
						'type'          => 'unit',
						'label'         => __('Margin Bottom', 'fl-builder'),
						'default'       => '',
						'description'       => 'px',
						'preview'		=> array(
							'type'		=> 'css',
							'selector'		=> '.testimonial-post',
							'property'      => 'margin-bottom',
							'unit'      => 'px',
						),
					),   
				)
			),
			'message'       => array(
				'title'         => 'Message',
				'fields'        => array(             
					'message_color'        => array(
						'type'          => 'color',
						'label'         => __('Message Color', 'fl-builder'),
						'default'       => '',
						'show_reset'       => 'true',
						'preview'		=> array(
							'type'		=> 'css',
							'selector'		=> '.testimonials .message',
							'property'      => 'color',
						),
					),
					'message_font_size'        => array(
						'type'          => 'unit',
						'label'         => __('Message Font Size', 'fl-builder'),
						'default'       => '',
						'preview'		=> array(
							'type'		=> 'css',
							'selector'		=> '.testimonials .message',
							'property'      => 'font-size',
							'unit'      => 'px',
						),
					),
					'message_line_height'        => array(
						'type'          => 'unit',
						'label'         => __('Message Line Height', 'fl-builder'),
						'default'       => '',
						'placeholder'       => '1.2',
						'description'       => 'em',
						'preview'		=> array(
							'type'		=> 'css',
							'selector'		=> '.testimonials .message',
							'property'      => 'line-height',
							'unit'      => 'em',
						),
					),
					'message_font_style'        => array(
						'type'          => 'select',
						'label'         => __('Show Message Font Style', 'fl-builder'),
						'default'       => 'true',
						'options'       => array(
							''   	=> __('Default', 'fl-builder'),
							' italic'   	=> __('Italic', 'fl-builder'),
						),
						'preview'		=> array(
							'type'		=> 'css',
							'selector'		=> '.testimonials .message',
							'property'      => 'font-style',
						),
					), 
					'message_max_width'        => array(
						'type'          => 'unit',
						'label'         => __('Message Max Width', 'fl-builder'),
						'default'       => '',
						'placeholder'       => '715',
						'description'       => 'px',
						'preview'		=> array(
							'type'		=> 'css',
							'selector'		=> '.testimonials .message',
							'property'      => 'max-width',
							'unit'      => 'px',
						),
					),
					'message_quote'        => array(
						'type'          => 'select',
						'label'         => __('Show Message Quote', 'fl-builder'),
						'default'       => 'true',
						'options'       => array(
							''   	=> __('Yes', 'fl-builder'),
							' no-quote'     => __('No', 'fl-builder'),
						)
					),   
				)
			),
			'author'       => array(
				'title'         => 'Author',
				'fields'        => array(             
					'author_color'        => array(
						'type'          => 'color',
						'label'         => __('Author Color', 'fl-builder'),
						'default'       => '',
						'show_reset'       => 'true',
						'preview'		=> array(
							'type'		=> 'css',
							'selector'		=> '.testimonials .author',
							'property'      => 'color',
						),
					),
					'author_font_size'        => array(
						'type'          => 'unit',
						'label'         => __('Author Font Size', 'fl-builder'),
						'default'       => '',
						'preview'		=> array(
							'type'		=> 'css',
							'selector'		=> '.testimonials .author',
							'property'      => 'font-size',
							'unit'      => 'px',
						),
					),
					'author_margin_bottom'        => array(
						'type'          => 'unit',
						'label'         => __('Author Spacing', 'fl-builder'),
						'default'       => '',
						'preview'		=> array(
							'type'		=> 'css',
							'selector'		=> '.testimonials .author',
							'property'      => 'margin-bottom',
							'unit'      => 'px',
						),
					),
					'author_font_weight'         => array(
						'type'          => 'select',
						'label'         => __('Author Font Weight', 'fl-builder'),
						'default' 		=> '',
						'options'       => array(
							''    	=> __('Default', 'fl-builder'),
							'100'    	=> __('100 Thin', 'fl-builder'),
							'200'    	=> __('200 Extra-Light', 'fl-builder'),
							'300'    	=> __('300 Light', 'fl-builder'),
							'400'    	=> __('400 Regular', 'fl-builder'),
							'500'    	=> __('500 Medium', 'fl-builder'),
							'600'    	=> __('600 Semi-Bold', 'fl-builder'),
							'700'    	=> __('700 Bold', 'fl-builder'),
							'800'    	=> __('800 Extra-Bold', 'fl-builder'),
							'900'    	=> __('900 Ultra-Bold', 'fl-builder'),
						),
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.testimonials .author',
							'property'      => 'font-weight',
						),
						'help'   		=> 'Its depend to the font family if the following font-weight supported.',
					),
					'author_font_style'        => array(
						'type'          => 'select',
						'label'         => __('Show Message Font Style', 'fl-builder'),
						'default'       => 'true',
						'options'       => array(
							''   	=> __('Default', 'fl-builder'),
							'italic'   	=> __('Italic', 'fl-builder'),
						),
						'preview'		=> array(
							'type'		=> 'css',
							'selector'		=> '.testimonials .author',
							'property'      => 'font-style',
						),
					), 
				)
			),
			'company'       => array(
				'title'         => 'Company',
				'fields'        => array(  
					'company_show'        => array(
						'type'          => 'select',
						'label'         => __('Show Company', 'fl-builder'),
						'default'       => 'true',
						'options'       => array(
							'true'   	=> __('Yes', 'fl-builder'),
							'false'     => __('No', 'fl-builder'),
						)
					),           
					'company_color'        => array(
						'type'          => 'color',
						'label'         => __('Company Color', 'fl-builder'),
						'default'       => '',
						'show_reset'       => 'true',
						'preview'		=> array(
							'type'		=> 'css',
							'selector'		=> '.testimonials .company',
							'property'      => 'color',
						),
					),
					'company_font_size'        => array(
						'type'          => 'unit',
						'label'         => __('Company Font Size', 'fl-builder'),
						'default'       => '',
						'preview'		=> array(
							'type'		=> 'css',
							'selector'		=> '.testimonials .company',
							'property'      => 'font-size',
							'unit'      => 'px',
						),
					),
				)
			),
			'date'       => array(
				'title'         => 'Date',
				'fields'        => array(    
					'date_show'        => array(
						'type'          => 'select',
						'label'         => __('Date Company', 'fl-builder'),
						'default'       => 'false',
						'options'       => array(
							'true'   	=> __('Yes', 'fl-builder'),
							'false'     => __('No', 'fl-builder'),
						)
					),             
					'date_color'        => array(
						'type'          => 'color',
						'label'         => __('Date Color', 'fl-builder'),
						'default'       => '',
						'show_reset'       => 'true',
						'preview'		=> array(
							'type'		=> 'css',
							'selector'		=> '.testimonials .date',
							'property'      => 'color',
						),
					),
					'date_font_size'        => array(
						'type'          => 'unit',
						'label'         => __('Date Font Size', 'fl-builder'),
						'default'       => '',
						'preview'		=> array(
							'type'		=> 'css',
							'selector'		=> '.testimonials .date',
							'property'      => 'font-size',
							'unit'      => 'px',
						),
					),
				)
			),
			'rating'       => array(
				'title'         => 'Rating',
				'fields'        => array(      
					'rating_show'        => array(
						'type'          => 'select',
						'label'         => __('Rating Company', 'fl-builder'),
						'default'       => 'false',
						'options'       => array(
							'true'   	=> __('Yes', 'fl-builder'),
							'false'     => __('No', 'fl-builder'),
						)
					),           
					'rating_color'        => array(
						'type'          => 'color',
						'label'         => __('Rating Color', 'fl-builder'),
						'default'       => '',
						'show_reset'       => 'true',
						'preview'		=> array(
							'type'		=> 'css',
							'selector'		=> '.testimonials .rating',
							'property'      => 'color',
						),
					),
					'rating_font_size'        => array(
						'type'          => 'unit',
						'label'         => __('Rating Font Size', 'fl-builder'),
						'default'       => '',
						'preview'		=> array(
							'type'		=> 'css',
							'selector'		=> '.testimonials .rating',
							'property'      => 'font-size',
							'unit'      => 'px',
						),
					),
				)
			),
			'padding'       => array(
				'title'         => 'Padding',
				'fields'        => array(       
					'padding_top'       => array(
						'type'          => 'unit',
						'label'         => 'Top',
						'placeholder'         => '0',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px',
						'preview'		=> array(
							'type'		=> 'css',
							'selector'		=> '.testimonial-post',
							'property'      => 'padding-top',
							'unit'      => 'px',
						),
					),    
					'padding_bottom'       => array(
						'type'          => 'unit',
						'label'         => 'Bottom',
						'placeholder'         => '0',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px',
						'preview'		=> array(
							'type'		=> 'css',
							'selector'		=> '.testimonial-post',
							'property'      => 'padding-bottom',
							'unit'      => 'px',
						),
					),    
					'padding_left'       => array(
						'type'          => 'unit',
						'label'         => 'Left',
						'placeholder'         => '0',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px',
						'preview'		=> array(
							'type'		=> 'css',
							'selector'		=> '.testimonial-post',
							'property'      => 'padding-left',
							'unit'      => 'px',
						),
					),    
					'padding_right'       => array(
						'type'          => 'unit',
						'label'         => 'Right',
						'placeholder'         => '0',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px',
						'preview'		=> array(
							'type'		=> 'css',
							'selector'		=> '.testimonial-post',
							'property'      => 'padding-right',
							'unit'      => 'px',
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
							'rules'           => array(
								array(
									'selector'		=> '.testimonials .owl-dots .owl-dot',
									'property'      => 'background-color',
								),
								array(
									'selector'		=> '.testimonials .flickity-page-dots .dot',
									'property'      => 'background-color',
								), 
							),
						),
					),   
					'dots_active_color'        => array(
						'type'          => 'color',
						'label'         => __('Dots Active Color', 'fl-builder'),
						'default'       => '',
						'show_reset'       => 'true',
						'preview'		=> array(
							'type'		=> 'css',
							'rules'           => array(
								array(
									'selector'		=> '.testimonials .owl-dots .owl-dot.active',
									'property'      => 'background-color',
								),
								array(
									'selector'		=> '.testimonials .flickity-page-dots .dot.is-selected',
									'property'      => 'background-color',
								), 
							),
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
									'selector'		=> '.testimonials .owl-dots .owl-dot',
									'property'      => 'width',
									'unit'      => 'px',
								),
								array(
									'selector'		=> '.testimonials .owl-dots .owl-dot',
									'property'      => 'height',
									'unit'      => 'px',
								), 
								array(
									'selector'		=> '.testimonials .flickity-page-dots .dot',
									'property'      => 'width',
									'unit'      => 'px',
								),
								array(
									'selector'		=> '.testimonials .flickity-page-dots .dot',
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
									'selector'		=> '.testimonials .owl-dots .owl-dot',
									'property'      => 'margin-left',
									'unit'      => 'px',
								),
								array(
									'selector'		=> '.testimonials .owl-dots .owl-dot',
									'property'      => 'margin-right',
									'unit'      => 'px',
								), 
								array(
									'selector'		=> '.testimonials .flickity-page-dots .dot',
									'property'      => 'margin-left',
									'unit'      => 'px',
								),
								array(
									'selector'		=> '.testimonials .flickity-page-dots .dot',
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
									'selector'		=> '.testimonials .owl-dots',
									'property'      => 'margin-top',
									'unit'      => 'px',
								),
								array(
									'selector'		=> '.testimonials .flickity-page-dots .dot',
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
									'selector'		=> '.testimonials .owl-nav *',
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
									'selector'		=> '.testimonials .owl-nav *',
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
									'selector'		=> '.testimonials .owl-nav *::before',
									'property'      => 'background-color',
								),
								array(
									'selector'		=> '.testimonials .owl-nav *::after',
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
									'selector'		=> '.testimonials .owl-nav *:hover',
									'property'      => 'background-color',
								),
								array(
									'selector'		=> '.testimonials .owl-nav *:hover',
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
									'selector'		=> '.testimonials .owl-nav *:hover',
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
									'selector'		=> '.testimonials .owl-nav *:hover::before',
									'property'      => 'background-color',
								),
								array(
									'selector'		=> '.testimonials .owl-nav *:hover::after',
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
									'selector'		=> '.testimonials .owl-nav *',
									'property'      => 'width',
									'unit'      => 'px',
								),
								array(
									'selector'		=> '.testimonials .owl-nav *',
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
									'selector'		=> '.testimonials .owl-nav *',
									'property'      => 'border-radius',
									'unit'      => 'px',
								),
								array(
									'selector'		=> '.testimonials .owl-nav *',
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
									'selector'		=> '.testimonials .owl-nav .owl-prev',
									'property'      => 'left',
									'unit'      => 'px',
								),
								array(
									'selector'		=> '.testimonials .owl-nav .owl-next',
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
									'selector'		=> '.testimonials .owl-nav *::before',
									'property'      => 'width',
									'unit'      => 'px',
								),
								array(
									'selector'		=> '.testimonials .owl-nav *::after',
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
									'selector'		=> '.testimonials .owl-nav *',
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
									'selector'		=> '.testimonials .owl-nav *::before',
									'property'      => 'border-radius',
									'unit'      => 'px',
								),
								array(
									'selector'		=> '.testimonials .owl-nav *::after',
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
									'selector'		=> '.testimonials .owl-nav',
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