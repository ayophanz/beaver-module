<?php
/**
 * @class partnersLogosModule
 */
class partnersLogosModule extends FLBuilderModule {

	/** 
	 * @method __construct
	 */  
	public function __construct()
	{
		global $foldercategory;
		parent::__construct(array(
			'name'          	=> __('Partners Logos', 'fl-builder'),
			'description'   	=> __('Logos of the client.', 'fl-builder'),
			'category'      	=> __($foldercategory, 'fl-builder'),
			'partial_refresh'	=> true
		));
	}
	
	/**
	 * @method get_classname
	 */
	public function get_classname()	{
		$effect = $this->settings->logos_effects ? ' '.$this->settings->logos_effects : '';
		$classname = 'partners-logo ' . $this->settings->logos_column . ' ' . $this->settings->logos_alignment . $effect;
		return $classname;
	}
}

/*Image Size Size*/
add_image_size( 'partners-logo', 200 , 60 );


/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('partnersLogosModule', array(
	'slides'         => array(
		'title'         => __('General', 'fl-builder'),
		'sections'      => array(
			'general'       => array(
				'title'         => '',
				'fields'        => array(
					'logos'         => array(
						'type'          => 'form',
						'label'         => __('Logo', 'fl-builder'),
						'form'          => 'partner_logo_form', // ID from registered form below
						'preview_text'  => 'title', // Name of a field to use for the preview text
						'multiple'      => true
					),
				)
			)
		)
	),
	'settings'         => array(
		'title'         => __('Settings', 'fl-builder'),
		'sections'      => array(
			'settings'       => array(
				'title'         => '',
				'fields'        => array(
					'logos_effects'         => array(
						'type'          => 'select',
						'label'         => __('Logo Effects', 'fl-builder'),
						'default'       => '',
						'options'       => array(
							''    		=> __('Default', 'fl-builder'),
							'grayscale'    		=> __('Grayscale - Colored on hover', 'fl-builder'),
							'opacity'    		=> __('Opacity', 'fl-builder'),
							'grayscale-opacity'    		=> __('Grayscale & Opacity', 'fl-builder'),
						)
					),
					'logos_alignment'         => array(
						'type'          => 'select',
						'label'         => __('Logo Alignment', 'fl-builder'),
						'default'       => 'align-center',
						'options'       => array(
							'align-left'    		=> __('Align Left', 'fl-builder'),
							'align-center'    		=> __('Align Center', 'fl-builder'),
							'align-right'    		=> __('Align Right', 'fl-builder'),
						)
					),
					'logos_column'         => array(
						'type'          => 'select',
						'label'         => __('Number of Column', 'fl-builder'),
						'default'       => 'column-5',
						'options'       => array(
							'column-1'    		=> __('Column 1', 'fl-builder'),
							'column-2'    		=> __('Column 2', 'fl-builder'),
							'column-3'    		=> __('Column 3', 'fl-builder'),
							'column-4'    		=> __('Column 4', 'fl-builder'),
							'column-5'    		=> __('Column 5', 'fl-builder'),
							'column-6'    		=> __('Column 6', 'fl-builder'),
						)
					),
					'logos_column_spacing'           => array(
						'type'          => 'unit',
						'label'         => __( 'Column Spacing', 'fl-builder' ),
						'default' 		=> '30',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px',
					),
				)
			)
		)
	),
));


/**
 * Register a settings form to use in the "form" field type above.
 */
FLBuilder::register_settings_form('partner_logo_form', array(
	'title' => __('Add Logo', 'fl-builder'),
	'tabs'  => array(
		'general'      => array(
			'title'         => __('Partner Info', 'fl-builder'),
			'sections'      => array(
				'info'       => array(
					'title'         => __('Logo', 'fl-builder'),
					'fields'        => array(
						'logo'       => array(
							'type'          => 'photo',
							'label'         => 'Image',
						),
						'title'       => array(
							'type'          => 'text',
							'label'         => 'Title',
							'default'   => __('Company Name', 'fl-builder'),
							'placeholder'   => __('Company Name', 'fl-builder'),
						),
						'link'       => array(
							'type'          => 'link',
							'label'         => 'Website Link',
						),
					)
				),
			)
		)
	)
));