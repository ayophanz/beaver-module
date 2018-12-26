<?php

/**
 * @class SocialIconsModules
 */
class SocialIconsModules extends FLBuilderModule {

	/**
	 * @method __construct
	 */
	public function __construct()
	{
		global $foldercategory;
		parent::__construct(array(
			'name'          	=> __('Social Media Icons', 'fl-builder'),
			'description'   	=> __('Social Media Icons by Fontawesome or Image', 'fl-builder'),
			'category'      	=> __($foldercategory, 'fl-builder'),
			'partial_refresh'	=> true
		));
	}

	/**
	 * @method get_classname
	 */
	public function get_classname()
	{
		$classname = 'social-media-icons '. $this->settings->socialmedia_alignment;
		return $classname;
	}
	
	public function textToClass($string) {
		//Lower case everything
		$string = strtolower($string);
		//Make alphanumeric (removes all other characters)
		$string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
		//Clean up multiple dashes or whitespaces
		$string = preg_replace("/[\s-]+/", " ", $string);
		//Convert whitespaces and underscore to dash
		$string = preg_replace("/[\s_]/", "-", $string);
		return $string;
	}
}


/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('SocialIconsModules', array(
	'icons'       => array(
		'title'         => __('General', 'fl-builder'),
		'sections'      => array(
			'icons'         => array(
				'title'         => '',
				'fields'        => array(
					'items'         => array(
						'type'          => 'form',
						'label'         => __('Icons', 'fl-builder'),
						'form'          => 'social_media_icons_form', // ID from registered form below
						'preview_text'  => 'socialmedia_title', // Name of a field to use for the preview text
						'multiple'      => true
					),
				)
			)
		),
	),
	'settings'       => array(
		'title'         => __('General', 'fl-builder'),
		'sections'      => array(
			'settings'         => array(
				'title'         => '',
				'fields'        => array(
					'socialmedia_alignment'         => array(
						'type'          => 'select',
						'label'         => __('Alignment', 'fl-builder'),
						'default'       => 'Left',
						'options'       => array(
							'left'    		=> __('Left', 'fl-builder'),
							'center'    	=> __('Center', 'fl-builder'),
							'right'    		=> __('Right', 'fl-builder'),
						),
					),
					'socialmedia_icon_size'           => array(
						'type'          => 'unit',
						'label'         => __( 'Icon/Text Size', 'fl-builder' ),
						'default'       => '',
						'description'   => 'px',
						'placeholder'   => '20',
						'preview'      => array(
							'type'         => 'css',
							'selector'     => '.social-media-icons a',
							'property'     => 'font-size',
							'unit'		   => 'px',
						),
					),
					'socialmedia_border_radius'           => array(
						'type'          => 'unit',
						'label'         => __( 'Border Radius', 'fl-builder' ),
						'default'       => '',
						'description'   => 'px',
						'placeholder'   => '30',
						'preview'      => array(
							'type'         => 'css',
							'selector'     => '.social-media-icons a',
							'property'     => 'border-radius',
							'unit'		   => 'px',
						),
					),
					'socialmedia_padding'           => array(
						'type'          => 'unit',
						'label'         => __( 'Social Media Icons Padding', 'fl-builder' ),
						'default'       => '',
						'description'   => 'px',
						'placeholder'   => '10',
						'preview'      => array(
							'type'         => 'css',
							'selector'     => '.social-media-icons a',
							'property'     => 'padding',
							'unit'		   => 'px',
						),
					),
					'socialmedia_spacing'           => array(
						'type'          => 'unit',
						'label'         => __( 'Social Media Icons Spacing', 'fl-builder' ),
						'default'       => '',
						'description'   => 'px',
						'placeholder'   => '10',
						'preview'      => array(
							'type'         => 'css',
							'rules'           => array(
								array(
									'selector'     => '.social-media-icons.left a',
									'property'     => 'margin-right',
									'unit'		   => 'px',
								),
								array(
									'selector'     => '.social-media-icons.left a',
									'property'     => 'margin-bottom',
									'unit'		   => 'px',
								),
								array(
									'selector'     => '.social-media-icons.right a',
									'property'     => 'margin-left',
									'unit'		   => 'px',
								),
								array(
									'selector'     => '.social-media-icons.right a',
									'property'     => 'margin-bottom',
									'unit'		   => 'px',
								),
								array(
									'selector'     => '.social-media-icons.center a',
									'property'     => 'margin-left',
									'unit'		   => 'px',
								),
								array(
									'selector'     => '.social-media-icons.center a',
									'property'     => 'margin-right',
									'unit'		   => 'px',
								),
								array(
									'selector'     => '.social-media-icons.center a',
									'property'     => 'margin-bottom',
									'unit'		   => 'px',
								),
							)
						),
					),
				)
			)
		),
	),
));
/**
 * Register a settings form to use in the "form" field type above.
 */
FLBuilder::register_settings_form('social_media_icons_form', array(
	'title' => __('Add Icon', 'fl-builder'),
	'tabs'  => array(
		'general'      => array(
			'title'         => __('', 'fl-builder'),
			'sections'      => array(
				'info'       => array(
					'title'         => __('Social Icon Info', 'fl-builder'),
					'fields'        => array(
						'socialmedia_title'           => array(
							'type'          => 'text',
							'label'         => __( 'Title', 'fl-builder' ),
							'default'       => __( 'Facebook', 'fl-builder' ),
						),
						'socialmedia_icon_source'         => array(
							'type'          => 'select',
							'label'         => __('Source', 'fl-builder'),
							'default'       => 'icon',
							'options'       => array(
								'icon'			=>  'Icon',
								'image'	=>  'Image',
							),
							'toggle'        => array(
								'icon'        => array(
									'fields'        => array('socialmedia_icon', 'socialmedia_icon_size', 'socialmedia_icon_color', 'socialmedia_color', 'socialmedia_bg_color')
								),
								'image'        => array(
									'fields'        => array('socialmedia_img', 'socialmedia_img_size')
								)
							)
						),
						'socialmedia_icon'         => array(
							'type'          => 'icon',
							'label'         => __('Icon', 'fl-builder'),
							'default'         => 'fa fa-facebook',
						),
						'socialmedia_img'         => array(
							'type'          => 'photo',
							'label'         => __('Image', 'fl-builder'),
							'description'         => __('Used .svg file for better quality', 'fl-builder'),
						),
						'socialmedia_img_size'           => array(
							'type'          => 'text',
							'label'         => __( 'Image Size', 'fl-builder' ),
							'default'       => '',
							'maxlength'     => '3',
							'size'          => '4',
							'description'   => 'px',
							'placeholder'   => '60',
							'preview'      => array(
								'type'         => 'css',
								'selector'     => '.social-media-icons a img',
								'property'     => 'width',
								'unit'		   => 'px',
							),
						),
						'socialmedia_link'           => array(
							'type'          => 'link',
							'label'         => __( 'Link', 'fl-builder' ),
						),
						'socialmedia_color'           => array(
							'type'          => 'color',
							'label'         => __( 'Color', 'fl-builder' ),
							'show_reset' 	=> 'true',
							'preview'      => array(
								'type'         => 'css',
								'selector'     => '.social-media-icons a',
								'property'     => 'color',
							),
						),
						'socialmedia_bg_color'           => array(
							'type'          => 'color',
							'label'         => __( 'Bg Color', 'fl-builder' ),
							'show_reset' 	=> 'true',
							'preview'      => array(
								'type'         => 'css',
								'selector'     => '.social-media-icons a',
								'property'     => 'background-color',
							),
						),
					)
				),
			)
		),
	)
));