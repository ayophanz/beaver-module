<?php if ( $settings->categories_nav != 'hide' ) { ?>
	<?php if ( isset($settings->buttons_spacing) ) { ?>
	.fl-node-<?php echo $id; ?> .video-filter {
		<?php if ( isset($settings->buttons_spacing) ) { ?>
			margin-bottom: <?php echo $settings->buttons_spacing; ?>px;
		<?php } ?>
	}
	<?php } ?>
	<?php if ( $settings->button_font_weight != '400' || $settings->button_text_transform <> '' || isset($settings->button_radius) || isset($settings->button_padding_top) || isset($settings->button_padding_bottom) || isset($settings->button_padding_left) || isset($settings->button_padding_right) || isset($settings->buttons_margin) ) { ?>
	.fl-node-<?php echo $id; ?> .video-filter .video-button {
		<?php if ( $settings->button_font_weight <> '' ) { ?>
			font-weight: <?php echo $settings->button_font_weight; ?>;
		<?php } ?>
		<?php if ( $settings->button_text_transform <> '' ) { ?>
			text-transform: <?php echo $settings->button_text_transform; ?>;
		<?php } ?>
		<?php if ( isset($settings->button_radius) ) { ?>
			border-radius: <?php echo $settings->button_radius; ?>px;
			-webkit-border-radius: <?php echo $settings->button_radius; ?>px;
		<?php } ?>
		<?php if ( isset($settings->button_padding_top) ) { ?>
			padding-top: <?php echo $settings->button_padding_top; ?>px;
		<?php } ?>
		<?php if ( isset($settings->button_padding_bottom) ) { ?>
			padding-bottom: <?php echo $settings->button_padding_bottom; ?>px;
		<?php } ?>
		<?php if ( isset($settings->button_padding_left) ) { ?>
			padding-left: <?php echo $settings->button_padding_left; ?>px;
		<?php } ?>
		<?php if ( isset($settings->button_padding_right) ) { ?>
			padding-right: <?php echo $settings->button_padding_right; ?>px;
		<?php } ?>
		<?php if ( isset($settings->buttons_margin) ) { ?>
			margin: <?php echo $settings->buttons_margin; ?>px;
		<?php } ?>
	}
	<?php } ?>
	<?php if ( !empty($settings->button_bg_color) || !empty($settings->button_text_color) ) { ?>
	.fl-node-<?php echo $id; ?> .video-filter .video-button:not(.active) {
		<?php if ( !empty($settings->button_bg_color) ) { ?>
			background-color: #<?php echo $settings->button_bg_color; ?>;
		<?php } ?>.fl-node-<?php echo $id; ?> 
		<?php if ( !empty($settings->button_text_color) ) { ?>
			color: #<?php echo $settings->button_text_color; ?>;
		<?php } ?>
	}
	<?php } ?>
	<?php if ( !empty($settings->button_bg_color_active) || !empty($settings->button_text_color_active) ) { ?>
	.fl-node-<?php echo $id; ?> .video-filter .video-button.active,
	.fl-node-<?php echo $id; ?> .video-filter .video-button:hover {
		<?php if ( !empty($settings->button_bg_color_active) ) { ?>
			background-color: #<?php echo $settings->button_bg_color_active; ?>;
		<?php } ?>
		<?php if ( !empty($settings->button_text_color_active) ) { ?>
			color: #<?php echo $settings->button_text_color_active; ?>;
		<?php } ?>
	}
	<?php } ?>
<?php } ?>





