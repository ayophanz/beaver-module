<?php

/**
 * @class WooCommerceLatestModule
 */
class WooCommerceLatestModule extends FLBuilderModule {

	/**
	 * @method __construct
	 */
	public function __construct()
	{
		$enabled = class_exists('Woocommerce');
		global $foldercategory;
		parent::__construct(array(
			'name'          	=> __('Woocommerce - Latest', 'fl-builder'),
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
		$classname = 'woocommerce-latest';
		return $classname;
	}
}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('WooCommerceLatestModule', array(
	'general'       => array(
		'title'         => __('General', 'fl-builder'),
		'sections'      => array(
			'general'         => array(
				'title'         => '',
				'fields'        => array(
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