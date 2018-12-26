<?php

/**
 * @class WooCommerceCategoryModule
 */
class WooCommerceCategoryModule extends FLBuilderModule {

	/**
	 * @method __construct
	 */
	public function __construct()
	{
		$enabled = class_exists('Woocommerce');
		global $foldercategory;
		parent::__construct(array(
			'name'          	=> __('Woocommerce - Category', 'fl-builder'),
			'description'   	=> __('Display Shop Product.', 'fl-builder'),
			'category'      	=> __($foldercategory, 'fl-builder'),
			'enabled'       	=> $enabled,
			'partial_refresh'	=> true
		));
		// Register and enqueue your own.
		$this->add_css( 'owl-carousel', FL_MODULE_THEME_URL . 'assets/owlcarousel/owl.carousel.css' );
		$this->add_css( 'owl-carousel-theme', FL_MODULE_THEME_URL . 'assets/owlcarousel/owl.theme.default.min.css' );
		$this->add_js( 'owl-carousel', FL_MODULE_THEME_URL . 'assets/owlcarousel/owl.carousel.min.js', array(), '', true );
	}

	/**
	 * @method get_classname
	 */
	public function get_classname()
	{
		$classname = 'woocommerce-category';
		return $classname;
	}
}


// Get Menus
$customMenus = wp_get_nav_menus( array() );
$customMenusList = array();
if ( is_array( $customMenus ) && ! empty( $customMenus ) ) {
	foreach ( $customMenus as $customMenu ) :
		$customMenusList[$customMenu->slug] = $customMenu->name;
	endforeach;
}


// Get Category http://stackoverflow.com/questions/21009516/get-categories-from-wordpress-woocommerce
$taxonomy     = 'product_cat';
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
$productcatList = array();
foreach ($all_categories as $cat) {
	if($cat->category_parent == 0) {
		$category_id = $cat->term_id;       
		$productcatList[$cat->slug] = ucfirst($cat->name);
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
				$productcatList[$sub_category->slug] = '-- '.ucfirst($sub_category->name);
			}   
		}
	}       
}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('WooCommerceCategoryModule', array(
	'general'       => array(
		'title'         => __('General', 'fl-builder'),
		'sections'      => array(
			'general'         => array(
				'title'         => '',
				'fields'        => array(
					'product_category'       => array(
						'type'          => 'select',
						'label'         => __('Product Category', 'fl-builder'),
						'default'       => 'date',
						'options'       => $productcatList,
					),
					'orderby'       => array(
						'type'          => 'select',
						'label'         => __('Sort By', 'fl-builder'),
						'default'       => 'date',
						'options'       => array(
							'menu_order'    => _x( 'Default', 'Sort by.', 'fl-builder' ),
							'popularity'    => __('Popularity', 'fl-builder'),
							'rating'        => __('Rating', 'fl-builder'),
							'date'          => __('Date', 'fl-builder'),
							'price'         => __('Price', 'fl-builder')
						)
					),
					'order'         => array(
						'type'          => 'select',
						'label'         => __('Sort Direction', 'fl-builder'),
						'default'       => 'DESC',
						'options'       => array(
							'ASC'           => __('Ascending', 'fl-builder'),
							'DESC'          => __('Descending', 'fl-builder')
						)
					),
	
					'total_item'           => array(
						'type'          => 'text',
						'label'         => __( 'Total Item', 'fl-builder' ),
						'default'       => '12',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'Number',
						'placeholder'   => '3'
					),
					'column_items'         => array(
						'type'          => 'select',
						'label'         => __('Number of Column', 'fl-builder'),
						'default'       => '3',
						'options'       => array(
							'1'    		=> __('1', 'fl-builder'),
							'2'    		=> __('2', 'fl-builder'),
							'3'    		=> __('3', 'fl-builder'),
							'4'    		=> __('4', 'fl-builder'),
							'5'    		=> __('5', 'fl-builder'),
							'6'    		=> __('6', 'fl-builder'),
						)
					),
					'margin'         => array(
						'type'          => 'text',
						'label'         => __('Column Margin', 'fl-builder'),
						'default'       => __('30', 'fl-builder'),
						'placeholder'       => __('30', 'fl-builder'),
						'maxlength'     => '3',
						'size'          => '2',
					),
					'autoplay'        => array(
						'type'          => 'select',
						'label'         => __('Autoplay', 'fl-builder'),
						'default'       => 'Yes',
						'options'       => array(
							'true'   	=> __('Yes', 'fl-builder'),
							'false'     => __('No', 'fl-builder'),
						)
					),
					'dots'        => array(
						'type'          => 'select',
						'label'         => __('Enable Pagination', 'fl-builder'),
						'default'       => 'No',
						'options'       => array(
							'true'   	=> __('Yes', 'fl-builder'),
							'false'     => __('No', 'fl-builder'),
						)
					),
					'nav'        => array(
						'type'          => 'select',
						'label'         => __('Enable Navigation', 'fl-builder'),
						'default'       => 'No',
						'options'       => array(
							'true'   	=> __('Yes', 'fl-builder'),
							'false'     => __('No', 'fl-builder'),
						)
					),
				)
			)
		),
	),
));