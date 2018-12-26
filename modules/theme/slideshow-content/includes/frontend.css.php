
<?php if ( $settings->show_dots == 'true') { ?>
	<?php if ( !empty($settings->dots_color) || $settings->dots_size <> '' || $settings->dots_spacing <> '' ) { ?>
		.fl-node-<?php echo $id; ?> .slideshow-content .owl-dots .owl-dot{
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
		.fl-node-<?php echo $id; ?> .slideshow-content .owl-dots .owl-dot.active{
			background-color: #<?php echo $settings->dots_active_color; ?>;
		}
	<?php } ?>
	<?php if ( $settings->dots_margin_top <> '' ) { ?>
		.fl-node-<?php echo $id; ?> .slideshow-content .owl-dots{
			margin-top: <?php echo $settings->dots_margin_top; ?>px;
		}
	<?php } ?>
<?php } ?>


<?php if ( $settings->show_nav == 'true') { ?>
	<?php if ( !empty($settings->nav_bg_color) || $settings->nav_border_thick <> '' || $settings->nav_size <> '' || $settings->nav_radius <> '' ) { ?>
		.fl-node-<?php echo $id; ?> .slideshow-content .owl-nav *{
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
		.fl-node-<?php echo $id; ?> .slideshow-content .owl-nav *:not(:hover){
			border-color: #<?php echo $settings->nav_border_color; ?>;
		}
	<?php } ?>
	<?php if ( !empty($settings->nav_bg_color_hover) || !empty($settings->nav_border_color_hover) ) { ?>
		.fl-node-<?php echo $id; ?> .slideshow-content .owl-nav *:hover{
			<?php if ( !empty($settings->nav_bg_color_hover) ) { ?>
				background-color: #<?php echo $settings->nav_bg_color_hover; ?>;
			<?php } ?>
			<?php if ( !empty($settings->nav_border_color_hover) ) { ?>
				border-color: #<?php echo $settings->nav_border_color_hover; ?>;
			<?php } ?>
		}
	<?php } ?>
	<?php if ( !empty($settings->nav_color_hover) ) { ?>
		.fl-node-<?php echo $id; ?> .slideshow-content .owl-nav *:hover::before,
		.fl-node-<?php echo $id; ?> .slideshow-content .owl-nav *:hover::after{
			background-color: #<?php echo $settings->nav_color_hover; ?>;
		}
	<?php } ?>

	<?php if ( $settings->nav_spacing <> '' ) { ?>
		.fl-node-<?php echo $id; ?> .slideshow-content .owl-nav .owl-prev{
			margin-right: <?php echo $settings->nav_spacing; ?>px;
		}
		.fl-node-<?php echo $id; ?> .slideshow-content .owl-nav .owl-next{
			margin-right: <?php echo $settings->nav_spacing; ?>px;
		}
	<?php } ?>

	<?php if ( !empty($settings->nav_color) || $settings->nav_thick <> '' || $settings->nav_arrow_radius <> '' ) { ?>
		.fl-node-<?php echo $id; ?> .slideshow-content .owl-nav *::before,
		.fl-node-<?php echo $id; ?> .slideshow-content .owl-nav *::after{
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
		.fl-node-<?php echo $id; ?> .slideshow-content .owl-nav{
			margin-top: <?php echo $settings->nav_margin_top; ?>px;
		}
	<?php } ?>
<?php } ?>



<?php if ( $settings->padding_top <> '' || $settings->padding_bottom <> '' || $settings->padding_left <> '' || $settings->padding_right <> '' ) { ?>
.fl-node-<?php echo $id; ?> .slideshow-content-info {
	<?php if ( $settings->padding_top <> '' ){ ?>padding-top: <?php echo $settings->padding_top; ?>px;<?php } ?>
	<?php if ( $settings->padding_bottom <> '' ) { ?>padding-bottom: <?php echo $settings->padding_bottom; ?>px;<?php } ?>
	<?php if ( $settings->padding_left <> '' ) { ?>padding-left: <?php echo $settings->padding_left; ?>px;<?php } ?>
	<?php if ( $settings->padding_right <> '' ) { ?>padding-right: <?php echo $settings->padding_right; ?>px;<?php } ?>
}
<?php } ?>


<?php if ( !empty($settings->button_color) ) { ?>
.fl-node-<?php echo $id; ?> a.slideshow-content-button.hightlight{
	background-color: #<?php echo $settings->button_color; ?>;
	border-color: #<?php echo $settings->button_color; ?>;
}
<?php } ?>

<?php for($i = 0; $i < count($settings->items); $i++) : if(!is_object($settings->items[$i])) continue; ?>
	<?php if ( $settings->items[$i]->title_size <> '' || !empty($settings->items[$i]->title_color) || $settings->items[$i]->title_max_width <> '' ) { ?>
		.fl-node-<?php echo $id; ?> .slide-<?php echo ($i+1); ?> .slideshow-content-title{
			<?php if ( $settings->items[$i]->title_size <> '' ) { ?>
				font-size: <?php echo $settings->items[$i]->title_size; ?>px;
			<?php } ?>
			<?php if ( !empty($settings->items[$i]->title_color) ) { ?>
				color: #<?php echo $settings->items[$i]->title_color; ?>;
			<?php } ?>
			<?php if ( $settings->items[$i]->title_max_width <> '' ) { ?>
				max-width: <?php echo $settings->items[$i]->title_max_width; ?>%;
			<?php } ?>
		}
	<?php } ?>
	<?php if ( $settings->items[$i]->text_size <> '' || !empty($settings->items[$i]->text_color) || $settings->items[$i]->text_max_width <> '' ) { ?>
		.fl-node-<?php echo $id; ?> .slide-<?php echo ($i+1); ?> .slideshow-content-text{
			<?php if ( $settings->items[$i]->text_size <> '') { ?>
				font-size: <?php echo $settings->items[$i]->text_size; ?>px;
			<?php } ?>
			<?php if ( !empty($settings->items[$i]->text_color) ) { ?>
				color: #<?php echo $settings->items[$i]->text_color; ?>;
			<?php } ?>
			<?php if ( $settings->items[$i]->text_max_width <> '' ) { ?>
				max-width: <?php echo $settings->items[$i]->text_max_width; ?>%;
			<?php } ?>
		}
	<?php } ?>
	<?php if ( $settings->items[$i]->btn_label_size <> '' || !empty($settings->items[$i]->btn_label_color) ) { ?>
		.fl-node-<?php echo $id; ?> .slide-<?php echo ($i+1); ?> .slideshow-content-button{
			<?php if ( $settings->items[$i]->btn_label_size <> '') { ?>
				font-size: <?php echo $settings->items[$i]->btn_label_size; ?>px;
			<?php } ?>
			<?php if ( !empty($settings->items[$i]->btn_label_color) ) { ?>
				color: #<?php echo $settings->items[$i]->btn_label_color; ?>;
				border-color: #<?php echo $settings->items[$i]->btn_label_color; ?>;
			<?php } ?>
		}
	<?php } ?>
<?php endfor; ?>



<?php 
// MEDIUM - GLOBAL SETTING
$global_settings = FLBuilderModel::get_global_settings(); ?>
@media only screen and ( max-width: <?php echo $global_settings->medium_breakpoint; ?>px ) {
	<?php if ( $settings->padding_top_middle <> '' || $settings->padding_bottom_middle <> '' || $settings->padding_left_middle <> '' || $settings->padding_right_middle <> '' ) { ?>
	.fl-node-<?php echo $id; ?> .slideshow-content-info {
		<?php if ( $settings->padding_top_middle <> '' ){ ?>padding-top: <?php echo $settings->padding_top_middle; ?>px;<?php } ?>
		<?php if ( $settings->padding_bottom_middle <> '' ) { ?>padding-bottom: <?php echo $settings->padding_bottom_middle; ?>px;<?php } ?>
		<?php if ( $settings->padding_left_middle <> '' ) { ?>padding-left: <?php echo $settings->padding_left_middle; ?>px;<?php } ?>
		<?php if ( $settings->padding_right_middle <> '' ) { ?>padding-right: <?php echo $settings->padding_right_middle; ?>px;<?php } ?>
	}
	<?php } ?>

	<?php for($i = 0; $i < count($settings->items); $i++) : if(!is_object($settings->items[$i])) continue; ?>
		<?php if ( $settings->items[$i]->title_size_medium <> '' || $settings->items[$i]->title_size_medium <> '' ) { ?>
			.fl-node-<?php echo $id; ?> .slide-<?php echo ($i+1); ?> .slideshow-content-title{
				<?php if ( $settings->items[$i]->title_size_medium <> '') { ?>
					font-size: <?php echo $settings->items[$i]->title_size_medium; ?>px;
				<?php } ?>
				<?php if ( $settings->items[$i]->title_max_width_medium <> '' ) { ?>
					max-width: <?php echo $settings->items[$i]->title_max_width_medium; ?>%;
				<?php } ?>
			}
		<?php } ?>
		<?php if ( $settings->items[$i]->text_size_medium <> '' || $settings->items[$i]->text_max_width_medium <> '' ) { ?>
			.fl-node-<?php echo $id; ?> .slide-<?php echo ($i+1); ?> .slideshow-content-text{
				<?php if ( $settings->items[$i]->text_size_medium <> '') { ?>
					font-size: <?php echo $settings->items[$i]->text_size_medium; ?>px;
				<?php } ?>
				<?php if ( $settings->items[$i]->text_max_width_medium <> '' ) { ?>
					max-width: <?php echo $settings->items[$i]->text_max_width_medium; ?>%;
				<?php } ?>
			}
		<?php } ?>
		<?php if ( $settings->items[$i]->btn_label_size_medium <> '') { ?>
			.fl-node-<?php echo $id; ?> .slide-<?php echo ($i+1); ?> .slideshow-content-button{
				font-size: <?php echo $settings->items[$i]->btn_label_size_medium; ?>px;
			}
		<?php } ?>
	<?php endfor; ?>
}
@media only screen and ( max-width: <?php echo $global_settings->responsive_breakpoint; ?>px ) {
	<?php if ( $settings->padding_top_responsive <> '' || $settings->padding_bottom_responsive <> '' || $settings->padding_left_responsive <> '' || $settings->padding_right_responsive <> '' ) { ?>
	.fl-node-<?php echo $id; ?> .slideshow-content-info {
		<?php if ( $settings->padding_top_responsive <> '' ){ ?>padding-top: <?php echo $settings->padding_top_responsive; ?>px;<?php } ?>
		<?php if ( $settings->padding_bottom_responsive <> '' ) { ?>padding-bottom: <?php echo $settings->padding_bottom_responsive; ?>px;<?php } ?>
		<?php if ( $settings->padding_left_responsive <> '' ) { ?>padding-left: <?php echo $settings->padding_left_responsive; ?>px;<?php } ?>
		<?php if ( $settings->padding_right_responsive <> '' ) { ?>padding-right: <?php echo $settings->padding_right_responsive; ?>px;<?php } ?>
	}
	<?php } ?>

	<?php for($i = 0; $i < count($settings->items); $i++) : if(!is_object($settings->items[$i])) continue; ?>
		<?php if ( $settings->items[$i]->title_size_responsive <> '' || $settings->items[$i]->title_size_responsive <> '' ) { ?>
			.fl-node-<?php echo $id; ?> .slide-<?php echo ($i+1); ?> .slideshow-content-title{
				<?php if ( $settings->items[$i]->title_size_responsive <> '') { ?>
					font-size: <?php echo $settings->items[$i]->title_size_responsive; ?>px;
				<?php } ?>
				<?php if ( $settings->items[$i]->title_max_width_responsive <> '' ) { ?>
					max-width: <?php echo $settings->items[$i]->title_max_width_responsive; ?>%;
				<?php } ?>
			}
		<?php } ?>
		<?php if ( $settings->items[$i]->text_size_responsive <> '' || $settings->items[$i]->text_max_width_responsive <> '' ) { ?>
			.fl-node-<?php echo $id; ?> .slide-<?php echo ($i+1); ?> .slideshow-content-text{
				<?php if ( $settings->items[$i]->text_size_responsive <> '') { ?>
					font-size: <?php echo $settings->items[$i]->text_size_responsive; ?>px;
				<?php } ?>
				<?php if ( $settings->items[$i]->text_max_width_responsive <> '' ) { ?>
					max-width: <?php echo $settings->items[$i]->text_max_width_responsive; ?>%;
				<?php } ?>
			}
		<?php } ?>
		<?php if ( $settings->items[$i]->btn_label_size_responsive <> '') { ?>
			.fl-node-<?php echo $id; ?> .slide-<?php echo ($i+1); ?> .slideshow-content-button{
				font-size: <?php echo $settings->items[$i]->btn_label_size_responsive; ?>px;
			}
		<?php } ?>
	<?php endfor; ?>
}