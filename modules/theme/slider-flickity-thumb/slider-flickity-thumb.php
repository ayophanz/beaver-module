<?php

/**
 * @class FlickitySliderThumb
 */
class FlickitySliderThumb extends FLBuilderModule {

	/** 
	 * @method __construct
	 */  
	public function __construct()
	{
		global $foldercategory;
		parent::__construct(array(
			'name'          	=> __('Slider Flickity Thumb  (Full Screen)', 'fl-builder'),
			'description'   	=> __('Display Slider Thumb.', 'fl-builder'),
			'category'      	=> __($foldercategory, 'fl-builder'),
			'partial_refresh'	=> true
		));
		// Register and enqueue your own.
		$this->add_css( 'flickity', $this->url . 'css/flickity.css' );
		$this->add_js( 'flickity', $this->url . 'js/flickity.pkgd.min.js', array(), '', true );
	}
	/**
	 * @method get_classname
	 */
	public function get_classname()
	{
		$classname = 'slider-flickity-thumb ' . $this->settings->height;
		return $classname;
	}
}

/*Module Image Size*/
add_image_size( 'flickity-image', 1000 , 907, true );

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('FlickitySliderThumb', array(
	'slides'         => array(
		'title'         => __('Slides', 'fl-builder'),
		'sections'      => array(
			'general'       => array(
				'title'         => '',
				'fields'        => array(
					'items'         => array(
						'type'          => 'form',
						'label'         => __('Slide', 'fl-builder'),
						'form'          => 'flickity_thumb_repeater_form', // ID from registered form below
						'preview_text'  => 'slider_title', // Name of a field to use for the preview text
						'multiple'      => true
					),
				)
			)
		)
	),
	'style'        => array(
		'title'         => __('Style', 'fl-builder'),
		'sections'      => array(
			'general'       => array(
				'title'         => '',
				'fields'        => array(                              
					'autoplay'        => array(
						'type'          => 'select',
						'label'         => __('Autoplay', 'fl-builder'),
						'default'       => 'true',
						'options'       => array(
							'true'    => __('Yes', 'fl-builder'),
							'false'      => __('No', 'fl-builder'),
						),
						'toggle'        => array(
							'true'        => array(
								'fields'        => array('autoplay_delay')
							),
						),
					),
					'autoplay_delay'        => array(
						'type'          => 'unit',
						'label'         => __('Autoplay Delay', 'fl-builder'),
						'minlength'     => '4',
						'maxlength'     => '5',
						'size'          => '6',
						'description'   => 'millisecond',
						'placeholder'   => '6000',
					),
					'height'        => array(
						'type'          => 'select',
						'label'         => __('Height', 'fl-builder'),
						'default'       => 'fullheight',
						'options'       => array(
							'fullheight'    => __('Full Height', 'fl-builder'),
							'autoheight'      => __('Auto Height', 'fl-builder'),
							'customheight'      => __('Custom Height', 'fl-builder'),
						),
						'toggle'        => array(
							'customheight'        => array(
								'fields'        => array('customheight')
							),
						),
					),
					'customheight'        => array(
						'type'          => 'unit',
						'label'         => __('Custom Height', 'fl-builder'),
						'maxlength'     => '4',
						'size'          => '5',
						'description'   => 'px',
						'placeholder'   => '600',
					),
					'style'        => array(
						'type'          => 'select',
						'label'         => __('Style', 'fl-builder'),
						'default'       => 'slide',
						'options'       => array(
							'style_slide'    => __('Slide', 'fl-builder'),
							'style_fade'    => __('Fade', 'fl-builder'),
						),
					),
					'slider_thumbnails_margin_top'       => array(
						'type'          => 'unit',
						'label'         => 'Thumbnails Margin Top',
						'maxlength'     => '5',
						'size'          => '6',
						'description'   => 'px',
						'placeholder'   => '-120',
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.slider-flickity-thumb-nav',
							'property'      => 'margin-top',
							'unit'          => 'px',
						)
					),
					'slider_thumbnails_active_margin_top'       => array(
						'type'          => 'unit',
						'label'         => 'Thumbnails Active Margin Top',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px',
						'placeholder'   => '-20',
					),
					'slider_thumbnails_background'       => array(
						'type'          => 'photo',
						'label'         => 'Thumbnails Background',
						'show_remove'	=> true,
					),
					'slider_thumbnails_background_position'       => array(
						'type'          => 'text',
						'label'         => 'Thumbnails Background Position',
						'maxlength'     => '20',
						'description'   => 'eg: 50% 90%',
						'placeholder'   => '50% 90%',
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.slider-flickity-thumb-nav',
							'property'      => 'background-position',
						)
					),
				)
			),
		)
	)
));