<?php if ( !empty($settings->grid_info_bg_color) || !empty($settings->grid_info_color) || $settings->grid_info_padding_top <> '' || $settings->grid_info_padding_bottom <> '' || $settings->grid_info_padding_left <> '' || $settings->grid_info_padding_right <> '') { ?>
	.fl-node-<?php echo $id; ?> .grids figcaption {
		<?php if ( !empty($settings->grid_info_bg_color) ) { ?>
			background-color: #<?php echo $settings->grid_info_bg_color; ?>;
		<?php } ?>
		<?php if ( !empty($settings->grid_info_color) ) { ?>
			color: #<?php echo $settings->grid_info_color; ?>;
		<?php } ?>
		<?php if ( $settings->grid_info_padding_top <> '' ) { ?>
			padding-top: <?php echo $settings->grid_info_padding_top; ?>px;
		<?php } ?>
		<?php if ( $settings->grid_info_padding_bottom <> '' ) { ?>
			padding-bottom: <?php echo $settings->grid_info_padding_bottom; ?>px;
		<?php } ?>
		<?php if ( $settings->grid_info_padding_left <> '' ) { ?>
			padding-left: <?php echo $settings->grid_info_padding_left; ?>px;
		<?php } ?>
		<?php if ( $settings->grid_info_padding_right <> '' ) { ?>
			padding-right: <?php echo $settings->grid_info_padding_right; ?>px;
		<?php } ?>
	}
<?php } ?>
<?php if ( !empty($settings->grid_info_title_color) || $settings->grid_info_title_size || $settings->grid_info_title_weight <> '' || $settings->grid_info_title_transform <> '' || $settings->grid_info_title_spacing <> '' ) { ?>
	.fl-node-<?php echo $id; ?> .grids .video-title {
		<?php if ( !empty($settings->grid_info_title_color) ) { ?>
			color: #<?php echo $settings->grid_info_title_color; ?>;
		<?php } ?>
		<?php if ( $settings->grid_info_title_size <> '' ) { ?>
			font-size: <?php echo $settings->grid_info_title_size; ?>px;
		<?php } ?>
		<?php if ( $settings->grid_info_title_weight <> '' ) { ?>
			font-weight: <?php echo $settings->grid_info_title_weight; ?>;
		<?php } ?>
		<?php if ( $settings->grid_info_title_transform <> '' ) { ?>
			text-transform: <?php echo $settings->grid_info_title_transform; ?>;
		<?php } ?>
		<?php if ( $settings->grid_info_title_spacing <> '' ) { ?>
			margin-bottom: <?php echo $settings->grid_info_title_spacing; ?>px;
		<?php } ?>
	}
<?php } ?>
<?php if ( $settings->grid_button_text <> '' ) { ?>
	<?php if ( $settings->grid_button_font_weight <> '' || $settings->grid_button_text_transform <> '' || isset($settings->grid_button_radius) || isset($settings->grid_button_padding_top) || isset($settings->grid_button_padding_bottom) || isset($settings->grid_button_padding_left) || isset($settings->grid_button_padding_right) || isset($settings->grid_buttons_margin) ) { ?>
	.fl-node-<?php echo $id; ?> .grids .video-button {
		<?php if ( $settings->grid_button_font_weight <> '' ) { ?>
			font-weight: <?php echo $settings->grid_button_font_weight; ?>;
		<?php } ?>
		<?php if ( $settings->grid_button_text_transform <> '' ) { ?>
			text-transform: <?php echo $settings->grid_button_text_transform; ?>;
		<?php } ?>
		<?php if ( isset($settings->grid_button_radius) ) { ?>
			border-radius: <?php echo $settings->grid_button_radius; ?>px;
			-webkit-border-radius: <?php echo $settings->grid_button_radius; ?>px;
		<?php } ?>
		<?php if ( isset($settings->grid_button_padding_top) ) { ?>
			padding-top: <?php echo $settings->grid_button_padding_top; ?>px;
		<?php } ?>
		<?php if ( isset($settings->grid_button_padding_bottom) ) { ?>
			padding-bottom: <?php echo $settings->grid_button_padding_bottom; ?>px;
		<?php } ?>
		<?php if ( isset($settings->grid_button_padding_left) ) { ?>
			padding-left: <?php echo $settings->grid_button_padding_left; ?>px;
		<?php } ?>
		<?php if ( isset($settings->grid_button_padding_right) ) { ?>
			padding-right: <?php echo $settings->grid_button_padding_right; ?>px;
		<?php } ?>
		<?php if ( isset($settings->grid_buttons_margin) ) { ?>
			margin: <?php echo $settings->grid_buttons_margin; ?>px;
		<?php } ?>
	}
	<?php } ?>
	<?php if ( !empty($settings->grid_button_bg_color) || !empty($settings->grid_button_text_color) ) { ?>
	.fl-node-<?php echo $id; ?> .grids .video-button:not(.active) {
		<?php if ( !empty($settings->grid_button_bg_color) ) { ?>
			background-color: #<?php echo $settings->grid_button_bg_color; ?>;
		<?php } ?>
		<?php if ( !empty($settings->grid_button_text_color) ) { ?>
			color: #<?php echo $settings->grid_button_text_color; ?>;
		<?php } ?>
	}
	<?php } ?>
	<?php if ( !empty($settings->grid_button_bg_color_active) || !empty($settings->grid_button_text_color_active) ) { ?>
	.fl-node-<?php echo $id; ?> .grids .video-button.active,
	.fl-node-<?php echo $id; ?> .grids .video-button:hover {
		<?php if ( !empty($settings->grid_button_bg_color_active) ) { ?>
			background-color: #<?php echo $settings->grid_button_bg_color_active; ?>;
		<?php } ?>
		<?php if ( !empty($settings->grid_button_text_color_active) ) { ?>
			color: #<?php echo $settings->grid_button_text_color_active; ?>;
		<?php } ?>
	}
	<?php } ?>
<?php } ?>


