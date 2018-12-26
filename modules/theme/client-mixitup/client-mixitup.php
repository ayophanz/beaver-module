<?php
/**
 * @class clientMixItUpModule
 */
class clientMixItUpModule extends FLBuilderModule {

	/** 
	 * @method __construct
	 */  
	public function __construct()
	{
		global $foldercategory;
		parent::__construct(array(
			'name'          	=> __('client - MixItUp', 'fl-builder'),
			'description'   	=> __('Display Client from Posttype.', 'fl-builder'),
			'category'      	=> __($foldercategory, 'fl-builder'),
			'partial_refresh'	=> true
		));
		// Register and enqueue your own.
		$this->add_js( 'mixitup', $this->url . 'js/jquery.mixitup.min.js', array(), '', true );
	}
	
	/**
	 * @method get_classname
	 */
	public function get_classname()
	{
		$classname = 'client-mixitup'.$this->settings->grid_style;
		return $classname;
	}
}

/*Testimonial Avatar Size*/
add_image_size( 'client-mixitup-large', 500 , 347, true );
add_image_size( 'client-mixitup', 375 , 260, true );



// Get Category http://stackoverflow.com/questions/21009516/get-categories-from-wordpress-woocommerce
$taxonomy     = 'client_category';
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
FLBuilder::register_module('clientMixItUpModule', array(
	'slides'         => array(
		'title'         => __('General', 'fl-builder'),
		'sections'      => array(
			'general'       => array(
				'title'         => '',
				'fields'        => array(
					'source'         => array(
						'type'          => 'select',
						'label'         => __('Source', 'fl-builder'),
						'default'       => '',
						'options'       => array(
							'posttype-client'    		=> __('Posttype - Client', 'fl-builder'),
							'media-gallery'    		=> __('Media Gallery', 'fl-builder'),
						),
						'toggle'        => array(
							'posttype-client'        => array(
								'fields'      	=> array('categories', 'button_link'),
								'sections'    	=> array('filter'),
							),
							'media-gallery'        	=> array(
								'fields'        => array('media_gallery'),
							),
						)
					),
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
					'media_gallery'         => array(
						'type'          => 'multiple-photos',
						'label'         => __('Media Gallery', 'fl-builder'),
						'show_remove'	=> true,
					),
				)
			),
			'filter'       => array(
				'title'         => 'Filter',
				'fields'        => array(
					'categories_nav'         => array(
						'type'          => 'select',
						'label'         => __('Show Category Filter', 'fl-builder'),
						'default'       => 'grid-4',
						'options'       => array(
							''    		=> __('Yes', 'fl-builder'),
							'hide'    		=> __('No', 'fl-builder'),
						),
						'toggle'        => array(
							''        => array(
								'fields'        => array('categories_nav_aligment', 'categories_nav_all_text'),
								'tabs'        => array('filter_styles')
							),
						)
					),
					'categories_nav_aligment'         => array(
						'type'          => 'select',
						'label'         => __('Show Category Aligment', 'fl-builder'),
						'default'       => '',
						'options'       => array(
							''    		=> __('Center', 'fl-builder'),
							'left' 		=> __('Left', 'fl-builder'),
							'right'		=> __('Right', 'fl-builder'),
						)
					),
					'categories_nav_all_text'         => array(
						'type'          => 'text',
						'label'         => __('Button "All" Label', 'fl-builder'),
						'placeholder'   => 'All',
						'size'          => '10',
						'preview'       => array(
							'type'          => 'text',
							'selector'      => '.client-button[data-filter="all"]',
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
							'lightbox'    	=> __('Image Modal', 'fl-builder'),
							'lightbox-ajax'    	=> __('Content Modal', 'fl-builder'),
						)
					),
				)
			)
		)
	),
	'filter_styles'        => array(
		'title'         => __('Filter Styles', 'fl-builder'),
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
							'selector'      => '.client-filter .client-button',
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
							'selector'      => '.client-filter .client-button',
							'property'      => 'text-transform',
						)
					),
					'button_text_size'           => array(
						'type'          => 'unit',
						'label'         => __( 'Button Text Size', 'fl-builder' ),
						'description' 		=> 'px',
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.client-filter .client-button',
							'property'      => 'font-size',
							'unit'      	=> 'px',
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
							'selector'      => '.client-filter .client-button:not(.active)',
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
							'selector'      => '.client-filter .client-button:not(.active)',
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
							'selector'      => '.client-filter .client-button.active',
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
							'selector'      => '.client-filter .client-button.active',
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
							'selector'      => '.client-filter .client-button',
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
							'selector'      => '.client-filter .client-button',
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
							'selector'      => '.client-filter',
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
							'selector'      => '.client-filter .client-button',
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
							'selector'      => '.client-filter .client-button',
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
							'selector'      => '.client-filter .client-button',
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
							'selector'      => '.client-filter .client-button',
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
							''          	=>  'On Hover',
							' blurb'		=>  'Blurb',
							' highlight'	=>  'Highlight',
							' none'			=>  'None',
						),
						'toggle'        => array(
							' blurb'        => array(
								'sections'    	=> array('grid_info_desc'),
							),
							' highlight'        => array(
								'sections'    	=> array('grid_info_desc'),
							),
						)
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
					'grid_info_alignment'           => array(
						'type'          => 'select',
						'label'         => __( 'Grid Info Alignment', 'fl-builder' ),
						'default'       => '',
						'options'       => array(
							''      =>  'Default',
							'center'      =>  'Center',
							'left'        =>  'Left',
							'right'       =>  'Right',
						)
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
			'grid_info_desc'       => array(
				'title'         => 'Grid Info Description',
				'fields'        => array(
					'grid_desc'           => array(
						'type'          => 'select',
						'label'         => __( 'Grid Desc', 'fl-builder' ),
						'default'       => 'enable',
						'options'       => array(
							''            =>  'Disable',
							'enable'      =>  'Enable',
						),
						'toggle'        => array(
							'enable'        => array(
								'fields'      	=> array('grid_desc_color', 'grid_desc_size', 'grid_desc_weight', 'grid_desc_transform', 'grid_desc_spacing'),
							),
						)
					),
					'grid_desc_color'           => array(
						'type'          => 'color',
						'label'         => __( 'Grid Info Desc Color', 'fl-builder' ),
						'default' 		=> 'fff',
						'show_reset' 	=> true,
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.grids .client-desc',
							'property'      => 'color',
						)
					),
					'grid_desc_size'           => array(
						'type'          => 'unit',
						'label'         => __( 'Grid Info Desc Size', 'fl-builder' ),
						'default' 		=> '',
						'placeholder' 	=> '16',
						'description'   => 'px',
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.grids .client-desc',
							'property'      => 'font-size',
							'unit'      => 'px',
						)
					),
					'grid_desc_weight'           => array(
						'type'          => 'select',
						'label'         => __( 'Grid Info Desc Font Weight', 'fl-builder' ),
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
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.grids .client-desc',
							'property'      => 'font-weight',
						),
						'help'   		=> 'Its depend to the font family if the following font-weight supported.',
					),
					'grid_desc_transform'           => array(
						'type'          => 'select',
						'label'         => __( 'Grid Info Desc Transform', 'fl-builder' ),
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
							'selector'      => '.grids .client-desc',
							'property'      => 'text-transform',
						)
					),
					'grid_desc_spacing'           => array(
						'type'          => 'unit',
						'label'         => __( 'Grid Info Desc Spacing', 'fl-builder' ),
						'default' 		=> '',
						'placeholder' 	=> '10',
						'description'   => 'px',
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.grids .client-desc',
							'property'      => 'margin-bottom',
							'unit'      => 'px',
						)
					),
					'grid_desc_minheight'           => array(
						'type'          => 'unit',
						'label'         => __( 'Grid Info Desc Min Height', 'fl-builder' ),
						'default' 		=> '',
						'placeholder' 	=> '50',
						'description'   => 'px',
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.grids .client-desc',
							'property'      => 'min-height',
							'unit'      => 'px',
						)
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
						),
						'toggle'        => array(
							'enable'        => array(
								'fields'      	=> array('grid_category_color', 'grid_category_color_hover', 'grid_category_size', 'grid_category_weight', 'grid_category_transform'),
							),
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
			'grid_button'       => array(
				'title'         => 'Grid Button',
				'fields'        => array(
					'grid_button_text'           => array(
						'type'          => 'text',
						'label'         => __( 'Button Text', 'fl-builder' ),
						'default' 		=> 'Details',
						'placeholder' 		=> 'Details',
						'preview'       => array(
							'type'          => 'text',
							'selector'      => '.grids .client-button:not(.active)',
						)
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
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.grids .client-button:not(.active)',
							'property'      => 'font-weight',
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
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.grids .client-button:not(.active)',
							'property'      => 'text-transform',
						)
					),
					'grid_button_size'           => array(
						'type'          => 'unit',
						'label'         => __( 'Grid Button size', 'fl-builder' ),
						'default' 		=> '',
						'placeholder' 	=> '16',
						'description'   => 'px',
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.grids .client-button:not(.active)',
							'property'      => 'font-size',
							'unit'      => 'px',
						)
					),
					'grid_button_border_size'           => array(
						'type'          => 'unit',
						'label'         => __( 'Grid Button Border size', 'fl-builder' ),
						'default' 		=> '',
						'placeholder' 	=> '0',
						'description'   => 'px',
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.grids .client-button:not(.active)',
							'property'      => 'border-width',
							'unit'      => 'px',
						)
					),
					'grid_button_border_radius'           => array(
						'type'          => 'unit',
						'label'         => __( 'Grid Button Border Radius', 'fl-builder' ),
						'default' 		=> '',
						'placeholder' 	=> '3',
						'description'   => 'px',
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.grids .client-button:not(.active)',
							'property'      => 'border-radius',
							'unit'      => 'px',
						)
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
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.grids .client-button:not(.active)',
							'property'      => 'background-color',
						)
					),
					'grid_button_border_color'           => array(
						'type'          => 'color',
						'label'         => __( 'Button Border Color', 'fl-builder' ),
						'default' 		=> '8bd3c1',
						'show_reset' 	=> true,
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.grids .client-button:not(.active)',
							'property'      => 'border-color',
						)
					),
					'grid_button_text_color'           => array(
						'type'          => 'color',
						'label'         => __( 'Button Text Color', 'fl-builder' ),
						'default' 		=> 'ffffff',
						'show_reset' 	=> true,
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.grids .client-button:not(.active)',
							'property'      => 'color',
						)
					),
				)
			),
			'grid_button_hover'       => array(
				'title'         => 'Grid Button Color Hover',
				'fields'        => array(
					'grid_button_bg_color_active'           => array(
						'type'          => 'color',
						'label'         => __( 'Button Bg Color Hover', 'fl-builder' ),
						'default' 		=> 'f5f4f4',
						'show_reset' 	=> true,
						'preview'       => array(
							'type'          => 'none',
						)
					),
					'grid_button_border_color_active'           => array(
						'type'          => 'color',
						'label'         => __( 'Button Border Color Hover', 'fl-builder' ),
						'default' 		=> '8bd3c1',
						'show_reset' 	=> true,
						'preview'       => array(
							'type'          => 'none',
						)
					),
					'grid_button_text_color_active'           => array(
						'type'          => 'color',
						'label'         => __( 'Button Text Color Hover', 'fl-builder' ),
						'default' 		=> '2b353a',
						'show_reset' 	=> true,
						'preview'       => array(
							'type'          => 'none',
						)
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
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.grids .client-button',
							'property'      => 'padding-top',
							'unit'	      => 'px',
						)
					),
					'grid_button_padding_bottom'           => array(
						'type'          => 'unit',
						'label'         => __( 'Button Padding Bottom', 'fl-builder' ),
						'default' 		=> '8',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px',
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.grids .client-button',
							'property'      => 'padding-bottom',
							'unit'	      => 'px',
						)
					),
					'grid_button_padding_left'           => array(
						'type'          => 'unit',
						'label'         => __( 'Button Padding Left', 'fl-builder' ),
						'default' 		=> '8',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px',
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.grids .client-button',
							'property'      => 'padding-left',
							'unit'	      => 'px',
						)
					),
					'grid_button_padding_right'           => array(
						'type'          => 'unit',
						'label'         => __( 'Button Padding Right', 'fl-builder' ),
						'default' 		=> '8',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px',
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.grids .client-button',
							'property'      => 'padding-right',
							'unit'	      => 'px',
						)
					),
				)
			),
		)
	),
));

