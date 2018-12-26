<?php

/**
 * @class carouselModule
 */
class carouselModule extends FLBuilderModule {

	/** 
	 * @method __construct
	 */  
	public function __construct()
	{
		global $foldercategory;
		parent::__construct(array(
			'name'          	=> __('Carousel', 'fl-builder'),
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
		$classname = 'carousel';
		return $classname;
	}
}

/*Module Image Size*/
add_image_size( 'carousel-thumb', 370 , 270, true );

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('carouselModule', array(
	'slides'         => array(
		'title'         => __('Slides', 'fl-builder'),
		'sections'      => array(
			'general'       => array(
				'title'         => '',
				'fields'        => array(
					'items'         => array(
						'type'          => 'form',
						'label'         => __('Slide', 'fl-builder'),
						'form'          => 'carousel_form', // ID from registered form below
						'preview_text'  => 'carousel_title', // Name of a field to use for the preview text
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
					'spacing'        => array(
						'type'          => 'unit',
						'label'         => __('Spacing', 'fl-builder'),
						'description'   => 'px',
						'placeholder'   => '10',
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
					'loop'        => array(
						'type'          => 'select',
						'label'         => __('Loop', 'fl-builder'),
						'default'       => 'true',
						'options'       => array(
							'true'    => __('Yes', 'fl-builder'),
							'false'      => __('No', 'fl-builder'),
						),
					),
					'autoplay_delay'        => array(
						'type'          => 'unit',
						'label'         => __('Autoplay Delay', 'fl-builder'),
						'placeholder'       => '3000',
						'description'       => 'Millisecond',
					),
					'autoplay_speed'        => array(
						'type'          => 'unit',
						'label'         => __('Autoplay Speed', 'fl-builder'),
						'placeholder'       => '300',
						'description'       => 'Millisecond',
					),
					'item_style'        => array(
						'type'          => 'select',
						'label'         => __('Item Style', 'fl-builder'),
						'default'       => '',
						'options'       => array(
							''      => __('Default', 'fl-builder'),
							'shadow'    => __('Shadow', 'fl-builder'),
						),
					),
					'item_margin_top'        => array(
						'type'          => 'unit',
						'label'         => __('Item Margin Top', 'fl-builder'),
						'default'       => '',
						'description'   => 'px',
						'placeholder'   => '30',
					),
					'item_margin_bottom'        => array(
						'type'          => 'unit',
						'label'         => __('Item Margin Bottom', 'fl-builder'),
						'default'       => '',
						'description'   => 'px',
						'placeholder'   => '30',
					),     
					'title_bg_color'        => array(
						'type'          => 'color',
						'label'         => __('Title Background Color', 'fl-builder'),
						'default'       => '',
						'show_reset'    => true,
					),    
					'title_color'        => array(
						'type'          => 'color',
						'label'         => __('Title Color', 'fl-builder'),
						'default'       => '',
						'show_reset'    => true,
					),     
				)
			),
			'dots'       => array(
				'title'         => 'Dots',
				'fields'        => array(   
					'dots'        => array(
						'type'          => 'select',
						'label'         => __('Dots Enable', 'fl-builder'),
						'default'       => 'true',
						'options'       => array(
							'true'    => __('Yes', 'fl-builder'),
							'false'      => __('No', 'fl-builder'),
						),
					),          
					'dots_color'        => array(
						'type'          => 'color',
						'label'         => __('Dots Color', 'fl-builder'),
						'default'       => '',
						'show_reset'    => true,
						'preview'		=> array(
							'type'		=> 'css',
							'selector'		=> '.carousel .owl-dots .owl-dot',
							'property'      => 'background-color',
						),
					),        
					'dots_color_active'        => array(
						'type'          => 'color',
						'label'         => __('Dots Color Active', 'fl-builder'),
						'default'       => '',
						'show_reset'    => true,
						'preview'		=> array(
							'type'		=> 'css',
							'selector'		=> '.carousel .owl-dots .owl-dot.active',
							'property'      => 'background-color',
						),
					),
					'dots_size'        => array(
						'type'          => 'unit',
						'label'         => __('Dots Size', 'fl-builder'),
						'default'       => '',
						'description'   => 'px',
						'preview'		=> array(
							'type'		=> 'css',
							'rules'           => array(
								array(
									'selector'		=> '.carousel .owl-dots .owl-dot',
									'property'      => 'width',
									'unit'      => 'px',
								),
								array(
									'selector'		=> '.carousel .owl-dots .owl-dot',
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
						'description'   => 'px',
						'preview'		=> array(
							'type'		=> 'css',
							'rules'           => array(
								array(
									'selector'		=> '.carousel .owl-dots .owl-dot',
									'property'      => 'margin-left',
									'unit'      => 'px',
								),
								array(
									'selector'		=> '.carousel .owl-dots .owl-dot',
									'property'      => 'margin-right',
									'unit'      => 'px',
								), 
							),
						),
					),
				)
			),
			'navs'       => array(
				'title'         => 'Navs',
				'fields'        => array(
					'nav'        => array(
						'type'          => 'select',
						'label'         => __('Nav Enable', 'fl-builder'),
						'default'       => 'true',
						'options'       => array(
							'true'    => __('Yes', 'fl-builder'),
							'false'      => __('No', 'fl-builder'),
						),
					),
					'nav_color'        => array(
						'type'          => 'color',
						'label'         => __('Nav Color', 'fl-builder'),
						'default'       => '',
						'show_reset'    => true,
						'preview'		=> array(
							'type'		=> 'css',
							'selector'		=> '.carousel .owl-nav *',
							'property'      => 'border-color',
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
									'selector'		=> '.carousel .owl-nav *',
									'property'      => 'width',
									'unit'      => 'px',
								),
								array(
									'selector'		=> '.carousel .owl-nav *',
									'property'      => 'height',
									'unit'      => 'px',
								), 
							),
						),
					),
					'nav_thick'        => array(
						'type'          => 'unit',
						'label'         => __('Nav Thickness', 'fl-builder'),
						'default'       => '',
						'description'   => 'px',
						'preview'		=> array(
							'type'		=> 'css',
							'rules'           => array(
								array(
									'selector'		=> '.carousel .owl-nav .owl-prev',
									'property'      => 'border-left-width',
									'unit'      => 'px',
								),
								array(
									'selector'		=> '.carousel .owl-nav .owl-prev',
									'property'      => 'border-bottom-width',
									'unit'      => 'px',
								),
								array(
									'selector'		=> '.carousel .owl-nav .owl-next',
									'property'      => 'border-right-width',
									'unit'      => 'px',
								),
								array(
									'selector'		=> '.carousel .owl-nav .owl-next',
									'property'      => 'border-top-width',
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
									'selector'		=> '.carousel .owl-nav .owl-prev',
									'property'      => 'left',
									'unit'      => 'px',
								),
								array(
									'selector'		=> '.carousel .owl-nav .owl-next',
									'property'      => 'right',
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
FLBuilder::register_settings_form('carousel_form', array(
	'title' => __('Slide', 'fl-builder'),
	'tabs'  => array(
		'slide'      => array(
			'title'         => __('Slide Info', 'fl-builder'),
			'sections'      => array(
				'info'       => array(
					'title'         => __('', 'fl-builder'),
					'fields'        => array(
						'carousel_image'       => array(
							'type'          => 'photo',
							'label'         => 'Image',
						),
						'carousel_title'       => array(
							'type'          => 'text',
							'label'         => 'Title',
							'default'   => __('', 'fl-builder'),
						),
						'carousel_linkto'       => array(
							'type'          => 'text',
							'label'         => 'Link',
							'default'   => __('', 'fl-builder'),
						),
						'carousel_newtab'       => array(
							'type'          => 'select',
							'label'         => 'Target tab',
							'default'       => '',
							'options'       => array(
								'new_tab'    		=> __('New tab', 'fl-builder'),
								'same_tab'    		=> __('Same tab', 'fl-builder'),
							),
						),
					)
				),
			)
		),
	)
));