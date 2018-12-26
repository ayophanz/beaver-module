<?php

/**
 * @class listModule
 */
class listModule extends FLBuilderModule {

	/** 
	 * @method __construct
	 */  
	public function __construct()
	{
		global $foldercategory;
		parent::__construct(array(
			'name'          	=> __('List', 'fl-builder'),
			'description'   	=> __('List with icon.', 'fl-builder'),
			'category'      	=> __($foldercategory, 'fl-builder'),
			'partial_refresh'	=> true
		));
	}
	/**
	 * @method get_classname
	 */
	public function get_classname()
	{
		$classname = 'lists ' . $this->settings->alignment;
		return $classname;
	}
}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('listModule', array(
	'slides'         => array(
		'title'         => __('Lists', 'fl-builder'),
		'sections'      => array(
			'general'       => array(
				'title'         => '',
				'fields'        => array(
					'alignment'         => array(
						'type'          => 'select',
						'label'         => __('Alignment', 'fl-builder'),
						'default' 		=> 'left',
						'options'       => array(
							'left'		=>  'Left',
							'center'	=>  'Center',
							'right'		=>  'Right',
						),
					),
					'font_size'         => array(
						'type'          => 'unit',
						'label'         => __('Font Size', 'fl-builder'),
						'placeholder' 		=> '',
						'description' 		=> 'px',
						'preview'       => array(
							'type'      => 'css',
							'selector'  => '.lists',
							'property'  => 'font-size',
							'unit'  => 'px',
						)
					),
					'font_weight'         => array(
						'type'          => 'select',
						'label'         => __('Default Font Weight', 'fl-builder'),
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
							'selector'  	=> '.list .list-text',
							'property'      => 'font-weight',
						),
						'help'   		=> 'Its depend to the font family if the following font-weight supported.',
					),
					'lineheight'         => array(
						'type'          => 'unit',
						'label'         => __('Line Height', 'fl-builder'),
						'placeholder' 		=> '1.2',
						'description' 		=> 'em',
						'preview'       => array(
							'type'      => 'css',
							'selector'  => '.list .list-text',
							'property'  => 'line-height',
							'unit'  => 'em',
						)
					),
					'spacing'         => array(
						'type'          => 'unit',
						'label'         => __('Spacing', 'fl-builder'),
						'placeholder' 		=> '',
						'description' 		=> 'px',
					),
					'default_icon_color'       => array(
						'type'          => 'color',
						'label'         => 'Icons Color',
						'show_reset'   => true,
						'preview'       => array(
							'type'      => 'css',
							'selector'  => '.list .list-icon',
							'property'  => 'color',
						)
					),
					'default_text_color'       => array(
						'type'          => 'color',
						'label'         => 'Text Color',
						'show_reset'   => true,
						'preview'       => array(
							'type'      => 'css',
							'selector'  => '.list .list-text',
							'property'  => 'color',
						)
					),
				)
			),
			'lists'       => array(
				'title'         => 'Lists',
				'fields'        => array(
					'items'         => array(
						'type'          => 'form',
						'label'         => __('List', 'fl-builder'),
						'form'          => 'lists_repeater_form', // ID from registered form below
						'preview_text'  => 'list_text', // Name of a field to use for the preview text
						'multiple'      => true
					),
				)
			)
		)
	),
));

/**
 * Register a settings form to use in the "form" field type above.
 */
FLBuilder::register_settings_form('lists_repeater_form', array(
	'title' => __('Add List', 'fl-builder'),
	'tabs'  => array(
		'general'      => array(
			'title'         => __('', 'fl-builder'),
			'sections'      => array(
				'info'       => array(
					'title'         => __('', 'fl-builder'),
					'fields'        => array(
						'list_icon_type'           => array(
							'type'          => 'select',
							'label'         => __( 'Icon Type', 'fl-builder' ),
							'default'       => '',
							'options'       => array(
								''			=>  'None',
								'image'			=>  'Image',
							),
							'toggle'        => array(
								''	=> array(
									'fields'        => array('list_icon', 'list_icon_color')
								),
								'image'	=> array(
									'fields'        => array('list_icon_image')
								),
							),
						),
						'list_icon'       => array(
							'type'          => 'icon',
							'label'         => 'Add Icon',
							'show_remove'   => true,
						),
						'list_icon_color'       => array(
							'type'          => 'color',
							'label'         => 'Icon Color',
							'show_reset'   => true,
							'preview'       => array(
								'type'      => 'css',
								'selector'  => '.list-icon',
								'property'  => 'color',
							)
						),
						'list_icon_image'       => array(
							'type'          => 'photo',
							'label'         => 'Add Icon',
							'show_remove'   => true,
						),
						'list_text_color'       => array(
							'type'          => 'color',
							'label'         => 'Text Color',
							'show_reset'   => true,
							'preview'       => array(
								'type'      => 'css',
								'selector'  => '.list-text',
								'property'  => 'color',
							)
						),
						'list_text'       => array(
							'type'          => 'text',
							'label'         => 'Text',
							'default'   	=> __('Featured List Label', 'fl-builder'),
						),
						'list_content'       => array(
							'type'          => 'editor',
							'label'         => '',
						),
					)
				),
			)
		),
	)
));
