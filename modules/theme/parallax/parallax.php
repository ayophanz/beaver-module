<?php
/**
 * @class Parallax
 */
class Parallax extends FLBuilderModule {
	/** 
	 * @method __construct
	 */  
	public function __construct()
	{
		global $foldercategory;
		parent::__construct(array(
			'name'          	=> __('Parallax', 'fl-builder'),
			'description'      	=> __('Parallax BG', 'fl-builder'),
			'category'      	=> __($foldercategory, 'fl-builder'),
			'partial_refresh'	=> true
		));
		$this->add_js( 'skrollr', $this->url . 'js/skrollr.min.js', array(), '', true );
	}
	/**
	 * @method get_classname
	 */
	public function get_classname()
	{
		$classname = 'parallax';
		return $classname;
	}
}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('Parallax', array(
	'general'         => array(
		'title'         => __('General', 'fl-builder'),
		'sections'      => array(
			'general'       => array(
				'title'         => '',
				'fields'        => array(
					'items'         => array(
						'type'          => 'form',
						'label'         => __('Parallax Layer', 'fl-builder'),
						'form'          => 'parallax_repeater_form', // ID from registered form below
						'preview_text'  => 'parallax_name', // Name of a field to use for the preview text
						'multiple'      => true
					),
				)
			)
		)
	),
	'setting'         => array(
		'title'         => __('Settings', 'fl-builder'),
		'sections'      => array(
			'setting'       => array(
				'title'         => __('Setting', 'fl-builder'),
				'fields'        => array(
					'smoothscrolling'       => array(
						'type'          => 'select',
						'label'         => __('Smooth Scrolling', 'fl-builder'),
						'default'       => 'yes',
						'options' 		=> array(
							'yes' 		=> __('Yes', 'fl-builder'),
							'custom' 		=> __('Custom', 'fl-builder'),
							'no' 		=> __('No', 'fl-builder'),
						),
						'toggle'        => array(
							'custom'      => array(
								'fields'        => array( 'smoothscrolling_custom' ),
							),
						),
						'preview'         => array(
							'type'            => 'refresh'
						)
					),
					'smoothscrolling_custom' => array(
						'type'          => 'unit',
						'label'         => 'Custom Speed Scrolling',
						'default'     	=> '600',
						'maxlength'     => '4',
						'size'          => '5',
						'description'   => 'Millisecond',
						'placeholder'   => '600',
					),
				)
			),
			'overlay'       => array(
				'title'         => __('Background Overflow', 'fl-builder'),
				'fields'        => array(
					'parallax_overlay'       => array(
						'type'          => 'color',
						'label'         => 'Overlay Color',
						'default'   	=> '',
						'show_reset'    => 'true',
						'preview'		=> array(
							'type'		=> 'css',
							'selector'		=> '.parallax::before',
							'property'      => 'background-color',
						)
					),
					'parallax_overlay_opacity'       => array(
						'type'          => 'unit',
						'label'         => 'Overlay Opacity',
						'maxlength'     => '4',
						'size'          => '5',
						'description'   => '%',
						'placeholder'   => '50',
					),
					'parallax_style_overlay'       => array(
						'type'          => 'select',
						'label'         => __('Parallax Blur Overlay', 'fl-builder'),
						'default'       => '',
						'options' 		=> array(
							'' 	=> __('None', 'fl-builder'),
							' parallax-blur-overlay' 	=> __('Blur', 'fl-builder'),
							' parallax-gradient-overlay' 	=> __('Gradient', 'fl-builder'),
						),
						'toggle'        => array(
							' parallax-blur-overlay'      => array(
								'fields'        => array( 'parallax_blur_overlay_color', 'parallax_blur_overlay_height', 'parallax_blur_overlay_width', 'parallax_blur_overlay_wide'),
							),
							' parallax-gradient-overlay'      => array(
								'fields'        => array( 'parallax_gradient_overlay_color', 'parallax_gradient_overlay_orientation'),
							),
						),
					),
					'parallax_blur_overlay_color'       => array(
						'type'          => 'color',
						'label'         => __('Parallax Blur Overlay Color', 'fl-builder'),
						'show_reset'       => true,
					),
					'parallax_blur_overlay_height'       => array(
						'type'          => 'unit',
						'label'         => __('Parallax Blur Overlay Height', 'fl-builder'),
						'default'         => '',
						'placeholder'         => '80',
						'description'         => '%',
					),
					'parallax_blur_overlay_width'       => array(
						'type'          => 'unit',
						'label'         => __('Parallax Blur Overlay Width', 'fl-builder'),
						'default'         => '',
						'placeholder'         => '80',
						'description'         => '%',
					),
					'parallax_blur_overlay_wide'       => array(
						'type'          => 'unit',
						'label'         => __('Parallax Blur Overlay Wide', 'fl-builder'),
						'default'         => '',
						'placeholder'         => '70',
						'description'         => 'px',
					),
					'parallax_gradient_overlay_color'       => array(
						'type'          => 'color',
						'label'         => __('Parallax Gradient Overlay Color', 'fl-builder'),
						'show_reset'       => true,
					),
					'parallax_gradient_overlay_orientation'       => array(
						'type'          => 'select',
						'label'         => __('Parallax Gradient Orientation', 'fl-builder'),
						'default'       => '',
						'options' 		=> array(
							'horizontal' 			=> __('Horizontal to Left', 'fl-builder'),
							'vertical' 				=> __('Vertical to Right', 'fl-builder'),
							'horizontal' 			=> __('Horizontal to Left', 'fl-builder'),
							'vertical' 				=> __('Vertical to Right', 'fl-builder'),
							'diagonal-to-bottom' 	=> __('Diagonal to Bottom', 'fl-builder'),
							'diagonal-to-top' 		=> __('Diagonal to Top', 'fl-builder'),
							'radial' 				=> __('Radial', 'fl-builder'),
						),
					),
					'parallax_gradient_overlay_orientation_reversed'       => array(
						'type'      => 'select',
						'label'     => __('Parallax Gradient test', 'fl-builder'),
						'default'       => 'no',
						'class'       => 'switch',
						'options'       => array(
						  'true'         => 'True',
						  'false'          => 'False',
						),
					),
					'parallax_gradient_overlay_orientation_reverse'       => array(
						'type'      => 'switch',
						'label'     => __('Parallax Gradient Reverse', 'fl-builder'),
						'default'       => 'no',
						'options'       => array(
						  'true'         => 'True',
						  'false'          => 'False',
						),
					),
					'field_name'   => array(
						'type'          => 'radio',
						'label'         => __( 'Graph Type', 'textdomain' ),
						'default'       => 'Line',
						'options'       => array(
							'Line'      => __( 'Line', 'textdomain' ),
							'Bar'      => __( 'Bar', 'textdomain' ),
							'Radar'     => __( 'Radar', 'textdomain'),
						),
						'toggle'      => array (
							'Line'      => array (
							'fields'    => array ( 'usebeziers', 'beziercurvetension' ),
						 ),
							'Bar'          => array (),
							'Radar'          => array (),
						),
						'hide'        => array(),
						'trigger'      => array(),
						'oncolor'        => '#46a9eb',
						'offcolor'         => '#eeeeee',
					),
					'number_of_unicorns'      => array(
						'type'      => 'slider',
						'label'     => __( 'Unicorns' , 'textdomain' ),
						'settings'  => array (
							'min'       => 0,                   // min value for slider
							'max'       => 60,              // max value for slider
							'value'     => 30,              // default value to use when not set
							'range'     => 'min',           // optional: min|max , do not set if no min- or max-range needed
							'step'      => 1,                   // optional: step size, default to one
							'color'     => '#eeeeee',
					  ),
					),
					'number_of_kittens'      => array(
					  'type'        => 'sliderrange',
					  'label'       => __( 'Kittens' , 'textdomain' ),
					  'settings'     => array (
						  'min'       => 0,     // min value for slider
						  'max'       => 10,    // max value for slider
						  'defmin'    => 0,     // default min value
						  'defmax'    => 10,    // default max value
						  'value'     => 2,     // default value to use when not set
						  'step'      => 2,     // step size
						  'color'     => '#666666',
					  ),
					),
					'test_date'      => array(
					  'type'        => 'datedropper',
					  'label'       => __( 'Date' , 'textdomain' ),
					),
					'test_time'      => array(
					  'type'        => 'timedropper',
					  'label'       => __( 'Time' , 'textdomain' ),
					),
				)
			),
		)
	),
));