add_image_size( 'ajax-lightbox-image', 866 , 490, true );
add_action( 'wp_ajax_nopriv_getClientItemAjax', 'getClientItemAjax' ); 
add_action( 'wp_ajax_getClientItemAjax', 'getClientItemAjax' );
function getClientItemAjax() { 
	$postID = isset($_POST['id']) ? $_POST['id'] : 0; 
	query_posts('p='.$postID.'&post_type=client');
	if ( have_posts()) : while (have_posts()) : the_post();
?>
	<div class="ajax-client-content">
		<figure class="ajax-client-img">
			<?php 
				$postIMG = wp_get_attachment_image_src( get_post_thumbnail_id( $postID ), 'ajax-lightbox-image' ); 
				$postIMGurl = ( $postIMG ) ? $postIMG[0] : FL_MODULE_THEME_URL .'modules/theme/client-mixitup/img/default.svg';
				$postIMGid = get_post_thumbnail_id( $postID );
				$postIMGtitle = get_the_title($postIMGid);
				$postIMGalt =  get_post_meta($postIMGid, '_wp_attachment_image_title', true);
				$postIMGaltORtitle =  $postIMGalt <> '' ? $postIMGalt : $postIMGtitle;
			?>
			<div class="img-wrapper">
				<img src="<?php echo $postIMGurl; ?>" alt="<?php echo $postIMGaltORtitle; ?>">
			</div>
		</figure>
		<aside class="ajax-client-text">
			<div class="ajax-client-text-info">
				<h4 class="title"><?php the_title(); ?></h4>
				<ul class="ajax-client-list">
					<li>
						<i class="fa fa-clock-o"></i>
						<span><?php the_time(get_option('chameleon_date_format')); ?></span>
					</li>
					<li>
						<i class="fa fa-folder-open"></i>
						<span><?php the_terms( $postID, 'client_category' ); ?></span>
					</li>
					<li>
						<i class="fa fa-user"></i>
						<span><?php the_author_posts_link(); ?></span>
					</li>
				</ul>
			</div>
			<div class="ajax-client-text-desc">
				<p class="article-excerpt"><?php echo wp_trim_words( apply_filters('the_content', get_post_field('post_content', $postID)), "50", "" ); ?></p>
				<a class="readmore" href="<?php the_permalink(); ?>" title="Read More" >Read More <i class="fa fa-angle-right"></i></a>
			</div>
		</aside>
	</div>
<?php endwhile; endif; exit(); 
}