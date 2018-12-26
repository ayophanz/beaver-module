<?php

/**
 * @class skillsBar
 */
class skillsBar extends FLBuilderModule {

	/** 
	 * @method __construct
	 */  
	public function __construct()
	{
		global $foldercategory;
		parent::__construct(array(
			'name'          	=> __('Skills Bar', 'fl-builder'),
			'description'   	=> __('Display Slider Skill Percentage.', 'fl-builder'),
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
		$classname = 'skills-bar '.$this->settings->skillbar_style;
		return $classname;
	}
}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('skillsBar', array(
	'general'         => array(
		'title'         => __('Skills', 'fl-builder'),
		'sections'      => array(
			'general'       => array(
				'title'         => '',
				'fields'        => array(
					'items'         => array(
						'type'          => 'form',
						'label'         => __('Skill', 'fl-builder'),
						'form'          => 'skillsbar_form', // ID from registered form below
						'preview_text'  => 'skillbar_title', // Name of a field to use for the preview text
						'multiple'      => true
					),
				),
			),
		),
	),
	'setting'         => array(
		'title'         => __('Setting', 'fl-builder'),
		'sections'      => array(
			'setting'       => array(
				'title'         => '',
				'fields'        => array(
					'skillbar_style'        => array(
						'type'          => 'select',
						'label'         => __('Skill Bar Style', 'fl-builder'),
						'default'       => 'rounded',
						'options' 		=> array(
							'inside-label' 			=> __('Inside Label', 'fl-builder'),
							'top-label'	=> __('Top Label', 'fl-builder'),
						),
					),
					'skillbar_style_radius'       => array(  
						'type'          => 'unit',
						'label'         => 'Skill Bar Radius',
						'default'   => '',
						'placeholder'   => '30',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px',
						'preview'		=> array(
							'type'		=> 'css',
							'selector'		=> '.skills-bar *',
							'property'      => 'border-radius',
							'unit' 		    => 'px',
						),
					),
					'skillbar_height'       => array(  
						'type'          => 'unit',
						'label'         => 'Skill Bar height',
						'default'   => '',
						'placeholder'   => '35',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px',
						'preview'		=> array(
							'type'		=> 'css',
							'rules'           => array(
								array(
									'selector'		=> '.skills-bar .skillbar-bar-wrapper',
									'property'      => 'height',
									'unit' 		    => 'px',
								),
								array(
									'selector'		=> '.skills-bar .skillbar-title',
									'property'      => 'height',
									'unit' 		    => 'px',
								), 
								array(
									'selector'		=> '.skills-bar .skillbar-title',
									'property'      => 'line-height',
									'unit' 		    => 'px',
								),  
								array(
									'selector'		=> '.skills-bar .skillbar-bar',
									'property'      => 'height',
									'unit' 		    => 'px',
								),    
							)
						),
					),
					'skillbar_delay'       => array(  
						'type'          => 'unit',
						'label'         => 'Animation Delay',
						'default'   	=> '3',
						'placeholder'   => '3',
						'maxlength'     => '2',
						'size'          => '3',
						'description'   => 'Second',
					),
					'skillbar_bg_color'       => array(  
						'type'          => 'color',
						'label'         => 'Bars Bg Color',
						'default'   => 'eeeeee',
						'show_reset'   => true,
						'preview'		=> array(
							'type'		=> 'css',
							'selector'		=> '.skillbar-bar-wrapper',
							'property'      => 'background-color',
						),
					),
					'skillbar_percentage_color'       => array(  
						'type'          => 'color',
						'label'         => 'Percentage counter Color',
						'default'   => '',
						'show_reset'   => true,
						'preview'		=> array(
							'type'		=> 'css',
							'selector'		=> '.skill-bar-percent',
							'property'      => 'color',
						),
					),
				),
			),
		),
	),
));

/**
 * Register a settings form to use in the "form" field type above.
 */
FLBuilder::register_settings_form('skillsbar_form', array(
	'title' => __('Add Slide', 'fl-builder'),
	'tabs'  => array(
		'general'      => array(
			'title'         => __('Slider Info', 'fl-builder'),
			'sections'      => array(
				'info'       => array(
					'title'         => __('Slider Info', 'fl-builder'),
					'fields'        => array(
						'skillbar_title'       => array(
							'type'          => 'text',
							'label'         => 'Skill',
							'default'   => __('HTML5', 'fl-builder'),
							'placeholder'   => __('Enter Skill', 'fl-builder'),
						),
						'skillbar_percentage'       => array(  
							'type'          => 'unit',
							'label'         => 'Percentage',
							'placeholder'   => '80',
							'maxlength'     => '3',
							'size'          => '4',
							'description'   => '%',
						),
						'skillbar_color'       => array(  
							'type'          => 'color',
							'label'         => 'Color',
							'default'   => '3498db',
							'show_reset'   => true,
						),
						'skillbar_text_color'       => array(  
							'type'          => 'color',
							'label'         => 'Text Color',
							'show_reset'   => true,
						),
					)
				),
			)
		)
	)
));