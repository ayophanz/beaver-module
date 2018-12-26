<?php

/**
 * @class counterBar
 */
class counterBar extends FLBuilderModule {

	/** 
	 * @method __construct
	 */  
	public function __construct()
	{
		global $foldercategory;
		parent::__construct(array(
			'name'          	=> __('Counter Bar', 'fl-builder'),
			'description'   	=> __('Display Bar Counter.', 'fl-builder'),
			'category'      	=> __($foldercategory, 'fl-builder'),
			'partial_refresh'	=> true
		));
		// Register and enqueue your own.
	}
	/**
	 * @method get_classname
	 */
	public function get_classname()
	{
		$classname = 'counterbar';
		return $classname;
	}
}

$global_settings = FLBuilderModel::get_global_settings();

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('counterBar', array(
	'general'         => array(
		'title'         => __('Counter', 'fl-builder'),
		'sections'      => array(
			'general'       => array(
				'title'         => '',
				'fields'        => array(
					'counterbar_style'         => array(
						'type'          => 'select',
						'label'         => __('Style', 'fl-builder'),
						'default'       => '',
						'options'       => array(
							''			=>  'Default',
							'circle'	=>  'Circle',
						),
						'toggle'        => array(
							''        => array(
								'fields'        => array('counterbar_alignment'),
							),
							'circle'        => array(
								'fields'        => array('countercircle_percentage'),
								'tabs'        => array('circle_setting')
							),
						)
					),
					'countercircle_percentage'       => array(  
						'type'          => 'unit',
						'label'         => 'Circle Percentage',
						'default'   => '100',
						'placeholder'   => '50',
						'maxlength'     => '2',
						'size'          => '3',
						'description'   => '%',
					),
					'counterbar_icon_source'         => array(
						'type'          => 'select',
						'label'         => __('Icon Source', 'fl-builder'),
						'default'       => 'icon',
						'options'       => array(
							'none'	=>  'None',
							'icon'	=>  'Icon',
							'image'	=>  'Image',
						),
						'toggle'        => array(
							'icon'        => array(
								'fields'        => array('counterbar_icon', 'counterbar_icon_size', 'counterbar_icon_color')
							),
							'image'        => array(
								'fields'        => array('counterbar_icon_img', 'counterbar_icon_img_size')
							)
						)
					),
					'counterbar_alignment'       => array(  
						'type'          => 'select',
						'label'         => 'Alignment',
						'default'       => ' center',
						'options'       => array(
							' center'        => __('Center', 'fl-builder'),
							' left'         => __('Left', 'fl-builder'),
							' right'         => __('Right', 'fl-builder')
						)
					),
					'counterbar_icon'       => array(
						'type'          => 'icon',
						'label'         => 'Icon',
						'show_remove'	=> true,
					),
					'counterbar_icon_img'         => array(
						'type'          => 'photo',
						'label'         => __('Image', 'fl-builder'),
						'description'         => __('Used .svg file for better quality', 'fl-builder'),
						'show_remove'	=> true,
					),
					'counterbar_number_prepend'       => array(  
						'type'          => 'text',
						'label'         => 'Number Prepend',
						'default'   => '',
						'placeholder'   => '$',
						'maxlength'     => '4',
						'size'          => '5',
						'description'   => 'Text Before the Number',
					),
					'counterbar_number'       => array(  
						'type'          => 'unit',
						'label'         => 'Number',
						'default'   => '1000',
						'placeholder'   => '1000',
						'maxlength'     => '14',
						'size'          => '15',
						'description'   => 'Value',
					),
					'counterbar_number_append'       => array(  
						'type'          => 'text',
						'label'         => 'Number Append',
						'default'   => '',
						'placeholder'   => '%',
						'maxlength'     => '4',
						'size'          => '5',
						'description'   => 'Text After the Number',
					),
					'counterbar_title'       => array(
						'type'          => 'text',
						'label'         => 'Title',
						'default'   => __('CUSTOMERS SERVED', 'fl-builder'),
						'placeholder'   => __('Enter Label', 'fl-builder'),
						'preview'		=> array(
							'type'		=> 'text',
							'selector'		=> '.counterbar-title',
						),
					),
					'counterbar_delay'       => array(  
						'type'          => 'unit',
						'label'         => 'Delay',
						'default'   => '5',
						'placeholder'   => '5',
						'maxlength'     => '2',
						'size'          => '3',
						'description'   => 'Second',
					),
					'counterbar_position'       => array(  
						'type'          => 'select',
						'label'         => 'Icon Position',
						'default'       => 'top',
						'options'       => array(
							'top'       => __('Top', 'fl-builder'),
							'middle'   => __('Middle', 'fl-builder'),
							'bottom'    => __('Bottom', 'fl-builder')
						)
					),
				)
			),
		)
	),
	'circle_setting'         => array(
		'title'         => __('Circle Setting', 'fl-builder'),
		'sections'      => array(
			'size'       => array(
				'title'         => '',
				'fields'        => array(
					'counterbar_circle_size'       => array(  
						'type'          => 'unit',
						'label'         => 'Circle Size',
						'default'   => '',
						'placeholder'   => '224',
						'maxlength'     => '4',
						'description'   => 'px',
						'preview'		=> array(
							'type'		=> 'css',
							'selector'		=> '.counterbar-circle .svg',
							'property'		=> 'height',
							'unit'			=> 'px',
						),
						'responsive'  => array(
							'placeholder' => array(
								'default'    => ( isset( $global_settings->counterbar_circle_size ) ) ? $global_settings->counterbar_circle_size : '224',
								'medium'     => ( isset( $global_settings->counterbar_circle_size_medium ) ) ? $global_settings->counterbar_circle_size_medium : '',
								'responsive' => ( isset( $global_settings->counterbar_circle_size_responsive ) ) ? $global_settings->counterbar_circle_size_responsive : '',
							)
						),
					),
					'counterbar_circle_bg_color'       => array(  
						'type'          => 'color',
						'label'         => 'Circle Bg Color',
						'default'   	=> '',
						'preview'		=> array(
							'type'		=> 'css',
							'selector'		=> '.counterbar-circle .svg circle.bar',
							'property'		=> 'stroke',
						),
					),
					'counterbar_circle_color'       => array(  
						'type'          => 'color',
						'label'         => 'Circle Color',
						'default'   	=> '',
						'preview'		=> array(
							'type'		=> 'css',
							'selector'		=> '.counterbar-circle .svg circle.bar-counter',
							'property'		=> 'stroke',
						),
					),
					'counterbar_circle_width'       => array(  
						'type'          => 'unit',
						'label'         => 'Stroke',
						'default'   => '5',
						'placeholder'   => '5',
						'maxlength'     => '2',
						'size'          => '3',
						'description'   => 'width',
						'preview'		=> array(
							'type'		=> 'css',
							'selector'     => '.counterbar-circle .svg circle.bar',
							'property'     => 'stroke-width',
							'unit'     => 'px'
						),
					),
					'counterbar_circle_width_opacity'       => array(  
						'type'          => 'unit',
						'label'         => 'Stroke Opacity',
						'default'   => '',
						'placeholder'   => '100',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => '%',
					),
					'counterbar_circle_width_counter'       => array(  
						'type'          => 'unit',
						'label'         => 'Stroke Counter',
						'default'   => '',
						'placeholder'   => '',
						'maxlength'     => '2',
						'size'          => '3',
						'description'   => 'width',
						'preview'		=> array(
							'type'		=> 'css',
							'selector'     => '.counterbar-circle .svg circle.bar-counter',
							'property'     => 'stroke-width',
							'unit'     => 'px'
						),
					),
					'counterbar_circle_width_counter_opacity'       => array(  
						'type'          => 'unit',
						'label'         => 'Stroke Counter Opacity',
						'default'   => '',
						'placeholder'   => '100',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => '%',
					),
				)
			),
		)
	),
	'setting'         => array(
		'title'         => __('Setting', 'fl-builder'),
		'sections'      => array(
			'size'       => array(
				'title'         => 'Size',
				'fields'        => array(
					'counterbar_icon_size'       => array(  
						'type'        => 'unit',
						'label'         => __( 'Icon Size', 'fl-builder' ),
						'default'   => '',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px',
						'responsive'  => array(
							'placeholder' => array(
								'default'    => ( isset( $global_settings->counterbar_icon_size ) ) ? $global_settings->counterbar_icon_size : '60',
								'medium'     => ( isset( $global_settings->counterbar_icon_size_medium ) ) ? $global_settings->counterbar_icon_size_medium : '',
								'responsive' => ( isset( $global_settings->counterbar_icon_size_responsive ) ) ? $global_settings->counterbar_icon_size_responsive : '',
							)
						),
						'preview'         => array(
							'type'          => 'css',
							'selector'      => '.counterbar-icon',
							'property'      => 'font-size',
							'unit'        	=> 'px',
						),
					),
					'counterbar_icon_img_size'       => array(  
						'type'        => 'unit',
						'label'         => __( 'Image Size', 'fl-builder' ),
						'default'   => '',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px',
						'responsive'  => array(
							'placeholder' => array(
								'default'    => ( isset( $global_settings->counterbar_icon_img_size ) ) ? $global_settings->counterbar_icon_img_size : '60',
								'medium'     => ( isset( $global_settings->counterbar_icon_img_size_medium ) ) ? $global_settings->counterbar_icon_img_size_medium : '',
								'responsive' => ( isset( $global_settings->counterbar_icon_img_size_responsive ) ) ? $global_settings->counterbar_icon_img_size_responsive : '',
							)
						),
						'preview'         => array(
							'type'          => 'css',
							'selector'      => '.counterbar-icon',
							'property'      => 'width',
							'unit'        	=> 'px',
						),
					),
					'counterbar_number_size'       => array(  
						'type'        => 'unit',
						'label'         => __( 'Number Size', 'fl-builder' ),
						'default'   => '',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px',
						'responsive'  => array(
							'placeholder' => array(
								'default'    => ( isset( $global_settings->counterbar_number_size ) ) ? $global_settings->counterbar_number_size : '40',
								'medium'     => ( isset( $global_settings->counterbar_number_size_medium ) ) ? $global_settings->counterbar_number_size_medium : '',
								'responsive' => ( isset( $global_settings->counterbar_number_size_responsive ) ) ? $global_settings->counterbar_number_size_responsive : '',
							)
						),
						'preview'         => array(
							'type'          => 'css',
							'selector'      => '.counterbar-number',
							'property'      => 'font-size',
							'unit'        	=> 'px',
						),
					),
					'counterbar_title_size'       => array(  
						'type'        => 'unit',
						'label'         => __( 'Title Size', 'fl-builder' ),
						'default'   => '',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px',
						'responsive'  => array(
							'placeholder' => array(
								'default'    => ( isset( $global_settings->counterbar_title_size ) ) ? $global_settings->counterbar_title_size : '16',
								'medium'     => ( isset( $global_settings->counterbar_title_size_medium ) ) ? $global_settings->counterbar_title_size_medium : '',
								'responsive' => ( isset( $global_settings->counterbar_title_size_responsive ) ) ? $global_settings->counterbar_title_size_responsive : '',
							)
						),
						'preview'         => array(
							'type'          => 'css',
							'selector'      => '.counterbar-title',
							'property'      => 'font-size',
							'unit'        	=> 'px',
						),
					),
				)
			),
			'color'       => array(
				'title'         => 'Color',
				'fields'        => array(
					'counterbar_icon_color'       => array(  
						'type'          => 'color',
						'label'         => 'Icon Color',
						'default'   => 'f7b91a',
						'show_reset'   => true,
						'preview'		=> array(
							'type'		=> 'css',
							'selector'		=> '.counterbar-icon',
							'property'		=> 'color',
						),
					),
					'counterbar_number_color'       => array(  
						'type'          => 'color',
						'label'         => 'Number Color',
						'default'   => '333333',
						'show_reset'   => true,
						'preview'		=> array(
							'type'		=> 'css',
							'selector'		=> '.counterbar-number',
							'property'		=> 'color',
						),
					),
					'counterbar_title_color'       => array(  
						'type'          => 'color',
						'label'         => 'Title Color',
						'default'   => '333333',
						'show_reset'   => true,
						'preview'		=> array(
							'type'		=> 'css',
							'selector'		=> '.counterbar-title',
							'property'		=> 'color',
						),
					),
				)
			),
			'font'       => array(
				'title'         => 'Font',
				'fields'        => array(
					'counterbar_number_tag'           => array(
						'type'          => 'select',
						'label'         => __( 'Number Tag', 'fl-builder' ),
						'default'       => 'h2',
						'options'       => array(
							'h1'            =>  'h1',
							'h2'            =>  'h2',
							'h3'            =>  'h3',
							'h4'            =>  'h4',
							'h5'            =>  'h5',
							'h6'            =>  'h6',
							'div'            => 'div',
						)
					),
					'counterbar_number_font'       => array(  
						'type'          => 'font',
						'label'         => 'Number Font',
						'preview'		=> array(
							'type'		=> 'font',
							'selector'		=> '.counterbar-title',
						),
					),
					'counterbar_title_font'       => array(  
						'type'          => 'font',
						'label'         => 'Title Font',
						'preview'		=> array(
							'type'		=> 'font',
							'selector'		=> '.counterbar-title',
						),
					),
				)
			),
			'font_weight'       => array(
				'title'         => 'Font Weight',
				'fields'        => array(
					'counterbar_number_font_weight'       => array(  
						'type'          => 'select',
						'label'         => __('Number Font Weight', 'fl-builder'),
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
						'preview'		=> array(
							'type'		=> 'css',
							'selector'		=> '.counterbar-number',
							'property'		=> 'font-weight',
						),
					),
					'counterbar_title_font_weight'       => array(  
						'type'          => 'select',
						'label'         => __('Title Font Weight', 'fl-builder'),
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
						'preview'		=> array(
							'type'		=> 'css',
							'selector'		=> '.counterbar-title',
							'property'		=> 'font-weight',
						),
					),
				)
			),
			'spacing'       => array(
				'title'         => 'Spacing',
				'fields'        => array(
					'counterbar_number_margin_bottom'       => array(  
						'type'        => 'unit',
						'label'         => 'Number Margin Bottom',
						'default'   => '',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px',
						'preview'         => array(
							'type'          => 'css',
							'selector'      => '.counterbar-number',
							'property'      => 'margin-bottom',
							'unit'        	=> 'px',
						),
					),
					'counterbar_icon_margin_top'       => array(  
						'type'        => 'unit',
						'label'         => 'Icon Margin Top',
						'default'   => '',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px',
						'responsive'  => array(
							'placeholder' => array(
								'default'    => ( isset( $global_settings->counterbar_icon_margin_top ) ) ? $global_settings->counterbar_icon_margin_top : '',
								'medium'     => ( isset( $global_settings->counterbar_icon_margin_top_medium ) ) ? $global_settings->counterbar_icon_margin_top_medium : '',
								'responsive' => ( isset( $global_settings->counterbar_icon_margin_top_responsive ) ) ? $global_settings->counterbar_icon_margin_top_responsive : '',
							)
						),
						'preview'         => array(
							'type'          => 'css',
							'selector'      => '.counterbar-icon',
							'property'      => 'margin-top',
							'unit'        	=> 'px',
						),
					),
					'counterbar_icon_margin_bottom'       => array(  
						'type'        => 'unit',
						'label'         => 'Icon Margin Bottom',
						'default'   => '',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px',
						'responsive'  => array(
							'placeholder' => array(
								'default'    => ( isset( $global_settings->counterbar_icon_margin_bottom ) ) ? $global_settings->counterbar_icon_margin_bottom : '',
								'medium'     => ( isset( $global_settings->counterbar_icon_margin_bottom_medium ) ) ? $global_settings->counterbar_icon_margin_bottom_medium : '',
								'responsive' => ( isset( $global_settings->counterbar_icon_margin_bottom_responsive ) ) ? $global_settings->counterbar_icon_margin_bottom_responsive : '',
							)
						),
						'preview'         => array(
							'type'          => 'css',
							'selector'      => '.counterbar-icon',
							'property'      => 'margin-bottom',
							'unit'        	=> 'px',
						),
					),
				)
			),
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
							'selector'  => '.counterbar',
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
							'selector'      => '.counterbar',
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
							'selector'      => '.counterbar',
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
							'selector'      => '.counterbar',
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
							'selector'      => '.counterbar',
							'property'      => 'padding-right',
							'unit'          => 'px',
						),
					),
				)
			),
		)
	),
));
