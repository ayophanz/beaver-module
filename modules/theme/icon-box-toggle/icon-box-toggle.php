<?php

/**
 * @class IconBoxToggleModule
 */
class IconBoxToggleModule extends FLBuilderModule {

	/**
	 * @method __construct
	 */
	public function __construct()
	{
		global $foldercategory;
		parent::__construct(array(
			'name'          	=> __('Icon Box - Toggle', 'fl-builder'),
			'description'   	=> __('Icon Box with toggle.', 'fl-builder'),
			'category'      	=> __($foldercategory, 'fl-builder'),
			'partial_refresh'	=> true
		));
	}

	/**
	 * @method get_classname
	 */
	public function get_classname()
	{
		$classname = 'icon-box-toggle';
		return $classname;
	}
}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('IconBoxToggleModule', array(
	'general'       => array(
		'title'         => __('General', 'fl-builder'),
		'sections'      => array(
			'general'         => array(
				'title'         => '',
				'fields'        => array(
					'iconbox_icon_source'         => array(
						'type'          => 'select',
						'label'         => __('Source', 'fl-builder'),
						'default'       => 'icon',
						'options'       => array(
							'none'			=>  'None',
							'icon'			=>  'Icon',
							'image'	=>  'Image',
						),
						'toggle'        => array(
							'icon'        => array(
								'fields'        => array('iconbox_icon', 'iconbox_icon_size', 'iconbox_icon_color')
							),
							'image'        => array(
								'fields'        => array('iconbox_img', 'iconbox_img_size')
							)
						)
					),
					'iconbox_icon'         => array(
						'type'          => 'icon',
						'label'         => __('Icon', 'fl-builder'),
						'default'         => 'fa fa-bell',
					),
					'iconbox_icon_size'           => array(
						'type'          => 'text',
						'label'         => __( 'Icon/Text Size', 'fl-builder' ),
						'default'       => '',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px',
						'placeholder'   => '60'
					),
					'iconbox_img'         => array(
						'type'          => 'photo',
						'label'         => __('Image', 'fl-builder'),
						'description'         => __('Used .svg file for better quality', 'fl-builder'),
					),
					'iconbox_img_size'           => array(
						'type'          => 'text',
						'label'         => __( 'Image Size', 'fl-builder' ),
						'default'       => '',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px',
						'placeholder'   => '60'
					),
					'iconbox_title'           => array(
						'type'          => 'text',
						'label'         => __( 'Title', 'fl-builder' ),
						'default'       => __( 'Title', 'fl-builder' ),
					),
					'iconbox_desc'           => array(
						'type'          => 'text',
						'label'         => __( 'Decription', 'fl-builder' ),
						'default'       => __( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'fl-builder' ),
						'maxlength'     => '100',
					),
					'iconbox_link'           => array(
						'type'          => 'link',
						'label'         => __( 'Link', 'fl-builder' ),
					),
					'iconbox_link_text'           => array(
						'type'          => 'text',
						'label'         => __( 'Link Text', 'fl-builder' ),
					),
					'iconbox_bg_color'           => array(
						'type'          => 'color',
						'label'         => __( 'Bg Color', 'fl-builder' ),
						'show_reset' 	=> 'true',
					),
				)
			)
		),
	),
));