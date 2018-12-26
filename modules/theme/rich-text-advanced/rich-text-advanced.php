<?php

/**
 * @class TextBlockModule
 */
class TextBlockModule extends FLBuilderModule {

	/** 
	 * @method __construct
	 */  
	public function __construct()
	{
		parent::__construct(array(
			'name'          	=> __('Text Editor', 'fl-builder'),
			'description'   	=> __('A WYSIWYG text editor.', 'fl-builder'),
			'category'      	=> __('Basic Modules', 'fl-builder'),
			'partial_refresh'	=> true
		));
	}
}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('TextBlockModule', array(
	'general'       => array( // Tab
		'title'         => __('General', 'fl-builder'), // Tab title
		'sections'      => array( // Tab Sections
			'general'       => array( // Section
				'title'         => '', // Section Title
				'fields'        => array( // Section Fields
					'text'          => array(
						'type'          => 'editor',
						'label'         => '',
						'rows'          => 13,
						'wpautop'		=> false,
						'preview'         => array(
							'type'             => 'text',
							'selector'         => '.rich-text-advanced'  
						)
					)
				)
			),
		)
	),
	'setting'       => array( // Tab
		'title'         => __('Setting', 'fl-builder'), // Tab title
		'sections'      => array( // Tab Sections
			'fonts'         => array(
				'title'         => '',
				'fields'        => array(
					'font_family'         => array(
						'type'          => 'font',
						'label'         => __('Font Family', 'fl-builder'),
						'default'       => array(
							'family'        => 'Default',
							'weight'        => 400
						),
						'preview'         => array(
							'type'            => 'font',
							'selector'      => '.rich-text-advanced *:not(i):not(h1):not(h2):not(h3):not(h4):not(h5):not(h6)',
						)
					),
					'font_weight'         => array(
						'type'          => 'select',
						'label'         => __('Default Font Weight', 'fl-builder'),
						'default' 		=> '',
						'options'       => array(
							''    	=> __('Default', 'fl-builder'),
							'100'    	=> __('100 Thin', 'fl-builder'),
							'200'    	=> __('200 Extra-Light', 'fl-builder'),
							'300'    	=> __('300 Light', 'fl-builder'),
							'400'    	=> __('400 Regular', 'fl-builder'),
							'500'    	=> __('500 Medium', 'fl-builder'),
							'600'    	=> __('600 Semi-Bold', 'fl-builder'),
							'700'    	=> __('700 Bold', 'fl-builder'),
							'800'    	=> __('800 Extra-Bold', 'fl-builder'),
							'900'    	=> __('900 Ultra-Bold', 'fl-builder'),
						),
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.rich-text-advanced *:not(i):not(h1):not(h2):not(h3):not(h4):not(h5):not(h6)',
							'property'      => 'font-weight',
						),
						'help'   		=> 'Its depend to the font family if the following font-weight supported.',
					),
					'font_size' => array(
						'type'          => 'unit',
						'label'         => __( 'Font Size', 'fl-builder' ),
						'default'       => '',
						'description'	=> 'em',
						'preview'         => array(
							'type'          => 'css',
							'selector'      => '.rich-text-advanced *:not(i):not(h1):not(h2):not(h3):not(h4):not(h5):not(h6)',
							'property'      => 'font-size',
							'unit'        	=> 'px',
						)
					),
					'font_lineheight' => array(
						'type'          => 'unit',
						'label'         => __( 'Font Line Height', 'fl-builder' ),
						'default'       => '',
						'description'	=> 'px',
						'placeholder'	=> '1.2',
						'preview'         => array(
							'type'          => 'css',
							'selector'      => '.rich-text-advanced *:not(i):not(h1):not(h2):not(h3):not(h4):not(h5):not(h6)',
							'property'      => 'line-height',
							'unit'        	=> 'em',
						)
					),
					'letter_spacing' => array(
						'type'          => 'unit',
						'label'         => __( 'Letter Spacing', 'fl-builder' ),
						'default'       => '',
						'description'	=> 'px',
						'placeholder'	=> '1.2',
						'show_reset'	=> true,
						'preview'         => array(
							'type'          => 'css',
							'selector'      => '.rich-text-advanced *:not(i):not(h1):not(h2):not(h3):not(h4):not(h5):not(h6)',
							'property'      => 'letter-spacing',
							'unit'        	=> 'px',
						)
					),
					'color' => array(
						'type'          => 'color',
						'label'         => __( 'Font Color', 'fl-builder' ),
						'default'       => '',
						'show_reset'	=> true,
						'preview'         => array(
							'type'          => 'css',
							'selector'      => '.rich-text-advanced *:not(i):not(h1):not(h2):not(h3):not(h4):not(h5):not(h6)',
							'property'      => 'color',
						)
					),
					'link_color' => array(
						'type'          => 'color',
						'label'         => __( 'Link Color', 'fl-builder' ),
						'default'       => '',
						'show_reset'	=> true,
						'preview'         => array(
							'type'          => 'css',
							'selector'      => '.rich-text-advanced *:not(i):not(h1):not(h2):not(h3):not(h4):not(h5):not(h6) a',
							'property'      => 'color',
						)
					),
					'link_hover_color' => array(
						'type'          => 'color',
						'label'         => __( 'Link Hover Color', 'fl-builder' ),
						'default'       => '',
						'show_reset'	=> true,
						'preview'         => array(
							'type'          => 'css',
							'selector'      => '.rich-text-advanced *:not(i):not(h1):not(h2):not(h3):not(h4):not(h5):not(h6) a:hover',
							'property'      => 'color',
						)
					),
				)
			),
			'heading'         => array(
				'title'         => 'Heading 1-6',
				'fields'        => array(
					'heading_font_family'         => array(
						'type'          => 'font',
						'label'         => __('Heading Font Family', 'fl-builder'),
						'default'       => array(
							'family'        => 'Default',
							'weight'        => 400
						),
						'preview'         => array(
							'type'            => 'font',
							'selector'      => '.rich-text-advanced h1, .rich-text-advanced h2, .rich-text-advanced h3, .rich-text-advanced h4, .rich-text-advanced h5, .rich-text-advanced h6',
						)
					),
					'heading_font_weight'         => array(
						'type'          => 'select',
						'label'         => __('Heading Font Weight', 'fl-builder'),
						'default' 		=> '',
						'options'       => array(
							''    	=> __('Default', 'fl-builder'),
							'100'    	=> __('100 Thin', 'fl-builder'),
							'200'    	=> __('200 Extra-Light', 'fl-builder'),
							'300'    	=> __('300 Light', 'fl-builder'),
							'400'    	=> __('400 Regular', 'fl-builder'),
							'500'    	=> __('500 Medium', 'fl-builder'),
							'600'    	=> __('600 Semi-Bold', 'fl-builder'),
							'700'    	=> __('700 Bold', 'fl-builder'),
							'800'    	=> __('800 Extra-Bold', 'fl-builder'),
							'900'    	=> __('900 Ultra-Bold', 'fl-builder'),
						),
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.rich-text-advanced h1, .rich-text-advanced h2, .rich-text-advanced h3, .rich-text-advanced h4, .rich-text-advanced h5, .rich-text-advanced h6',
							'property'      => 'font-weight',
						),
						'help'   		=> 'Its depend to the font family if the following font-weight supported.',
					),
					'heading_color' => array(
						'type'          => 'color',
						'label'         => __( 'Heading Color', 'fl-builder' ),
						'default'       => '',
						'show_reset'	=> true,
						'preview'         => array(
							'type'          => 'css',
							'selector'      => '.rich-text-advanced h1, .rich-text-advanced h2, .rich-text-advanced h3, .rich-text-advanced h4, .rich-text-advanced h5, .rich-text-advanced h6',
							'property'      => 'color',
						)
					),
					'heading_link_color' => array(
						'type'          => 'color',
						'label'         => __( 'Heading Link Color', 'fl-builder' ),
						'default'       => '',
						'show_reset'	=> true,
						'preview'         => array(
							'type'          => 'css',
							'selector'      => '.rich-text-advanced h1 a, .rich-text-advanced h2 a, .rich-text-advanced h3 a, .rich-text-advanced h4 a, .rich-text-advanced h5 a, .rich-text-advanced h6 a',
							'property'      => 'color',
						)
					),
					'heading_link_hover_color' => array(
						'type'          => 'color',
						'label'         => __( 'Heading Link Hover Color', 'fl-builder' ),
						'default'       => '',
						'show_reset'	=> true,
						'preview'         => array(
							'type'          => 'css',
							'selector'      => '.rich-text-advanced h1 a:hover, .rich-text-advanced h2 a:hover, .rich-text-advanced h3 a:hover, .rich-text-advanced h4 a:hover, .rich-text-advanced h5 a:hover, .rich-text-advanced h6 a:hover',
							'property'      => 'color',
						)
					),
				)
			),
			'heading_h1'         => array(
				'title'         => 'Heading 1',
				'fields'        => array(
					'font_family_h1'         => array(
						'type'          => 'font',
						'label'         => __('H1 Font Family', 'fl-builder'),
						'default'       => array(
							'family'        => 'Default',
						),
						'preview'         => array(
							'type'            => 'font',
							'selector'      => '.rich-text-advanced h1',
						)
					),
					'font_weight_h1'         => array(
						'type'          => 'select',
						'label'         => __('H1 Font Weight', 'fl-builder'),
						'default' 		=> '',
						'options'       => array(
							''    	=> __('Default', 'fl-builder'),
							'100'    	=> __('100 Thin', 'fl-builder'),
							'200'    	=> __('200 Extra-Light', 'fl-builder'),
							'300'    	=> __('300 Light', 'fl-builder'),
							'400'    	=> __('400 Regular', 'fl-builder'),
							'500'    	=> __('500 Medium', 'fl-builder'),
							'600'    	=> __('600 Semi-Bold', 'fl-builder'),
							'700'    	=> __('700 Bold', 'fl-builder'),
							'800'    	=> __('800 Extra-Bold', 'fl-builder'),
							'900'    	=> __('900 Ultra-Bold', 'fl-builder'),
						),
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.rich-text-advanced h1',
							'property'      => 'font-weight',
						),
						'help'   		=> 'Its depend to the font family if the following font-weight supported.',
					),
					'font_size_h1' => array(
						'type'          => 'unit',
						'label'         => __( 'H1 Font Size', 'fl-builder' ),
						'default'       => '',
						'description'	=> 'px',
						'preview'         => array(
							'type'          => 'css',
							'selector'      => '.rich-text-advanced h1',
							'property'      => 'font-size',
							'unit'        	=> 'px',
						)
					),
					'font_lineheight_h1' => array(
						'type'          => 'unit',
						'label'         => __( 'H1 Line Height', 'fl-builder' ),
						'default'       => '',
						'description'	=> 'em',
						'placeholder'	=> '1.2',
						'preview'         => array(
							'type'          => 'css',
							'selector'      => '.rich-text-advanced h1',
							'property'      => 'line-height',
							'unit'        	=> 'em',
						)
					),
					'letter_spacing_h1' => array(
						'type'          => 'unit',
						'label'         => __( 'Letter Spacing', 'fl-builder' ),
						'default'       => '',
						'description'	=> 'px',
						'placeholder'	=> '1.2',
						'show_reset'	=> true,
						'preview'         => array(
							'type'          => 'css',
							'selector'      => '.rich-text-advanced h1',
							'property'      => 'letter-spacing',
							'unit'        	=> 'px',
						)
					),
					'font_color_h1' => array(
						'type'          => 'color',
						'label'         => __( 'Heading Color', 'fl-builder' ),
						'default'       => '',
						'show_reset'	=> true,
						'preview'         => array(
							'type'          => 'css',
							'selector'      => '.rich-text-advanced h1',
							'property'      => 'color',
						)
					),
				)
			),
			'heading_h2'         => array(
				'title'         => 'Heading 2',
				'fields'        => array(
					'font_family_h2'         => array(
						'type'          => 'font',
						'label'         => __('H1 Font Family', 'fl-builder'),
						'default'       => array(
							'family'        => 'Default',
						),
						'preview'         => array(
							'type'            => 'font',
							'selector'      => '.rich-text-advanced h2',
						)
					),
					'font_weight_h2'         => array(
						'type'          => 'select',
						'label'         => __('H1 Font Weight', 'fl-builder'),
						'default' 		=> '',
						'options'       => array(
							''    	=> __('Default', 'fl-builder'),
							'100'    	=> __('100 Thin', 'fl-builder'),
							'200'    	=> __('200 Extra-Light', 'fl-builder'),
							'300'    	=> __('300 Light', 'fl-builder'),
							'400'    	=> __('400 Regular', 'fl-builder'),
							'500'    	=> __('500 Medium', 'fl-builder'),
							'600'    	=> __('600 Semi-Bold', 'fl-builder'),
							'700'    	=> __('700 Bold', 'fl-builder'),
							'800'    	=> __('800 Extra-Bold', 'fl-builder'),
							'900'    	=> __('900 Ultra-Bold', 'fl-builder'),
						),
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.rich-text-advanced h2',
							'property'      => 'font-weight',
						),
						'help'   		=> 'Its depend to the font family if the following font-weight supported.',
					),
					'font_size_h2' => array(
						'type'          => 'unit',
						'label'         => __( 'H1 Font Size', 'fl-builder' ),
						'default'       => '',
						'description'	=> 'px',
						'preview'         => array(
							'type'          => 'css',
							'selector'      => '.rich-text-advanced h2',
							'property'      => 'font-size',
							'unit'        	=> 'px',
						)
					),
					'font_lineheight_h2' => array(
						'type'          => 'unit',
						'label'         => __( 'H1 Line Height', 'fl-builder' ),
						'default'       => '',
						'description'	=> 'em',
						'placeholder'	=> '1.2',
						'preview'         => array(
							'type'          => 'css',
							'selector'      => '.rich-text-advanced h2',
							'property'      => 'line-height',
							'unit'        	=> 'em',
						)
					),
					'letter_spacing_h2' => array(
						'type'          => 'unit',
						'label'         => __( 'Letter Spacing', 'fl-builder' ),
						'default'       => '',
						'description'	=> 'px',
						'placeholder'	=> '1.2',
						'show_reset'	=> true,
						'preview'         => array(
							'type'          => 'css',
							'selector'      => '.rich-text-advanced h2',
							'property'      => 'letter-spacing',
							'unit'        	=> 'px',
						)
					),
					'font_color_h2' => array(
						'type'          => 'color',
						'label'         => __( 'Heading Color', 'fl-builder' ),
						'default'       => '',
						'show_reset'	=> true,
						'preview'         => array(
							'type'          => 'css',
							'selector'      => '.rich-text-advanced h2',
							'property'      => 'color',
						)
					),
				)
			),
			'heading_h3'         => array(
				'title'         => 'Heading 3',
				'fields'        => array(
					'font_family_h3'         => array(
						'type'          => 'font',
						'label'         => __('H1 Font Family', 'fl-builder'),
						'default'       => array(
							'family'        => 'Default',
						),
						'preview'         => array(
							'type'            => 'font',
							'selector'      => '.rich-text-advanced h3',
						)
					),
					'font_weight_h3'         => array(
						'type'          => 'select',
						'label'         => __('H1 Font Weight', 'fl-builder'),
						'default' 		=> '',
						'options'       => array(
							''    	=> __('Default', 'fl-builder'),
							'100'    	=> __('100 Thin', 'fl-builder'),
							'200'    	=> __('200 Extra-Light', 'fl-builder'),
							'300'    	=> __('300 Light', 'fl-builder'),
							'400'    	=> __('400 Regular', 'fl-builder'),
							'500'    	=> __('500 Medium', 'fl-builder'),
							'600'    	=> __('600 Semi-Bold', 'fl-builder'),
							'700'    	=> __('700 Bold', 'fl-builder'),
							'800'    	=> __('800 Extra-Bold', 'fl-builder'),
							'900'    	=> __('900 Ultra-Bold', 'fl-builder'),
						),
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.rich-text-advanced h3',
							'property'      => 'font-weight',
						),
						'help'   		=> 'Its depend to the font family if the following font-weight supported.',
					),
					'font_size_h3' => array(
						'type'          => 'unit',
						'label'         => __( 'H1 Font Size', 'fl-builder' ),
						'default'       => '',
						'description'	=> 'px',
						'preview'         => array(
							'type'          => 'css',
							'selector'      => '.rich-text-advanced h3',
							'property'      => 'font-size',
							'unit'        	=> 'px',
						)
					),
					'font_lineheight_h3' => array(
						'type'          => 'unit',
						'label'         => __( 'H1 Line Height', 'fl-builder' ),
						'default'       => '',
						'description'	=> 'em',
						'placeholder'	=> '1.2',
						'preview'         => array(
							'type'          => 'css',
							'selector'      => '.rich-text-advanced h3',
							'property'      => 'line-height',
							'unit'        	=> 'em',
						)
					),
					'letter_spacing_h3' => array(
						'type'          => 'unit',
						'label'         => __( 'Letter Spacing', 'fl-builder' ),
						'default'       => '',
						'description'	=> 'px',
						'placeholder'	=> '1.2',
						'show_reset'	=> true,
						'preview'         => array(
							'type'          => 'css',
							'selector'      => '.rich-text-advanced h3',
							'property'      => 'letter-spacing',
							'unit'        	=> 'px',
						)
					),
					'font_color_h3' => array(
						'type'          => 'color',
						'label'         => __( 'Heading Color', 'fl-builder' ),
						'default'       => '',
						'show_reset'	=> true,
						'preview'         => array(
							'type'          => 'css',
							'selector'      => '.rich-text-advanced h3',
							'property'      => 'color',
						)
					),
				)
			),
			'heading_h4'         => array(
				'title'         => 'Heading 4',
				'fields'        => array(
					'font_family_h4'         => array(
						'type'          => 'font',
						'label'         => __('H1 Font Family', 'fl-builder'),
						'default'       => array(
							'family'        => 'Default',
						),
						'preview'         => array(
							'type'            => 'font',
							'selector'      => '.rich-text-advanced h4',
						)
					),
					'font_weight_h4'         => array(
						'type'          => 'select',
						'label'         => __('H1 Font Weight', 'fl-builder'),
						'default' 		=> '',
						'options'       => array(
							''    	=> __('Default', 'fl-builder'),
							'100'    	=> __('100 Thin', 'fl-builder'),
							'200'    	=> __('200 Extra-Light', 'fl-builder'),
							'300'    	=> __('300 Light', 'fl-builder'),
							'400'    	=> __('400 Regular', 'fl-builder'),
							'500'    	=> __('500 Medium', 'fl-builder'),
							'600'    	=> __('600 Semi-Bold', 'fl-builder'),
							'700'    	=> __('700 Bold', 'fl-builder'),
							'800'    	=> __('800 Extra-Bold', 'fl-builder'),
							'900'    	=> __('900 Ultra-Bold', 'fl-builder'),
						),
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.rich-text-advanced h4',
							'property'      => 'font-weight',
						),
						'help'   		=> 'Its depend to the font family if the following font-weight supported.',
					),
					'font_size_h4' => array(
						'type'          => 'unit',
						'label'         => __( 'H1 Font Size', 'fl-builder' ),
						'default'       => '',
						'description'	=> 'px',
						'preview'         => array(
							'type'          => 'css',
							'selector'      => '.rich-text-advanced h4',
							'property'      => 'font-size',
							'unit'        	=> 'px',
						)
					),
					'font_lineheight_h4' => array(
						'type'          => 'unit',
						'label'         => __( 'H1 Line Height', 'fl-builder' ),
						'default'       => '',
						'description'	=> 'em',
						'placeholder'	=> '1.2',
						'preview'         => array(
							'type'          => 'css',
							'selector'      => '.rich-text-advanced h4',
							'property'      => 'line-height',
							'unit'        	=> 'em',
						)
					),
					'letter_spacing_h4' => array(
						'type'          => 'unit',
						'label'         => __( 'Letter Spacing', 'fl-builder' ),
						'default'       => '',
						'description'	=> 'px',
						'placeholder'	=> '1.2',
						'show_reset'	=> true,
						'preview'         => array(
							'type'          => 'css',
							'selector'      => '.rich-text-advanced h4',
							'property'      => 'letter-spacing',
							'unit'        	=> 'px',
						)
					),
					'font_color_h4' => array(
						'type'          => 'color',
						'label'         => __( 'Heading Color', 'fl-builder' ),
						'default'       => '',
						'show_reset'	=> true,
						'preview'         => array(
							'type'          => 'css',
							'selector'      => '.rich-text-advanced h4',
							'property'      => 'color',
						)
					),
				)
			),
			'heading_h5'         => array(
				'title'         => 'Heading 5',
				'fields'        => array(
					'font_family_h5'         => array(
						'type'          => 'font',
						'label'         => __('H1 Font Family', 'fl-builder'),
						'default'       => array(
							'family'        => 'Default',
						),
						'preview'         => array(
							'type'            => 'font',
							'selector'      => '.rich-text-advanced h5',
						)
					),
					'font_weight_h5'         => array(
						'type'          => 'select',
						'label'         => __('H1 Font Weight', 'fl-builder'),
						'default' 		=> '',
						'options'       => array(
							''    	=> __('Default', 'fl-builder'),
							'100'    	=> __('100 Thin', 'fl-builder'),
							'200'    	=> __('200 Extra-Light', 'fl-builder'),
							'300'    	=> __('300 Light', 'fl-builder'),
							'400'    	=> __('400 Regular', 'fl-builder'),
							'500'    	=> __('500 Medium', 'fl-builder'),
							'600'    	=> __('600 Semi-Bold', 'fl-builder'),
							'700'    	=> __('700 Bold', 'fl-builder'),
							'800'    	=> __('800 Extra-Bold', 'fl-builder'),
							'900'    	=> __('900 Ultra-Bold', 'fl-builder'),
						),
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.rich-text-advanced h5',
							'property'      => 'font-weight',
						),
						'help'   		=> 'Its depend to the font family if the following font-weight supported.',
					),
					'font_size_h5' => array(
						'type'          => 'unit',
						'label'         => __( 'H1 Font Size', 'fl-builder' ),
						'default'       => '',
						'description'	=> 'px',
						'preview'         => array(
							'type'          => 'css',
							'selector'      => '.rich-text-advanced h5',
							'property'      => 'font-size',
							'unit'        	=> 'px',
						)
					),
					'font_lineheight_h5' => array(
						'type'          => 'unit',
						'label'         => __( 'H1 Line Height', 'fl-builder' ),
						'default'       => '',
						'description'	=> 'em',
						'placeholder'	=> '1.2',
						'preview'         => array(
							'type'          => 'css',
							'selector'      => '.rich-text-advanced h5',
							'property'      => 'line-height',
							'unit'        	=> 'em',
						)
					),
					'letter_spacing_h5' => array(
						'type'          => 'unit',
						'label'         => __( 'Letter Spacing', 'fl-builder' ),
						'default'       => '',
						'description'	=> 'px',
						'placeholder'	=> '1.2',
						'show_reset'	=> true,
						'preview'         => array(
							'type'          => 'css',
							'selector'      => '.rich-text-advanced h5',
							'property'      => 'letter-spacing',
							'unit'        	=> 'px',
						)
					),
					'font_color_h5' => array(
						'type'          => 'color',
						'label'         => __( 'Heading Color', 'fl-builder' ),
						'default'       => '',
						'show_reset'	=> true,
						'preview'         => array(
							'type'          => 'css',
							'selector'      => '.rich-text-advanced h5',
							'property'      => 'color',
						)
					),
				)
			),
			'heading_h6'         => array(
				'title'         => 'Heading 6',
				'fields'        => array(
					'font_family_h6'         => array(
						'type'          => 'font',
						'label'         => __('H1 Font Family', 'fl-builder'),
						'default'       => array(
							'family'        => 'Default',
						),
						'preview'         => array(
							'type'            => 'font',
							'selector'      => '.rich-text-advanced h6',
						)
					),
					'font_weight_h6'         => array(
						'type'          => 'select',
						'label'         => __('H1 Font Weight', 'fl-builder'),
						'default' 		=> '',
						'options'       => array(
							''    	=> __('Default', 'fl-builder'),
							'100'    	=> __('100 Thin', 'fl-builder'),
							'200'    	=> __('200 Extra-Light', 'fl-builder'),
							'300'    	=> __('300 Light', 'fl-builder'),
							'400'    	=> __('400 Regular', 'fl-builder'),
							'500'    	=> __('500 Medium', 'fl-builder'),
							'600'    	=> __('600 Semi-Bold', 'fl-builder'),
							'700'    	=> __('700 Bold', 'fl-builder'),
							'800'    	=> __('800 Extra-Bold', 'fl-builder'),
							'900'    	=> __('900 Ultra-Bold', 'fl-builder'),
						),
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.rich-text-advanced h6',
							'property'      => 'font-weight',
						),
						'help'   		=> 'Its depend to the font family if the following font-weight supported.',
					),
					'font_size_h6' => array(
						'type'          => 'unit',
						'label'         => __( 'H1 Font Size', 'fl-builder' ),
						'default'       => '',
						'description'	=> 'px',
						'preview'         => array(
							'type'          => 'css',
							'selector'      => '.rich-text-advanced h6',
							'property'      => 'font-size',
							'unit'        	=> 'px',
						)
					),
					'font_lineheight_h6' => array(
						'type'          => 'unit',
						'label'         => __( 'H1 Line Height', 'fl-builder' ),
						'default'       => '',
						'description'	=> 'em',
						'placeholder'	=> '1.2',
						'preview'         => array(
							'type'          => 'css',
							'selector'      => '.rich-text-advanced h6',
							'property'      => 'line-height',
							'unit'        	=> 'em',
						)
					),
					'letter_spacing_h6' => array(
						'type'          => 'unit',
						'label'         => __( 'Letter Spacing', 'fl-builder' ),
						'default'       => '',
						'description'	=> 'px',
						'placeholder'	=> '1.2',
						'show_reset'	=> true,
						'preview'         => array(
							'type'          => 'css',
							'selector'      => '.rich-text-advanced h6',
							'property'      => 'letter-spacing',
							'unit'        	=> 'px',
						)
					),
					'font_color_h6' => array(
						'type'          => 'color',
						'label'         => __( 'Heading Color', 'fl-builder' ),
						'default'       => '',
						'show_reset'	=> true,
						'preview'         => array(
							'type'          => 'css',
							'selector'      => '.rich-text-advanced h6',
							'property'      => 'color',
						)
					),
				)
			),
			'mobile'         => array(
				'title'         => 'Mobile',
				'fields'        => array(
					'mobile_target_centered' => array(
						'type'          => 'select',
						'label'         => __( 'Align Centered on Mobile', 'fl-builder' ),
						'default'       => '',
						'options'       => array(
							''		=>  'No',
							' centered-mobile'		=>  'Yes',
						),
					),
				)
			),
		)
	)
));