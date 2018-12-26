<?php

/**
 * @class VideoBoxModule
 */
class VideoBoxModule extends FLBuilderModule {

	/**
	 * @method __construct
	 */
	public function __construct()
	{
		global $foldercategory;
		parent::__construct(array(
			'name'          	=> __('Video Box', 'fl-builder'),
			'description'   	=> __('Feature Video.', 'fl-builder'),
			'category'      	=> __($foldercategory, 'fl-builder'),
			'partial_refresh'	=> true
		));
		$this->add_css( 'videojs', $this->url . 'css/videojs.css' );
		$this->add_js( 'videojs', $this->url . 'js/videojs.js', array(), '', true ); 
	}

	/**
	 * @method get_classname
	 */
	public function get_classname()
	{
		$classname = 'video-box';
		return $classname;
	}
	
}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('VideoBoxModule', array(
	'general'       => array(
		'title'         => __('General', 'fl-builder'),
		'sections'      => array(
			'general'         => array(
				'title'         => '',
				'fields'        => array(
					'video_type'       => array(
						'type'          => 'select',
						'label'         => __('Video Type', 'fl-builder'),
						'default'       => 'wordpress',
						'options'       => array(
							'media_library'     => __('Media Library', 'fl-builder'),
							'url'             => __('Url Other Server', 'fl-builder')
						),
						'toggle'        => array(
							'media_library'      => array(
								'fields'      => array('video', 'video_webm')
							),
							'url'      => array(
								'fields'      => array('video_url', 'video_webm_url')
							),
						),
						'preview'         => array(
							'type'            => 'none'
						)
					),
					'video'          => array(
						'type'          => 'video',
						'label'         => __( 'Video (MP4)', 'fl-builder' ),
						'help'          => __('A video in the MP4 format. Most modern browsers support this format.', 'fl-builder'),
						'preview'         => array(
							'type'            => 'none'
						)
					),
					'video_webm' => array(
						'type'          => 'video',
						'label'         => __('Video (WebM)', 'fl-builder'),
						'help'          => __('A video in the WebM format to use as fallback. This format is required to support browsers such as FireFox and Opera.', 'fl-builder'),
						'preview'         => array(
							'type'            => 'none'
						)
					),
					'video_url'          => array(
						'type'          => 'text',
						'label'         => __( 'Video (MP4) Url', 'fl-builder' ),
						'help'          => __('A video in the MP4 format. Most modern browsers support this format.', 'fl-builder'),
						'preview'         => array(
							'type'            => 'none'
						)
					),
					'video_webm_url' => array(
						'type'          => 'text',
						'label'         => __('Video (WebM) Url', 'fl-builder'),
						'help'          => __('A video in the WebM format to use as fallback. This format is required to support browsers such as FireFox and Opera.', 'fl-builder'),
						'preview'         => array(
							'type'            => 'none'
						)
					),
					'bg_image'           => array(
						'type'          => 'photo',
						'label'         => __( 'Bg Image', 'fl-builder' ),
						'show_remove'   => true,
					),
					'bg_color'           => array(
						'type'          => 'color',
						'label'         => __( 'Bg Color', 'fl-builder' ),
						'default' 		=> 'c3c7cb',
						'show_reset' 	=> true,
						'preview'         => array(
							'type'            => 'none'
						)
					),
					'bg_image_opacity'    => array(
						'type'          => 'text',
						'label'         => __('Background Overlay Opacity', 'fl-builder'),
						'default'       => '60',
						'description'   => '%',
						'maxlength'     => '3',
						'size'          => '4',
						'placeholder'   => '0',
						'preview'         => array(
							'type'            => 'none'
						)
					),
					'aspectratio'    => array(
						'type'          => 'text',
						'label'         => __('Video Aspect Ratio', 'fl-builder'),
						'default'   => '5 / 12',
						'placeholder'   => '5 / 12',
						'size'          => '10',
						'description'   => 'eg: <strong>5 / 12</strong> = 12:5 (video frame 960x400)',
						'preview'         => array(
							'type'            => 'none'
						)
					),
				)
			)
		),
	),
));