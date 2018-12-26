<?php

/**
 * @class ctaModule
 */
class ctaModule extends FLBuilderModule {

	/**
	 * @method __construct
	 */
	public function __construct()
	{
		global $foldercategory;
		parent::__construct(array(
			'name'          	=> __('CTA', 'fl-builder'),
			'description'   	=> __('Call to Action.', 'fl-builder'),
			'category'      	=> __($foldercategory, 'fl-builder'),
			'partial_refresh'	=> true
		));
		$this->add_css('button-css');
	}

	/**
	 * @method get_classname
	 */
	public function get_classname()
	{
		$classname = 'cta '.$this->settings->content_align.' '.$this->settings->content_style.$this->settings->mobile_target_centered;
		return $classname;
	}
}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('ctaModule', array(
	'general'         => array(
		'title'         => __('General', 'fl-builder'),
		'sections'      => array(
			'general'       => array(
				'title'         => '',
				'fields'        => array(
					'title'         => array(
						'type'          => 'text',
						'label'         => __('Heading', 'fl-builder'),
						'default'       => __('Ready to find out more?', 'fl-builder'),
						'preview'       => array(
							'type'          => 'text',
							'selector'      => '.cta-title'
						)
					),
					'text'          => array(
						'type'          => 'editor',
						'label'         => '',
						'media_buttons' => false,
						'wpautop'		=> false,
						'default'       => __('Drop us a line today for a free quote!', 'fl-builder'),
						'preview'       => array(
							'type'          => 'text',
							'selector'      => '.cta-desc'
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
							''		=>  'None',
							' centered-mobile'		=>  'Yes',
						),
					),
				)
			),
		)
	),
	'general_setting'         => array(
		'title'         => __('General Setting', 'fl-builder'),
		'sections'      => array(
			'general_setting'       => array(
				'title'         => '',
				'fields'        => array(
					'content_align'         => array(
						'type'          => 'select',
						'label'         => __('Content Alignment', 'fl-builder'),
						'default'       => 'left',
						'options'       => array(
							'center'        => __('Center', 'fl-builder'),
							'left'          => __('Left', 'fl-builder'),
							'right'         => __('Right', 'fl-builder')
						)
					),
					'content_style'         => array(
						'type'          => 'select',
						'label'         => __('Content Style', 'fl-builder'),
						'default'       => 'inline',
						'options'       => array(
							'inline'        => __('Inline', 'fl-builder'),
							'block'          => __('Block', 'fl-builder'),
						),
						'toggle'        => array(
							'block'          => array(
								'fields'        => array('btn_align')
							),
						)
					),
					'content_title_tag'           => array(
						'type'          => 'select',
						'label'         => __( 'Title Tag', 'fl-builder' ),
						'default'       => 'h2',
						'options'       => array(
							'h1'            =>  'h1',
							'h2'            =>  'h2',
							'h3'            =>  'h3',
							'h4'            =>  'h4',
							'h5'            =>  'h5',
							'h6'            =>  'h6'
						)
					),
				)
			),
			'title'       => array(
				'title'         => 'Title',
				'fields'        => array(
					'content_title_color'         => array(
						'type'          => 'color',
						'label'         => __('Title', 'fl-builder'),
						'show_reset'       => 'true',
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.cta-title',
							'property'      => 'color',
						)
					),
					'content_title_weight'         => array(
						'type'          => 'select',
						'label'         => __('Title Font Weight', 'fl-builder'),
						'default'       => '',
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
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.cta-title',
							'property'      => 'font-weight',
						)
					),
					'content_title_size'           => array(
						'type'          => 'unit',
						'label'         => __('Title Custom Size', 'fl-builder'),
						'default'       => '',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px',
						'responsive'  => array(
							'placeholder' => array(
								'default'    => ( isset( $global_settings->content_title_size ) ) ? $global_settings->content_title_size : '30',
								'medium'     => ( isset( $global_settings->content_title_size_medium ) ) ? $global_settings->content_title_size_medium : '',
								'responsive' => ( isset( $global_settings->content_title_size_responsive ) ) ? $global_settings->content_title_size_responsive : '',
							)
						),
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.cta-title',
							'property'      => 'font-size',
							'unit'      => 'px',
						)
					),
					'content_title_lineheight'           => array(
						'type'          => 'unit',
						'label'         => __('Title Line Height', 'fl-builder'),
						'default'       => '',
						'description'   => 'em',
						'responsive'  => array(
							'placeholder' => array(
								'default'    => ( isset( $global_settings->content_title_lineheight ) ) ? $global_settings->content_title_lineheight : '1.2',
								'medium'     => ( isset( $global_settings->content_title_lineheight_medium ) ) ? $global_settings->content_title_lineheight_medium : '',
								'responsive' => ( isset( $global_settings->content_title_lineheight_responsive ) ) ? $global_settings->content_title_lineheight_responsive : '',
							)
						),
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.cta-title',
							'property'      => 'line-height',
							'unit'      => 'em',
						)
					),
					'content_title_margin_bottom'           => array(
						'type'          => 'unit',
						'label'         => __('Title Margin Bottom', 'fl-builder'),
						'default'       => '',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px',
						'responsive'  => array(
							'placeholder' => array(
								'default'    => ( isset( $global_settings->content_title_margin_bottom ) ) ? $global_settings->content_title_margin_bottom : '30',
								'medium'     => ( isset( $global_settings->content_title_margin_bottom_medium ) ) ? $global_settings->content_title_margin_bottom_medium : '',
								'responsive' => ( isset( $global_settings->content_title_margin_bottom_responsive ) ) ? $global_settings->content_title_margin_bottom_responsive : '',
							)
						),
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.cta-title',
							'property'      => 'margin-bottom',
							'unit'      => 'px',
						)
					),
				)
			),
			'title_shadow'       => array(
				'title'         => 'Title Shadow',
				'fields'        => array(
					'content_title_shadow'         => array(
						'type'          => 'color',
						'label'         => __('Title Shadow', 'fl-builder'),
						'show_reset'       => 'true',
					),
					'content_title_shadow_opacity'         => array(
						'type'          => 'unit',
						'label'         => __('Title Shadow Opacity', 'fl-builder'),
						'default'   => __('50', 'fl-builder'),
						'placeholder'   => __('50', 'fl-builder'),
						'description'   => __('%', 'fl-builder'),
					),
					'content_title_shadow_v'         => array(
						'type'          => 'unit',
						'label'         => __('Title Shadow Vertical Size', 'fl-builder'),
						'placeholder'   => __('3', 'fl-builder'),
						'description'   => __('px', 'fl-builder'),
					),
					'content_title_shadow_h'         => array(
						'type'          => 'unit',
						'label'         => __('Title Shadow Horizontal Size', 'fl-builder'),
						'placeholder'   => __('3', 'fl-builder'),
						'description'   => __('px', 'fl-builder'),
					),
					'content_title_shadow_s'         => array(
						'type'          => 'unit',
						'label'         => __('Title Shadow Spreed Size', 'fl-builder'),
						'placeholder'   => __('3', 'fl-builder'),
						'description'   => __('px', 'fl-builder'),
					),
				)
			),
			'desc'       => array(
				'title'         => 'Description',
				'fields'        => array(
					'content_desc_color'         => array(
						'type'          => 'color',
						'label'         => __('Description', 'fl-builder'),
						'show_reset'       => 'true',
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.cta-desc',
							'property'      => 'color',
						)
					),
					'content_desc_size'           => array(
						'type'          => 'unit',
						'label'         => __('Description Custom Size', 'fl-builder'),
						'default'       => '',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px',
						'responsive'  => array(
							'placeholder' => array(
								'default'    => ( isset( $global_settings->content_desc_size ) ) ? $global_settings->content_desc_size : '0',
								'medium'     => ( isset( $global_settings->content_desc_size_medium ) ) ? $global_settings->content_desc_size_medium : '',
								'responsive' => ( isset( $global_settings->content_desc_size_responsive ) ) ? $global_settings->content_desc_size_responsive : '',
							)
						),
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.cta-desc *',
							'property'      => 'font-size',
							'unit'      => 'px',
						)
					),
					'content_desc_margin_bottom'           => array(
						'type'          => 'unit',
						'label'         => __('Description Margin Bottom', 'fl-builder'),
						'default'       => '',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px',
						'responsive'  => array(
							'placeholder' => array(
								'default'    => ( isset( $global_settings->content_desc_margin_bottom ) ) ? $global_settings->content_desc_margin_bottom : '30',
								'medium'     => ( isset( $global_settings->content_desc_margin_bottom_medium ) ) ? $global_settings->content_desc_margin_bottom_medium : '',
								'responsive' => ( isset( $global_settings->content_desc_margin_bottom_responsive ) ) ? $global_settings->content_desc_margin_bottom_responsive : '',
							)
						),
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.cta-desc',
							'property'      => 'margin-bottom',
							'unit'      => 'px',
						)
					),
				)
			)
		)
	),
	'buttons'         => array(
		'title'         => __('Buttons', 'fl-builder'),
		'sections'      => array(
			'general'       => array(
				'title'         => '',
				'fields'        => array(
					'items'         => array(
						'type'          => 'form',
						'label'         => __('Button', 'fl-builder'),
						'form'          => 'cta_form', // ID from registered form below
						'preview_text'  => 'btn_text', // Name of a field to use for the preview text
						'multiple'      => true
					),
				)
			)
		)
	),
	'buttons_setting'       => array(
		'title'         => __('Buttons Setting', 'fl-builder'),
		'sections'      => array(
			'setting'       => array(
				'title'         => '',
				'fields'        => array(
					'btn_align'         => array(
						'type'          => 'select',
						'label'         => __('Alignment', 'fl-builder'),
						'default'       => 'left',
						'options'       => array(
							'center'        => __('Center', 'fl-builder'),
							'left'          => __('Left', 'fl-builder'),
							'right'         => __('Right', 'fl-builder')
						)
					),
					'btn_corners'         => array(
						'type'          => 'select',
						'label'         => __('Corners', 'fl-builder'),
						'default'       => ' btn-curved',
						'options'       => array(
							' btn-curved'        => __('Curved', 'fl-builder'),
							' btn-rounded'          => __('Rounded', 'fl-builder'),
							' btn-square'         => __('Square', 'fl-builder'),
							' btn-basic'         => __('Basic', 'fl-builder'),
						),
						'toggle'        => array(
							' btn-curved'          => array(
								'fields'        => array('btn_border_radius'),
							),
						)
					),
					'btn_size' => array(
						'type'          => 'select',
						'label'         => __('Button Size', 'fl-builder'),
						'default'       => ' btn-md',
						'options'       => array(
							' btn-xs'        => __('extra Small', 'fl-builder'),
							' btn-sm'        => __('Small', 'fl-builder'),
							' btn-md'        => __('Medium', 'fl-builder'),
							' btn-lg'        => __('Large', 'fl-builder'),
							' btn-xl'        => __('Extra Large', 'fl-builder'),
						)
					),
					'btn_width'         => array(
						'type'          => 'select',
						'label'         => __('Width', 'fl-builder'),
						'default'       => '',
						'options'       => array(
							''          => _x( 'Auto', 'Width.', 'fl-builder' ),
							' btn-block'          => __('Full Width', 'fl-builder'),
							' btn-custom'        => __('Custom', 'fl-builder'),
						),
						'toggle'        => array(
							''          => array(
								'fields'        => array('btn_align')
							),
							' btn-block'          => array(),
							' btn-custom'        => array(
								'fields'        => array('btn_align', 'btn_custom_width'),
							)
						)
					),
					'btn_custom_width'  => array(
						'type'          => 'text',
						'label'         => __('Custom Width', 'fl-builder'),
						'default'       => '200',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px'
					),
					'btn_font_weight'         => array(
						'type'          => 'select',
						'label'         => __('Font Weight', 'fl-builder'),
						'default'       => '',
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
					),
					'btn_font_size'     => array(
						'type'          => 'unit',
						'label'         => __('Font Size', 'fl-builder'),
						'default'       => '',
						'placeholder'   => '16',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px',
						'responsive'  => array(
							'placeholder' => array(
								'default'    => ( isset( $global_settings->btn_font_size ) ) ? $global_settings->btn_font_size : '16',
								'medium'     => ( isset( $global_settings->btn_font_size_medium ) ) ? $global_settings->btn_font_size_medium : '',
								'responsive' => ( isset( $global_settings->btn_font_size_responsive ) ) ? $global_settings->btn_font_size_responsive : '',
							)
						),
						'preview'         => array(
							'type'            => 'css',
							'selector'        => '.cta-buttons .btn',
							'property'        => 'font-size',
							'unit'        => 'px',
						),
					),
					'btn_letter_spacing'     => array(
						'type'          => 'unit',
						'label'         => __('Letter Spacing', 'fl-builder'),
						'default'       => '',
						'placeholder'   => '0',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px',
						'responsive'  => array(
							'placeholder' => array(
								'default'    => ( isset( $global_settings->btn_letter_spacing ) ) ? $global_settings->btn_letter_spacing : '0',
								'medium'     => ( isset( $global_settings->btn_letter_spacing_medium ) ) ? $global_settings->btn_letter_spacing_medium : '',
								'responsive' => ( isset( $global_settings->btn_letter_spacing_responsive ) ) ? $global_settings->btn_letter_spacing_responsive : '',
							)
						),
						'preview'         => array(
							'type'            => 'css',
							'selector'        => '.btn',
							'property'        => 'letter-spacing',
							'unit'        => 'px',
						),
					),
					'btn_padding'       => array(
						'type'          => 'unit',
						'label'         => __('Padding Left & Right', 'fl-builder'),
						'default'       => '',
						'placeholder'   => '12',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px',
						'responsive'  => array(
							'placeholder' => array(
								'default'    => ( isset( $global_settings->btn_padding ) ) ? $global_settings->btn_padding : '12',
								'medium'     => ( isset( $global_settings->btn_padding_medium ) ) ? $global_settings->btn_padding_medium : '',
								'responsive' => ( isset( $global_settings->btn_padding_responsive ) ) ? $global_settings->btn_padding_responsive : '',
							)
						),
						'preview'         => array(
							'type'            => 'css',
							'rules'            => array(
								array(
									'selector'        => '.cta-buttons .btn',
									'property'        => 'padding-left',
									'unit'        => 'px',
								),
								array(
									'selector'        => '.cta-buttons .btn',
									'property'        => 'padding-right',
									'unit'        => 'px',
								),
							),
						),
					),
					'btn_padding_vertical'       => array(
						'type'          => 'unit',
						'label'         => __('Padding Top & Bottom', 'fl-builder'),
						'default'       => '',
						'placeholder'   => '12',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px',
						'responsive'  => array(
							'placeholder' => array(
								'default'    => ( isset( $global_settings->btn_padding_vertical ) ) ? $global_settings->btn_padding_vertical : '12',
								'medium'     => ( isset( $global_settings->btn_padding_vertical_medium ) ) ? $global_settings->btn_padding_vertical_medium : '',
								'responsive' => ( isset( $global_settings->btn_padding_vertical_responsive ) ) ? $global_settings->btn_padding_vertical_responsive : '',
							)
						),
						'preview'         => array(
							'type'            => 'css',
							'rules'            => array(
								array(
									'selector'        => '.cta-buttons .btn',
									'property'        => 'padding-top',
									'unit'        => 'px',
								),
								array(
									'selector'        => '.cta-buttons .btn',
									'property'        => 'padding-bottom',
									'unit'        => 'px',
								),
							),
						),
					),
					'btn_border_radius' => array(
						'type'          => 'unit',
						'label'         => __('Round Corners', 'fl-builder'),
						'default'       => '',
						'placeholder'   => '4',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px',
						'responsive'  => array(
							'placeholder' => array(
								'default'    => ( isset( $global_settings->btn_border_radius ) ) ? $global_settings->btn_border_radius : '',
								'medium'     => ( isset( $global_settings->btn_border_radius_medium ) ) ? $global_settings->btn_border_radius_medium : '',
								'responsive' => ( isset( $global_settings->btn_border_radius_responsive ) ) ? $global_settings->btn_border_radius_responsive : '',
							)
						),
						'preview'         => array(
							'type'            => 'css',
							'selector'        => '.cta-buttons .btn',
							'property'        => 'border-radius',
							'unit'        => 'px',
						),
					),
					'btn_custom_margin' => array(
						'type'          => 'unit',
						'label'         => __('Button Margin', 'fl-builder'),
						'default'       => '',
						'placeholder'   => '15',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px',
						'responsive'  => array(
							'placeholder' => array(
								'default'    => ( isset( $global_settings->btn_custom_margin ) ) ? $global_settings->btn_custom_margin : '15',
								'medium'     => ( isset( $global_settings->btn_custom_margin_medium ) ) ? $global_settings->btn_custom_margin_medium : '',
								'responsive' => ( isset( $global_settings->btn_custom_margin_responsive ) ) ? $global_settings->btn_custom_margin_responsive : '',
							)
						),
					),
				)
			),
		)
	),
));
/**
 * Register a settings form to use in the "form" field type above.
 */
