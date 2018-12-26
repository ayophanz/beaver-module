<?php if ( !empty($settings->background) || !empty($settings->background_image) || $settings->padding_top <> '' || $settings->padding_bottom <> '' || $settings->padding_left <> '' || $settings->padding_right <> '' ) { ?>
	.fl-node-<?php echo $id; ?> .counterbar{ 
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
<?php if($settings->counterbar_icon_source == "icon") { ?>
	<?php if(!empty($settings->counterbar_icon_color) || $settings->counterbar_icon_size <> '' || $settings->counterbar_icon_margin_top <> '' ||  $settings->counterbar_icon_margin_bottom <> '' ) { ?>
	.fl-node-<?php echo $id; ?> .counterbar-icon {
		<?php if(!empty($settings->counterbar_icon_color)) { ?>
			color: #<?php echo $settings->counterbar_icon_color; ?>;
		<?php } ?>
		<?php if( $settings->counterbar_icon_size <> '' ) { ?>
			font-size: <?php echo $settings->counterbar_icon_size; ?>px;
		<?php } ?>
		<?php if( $settings->counterbar_icon_margin_top <> '' ) { ?>
			margin-top: <?php echo $settings->counterbar_icon_margin_top; ?>px;
		<?php } ?>
		<?php if( $settings->counterbar_icon_margin_bottom <> '' ) { ?>
			margin-bottom: <?php echo $settings->counterbar_icon_margin_bottom; ?>px;
		<?php } ?>
	}
	<?php } ?>
<?php } else if ($settings->counterbar_icon_source == "image") { ?>
	<?php if( $settings->counterbar_icon_img_size <> '' || $settings->counterbar_icon_margin_top <> '' ||  $settings->counterbar_icon_margin_bottom <> '' ) { ?>
	.fl-node-<?php echo $id; ?> .counterbar-icon {
		<?php if( $settings->counterbar_icon_img_size <> '' ) { ?>
			width: <?php echo $settings->counterbar_icon_img_size; ?>px;
		<?php } ?>
		<?php if( $settings->counterbar_icon_margin_top <> '' ) { ?>
			margin-top: <?php echo $settings->counterbar_icon_margin_top; ?>px;
		<?php } ?>
		<?php if( $settings->counterbar_icon_margin_bottom <> '' ) { ?>
			margin-bottom: <?php echo $settings->counterbar_icon_margin_bottom; ?>px;
		<?php } ?>
	}
	<?php } ?>
<?php } ?>

<?php // SVG CIRLCE START ?>
<?php if( $settings->counterbar_circle_size <> '' ) { ?>
	.fl-node-<?php echo $id; ?> .counterbar.circle .counterbar-inner {
		height: <?php echo ($settings->counterbar_circle_size-4);?>px;
	}
	.fl-node-<?php echo $id; ?> .counterbar-circle .svg {
		height: <?php echo $settings->counterbar_circle_size;?>px;
	}
<?php } ?>

<?php if ( !empty($settings->counterbar_circle_bg_color) || $settings->counterbar_circle_width <> '' || $settings->counterbar_circle_width_opacity <> '' ) { ?>
	.fl-node-<?php echo $id; ?> .counterbar-circle .svg circle.bar {
		<?php if ( !empty($settings->counterbar_circle_bg_color) ) { ?>
			stroke: #<?php echo $settings->counterbar_circle_bg_color; ?>;
		<?php } ?>
		<?php if ( $settings->counterbar_circle_width <> '' ) { ?>
			stroke-width: <?php echo $settings->counterbar_circle_width; ?>px;
		<?php } ?>
		<?php if ( $settings->counterbar_circle_width_opacity <> '' ) { ?>
			opacity: <?php echo $settings->counterbar_circle_width_opacity/100; ?>;
		<?php } ?>
	}
<?php } ?>
<?php if ( !empty($settings->counterbar_circle_color) || $settings->counterbar_circle_width_counter <> '' || $settings->counterbar_circle_width_counter_opacity <> '' ) { ?>
	.fl-node-<?php echo $id; ?> .counterbar-circle .svg circle.bar-counter {
		<?php if ( !empty($settings->counterbar_circle_color) ) { ?>
			stroke: #<?php echo $settings->counterbar_circle_color; ?>;
		<?php } ?>
		<?php if ( $settings->counterbar_circle_width_counter <> '' ) { ?>
			stroke-width: <?php echo $settings->counterbar_circle_width_counter; ?>px;
		<?php } ?>
		<?php if ( $settings->counterbar_circle_width_counter_opacity <> '' ) { ?>
			opacity: <?php echo $settings->counterbar_circle_width_counter_opacity/100; ?>;
		<?php } ?>
	}
<?php } ?>


<?php if(!empty($settings->counterbar_number_color) || $settings->counterbar_number_margin_bottom <> '' || $settings->counterbar_number_size <> '' || !empty($settings->counterbar_number_font) || !empty($settings->counterbar_number_font_weight) ) { ?>
.fl-node-<?php echo $id; ?> .counterbar-number {
	<?php if( !empty($settings->counterbar_number_color) ) { ?>
		color: #<?php echo $settings->counterbar_number_color; ?>;
	<?php } ?>
	<?php if( $settings->counterbar_number_size <> '') { ?>
		font-size: <?php echo $settings->counterbar_number_size; ?>px;
	<?php } ?>
	<?php if( !empty($settings->counterbar_number_font) && $settings->counterbar_number_font['family'] != 'Default' ) { ?>
		<?php FLBuilderFonts::font_css( $settings->counterbar_number_font ); ?>
	<?php } ?>
	<?php if( $settings->counterbar_number_font_weight <> '') { ?>
		font-weight: <?php echo $settings->counterbar_number_font_weight; ?>;
	<?php } ?>
	<?php if( $settings->counterbar_number_margin_bottom <> '' ) { ?>
		margin-bottom: <?php echo $settings->counterbar_number_margin_bottom; ?>px;
	<?php } ?>
}
<?php } ?>
<?php if(!empty($settings->counterbar_title_color) || $settings->counterbar_title_size <> '' || !empty($settings->counterbar_title_font) || !empty($settings->counterbar_title_font_weight) ) { ?>
.fl-node-<?php echo $id; ?> .counterbar-title {
	<?php if( !empty($settings->counterbar_title_color) ) { ?>
		color: #<?php echo $settings->counterbar_title_color; ?>;
	<?php } ?>
	<?php if( $settings->counterbar_title_size <> '') { ?>
		font-size: <?php echo $settings->counterbar_title_size; ?>px;
	<?php } ?>
	<?php if( !empty($settings->counterbar_title_font) && $settings->counterbar_title_font['family'] != 'Default') { ?>
		<?php FLBuilderFonts::font_css( $settings->counterbar_title_font ); ?>
	<?php } ?>
	<?php if( $settings->counterbar_title_font_weight <> '') { ?>
		font-weight: <?php echo $settings->counterbar_title_font_weight; ?>;
	<?php } ?>
}
<?php } ?>

<?php // RESPONSIVE ?>
<?php if ( 
	$settings->counterbar_circle_size_medium <> '' 		|| 
	$settings->counterbar_icon_size_medium <> '' 		||  
	$settings->counterbar_icon_img_size_medium <> '' 	||  
	$settings->counterbar_number_size_medium <> '' 		||  
	$settings->counterbar_title_size_medium <> '' 		|| 
	$settings->counterbar_icon_margin_top_medium <> '' 	||  
	$settings->counterbar_icon_margin_bottom_medium <> ''
) { ?>
@media only screen and ( max-width: 1023px ) {
	<?php if( $settings->counterbar_circle_size_medium <> '' ) { ?>
	.fl-node-<?php echo $id; ?> .counterbar.circle .counterbar-inner {
		height: <?php echo ($settings->counterbar_circle_size_medium-8);?>px;
	}
	.fl-node-<?php echo $id; ?> .counterbar-circle .svg {
		height: <?php echo $settings->counterbar_circle_size_medium;?>px;
	}
	<?php } ?>
	<?php if( $settings->counterbar_icon_size_medium <> '' || $settings->counterbar_icon_img_size_medium <> '' ||  $settings->counterbar_icon_margin_top_medium <> '' ||  $settings->counterbar_icon_margin_bottom_medium <> '' ) { ?>
	.fl-node-<?php echo $id; ?> .counterbar-icon {
		<?php if( $settings->counterbar_icon_size_medium <> '' ) { ?>
			font-size: <?php echo $settings->counterbar_icon_size_medium; ?>px;
		<?php } ?>
		<?php if( $settings->counterbar_icon_img_size_medium <> '' ) { ?>
			width: <?php echo $settings->counterbar_icon_img_size_medium; ?>px;
		<?php } ?>
		<?php if( $settings->counterbar_icon_margin_top_medium <> '' ) { ?>
			margin-top: <?php echo $settings->counterbar_icon_margin_top_medium; ?>px;
		<?php } ?>
		<?php if( $settings->counterbar_icon_margin_bottom_medium <> '' ) { ?>
			margin-bottom: <?php echo $settings->counterbar_icon_margin_bottom_medium; ?>px;
		<?php } ?>
	}
	<?php } ?>
	.fl-node-<?php echo $id; ?> .counterbar-number {
		<?php if( $settings->counterbar_number_size_medium <> '' ) { ?>
			font-size: <?php echo $settings->counterbar_number_size_medium; ?>px;
		<?php } ?>
	}
	.fl-node-<?php echo $id; ?> .counterbar-title {
		<?php if( $settings->counterbar_title_size_medium <> '' ) { ?>
			font-size: <?php echo $settings->counterbar_title_size_medium; ?>px;
		<?php } ?>
	}
}
<?php } ?>


<?php if ( 
	$settings->counterbar_circle_size_responsive <> '' 		|| 
	$settings->counterbar_icon_size_responsive <> '' 		||  
	$settings->counterbar_icon_img_size_responsive <> '' 	||  
	$settings->counterbar_number_size_responsive <> '' 		||  
	$settings->counterbar_title_size_responsive <> '' 		|| 
	$settings->counterbar_icon_margin_top_responsive <> '' 	||  
	$settings->counterbar_icon_margin_bottom_responsive <> ''
) { ?>
@media only screen and ( max-width: 767px ) {
	<?php if( $settings->counterbar_circle_size_responsive <> '' ) { ?>
	.fl-node-<?php echo $id; ?> .counterbar.circle .counterbar-inner {
		height: <?php echo ($settings->counterbar_circle_size_responsive-8);?>px;
	}
	.fl-node-<?php echo $id; ?> .counterbar-circle .svg {
		height: <?php echo $settings->counterbar_circle_size_responsive;?>px;
	}
	<?php } ?>
	<?php if( $settings->counterbar_icon_size_responsive <> '' || $settings->counterbar_icon_img_size_responsive <> '' ||  $settings->counterbar_icon_margin_top_responsive <> '' ||  $settings->counterbar_icon_margin_bottom_responsive <> '' ) { ?>
	.fl-node-<?php echo $id; ?> .counterbar-icon {
		<?php if( $settings->counterbar_icon_size_responsive <> '' ) { ?>
			font-size: <?php echo $settings->counterbar_icon_size_responsive; ?>px;
		<?php } ?>
		<?php if( $settings->counterbar_icon_img_size_responsive <> '' ) { ?>
			width: <?php echo $settings->counterbar_icon_img_size_responsive; ?>px;
		<?php } ?>
		<?php if( $settings->counterbar_icon_margin_top_responsive <> '' ) { ?>
			margin-top: <?php echo $settings->counterbar_icon_margin_top_responsive; ?>px;
		<?php } ?>
		<?php if( $settings->counterbar_icon_margin_bottom_responsive <> '' ) { ?>
			margin-bottom: <?php echo $settings->counterbar_icon_margin_bottom_responsive; ?>px;
		<?php } ?>
	}
	<?php } ?>
	.fl-node-<?php echo $id; ?> .counterbar-number {
		<?php if( $settings->counterbar_number_size_responsive <> '' ) { ?>
			font-size: <?php echo $settings->counterbar_number_size_responsive; ?>px;
		<?php } ?>
	}
	.fl-node-<?php echo $id; ?> .counterbar-title {
		<?php if( $settings->counterbar_title_size_responsive <> '' ) { ?>
			font-size: <?php echo $settings->counterbar_title_size_responsive; ?>px;
		<?php } ?>
	}
}
<?php } ?>