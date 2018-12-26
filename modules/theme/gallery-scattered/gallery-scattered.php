<?php
/**
 * @class galleryScatteredModule
 */
class galleryScatteredModule extends FLBuilderModule {

	/** 
	 * @method __construct
	 */  
	public function __construct()
	{
		global $foldercategory;
		parent::__construct(array(
			'name'          	=> __('Gallery - Scattered', 'fl-builder'),
			'description'   	=> __('Display Scattered Palaroids Gallery.', 'fl-builder'),
			'category'      	=> __($foldercategory, 'fl-builder'),
			'partial_refresh'	=> true
		));
		// Register and enqueue your own.
		$this->add_css( 'photostack',  $this->url . 'css/photostack.css' );
		$this->add_js( 'modernizr', $this->url . 'js/modernizr.min.js', array(), '', true );
		$this->add_js( 'classie', $this->url . 'js/classie.js', array(), '', true );
		$this->add_js( 'photostack', $this->url . 'js/photostack.js', array(), '', true );
	}
	
	/**
	 * @method get_classname
	 */
	public function get_classname()
	{
		$classname = 'gallery-scattered ' . $this->settings->color;
		return $classname;
	}
}

/*Testimonial Avatar Size*/
add_image_size( 'gallery-scattered', 240 , 240, true );

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('galleryScatteredModule', array(
	'slides'         => array(
		'title'         => __('General', 'fl-builder'),
		'sections'      => array(
			'general'       => array(
				'title'         => '',
				'fields'        => array(
					'title'         => array(
						'type'          => 'text',
						'label'         => __('Title', 'fl-builder'),
						'default'       => __('Gallery - Scattered Polaroids', 'fl-builder'),
					),
					'sub_title'         => array(
						'type'          => 'text',
						'label'         => __('Sub Title', 'fl-builder'),
						'default'       => __('A flat-style take on a Polaroid gallery', 'fl-builder'),
					),
					'gallery'         => array(
						'type'          => 'multiple-photos',
						'label'         => __('Gallery', 'fl-builder'),
					),
					'gallery_btn_text'         => array(
						'type'          => 'text',
						'label'         => __('BUTTON TEXT', 'fl-builder'),
						'default'       => __('VIEW GALLERY', 'fl-builder'),
					),
					'gallery_setting'        => array(
						'type'          => 'select',
						'label'         => __('Gallery Setting', 'fl-builder'),
						'default'       => '',
						'options'       => array(
							''    => __('Default', 'fl-builder'),
							'photostack-start'    => __('Click to Start', 'fl-builder'),
						)
					),    
					'bg_color'        => array(
						'type'          => 'color',
						'label'         => __('Gallery Background', 'fl-builder'),
						'default'       => '',
						'show_reset'    => true
					),  
					'bg_color_opacity'        => array(
						'type'          => 'text',
						'label'         => __('Gallery Background Opacity', 'fl-builder'),
						'default'       => '100',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => '%'
					),     
					'botton_color'        => array(
						'type'          => 'color',
						'label'         => __('Gallery Botton Color', 'fl-builder'),
						'default'       => '',
						'show_reset'    => true
					),    
					'botton_color_text'        => array(
						'type'          => 'color',
						'label'         => __('Gallery Botton Color Text', 'fl-builder'),
						'default'       => '',
						'show_reset'    => true
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
					'color'        => array(
						'type'          => 'select',
						'label'         => __('Color', 'fl-builder'),
						'default'       => 'dark',
						'options'       => array(
							'dark'    => __('Dark', 'fl-builder'),
							'light'      => __('Light', 'fl-builder'),
						)
					),                          
				)
			),
			'padding'       => array(
				'title'         => 'Padding',
				'fields'        => array(       
					'padding_top'       => array(
						'type'          => 'text',
						'label'         => 'Top',
						'placeholder'         => '0',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px',
					),    
					'padding_bottom'       => array(
						'type'          => 'text',
						'label'         => 'Bottom',
						'placeholder'         => '0',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px',
					),    
					'padding_left'       => array(
						'type'          => 'text',
						'label'         => 'Left',
						'placeholder'         => '0',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px',
					),    
					'padding_right'       => array(
						'type'          => 'text',
						'label'         => 'Right',
						'placeholder'         => '0',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px',
					),
				)
			)
		)
	)
));