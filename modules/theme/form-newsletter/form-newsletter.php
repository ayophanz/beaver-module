<?php
/**
 * @class formNewsletterModules
 */
class formNewsletterModules extends FLBuilderModule {

	/** 
	 * @method __construct
	 */  
	public function __construct()
	{
		global $foldercategory;
		parent::__construct(array(
			'name'          	=> __('Form Newsletter', 'fl-builder'),
			'description'      	=> __('Newsletter', 'fl-builder'),
			'category'      	=> __($foldercategory, 'fl-builder'),
			'partial_refresh'	=> true
		));
	}
	/**
	 * @method get_classname
	 */
	public function get_classname()
	{
		$classname = 'form-newsletter';
		return $classname;
	}
}
/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('formNewsletterModules', array(
	'general'         => array(
		'title'         => __('Newsletter', 'fl-builder'),
		'sections'      => array(
			'general'       => array(
				'title'         => '',
				'fields'        => array(
					'title'         => array(
						'type'          => 'text',
						'label'          => 'Title',
					),
					'desc'         => array(
						'type'          => 'textarea',
						'label'          => __('Description', 'fl-builder'),
					),
					'content'         => array(
						'type'          => 'text',
						'label'          => __('Note', 'fl-builder'),
						'default'          => '',
						'placeholder'          => '',
						'description'          => 'eg: <strong>[wysija_form id="1"]</strong> get shortcode in each <a href="'.esc_url( home_url( '/' ) ).'wp-admin/admin.php?page=wysija_config#tab-forms" target="_blank">form</a>',
						'help'          => 'Install Newsletter plugin eg: "MailPoet Newsletters" then add Shortcode',
					),
				)
			),
		)
	),
	'setting'         => array(
		'title'         => __('Setting', 'fl-builder'),
		'sections'      => array(
			'setting_content'       => array(
				'title'         => 'Content',
				'fields'        => array(
					'width'         => array(
						'type'          => 'unit',
						'label'         => __('Max Width', 'fl-builder'),
						'default'       => '',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px',
						'placeholder'   => '600',
					),
					'color'         => array(
						'type'          => 'color',
						'label'         => __('Text Color', 'fl-builder'),
						'show_reset' 	=> true,
					),
				)
			),
			'setting_title'       => array(
				'title'         => 'Title',
				'fields'        => array(
					'title_tag'         => array(
						'type'          => 'select',
						'label'          => __('Title Tag', 'fl-builder'),
						'default'       => 'h3',
						'options'       => array(
							'h1'            =>  'h1',
							'h2'            =>  'h2',
							'h3'            =>  'h3',
							'h4'            =>  'h4',
							'h5'            =>  'h5',
							'h6'            =>  'h6',
						)
					),
					'title_color'         => array(
						'type'          => 'color',
						'label'         => __('Title Color', 'fl-builder'),
						'show_reset' 	=> true,
					),
					'title_size'         => array(
						'type'          => 'unit',
						'label'         => __('Title Size', 'fl-builder'),
						'default'       => '',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px',
						'placeholder'   => '40',
						'responsive'  => array(
							'placeholder' => array(
								'default'    => ( isset( $global_settings->title_size ) ) ? $global_settings->title_size : '40',
								'medium'     => ( isset( $global_settings->title_size_medium ) ) ? $global_settings->title_size_medium : '',
								'responsive' => ( isset( $global_settings->title_size_responsive ) ) ? $global_settings->title_size_responsive : '',
							)
						),
					),
					'title_weight'         => array(
						'type'          => 'select',
						'label'         => __('Title Weight', 'fl-builder'),
						'default' 		=> '',
						'options'       => array(
							''    	=> __('Default', 'fl-builder'),
							'100'    	=> __('100 Thin', 'fl-builder'),
							'200'    	=> __('200 Extra-Light', 'fl-builder'),
							'300'    	=> __('300 Light', 'fl-builder'),
							'400'    	=> __('400 Normal', 'fl-builder'),
							'500'    	=> __('500 Medium', 'fl-builder'),
							'600'    	=> __('600 Semi-Bold', 'fl-builder'),
							'700'    	=> __('700 Bold', 'fl-builder'),
							'800'    	=> __('800 Extra-Bold', 'fl-builder'),
							'900'    	=> __('900 Ultra-Bold', 'fl-builder'),
						),
						'help'   		=> 'Its depend to the font family if the following font-weight supported.',
					),
					'title_spacing'         => array(
						'type'          => 'unit',
						'label'         => __('Title Spacing', 'fl-builder'),
						'default'       => '',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px',
						'placeholder'   => '20',
					),
				)
			),
			'setting_desc'       => array(
				'title'         => 'Desc',
				'fields'        => array(
					'desc_color'         => array(
						'type'          => 'color',
						'label'         => __('Desc Color', 'fl-builder'),
						'show_reset' 	=> true,
					),
					'desc_size'         => array(
						'type'          => 'unit',
						'label'         => __('Desc Size', 'fl-builder'),
						'default'       => '',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px',
						'placeholder'   => '16',
						'responsive'  => array(
							'placeholder' => array(
								'default'    => ( isset( $global_settings->desc_size ) ) ? $global_settings->desc_size : '16',
								'medium'     => ( isset( $global_settings->desc_size_medium ) ) ? $global_settings->desc_size_medium : '',
								'responsive' => ( isset( $global_settings->desc_size_responsive ) ) ? $global_settings->desc_size_responsive : '',
							)
						),
					),
					'desc_weight'         => array(
						'type'          => 'select',
						'label'         => __('Desc Weight', 'fl-builder'),
						'default' 		=> '',
						'options'       => array(
							''    	=> __('Default', 'fl-builder'),
							'100'    	=> __('100 Thin', 'fl-builder'),
							'200'    	=> __('200 Extra-Light', 'fl-builder'),
							'300'    	=> __('300 Light', 'fl-builder'),
							'400'    	=> __('400 Normal', 'fl-builder'),
							'500'    	=> __('500 Medium', 'fl-builder'),
							'600'    	=> __('600 Semi-Bold', 'fl-builder'),
							'700'    	=> __('700 Bold', 'fl-builder'),
							'800'    	=> __('800 Extra-Bold', 'fl-builder'),
							'900'    	=> __('900 Ultra-Bold', 'fl-builder'),
						),
						'help'   		=> 'Its depend to the font family if the following font-weight supported.',
					),
					'desc_spacing'         => array(
						'type'          => 'unit',
						'label'         => __('Desc Spacing', 'fl-builder'),
						'default'       => '',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px',
						'placeholder'   => '20',
					),
				)
			),
			'setting_form'       => array(
				'title'         => 'Form',
				'fields'        => array(
					'input_color'         => array(
						'type'          => 'color',
						'label'         => __('Input Color', 'fl-builder'),
						'show_reset' 	=> true,
					),
					'input_bg_color'         => array(
						'type'          => 'color',
						'label'         => __('Input Bg Color', 'fl-builder'),
						'show_reset' 	=> true,
					),
					'button_color'         => array(
						'type'          => 'color',
						'label'         => __('Button Color', 'fl-builder'),
						'show_reset' 	=> true,
					),
					'button_bg_color'         => array(
						'type'          => 'color',
						'label'         => __('Button Bg Color', 'fl-builder'),
						'show_reset' 	=> true,
					),
				)
			),
		)
	),
));