/**
 * Register a settings form to use in the "form" field type above.
 */
FLBuilder::register_settings_form('parallax_repeater_form', array(
	'title' => __('Parallax Layer', 'fl-builder'),
	'tabs'  => array(
		'general'      => array(
			'title'         => __('Layer Info', 'fl-builder'),
			'sections'      => array(
				'info'       => array(
					'title'         => __('Layer Info', 'fl-builder'),
					'fields'        => array(
						'parallax_name'       => array(
							'type'          => 'text',
							'label'         => 'Name',
							'default'   => __('Parallax Name', 'fl-builder'),
						),
						'parallax_img'       => array(
							'type'          => 'photo',
							'label'         => 'Background Image',
						),
						'parallax_img_repeat'       => array(
							'type'          => 'select',
							'label'         => __('Background Image Repeat', 'fl-builder'),
							'default'       => 'yes',
							'options' 		=> array(
								'repeat' 	=> __('Repeat', 'fl-builder'),
								'no-repeat' => __('No Repeat', 'fl-builder'),
								'repeat-x' => __('Repeat X', 'fl-builder'),
								'repeat-y' => __('Repeat Y', 'fl-builder'),
							),
						),
						'parallax_img_size'       => array(
							'type'          => 'select',
							'label'         => __('Background Image Size', 'fl-builder'),
							'default'       => '',
							'options' 		=> array(
								'auto auto' => __('Default', 'fl-builder'),
								'cover' 	=> __('Cover', 'fl-builder'),
								'100% auto' => __('100%', 'fl-builder'),
							),
							'toggle'        => array(
								'auto auto'      => array(
									'fields'        => array( 'parallax_from_horizontal', 'parallax_to_horizontal', 'parallax_reverse_horizontal' ),
								),
							),
						),
					)
				),
				'position'       => array(
					'title'         => __('Background Position Effects', 'fl-builder'),
					'fields'        => array(
						'parallax_from'       => array(
							'type'          => 'unit',
							'label'         => 'Vertical From',
							'maxlength'     => '4',
							'size'          => '5',
							'description'   => '%',
							'placeholder'   => '0',
						),
						'parallax_to'       => array(
							'type'          => 'unit',
							'label'         => 'Vertical To',
							'maxlength'     => '4',
							'size'          => '5',
							'description'   => '%',
							'placeholder'   => '100',
						),
						'parallax_reverse'       => array(
							'type'          => 'select',
							'label'         => __('Parallax Reverse', 'fl-builder'),
							'default'       => 'yes',
							'options' 		=> array(
								'yes' 		=> __('Yes', 'fl-builder'),
								'no' 		=> __('No', 'fl-builder'),
							),
						),
						'parallax_from_horizontal'       => array(
							'type'          => 'unit',
							'label'         => __('Horizontal From', 'fl-builder'),
							'maxlength'     => '4',
							'size'          => '5',
							'description'   => '%',
							'placeholder'   => '50',
						),
						'parallax_to_horizontal'       => array(
							'type'          => 'unit',
							'label'         => __('Horizontal To', 'fl-builder'),
							'maxlength'     => '4',
							'size'          => '5',
							'description'   => '%',
							'placeholder'   => '50',
						),
						'parallax_reverse_horizontal'       => array(
							'type'          => 'select',
							'label'         => __('Parallax Horizontal Reverse', 'fl-builder'),
							'default'       => 'no',
							'options' 		=> array(
								'no' 		=> __('No', 'fl-builder'),
								'yes' 		=> __('Yes', 'fl-builder'),
							),
						),
					)
				),
			)
		),
	)
));