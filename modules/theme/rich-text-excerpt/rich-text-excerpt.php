<?php

/**
 * @class RichTextExcerptModule
 */
class RichTextExcerptModule extends FLBuilderModule {

	/** 
	 * @method __construct
	 */  
	public function __construct()
	{
		parent::__construct(array(
			'name'          	=> __('Text Editor - Excerpt', 'fl-builder'),
			'description'   	=> __('A WYSIWYG text editor.', 'fl-builder'),
			'category'      	=> __('Basic Modules', 'fl-builder'),
			'partial_refresh'	=> true
		));
	}
}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('RichTextExcerptModule', array(
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
					),
					'limit'          => array(
						'type'          => 'unit',
						'label'         => 'Limit',
						'placeholder'         => '200',
					),
					'readmore'          => array(
						'type'          => 'text',
						'label'         => 'Read More Label',
						'preview'         => array(
							'type'             => 'text',
							'selector'         => '.fl-rich-text-readmore'  
						)
					),
					'readless'          => array(
						'type'          => 'text',
						'label'         => 'Read Less Label',
					),
				)
			)
		)
	)
));