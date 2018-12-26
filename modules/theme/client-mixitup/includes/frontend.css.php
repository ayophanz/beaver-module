<?php if ( $settings->categories_nav != 'hide' ) { ?>
	<?php if ( $settings->buttons_spacing <> '' ) { ?>
	.fl-node-<?php echo $id; ?> .client-filter {
		<?php if ( $settings->buttons_spacing <> '' ) { ?>
			margin-bottom: <?php echo $settings->buttons_spacing; ?>px;
		<?php } ?>
	}
	<?php } ?>
	<?php if ( $settings->button_font_weight != '400' || $settings->button_text_transform <> '' || $settings->button_radius <> '' || $settings->button_padding_top <> '' || $settings->button_padding_bottom <> '' || $settings->button_padding_left <> '' || $settings->button_padding_right <> '' || $settings->buttons_margin <> '' ) { ?>
	.fl-node-<?php echo $id; ?> .client-filter .client-button {
		<?php if ( $settings->button_font_weight <> '' ) { ?>
			font-weight: <?php echo $settings->button_font_weight; ?>;
		<?php } ?>
		<?php if ( $settings->button_text_size <> '' ) { ?>
			font-size: <?php echo $settings->button_text_size; ?>px;
		<?php } ?>
		<?php if ( $settings->button_text_transform <> '' ) { ?>
			text-transform: <?php echo $settings->button_text_transform; ?>;
		<?php } ?>
		<?php if ( $settings->button_radius <> '' ) { ?>
			border-radius: <?php echo $settings->button_radius; ?>px;
			-webkit-border-radius: <?php echo $settings->button_radius; ?>px;
		<?php } ?>
		<?php if ( $settings->button_padding_top <> '' ) { ?>
			padding-top: <?php echo $settings->button_padding_top; ?>px;
		<?php } ?>
		<?php if ( $settings->button_padding_bottom <> '' ) { ?>
			padding-bottom: <?php echo $settings->button_padding_bottom; ?>px;
		<?php } ?>
		<?php if ( $settings->button_padding_left <> '' ) { ?>
			padding-left: <?php echo $settings->button_padding_left; ?>px;
		<?php } ?>
		<?php if ( $settings->button_padding_right <> '' ) { ?>
			padding-right: <?php echo $settings->button_padding_right; ?>px;
		<?php } ?>
		<?php if ( $settings->buttons_margin <> '' ) { ?>
			margin: <?php echo $settings->buttons_margin; ?>px;
		<?php } ?>
	}
	<?php } ?>
	<?php if ( !empty($settings->button_bg_color) || !empty($settings->button_text_color) ) { ?>
	.fl-node-<?php echo $id; ?> .client-filter .client-button:not(.active) {
		<?php if ( !empty($settings->button_bg_color) ) { ?>
			background-color: #<?php echo $settings->button_bg_color; ?>;
		<?php } ?>
		<?php if ( !empty($settings->button_text_color) ) { ?>
			color: #<?php echo $settings->button_text_color; ?>;
		<?php } ?>
	}
	<?php } ?>
	<?php if ( !empty($settings->button_bg_color_active) || !empty($settings->button_text_color_active) ) { ?>
	.fl-node-<?php echo $id; ?> .client-filter .client-button.active,
	.fl-node-<?php echo $id; ?> .client-filter .client-button:hover {
		<?php if ( !empty($settings->button_bg_color_active) ) { ?>
			background-color: #<?php echo $settings->button_bg_color_active; ?>;
		<?php } ?>
		<?php if ( !empty($settings->button_text_color_active) ) { ?>
			color: #<?php echo $settings->button_text_color_active; ?>;
		<?php } ?>
	}
	<?php } ?>

	<?php if ( empty($settings->button_bg_color) && $settings->button_padding_left <> '' && $settings->categories_nav_aligment === 'left' ) { ?>
	.fl-node-<?php echo $id; ?> .client-filter.left {
		<?php if ( $settings->button_padding_left <> '' ) { ?>
			margin-left: -<?php echo $settings->button_padding_left+10; ?>px;
		<?php } ?>
	}
	<?php } ?>

	<?php if ( empty($settings->button_bg_color) && $settings->button_padding_right <> '' && $settings->categories_nav_aligment === 'right' ) { ?>
	.fl-node-<?php echo $id; ?> .client-filter.right {
		<?php if ( $settings->button_padding_right <> '' ) { ?>
			margin-right: -<?php echo $settings->button_padding_right+10; ?>px;
		<?php } ?>
	}
	<?php } ?>

<?php } ?>





