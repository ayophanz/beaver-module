<?php if ( !empty($settings->background) || !empty($settings->background_image) || $settings->padding_top <> '' || $settings->padding_bottom <> '' || $settings->padding_left <> '' || $settings->padding_right <> '' ) { ?>
	.fl-node-<?php echo $id; ?> .heading-advance{ 
		<?php if ( !empty($settings->background) ) { ?>
			background-color: #<?php echo $settings->background; ?>;
		<?php } ?>
		<?php if ( !empty($settings->background_image) ) { ?>
			background-image: url(<?php echo $settings->background_image_src; ?>);
			background-repeat: <?php echo $settings->bg_repeat; ?>;
			background-position: <?php echo $settings->bg_position; ?>;
			background-attachment: <?php echo $settings->bg_attachment; ?>;
			background-size: <?php echo $settings->bg_size; ?>;
		<?php } ?>
		<?php if ( $settings->padding_top <> '' ) { ?>
			padding-top: <?php echo $settings->padding_top; ?>px;
		<?php } ?>
		<?php if ( $settings->padding_bottom <> '' ) { ?>
			padding-bottom: <?php echo $settings->padding_bottom; ?>px;
		<?php } ?>
		<?php if ( $settings->padding_left <> '' ) { ?>
			padding-left: <?php echo $settings->padding_left; ?>px;
		<?php } ?>
		<?php if ( $settings->padding_right <> '' ) { ?>
			padding-right: <?php echo $settings->padding_right; ?>px;
		<?php } ?>
	}
<?php } ?>
<?php if ( !empty($settings->border_color) ) { ?>
	.fl-node-<?php echo $id; ?> .heading-advance.<?php echo $settings->border_position; ?>::before{ 
		border-top: 1px solid #<?php echo $settings->border_color; ?>;
	}
	<?php if ( $settings->border_position <> '' ) { ?>
		.fl-node-<?php echo $id; ?> .heading-advance-box{ 
			<?php if ( $settings->border_position == 'top' ) { ?>
				padding-top: <?php echo $settings->border_position_spacing; ?>px;
			<?php } else { ?>
				padding-bottom: <?php echo $settings->border_position_spacing; ?>px;
			<?php } ?>
		}
	<?php } ?>
<?php } ?>
<?php if ( !empty($settings->title_width) ) { ?>
	.fl-node-<?php echo $id; ?> .heading-advance-box{ 
		max-width: <?php echo $settings->title_width; ?>px;
	}
<?php } ?>
<?php if ( !empty($settings->title_title_width) ) { ?>
	.fl-node-<?php echo $id; ?> .heading-advance-title{ 
		max-width: <?php echo $settings->title_title_width; ?>px;
	}
<?php } ?>
<?php if ( !empty($settings->title_title_prefix_width) ) { ?>
	.fl-node-<?php echo $id; ?> .heading-advance-title .title-prefix{ 
		max-width: <?php echo $settings->title_title_prefix_width; ?>px;
	}
<?php } ?>
<?php if ( !empty($settings->title_title_suffix_width) ) { ?>
	.fl-node-<?php echo $id; ?> .heading-advance-title .title-suffix{ 
		max-width: <?php echo $settings->title_title_suffix_width; ?>px;
	}
<?php } ?>
<?php if ( !empty($settings->title_desc_width) ) { ?>
	.fl-node-<?php echo $id; ?> .heading-advance-desc{ 
		max-width: <?php echo $settings->title_desc_width; ?>px;
	}
<?php } ?>
<?php if ( $settings->title_separator_style != 'icon-only' ) { 
	  if ( $settings->title_separator_style_width <> '' ) { ?>
	.fl-node-<?php echo $id; ?> .heading-advance-separator{ 
		width: <?php echo $settings->title_separator_style_width; ?>%;
	}
<?php } } ?>
<?php if ( $settings->title_separator_style != 'icon-only' ) { 
	  if ( !empty($settings->title_separator_style_width) && $settings->title_separator_style_width > '100' ) { ?>
	<?php $title_separator_style_width_margin = (100-$settings->title_separator_style_width)/2; ?>
	.fl-node-<?php echo $id; ?> .heading-advance-separator{ 
		margin-left: <?php echo $title_separator_style_width_margin; ?>%;
		margin-right: <?php echo $title_separator_style_width_margin; ?>%;
	}
<?php } } ?>
<?php if ( $settings->title_separator_style_weight <> '' ) { ?>
	.fl-node-<?php echo $id; ?> .heading-advance-separator div > span{ 
		border-top-width: <?php echo $settings->title_separator_style_weight; ?>px;
	}
	.fl-node-<?php echo $id; ?> .heading-advance-separator .text{ 
		border-width: <?php echo $settings->title_separator_style_weight; ?>px;
	}
<?php } ?>
<?php if ( $settings->title_separator_icon_size <> '' && $settings->title_separator_icon_source <> 'image' ) { ?>
	.fl-node-<?php echo $id; ?> .heading-advance-separator div:nth-child(2){ 
		font-size: <?php echo $settings->title_separator_icon_size; ?>px;
		line-height: normal;
	}
<?php } ?>
<?php if ( $settings->title_separator_icon_spacing <> '' && $settings->title_separator_icon_source != 'none' ) { ?>
	.fl-node-<?php echo $id; ?> .heading-advance-separator div:nth-child(1){ 
		padding-right: <?php echo $settings->title_separator_icon_spacing; ?>px !important;
	}
	.fl-node-<?php echo $id; ?> .heading-advance-separator div:nth-child(3){ 
		padding-left: <?php echo $settings->title_separator_icon_spacing; ?>px !important;
	}
<?php } ?>
<?php if ( $settings->title_icon_size <> '' || $settings->title_icon_width <> '' || $settings->title_icon_position <> '' || $settings->title_icon_spacing_top <> '' || $settings->title_icon_spacing <> '' || !empty($settings->title_icon_color) || !empty($settings->title_icon_alignment) ) { ?>
	.fl-node-<?php echo $id; ?> .heading-advance-icon{ 
	<?php if ( $settings->title_icon_size <> '' ) {?>
		font-size: <?php echo $settings->title_icon_size; ?>px;
	<?php } ?>
	<?php if ( $settings->title_icon_width <> '' && $settings->title_icon_position == '' ) {?>
		width: <?php echo $settings->title_icon_width; ?>px;
	<?php } ?>
	<?php if ( $settings->title_position == 'center' && $settings->title_icon_spacing <> '' ) {?>
		padding-bottom: <?php echo $settings->title_icon_spacing; ?>px;
	<?php } else if ( $settings->title_position == 'left' && $settings->title_icon_spacing <> '' ) {?>
		padding-right: <?php echo $settings->title_icon_spacing; ?>px;
	<?php } else if ( $settings->title_position == 'right' && $settings->title_icon_spacing <> '' ) {?>
		padding-left: <?php echo $settings->title_icon_spacing; ?>px;
	<?php } ?>

	<?php if ( $settings->title_icon_position == 'bottom' && $settings->title_icon_spacing ) {?>
		padding-top: <?php echo $settings->title_icon_spacing; ?>px;
	<?php } else if ( $settings->title_icon_position == 'top' && $settings->title_icon_spacing ) {?>
		padding-bottom: <?php echo $settings->title_icon_spacing; ?>px;
	<?php } ?>

	<?php if ( !empty($settings->title_icon_color) ) {?>
		color: #<?php echo $settings->title_icon_color; ?>;
	<?php } ?>
	<?php if ( !empty($settings->title_icon_alignment) ) {?>
		text-align: <?php echo $settings->title_icon_alignment; ?>;
	<?php } ?>
	}
<?php } ?>

