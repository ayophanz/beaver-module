<?php
global $themeDIR;
/**
 * @class SidebarAdvanced
 */
class SidebarAdvanced extends FLBuilderModule {

	/** 
	 * @method __construct
	 */  
	public function __construct()
	{
		global $foldercategory;
		parent::__construct(array(
			'name'          	=> __('Sidebar Advanced', 'fl-builder'),
			'description'   	=> __('Display a WordPress sidebar that has been registered by the current theme.', 'fl-builder'),
			'category'      	=> __($foldercategory, 'fl-builder'),
			'editor_export' 	=> false,
			'partial_refresh'	=> true
		));
	}
	
	/**
	 * @method get_classname
	 */
	public function get_classname()
	{
		$classname = 'sidebar-advance';
		return $classname;
	}
}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('SidebarAdvanced', array(
	'general'       => array( // Tab
		'title'         => __('General', 'fl-builder'), // Tab title
		'file'          => FL_MODULE_THEME_DIR . 'modules/'.$themeDIR.'/sidebar-advanced/includes/settings-general.php'
	),
	'column_settings'       => array(
		'title'         => __('Columns', 'fl-builder'),
		'sections'      => array(
			'columns'         => array(
				'title'         => '',
				'fields'        => array(
					'column'         => array(
						'type'          => 'select',
						'label'         => __('Number of Column', 'fl-builder'),
						'default'       => 'column-12',
						'options'       => array(
							'column-2'    		=> __('Column 6', 'fl-builder'),
							'column-2-5'    	=> __('Column 5', 'fl-builder'),
							'column-3'    		=> __('Column 4', 'fl-builder'),
							'column-4'    		=> __('Column 3', 'fl-builder'),
							'column-6'    		=> __('Column 2', 'fl-builder'),
							'column-12'    		=> __('Column 1', 'fl-builder'),
						)
					),
					'column_spacing'           => array(
						'type'          => 'unit',
						'label'         => __( 'Column Spacing', 'fl-builder' ),
						'default' 		=> '30',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px',
					),
				)
			),
		),
	),
));