/**
 * Register a settings form to use in the "form" field type above.
 */
FLBuilder::register_settings_form('flickity_thumb_repeater_form', array(
	'title' => __('Add Slide', 'fl-builder'),
	'tabs'  => array(
		'general'      => array(
			'title'         => __('Info', 'fl-builder'),
			'sections'      => array(
				'info'       => array(
					'title'         => __('Info', 'fl-builder'),
					'fields'        => array(
						'slider_image'       => array(
							'type'          => 'photo',
							'label'         => 'Image',
						),
						'slider_bg_image'       => array(
							'type'          => 'photo',
							'label'         => 'Background Image',
						),
						'slider_title'       => array(
							'type'          => 'text',
							'label'         => 'Title',
							'default'   => __('Featured Title', 'fl-builder'),
						),
						'slider_description'       => array(
							'type'          => 'textarea',
							'label'         => 'Description',
							'default'   => __('Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit.', 'fl-builder'),
						),
					)
				),
			)
		),
		'thumbnav'      => array(
			'title'         => __('Thumbnail', 'fl-builder'),
			'sections'      => array(
				'info'       => array(
					'title'         => __('Thumbnail', 'fl-builder'),
					'fields'        => array(
						'slider_nav_image'       => array(
							'type'          => 'photo',
							'label'         => 'Thumb Image',
						),
						'slider_nav_label'       => array(
							'type'          => 'text',
							'label'         => 'Thumb Label',
							'default'   => __('Thumbnail Label', 'fl-builder'),
						),
					)
				),
			)
		),
		'buttons'      => array(
			'title'         => __('Buttons', 'fl-builder'),
			'sections'      => array(
				'info'       => array(
					'title'         => __('Buttons', 'fl-builder'),
					'fields'        => array(
						'slider_btn_1_label'       => array(
							'type'          => 'text',
							'label'         => 'Button 1 label',
							'default'   => __('GET STARTED', 'fl-builder'),
						),
						'slider_btn_1_link'       => array(
							'type'          => 'link',
							'label'         => 'Button 1 Link',
						),
						'slider_btn_1_target'       => array(
							'type'          => 'select',
							'label'         => 'Button 1 target',
							'options'       => array(
								'_self'    => __('Self', 'fl-builder'),
								'_blank'    => __('Blank', 'fl-builder'),
							),
						),
						'slider_btn_2_label'       => array(
							'type'          => 'text',
							'label'         => 'Button 2 label',
							'default'   => __('MORE INFO', 'fl-builder'),
						),
						'slider_btn_2_link'       => array(
							'type'          => 'link',
							'label'         => 'Button 2 Link',
						),
						'slider_btn_2_target'       => array(
							'type'          => 'select',
							'label'         => 'Button 2 target',
							'options'       => array(
								'_self'    => __('Self', 'fl-builder'),
								'_blank'    => __('Blank', 'fl-builder'),
							),
						),
					)
				),
			)
		),
		'setting'      => array(
			'title'         => __('Setting', 'fl-builder'),
			'sections'      => array(
				'info'       => array(
					'title'         => __('Setting', 'fl-builder'),
					'fields'        => array(
						'position'       => array(
							'type'          => 'select',
							'label'         => 'Text Position',
							'default'         => 'left',
							'options'       => array(
								'left'    => __('Left', 'fl-builder'),
								'right'    => __('Right', 'fl-builder'),
								'center'    => __('Center', 'fl-builder'),
							),
						),
						'slider_bg_color'       => array(
							'type'          => 'color',
							'label'         => 'Background Color',
							'show_reset'    => true,
						),
						'slider_title_color'       => array(
							'type'          => 'color',
							'label'         => 'Title Color',
							'show_reset'    => true,
						),
						'slider_text_color'       => array(
							'type'          => 'color',
							'label'         => 'Text Color',
							'show_reset'    => true,
						),
						'slider_thumbnail_label_color'       => array(
							'type'          => 'color',
							'label'         => 'Thumbnail Label Color',
							'show_reset'    => true,
							'help'    => __('Inherit by Title Color, you can change the color here.', 'fl-builder'),
						),
						'slider_description_width'       => array(
							'type'          => 'unit',
							'label'         => 'Description Width',
							'maxlength'     => '4',
							'size'          => '5',
							'description'   => 'px',
							'placeholder'   => '600',
						),
					)
				),
			)
		),
	)
));