<?php if ( $settings->grid_category == 'enable' ) { ?>
	<?php if ( $settings->grid_category_size <> '' || $settings->grid_category_transform <> '' ) { ?>
		.fl-node-<?php echo $id; ?> .blurb .grids .in-category {
			<?php if ( $settings->grid_category_size <> '' ) { ?>
				font-size: <?php echo $settings->grid_category_size; ?>px;
			<?php } ?>
			<?php if ( $settings->grid_category_transform <> '' ) { ?>
				text-transform: <?php echo $settings->grid_category_transform; ?>;
			<?php } ?>
		}
	<?php } ?>
	<?php if ( !empty($settings->grid_category_color) || !empty($settings->grid_category_color_hover) || $settings->grid_category_size || $settings->grid_category_weight <> '' ) { ?>
		.fl-node-<?php echo $id; ?> .blurb .grids .in-category a {
			<?php if ( !empty($settings->grid_category_color) ) { ?>
				color: #<?php echo $settings->grid_category_color; ?>;
			<?php } ?>
			<?php if ( $settings->grid_category_weight <> '' ) { ?>
				font-weight: <?php echo $settings->grid_category_weight; ?>;
			<?php } ?>
		}
		<?php if ( !empty($settings->grid_category_color) ) { ?>
			.fl-node-<?php echo $id; ?> .blurb .video-items article figure .video-mixitup-photo {
				<?php if ( !empty($settings->grid_category_color) ) { ?>
					background-color: #<?php echo $settings->grid_category_color; ?>;
				<?php } ?>
			}
		<?php } ?>
	<?php } ?>
	<?php if ( !empty($settings->grid_category_color_hover) ) { ?>
		.fl-node-<?php echo $id; ?> .blurb .grids .in-category a:hover {
			<?php if ( !empty($settings->grid_category_color_hover) ) { ?>
				color: #<?php echo $settings->grid_category_color_hover; ?>;
			<?php } ?>
		}
		.fl-node-<?php echo $id; ?> .blurb .video-items article figure:hover .video-mixitup-photo {
			<?php if ( !empty($settings->grid_category_color_hover) ) { ?>
				background-color: #<?php echo $settings->grid_category_color_hover; ?>;
			<?php } ?>
		}
	<?php } ?>
<?php } ?>


