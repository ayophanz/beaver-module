<?php

/**
 * @class RowSeparatorModule
 */
class RowSeparatorModule extends FLBuilderModule {

	/**
	 * @method __construct
	 */
	public function __construct()
	{
		global $foldercategory;
		parent::__construct(array(
			'name'          	=> __('Row Separator', 'fl-builder'),
			'description'   	=> __('Row Separator.', 'fl-builder'),
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
		$classname = 'row-separator';
		return $classname;
	}
}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('RowSeparatorModule', array(
	'general'       => array(
		'title'         => __('General', 'fl-builder'),
		'sections'      => array(
			'general'         => array(
				'title'         => '',
				'fields'        => array(
					'row_separator_style' => array(
						'type'          => 'select',
						'label'         => __('Row Separator Style', 'fl-builder'),
						'default'       => 'wide-arrow',
						'options'       => array(
							'arrow'		=>  'Arrow',
							'wide-arrow'=>  'Wide Arrow',
							'wide-arrow-larger'=>  'Wide Arrow Larger',
							'slant-right'=>  'Slant Right',
							'slant-left'=>  'Slant Left',
							'curved-right'=>  'Curved Right',
							'curved-left'=>  'Curved Left',
							'bubbles'=>  'Bubbles',
							'envelope'=>  'Envelope',
						),
					),
					'row_separator_position' => array(
						'type'          => 'select',
						'label'         => __('Position', 'fl-builder'),
						'default'       => 'top',
						'options'       => array(
							'top' 		=>  'Top',
							'bottom' 	=>  'Bottom',
						),
					),
					'row_separator_color'         => array(
						'type'          => 'color',
						'label'         => __('Color', 'fl-builder'),
						'show_reset'    => true,
					),
				)
			)
		),
	),
));