<?php

/**
 * @class ColumnBackground
 */
class ColumnBackground extends FLBuilderModule {

	/**
	 * @method __construct
	 */
	public function __construct()
	{
		global $foldercategory;
		parent::__construct(array(
			'name'          	=> __('Column Background', 'fl-builder'),
			'description'   	=> __('Content Image Left or Right', 'fl-builder'),
			'category'      	=> __($foldercategory, 'fl-builder'),
			'partial_refresh'	=> true
		));
	}

	/**
	 * @method get_classname
	 */
	public function get_classname()
	{
		$classname = 'column-background';
		return $classname;
	}
}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('ColumnBackground', array(
	'general'       => array(
		'title'         => __('General', 'fl-builder'),
		'sections'      => array(
			'general'         => array(
				'title'         => '',
				'fields'        => array(
					'bg_image'      => array(
						'type'          => 'photo',
						'label'         => __('Photo', 'fl-builder'),
					),
					'bg_repeat'     => array(
						'type'          => 'select',
						'label'         => __('Repeat', 'fl-builder'),
						'default'       => 'none',
						'options'       => array(
							'no-repeat'     => _x( 'None', 'Background repeat.', 'fl-builder' ),
							'repeat'        => _x( 'Tile', 'Background repeat.', 'fl-builder' ),
							'repeat-x'      => _x( 'Horizontal', 'Background repeat.', 'fl-builder' ),
							'repeat-y'      => _x( 'Vertical', 'Background repeat.', 'fl-builder' )
						),
						'help'          => __('Repeat applies to how the image should display in the background. Choosing none will display the image as uploaded. Tile will repeat the image as many times as needed to fill the background horizontally and vertically. You can also specify the image to only repeat horizontally or vertically.', 'fl-builder'),
					),
					'bg_position'   => array(
						'type'          => 'select',
						'label'         => __('Position', 'fl-builder'),
						'default'       => 'center center',
						'options'       => array(
							'left top'      => __('Left Top', 'fl-builder'),
							'left center'   => __('Left Center', 'fl-builder'),
							'left bottom'   => __('Left Bottom', 'fl-builder'),
							'right top'     => __('Right Top', 'fl-builder'),
							'right center'  => __('Right Center', 'fl-builder'),
							'right bottom'  => __('Right Bottom', 'fl-builder'),
							'center top'    => __('Center Top', 'fl-builder'),
							'center center' => __( 'Center', 'fl-builder' ),
							'center bottom' => __('Center Bottom', 'fl-builder')
						),
						'help'          => __('Position will tell the image where it should sit in the background.', 'fl-builder'),
					),
					'bg_attachment' => array(
						'type'          => 'select',
						'label'         => __('Attachment', 'fl-builder'),
						'default'       => 'scroll',
						'options'       => array(
							'scroll'        => __( 'Scroll', 'fl-builder' ),
							'fixed'         => __( 'Fixed', 'fl-builder' )
						),
						'help'          => __('Attachment will specify how the image reacts when scrolling a page. When scrolling is selected, the image will scroll with page scrolling. This is the default setting. Fixed will allow the image to scroll within the background if fill is selected in the scale setting.', 'fl-builder'),
					),
					'bg_size'       => array(
						'type'          => 'select',
						'label'         => __('Scale', 'fl-builder'),
						'default'       => 'cover',
						'options'       => array(
							'auto'          => _x( 'None', 'Background scale.', 'fl-builder' ),
							'contain'       => __( 'Fit', 'fl-builder'),
							'cover'         => __( 'Fill', 'fl-builder')
						),
						'help'          => __('Scale applies to how the image should display in the background. You can select either fill or fit to the background.', 'fl-builder'),
					),
					'bg_break'       => array(
						'type'          => 'select',
						'label'         => __('Mobile BreakPoint Option', 'fl-builder'),
						'default'       => 'cover',
						'options'       => array(
							''   			=> __( 'Responsive', 'fl-builder'),
							'medium'       => __( 'Medium', 'fl-builder'),
						),
						'preview'         => array(
							'type'            => 'none'
						)
					)
				)
			)
		),
	),
));