<?php if ( $settings->height == 'autoheight' && $settings->autoheight_maxheight <> '' ) { ?>
	.fl-node-<?php echo $id; ?> .slideshow-image .slide img { max-height: <?php echo $settings->autoheight_maxheight; ?>px; }
<?php } ?>
<?php if ( $settings->height == 'customheight' && $settings->customheight <> '' ) { ?>
	.fl-node-<?php echo $id; ?> .slideshow-image { min-height: <?php echo $settings->customheight; ?>px; }
	.fl-node-<?php echo $id; ?> .slideshow-image .slide { height: <?php echo $settings->customheight; ?>px; }
<?php } ?>
<?php if ( $settings->height == 'fullheight' ) { ?>
	.fl-node-<?php echo $id; ?> .slideshow-image,
	.fl-node-<?php echo $id; ?> .slideshow-image .slide { height: 100vh; }
<?php } ?>



<?php if ( !empty($settings->caption_color) || !empty($settings->caption_weight) || isset($settings->caption_size) || isset($settings->caption_spacing_top) || isset($settings->caption_spacing_bottom) ) { ?>
	.fl-node-<?php echo $id; ?> .slideshow-caption{
	<?php if ( isset($settings->caption_color) ) { ?>
		color: #<?php echo $settings->caption_color; ?>;
	<?php } ?>
	<?php if ( isset($settings->caption_size) ) { ?>
		font-size: <?php echo $settings->caption_size; ?>px;
	<?php } ?>
	<?php if ( isset($settings->caption_weight) ) { ?>
		font-weight: <?php echo $settings->caption_weight; ?>;
	<?php } ?>
	<?php if ( isset($settings->caption_spacing_top) ) { ?>
		padding-top: <?php echo $settings->caption_spacing_top; ?>px;
	<?php } ?>
	<?php if ( isset($settings->caption_spacing_bottom) ) { ?>
		padding-bottom: <?php echo $settings->caption_spacing_bottom; ?>px;
	<?php } ?>
	}
<?php } ?>


<?php if ( $settings->show_dots == 'true') { ?>
	<?php if ( !empty($settings->dots_color) || $settings->dots_size <> '' || $settings->dots_spacing <> '' ) { ?>
		.fl-node-<?php echo $id; ?> .slideshow-image .owl-dots .owl-dot{
		<?php if ( !empty($settings->dots_color) ) { ?>
			background-color: #<?php echo $settings->dots_color; ?>;
		<?php } ?>
		<?php if ( $settings->dots_size <> '' ) { ?>
			width: <?php echo $settings->dots_size; ?>px;
			height: <?php echo $settings->dots_size; ?>px;
		<?php } ?>
		<?php if ( $settings->dots_spacing <> '' ) { ?>
			margin-left: <?php echo $settings->dots_spacing; ?>px;
			margin-right: <?php echo $settings->dots_spacing; ?>px;
		<?php } ?>
		}
	<?php } ?>
	<?php if ( !empty($settings->dots_active_color) ) { ?>
		.fl-node-<?php echo $id; ?> .slideshow-image .owl-dots .owl-dot.active{
			background-color: #<?php echo $settings->dots_active_color; ?>;
		}
	<?php } ?>
	<?php if ( $settings->dots_margin_top <> '' ) { ?>
		.fl-node-<?php echo $id; ?> .slideshow-image .owl-dots{
			margin-top: <?php echo $settings->dots_margin_top; ?>px;
		}
	<?php } ?>
<?php } ?>