<?php if ( $settings->grid_style != ' none') { ?>
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
		.fl-node-<?php echo $id; ?> .grids .client-title {
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
	<?php if ( !empty($settings->grid_desc_color) || $settings->grid_desc_size || $settings->grid_desc_minheight <> '' || $settings->grid_desc_weight <> '' || $settings->grid_desc_transform <> '' || $settings->grid_desc_spacing <> '' ) { ?>
		.fl-node-<?php echo $id; ?> .grids .client-desc {
			<?php if ( !empty($settings->grid_desc_color) ) { ?>
				color: #<?php echo $settings->grid_desc_color; ?>;
			<?php } ?>
			<?php if ( $settings->grid_desc_size <> '' ) { ?>
				font-size: <?php echo $settings->grid_desc_size; ?>px;
			<?php } ?>
			<?php if ( $settings->grid_desc_weight <> '' ) { ?>
				font-weight: <?php echo $settings->grid_desc_weight; ?>;
			<?php } ?>
			<?php if ( $settings->grid_desc_transform <> '' ) { ?>
				text-transform: <?php echo $settings->grid_desc_transform; ?>;
			<?php } ?>
			<?php if ( $settings->grid_desc_spacing <> '' ) { ?>
				margin-bottom: <?php echo $settings->grid_desc_spacing; ?>px;
			<?php } ?>
			<?php if ( $settings->grid_desc_minheight <> '' ) { ?>
				min-height: <?php echo $settings->grid_desc_minheight; ?>px;
			<?php } ?>
		}
	<?php } ?>
	<?php if ( $settings->grid_button_text <> '' ) { ?>
		<?php if ( $settings->grid_button_font_weight <> '' || $settings->grid_button_size <> '' || $settings->grid_button_border_size <> '' || $settings->grid_button_text_transform <> '' || $settings->grid_button_radius <> '' || $settings->grid_button_padding_top <> '' || $settings->grid_button_padding_bottom <> '' || $settings->grid_button_padding_left <> '' || $settings->grid_button_padding_right <> '' || $settings->grid_buttons_margin <> '' ) { ?>
		.fl-node-<?php echo $id; ?> .grids .client-button {
			<?php if ( $settings->grid_button_font_weight <> '' ) { ?>
				font-weight: <?php echo $settings->grid_button_font_weight; ?>;
			<?php } ?>
			<?php if ( $settings->grid_button_size <> '' ) { ?>
				font-size: <?php echo $settings->grid_button_size; ?>px;
			<?php } ?>
			<?php if ( $settings->grid_button_border_size <> '' ) { ?>
				border-width: <?php echo $settings->grid_button_border_size; ?>px;
			<?php } ?>
			<?php if ( $settings->grid_button_border_radius <> '' ) { ?>
				border-radius: <?php echo $settings->grid_button_border_radius; ?>px;
			<?php } ?>
			<?php if ( $settings->grid_button_text_transform <> '' ) { ?>
				text-transform: <?php echo $settings->grid_button_text_transform; ?>;
			<?php } ?>
			<?php if ( $settings->grid_button_radius <> '' ) { ?>
				border-radius: <?php echo $settings->grid_button_radius; ?>px;
				-webkit-border-radius: <?php echo $settings->grid_button_radius; ?>px;
			<?php } ?>
			<?php if ( $settings->grid_button_padding_top <> '' ) { ?>
				padding-top: <?php echo $settings->grid_button_padding_top; ?>px;
			<?php } ?>
			<?php if ( $settings->grid_button_padding_bottom <> '' ) { ?>
				padding-bottom: <?php echo $settings->grid_button_padding_bottom; ?>px;
			<?php } ?>
			<?php if ( $settings->grid_button_padding_left <> '' ) { ?>
				padding-left: <?php echo $settings->grid_button_padding_left; ?>px;
			<?php } ?>
			<?php if ( $settings->grid_button_padding_right <> '' ) { ?>
				padding-right: <?php echo $settings->grid_button_padding_right; ?>px;
			<?php } ?>
			<?php if ( $settings->grid_buttons_margin <> '' ) { ?>
				margin: <?php echo $settings->grid_buttons_margin; ?>px;
			<?php } ?>
		}
		<?php } ?>
		<?php if ( !empty($settings->grid_button_bg_color) || !empty($settings->grid_button_border_color) || !empty($settings->grid_button_text_color) ) { ?>
		.fl-node-<?php echo $id; ?> .grids .client-button:not(.active) {
			<?php if ( !empty($settings->grid_button_bg_color) ) { ?>
				background-color: #<?php echo $settings->grid_button_bg_color; ?>;
			<?php } ?>
			<?php if ( !empty($settings->grid_button_border_color) ) { ?>
				border-color: #<?php echo $settings->grid_button_border_color; ?>;
			<?php } ?>
			<?php if ( !empty($settings->grid_button_text_color) ) { ?>
				color: #<?php echo $settings->grid_button_text_color; ?>;
			<?php } ?>
		}
		<?php } ?>
		<?php if ( !empty($settings->grid_button_bg_color_active) || !empty($settings->grid_button_border_color_active) || !empty($settings->grid_button_text_color_active) ) { ?>
		.fl-node-<?php echo $id; ?> .grids .client-button.active,
		.fl-node-<?php echo $id; ?> .grids .client-button:hover {
			<?php if ( !empty($settings->grid_button_bg_color_active) ) { ?>
				background-color: #<?php echo $settings->grid_button_bg_color_active; ?>;
			<?php } ?>
			<?php if ( !empty($settings->grid_button_border_color_active) ) { ?>
				border-color: #<?php echo $settings->grid_button_border_color_active; ?>;
			<?php } ?>
			<?php if ( !empty($settings->grid_button_text_color_active) ) { ?>
				color: #<?php echo $settings->grid_button_text_color_active; ?>;
			<?php } ?>
		}
		<?php } ?>
	<?php } ?>


	<?php if ( $settings->grid_category == 'enable' ) { ?>
		<?php if ( $settings->grid_category_size <> '' || $settings->grid_category_transform <> '' ) { ?>
			.fl-node-<?php echo $id; ?> .grids .in-category {
				<?php if ( $settings->grid_category_size <> '' ) { ?>
					font-size: <?php echo $settings->grid_category_size; ?>px;
				<?php } ?>
				<?php if ( $settings->grid_category_transform <> '' ) { ?>
					text-transform: <?php echo $settings->grid_category_transform; ?>;
				<?php } ?>
			}
		<?php } ?>
		<?php if ( !empty($settings->grid_category_color) || !empty($settings->grid_category_color_hover) || $settings->grid_category_size || $settings->grid_category_weight <> '' ) { ?>
			.fl-node-<?php echo $id; ?> .grids .in-category a {
				<?php if ( !empty($settings->grid_category_color) ) { ?>
					color: #<?php echo $settings->grid_category_color; ?>;
				<?php } ?>
				<?php if ( $settings->grid_category_weight <> '' ) { ?>
					font-weight: <?php echo $settings->grid_category_weight; ?>;
				<?php } ?>
			}
		<?php } ?>
		<?php if ( !empty($settings->grid_category_color_hover) ) { ?>
			.fl-node-<?php echo $id; ?> .grids .in-category a:hover {
				<?php if ( !empty($settings->grid_category_color) ) { ?>
					color: #<?php echo $settings->grid_category_color; ?>;
				<?php } ?>
			}
		<?php } ?>
	<?php } ?>
<?php } ?>


<?php if ( $settings->grid_spacing <> '' ) { ?>
.fl-node-<?php echo $id; ?> .client-mixitup .grids { padding-right: <?php echo $settings->grid_spacing; ?>px; margin-left: -<?php echo $settings->grid_spacing; ?>px; width: calc(100% + <?php echo $settings->grid_spacing; ?>px + <?php echo $settings->grid_spacing; ?>px); width: -webkit-calc(100% + <?php echo $settings->grid_spacing; ?>px + <?php echo $settings->grid_spacing; ?>px); }
.fl-node-<?php echo $id; ?> .client-mixitup .grids [class*="grid-"] { margin: 0 0 <?php echo $settings->grid_spacing; ?>px <?php echo $settings->grid_spacing; ?>px; }

.client-item-info {
	position: absolute; 
	bottom: 0; 
	background-color: white; 
	min-height: 240px;
    padding: 20px;

}

.client-item-info h1 {
	font-size: 18px;
	font-family: Roboto;
	color: #151515;
}

.client-item-info p {
	font-size: 14px;
	font-family: Roboto;
	color: #596d82;
}

.client-item-info a {
	font-size: 16px;
	font-family: Roboto;
	color: #151515;
	font-weight: 200;
	text-decoration: none !important;
}

.client-item-info a .fa-angle-double-right {
	color: #ff5c04;
}

.client-item-info a:hover {
	opacity: 0.6 !important;
}  

.client-item-holder {
	    box-shadow: 0px 0px 8px 2px #2196f33b;
}

.client-mixitup .grids {
    margin: 0 0 0 -15px !important;
    width: calc(100% + 15px + 15px) !important;
    width: -webkit-calc(100% + 15px + 15px) !important;
}

@media only screen and ( min-width: 981px ) { 
	.fl-node-<?php echo $id; ?> .client-mixitup .grid-2 { width: calc(16% - <?php echo $settings->grid_spacing; ?>px); width: -webkit-calc(16% - <?php echo $settings->grid_spacing; ?>px); } 
	.fl-node-<?php echo $id; ?> .client-mixitup .grid-2-5 {  width: calc(20% - <?php echo $settings->grid_spacing; ?>px); width: -webkit-calc(20% - <?php echo $settings->grid_spacing; ?>px); } 
	.fl-node-<?php echo $id; ?> .client-mixitup .grid-3 { width: calc(25% - <?php echo $settings->grid_spacing; ?>px); width: -webkit-calc(25% - <?php echo $settings->grid_spacing; ?>px); }
	.fl-node-<?php echo $id; ?> .client-mixitup .grid-4 { width: calc(33.33% - <?php echo $settings->grid_spacing; ?>px); width: -webkit-calc(33.33% - <?php echo $settings->grid_spacing; ?>px); } 
	.fl-node-<?php echo $id; ?> .client-mixitup .grid-6 { width: calc(50% - <?php echo $settings->grid_spacing; ?>px); width: -webkit-calc(50% - <?php echo $settings->grid_spacing; ?>px); } 
	.fl-node-<?php echo $id; ?> .client-mixitup .grid-12 { width: calc(100% - <?php echo $settings->grid_spacing; ?>px); width: -webkit-calc(100% - <?php echo $settings->grid_spacing; ?>px); } 
}
@media only screen and ( max-width: 980px ) {
	.fl-node-<?php echo $id; ?> .client-mixitup .grid-2,
	.fl-node-<?php echo $id; ?> .client-mixitup .grid-2-5 { width: calc(25% - <?php echo $settings->grid_spacing; ?>px); width: -webkit-calc(25% - <?php echo $settings->grid_spacing; ?>px); } 
	.fl-node-<?php echo $id; ?> .client-mixitup .grid-3,
	.fl-node-<?php echo $id; ?> .client-mixitup .grid-4 { width: calc(50% - <?php echo $settings->grid_spacing; ?>px); width: -webkit-calc(50% - <?php echo $settings->grid_spacing; ?>px); } 
	.fl-node-<?php echo $id; ?> .client-mixitup .grid-6,
	.fl-node-<?php echo $id; ?> .client-mixitup .grid-12 { width: calc(100% - <?php echo $settings->grid_spacing; ?>px); width: -webkit-calc(100% - <?php echo $settings->grid_spacing; ?>px); } 
}
@media only screen and ( max-width: 767px ) { 
	.fl-node-<?php echo $id; ?> .client-mixitup .grid-2,
	.fl-node-<?php echo $id; ?> .client-mixitup .grid-2-5 { width: calc(33.33% - <?php echo $settings->grid_spacing; ?>px); width: -webkit-calc(33.33% - <?php echo $settings->grid_spacing; ?>px); } 
	.fl-node-<?php echo $id; ?> .client-mixitup .grid-3,
	.fl-node-<?php echo $id; ?> .client-mixitup .grid-4 { width: calc(50% - <?php echo $settings->grid_spacing; ?>px); width: -webkit-calc(50% - <?php echo $settings->grid_spacing; ?>px); } 
	.fl-node-<?php echo $id; ?> .client-mixitup .grid-6,
	.fl-node-<?php echo $id; ?> .client-mixitup .grid-12 { width: calc(100% - <?php echo $settings->grid_spacing; ?>px); width: -webkit-calc(100% - <?php echo $settings->grid_spacing; ?>px); } 
}
@media only screen and ( max-width: 580px ) { 
	.fl-node-<?php echo $id; ?> .client-mixitup .grid-2,
	.fl-node-<?php echo $id; ?> .client-mixitup .grid-2-5,
	.fl-node-<?php echo $id; ?> .client-mixitup .grid-3,
	.fl-node-<?php echo $id; ?> .client-mixitup .grid-4 { width: calc(50% - <?php echo $settings->grid_spacing; ?>px); width: -webkit-calc(50% - <?php echo $settings->grid_spacing; ?>px); } 
	.fl-node-<?php echo $id; ?> .client-mixitup .grid-6,
	.fl-node-<?php echo $id; ?> .client-mixitup .grid-12 { width: calc(100% - <?php echo $settings->grid_spacing; ?>px); width: -webkit-calc(100% - <?php echo $settings->grid_spacing; ?>px); } 
}
@media only screen and ( max-width: 480px ) { 
	.fl-node-<?php echo $id; ?> .client-mixitup .grid-2,
	.fl-node-<?php echo $id; ?> .client-mixitup .grid-2-5,
	.fl-node-<?php echo $id; ?> .client-mixitup .grid-3,
	.fl-node-<?php echo $id; ?> .client-mixitup .grid-4,
	.fl-node-<?php echo $id; ?> .client-mixitup .grid-6,
	.fl-node-<?php echo $id; ?> .client-mixitup .grid-12 { width: calc(100% - <?php echo $settings->grid_spacing; ?>px); width: -webkit-calc(100% - <?php echo $settings->grid_spacing; ?>px); } 
}
<?php } ?>