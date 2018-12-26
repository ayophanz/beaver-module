<?php
/**
 * @class formBoxModules
 */
class formBoxModules extends FLBuilderModule {

	/** 
	 * @method __construct
	 */  
	public function __construct()
	{
		global $foldercategory;
		parent::__construct(array(
			'name'          	=> __('Form Box', 'fl-builder'),
			'description'      	=> __('Text Content with Shadow Boxes', 'fl-builder'),
			'category'      	=> __($foldercategory, 'fl-builder'),
			'partial_refresh'	=> true
		));
	}
	/**
	 * @method get_classname
	 */
	public function get_classname()
	{
		$classname = 'form-box';
		return $classname;
	}
}
/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('formBoxModules', array(
	'general'         => array(
		'title'         => __('Form', 'fl-builder'),
		'sections'      => array(
			'general'       => array(
				'title'         => '',
				'fields'        => array(
					'content'         => array(
						'type'          => 'editor',
					),
				)
			)
		)
	),
));