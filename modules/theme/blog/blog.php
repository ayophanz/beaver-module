<?php
/**
 * @class blogModule
 */
class blogModule extends FLBuilderModule {

	/** 
	 * @method __construct
	 */  
	public function __construct()
	{
		global $foldercategory;
		parent::__construct(array(
			'name'          	=> __('Blog', 'fl-builder'),
			'description'   	=> __('Display Blog Grids.', 'fl-builder'),
			'category'      	=> __($foldercategory, 'fl-builder'),
			'partial_refresh'	=> true
		));
	}
	
	/**
	 * @method get_classname
	 */
	public function get_classname()
	{
		$classname = 'blog '.$this->settings->style;
		return $classname;
	}
}

/*Testimonial Avatar Size*/
add_image_size( 'blog-thumbnail', 366 , 366 );


/*this function allows for the auto-creation of post excerpts*/
if ( ! function_exists( 'truncate_post' ) ) {
	function truncate_post( $amount, $echo = true, $post = '', $strip_shortcodes = false ) {
		global $shortname;
		if ( '' == $post ) global $post;
		$post_excerpt = '';
		$post_excerpt = apply_filters( 'the_excerpt', $post->post_excerpt );
		if ( 'on' == et_get_option( $shortname . '_use_excerpt' ) && '' != $post_excerpt ) {
			if ( $echo ) echo $post_excerpt;
			else return $post_excerpt;
		} else {
			$truncate = $post->post_content;
			$truncate = preg_replace( '@\[caption[^\]]*?\].*?\[\/caption]@si', '', $truncate );
			$truncate = preg_replace( '@\[et_pb_post_nav[^\]]*?\].*?\[\/et_pb_post_nav]@si', '', $truncate );
			$truncate = preg_replace( '@\[audio[^\]]*?\].*?\[\/audio]@si', '', $truncate );
			$truncate = preg_replace( '@\[embed[^\]]*?\].*?\[\/embed]@si', '', $truncate );
			if ( $strip_shortcodes ) {
				$truncate = et_strip_shortcodes( $truncate );
			} else {
				$truncate = apply_filters( 'the_content', $truncate );
			}
			if ( strlen( $truncate ) <= $amount ) {
				$echo_out = '';
			} else {
				$echo_out = '...';
			}
			$truncate = rtrim( et_wp_trim_words( $truncate, $amount, '' ) );
			if ( '' != $echo_out ) {
				$new_words_array = (array) explode( ' ', $truncate );
				array_pop( $new_words_array );
				$truncate = implode( ' ', $new_words_array );
				$truncate .= $echo_out;
			}
			if ( $echo ) echo $truncate;
			else return $truncate;
		};
	}
}
/*this function truncates titles to create preview excerpts*/
if ( ! function_exists( 'truncate_title' ) ) {
	function truncate_title( $amount, $echo = true, $post = '' ) {
		if ( $post == '' ) $truncate = get_the_title();
		else $truncate = $post->post_title;
		if ( strlen( $truncate ) <= $amount ) $echo_out = '';
		else $echo_out = '...';
		$truncate = et_wp_trim_words( $truncate, $amount, '' );
		if ( '' != $echo_out ) $truncate .= $echo_out;
		if ( $echo )
			echo $truncate;
		else
			return $truncate;
	}
}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('blogModule', array(
	'general'         => array(
		'title'         => __('General', 'fl-builder'),
		'sections'      => array(
			'general'       => array(
				'title'         => '',
				'fields'        => array(
					'posttype'         => array(
						'type'          => 'post-type',
						'label'         => __('Source', 'fl-builder'),
						'default'       => 'post'
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
							'custom-width'    	=> __('Custom Width', 'fl-builder'),
						),
						'toggle'        => array(
							'custom-width'      => array(
								'fields'        => array( 'custom_width' ),
							),
						)
					),
					'custom_width'           => array(
						'type'          => 'unit',
						'label'         => __( 'Custom Width', 'fl-builder' ),
						'default' 		=> '',
						'placeholder'     => '3',
						'description'   => 'px',
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
						'label'         => __('Number of Post display', 'fl-builder'),
						'default'       => __('8', 'fl-builder'),
						'placeholder'       => __('8', 'fl-builder'),
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
				)
			),
			'image'       => array(
				'title'         => 'Image',
				'fields'        => array(
					'post_image'   => array(
						'type'          => 'select',
						'label'         => __('Show Image', 'fl-builder'),
						'default'       => 'true',
						'options'       => array(
							'true'		=> __('Show', 'fl-builder'),
							'false'		=> __('Hide', 'fl-builder'),
						)
					),
					'image_size'    => array(
						'type'          => 'photo-sizes',
						'label'         => __('Image Size', 'fl-builder'),
						'default'       => 'blog-thumbnail',
					),
					'image_ratio'    => array(
						'type'          => 'unit',
						'label'         => __('Image Ratio', 'fl-builder'),
						'placeholder'    => '100',
						'description'   => '%',
						'help'       	=> '100% = square, below that make the size rectangular',
					),
				)
			),
			'meta'       => array(
				'title'         => 'Post Meta',
				'fields'        => array(
					'post_date'   => array(
						'type'          => 'select',
						'label'         => __('Show Date', 'fl-builder'),
						'default'       => 'true',
						'options'       => array(
							'true'		=> __('Show', 'fl-builder'),
							'false'		=> __('Hide', 'fl-builder'),
						)
					),
					'date_format'   => array(
						'type'          => 'select',
						'label'         => __('Post Format', 'fl-builder'),
						'default'       => '',
						'options'       => array(
							''		=> __('Default', 'fl-builder'),
							'M j, Y'        => date('M j, Y'),
							'F j, Y'        => date('F j, Y'),
							'm/d/Y'         => date('m/d/Y'),
							'm-d-Y'         => date('m-d-Y'),
							'd M Y'         => date('d M Y'),
							'd F Y'         => date('d F Y'),
							'Y-m-d'         => date('Y-m-d'),
							'Y/m/d'         => date('Y/m/d'),
						)
					),
					'post_comment'   => array(
						'type'          => 'select',
						'label'         => __('Post Comment', 'fl-builder'),
						'default'       => 'true',
						'options'       => array(
							'true'		=> __('Show', 'fl-builder'),
							'false'		=> __('Hide', 'fl-builder'),
						)
					),
				)
			),
			'content'       => array(
				'title'         => 'Content',
				'fields'        => array(
					'post_title'   => array(
						'type'          => 'select',
						'label'         => __('Post Title', 'fl-builder'),
						'default'       => 'true',
						'options'       => array(
							'true'		=> __('Show', 'fl-builder'),
							'false'		=> __('Hide', 'fl-builder'),
						)
					),
					'truncate_title'   => array(
						'type'          => 'unit',
						'label'         => __('Truncate Title', 'fl-builder'),
						'default'       => '',
						'placeholder'       => '25',
					),
					'post_content'   => array(
						'type'          => 'select',
						'label'         => __('Post Content', 'fl-builder'),
						'default'       => 'true',
						'options'       => array(
							'true'		=> __('Show', 'fl-builder'),
							'false'		=> __('Hide', 'fl-builder'),
						)
					),
					'truncate_post'   => array(
						'type'          => 'unit',
						'label'         => __('Truncate Content', 'fl-builder'),
						'default'       => '',
						'placeholder'       => '100',
					),
					'post_readmore'   => array(
						'type'          => 'select',
						'label'         => __('Post Read More', 'fl-builder'),
						'default'       => 'true',
						'options'       => array(
							'true'		=> __('Show', 'fl-builder'),
							'false'		=> __('Hide', 'fl-builder'),
						)
					),
					'post_readmore_text'   => array(
						'type'          => 'text',
						'label'         => __('Read More Text', 'fl-builder'),
						'default'       => '',
						'placeholder'       => 'Read More',
						'size'       => '10',
					),
				)
			),
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
						)
					),
					'padding'         => array(
						'type'          => 'unit',
						'label'         => __('Box Padding', 'fl-builder'),
						'default'       => '',
						'placeholder'   => '0',
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.blog-post',
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
									'selector'      => '.blog-info',
									'property'      => 'padding-top',
									'unit'		    => 'px',
								),
								array(
									'selector'      => '.blog-info',
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
									'selector'      => '.blog-info',
									'property'      => 'padding-left',
									'unit'		    => 'px',
								),
								array(
									'selector'      => '.blog-info',
									'property'      => 'padding-right',
									'unit'		    => 'px',
								),    
							)
						)
					),
					'title_size'         => array(
						'type'          => 'unit',
						'label'         => __('Title Size', 'fl-builder'),
						'default'       => '',
						'placeholder'       => '20',
						'preview'       => array(
							'type'          => 'css',
							'rules'           => array(
								array(
									'selector'      => '.blog-post .blog-post-title',
									'property'      => 'font-size',
									'unit'		    => 'px',
								),    
							)
						)
					),
					'font_weight'         => array(
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
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.blog-post .blog-post-title',
							'property'      => 'font-weight',
						),
						'help'   		=> 'Its depend to the font family if the following font-weight supported.',
					),
					'bg_color'         => array(
						'type'          => 'color',
						'label'         => __('Bg Color', 'fl-builder'),
						'default'       => '',
						'show_reset'       => true,
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.blog-post',
							'property'      => 'background-color',
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
									'selector'      => '.blog-post',
									'property'      => 'color',
								),
							)
						)
					),
					'color_title'         => array(
						'type'          => 'color',
						'label'         => __('Title Color', 'fl-builder'),
						'default'       => '',
						'show_reset'       => true,
						'preview'       => array(
							'type'          => 'css',
							'rules'           => array(
								array(
									'selector'      => '.blog-post .blog-post-title',
									'property'      => 'color',
								),    
							)
						)
					),
					'color_link'         => array(
						'type'          => 'color',
						'label'         => __('Color Link', 'fl-builder'),
						'default'       => '',
						'show_reset'       => true,
						'preview'       => array(
							'type'          => 'css',
							'rules'           => array(
								array(
									'selector'      => '.blog-post .blog-post-meta a',
									'property'      => 'color',
								),   
								array(
									'selector'      => '.blog-post .blog-post-readmore',
									'property'      => 'color',
								),    
							)
						)
					),
					'color_link_hover'         => array(
						'type'          => 'color',
						'label'         => __('Color Link Hover', 'fl-builder'),
						'default'       => '',
						'show_reset'       => true,
					),
					'border_color'         => array(
						'type'          => 'color',
						'label'         => __('Border Color', 'fl-builder'),
						'default'       => '',
						'show_reset'       => true,
						'preview'       => array(
							'type'          => 'css',
							'selector'      => '.blog-post',
							'property'      => 'border-color',
						)
					),
				)
			)
		)
	),
));