<?php if ( $settings->title_icon_spacing_top <> '' ) { ?>
	.fl-node-<?php echo $id; ?> .heading-advance-icon *{ 
		margin-top: <?php echo $settings->title_icon_spacing_top; ?>px;
	}
<?php } ?>

<?php if ( $settings->title_icon_source_effect <> '' ) { ?>
	<?php if ( $settings->title_icon_source_effect == ' zoom' ) { ?>
		.fl-node-<?php echo $id; ?> .heading-advance-icon.zoom:hover > *{ 
			transform: scale(1.2);
		}
	<?php } ?>
	<?php if ( $settings->title_icon_source_effect == ' flip' ) { ?>
		.fl-node-<?php echo $id; ?> .heading-advance-icon.flip > *{ 
			transition: all 0.8s ease 0s;
		}
		.fl-node-<?php echo $id; ?> .heading-advance-icon.flip:hover > *{ 
			transform: rotateY(360deg);
		}
	<?php } ?>
<?php } ?>

<?php if ( $settings->title_icon_spacing <> '' && $settings->mobile_target_centered <> '' ) { ?>
	<?php if ( $settings->title_position == 'left' ) {?>
		.fl-node-<?php echo $id; ?> .heading-advance-box[class*="centered-"].left .heading-advance-icon{ 
			padding-bottom: <?php echo $settings->title_icon_spacing; ?>px;
		}
	<?php } ?>
	<?php if ( $settings->title_position == 'right' ) {?>
		.fl-node-<?php echo $id; ?> .heading-advance-box[class*="centered-"].right .heading-advance-icon{ 
			padding-top: <?php echo $settings->title_icon_spacing; ?>px;
		}
	<?php } ?>
<?php } ?>
<?php if ( $settings->title_icon_lineheight <> '' ) {?>
	.fl-node-<?php echo $id; ?> .heading-advance-icon i{ 
		line-height: <?php echo $settings->title_icon_lineheight; ?>em;
	}
<?php } ?>
<?php if ( $settings->title_icon_img_size <> '' ) { ?>
	.fl-node-<?php echo $id; ?> .heading-advance-icon img{ 
		width: <?php echo $settings->title_icon_img_size; ?>px;
		height: auto;
	}
<?php } ?>
<?php if ( $settings->title_separator_img_size <> '' ) { ?>
	.fl-node-<?php echo $id; ?> .heading-advance-separator div:nth-child(2) img{ 
		width: <?php echo $settings->title_separator_img_size; ?>px;
		height: auto;
	}
<?php } ?>
<?php if ( $settings->title_separator_style_spacing <> '' ) { ?>
	.fl-node-<?php echo $id; ?> .heading-advance-separator{ 
		<?php if ( $settings->title_separator_icon_position !== 'top' || $settings->title_separator_icon_position !== 'left-top' || $settings->title_separator_icon_position !== 'right-top' || $settings->title_separator_icon_position !== 'left-top' || $settings->title_separator_icon_position !== 'left-top' ) { ?>margin-top: <?php echo $settings->title_separator_style_spacing; ?>px;<?php } ?>
		<?php if ( $settings->title_separator_icon_position !== 'bottom' || $settings->title_separator_icon_position !== 'left-bottom' || $settings->title_separator_icon_position !== 'right-bottom' || $settings->title_separator_icon_position !== 'left-bottom' || $settings->title_separator_icon_position !== 'left-bottom' ) { ?>margin-bottom: <?php echo $settings->title_separator_style_spacing; ?>px;<?php } ?>
	}
<?php } ?>
<?php if ( !empty($settings->title_separator_color) ) { ?>
	.fl-node-<?php echo $id; ?> .heading-advance-separator div > span{ 
		border-top-color: #<?php echo $settings->title_separator_color; ?>;
	}
<?php } ?>
<?php if ( !empty($settings->title_separator_icon_color) ) { ?>
	.fl-node-<?php echo $id; ?> .heading-advance-separator div:nth-child(2){ 
		color: #<?php echo $settings->title_separator_icon_color; ?>;
	}
<?php } ?>


