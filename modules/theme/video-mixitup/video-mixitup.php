<?php
/**
 * @class videoMixItUpModule
 */
class videoMixItUpModule extends FLBuilderModule {

	/** 
	 * @method __construct
	 */  
	public function __construct()
	{
		global $foldercategory;
		parent::__construct(array(
			'name'          	=> __('Video - MixItUp', 'fl-builder'),
			'description'   	=> __('Display Video from Posttype.', 'fl-builder'),
			'category'      	=> __($foldercategory, 'fl-builder'),
			'partial_refresh'	=> true
		));
		// Register and enqueue your own.
		$this->add_js( 'mixitup', $this->url . 'js/jquery.mixitup.min.js', array(), '', true );
		$this->add_js( 'magnific', $this->url . 'js/magnific/magnific.js', array(), '', true );
		$this->add_css( 'magnific', $this->url . 'js/magnific/magnific.css' );
	}
	
	/**
	 * @method get_classname
	 */
	public function get_classname()
	{
		$classname = 'video-mixitup'.$this->settings->grid_style;
		return $classname;
	}
}

/*Testimonial Avatar Size*/
add_image_size( 'video-mixitup-large', 500 , 370, true );
add_image_size( 'video-mixitup', 375 , 277, true );



// Get Category http://stackoverflow.com/questions/21009516/get-categories-from-wordpress-woocommerce
$taxonomy     = 'video_category';
$orderby      = 'name';  
$show_count   = 0;      // 1 for yes, 0 for no
$pad_counts   = 0;      // 1 for yes, 0 for no
$hierarchical = 1;      // 1 for yes, 0 for no  
$title        = '';  
$empty        = 0;
$args = array(
	 'taxonomy'     => $taxonomy,
	 'orderby'      => $orderby,
	 'show_count'   => $show_count,
	 'pad_counts'   => $pad_counts,
	 'hierarchical' => $hierarchical,
	 'title_li'     => $title,
	 'hide_empty'   => $empty
);
$all_categories = get_categories( $args );
$posttypeCategories = array();
foreach ($all_categories as $cat) {
	if($cat->category_parent == 0) {
		$category_id = $cat->term_id;       
		$posttypeCategories[$cat->slug] = ucfirst($cat->name);
			//Child Category
			$args2 = array(
					'taxonomy'     => $taxonomy,
					'child_of'     => 0,
					'parent'       => $category_id,
					'orderby'      => $orderby,
					'show_count'   => $show_count,
					'pad_counts'   => $pad_counts,
					'hierarchical' => $hierarchical,
					'title_li'     => $title,
					'hide_empty'   => $empty
			);
			$sub_cats = get_categories( $args2 );
			if($sub_cats) {
				foreach($sub_cats as $sub_category) {
					$posttypeCategories[$sub_category->slug] = '-- '.ucfirst($sub_category->name);
				}   
			}
	}       
}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('videoMixItUpModule', array(
	'slides'         => array(
		'title'         => __('General', 'fl-builder'),
		'sections'      => array(
			'general'       => array(
				'title'         => 'Source',
				'fields'        => array(
					'categories'         => array(
						'type'          => 'select',
						'label'         => __('Categories', 'fl-builder'),
						'default'       => '',
						'options'       => array(
							''    		=> __('All', 'fl-builder'),
							'selected'    		=> __('Selected', 'fl-builder'),
						),
						'toggle'        => array(
							'selected'        => array(
								'fields'        => array('selected_categories')
							),
						)
					),
					'selected_categories'         => array(
						'type'          => 'select',
						'label'         => __('Select Category', 'fl-builder'),
						'options'       => $posttypeCategories,
						'multi-select'  => true
					),
					'categories_nav'         => array(
						'type'          => 'select',
						'label'         => __('Show Category Navigation', 'fl-builder'),
						'default'       => 'grid-4',
						'options'       => array(
							''    		=> __('Yes', 'fl-builder'),
							'hide'    		=> __('No', 'fl-builder'),
						),
						'toggle'        => array(
							''        => array(
								'tabs'        => array('button')
							),
						)
					),
				)
			),
			'content'       => array(
				'title'         => 'Content',
				'fields'        => array(
					'totalpost'         => array(
						'type'          => 'unit',
						'label'         => __('Total Post', 'fl-builder'),
						'default'       => __('9', 'fl-builder'),
						'placeholder'       => __('9', 'fl-builder'),
						'maxlength'     => '2',
						'size'          => '1',
					),
					'orderby'         => array(
						'type'          => 'select',
						'label'         => __('Order By', 'fl-builder'),
						'default'       => 'date',
						'options'       => array(
							'none'    		=> __('none', 'fl-builder'),
							'ID'    		=> __('ID', 'fl-builder'),
							'title'    		=> __('title', 'fl-builder'),
							'name'    		=> __('name', 'fl-builder'),
							'date'    		=> __('date', 'fl-builder'),
							'modified'    	=> __('modified', 'fl-builder'),
							'rand'    		=> __('rand', 'fl-builder'),
							'menu_order'    		=> __('menu_order', 'fl-builder'),
							''    		=> __('', 'fl-builder'),
						),
					),
					'order'         => array(
						'type'          => 'select',
						'label'         => __('Order By', 'fl-builder'),
						'default'       => '',
						'options'       => array(
							'DESC'    		=> __('DESCENDING', 'fl-builder'),
							'ASC'    		=> __('ASCENDING', 'fl-builder'),
						),
					),
					'offset'         => array(
						'type'          => 'unit',
						'label'         => __('Offset', 'fl-builder'),
						'default'       => '0',
						'help'       	=> 'Skip this many posts that match the specified criteria.',
					),
				)
			),
			'grid'       => array(
				'title'         => 'Grids',
				'fields'        => array(
					'grid'         => array(
						'type'          => 'select',
						'label'         => __('Number of Column', 'fl-builder'),
						'default'       => 'grid-4',
						'options'       => array(
							'grid-2'    		=> __('Column 6', 'fl-builder'),
							'grid-2-5'    		=> __('Column 5', 'fl-builder'),
							'grid-3'    		=> __('Column 4', 'fl-builder'),
							'grid-4'    		=> __('Column 3', 'fl-builder'),
							'grid-6'    		=> __('Column 2', 'fl-builder'),
							'grid-12'    		=> __('Column 1', 'fl-builder'),
						)
					),
					'effects'         => array(
						'type'          => 'select',
						'label'         => __('Animation Effects', 'fl-builder'),
						'default'       => 'rotateX',
						'options'       => array(
							'scale'    		=> __('scale', 'fl-builder'),
							'translateX'    => __('translateX', 'fl-builder'),
							'translateY'    => __('translateY', 'fl-builder'),
							'translateZ'    => __('translateZ', 'fl-builder'),
							'rotateX'    	=> __('rotateX', 'fl-builder'),
							'rotateY'    	=> __('rotateY', 'fl-builder'),
							'rotateZ'    	=> __('rotateZ', 'fl-builder'),
							'stagger'    	=> __('stagger', 'fl-builder'),
						)
					),
					'duration'         => array(
						'type'          => 'select',
						'label'         => __('Animation Duration', 'fl-builder'),
						'default'       => '400',
						'options'       => array(
							'300'    		=> __('300', 'fl-builder'),
							'400'    		=> __('400', 'fl-builder'),
							'500'    		=> __('500', 'fl-builder'),
							'600'    		=> __('600', 'fl-builder'),
							'700'    		=> __('700', 'fl-builder'),
							'800'    		=> __('800', 'fl-builder'),
							'900'    		=> __('900', 'fl-builder'),
							'1000'    		=> __('1000', 'fl-builder'),
						)
					),
				)
			),
			'grids_link'       => array(
				'title'         => 'Grids Link',
				'fields'        => array(
					'image_link'         => array(
						'type'          => 'select',
						'label'         => __('Enable Image Link', 'fl-builder'),
						'default'       => 'yes',
						'options'       => array(
							'yes'    		=> __('Yes', 'fl-builder'),
							''    		=> __('No', 'fl-builder'),
						)
					),
					'button_link'         => array(
						'type'          => 'select',
						'label'         => __('Button Link', 'fl-builder'),
						'default'       => '',
						'options'       => array(
							''    		=> __('Post', 'fl-builder'),
							'lightbox'    	=> __('Modal', 'fl-builder'),
						)
					),
				)
			)
		)
	),
	'button'        => array(
		'title'         => __('Button Style', 'fl-builder'),
		'sections'      => array(
			'button_font'       => array(
				'title'         => 'Button Font',
				'fields'        => array(
					'button_font_weight'           => array(
						'type'          => 'select',
						'label'         => __( 'Button Font Weight', 'fl-builder' ),
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
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.video-filter .video-button',
							'property'      => 'font-weight',
						)
					),
					'button_text_transform'           => array(
						'type'          => 'select',
						'label'         => __( 'Button Text Transform', 'fl-builder' ),
						'default' 		=> '',
						'options'       => array(
							''    		=> __('Default', 'fl-builder'),
							'none'    		=> __('None', 'fl-builder'),
							'capitalize'   => __('Capitalize', 'fl-builder'),
							'uppercase'    	=> __('Uppercase', 'fl-builder'),
							'lowercase'    	=> __('Lowercase', 'fl-builder'),
						),
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.video-filter .video-button',
							'property'      => 'text-transform',
						)
					),
				)
			),
			'button_color'       => array(
				'title'         => 'Button Color',
				'fields'        => array(
					'button_bg_color'           => array(
						'type'          => 'color',
						'label'         => __( 'Button Bg Color', 'fl-builder' ),
						'default' 		=> '8bd3c1',
						'show_reset' 	=> true,
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.video-filter .video-button:not(.active)',
							'property'      => 'background-color',
						)
					),
					'button_text_color'           => array(
						'type'          => 'color',
						'label'         => __( 'Button Text Color', 'fl-builder' ),
						'default' 		=> 'ffffff',
						'show_reset' 	=> true,
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.video-filter .video-button:not(.active)',
							'property'      => 'color',
						)
					),
					'button_bg_color_active'           => array(
						'type'          => 'color',
						'label'         => __( 'Button Bg Color Active', 'fl-builder' ),
						'default' 		=> 'f5f4f4',
						'show_reset' 	=> true,
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.video-filter .video-button.active',
							'property'      => 'background-color',
						)
					),
					'button_text_color_active'           => array(
						'type'          => 'color',
						'label'         => __( 'Button Text Color Active', 'fl-builder' ),
						'default' 		=> '2b353a',
						'show_reset' 	=> true,
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.video-filter .video-button.active',
							'property'      => 'color',
						)
					),
					'button_radius'           => array(
						'type'          => 'unit',
						'label'         => __( 'Button Radius', 'fl-builder' ),
						'default' 		=> '3',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px',
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.video-filter .video-button',
							'property'      => 'border-radius',
							'unit'      	=> 'px',
						)
					),
					'buttons_margin'           => array(
						'type'          => 'unit',
						'label'         => __( 'Button Margin', 'fl-builder' ),
						'default' 		=> '',
						'description'   => 'px',
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.video-filter .video-button',
							'property'      => 'margin',
							'unit'      	=> 'px',
						)
					),
					'buttons_spacing'           => array(
						'type'          => 'unit',
						'label'         => __( 'Buttons Spacing Bottom', 'fl-builder' ),
						'default' 		=> '',
						'description'   => 'px',
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.video-filter',
							'property'      => 'margin-bottom',
							'unit'      	=> 'px',
						)
					),
				)
			),
			'button_padding'       => array(
				'title'         => 'Button Padding',
				'fields'        => array(
					'button_padding_top'           => array(
						'type'          => 'unit',
						'label'         => __( 'Button Padding Top', 'fl-builder' ),
						'default' 		=> '8',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px',
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.video-filter .video-button',
							'property'      => 'padding-top',
							'unit'      	=> 'px',
						)
					),
					'button_padding_bottom'           => array(
						'type'          => 'unit',
						'label'         => __( 'Button Padding Bottom', 'fl-builder' ),
						'default' 		=> '8',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px',
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.video-filter .video-button',
							'property'      => 'padding-bottom',
							'unit'      	=> 'px',
						)
					),
					'button_padding_left'           => array(
						'type'          => 'unit',
						'label'         => __( 'Button Padding Left', 'fl-builder' ),
						'default' 		=> '8',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px',
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.video-filter .video-button',
							'property'      => 'padding-left',
							'unit'      	=> 'px',
						)
					),
					'button_padding_right'           => array(
						'type'          => 'unit',
						'label'         => __( 'Button Padding Right', 'fl-builder' ),
						'default' 		=> '8',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px',
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.video-filter .video-button',
							'property'      => 'padding-right',
							'unit'      	=> 'px',
						)
					),
				)
			),
		)
	),
	'grid_styles'        => array(
		'title'         => __('Grid Styles', 'fl-builder'),
		'sections'      => array(
			'grid_styles'       => array(
				'title'         => 'Grid Styles',
				'fields'        => array(
					'grid_style'           => array(
						'type'          => 'select',
						'label'         => __( 'Grid Styles', 'fl-builder' ),
						'default'       => '',
						'options'       => array(
							''            =>  'On Hover',
							' blurb'		=>  'Blurb',
						),
					),
					'grid_spacing'           => array(
						'type'          => 'unit',
						'label'         => __( 'Grid Items Spacing', 'fl-builder' ),
						'default' 		=> '30',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px',
					),
					'grid_info_bg_color'           => array(
						'type'          => 'color',
						'label'         => __( 'Grid Info Bg Color', 'fl-builder' ),
						'default' 		=> '363f48',
						'show_reset' 	=> true,
					),
					'grid_info_color'           => array(
						'type'          => 'color',
						'label'         => __( 'Grid Info Color', 'fl-builder' ),
						'default' 		=> 'fff',
						'show_reset' 	=> true,
					),
				)
			),
			'grid_info_padding'       => array(
				'title'         => 'Grid Info Padding',
				'fields'        => array(
					'grid_info_padding_top'           => array(
						'type'          => 'unit',
						'label'         => __( 'Grid Info Padding Top', 'fl-builder' ),
						'default' 		=> '',
						'placeholder' 	=> '20',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px',
					),
					'grid_info_padding_bottom'           => array(
						'type'          => 'unit',
						'label'         => __( 'Grid Info Padding Bottom', 'fl-builder' ),
						'default' 		=> '',
						'placeholder' 	=> '20',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px',
					),
					'grid_info_padding_left'           => array(
						'type'          => 'unit',
						'label'         => __( 'Grid Info Padding Left', 'fl-builder' ),
						'default' 		=> '',
						'placeholder' 	=> '20',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px',
					),
					'grid_info_padding_right'           => array(
						'type'          => 'unit',
						'label'         => __( 'Grid Info Padding Right', 'fl-builder' ),
						'default' 		=> '',
						'placeholder' 	=> '20',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px',
					),
				)
			),
			'grid_info_title'       => array(
				'title'         => 'Grid Info Title',
				'fields'        => array(
					'grid_info_title_color'           => array(
						'type'          => 'color',
						'label'         => __( 'Grid Info Title Color', 'fl-builder' ),
						'default' 		=> 'fff',
						'show_reset' 	=> true,
					),
					'grid_info_title_tag'           => array(
						'type'          => 'select',
						'label'         => __( 'Grid Info Title Tag', 'fl-builder' ),
						'default'       => 'h4',
						'options'       => array(
							'h1'            =>  'h1',
							'h2'            =>  'h2',
							'h3'            =>  'h3',
							'h4'            =>  'h4',
							'h5'            =>  'h5',
							'h6'            =>  'h6',
							'div'           =>  'div',
						)
					),
					'grid_info_title_size'           => array(
						'type'          => 'unit',
						'label'         => __( 'Grid Info Title Size', 'fl-builder' ),
						'default' 		=> '',
						'placeholder' 	=> '20',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px',
					),
					'grid_info_title_weight'           => array(
						'type'          => 'select',
						'label'         => __( 'Grid Info Title Font Weight', 'fl-builder' ),
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
					'grid_info_title_transform'           => array(
						'type'          => 'select',
						'label'         => __( 'Grid Info Title Transform', 'fl-builder' ),
						'default' 		=> '',
						'options'       => array(
							''    		=> __('Default', 'fl-builder'),
							'none'    		=> __('None', 'fl-builder'),
							'capitalize'   => __('Capitalize', 'fl-builder'),
							'uppercase'    	=> __('Uppercase', 'fl-builder'),
							'lowercase'    	=> __('Lowercase', 'fl-builder'),
						),
					),
					'grid_info_title_spacing'           => array(
						'type'          => 'unit',
						'label'         => __( 'Grid Info Title Spacing', 'fl-builder' ),
						'default' 		=> '',
						'placeholder' 	=> '10',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px',
					),
				)
			),
			'grid_info_category'       => array(
				'title'         => 'Grid Info Category',
				'fields'        => array(
					'grid_category'           => array(
						'type'          => 'select',
						'label'         => __( 'Grid Category', 'fl-builder' ),
						'default'       => '',
						'options'       => array(
							''            =>  'Disable',
							'enable'      =>  'Enable',
						)
					),
					'grid_category_color'           => array(
						'type'          => 'color',
						'label'         => __( 'Grid Category Color', 'fl-builder' ),
						'default' 		=> '',
						'show_reset' 	=> true,
					),
					'grid_category_color_hover'           => array(
						'type'          => 'color',
						'label'         => __( 'Grid Category Color Hover', 'fl-builder' ),
						'default' 		=> '',
						'show_reset' 	=> true,
					),
					'grid_category_size'           => array(
						'type'          => 'unit',
						'label'         => __( 'Grid Category Size', 'fl-builder' ),
						'default' 		=> '',
						'placeholder' 	=> '20',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px',
					),
					'grid_category_weight'           => array(
						'type'          => 'select',
						'label'         => __( 'Grid Category Font Weight', 'fl-builder' ),
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
					'grid_category_transform'           => array(
						'type'          => 'select',
						'label'         => __( 'Grid Category Transform', 'fl-builder' ),
						'default' 		=> '',
						'options'       => array(
							''    		=> __('Default', 'fl-builder'),
							'none'    		=> __('None', 'fl-builder'),
							'capitalize'   => __('Capitalize', 'fl-builder'),
							'uppercase'    	=> __('Uppercase', 'fl-builder'),
							'lowercase'    	=> __('Lowercase', 'fl-builder'),
						),
					),
				)
			),
			'grid_button_font'       => array(
				'title'         => 'Grid Button Font',
				'fields'        => array(
					'grid_button_text'           => array(
						'type'          => 'text',
						'label'         => __( 'Button Text', 'fl-builder' ),
						'default' 		=> 'Details',
						'placeholder' 		=> 'Details',
					),
					'grid_button_font_weight'           => array(
						'type'          => 'select',
						'label'         => __( 'Button Font Weight', 'fl-builder' ),
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
					'grid_button_text_transform'           => array(
						'type'          => 'select',
						'label'         => __( 'Button Text Transform', 'fl-builder' ),
						'default' 		=> '',
						'options'       => array(
							''    		=> __('Default', 'fl-builder'),
							'none'    		=> __('None', 'fl-builder'),
							'capitalize'   => __('Capitalize', 'fl-builder'),
							'uppercase'    	=> __('Uppercase', 'fl-builder'),
							'lowercase'    	=> __('Lowercase', 'fl-builder'),
						),
					),
				)
			),
			'grid_button_color'       => array(
				'title'         => 'Grid Button Color',
				'fields'        => array(
					'grid_button_bg_color'           => array(
						'type'          => 'color',
						'label'         => __( 'Button Bg Color', 'fl-builder' ),
						'default' 		=> '8bd3c1',
						'show_reset' 	=> true,
					),
					'grid_button_text_color'           => array(
						'type'          => 'color',
						'label'         => __( 'Button Text Color', 'fl-builder' ),
						'default' 		=> 'ffffff',
						'show_reset' 	=> true,
					),
					'grid_button_bg_color_active'           => array(
						'type'          => 'color',
						'label'         => __( 'Button Bg Color Active', 'fl-builder' ),
						'default' 		=> 'f5f4f4',
						'show_reset' 	=> true,
					),
					'grid_button_text_color_active'           => array(
						'type'          => 'color',
						'label'         => __( 'Button Text Color Active', 'fl-builder' ),
						'default' 		=> '2b353a',
						'show_reset' 	=> true,
					),
					'grid_button_radius'           => array(
						'type'          => 'unit',
						'label'         => __( 'Button Radius', 'fl-builder' ),
						'default' 		=> '3',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px',
					),
					'grid_buttons_margin'           => array(
						'type'          => 'unit',
						'label'         => __( 'Button Margin', 'fl-builder' ),
						'default' 		=> '',
						'description'   => 'px',
					),
					'grid_buttons_spacing'           => array(
						'type'          => 'unit',
						'label'         => __( 'Buttons Spacing Bottom', 'fl-builder' ),
						'default' 		=> '',
						'description'   => 'px',
					),
				)
			),
			'grid_button_padding'       => array(
				'title'         => 'Grid Button Padding',
				'fields'        => array(
					'grid_button_padding_top'           => array(
						'type'          => 'unit',
						'label'         => __( 'Button Padding Top', 'fl-builder' ),
						'default' 		=> '8',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px',
					),
					'grid_button_padding_bottom'           => array(
						'type'          => 'unit',
						'label'         => __( 'Button Padding Bottom', 'fl-builder' ),
						'default' 		=> '8',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px',
					),
					'grid_button_padding_left'           => array(
						'type'          => 'unit',
						'label'         => __( 'Button Padding Left', 'fl-builder' ),
						'default' 		=> '8',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px',
					),
					'grid_button_padding_right'           => array(
						'type'          => 'unit',
						'label'         => __( 'Button Padding Right', 'fl-builder' ),
						'default' 		=> '8',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px',
					),
				)
			),
		)
	),
));