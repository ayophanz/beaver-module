<?php

/**
 * @class FAQModules
 */
class FAQModules extends FLBuilderModule {

	/** 
	 * @method __construct
	 */  
	public function __construct()
	{
		global $foldercategory;
		parent::__construct(array(
			'name'          	=> __('FAQs', 'fl-builder'),
			'description'      	=> __('Frequenty Ask Question', 'fl-builder'),
			'category'      	=> __($foldercategory, 'fl-builder'),
			'partial_refresh'	=> true
		));
	}
	/**
	 * @method get_classname
	 */
	public function get_classname()
	{
		$classname = 'faq';
		return $classname;
	}
}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('FAQModules', array(
	'faq'         => array(
		'title'         => __('FAQ', 'fl-builder'),
		'sections'      => array(
			'general'       => array(
				'title'         => '',
				'fields'        => array(
					'items'         => array(
						'type'          => 'form',
						'label'         => __('Items', 'fl-builder'),
						'form'          => 'faq_form', // ID from registered form below
						'preview_text'  => 'faq_title', // Name of a field to use for the preview text
						'multiple'      => true
					),
				)
			)
		)
	),
	'settings'         => array(
		'title'         => __('Settings', 'fl-builder'),
		'sections'      => array(
			'general'       => array(
				'title'         => '',
				'fields'        => array(
					'active_collapse'         => array(
						'type'          => 'unit',
						'label'         => __('Select Active Collapse ', 'fl-builder'),
						'default'         => '1',
					),
					'auto_collapse'         => array(
						'type'          => 'select',
						'label'         => __('Auto Collapse', 'fl-builder'),
						'options'       => array(
							'yes'    => __('Yes', 'fl-builder'),
							'no'      => __('No', 'fl-builder'),
						),
					),
					'icon'         => array(
						'type'          => 'icon',
						'label'         => __('Change Icon', 'fl-builder'),
						'default'         => 'fa fa-angle-up',
						'show_remove'   => true
					),
				)
			),
			'title'       => array(
				'title'         => 'Title Text',
				'fields'        => array(
					'title_tag'        => array(
						'type'          => 'select',
						'label'         => __('Title Tag', 'fl-builder'),
						'default'       => 'h3',
						'options'       => array(
							'h1'      => __('H1', 'fl-builder'),
							'h2'      => __('H2', 'fl-builder'),
							'h3'      => __('H3', 'fl-builder'),
							'h4'      => __('H4', 'fl-builder'),
							'h5'      => __('H5', 'fl-builder'),
							'h6'      => __('H6', 'fl-builder'),
							'span'      => __('SPAN', 'fl-builder'),
						),
					),
					'title_size'         => array(
						'type'          => 'unit',
						'label'         => __('Title Font Size', 'fl-builder'),
						'default'         => '',
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.faq-item .faq-title',
							'property'      => 'font-size',
							'unit'	        => 'px',
						)
					),
				)
			),
			'color'       => array(
				'title'         => 'Color',
				'fields'        => array(
					'title_color'         => array(
						'type'          => 'color',
						'label'         => __('Title Color', 'fl-builder'),
						'show_reset'         => true,
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.faq-item:not(.active) .faq-title',
							'property'      => 'color',
						)
					),
					'title_color_icon'         => array(
						'type'          => 'color',
						'label'         => __('Title Icon Color', 'fl-builder'),
						'show_reset'         => true,
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.faq-item:not(.active) .faq-title i',
							'property'      => 'color',
						)
					),
					'title_active_color'         => array(
						'type'          => 'color',
						'label'         => __('Title Active Color', 'fl-builder'),
						'show_reset'         => true,
						'preview'       => array(
							'type'          => 'css',
							'rules'           => array(
								array(
									'selector'      => '.faq-item.active .faq-title',
									'property'      => 'color',
								),
								array(
									'selector'      => '.faq-item.active .faq-title',
									'property'      => 'border-left-color',
								),    
							)
						)
					),
					'title_active_color_icon'         => array(
						'type'          => 'color',
						'label'         => __('Title Active Icon Color', 'fl-builder'),
						'show_reset'         => true,
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.faq-item.active .faq-title i',
							'property'      => 'color',
						)
					),
					'bar_color_bg'         => array(
						'type'          => 'color',
						'label'         => __('Bar Bg Color', 'fl-builder'),
						'show_reset'         => true,
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.faq-item:not(.active) .faq-title',
							'property'      => 'background-color',
						)
					),
					'bar_color_border'         => array(
						'type'          => 'color',
						'label'         => __('Bar Border Color', 'fl-builder'),
						'show_reset'         => true,
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.faq-item:not(.active) .faq-title',
							'property'      => 'border-color',
						)
					),
					'bar_color_bg_active'         => array(
						'type'          => 'color',
						'label'         => __('Bar Active Bg Color', 'fl-builder'),
						'show_reset'         => true,
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.faq-item.active .faq-title',
							'property'      => 'background-color',
						)
					),
					'bar_color_border_active'         => array(
						'type'          => 'color',
						'label'         => __('Bar Active Border Color', 'fl-builder'),
						'show_reset'         => true,
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.faq-item.active .faq-title',
							'property'      => 'border-color',
						)
					),
					'desc_color_bg'         => array(
						'type'          => 'color',
						'label'         => __('Description Bg Color', 'fl-builder'),
						'show_reset'         => true,
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.faq-desc',
							'property'      => 'background-color',
						)
					),
					'desc_color'         => array(
						'type'          => 'color',
						'label'         => __('Description Color', 'fl-builder'),
						'show_reset'         => true,
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.faq-desc',
							'property'      => 'color',
						)
					),
				)
			),
		)
	),
));
/**
 * Register a settings form to use in the "form" field type above.
 */
FLBuilder::register_settings_form('faq_form', array(
	'title' => __('Add Item', 'fl-builder'),
	'tabs'  => array(
		'general'      => array(
			'title'         => __('FAQ Info', 'fl-builder'),
			'sections'      => array(
				'info'       => array(
					'title'         => __('FAQ Info', 'fl-builder'),
					'fields'        => array(
						'faq_title'       => array(
							'type'          => 'text',
							'label'         => 'Title',
							'default'   => __('Title', 'fl-builder'),
						),
						'faq_text'       => array(
							'type'          => 'editor',
							'label'         => '',
							'wpautop'		=> false
						),
					)
				),
			)
		)
	)
));