<?php if ( $settings->grid_spacing <> '' ) { ?>
.fl-node-<?php echo $id; ?> .video-mixitup .grids { padding-right: <?php echo $settings->grid_spacing; ?>px; margin-left: -<?php echo $settings->grid_spacing; ?>px; width: calc(100% + <?php echo $settings->grid_spacing; ?>px + <?php echo $settings->grid_spacing; ?>px); width: -webkit-calc(100% + <?php echo $settings->grid_spacing; ?>px + <?php echo $settings->grid_spacing; ?>px); }
.fl-node-<?php echo $id; ?> .video-mixitup .grids [class*="grid-"] { margin: 0 0 <?php echo $settings->grid_spacing; ?>px <?php echo $settings->grid_spacing; ?>px; }
@media only screen and ( min-width: 981px ) { 
	.fl-node-<?php echo $id; ?> .video-mixitup .grid-2 { width: calc(16% - <?php echo $settings->grid_spacing; ?>px); width: -webkit-calc(16% - <?php echo $settings->grid_spacing; ?>px); } 
	.fl-node-<?php echo $id; ?> .video-mixitup .grid-2-5 {  width: calc(20% - <?php echo $settings->grid_spacing; ?>px); width: -webkit-calc(20% - <?php echo $settings->grid_spacing; ?>px); } 
	.fl-node-<?php echo $id; ?> .video-mixitup .grid-3 { width: calc(25% - <?php echo $settings->grid_spacing; ?>px); width: -webkit-calc(25% - <?php echo $settings->grid_spacing; ?>px); }
	.fl-node-<?php echo $id; ?> .video-mixitup .grid-4 { width: calc(33.33% - <?php echo $settings->grid_spacing; ?>px); width: -webkit-calc(33.33% - <?php echo $settings->grid_spacing; ?>px); } 
	.fl-node-<?php echo $id; ?> .video-mixitup .grid-6 { width: calc(50% - <?php echo $settings->grid_spacing; ?>px); width: -webkit-calc(50% - <?php echo $settings->grid_spacing; ?>px); } 
	.fl-node-<?php echo $id; ?> .video-mixitup .grid-12 { width: calc(100% - <?php echo $settings->grid_spacing; ?>px); width: -webkit-calc(100% - <?php echo $settings->grid_spacing; ?>px); } 
}
@media only screen and ( max-width: 980px ) {
	.fl-node-<?php echo $id; ?> .video-mixitup .grid-2,
	.fl-node-<?php echo $id; ?> .video-mixitup .grid-2-5 { width: calc(25% - <?php echo $settings->grid_spacing; ?>px); width: -webkit-calc(25% - <?php echo $settings->grid_spacing; ?>px); } 
	.fl-node-<?php echo $id; ?> .video-mixitup .grid-3,
	.fl-node-<?php echo $id; ?> .video-mixitup .grid-4 { width: calc(50% - <?php echo $settings->grid_spacing; ?>px); width: -webkit-calc(50% - <?php echo $settings->grid_spacing; ?>px); } 
	.fl-node-<?php echo $id; ?> .video-mixitup .grid-6,
	.fl-node-<?php echo $id; ?> .video-mixitup .grid-12 { width: calc(100% - <?php echo $settings->grid_spacing; ?>px); width: -webkit-calc(100% - <?php echo $settings->grid_spacing; ?>px); } 
}
@media only screen and ( max-width: 767px ) { 
	.fl-node-<?php echo $id; ?> .video-mixitup .grid-2,
	.fl-node-<?php echo $id; ?> .video-mixitup .grid-2-5 { width: calc(33.33% - <?php echo $settings->grid_spacing; ?>px); width: -webkit-calc(33.33% - <?php echo $settings->grid_spacing; ?>px); } 
	.fl-node-<?php echo $id; ?> .video-mixitup .grid-3,
	.fl-node-<?php echo $id; ?> .video-mixitup .grid-4 { width: calc(50% - <?php echo $settings->grid_spacing; ?>px); width: -webkit-calc(50% - <?php echo $settings->grid_spacing; ?>px); } 
	.fl-node-<?php echo $id; ?> .video-mixitup .grid-6,
	.fl-node-<?php echo $id; ?> .video-mixitup .grid-12 { width: calc(100% - <?php echo $settings->grid_spacing; ?>px); width: -webkit-calc(100% - <?php echo $settings->grid_spacing; ?>px); } 
}
@media only screen and ( max-width: 580px ) { 
	.fl-node-<?php echo $id; ?> .video-mixitup .grid-2,
	.fl-node-<?php echo $id; ?> .video-mixitup .grid-2-5,
	.fl-node-<?php echo $id; ?> .video-mixitup .grid-3,
	.fl-node-<?php echo $id; ?> .video-mixitup .grid-4 { width: calc(50% - <?php echo $settings->grid_spacing; ?>px); width: -webkit-calc(50% - <?php echo $settings->grid_spacing; ?>px); } 
	.fl-node-<?php echo $id; ?> .video-mixitup .grid-6,
	.fl-node-<?php echo $id; ?> .video-mixitup .grid-12 { width: calc(100% - <?php echo $settings->grid_spacing; ?>px); width: -webkit-calc(100% - <?php echo $settings->grid_spacing; ?>px); } 
}
@media only screen and ( max-width: 480px ) { 
	.fl-node-<?php echo $id; ?> .video-mixitup .grid-2,
	.fl-node-<?php echo $id; ?> .video-mixitup .grid-2-5,
	.fl-node-<?php echo $id; ?> .video-mixitup .grid-3,
	.fl-node-<?php echo $id; ?> .video-mixitup .grid-4,
	.fl-node-<?php echo $id; ?> .video-mixitup .grid-6,
	.fl-node-<?php echo $id; ?> .video-mixitup .grid-12 { width: calc(100% - <?php echo $settings->grid_spacing; ?>px); width: -webkit-calc(100% - <?php echo $settings->grid_spacing; ?>px); } 
}
<?php } ?>