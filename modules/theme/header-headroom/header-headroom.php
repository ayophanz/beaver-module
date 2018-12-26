<?php
/**
 * @class HeaderHeadroom
 */
class HeaderHeadroom extends FLBuilderModule {
	/** 
	 * @method __construct
	 */  
	public function __construct()
	{
		global $foldercategory;
		parent::__construct(array(
			'name'          	=> __('Header Headroom', 'fl-builder'),
			'description'      	=> __('New Header', 'fl-builder'),
			'category'      	=> __($foldercategory, 'fl-builder'),
			'partial_refresh'	=> true
		));
		$this->add_js( 'headroom', $this->url . 'js/headroom.min.js', array(), '', true );
		$this->add_css('button-css');
	}
	/**
	 * @method get_classname
	 */
	public function get_classname()
	{
		$classname = 'header-headroom';
		return $classname;
	}
}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('HeaderHeadroom', array(
	'general'         => array(
		'title'         => __('Slides', 'fl-builder'),
		'sections'      => array(
			'scroll'       => array(
				'title'         => '',
				'fields'        => array(
					'headroom_tolerance'    => array(
						'type'          => 'unit',
						'label'         => __('Scroll Tolerance/Activated', 'fl-builder'),
						'default'       => '',
						'maxlength'     => '4',
						'size'          => '5',
						'placeholder'   => '5'
					),
					'headroom_offset'    => array(
						'type'          => 'unit',
						'label'         => __('Scroll Down Offset', 'fl-builder'),
						'default'       => '',
						'maxlength'     => '4',
						'size'          => '5',
						'placeholder'   => '100'
					),
					'headroom_animation'           => array(
						'type'          => 'select',
						'label'         => __( 'Select Animation', 'fl-builder' ),
						'default'       => 'slide',
						'options'       => array(
							'slide'	=>  'Slide',
							'swing'		=>  'Swing',
							'flip'		=>  'Flip',
							'bounce'		=>  'Bounce',
						)
					),
				)
			),
			'content'       => array(
				'title'         => 'Content',
				'fields'        => array(
					'logo'         => array(
						'type'          => 'photo',
						'label'         => 'Logo',
					),
				)
			),
			'bg'       => array(
				'title'         => 'Background',
				'fields'        => array(
					'bg_color'         => array(
						'type'          => 'color',
						'label'         => 'Background Color',
						'show_reset' 	=> 'true',
					),
					'bg_color_opacity'    => array(
						'type'          => 'text',
						'label'         => __('Background Opacity', 'fl-builder'),
						'default'       => '100',
						'description'   => '%',
						'maxlength'     => '3',
						'size'          => '4',
						'placeholder'   => '0'
					),
					'border_color'         => array(
						'type'          => 'color',
						'label'         => 'Border Bottom Color',
						'show_reset' 	=> 'true',
					),
					'border_color_opacity'    => array(
						'type'          => 'text',
						'label'         => __('Border Bottom Opacity', 'fl-builder'),
						'default'       => '100',
						'description'   => '%',
						'maxlength'     => '3',
						'size'          => '4',
						'placeholder'   => '0'
					),
					'slide_down_bg'         => array(
						'type'          => 'color',
						'label'         => 'Scroll Up Background Color',
						'show_reset' 	=> 'true',
					),
					'slide_down_bg_opacity'    => array(
						'type'          => 'text',
						'label'         => __('Scroll Up Background Opacity', 'fl-builder'),
						'default'       => '100',
						'description'   => '%',
						'maxlength'     => '3',
						'size'          => '4',
						'placeholder'   => '0'
					),
				)
			),
			'text'       => array(
				'title'         => 'Text Color',
				'fields'        => array(
					'text_color'         => array(
						'type'          => 'color',
						'label'         => 'Menu Color',
						'show_reset' 	=> 'true',
					),
					'text_color_hover'         => array(
						'type'          => 'color',
						'label'         => 'Menu Color Hover',
						'show_reset' 	=> 'true',
					),
				)
			),
			'dropdown'       => array(
				'title'         => 'Dropdown Color',
				'fields'        => array(
					'dropdown_color'         => array(
						'type'          => 'color',
						'label'         => 'Text/Title Color',
						'show_reset' 	=> 'true',
					),
					'dropdown_link_color'         => array(
						'type'          => 'color',
						'label'         => 'Link Color',
						'show_reset' 	=> 'true',
					),
					'dropdown_link_color_hover'         => array(
						'type'          => 'color',
						'label'         => 'Link Color Hover',
						'show_reset' 	=> 'true',
					),
					'dropdown_background'         => array(
						'type'          => 'color',
						'label'         => 'Background',
						'show_reset' 	=> 'true',
					),
				)
			),
		)
	),
	'button'         => array(
		'title'         => __('Button', 'fl-builder'),
		'sections'      => array(
			'scroll'       => array(
				'title'         => '',
				'fields'        => array(
					'headroom_button_text'           => array(
						'type'          => 'text',
						'label'         => __( 'Button Text', 'fl-builder' ),
						'default'       => 'GET STARTED',
						'help'       => __('Leave this blank, if you want to remove button', 'fl-builder'),
					),
					'headroom_button_link'           => array(
						'type'          => 'link',
						'label'         => __( 'Button Link', 'fl-builder' ),
						'default'       => '#',
					),
				)
			),
		)
	),
));