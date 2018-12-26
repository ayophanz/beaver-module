<?php

/**
 * @class AdvanceButtonModule
 */
class AdvanceButtonModule extends FLBuilderModule {

	/**
	 * @method __construct
	 */
	public function __construct()
	{
		global $foldercategory;
		parent::__construct(array(
			'name'          	=> __('Button - Advance', 'fl-builder'),
			'description'   	=> __('Multiple Different Button', 'fl-builder'),
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
		$classname = 'advanced-button '.$this->settings->btn_align.$this->settings->mobile_target_centered;
		return $classname;
	}
}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('AdvanceButtonModule', array(
	'general'         => array(
		'title'         => __('General', 'fl-builder'),
		'sections'      => array(
			'general'       => array(
				'title'         => '',
				'fields'        => array(
					'items'         => array(
						'type'          => 'form',
						'label'         => __('Button', 'fl-builder'),
						'form'          => 'button_form', // ID from registered form below
						'preview_text'  => 'btn_text', // Name of a field to use for the preview text
						'multiple'      => true
					),
				)
			)
		)
	),
	'setting'       => array(
		'title'         => __('Setting', 'fl-builder'),
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
							'right'         => __('Right', 'fl-builder'),
						)
					),
					'btn_corners'         => array(
						'type'          => 'select',
						'label'         => __('Corners', 'fl-builder'),
						'default'       => ' btn-square',
						'options'       => array(
							' btn-curved'        => __('Curved', 'fl-builder'),
							' btn-rounded'       => __('Rounded', 'fl-builder'),
							' btn-square'        => __('Square', 'fl-builder'),
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
								'fields'        => array('btn_align'),
							),
							' btn-block'          => array(),
							' btn-custom'        => array(
								'fields'        => array('btn_align', 'btn_custom_width')
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
							'selector'        => '.btn',
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
									'selector'        => '.btn',
									'property'        => 'padding-left',
									'unit'        => 'px',
								),
								array(
									'selector'        => '.btn',
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
									'selector'        => '.btn',
									'property'        => 'padding-top',
									'unit'        => 'px',
								),
								array(
									'selector'        => '.btn',
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
							'selector'        => '.btn',
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
					'btn_custom_border_width' => array(
						'type'          => 'unit',
						'label'         => __('Button Border Width', 'fl-builder'),
						'default'       => '',
						'placeholder'   => '2',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px',
						'preview'         => array(
							'type'            => 'css',
							'selector'        => '.btn',
							'property'        => 'border-width',
							'unit'        => 'px',
						),
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
	),
));
/**
 * Register a settings form to use in the "form" field type above.
 */
FLBuilder::register_settings_form('button_form', array(
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
						'btn_icon_type'          => array(
							'type'          => 'select',
							'label'         => __('Icon Type', 'fl-builder'),
							'default'       => '',
							'options' 		=> array(
								'' 	=> __('Font Icon', 'fl-builder'),
								'image' 	=> __('Image Icon', 'fl-builder'),
							),
							'toggle'        => array(
								''          => array(
									'fields' => array('btn_icon')
								),
								'image'          => array(
									'fields' => array('btn_image')
								),
							)
						),
						'btn_icon'          => array(
							'type'          => 'icon',
							'label'         => __('Icon', 'fl-builder'),
							'show_remove'   => true
						),
						'btn_image'          => array(
							'type'          => 'photo',
							'label'         => __('Image Icon', 'fl-builder'),
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
							'default'       => '',
							'options'       => array(
								''        				=> __('None', 'fl-builder'),
								' btn-effects-outline'	=> __('Outline', 'fl-builder'),
								' btn-effects-shadow'   => __('Shadow', 'fl-builder'),
								' btn-effects-3d'       => __('3D', 'fl-builder'),
								' btn-animation-horizontal' => __('Animation Horizontal', 'fl-builder'),
								' btn-animation-vertical' => __('Animation Vertical', 'fl-builder'),
								' btn-animation-flasher' => __('Animation Flasher', 'fl-builder'),
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
						'btn_border_color_opacity'    => array(
							'type'          => 'unit',
							'label'         => __('Border Color Opacity', 'fl-builder'),
							'default'       => '100',
							'placeholder'   => '100',
							'maxlength'     => '3',
							'size'          => '4',
							'description'   => '%',
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
						'btn_border_hover_color_opacity'    => array(
							'type'          => 'unit',
							'label'         => __('Border Color Hover Opacity', 'fl-builder'),
							'default'       => '100',
							'placeholder'   => '100',
							'maxlength'     => '3',
							'size'          => '4',
							'description'   => '%',
						),
					)
				),
			)
		)
	)
));