<?php if ( $settings->show_nav == 'true') { ?>
	<?php if ( !empty($settings->nav_bg_color) || $settings->nav_border_thick <> '' || $settings->nav_size <> '' || $settings->nav_radius <> '' ) { ?>
		.fl-node-<?php echo $id; ?> .slideshow-image .owl-nav *{
		<?php if ( !empty($settings->nav_bg_color) ) { ?>
			background-color: #<?php echo $settings->nav_bg_color; ?>;
		<?php } ?>
		<?php if ( $settings->nav_border_thick <> '' ) { ?>
			border-width: <?php echo $settings->nav_border_thick; ?>px;
		<?php } ?>
		<?php if ( $settings->nav_size <> '' ) { ?>
			width: <?php echo $settings->nav_size; ?>px;
			height: <?php echo $settings->nav_size; ?>px;
		<?php } ?>
		<?php if ( $settings->nav_radius <> '' ) { ?>
			border-radius: <?php echo $settings->nav_radius; ?>px;
		<?php } ?>
		}
	<?php } ?>

	<?php if ( !empty($settings->nav_border_color) ) { ?>
		.fl-node-<?php echo $id; ?> .slideshow-image .owl-nav *:not(:hover){
			border-color: #<?php echo $settings->nav_border_color; ?>;
		}
	<?php } ?>
	<?php if ( !empty($settings->nav_bg_color_hover) || !empty($settings->nav_border_color_hover) ) { ?>
		.fl-node-<?php echo $id; ?> .slideshow-image .owl-nav *:hover{
			<?php if ( !empty($settings->nav_bg_color_hover) ) { ?>
				background-color: #<?php echo $settings->nav_bg_color_hover; ?>;
			<?php } ?>
			<?php if ( !empty($settings->nav_border_color_hover) ) { ?>
				border-color: #<?php echo $settings->nav_border_color_hover; ?>;
			<?php } ?>
		}
	<?php } ?>
	<?php if ( !empty($settings->nav_color_hover) ) { ?>
		.fl-node-<?php echo $id; ?> .slideshow-image .owl-nav *:hover::before,
		.fl-node-<?php echo $id; ?> .slideshow-image .owl-nav *:hover::after{
			background-color: #<?php echo $settings->nav_color_hover; ?>;
		}
	<?php } ?>

	<?php if ( $settings->nav_spacing <> '' ) { ?>
		.fl-node-<?php echo $id; ?> .slideshow-image .owl-nav .owl-prev{
			left: <?php echo $settings->nav_spacing; ?>px;
		}
		.fl-node-<?php echo $id; ?> .slideshow-image .owl-nav .owl-next{
			right: <?php echo $settings->nav_spacing; ?>px;
		}
	<?php } ?>

	<?php if ( !empty($settings->nav_color) || $settings->nav_thick <> '' || $settings->nav_arrow_radius <> '' ) { ?>
		.fl-node-<?php echo $id; ?> .slideshow-image .owl-nav *::before,
		.fl-node-<?php echo $id; ?> .slideshow-image .owl-nav *::after{
		<?php if ( !empty($settings->nav_color) ) { ?>
			background-color: #<?php echo $settings->nav_color; ?>;
		<?php } ?>
		<?php if ( $settings->nav_thick <> '' ) { ?>
			width: <?php echo $settings->nav_thick; ?>px;
		<?php } ?>
		<?php if ( $settings->nav_arrow_radius <> '' ) { ?>
			border-raduis: <?php echo $settings->nav_arrow_radius; ?>px;
		<?php } ?>
		}
	<?php } ?>
	<?php if ( $settings->nav_margin_top <> '' ) { ?>
		.fl-node-<?php echo $id; ?> .slideshow-image .owl-nav{
			margin-top: <?php echo $settings->nav_margin_top; ?>px;
		}
	<?php } ?>
<?php } ?>


<?php //RESPONSIVE CSS
// MEDIUM - GLOBAL SETTING
$global_settings = FLBuilderModel::get_global_settings(); 
if ( $settings->height == 'customheight' && $settings->customheight_medium <> '' ||
   	 $settings->height == 'customheight' && $settings->autoheight_maxheight_medium <> '') { ?>
	@media only screen and ( max-width: <?php echo $global_settings->medium_breakpoint; ?>px ) {
		<?php if ( $settings->height == 'customheight' && $settings->customheight_medium <> '' ) { ?>
			.fl-node-<?php echo $id; ?> .slideshow-image { min-height: <?php echo $settings->customheight_medium; ?>px; }
			.fl-node-<?php echo $id; ?> .slideshow-image .slide { height: <?php echo $settings->customheight_medium; ?>px; }
		<?php } ?>
		<?php if ( $settings->height == 'customheight' && $settings->autoheight_maxheight_medium <> '' ) { ?>
			.fl-node-<?php echo $id; ?> .slideshow-image .slide img { max-height: <?php echo $settings->autoheight_maxheight_medium; ?>px; }
		<?php } ?>
	}
<?php } ?>
<?php //RESPONSIVE - GLOBAL SETTING
if ( $settings->height == 'customheight' && $settings->customheight_responsive <> '' ||
   	 $settings->height == 'customheight' && $settings->autoheight_maxheight_responsive <> '') { ?>
	@media only screen and ( max-width: <?php echo $global_settings->responsive_breakpoint; ?>px ) {
		<?php if ( $settings->height == 'customheight' && $settings->customheight_responsive <> '' ) { ?>
			.fl-node-<?php echo $id; ?> .slideshow-image { min-height: <?php echo $settings->customheight_responsive; ?>px; }
			.fl-node-<?php echo $id; ?> .slideshow-image .slide { height: <?php echo $settings->customheight_responsive; ?>px; }
		<?php } ?>
		<?php if ( $settings->height == 'customheight' && $settings->autoheight_maxheight_responsive <> '' ) { ?>
			.fl-node-<?php echo $id; ?> .slideshow-image .slide img { max-height: <?php echo $settings->autoheight_maxheight_responsive; ?>px; }
		<?php } ?>
	}
<?php } ?>