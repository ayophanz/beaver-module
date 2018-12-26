<?php
/**
 * @class headerStickyModule
 */
class headerStickyModule extends FLBuilderModule {
	/** 
	 * @method __construct
	 */  
	public function __construct()
	{
		global $foldercategory;
		parent::__construct(array(
			'name'          	=> __('Header Sticky', 'fl-builder'),
			'category'      	=> __($foldercategory, 'fl-builder'),
			'description'      	=> __('New Header', 'fl-builder'),
			'partial_refresh'	=> true
		));
		$this->add_css('button-css');
	}
	/**
	 * @method get_classname
	 */
	public function get_classname()
	{
		$classname = 'header-sticky';
		return $classname;
	}
}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('headerStickyModule', array(
	'general'         => array(
		'title'         => __('Slides', 'fl-builder'),
		'sections'      => array(
			'general'       => array(
				'title'         => '',
				'fields'        => array(
					'logo'         => array(
						'type'          => 'photo',
						'label'         => 'Logo',
					),
					'logo_scroll'         => array(
						'type'          => 'photo',
						'label'         => 'Logo Scroll',
						'show_remove'	=> true,
					),
					'bg_color_scroll'         => array(
						'type'          => 'color',
						'label'         => 'background Scroll Color',
						'show_reset' 	=> true,
					),
					'bg_color_scroll_opacity'    => array(
						'type'          => 'text',
						'label'         => __('Background Scroll Opacity', 'fl-builder'),
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
					'text_color_scroll'         => array(
						'type'          => 'color',
						'label'         => 'Menu Scroll Color',
						'show_reset' 	=> 'true',
					),
					'text_color_scroll_hover'         => array(
						'type'          => 'color',
						'label'         => 'Menu Scroll Color Hover',
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
					'sticky_button_text'           => array(
						'type'          => 'text',
						'label'         => __( 'Button Text', 'fl-builder' ),
						'default'       => 'GET STARTED',
						'help'       => __('Leave this blank, if you want to remove button', 'fl-builder'),
					),
					'sticky_button_link'           => array(
						'type'          => 'link',
						'label'         => __( 'Button Link', 'fl-builder' ),
						'default'       => '#',
					),
				)
			),
		)
	),
));