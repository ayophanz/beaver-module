<?php

/**
 * @class BoxLinkModule
 */
class BoxLinkModule extends FLBuilderModule {

	/**
	 * @method __construct
	 */
	public function __construct()
	{
		global $foldercategory;
		parent::__construct(array(
			'name'          	=> __('Box Link', 'fl-builder'),
			'description'   	=> __('Feature Link.', 'fl-builder'),
			'category'      	=> __($foldercategory, 'fl-builder'),
			'partial_refresh'	=> true
		));
	}

	/**
	 * @method get_classname
	 */
	public function get_classname()
	{
		$classname = 'box-link';
		return $classname;
	}
}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('BoxLinkModule', array(
	'general'       => array(
		'title'         => __('General', 'fl-builder'),
		'sections'      => array(
			'general'         => array(
				'title'         => '',
				'fields'        => array(
					'title'           => array(
						'type'          => 'text',
						'label'         => __( 'Title', 'fl-builder' ),
						'default'       => __( 'TITLE', 'fl-builder' ),
						'preview'       => array(
							'type'          => 'text',
							'selector'      => '.box-link-title',
						)
					),
					'label'           => array(
						'type'          => 'text',
						'label'         => __( 'Label', 'fl-builder' ),
						'default'       => __( 'CATEGORY NAME', 'fl-builder' ),
						'preview'       => array(
							'type'          => 'text',
							'selector'      => '.box-link-label',
						)
					),
					'link'           => array(
						'type'          => 'link',
						'label'         => __( 'Link', 'fl-builder' ),
					),
					'bg_image'           => array(
						'type'          => 'photo',
						'label'         => __( 'Bg Image', 'fl-builder' ),
					),
					'bg_color'           => array(
						'type'          => 'color',
						'label'         => __( 'Bg Color', 'fl-builder' ),
						'default' 		=> 'f37676',
						'show_reset' 	=> true,
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.box-link:before',
							'property'      => 'background-color',
						)
					),
					'bg_image_opacity'    => array(
						'type'          => 'unit',
						'label'         => __('Background Overlay Opacity', 'fl-builder'),
						'default'       => '80',
						'description'   => '%',
						'maxlength'     => '3',
						'size'          => '4',
						'placeholder'   => '0',
					),
					'height'    => array(
						'type'          => 'unit',
						'label'         => __('Custom Height', 'fl-builder'),
						'default'       => '',
						'description'   => 'px',
						'maxlength'     => '4',
						'size'          => '5',
						'placeholder'   => '350'
					),
					'font_size'    => array(
						'type'          => 'unit',
						'label'         => __('Custom Title Font Size', 'fl-builder'),
						'default'       => '',
						'description'   => 'px',
						'maxlength'     => '4',
						'size'          => '5',
						'placeholder'   => '60',
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.box-link-title',
							'property'      => 'font-size',
							'unit'          => 'px',
						)
					),
					'font_size_label'    => array(
						'type'          => 'unit',
						'label'         => __('Custom Label Font Size', 'fl-builder'),
						'default'       => '',
						'description'   => 'px',
						'maxlength'     => '4',
						'size'          => '5',
						'placeholder'   => '24',
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.box-link-label',
							'property'      => 'font-size',
							'unit'          => 'px',
						)
					),
				)
			)
		),
	),
));