FLBuilder::register_settings_form('cta_form', array(
	'title' => __('Add Button', 'fl-builder'),
	'tabs'  => array(
		'general'      => array(
			'title'         => __('Button', 'fl-builder'),
			'sections'      => array(
				'info'       => array(
					'title'         => __('Button Info', 'fl-builder'),
					'fields'        => array(
						'btn_text'          => array(
							'type'          => 'text',
							'label'         => __('Text', 'fl-builder'),
							'default'       => __('Click Here', 'fl-builder'),
							'preview'         => array(
								'type'            => 'text',
								'selector'        => '.fl-button-text'
							)
						),
						'btn_link'          => array(
							'type'          => 'link',
							'label'         => __('Link', 'fl-builder'),
							'placeholder'   => __( 'http://www.example.com', 'fl-builder' ),
							'preview'       => array(
								'type'          => 'none'
							)
						),
						'btn_link_target'   => array(
							'type'          => 'select',
							'label'         => __('Link Target', 'fl-builder'),
							'default'       => '_self',
							'options'       => array(
								'_self'         => __('Same Window', 'fl-builder'),
								'_blank'        => __('New Window', 'fl-builder')
							),
							'preview'       => array(
								'type'          => 'none'
							)
						),
						'btn_link_nofollow'          => array(
							'type'          => 'select',
							'label'         => __('Link No Follow', 'fl-builder'),
							'default'       => 'no',
							'options' 		=> array(
								'yes' 			=> __('Yes', 'fl-builder'),
								'no' 			=> __('No', 'fl-builder'),
							),
							'preview'       => array(
								'type'          => 'none'
							)
						),
					)
				),
				'types'       => array(
					'title'         => __('Button Type', 'fl-builder'),
					'fields'        => array(
						'btn_type'          => array(
							'type'          => 'select',
							'label'         => __('Type', 'fl-builder'),
							'default'       => 'btn-default',
							'options' 		=> array(
								'btn-default' 	=> __('Default', 'fl-builder'),
								'btn-primary' 	=> __('Primary', 'fl-builder'),
								'btn-success' 	=> __('Success', 'fl-builder'),
								'btn-info' 		=> __('Info', 'fl-builder'),
								'btn-warning' 	=> __('Warning', 'fl-builder'),
								'btn-danger' 	=> __('Danger', 'fl-builder'),
								'btn-link' 		=> __('Link', 'fl-builder'),
							),
						),
						'btn_icon'          => array(
							'type'          => 'icon',
							'label'         => __('Icon', 'fl-builder'),
							'show_remove'   => true
						),
						'btn_icon_position' => array(
							'type'          => 'select',
							'label'         => __('Icon Position', 'fl-builder'),
							'default'       => 'before',
							'options'       => array(
								'before'        => __('Before Text', 'fl-builder'),
								'after'         => __('After Text', 'fl-builder')
							)
						),
						'btn_icon_animation' => array(
							'type'          => 'select',
							'label'         => __('Icon Visibility', 'fl-builder'),
							'default'       => '',
							'options'       => array(
								''        => __('Always Visible', 'fl-builder'),
								' btn-reveal'         => __('Fade In On Hover', 'fl-builder')
							)
						),
					)
				),
				'styles'       => array(
					'title'         => __('Button Style', 'fl-builder'),
					'fields'        => array(
						'btn_style' => array(
							'type'          => 'select',
							'label'         => __('Button Style', 'fl-builder'),
							'default'       => '',
							'options'       => array(
								''        => __('Default', 'fl-builder'),
								' btn-flat'        => __('Flat', 'fl-builder'),
								' btn-gradient'        => __('Gradient', 'fl-builder'),
								' btn-outline'        => __('Outline', 'fl-builder'),
							),
							'toggle'        => array(
								''          => array(
									'fields'        => array('btn_bg_color', 'btn_text_color', 'btn_border_color', 'btn_bg_hover_color', 'btn_text_hover_color', 'btn_border_hover_color')
								),
								' btn-flat'          => array(
									'fields'        => array('btn_bg_color', 'btn_text_color', 'btn_bg_hover_color', 'btn_text_hover_color')
								),
								' btn-gradient'          => array(
									'fields'        => array('btn_bg_color', 'btn_text_color', 'btn_bg_color_2', 'btn_bg_gradient_orientation', 'btn_bg_hover_color', 'btn_text_hover_color', 'btn_bg_hover_color_2', 'btn_bg_gradient_border')
								),
								' btn-outline'          => array(
									'fields'        => array('btn_text_color', 'btn_border_color', 'btn_text_hover_color', 'btn_border_hover_color')
								),
							)
						),
						'btn_bg_gradient_orientation' => array(
							'type'          => 'select',
							'label'         => __('Gradient Orientation', 'fl-builder'),
							'default'       => 'vertical',
							'options'       => array(
								'vertical'        => __('Vertical', 'fl-builder'),
								'horizontal'        => __('Horizontal', 'fl-builder'),
							),
						),
						'btn_bg_gradient_border' => array(
							'type'          => 'select',
							'label'         => __('Gradient Border', 'fl-builder'),
							'default'       => '',
							'options'       => array(
								''			=> __('Default', 'fl-builder'),
								' btn-borderless' => __('Borderless', 'fl-builder'),
							),
						),
						'btn_effects'         => array(
							'type'          => 'select',
							'label'         => __('Button Effects', 'fl-builder'),
							'default'       => ' btn-effects-outline',
							'options'       => array(
								''        				=> __('None', 'fl-builder'),
								' btn-effects-outline'	=> __('Outline', 'fl-builder'),
								' btn-effects-shadow'   => __('Shadow', 'fl-builder'),
								' btn-effects-3d'       => __('3D', 'fl-builder'),
							)
						),
					)
				),
				'colors'       => array(
					'title'         => __('Button Custom Color', 'fl-builder'),
					'fields'        => array(
						'btn_bg_color'      => array(
							'type'          => 'color',
							'label'         => __('Background Color', 'fl-builder'),
							'default'       => '',
							'show_reset'    => true
						),
						'btn_bg_color_2'      => array(
							'type'          => 'color',
							'label'         => __('Background Gradient Color', 'fl-builder'),
							'default'       => '',
							'show_reset'    => true
						),
						'btn_text_color'    => array(
							'type'          => 'color',
							'label'         => __('Text Color', 'fl-builder'),
							'default'       => '',
							'show_reset'    => true
						),
						'btn_border_color'    => array(
							'type'          => 'color',
							'label'         => __('Border Color', 'fl-builder'),
							'default'       => '',
							'show_reset'    => true
						),
						'btn_bg_hover_color' => array(
							'type'          => 'color',
							'label'         => __('Background Hover Color', 'fl-builder'),
							'default'       => '',
							'show_reset'    => true,
						),
						'btn_bg_hover_color_2' => array(
							'type'          => 'color',
							'label'         => __('Background Gradient Hover Color', 'fl-builder'),
							'default'       => '',
							'show_reset'    => true,
						),
						'btn_text_hover_color' => array(
							'type'          => 'color',
							'label'         => __('Text Hover Color', 'fl-builder'),
							'default'       => '',
							'show_reset'    => true,
						),
						'btn_border_hover_color'    => array(
							'type'          => 'color',
							'label'         => __('Border Color', 'fl-builder'),
							'default'       => '',
							'show_reset'    => true
						),
					)
				),
			)
		)
	)
));