<?php 
	if ( 
		!empty($settings->title_default_color) 		|| 
		$settings->title_default_fontsize <> '' 	||
		$settings->title_default_lineheight <> '' 	||
		$settings->title_default_spacing <> '' 		||
		$settings->title_default_letter_spacing <> '' 		||
		$settings->title_default_weight <> '' 		||
		$settings->title_default_transform <> '' 	||
		!empty($settings->title_default_font) && $settings->title_default_font['family'] != "Default"
	) { ?>
	.fl-node-<?php echo $id; ?> *:not(i):not(.heading-advance-icon){ 
		<?php if ( !empty($settings->title_default_color) ) { ?>color: #<?php echo $settings->title_default_color; ?>;<?php } ?>
		<?php if ( $settings->title_default_fontsize <> '' ) { ?>font-size: <?php echo $settings->title_default_fontsize; ?>px;<?php } ?>
		<?php if ( $settings->title_default_lineheight <> '' ) { ?>line-height: <?php echo $settings->title_default_lineheight; ?>em;<?php } ?>
		<?php if ( $settings->title_default_spacing <> '' ) { ?>padding: <?php echo $settings->title_default_spacing; ?>px 0;<?php } ?>
		<?php if ( $settings->title_default_letter_spacing <> '' ) { ?>letter-spacing: <?php echo $settings->title_default_letter_spacing; ?>px;<?php } ?>
		<?php if ( $settings->title_default_weight <> '' ) { ?>font-weight: <?php echo $settings->title_default_weight; ?>;<?php } ?>
		<?php if ( $settings->title_default_transform <> '' ) { ?>text-transform: <?php echo $settings->title_default_transform; ?>;<?php } ?>
		<?php if ( !empty($settings->title_default_font) && $settings->title_default_font['family'] != "Default" ) { ?><?php FLBuilderFonts::font_css( $settings->title_default_font ); ?><?php } ?>
	}
<?php } ?>

<?php 
	if ( 
		!empty($settings->title_color) 		|| 
		$settings->title_fontsize <> '' 	||
		$settings->title_lineheight <> '' 	||
		$settings->title_spacing <> '' 		||
		$settings->title_letter_spacing <> '' 		||
		$settings->title_weight <> '' 		||
		$settings->title_transform <> '' 	||
		!empty($settings->title_font) && $settings->title_font['family'] != "Default"
	) { ?>
	.fl-node-<?php echo $id; ?> .heading-advance-box .heading-advance-title .title{ 
		<?php if ( !empty($settings->title_color) ) { ?>color: #<?php echo $settings->title_color; ?>;<?php } ?>
		<?php if ( $settings->title_fontsize <> '' ) { ?>font-size: <?php echo $settings->title_fontsize; ?>px;<?php } ?>
		<?php if ( $settings->title_lineheight <> '' ) { ?>line-height: <?php echo $settings->title_lineheight; ?>em;<?php } ?>
		<?php if ( $settings->title_spacing <> '' ) { ?>padding-bottom: <?php echo $settings->title_spacing; ?>px;<?php } ?>
		<?php if ( $settings->title_letter_spacing <> '' ) { ?>letter-spacing: <?php echo $settings->title_letter_spacing; ?>px;<?php } ?>
		<?php if ( $settings->title_weight <> '' ) { ?>font-weight: <?php echo $settings->title_weight; ?>;<?php } ?>
		<?php if ( $settings->title_transform <> '' ) { ?>text-transform: <?php echo $settings->title_transform; ?>;<?php } ?>
		<?php if ( !empty($settings->title_font) && $settings->title_font['family'] != "Default" ) { ?><?php FLBuilderFonts::font_css( $settings->title_font ); ?><?php } ?>
	}
<?php } ?>
<?php 
	if ( 
		!empty($settings->title_prefix_color) 		|| 
		$settings->title_prefix_fontsize <> '' 		||
		$settings->title_prefix_lineheight <> '' 	||
		$settings->title_prefix_spacing <> '' 		||
		$settings->title_prefix_letter_spacing <> '' 		||
		$settings->title_prefix_weight <> '' 		||
		$settings->title_prefix_transform <> '' 	||
		!empty($settings->title_prefix_font) && $settings->title_prefix_font['family'] != "Default"
	) { ?>
	.fl-node-<?php echo $id; ?> .heading-advance-box .heading-advance-title .title-prefix{ 
		<?php if ( !empty($settings->title_prefix_color) ) { ?>color: #<?php echo $settings->title_prefix_color; ?>;<?php } ?>
		<?php if ( $settings->title_prefix_fontsize <> '' ) { ?>font-size: <?php echo $settings->title_prefix_fontsize; ?>px;<?php } ?>
		<?php if ( $settings->title_prefix_lineheight <> '' ) { ?>line-height: <?php echo $settings->title_prefix_lineheight; ?>em;<?php } ?>
		<?php if ( $settings->title_prefix_spacing <> '' ) { ?>padding-bottom: <?php echo $settings->title_prefix_spacing; ?>px;<?php } ?>
		<?php if ( $settings->title_prefix_letter_spacing <> '' ) { ?>letter-spacing: <?php echo $settings->title_prefix_letter_spacing; ?>px;<?php } ?>
		<?php if ( $settings->title_prefix_weight <> '' ) { ?>font-weight: <?php echo $settings->title_prefix_weight; ?>;<?php } ?>
		<?php if ( $settings->title_prefix_transform <> '' ) { ?>text-transform: <?php echo $settings->title_prefix_transform; ?>;<?php } ?>
		<?php if ( !empty($settings->title_prefix_font) && $settings->title_prefix_font['family'] != "Default" ) { ?><?php FLBuilderFonts::font_css( $settings->title_prefix_font ); ?><?php } ?>
	}
<?php } ?>
<?php 
	if ( 
		!empty($settings->title_suffix_color) 		|| 
		$settings->title_suffix_fontsize <> '' 		||
		$settings->title_suffix_lineheight <> '' 	||
		$settings->title_suffix_spacing <> '' 		||
		$settings->title_suffix_letter_spacing <> '' 		||
		$settings->title_suffix_weight <> '' 		||
		$settings->title_suffix_transform <> '' 	||
		!empty($settings->title_suffix_font) && $settings->title_suffix_font['family'] != "Default"
	) { ?>
	.fl-node-<?php echo $id; ?> .heading-advance-box .heading-advance-title .title-suffix{ 
		<?php if ( !empty($settings->title_suffix_color) ) { ?>color: #<?php echo $settings->title_suffix_color; ?>;<?php } ?>
		<?php if ( $settings->title_suffix_fontsize <> '' ) { ?>font-size: <?php echo $settings->title_suffix_fontsize; ?>px;<?php } ?>
		<?php if ( $settings->title_suffix_lineheight <> '' ) { ?>line-height: <?php echo $settings->title_suffix_lineheight; ?>em;<?php } ?>
		<?php if ( $settings->title_suffix_spacing <> '' ) { ?>padding-top: <?php echo $settings->title_suffix_spacing; ?>px;<?php } ?>
		<?php if ( $settings->title_suffix_letter_spacing <> '' ) { ?>letter-spacing: <?php echo $settings->title_suffix_letter_spacing; ?>px;<?php } ?>
		<?php if ( $settings->title_suffix_weight <> '' ) { ?>font-weight: <?php echo $settings->title_suffix_weight; ?>;<?php } ?>
		<?php if ( $settings->title_suffix_transform <> '' ) { ?>text-transform: <?php echo $settings->title_suffix_transform; ?>;<?php } ?>
		<?php if ( !empty($settings->title_suffix_font) && $settings->title_suffix_font['family'] != "Default" ) { ?><?php FLBuilderFonts::font_css( $settings->title_suffix_font ); ?><?php } ?>
	}
<?php } ?>
<?php 
	if ( 
		!empty($settings->title_desc_color) 	|| 
		$settings->title_desc_fontsize <> '' 	||
		$settings->title_desc_lineheight <> '' 	||
		$settings->title_desc_spacing <> '' 	||
		$settings->title_desc_letter_spacing <> '' 	||
		$settings->title_desc_weight <> '' 		||
		$settings->title_desc_transform <> '' 	||
		$settings->title_desc_height <> '' 		||
		!empty($settings->title_desc_color_opacity) || 
		!empty($settings->title_desc_font) && $settings->title_desc_font['family'] != "Default"
	) { ?>
	.fl-node-<?php echo $id; ?> .heading-advance-box .heading-advance-desc{ 
		<?php if ( !empty($settings->title_desc_color) ) { ?>color: #<?php echo $settings->title_desc_color; ?>;<?php } ?>
		<?php if ( !empty($settings->title_desc_color_opacity) ) { ?>opacity: <?php echo $settings->title_desc_color_opacity; ?>;<?php } ?>
		<?php if ( $settings->title_desc_fontsize <> '' ) { ?>font-size: <?php echo $settings->title_desc_fontsize; ?>px;<?php } ?>
		<?php if ( $settings->title_desc_lineheight <> '' ) { ?>line-height: <?php echo $settings->title_desc_lineheight; ?>em;<?php } ?>
		<?php if ( $settings->title_desc_spacing <> '' ) { ?>padding-top: <?php echo $settings->title_desc_spacing; ?>px;<?php } ?>
		<?php if ( $settings->title_desc_letter_spacing <> '' ) { ?>letter-spacing: <?php echo $settings->title_desc_letter_spacing; ?>px;<?php } ?>
		<?php if ( $settings->title_desc_weight <> '' ) { ?>font-weight: <?php echo $settings->title_desc_weight; ?>;<?php } ?>
		<?php if ( $settings->title_desc_transform <> '' ) { ?>text-transform: <?php echo $settings->title_desc_transform; ?>;<?php } ?>
		<?php if ( $settings->title_desc_height <> '' ) { ?>max-height: <?php echo $settings->title_desc_height; ?>px; overflow: hidden;<?php } ?>
		<?php if ( !empty($settings->title_desc_font) && $settings->title_desc_font['family'] != "Default" ) { ?><?php FLBuilderFonts::font_css( $settings->title_desc_font ); ?><?php } ?>
	}
<?php } ?>

<?php if ( !empty($settings->title_desc) && !empty($settings->title_desc_link_color) ) { ?>
	.fl-node-<?php echo $id; ?> .heading-advance-box .heading-advance-desc a{ 
		<?php if ( !empty($settings->title_desc_link_color) ) { ?>color: #<?php echo $settings->title_desc_link_color; ?>;<?php } ?>
	}
<?php } ?>

<?php 
	// MEDIUM - GLOBAL SETTING
	$global_settings = FLBuilderModel::get_global_settings(); 
	if ( 
		$settings->padding_top_medium <> '' || $settings->padding_bottom_medium <> '' || $settings->padding_left_medium <> '' || $settings->padding_right_medium <> '' ||
		
		$settings->title_default_fontsize_medium <> ''	||
		$settings->title_default_lineheight_medium <> ''||
		$settings->title_default_spacing_medium <> ''	||
		$settings->title_default_letter_spacing_medium <> ''	||
		$settings->title_fontsize_medium <> ''			||
		$settings->title_lineheight_medium <> ''		||
		$settings->title_spacing_medium <> ''			||
		$settings->title_letter_spacing_medium <> ''			||
		$settings->title_prefix_fontsize_medium <> ''	||
		$settings->title_prefix_lineheight_medium <> ''	||
		$settings->title_prefix_spacing_medium <> '' 	||
		$settings->title_prefix_letter_spacing_medium <> '' 	||
		$settings->title_suffix_fontsize_medium <> ''	||
		$settings->title_suffix_lineheight_medium <> ''	||
		$settings->title_suffix_spacing_medium <> '' 	||
		$settings->title_suffix_letter_spacing_medium <> '' 	||
		$settings->title_desc_fontsize_medium <> ''		||
		$settings->title_desc_lineheight_medium <> ''	||
		$settings->title_desc_spacing_medium <> ''		||
		$settings->title_desc_letter_spacing_medium <> ''		
   ) { ?>
	@media only screen and ( max-width: <?php echo $global_settings->medium_breakpoint; ?>px ) {
		<?php if ( $settings->padding_top_medium <> '' || $settings->padding_bottom_medium <> '' || $settings->padding_left_medium <> '' || $settings->padding_right_medium <> '' ) { ?>
			.fl-node-<?php echo $id; ?> .heading-advance{ 
				<?php if ( $settings->padding_top_medium <> '' ) { ?>
					padding-top: <?php echo $settings->padding_top_medium; ?>px;
				<?php } ?>
				<?php if ( $settings->padding_bottom_medium <> '' ) { ?>
					padding-bottom: <?php echo $settings->padding_bottom_medium; ?>px;
				<?php } ?>
				<?php if ( $settings->padding_left_medium <> '' ) { ?>
					padding-left: <?php echo $settings->padding_left_medium; ?>px;
				<?php } ?>
				<?php if ( $settings->padding_right_medium <> '' ) { ?>
					padding-right: <?php echo $settings->padding_right_medium; ?>px;
				<?php } ?>
			}
		<?php } ?>
		<?php if ( $settings->title_default_fontsize_medium <> '' || $settings->title_default_lineheight_medium <> '' || $settings->title_default_spacing_medium <> '' || $settings->title_default_letter_spacing_medium <> '' ) { ?>
			.fl-node-<?php echo $id; ?> *:not(i){ 
				<?php if ( $settings->title_default_fontsize_medium <> '' ) { ?>font-size: <?php echo $settings->title_default_fontsize_medium; ?>px;<?php } ?>
				<?php if ( $settings->title_default_lineheight_medium <> '' ) { ?>line-height: <?php echo $settings->title_default_lineheight_medium; ?>em;<?php } ?>
				<?php if ( $settings->title_default_spacing_medium <> '' ) { ?>padding: <?php echo $settings->title_default_spacing_medium; ?>px 0;<?php } ?>
				<?php if ( $settings->title_default_letter_spacing_medium <> '' ) { ?>letter-spacing: <?php echo $settings->title_default_letter_spacing_medium; ?>px;<?php } ?>
			}
		<?php } ?>
		<?php if ( $settings->title_fontsize_medium <> '' || $settings->title_lineheight_medium <> '' || $settings->title_spacing_medium <> '' || $settings->title_letter_spacing_medium <> '' ) { ?>
			.fl-node-<?php echo $id; ?> .heading-advance-box .heading-advance-title .title{ 
				<?php if ( $settings->title_fontsize_medium <> '' ) { ?>font-size: <?php echo $settings->title_fontsize_medium; ?>px;<?php } ?>
				<?php if ( $settings->title_lineheight_medium <> '' ) { ?>line-height: <?php echo $settings->title_lineheight_medium; ?>em;<?php } ?>
				<?php if ( $settings->title_spacing_medium <> '' ) { ?>padding-bottom: <?php echo $settings->title_spacing_medium; ?>px;<?php } ?>
				<?php if ( $settings->title_letter_spacing_medium <> '' ) { ?>letter-spacing: <?php echo $settings->title_letter_spacing_medium; ?>px;<?php } ?>
			}
		<?php } ?>
		<?php if ( $settings->title_prefix_fontsize_medium <> '' || $settings->title_prefix_lineheight_medium <> '' || $settings->title_prefix_spacing_medium <> '' || $settings->title_prefix_letter_spacing_medium <> '' ) { ?>
			.fl-node-<?php echo $id; ?> .heading-advance-box .heading-advance-title .title-prefix{ 
				<?php if ( $settings->title_prefix_fontsize_medium <> '' ) { ?>font-size: <?php echo $settings->title_prefix_fontsize_medium; ?>px;<?php } ?>
				<?php if ( $settings->title_prefix_lineheight_medium <> '' ) { ?>line-height: <?php echo $settings->title_prefix_lineheight_medium; ?>em;<?php } ?>
				<?php if ( $settings->title_prefix_spacing_medium <> '' ) { ?>padding-bottom: <?php echo $settings->title_prefix_spacing_medium; ?>px;<?php } ?>
				<?php if ( $settings->title_prefix_letter_spacing_medium <> '' ) { ?>letter-spacing: <?php echo $settings->title_prefix_letter_spacing_medium; ?>px;<?php } ?>
			}
		<?php } ?>
		<?php if ( $settings->title_suffix_fontsize_medium <> '' || $settings->title_suffix_lineheight_medium <> '' || $settings->title_suffix_spacing_medium <> '' || $settings->title_suffix_letter_spacing_medium <> '' ) { ?>
			.fl-node-<?php echo $id; ?> .heading-advance-box .heading-advance-title .title-suffix{ 
				<?php if ( $settings->title_suffix_fontsize_medium <> '' ) { ?>font-size: <?php echo $settings->title_suffix_fontsize_medium; ?>px;<?php } ?>
				<?php if ( $settings->title_suffix_lineheight_medium <> '' ) { ?>line-height: <?php echo $settings->title_suffix_lineheight_medium; ?>em;<?php } ?>
				<?php if ( $settings->title_suffix_spacing_medium <> '' ) { ?>padding-top: <?php echo $settings->title_suffix_spacing_medium; ?>px;<?php } ?>
				<?php if ( $settings->title_suffix_letter_spacing_medium <> '' ) { ?>letter-spacing: <?php echo $settings->title_suffix_letter_spacing_medium; ?>px;<?php } ?>
			}
		<?php } ?>
		<?php if ( $settings->title_desc_fontsize_medium <> '' || $settings->title_desc_lineheight_medium <> '' || $settings->title_desc_spacing_medium <> '' || $settings->title_desc_letter_spacing_medium <> '' ) { ?>
			.fl-node-<?php echo $id; ?> .heading-advance-box .heading-advance-desc{ 
				<?php if ( $settings->title_desc_fontsize_medium <> '' ) { ?>font-size: <?php echo $settings->title_desc_fontsize_medium; ?>px;<?php } ?>
				<?php if ( $settings->title_desc_lineheight_medium <> '' ) { ?>line-height: <?php echo $settings->title_desc_lineheight_medium; ?>em;<?php } ?>
				<?php if ( $settings->title_desc_spacing_medium <> '' ) { ?>padding-top: <?php echo $settings->title_desc_spacing_medium; ?>px;<?php } ?>
				<?php if ( $settings->title_desc_letter_spacing_medium <> '' ) { ?>letter-spacing: <?php echo $settings->title_desc_letter_spacing_medium; ?>px;<?php } ?>
			}
		<?php } ?>
	}
<?php } ?>
<?php 
	// RESPONSIVE - GLOBAL SETTING
	if ( 
		$settings->padding_top_responsive <> '' || $settings->padding_bottom_responsive <> '' || $settings->padding_left_responsive <> '' || $settings->padding_right_responsive <> '' ||
		
		$settings->title_default_fontsize_responsive <> ''	||
		$settings->title_default_lineheight_responsive <> ''||
		$settings->title_default_spacing_responsive <> ''	||
		$settings->title_default_letter_spacing_responsive <> ''	||
		$settings->title_fontsize_responsive <> ''			||
		$settings->title_lineheight_responsive <> ''		||
		$settings->title_spacing_responsive <> ''			||
		$settings->title_letter_spacing_responsive <> ''			||
		$settings->title_prefix_fontsize_responsive <> ''	||
		$settings->title_prefix_lineheight_responsive <> ''	||
		$settings->title_prefix_spacing_responsive <> '' 	||
		$settings->title_prefix_letter_spacing_responsive <> '' 	||
		$settings->title_suffix_fontsize_responsive <> ''	||
		$settings->title_suffix_lineheight_responsive <> ''	||
		$settings->title_suffix_spacing_responsive <> '' 	||
		$settings->title_suffix_letter_spacing_responsive <> '' 	||
		$settings->title_desc_fontsize_responsive <> ''		||
		$settings->title_desc_lineheight_responsive <> ''	||
		$settings->title_desc_spacing_responsive <> ''		||
		$settings->title_desc_letter_spacing_responsive <> ''		
   ) { ?>
	@media only screen and ( max-width: <?php echo $global_settings->responsive_breakpoint; ?>px ) {
		<?php if ( $settings->padding_top_responsive <> '' || $settings->padding_bottom_responsive <> '' || $settings->padding_left_responsive <> '' || $settings->padding_right_responsive <> '' ) { ?>
			.fl-node-<?php echo $id; ?> .heading-advance{ 
				<?php if ( $settings->padding_top_responsive <> '' ) { ?>
					padding-top: <?php echo $settings->padding_top_responsive; ?>px;
				<?php } ?>
				<?php if ( $settings->padding_bottom_responsive <> '' ) { ?>
					padding-bottom: <?php echo $settings->padding_bottom_responsive; ?>px;
				<?php } ?>
				<?php if ( $settings->padding_left_responsive <> '' ) { ?>
					padding-left: <?php echo $settings->padding_left_responsive; ?>px;
				<?php } ?>
				<?php if ( $settings->padding_right_responsive <> '' ) { ?>
					padding-right: <?php echo $settings->padding_right_responsive; ?>px;
				<?php } ?>
			}
		<?php } ?>
		<?php if ( $settings->title_default_fontsize_responsive <> '' || $settings->title_default_lineheight_responsive <> '' || $settings->title_default_spacing_responsive <> '' || $settings->title_default_letter_spacing_responsive <> '' ) { ?>
			.fl-node-<?php echo $id; ?> *:not(i){ 
				<?php if ( $settings->title_default_fontsize_responsive <> '' ) { ?>font-size: <?php echo $settings->title_default_fontsize_responsive; ?>px;<?php } ?>
				<?php if ( $settings->title_default_lineheight_responsive <> '' ) { ?>line-height: <?php echo $settings->title_default_lineheight_responsive; ?>em;<?php } ?>
				<?php if ( $settings->title_default_spacing_responsive <> '' ) { ?>padding: <?php echo $settings->title_default_spacing_responsive; ?>px 0;<?php } ?>
				<?php if ( $settings->title_default_letter_spacing_responsive <> '' ) { ?>letter-spacing: <?php echo $settings->title_default_letter_spacing_responsive; ?>px;<?php } ?>
			}
		<?php } ?>
		<?php if ( $settings->title_fontsize_responsive <> '' || $settings->title_lineheight_responsive <> '' || $settings->title_spacing_responsive <> '' || $settings->title_letter_spacing_responsive <> '' ) { ?>
			.fl-node-<?php echo $id; ?> .heading-advance-box .heading-advance-title .title{ 
				<?php if ( $settings->title_fontsize_responsive <> '' ) { ?>font-size: <?php echo $settings->title_fontsize_responsive; ?>px;<?php } ?>
				<?php if ( $settings->title_lineheight_responsive <> '' ) { ?>line-height: <?php echo $settings->title_lineheight_responsive; ?>em;<?php } ?>
				<?php if ( $settings->title_spacing_responsive <> '' ) { ?>padding-bottom: <?php echo $settings->title_spacing_responsive; ?>px;<?php } ?>
				<?php if ( $settings->title_letter_spacing_responsive <> '' ) { ?>letter-spacing: <?php echo $settings->title_letter_spacing_responsive; ?>px;<?php } ?>
			}
		<?php } ?>
		<?php if ( $settings->title_prefix_fontsize_responsive <> '' || $settings->title_prefix_lineheight_responsive <> '' || $settings->title_prefix_spacing_responsive <> '' || $settings->title_prefix_letter_spacing_responsive <> '' ) { ?>
			.fl-node-<?php echo $id; ?> .heading-advance-box .heading-advance-title .title-prefix{ 
				<?php if ( $settings->title_prefix_fontsize_responsive <> '' ) { ?>font-size: <?php echo $settings->title_prefix_fontsize_responsive; ?>px;<?php } ?>
				<?php if ( $settings->title_prefix_lineheight_responsive <> '' ) { ?>line-height: <?php echo $settings->title_prefix_lineheight_responsive; ?>em;<?php } ?>
				<?php if ( $settings->title_prefix_spacing_responsive <> '' ) { ?>padding-bottom: <?php echo $settings->title_prefix_spacing_responsive; ?>px;<?php } ?>
				<?php if ( $settings->title_prefix_letter_spacing_responsive <> '' ) { ?>letter-spacing: <?php echo $settings->title_prefix_letter_spacing_responsive; ?>px;<?php } ?>
			}
		<?php } ?>
		<?php if ( $settings->title_suffix_fontsize_responsive <> '' || $settings->title_suffix_lineheight_responsive <> '' || $settings->title_suffix_spacing_responsive <> '' || $settings->title_suffix_letter_spacing_responsive <> '' ) { ?>
			.fl-node-<?php echo $id; ?> .heading-advance-box .heading-advance-title .title-suffix{ 
				<?php if ( $settings->title_suffix_fontsize_responsive <> '' ) { ?>font-size: <?php echo $settings->title_suffix_fontsize_responsive; ?>px;<?php } ?>
				<?php if ( $settings->title_suffix_lineheight_responsive <> '' ) { ?>line-height: <?php echo $settings->title_suffix_lineheight_responsive; ?>em;<?php } ?>
				<?php if ( $settings->title_suffix_spacing_responsive <> '' ) { ?>padding-top: <?php echo $settings->title_suffix_spacing_responsive; ?>px;<?php } ?>
				<?php if ( $settings->title_suffix_letter_spacing_responsive <> '' ) { ?>letter-spacing: <?php echo $settings->title_suffix_letter_spacing_responsive; ?>px;<?php } ?>
			}
		<?php } ?>
		<?php if ( $settings->title_desc_fontsize_responsive <> '' || $settings->title_desc_lineheight_responsive <> '' || $settings->title_desc_spacing_responsive <> '' || $settings->title_desc_letter_spacing_responsive <> '' ) { ?>
			.fl-node-<?php echo $id; ?> .heading-advance-box .heading-advance-desc{ 
				<?php if ( $settings->title_desc_fontsize_responsive <> '' ) { ?>font-size: <?php echo $settings->title_desc_fontsize_responsive; ?>px;<?php } ?>
				<?php if ( $settings->title_desc_lineheight_responsive <> '' ) { ?>line-height: <?php echo $settings->title_desc_lineheight_responsive; ?>em;<?php } ?>
				<?php if ( $settings->title_desc_spacing_responsive <> '' ) { ?>padding-top: <?php echo $settings->title_desc_spacing_responsive; ?>px;<?php } ?>
				<?php if ( $settings->title_desc_letter_spacing_responsive <> '' ) { ?>letter-spacing: <?php echo $settings->title_desc_letter_spacing_responsive; ?>px;<?php } ?>
			}
		<?php } ?>
	}
<?php } ?>

