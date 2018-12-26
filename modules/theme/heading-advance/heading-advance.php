<?php

/**
 * @class HeadingAdvanceModule
 */
class HeadingAdvanceModule extends FLBuilderModule {

	/**
	 * @method __construct
	 */
	public function __construct()
	{
		global $foldercategory;
		parent::__construct(array(
			'name'          	=> __('Heading Advanced & Icon List/Text', 'fl-builder'),
			'description'   	=> __('Custom Heading.', 'fl-builder'),
			'category'      	=> __($foldercategory, 'fl-builder'),
			'partial_refresh'	=> true
		));
	}

	/**
	 * @method get_classname
	 */
	public function get_classname()
	{
		$classname = 'heading-advance';
		return $classname;
	}
}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('HeadingAdvanceModule', array(
	'general'       => array(
		'title'         => __('General', 'fl-builder'),
		'sections'      => array(
			'general'         => array(
				'title'         => '',
				'fields'        => array(
					'title_position'           => array(
						'type'          => 'select',
						'label'         => __( 'Title Position', 'fl-builder' ),
						'default'       => 'center',
						'options'       => array(
							'center'	=>  'Center',
							'left'		=>  'Left',
							'right'		=>  'Right',
						),
					),
					'title_tag'           => array(
						'type'          => 'select',
						'label'         => __( 'HTML Tag', 'fl-builder' ),
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
					'title_prefix'         => array(
						'type'          => 'text',
						'label'         => __('Prefix Title', 'fl-builder'),
						'default'         => __('Prefix', 'fl-builder'),
						'preview'       => array(
							'type'          => 'text',
							'selector'      => '.heading-advance-title .title-prefix',
						),
					),
					'title'         => array(
						'type'          => 'text',
						'label'         => __('Title', 'fl-builder'),
						'default'         => __('Heading', 'fl-builder'),
						'preview'       => array(
							'type'          => 'text',
							'selector'      => '.heading-advance-title .title',
						)
					),
					'title_suffix'         => array(
						'type'          => 'text',
						'label'         => __('Suffix Title', 'fl-builder'),
						'default'         => __('Suffix', 'fl-builder'),
						'preview'       => array(
							'type'          => 'text',
							'selector'      => '.heading-advance-title .title-suffix',
						)
					),
					'title_desc'         => array(
						'type'          => 'textarea',
						'label'         => __('Short Description', 'fl-builder'),
						'default'         => __('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer adipiscing erat eget risus sollicitudin pellentesque et non erat. Maecenas nibh dolor, malesuada et bibendum', 'fl-builder'),
						'preview'       => array(
							'type'          => 'text',
							'selector'      => '.heading-advance-desc:not(.extra)',
						)
					),
					'title_desc_extra'         => array(
						'type'          => 'text',
						'label'         => __('Short Description Extra', 'fl-builder'),
						'default'         => '',
						'preview'       => array(
							'type'          => 'text',
							'selector'      => '.heading-advance-desc.extra',
						)
					),
					'title_link_style'           => array(
						'type'          => 'select',
						'label'         => __( 'Link Style', 'fl-builder' ),
						'default'       => '',
						'options'       => array(
							''            =>  'Box',
							'button'            =>  'Button',
						),
						'toggle'        => array(
							'button'        => array(
								'fields'        => array('title_link_label', 'title_link_align')
							),
						)
					),
					'title_link_label'         => array(
						'type'          => 'text',
						'label'         => __('Link Label', 'fl-builder'),
						'default'         => __('', 'fl-builder'),
					),
					'title_link'         => array(
						'type'          => 'link',
						'label'         => __('Link', 'fl-builder'),
						'default'         => __('', 'fl-builder'),
					),
					'title_link_align'           => array(
						'type'          => 'select',
						'label'         => __( 'Link Alignment', 'fl-builder' ),
						'default'       => '',
						'options'       => array(
							''            =>  'Left',
							'right'            =>  'Right',
						),
					),
					'title_width'         => array(
						'type'          => 'unit',
						'label'         => __('Box Max Width', 'fl-builder'),
						'default'       => '',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px',
						'placeholder'   => '600',
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.heading-advance-box',
							'property'      => 'max-width',
							'unit'          => 'px',
						)
					),
					'title_title_prefix_width'         => array(
						'type'          => 'unit',
						'label'         => __('prefix Title Max Width', 'fl-builder'),
						'default'       => '',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px',
						'placeholder'   => '600',
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.heading-advance-title .title-prefix',
							'property'      => 'max-width',
							'unit'          => 'px',
						)
					),
					'title_title_width'         => array(
						'type'          => 'unit',
						'label'         => __('Title Max Width', 'fl-builder'),
						'default'       => '',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px',
						'placeholder'   => '600',
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.heading-advance-title',
							'property'      => 'max-width',
							'unit'          => 'px',
						)
					),
					'title_title_suffix_width'         => array(
						'type'          => 'unit',
						'label'         => __('Suffix Title Max Width', 'fl-builder'),
						'default'       => '',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px',
						'placeholder'   => '600',
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.heading-advance-title .title-suffix',
							'property'      => 'max-width',
							'unit'          => 'px',
						)
					),
					'title_desc_width'         => array(
						'type'          => 'unit',
						'label'         => __('Description Max Width', 'fl-builder'),
						'default'       => '',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px',
						'placeholder'   => '600',
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.heading-advance-desc',
							'property'      => 'max-width',
							'unit'          => 'px',
						)
					),
					'title_desc_height'         => array(
						'type'          => 'unit',
						'label'         => __('Description Max Height', 'fl-builder'),
						'default'       => '',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px',
						'placeholder'   => '66',
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.heading-advance-desc',
							'property'      => 'max-height',
							'unit'          => 'px',
						)
					),
					'border_position'         => array(
						'type'          => 'select',
						'label'         => __('Border Position', 'fl-builder'),
						'default' 		=> '',
						'options'       => array(
							''			=>  'None',
							'bottom'	=>  'Bottom',
							'top'		=>  'Top',
						),
						'toggle'        => array(
							'bottom'        => array(
								'fields'        => array('border_color', 'border_position_spacing')
							),
							'top'        => array(
								'fields'        => array('border_color', 'border_position_spacing')
							),
						)
					),
					'border_color'         => array(
						'type'          => 'color',
						'label'         => __('Border Color', 'fl-builder'),
						'show_reset' 	=> true,
					),
					'border_position_spacing'         => array(
						'type'          => 'unit',
						'label'         => __('Border Sapcing', 'fl-builder'),
						'default' 		=> '20',
						'placeholder' 		=> '20',
						'description' 		=> 'px',
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
							''					=>  'No',
							' centered-mobile' 	=>  'Yes',
						),
					),
				)
			),
		),
	),
	'icon'        => array(
		'title'         => __('Icon', 'fl-builder'),
		'sections'      => array(
			'color' 	=> array(
				'title' => '',
				'fields'        => array(
					'title_icon_source'         => array(
						'type'          => 'select',
						'label'         => __('Source', 'fl-builder'),
						'default'       => 'none',
						'options'       => array(
							'none'			=>  'None',
							'icon'			=>  'Icon',
							'image'			=>  'Image',
						),
						'toggle'        => array(
							'icon'        => array(
								'fields'        => array('title_icon_icon', 'title_icon_lineheight', 'title_icon_size', 'title_icon_color')
							),
							'image'        => array(
								'fields'        => array('title_icon_img', 'title_icon_img_size')
							)
						)
					),
					'title_icon_source_effect'           => array(
						'type'          => 'select',
						'label'         => __( 'Icon Hover Effect', 'fl-builder' ),
						'default'       => '',
						'options'       => array(
							''            =>  'None',
							' zoom'      =>  'Zoom',
							' flip'      =>  'Flip',
						),
						'preview'       => array(
							'type'      => 'none',
						)
					),
					'title_icon_size'           => array(
						'type'          => 'unit',
						'label'         => __( 'Icon Size', 'fl-builder' ),
						'default'       => '',
						'description'   => 'px',
						'placeholder'   => '60',
						'preview'       => array(
							'type'      => 'css',
							'selector'  => '.heading-advance-icon',
							'property'  => 'font-size',
							'unit'      => 'px',
						)
					),
					'title_icon_lineheight'           => array(
						'type'          => 'unit',
						'label'         => __( 'Icon Line height', 'fl-builder' ),
						'default'       => '',
						'description'   => 'em',
						'placeholder'   => '0.8',
						'preview'       => array(
							'type'      => 'css',
							'selector'  => '.heading-advance-icon i',
							'property'  => 'line-height',
							'unit'      => 'em',
						)
					),
					'title_icon_icon'         => array(
						'type'          => 'icon',
						'label'         => __('Icon', 'fl-builder'),
						'show_remove'   => true,
					),
	
					'title_icon_img'         => array(
						'type'          => 'photo',
						'label'         => __('Image', 'fl-builder'),
						'description'         => __('Used .svg file for better quality', 'fl-builder'),
						'show_remove'	=> true
					),
					'title_icon_img_size'           => array(
						'type'          => 'unit',
						'label'         => __( 'Image Size', 'fl-builder' ),
						'default'       => '',
						'description'   => 'px',
						'placeholder'   => '60',
						'preview'       => array(
							'type'      => 'css',
							'selector'  => '.heading-advance-icon img',
							'property'  => 'width',
							'unit'      => 'px',
						)
					),
					'title_icon_spacing'           => array(
						'type'          => 'unit',
						'label'         => __( 'Icon & Text Spacing', 'fl-builder' ),
						'default'       => '',
						'description'   => 'px',
						'placeholder'   => '20',
						'preview'       => array(
							'type'      => 'css',
							'rules'           => array(
								array(
									'selector'  => '.left .heading-advance-icon.icon-sides',
									'property'  => 'padding-right',
									'unit'      => 'px',
								),
								array(
									'selector'  => '.right .heading-advance-icon.icon-sides',
									'property'  => 'padding-left',
									'unit'      => 'px',
								),
								array(
									'selector'  => '.center .heading-advance-icon.icon-sides',
									'property'  => 'padding-bottom',
									'unit'      => 'px',
								),
								array(
									'selector'  => '.heading-advance-icon.icon-top',
									'property'  => 'padding-bottom',
									'unit'      => 'px',
								),
								array(
									'selector'  => '.heading-advance-icon.icon-bottom',
									'property'  => 'padding-top',
									'unit'      => 'px',
								),
							)
						),
					),
					'title_icon_spacing_top'           => array(
						'type'          => 'unit',
						'label'         => __( 'Icon Spacing Top', 'fl-builder' ),
						'default'       => '',
						'description'   => 'px',
						'placeholder'   => '20',
						'preview'       => array(
							'type'      => 'css',
							'selector'  => '.heading-advance-icon *',
							'property'  => 'margin-top',
							'unit'      => 'px',
						),
					),
	
					'title_icon_width'           => array(
						'type'          => 'unit',
						'label'         => __( 'Icon Width', 'fl-builder' ),
						'default'       => '',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px',
						'placeholder'   => '60',
						'preview'       => array(
							'type'      => 'css',
							'selector'  => '.heading-advance-icon',
							'property'  => 'width',
							'unit'      => 'px',
						)
					),
	
					'title_icon_alignment'         => array(
						'type'          => 'select',
						'label'         => __('Icon Alignment', 'fl-builder'),
						'default'       => '',
						'options'       => array(
							''				=>  'None',
							'left'			=>  'Left',
							'right'			=>  'Right',
							'center'		=>  'Center',
						),
					),
					'title_icon_position'         => array(
						'type'          => 'select',
						'label'         => __('Icon Position', 'fl-builder'),
						'default'       => '',
						'options'       => array(
							''				=>  'Sides',
							'top'			=>  'Top',
							'bottom'			=>  'Bottom',
						),
						'toggle'        => array(
							''	=> array(
								'fields'        => array('title_icon_width')
							),
							'top'	=> array(
								'fields'        => array('title_icon_float')
							),
						),
					),
					'title_icon_float'         => array(
						'type'          => 'select',
						'label'         => __('Icon Float', 'fl-builder'),
						'default'       => '',
						'options'       => array(
							''				=>  'None',
							'left'			=>  'Left',
							'right'			=>  'Right',
						),
					),
				)
			)
		)
	),
	'color'        => array(
		'title'         => __('Color', 'fl-builder'),
		'sections'      => array(
			'color' 	=> array(
				'title' => '',
				'fields'        => array(
					'title_default_color'         => array(
						'type'          => 'color',
						'label'         => __('Default Color', 'fl-builder'),
						'show_reset'    => true,
					),
					'title_icon_color'         => array(
						'type'          => 'color',
						'label'         => __('Icon Color', 'fl-builder'),
						'show_reset'    => true,
						'preview'       => array(
							'type'      => 'css',
							'selector'  => '.heading-advance-icon',
							'property'  => 'color',
						)
	
					),
					'title_prefix_color'         => array(
						'type'          => 'color',
						'label'         => __('Prefix Title', 'fl-builder'),
						'show_reset'    => true,
						'preview'       => array(
							'type'      => 'css',
							'selector'  => '.heading-advance-title .title-prefix',
							'property'  => 'color',
						)
					),
					'title_color'         => array(
						'type'          => 'color',
						'label'         => __('Title', 'fl-builder'),
						'show_reset'    => true,
						'preview'       => array(
							'type'      => 'css',
							'selector'  => '.heading-advance-title .title',
							'property'  => 'color',
						)
					),
					'title_suffix_color'         => array(
						'type'          => 'color',
						'label'         => __('Suffix Title', 'fl-builder'),
						'show_reset'    => true,
						'preview'       => array(
							'type'      => 'css',
							'selector'  => '.heading-advance-title .title-suffix',
							'property'  => 'color',
						)
					),
					'title_desc_color'         => array(
						'type'          => 'color',
						'label'         => __('Short Description', 'fl-builder'),
						'show_reset'    => true,
						'preview'       => array(
							'type'      => 'css',
							'selector'  => '.heading-advance-box .heading-advance-desc',
							'property'  => 'color',
						)
					),
					'title_desc_link_color'         => array(
						'type'          => 'color',
						'label'         => __('Short Description Link Color', 'fl-builder'),
						'show_reset'    => true,
					),
					'title_separator_color'         => array(
						'type'          => 'color',
						'label'         => __('Separator Color', 'fl-builder'),
						'show_reset'    => true,
						'preview'       => array(
							'type'      => 'css',
							'selector'  => '.heading-advance-separator div > span',
							'property'  => 'border-top-color',
						)
					),
					'title_separator_icon_color'         => array(
						'type'          => 'color',
						'label'         => __('Separator Icon/Text Color', 'fl-builder'),
						'show_reset'    => true,
						'preview'       => array(
							'type'      => 'css',
							'selector'  => '.heading-advance-separator div:nth-child(2)',
							'property'  => 'color',
						)
					),
					'title_desc_color_opacity'         => array(
						'type'          => 'unit',
						'label'         => __('Short Description Opacity', 'fl-builder'),
						'placeholder'   => '0.6',
						'description'   => '0-1 eg 0.6',
						'preview'       => array(
							'type'      => 'css',
							'selector'  => '.heading-advance-box .heading-advance-desc',
							'property'  => 'opacity',
						)
					),
				)
			),
		)
	),
	'font'        => array(
		'title'         => __('Font', 'fl-builder'),
		'sections'      => array(
			'font' 	=> array(
				'title' => 'Font Family',
				'fields'        => array(
					'title_default_font'         => array(
						'type'          => 'font',
						'label'         => __('Default Font', 'fl-builder'),
						'default'       => array(
							'family'        => 'Default',
							'weight'        => 300
						),
						'preview'         => array(
							'type'            => 'font',
							'selector'        => '*:not(i)'
						)	
					),
					'title_prefix_font'         => array(
						'type'          => 'font',
						'label'         => __('Prefix Title', 'fl-builder'),
						'default'       => array(
							'family'        => 'Default',
							'weight'        => 300
						),
						'preview'         => array(
							'type'            => 'font',
							'selector'        => '.heading-advance-box .heading-advance-title .title-prefix'
						)	
					),
					'title_font'         => array(
						'type'          => 'font',
						'label'         => __('Title', 'fl-builder'),
						'default'       => array(
							'family'        => 'Default',
							'weight'        => 300
						),
						'preview'         => array(
							'type'            => 'font',
							'selector'        => '.heading-advance-box .heading-advance-title .title'
						)	
					),
					'title_suffix_font'         => array(
						'type'          => 'font',
						'label'         => __('Suffix Title', 'fl-builder'),
						'default'       => array(
							'family'        => 'Default',
							'weight'        => 300
						),
						'preview'         => array(
							'type'            => 'font',
							'selector'        => '.heading-advance-box .heading-advance-title .title-suffix'
						)	
					),
					'title_desc_font'         => array(
						'type'          => 'font',
						'label'         => __('Short Description', 'fl-builder'),
						'default'       => array(
							'family'        => 'Default',
							'weight'        => 300
						),
						'preview'         => array(
							'type'            => 'font',
							'selector'        => '.heading-advance-box .heading-advance-desc'
						)
					),
				)
			),
			'font_weight' 	=> array(
				'title' => 'Font Weight',
				'fields'        => array(
					'title_default_weight'         => array(
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
							'selector'      => '.heading-advance *:not(i)',
							'property'      => 'font-weight',
						),
						'help'   		=> 'Its depend to the font family if the following font-weight supported.',
					),
					'title_prefix_weight'         => array(
						'type'          => 'select',
						'label'         => __('Prefix Title Font Weight', 'fl-builder'),
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
							'selector'      => '.heading-advance-title .title-prefix',
							'property'      => 'font-weight',
						),
						'help'   		=> 'Its depend to the font family if the following font-weight supported.',
					),
					'title_weight'         => array(
						'type'          => 'select',
						'label'         => __('Title Font Weight', 'fl-builder'),
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
							'selector'      => '.heading-advance-title .title',
							'property'      => 'font-weight',
						),
						'help'   		=> 'Its depend to the font family if the following font-weight supported.',
					),
					'title_suffix_weight'         => array(
						'type'          => 'select',
						'label'         => __('Suffix Title Font Weight', 'fl-builder'),
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
							'selector'      => '.heading-advance-title .title-suffix',
							'property'      => 'font-weight',
						),
						'help'   		=> 'Its depend to the font family if the following font-weight supported.',
					),
					'title_desc_weight'         => array(
						'type'          => 'select',
						'label'         => __('Short Description Font Weight', 'fl-builder'),
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
							'selector'      => '.heading-advance-box .heading-advance-desc',
							'property'      => 'font-weight',
						),
						'help'   		=> 'Its depend to the font family if the following font-weight supported.',
					),
				)
			),
			'text_transform' 	=> array(
				'title' => 'Text Transform',
				'fields'        => array(
					'title_default_transform'         => array(
						'type'          => 'select',
						'label'         => __('Default Font Transform', 'fl-builder'),
						'default' 		=> '',
						'options'       => array(
							''    	=> __('Default', 'fl-builder'),
							'uppercase'    	=> __('Uppercase', 'fl-builder'),
							'capitalize'    => __('Capitalize', 'fl-builder'),
							'lowercase'    	=> __('Lowercase', 'fl-builder'),
						),
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.heading-advance *:not(i)',
							'property'      => 'text-transform',
						),
					),
					'title_prefix_transform'         => array(
						'type'          => 'select',
						'label'         => __('Prefix Title Transform', 'fl-builder'),
						'default' 		=> '',
						'options'       => array(
							''    	=> __('Default', 'fl-builder'),
							'uppercase'    	=> __('Uppercase', 'fl-builder'),
							'capitalize'    => __('Capitalize', 'fl-builder'),
							'lowercase'    	=> __('Lowercase', 'fl-builder'),
						),
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.heading-advance-title .title-prefix',
							'property'      => 'text-transform',
						),
					),
					'title_transform'         => array(
						'type'          => 'select',
						'label'         => __('Title Transform', 'fl-builder'),
						'default' 		=> '',
						'options'       => array(
							''    	=> __('Default', 'fl-builder'),
							'uppercase'    	=> __('Uppercase', 'fl-builder'),
							'capitalize'    => __('Capitalize', 'fl-builder'),
							'lowercase'    	=> __('Lowercase', 'fl-builder'),
						),
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.heading-advance-title .title',
							'property'      => 'text-transform',
						),
					),
					'title_suffix_transform'         => array(
						'type'          => 'select',
						'label'         => __('Suffix Title Transform', 'fl-builder'),
						'default' 		=> '',
						'options'       => array(
							''    	=> __('Default', 'fl-builder'),
							'uppercase'    	=> __('Uppercase', 'fl-builder'),
							'capitalize'    => __('Capitalize', 'fl-builder'),
							'lowercase'    	=> __('Lowercase', 'fl-builder'),
						),
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.heading-advance-title .title-suffix',
							'property'      => 'text-transform',
						),
					),
					'title_desc_transform'         => array(
						'type'          => 'select',
						'label'         => __('Short Description Transform', 'fl-builder'),
						'default' 		=> '',
						'options'       => array(
							''    	=> __('Default', 'fl-builder'),
							'uppercase'    	=> __('Uppercase', 'fl-builder'),
							'capitalize'    => __('Capitalize', 'fl-builder'),
							'lowercase'    	=> __('Lowercase', 'fl-builder'),
						),
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.heading-advance-box .heading-advance-desc',
							'property'      => 'text-transform',
						),
					),
				)
			),
			'fontsize' 	=> array(
				'title' => 'Font Size',
				'fields'        => array(
					'title_default_fontsize'         => array(
						'type'          => 'unit',
						'label'         => __('Default Font Size', 'fl-builder'),
						'default'       => '',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px',
						'responsive'  => array(
							'placeholder' => array(
								'default'    => ( isset( $global_settings->title_default_fontsize ) ) ? $global_settings->title_default_fontsize : '',
								'medium'     => ( isset( $global_settings->title_default_fontsize_medium ) ) ? $global_settings->title_default_fontsize_medium : '',
								'responsive' => ( isset( $global_settings->title_default_fontsize_responsive ) ) ? $global_settings->title_default_fontsize_responsive : '',
							)
						),
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.heading-advance *:not(i)',
							'property'      => 'font-size',
							'unit'          => 'px',
						)
					),
					'title_prefix_fontsize'         => array(
						'type'          => 'unit',
						'label'         => __('Prefix Title Size', 'fl-builder'),
						'default'       => '',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px',
						'responsive'  => array(
							'placeholder' => array(
								'default'    => ( isset( $global_settings->title_prefix_fontsize ) ) ? $global_settings->title_prefix_fontsize : '',
								'medium'     => ( isset( $global_settings->title_prefix_fontsize_medium ) ) ? $global_settings->title_prefix_fontsize_medium : '',
								'responsive' => ( isset( $global_settings->title_prefix_fontsize_responsive ) ) ? $global_settings->title_prefix_fontsize_responsive : '',
							)
						),
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.heading-advance-title .title-prefix',
							'property'      => 'font-size',
							'unit'          => 'px',
						)
					),
					'title_fontsize'         => array(
						'type'          => 'unit',
						'label'         => __('Title Size', 'fl-builder'),
						'default'       => '',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px',
						'responsive'  => array(
							'placeholder' => array(
								'default'    => ( isset( $global_settings->title_fontsize ) ) ? $global_settings->title_fontsize : '',
								'medium'     => ( isset( $global_settings->title_fontsize_medium ) ) ? $global_settings->title_fontsize_medium : '',
								'responsive' => ( isset( $global_settings->title_fontsize_responsive ) ) ? $global_settings->title_fontsize_responsive : '',
							)
						),
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.heading-advance-title .title',
							'property'      => 'font-size',
							'unit'          => 'px',
						)
					),
					'title_suffix_fontsize'         => array(
						'type'          => 'unit',
						'label'         => __('Suffix Title Size', 'fl-builder'),
						'default'       => '',
						'maxlength'     => '3',
						'size'          => '4',
						'responsive'  => array(
							'placeholder' => array(
								'default'    => ( isset( $global_settings->title_suffix_fontsize ) ) ? $global_settings->title_suffix_fontsize : '',
								'medium'     => ( isset( $global_settings->title_suffix_fontsize_medium ) ) ? $global_settings->title_suffix_fontsize_medium : '',
								'responsive' => ( isset( $global_settings->title_suffix_fontsize_responsive ) ) ? $global_settings->title_suffix_fontsize_responsive : '',
							)
						),
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.heading-advance-title .title-suffix',
							'property'      => 'font-size',
							'unit'          => 'px',
						)
					),
					'title_desc_fontsize'         => array(
						'type'          => 'unit',
						'label'         => __('Short Description Size', 'fl-builder'),
						'default'       => '',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px',
						'responsive'  => array(
							'placeholder' => array(
								'default'    => ( isset( $global_settings->title_desc_fontsize ) ) ? $global_settings->title_desc_fontsize : '',
								'medium'     => ( isset( $global_settings->title_desc_fontsize_medium ) ) ? $global_settings->title_desc_fontsize_medium : '',
								'responsive' => ( isset( $global_settings->title_desc_fontsize_responsive ) ) ? $global_settings->title_desc_fontsize_responsive : '',
							)
						),
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.heading-advance-box .heading-advance-desc',
							'property'      => 'font-size',
							'unit'          => 'px',
						)
					),
				)
			),
			'lineheight' 	=> array(
				'title' => 'Line Height',
				'fields'        => array(
					'title_default_lineheight'         => array(
						'type'          => 'unit',
						'label'         => __('Default Line Height', 'fl-builder'),
						'default'       => '',
						'maxlength'     => '3',
						'size'          => '4',
						'placeholder'   => '1.2',
						'description'   => 'em',
						'responsive'  => array(
							'placeholder' => array(
								'default'    => ( isset( $global_settings->title_default_lineheight ) ) ? $global_settings->title_default_lineheight : '1.2',
								'medium'     => ( isset( $global_settings->title_default_lineheight_medium ) ) ? $global_settings->title_default_lineheight_medium : '',
								'responsive' => ( isset( $global_settings->title_default_lineheight_responsive ) ) ? $global_settings->title_default_lineheight_responsive : '',
							)
						),
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.heading-advance *:not(i)',
							'property'      => 'line-height',
							'unit'          => 'em',
						)
					),
					'title_prefix_lineheight'         => array(
						'type'          => 'unit',
						'label'         => __('Prefix Title Line Height', 'fl-builder'),
						'default'       => '',
						'maxlength'     => '3',
						'size'          => '4',
						'placeholder'   => '1.2',
						'description'   => 'em',
						'responsive'  => array(
							'placeholder' => array(
								'default'    => ( isset( $global_settings->title_prefix_lineheight ) ) ? $global_settings->title_prefix_lineheight : '1.2',
								'medium'     => ( isset( $global_settings->title_prefix_lineheight_medium ) ) ? $global_settings->title_prefix_lineheight_medium : '',
								'responsive' => ( isset( $global_settings->title_prefix_lineheight_responsive ) ) ? $global_settings->title_prefix_lineheight_responsive : '',
							)
						),
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.heading-advance-title .title-prefix',
							'property'      => 'line-height',
							'unit'          => 'em',
						)
					),
					'title_lineheight'         => array(
						'type'          => 'unit',
						'label'         => __('Title Line Height', 'fl-builder'),
						'default'       => '',
						'maxlength'     => '3',
						'size'          => '4',
						'placeholder'   => '1.2',
						'description'   => 'em',
						'responsive'  => array(
							'placeholder' => array(
								'default'    => ( isset( $global_settings->title_lineheight ) ) ? $global_settings->title_lineheight : '1.2',
								'medium'     => ( isset( $global_settings->title_lineheight_medium ) ) ? $global_settings->title_lineheight_medium : '',
								'responsive' => ( isset( $global_settings->title_lineheight_responsive ) ) ? $global_settings->title_lineheight_responsive : '',
							)
						),
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.heading-advance-title .title',
							'property'      => 'line-height',
							'unit'          => 'em',
						)
					),
					'title_suffix_lineheight'         => array(
						'type'          => 'unit',
						'label'         => __('Suffix Title Line Height', 'fl-builder'),
						'default'       => '',
						'maxlength'     => '3',
						'size'          => '4',
						'placeholder'   => '1.2',
						'description'   => 'em',
						'responsive'  => array(
							'placeholder' => array(
								'default'    => ( isset( $global_settings->title_suffix_lineheight ) ) ? $global_settings->title_suffix_lineheight : '1.2',
								'medium'     => ( isset( $global_settings->title_suffix_lineheight_medium ) ) ? $global_settings->title_suffix_lineheight_medium : '',
								'responsive' => ( isset( $global_settings->title_suffix_lineheight_responsive ) ) ? $global_settings->title_suffix_lineheight_responsive : '',
							)
						),
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.heading-advance-title .title-suffix',
							'property'      => 'line-height',
							'unit'          => 'em',
						)
					),
					'title_desc_lineheight'         => array(
						'type'          => 'unit',
						'label'         => __('Short Description Line Height', 'fl-builder'),
						'default'       => '',
						'maxlength'     => '3',
						'size'          => '4',
						'placeholder'   => '1.2',
						'description'   => 'em',
						'responsive'  => array(
							'placeholder' => array(
								'default'    => ( isset( $global_settings->title_desc_lineheight ) ) ? $global_settings->title_desc_lineheight : '1.2',
								'medium'     => ( isset( $global_settings->title_desc_lineheight_medium ) ) ? $global_settings->title_desc_lineheight_medium : '',
								'responsive' => ( isset( $global_settings->title_desc_lineheight_responsive ) ) ? $global_settings->title_desc_lineheight_responsive : '',
							)
						),
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.heading-advance-box .heading-advance-desc',
							'property'      => 'line-height',
							'unit'          => 'em',
						)
					),
				)
			),
			'spacing' 	=> array(
				'title' => 'Spacing',
				'fields'        => array(
					'title_default_spacing'         => array(
						'type'          => 'unit',
						'label'         => __('Default Spacing', 'fl-builder'),
						'default'       => '',
						'maxlength'     => '3',
						'size'          => '4',
						'placeholder'   => '0',
						'description'   => 'px',
						'responsive'  => array(
							'placeholder' => array(
								'default'    => ( isset( $global_settings->title_default_spacing ) ) ? $global_settings->title_default_spacing : '',
								'medium'     => ( isset( $global_settings->title_default_spacing_medium ) ) ? $global_settings->title_default_spacing_medium : '',
								'responsive' => ( isset( $global_settings->title_default_spacing_responsive ) ) ? $global_settings->title_default_spacing_responsive : '',
							)
						),
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.heading-advance *:not(i)',
							'property'      => 'padding',
							'unit'          => 'px',
						)
					),
					'title_prefix_spacing'         => array(
						'type'          => 'unit',
						'label'         => __('Prefix Title Spacing Bottom', 'fl-builder'),
						'default'       => '',
						'maxlength'     => '3',
						'size'          => '4',
						'placeholder'   => '0',
						'description'   => 'px',
						'responsive'  => array(
							'placeholder' => array(
								'default'    => ( isset( $global_settings->title_prefix_spacing ) ) ? $global_settings->title_prefix_spacing : '',
								'medium'     => ( isset( $global_settings->title_prefix_spacing_medium ) ) ? $global_settings->title_prefix_spacing_medium : '',
								'responsive' => ( isset( $global_settings->title_prefix_spacing_responsive ) ) ? $global_settings->title_prefix_spacing_responsive : '',
							)
						),
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.heading-advance-title .title-prefix',
							'property'      => 'padding-bottom',
							'unit'          => 'px',
						)
					),
					'title_spacing'         => array(
						'type'          => 'unit',
						'label'         => __('Title Spacing Bottom', 'fl-builder'),
						'default'       => '',
						'maxlength'     => '3',
						'size'          => '4',
						'placeholder'   => '0',
						'description'   => 'px',
						'responsive'  => array(
							'placeholder' => array(
								'default'    => ( isset( $global_settings->title_spacing ) ) ? $global_settings->title_spacing : '',
								'medium'     => ( isset( $global_settings->title_spacing_medium ) ) ? $global_settings->title_spacing_medium : '',
								'responsive' => ( isset( $global_settings->title_spacing_responsive ) ) ? $global_settings->title_spacing_responsive : '',
							)
						),
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.heading-advance-title .title',
							'property'      => 'padding-bottom',
							'unit'          => 'px',
						)
					),
					'title_suffix_spacing'         => array(
						'type'          => 'unit',
						'label'         => __('Suffix Title Spacing Top', 'fl-builder'),
						'default'       => '',
						'maxlength'     => '3',
						'size'          => '4',
						'placeholder'   => '0',
						'description'   => 'px',
						'responsive'  => array(
							'placeholder' => array(
								'default'    => ( isset( $global_settings->title_suffix_spacing ) ) ? $global_settings->title_suffix_spacing : '',
								'medium'     => ( isset( $global_settings->title_suffix_spacing_medium ) ) ? $global_settings->title_suffix_spacing_medium : '',
								'responsive' => ( isset( $global_settings->title_suffix_spacing_responsive ) ) ? $global_settings->title_suffix_spacing_responsive : '',
							)
						),
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.heading-advance-title .title-suffix',
							'property'      => 'padding-top',
							'unit'          => 'px',
						)
					),
					'title_desc_spacing'         => array(
						'type'          => 'unit',
						'label'         => __('Short Description Spacing Top', 'fl-builder'),
						'default'       => '',
						'maxlength'     => '3',
						'size'          => '4',
						'placeholder'   => '0',
						'description'   => 'px',
						'responsive'  => array(
							'placeholder' => array(
								'default'    => ( isset( $global_settings->title_desc_spacing ) ) ? $global_settings->title_desc_spacing : '',
								'medium'     => ( isset( $global_settings->title_desc_spacing_medium ) ) ? $global_settings->title_desc_spacing_medium : '',
								'responsive' => ( isset( $global_settings->title_desc_spacing_responsive ) ) ? $global_settings->title_desc_spacing_responsive : '',
							)
						),
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.heading-advance-box .heading-advance-desc',
							'property'      => 'padding-top',
							'unit'          => 'px',
						)
					),
				)
			),
			'letter_spacing' 	=> array(
				'title' => 'Letter Spacing',
				'fields'        => array(
					'title_default_letter_spacing'         => array(
						'type'          => 'unit',
						'label'         => __('Default Letter Spacing', 'fl-builder'),
						'default'       => '',
						'maxlength'     => '3',
						'size'          => '4',
						'placeholder'   => '0',
						'description'   => 'px',
						'responsive'  => array(
							'placeholder' => array(
								'default'    => ( isset( $global_settings->title_default_letter_spacing ) ) ? $global_settings->title_default_letter_spacing : '',
								'medium'     => ( isset( $global_settings->title_default_letter_spacing_medium ) ) ? $global_settings->title_default_letter_spacing_medium : '',
								'responsive' => ( isset( $global_settings->title_default_letter_spacing_responsive ) ) ? $global_settings->title_default_letter_spacing_responsive : '',
							)
						),
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.heading-advance *:not(i)',
							'property'      => 'letter-spacing',
							'unit'          => 'px',
						)
					),
					'title_prefix_letter_spacing'         => array(
						'type'          => 'unit',
						'label'         => __('Prefix Title Letter Spacing Bottom', 'fl-builder'),
						'default'       => '',
						'maxlength'     => '3',
						'size'          => '4',
						'placeholder'   => '0',
						'description'   => 'px',
						'responsive'  => array(
							'placeholder' => array(
								'default'    => ( isset( $global_settings->title_prefix_letter_spacing ) ) ? $global_settings->title_prefix_letter_spacing : '',
								'medium'     => ( isset( $global_settings->title_prefix_letter_spacing_medium ) ) ? $global_settings->title_prefix_letter_spacing_medium : '',
								'responsive' => ( isset( $global_settings->title_prefix_letter_spacing_responsive ) ) ? $global_settings->title_prefix_letter_spacing_responsive : '',
							)
						),
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.heading-advance-title .title-prefix',
							'property'      => 'letter-spacing',
							'unit'          => 'px',
						)
					),
					'title_letter_spacing'         => array(
						'type'          => 'unit',
						'label'         => __('Title Letter Spacing Bottom', 'fl-builder'),
						'default'       => '',
						'maxlength'     => '3',
						'size'          => '4',
						'placeholder'   => '0',
						'description'   => 'px',
						'responsive'  => array(
							'placeholder' => array(
								'default'    => ( isset( $global_settings->title_letter_spacing ) ) ? $global_settings->title_letter_spacing : '',
								'medium'     => ( isset( $global_settings->title_letter_spacing_medium ) ) ? $global_settings->title_letter_spacing_medium : '',
								'responsive' => ( isset( $global_settings->title_letter_spacing_responsive ) ) ? $global_settings->title_letter_spacing_responsive : '',
							)
						),
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.heading-advance-title .title',
							'property'      => 'letter-spacing',
							'unit'          => 'px',
						)
					),
					'title_suffix_letter_spacing'         => array(
						'type'          => 'unit',
						'label'         => __('Suffix Title Letter Spacing Top', 'fl-builder'),
						'default'       => '',
						'maxlength'     => '3',
						'size'          => '4',
						'placeholder'   => '0',
						'description'   => 'px',
						'responsive'  => array(
							'placeholder' => array(
								'default'    => ( isset( $global_settings->title_suffix_letter_spacing ) ) ? $global_settings->title_suffix_letter_spacing : '',
								'medium'     => ( isset( $global_settings->title_suffix_letter_spacing_medium ) ) ? $global_settings->title_suffix_letter_spacing_medium : '',
								'responsive' => ( isset( $global_settings->title_suffix_letter_spacing_responsive ) ) ? $global_settings->title_suffix_letter_spacing_responsive : '',
							)
						),
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.heading-advance-title .title-suffix',
							'property'      => 'letter-spacing',
							'unit'          => 'px',
						)
					),
					'title_desc_letter_spacing'         => array(
						'type'          => 'unit',
						'label'         => __('Short Description Letter Spacing Top', 'fl-builder'),
						'default'       => '',
						'maxlength'     => '3',
						'size'          => '4',
						'placeholder'   => '0',
						'description'   => 'px',
						'responsive'  => array(
							'placeholder' => array(
								'default'    => ( isset( $global_settings->title_desc_letter_spacing ) ) ? $global_settings->title_desc_letter_spacing : '',
								'medium'     => ( isset( $global_settings->title_desc_letter_spacing_medium ) ) ? $global_settings->title_desc_letter_spacing_medium : '',
								'responsive' => ( isset( $global_settings->title_desc_letter_spacing_responsive ) ) ? $global_settings->title_desc_letter_spacing_responsive : '',
							)
						),
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.heading-advance-box .heading-advance-desc',
							'property'      => 'letter-spacing',
							'unit'          => 'px',
						)
					),
				)
			),
		)
	),
	'separator'        => array(
		'title'         => __('Separator', 'fl-builder'),
		'sections'      => array(
			'separator' 	=> array(
				'title' => '',
				'fields'        => array(
					'title_separator_style'           => array(
						'type'          => 'select',
						'label'         => __( 'Style', 'fl-builder' ),
						'default'       => '',
						'options'       => array(
							''			=>  'None',
							'icon-only' 	=>  'Icon Only',
							'border' 		=>  'Border Solid',
							'border-dashed'	=>  'Border Dashed',
							'border-dotted'	=>  'Border Dotted',
							'border-double'	=>  'Border Double',
						),
						'toggle'        => array(
							'border'	=> array(
								'fields'        => array('title_separator_style_weight', 'title_separator_style_width')
							),
							'border-dashed'	=> array(
								'fields'        => array('title_separator_style_weight', 'title_separator_style_width')
							),
							'border-dotted'	=> array(
								'fields'        => array('title_separator_style_weight', 'title_separator_style_width')
							),
							'border-double'	=> array(
								'fields'        => array('title_separator_style_weight', 'title_separator_style_width')
							),
						),
					),
					'title_separator_icon_position'         => array(
						'type'          => 'select',
						'label'         => __('Position', 'fl-builder'),
						'default'       => 'middle',
						'options'       => array(
							'top' 		=>  'Top',
							'middle'	=>  'Middle',
							'bottom'	=>  'Bottom',
							'left-top' 		=>  'Left Top',
							'left-middle'	=>  'Left Middle',
							'left-bottom'	=>  'Left Bottom',
							'right-top' 	=>  'Right Top',
							'right-middle'	=>  'Right Middle',
							'right-bottom'	=>  'Right Bottom',
						),
					),
					'title_separator_style_weight'           => array(
						'type'          => 'unit',
						'label'         => __( 'Style Thick', 'fl-builder' ),
						'default'       => '',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px',
						'placeholder'   => '5'
					),
					'title_separator_style_width' => array(
						'type'          => 'unit',
						'label'         => __( 'Style Width', 'fl-builder' ),
						'default'       => '',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => '%',
						'placeholder'   => '30'
					),
					'title_separator_style_spacing'           => array(
						'type'          => 'unit',
						'label'         => __( 'Spacing', 'fl-builder' ),
						'default'       => '',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px',
						'placeholder'   => '30'
					),
					'title_separator_icon_source'         => array(
						'type'          => 'select',
						'label'         => __('Source', 'fl-builder'),
						'default'       => 'icon',
						'options'       => array(
							'none'			=>  'None',
							'icon'			=>  'Icon',
							'text' 		=>  'Text',
							'image'	=>  'Image',
						),
						'toggle'        => array(
							'icon'        => array(
								'fields'        => array('title_separator_icon', 'title_separator_icon_size', 'title_separator_icon_color', 'title_separator_icon_spacing')
							),
							'text'        => array(
								'fields'        => array('title_separator_text', 'title_separator_icon_size', 'title_separator_icon_color', 'title_separator_icon_spacing')
							),
							'image'        => array(
								'fields'        => array('title_separator_img', 'title_separator_img_size', 'title_separator_icon_spacing')
							)
						)
					),
					'title_separator_icon'         => array(
						'type'          => 'icon',
						'label'         => __('Icon', 'fl-builder'),
						'show_remove'   => true
					),
					'title_separator_text'         => array(
						'type'          => 'text',
						'label'         => __('Text', 'fl-builder'),
					),
					'title_separator_img'         => array(
						'type'          => 'photo',
						'label'         => __('Image', 'fl-builder'),
						'description'         => __('Used .svg file for better quality', 'fl-builder'),
						'show_remove'	=> true
					),
					'title_separator_icon_size'           => array(
						'type'          => 'unit',
						'label'         => __( 'Icon/Text Size', 'fl-builder' ),
						'default'       => '',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px',
						'placeholder'   => '60'
					),
					'title_separator_icon_spacing'           => array(
						'type'          => 'unit',
						'label'         => __( 'Icon and Border spacing', 'fl-builder' ),
						'default'       => '',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px',
						'placeholder'   => '20'
					),
					'title_separator_img_size'           => array(
						'type'          => 'unit',
						'label'         => __( 'Image Size', 'fl-builder' ),
						'default'       => '',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px',
						'placeholder'   => '60'
					),
				)
			)
		)
	),
	'misc'        => array(
		'title'         => __('Misc', 'fl-builder'),
		'sections'      => array(
			'background_setting'         => array(
				'title'         => 'Background Setting',
				'fields'        => array(
					'background'         => array(
						'type'          => 'color',
						'label'         => __('Background Color', 'fl-builder'),
						'show_reset'    => true,
						'preview'       => array(
							'type'      => 'css',
							'selector'  => '.heading-advance',
							'property'  => 'background-color',
						)
					),
					'background_image'         => array(
						'type'          => 'photo',
						'label'         => __('Background Image', 'fl-builder'),
						'show_remove'    => true,
						'preview'       => array(
							'type'      => 'none',
						)
					),
					'bg_repeat'     => array(
						'type'          => 'select',
						'label'         => __('Repeat', 'fl-builder'),
						'default'       => 'none',
						'options'       => array(
							'no-repeat'     => _x( 'None', 'Background repeat.', 'fl-builder' ),
							'repeat'        => _x( 'Tile', 'Background repeat.', 'fl-builder' ),
							'repeat-x'      => _x( 'Horizontal', 'Background repeat.', 'fl-builder' ),
							'repeat-y'      => _x( 'Vertical', 'Background repeat.', 'fl-builder' )
						),
						'help'          => __('Repeat applies to how the image should display in the background. Choosing none will display the image as uploaded. Tile will repeat the image as many times as needed to fill the background horizontally and vertically. You can also specify the image to only repeat horizontally or vertically.', 'fl-builder'),
						'preview'         => array(
							'type'            => 'none'
						)
					),
					'bg_position'   => array(
						'type'          => 'select',
						'label'         => __('Position', 'fl-builder'),
						'default'       => 'center center',
						'options'       => array(
							'left top'      => __('Left Top', 'fl-builder'),
							'left center'   => __('Left Center', 'fl-builder'),
							'left bottom'   => __('Left Bottom', 'fl-builder'),
							'right top'     => __('Right Top', 'fl-builder'),
							'right center'  => __('Right Center', 'fl-builder'),
							'right bottom'  => __('Right Bottom', 'fl-builder'),
							'center top'    => __('Center Top', 'fl-builder'),
							'center center' => __( 'Center', 'fl-builder' ),
							'center bottom' => __('Center Bottom', 'fl-builder')
						),
						'help'          => __('Position will tell the image where it should sit in the background.', 'fl-builder'),
						'preview'         => array(
							'type'            => 'none'
						)
					),
					'bg_attachment' => array(
						'type'          => 'select',
						'label'         => __('Attachment', 'fl-builder'),
						'default'       => 'scroll',
						'options'       => array(
							'scroll'        => __( 'Scroll', 'fl-builder' ),
							'fixed'         => __( 'Fixed', 'fl-builder' )
						),
						'help'          => __('Attachment will specify how the image reacts when scrolling a page. When scrolling is selected, the image will scroll with page scrolling. This is the default setting. Fixed will allow the image to scroll within the background if fill is selected in the scale setting.', 'fl-builder'),
						'preview'         => array(
							'type'            => 'none'
						)
					),
					'bg_size'       => array(
						'type'          => 'select',
						'label'         => __('Scale', 'fl-builder'),
						'default'       => 'cover',
						'options'       => array(
							'auto'          => _x( 'None', 'Background scale.', 'fl-builder' ),
							'contain'       => __( 'Fit', 'fl-builder'),
							'cover'         => __( 'Fill', 'fl-builder')
						),
						'help'          => __('Scale applies to how the image should display in the background. You can select either fill or fit to the background.', 'fl-builder'),
						'preview'         => array(
							'type'            => 'none'
						)
					),
				)
			),
			'padding_setting'         => array(
				'title'         => 'Padding Setting',
				'fields'        => array(
					'padding_top' => array(
						'type'          => 'unit',
						'label'         => __( 'Padding Top', 'fl-builder' ),
						'default'       => '',
						'responsive'  => array(
							'placeholder' => array(
								'default'    => ( isset( $global_settings->padding_top ) ) ? $global_settings->padding_top : '',
								'medium'     => ( isset( $global_settings->padding_top_medium ) ) ? $global_settings->padding_top_medium : '',
								'responsive' => ( isset( $global_settings->padding_top_responsive ) ) ? $global_settings->padding_top_responsive : '',
							)
						),
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.heading-advance',
							'property'      => 'padding-top',
							'unit'          => 'px',
						),
					),
					'padding_bottom' => array(
						'type'          => 'unit',
						'label'         => __( 'Padding Bottom', 'fl-builder' ),
						'default'       => '',
						'responsive'  => array(
							'placeholder' => array(
								'default'    => ( isset( $global_settings->padding_bottom ) ) ? $global_settings->padding_bottom : '',
								'medium'     => ( isset( $global_settings->padding_bottom_medium ) ) ? $global_settings->padding_bottom_medium : '',
								'responsive' => ( isset( $global_settings->padding_bottom_responsive ) ) ? $global_settings->padding_bottom_responsive : '',
							)
						),
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.heading-advance',
							'property'      => 'padding-bottom',
							'unit'          => 'px',
						),
					),
					'padding_left' => array(
						'type'          => 'unit',
						'label'         => __( 'Padding Left', 'fl-builder' ),
						'default'       => '',
						'responsive'  => array(
							'placeholder' => array(
								'default'    => ( isset( $global_settings->padding_left ) ) ? $global_settings->padding_left : '',
								'medium'     => ( isset( $global_settings->padding_left_medium ) ) ? $global_settings->padding_left_medium : '',
								'responsive' => ( isset( $global_settings->padding_left_responsive ) ) ? $global_settings->padding_left_responsive : '',
							)
						),
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.heading-advance',
							'property'      => 'padding-left',
							'unit'          => 'px',
						),
					),
					'padding_right' => array(
						'type'          => 'unit',
						'label'         => __( 'Padding Right', 'fl-builder' ),
						'default'       => '',
						'responsive'  => array(
							'placeholder' => array(
								'default'    => ( isset( $global_settings->padding_right ) ) ? $global_settings->padding_right : '',
								'medium'     => ( isset( $global_settings->padding_right_medium ) ) ? $global_settings->padding_right_medium : '',
								'responsive' => ( isset( $global_settings->padding_right_responsive ) ) ? $global_settings->padding_right_responsive : '',
							)
						),
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.heading-advance',
							'property'      => 'padding-right',
							'unit'          => 'px',
						),
					),
				)
			),
		)
	),
));