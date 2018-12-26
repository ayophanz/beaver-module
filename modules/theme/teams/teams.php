<?php
/**
 * @class teamsModule
 */
class teamsModule extends FLBuilderModule {

	/** 
	 * @method __construct
	 */  
	public function __construct()
	{
		global $foldercategory;
		parent::__construct(array(
			'name'          	=> __('Teams', 'fl-builder'),
			'description'   	=> __('Display Teams from Posttype.', 'fl-builder'),
			'category'      	=> __($foldercategory, 'fl-builder'),
			'partial_refresh'	=> true
		));
	}
	
	/**
	 * @method get_classname
	 */
	public function get_classname()
	{
		$classname = 'teams '.$this->settings->style;
		return $classname;
	}
}

/*Testimonial Avatar Size*/
add_image_size( 'teams-photo', 366 , 366 );
add_image_size( 'teams-photo-hover-icons', 255 , 298 );

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('teamsModule', array(
	'general'         => array(
		'title'         => __('General', 'fl-builder'),
		'sections'      => array(
			'general'       => array(
				'title'         => '',
				'fields'        => array(
					'posttype'         => array(
						'type'          => 'post-type',
						'label'         => __('Source', 'fl-builder'),
						'default'       => 'team'
					),
					'column'         => array(
						'type'          => 'select',
						'label'         => __('Number of Column', 'fl-builder'),
						'default'       => 'column-4',
						'options'       => array(
							'column-1'    		=> __('Column 1', 'fl-builder'),
							'column-2'    		=> __('Column 2', 'fl-builder'),
							'column-3'    		=> __('Column 3', 'fl-builder'),
							'column-4'    		=> __('Column 4', 'fl-builder'),
							'column-5'    		=> __('Column 5', 'fl-builder'),
							'column-6'    		=> __('Column 6', 'fl-builder'),
						)
					),
					'column_spacing'           => array(
						'type'          => 'unit',
						'label'         => __( 'Column Spacing', 'fl-builder' ),
						'default' 		=> '30',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px',
					),
					'totalpost'         => array(
						'type'          => 'unit',
						'label'         => __('Number of Team display', 'fl-builder'),
						'default'       => __('8', 'fl-builder'),
						'placeholder'       => __('8', 'fl-builder'),
						'maxlength'     => '2',
						'size'          => '1',
					),
					'order'         => array(
						'type'          => 'select',
						'label'         => __('Order Sorting', 'fl-builder'),
						'default'       => 'ASC',
						'options'       => array(
							'ASC'    		=> __('ASCENDING', 'fl-builder'),
							'DESC'    		=> __('DESCENDING', 'fl-builder'),
						)
					),
					'image_size'    => array(
						'type'          => 'photo-sizes',
						'label'         => __('Size', 'fl-builder'),
						'default'       => 'teams-photo'
					),
				)
			)
		)
	),
	'setting'         => array(
		'title'         => __('Setting', 'fl-builder'),
		'sections'      => array(
			'setting'       => array(
				'title'         => '',
				'fields'        => array(
					'style'         => array(
						'type'          => 'select',
						'label'         => __('Style', 'fl-builder'),
						'default'       => 'normal',
						'options'       => array(
							'normal'    		=> __('Normal', 'fl-builder'),
							'hovered'    		=> __('Hovered', 'fl-builder'),
							'hovered-icon'    		=> __('Hovered Icon', 'fl-builder'),
						)
					),
					'bg_color'         => array(
						'type'          => 'color',
						'label'         => __('Bg Color', 'fl-builder'),
						'default'       => '',
						'show_reset'       => true,
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.teams-profile',
							'property'      => 'background-color',
						)
					),
					'info_bg_color'         => array(
						'type'          => 'color',
						'label'         => __('Info Bg Color', 'fl-builder'),
						'default'       => '',
						'show_reset'       => true,
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.teams-info',
							'property'      => 'background-color',
						)
					),
					'padding'         => array(
						'type'          => 'unit',
						'label'         => __('Box Padding', 'fl-builder'),
						'default'       => '',
						'placeholder'   => '0',
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.teams-profile',
							'property'      => 'padding',
							'unit'		    => 'px',
						)
					),
					'padding_inside_top_bottom'         => array(
						'type'          => 'unit',
						'label'         => __('Content Padding Top & Bottom', 'fl-builder'),
						'default'       => '',
						'placeholder'       => '10',
						'preview'       => array(
							'type'          => 'css',
							'rules'           => array(
								array(
									'selector'      => '.teams-info',
									'property'      => 'padding-top',
									'unit'		    => 'px',
								),
								array(
									'selector'      => '.teams-info',
									'property'      => 'padding-bottom',
									'unit'		    => 'px',
								),    
							)
						)
					),
					'padding_inside_left_right'         => array(
						'type'          => 'unit',
						'label'         => __('Content Padding Left & Right', 'fl-builder'),
						'default'       => '',
						'placeholder'       => '0',
						'preview'       => array(
							'type'          => 'css',
							'rules'           => array(
								array(
									'selector'      => '.teams-info',
									'property'      => 'padding-left',
									'unit'		    => 'px',
								),
								array(
									'selector'      => '.teams-info',
									'property'      => 'padding-right',
									'unit'		    => 'px',
								),    
							)
						)
					),
					'color'         => array(
						'type'          => 'color',
						'label'         => __('Color', 'fl-builder'),
						'default'       => '',
						'show_reset'       => true,
						'preview'       => array(
							'type'          => 'css',
							'rules'           => array(
								array(
									'selector'      => '.teams-profile',
									'property'      => 'color',
								),
								array(
									'selector'      => '.teams-profile .teams-name',
									'property'      => 'color',
								),
								array(
									'selector'      => '.teams-profile .teams-job',
									'property'      => 'color',
								),
								array(
									'selector'      => '.teams-social-media a',
									'property'      => 'color',
								),
							)
						)
					),
					'color_name'         => array(
						'type'          => 'color',
						'label'         => __('Color Name', 'fl-builder'),
						'default'       => '',
						'show_reset'       => true,
						'preview'       => array(
							'type'          => 'css',
							'rules'           => array(
								array(
									'selector'      => '.teams-profile .teams-name',
									'property'      => 'color',
								),    
							)
						)
					),
					'color_jobtitle'         => array(
						'type'          => 'color',
						'label'         => __('Color Job Title', 'fl-builder'),
						'default'       => '',
						'show_reset'       => true,
						'preview'       => array(
							'type'          => 'css',
							'rules'           => array(
								array(
									'selector'      => '.teams-profile .teams-job',
									'property'      => 'color',
								),    
							)
						)
					),
					'color_icons'         => array(
						'type'          => 'color',
						'label'         => __('Icons Color', 'fl-builder'),
						'default'       => '',
						'show_reset'       => true,
						'preview'       => array(
							'type'          => 'css',
							'rules'           => array(
								array(
									'selector'      => '.teams-social-media a',
									'property'      => 'color',
								),
							)
						)
					),
					'color_icons_hover'         => array(
						'type'          => 'color',
						'label'         => __('Icons Color Hover', 'fl-builder'),
						'default'       => '',
						'show_reset'       => true,
						'preview'       => array(
							'type'          => 'none',
						)
					),
				)
			)
		)
	),
));