<?php if ( !empty($settings->content_title_color) || !empty($settings->content_title_shadow) || !empty($settings->content_title_weight) || $settings->content_title_size <> '' || $settings->content_title_lineheight <> '' ||  $settings->content_title_margin_bottom <> '' ) { ?>
	.fl-node-<?php echo $id; ?> .cta .cta-title {
		<?php if (!empty( $settings->content_title_color) ) { ?>
			color: #<?php echo $settings->content_title_color; ?>;
		<?php } ?>
		<?php if (!empty($settings->content_title_shadow) ) { ?>
			<?php 
				$shadowV = $settings->content_title_shadow_v <> '' ? $settings->content_title_shadow_v : '3';
				$shadowH = $settings->content_title_shadow_h <> '' ? $settings->content_title_shadow_h : '3';
				$shadowS = $settings->content_title_shadow_s <> '' ? $settings->content_title_shadow_s : '3';
				$shadowO = $settings->content_title_shadow_opacity <> '' ? $settings->content_title_shadow_opacity/100 : '50';
			?>
			text-shadow: <?php echo $shadowV.'px '.$shadowH.'px '.$shadowS.'px rgba('.implode(',', FLBuilderColor::hex_to_rgb($settings->content_title_shadow)).', '.$shadowO ?>);
		<?php } ?>
		<?php if (!empty( $settings->content_title_weight) ) { ?>
			font-weight: <?php echo $settings->content_title_weight; ?>;
		<?php } ?>
		<?php if ($settings->content_title_size <> '' ) { ?>
			font-size: <?php echo $settings->content_title_size; ?>px;
		<?php } ?>
		<?php if ($settings->content_title_lineheight <> '' ) { ?>
			line-height: <?php echo $settings->content_title_lineheight; ?>em;
		<?php } ?>
		<?php if ($settings->content_title_margin_bottom <> '' ) { ?>
			margin-bottom: <?php echo $settings->content_title_margin_bottom; ?>px;
		<?php } ?>
	}
<?php } ?>
<?php if ( !empty($settings->content_desc_color) || $settings->content_desc_size <> '' ||  $settings->content_desc_margin_bottom <> '' ) { ?>
	.fl-node-<?php echo $id; ?> .cta .cta-desc {
		<?php if (!empty( $settings->content_desc_color) ) { ?>
			color: #<?php echo $settings->content_desc_color; ?>;
		<?php } ?>
		<?php if ($settings->content_desc_size <> '' ) { ?>
			font-size: <?php echo $settings->content_desc_size; ?>px;
		<?php } ?>
		<?php if ($settings->content_desc_margin_bottom <> '' ) { ?>
			margin-bottom: <?php echo $settings->content_desc_margin_bottom; ?>px;
		<?php } ?>
	}
<?php } ?>


<?php if ( $settings->buttons_padding_top <> '' ) : ?>
	.fl-node-<?php echo $id; ?> .cta .cta-buttons {
		padding-top: <?php echo $settings->buttons_padding_top; ?>px;
	}
<?php endif; ?>


<?php 
	// MEDIUM - GLOBAL SETTING
	$global_settings = FLBuilderModel::get_global_settings(); 
	if ( 
		$settings->content_title_size_medium <> '' 			||
		$settings->content_title_lineheight_medium <> ''	||
		$settings->content_title_margin_bottom_medium <> '' ||
		$settings->content_desc_size_medium <> '' 			||
		$settings->content_desc_margin_bottom_medium <> '' 
   ) { ?>
	@media only screen and ( max-width: <?php echo $global_settings->medium_breakpoint; ?>px ) {
		<?php if ( $settings->content_title_size_medium <> '' || $settings->content_lineheight_size_medium <> '' || $settings->content_title_margin_bottom_medium <> '' ) { ?>
			.fl-node-<?php echo $id; ?> .cta .cta-title {
				<?php if ( $settings->content_title_size_medium <> '' ) { ?>
					font-size: <?php echo $settings->content_title_size_medium; ?>px;
				<?php } ?>
				<?php if ( $settings->content_title_lineheight_medium <> '' ) { ?>
					line-height: <?php echo $settings->content_title_lineheight_medium; ?>em;
				<?php } ?>
				<?php if ( $settings->content_title_margin_bottom_medium <> '' ) { ?>
					margin-bottom: <?php echo $settings->content_title_margin_bottom_medium; ?>px;
				<?php } ?>
			}
		<?php } ?>
		<?php if ( $settings->content_desc_size_medium <> '' || $settings->content_desc_margin_bottom_medium <> '' ) { ?>
			.fl-node-<?php echo $id; ?> .cta .cta-desc {
				<?php if ( $settings->content_desc_size_medium <> '' ) { ?>
					font-size: <?php echo $settings->content_desc_size_medium; ?>px;
				<?php } ?>
				<?php if ( $settings->content_desc_margin_bottom_medium <> '' ) { ?>
					margin-bottom: <?php echo $settings->content_desc_margin_bottom_medium; ?>px;
				<?php } ?>
			}
		<?php } ?>
	}
<?php } ?>

<?php 
	// RESPONSIVE - GLOBAL SETTING
	if ( 
		$settings->content_title_size_responsive <> '' 			||
		$settings->content_title_lineheight_responsive <> '' 			||
		$settings->content_title_margin_bottom_responsive <> '' ||
		$settings->content_desc_size_responsive <> '' 			||
		$settings->content_desc_margin_bottom_responsive <> '' 
   ) { ?>
	@media only screen and ( max-width: <?php echo $global_settings->responsive_breakpoint; ?>px ) {
		<?php if ( $settings->content_title_size_responsive <> '' || $settings->content_title_lineheight_responsive <> '' || $settings->content_title_margin_bottom_responsive <> '' ) { ?>
			.fl-node-<?php echo $id; ?> .cta .cta-title {
				<?php if ( $settings->content_title_size_responsive <> '' ) { ?>
					font-size: <?php echo $settings->content_title_size_responsive; ?>px;
				<?php } ?>
				<?php if ( $settings->content_title_lineheight_responsive <> '' ) { ?>
					line-height: <?php echo $settings->content_title_lineheight_responsive; ?>em;
				<?php } ?>
				<?php if ( $settings->content_title_margin_bottom_responsive <> '' ) { ?>
					margin-bottom: <?php echo $settings->content_title_margin_bottom_responsive; ?>px;
				<?php } ?>
			}
		<?php } ?>
		<?php if ( $settings->content_desc_size_responsive <> '' || $settings->content_desc_margin_bottom_responsive <> '' ) { ?>
			.fl-node-<?php echo $id; ?> .cta .cta-desc {
				<?php if ( $settings->content_desc_size_responsive <> '' ) { ?>
					font-size: <?php echo $settings->content_desc_size_responsive; ?>px;
				<?php } ?>
				<?php if ( $settings->content_desc_margin_bottom_responsive <> '' ) { ?>
					margin-bottom: <?php echo $settings->content_desc_margin_bottom_responsive; ?>px;
				<?php } ?>
			}
		<?php } ?>
	}
<?php } ?>






<?php 
	if (
		$settings->btn_width == ' btn-custom' && 
		$settings->btn_custom_width <> '' || 
		$settings->btn_font_size <> '' ||  
		$settings->btn_font_weight <> '' || 
		$settings->btn_padding <> '' || 
		$settings->btn_padding_vertical <> '' 
	) { ?>
	.fl-node-<?php echo $id; ?> .cta .btn {
		<?php if ($settings->btn_width == ' btn-custom' && $settings->btn_custom_width <> '' ) { ?>
			min-width: <?php echo $settings->btn_custom_width; ?>px;
		<?php } ?>
		<?php if ( $settings->btn_font_size <> '' ) { ?>
			font-size: <?php echo $settings->btn_font_size; ?>px;
		<?php } ?>
		<?php if ( $settings->btn_letter_spacing <> '' ) { ?>
			letter-spacing: <?php echo $settings->btn_letter_spacing; ?>px;
		<?php } ?>
		<?php if ( $settings->btn_font_weight <> '' ) { ?>
			font-weight: <?php echo $settings->btn_font_weight; ?>;
		<?php } ?>
		<?php if ( $settings->btn_padding <> '' ) { ?>
			padding-left: <?php echo $settings->btn_padding; ?>px;
			padding-right: <?php echo $settings->btn_padding; ?>px;
		<?php } ?>
		<?php if ( $settings->btn_padding_vertical <> '' ) { ?>
			padding-top: <?php echo $settings->btn_padding_vertical; ?>px;
			padding-bottom: <?php echo $settings->btn_padding_vertical; ?>px;
		<?php } ?>
		<?php if ( $settings->btn_border_radius <> '' ) { ?>
			border-radius: <?php echo $settings->btn_border_radius; ?>px;
		<?php } ?>
	}
<?php } ?>

<?php if ( $settings->btn_custom_margin <> '' ) { ?>
	.fl-node-<?php echo $id; ?> .cta .btn { margin-bottom: <?php echo $settings->btn_custom_margin; ?>px; margin-right: <?php echo $settings->btn_custom_margin; ?>px; }
	.fl-node-<?php echo $id; ?> .cta .btn.btn-block + .btn.btn-block { margin-right: 0; margin-top: <?php echo $settings->btn_custom_margin; ?>px; }
<?php } ?>

<?php for($i = 0; $i < count($settings->items); $i++) : if(!is_object($settings->items[$i])) continue; ?>

	<?php if (!empty( $settings->items[$i]->btn_bg_color ) || !empty( $settings->items[$i]->btn_text_color ) || !empty( $settings->items[$i]->btn_border_color ) ) { ?>
		.fl-node-<?php echo $id; ?> .cta .btn-<?php echo $i; ?> {
			<?php if ( $settings->items[$i]->btn_style != ' btn-outline' ) { ?>
				<?php if (!empty( $settings->items[$i]->btn_bg_color ) ) { ?>
					background-color: #<?php echo $settings->items[$i]->btn_bg_color; ?>;
				<?php } ?>
			<?php } ?>
			<?php if ( $settings->items[$i]->btn_style != '' ) { ?>
				<?php if ( $settings->items[$i]->btn_style == ' btn-flat' ) { ?>
					border-color: #<?php echo $settings->items[$i]->btn_bg_color; ?>;
				<?php } else if (!empty( $settings->items[$i]->btn_border_color ) ) { ?>
					border-color: #<?php echo $settings->items[$i]->btn_border_color; ?>;
				<?php } ?>
			<?php } else { ?>
				border-color: #<?php echo $settings->items[$i]->btn_border_color; ?>;
			<?php } ?>
			<?php if ( $settings->items[$i]->btn_style == ' btn-gradient' ) { ?>
				<?php $gradient = $gradient_2 = $gradient_3 = ''; ?>
				<?php if ('vertical' == $settings->items[$i]->btn_bg_gradient_orientation ) {
					$gradient = 'top'; $gradient_2 = 'bottom'; $gradient_3 = '0';
				} else if ('horizontal' == $settings->items[$i]->btn_bg_gradient_orientation ) {
					$gradient = 'left'; $gradient_2 = 'right'; $gradient_3 = '1';
				} ?>
				background: #<?php echo $settings->items[$i]->btn_bg_color; ?>;
				background: -moz-linear-gradient(<?php echo $gradient; ?>,  #<?php echo $settings->items[$i]->btn_bg_color; ?> 0%, #<?php echo $settings->items[$i]->btn_bg_color_2; ?> 100%);
				background: -webkit-linear-gradient(<?php echo $gradient; ?>,  #<?php echo $settings->items[$i]->btn_bg_color; ?> 0%,#<?php echo $settings->items[$i]->btn_bg_color_2; ?> 100%);
				background: linear-gradient(to <?php echo $gradient_2; ?>,  #<?php echo $settings->items[$i]->btn_bg_color; ?> 0%,#<?php echo $settings->items[$i]->btn_bg_color_2; ?> 100%);
				filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#<?php echo $settings->items[$i]->btn_bg_color; ?>', endColorstr='#<?php echo $settings->items[$i]->btn_bg_color_2; ?>',GradientType=<?php echo $gradient_3; ?> );
			<?php } ?>
			<?php if (!empty( $settings->items[$i]->btn_text_color ) ) { ?>
				color: #<?php echo $settings->items[$i]->btn_text_color; ?>;
			<?php }  ?>
		}
	<?php  } ?>
	<?php if (!empty( $settings->items[$i]->btn_bg_color )) { ?>
		.fl-node-<?php echo $id; ?> .cta .btn-<?php echo $i; ?>::after {
			<?php if ( $settings->items[$i]->btn_style == ' btn-flat' ) { ?>
				border-color: #<?php echo $settings->items[$i]->btn_bg_hover_color <> '' ? $settings->items[$i]->btn_bg_hover_color : $settings->items[$i]->btn_bg_color; ?>;
			<?php } else if ( !empty( $settings->items[$i]->btn_bg_hover_color ) ) { ?>
				<?php $border_hover_alt = $settings->items[$i]->btn_border_color <> '' ? $settings->items[$i]->btn_border_color : $settings->items[$i]->btn_bg_color; ?>
				border-color: #<?php echo $settings->items[$i]->btn_bg_hover_color <> '' ? $settings->items[$i]->btn_bg_hover_color : $border_hover_alt; ?>;
			<?php } ?>
		}
	<?php } ?>



	<?php //HOVER
		if (!empty( $settings->items[$i]->btn_bg_hover_color ) || !empty( $settings->items[$i]->btn_text_hover_color ) || !empty( $settings->items[$i]->btn_border_hover_color ) ) { ?>
		.fl-node-<?php echo $id; ?> .cta .btn-<?php echo $i; ?>:hover {
			<?php if ( $settings->items[$i]->btn_style != ' btn-outline' ) { ?>
				<?php if (!empty( $settings->items[$i]->btn_bg_hover_color ) ) { ?>
					background-color: #<?php echo $settings->items[$i]->btn_bg_hover_color; ?>;
				<?php } ?>
			<?php } ?>
			<?php if ( $settings->items[$i]->btn_style != '' ) { ?>
				<?php if ( $settings->items[$i]->btn_style == ' btn-flat' ) { ?>
					border-color: #<?php echo $settings->items[$i]->btn_bg_hover_color; ?>;
				<?php } else if (!empty( $settings->items[$i]->btn_border_hover_color ) ) { ?>
					border-color: #<?php echo $settings->items[$i]->btn_border_hover_color; ?>;
				<?php } ?>
			<?php } else { ?>
				border-color: #<?php echo $settings->items[$i]->btn_border_hover_color; ?>;
			<?php } ?>
			<?php if (' btn-gradient' == $settings->items[$i]->btn_style ) { ?>
				<?php $gradient = $gradient_2 = $gradient_3 = ''; ?>
				<?php if ('vertical' == $settings->items[$i]->btn_bg_gradient_orientation ) {
					$gradient = 'top'; $gradient_2 = 'bottom'; $gradient_3 = '0';
				} else if ('horizontal' == $settings->items[$i]->btn_bg_gradient_orientation ) {
					$gradient = 'left'; $gradient_2 = 'right'; $gradient_3 = '1';
				} ?>
				background: #<?php echo $settings->items[$i]->btn_bg_hover_color; ?>;
				background: -moz-linear-gradient(<?php echo $gradient; ?>,  #<?php echo $settings->items[$i]->btn_bg_hover_color; ?> 0%, #<?php echo $settings->items[$i]->btn_bg_hover_color_2; ?> 100%);
				background: -webkit-linear-gradient(<?php echo $gradient; ?>,  #<?php echo $settings->items[$i]->btn_bg_hover_color; ?> 0%,#<?php echo $settings->items[$i]->btn_bg_hover_color_2; ?> 100%);
				background: linear-gradient(to <?php echo $gradient_2; ?>,  #<?php echo $settings->items[$i]->btn_bg_hover_color; ?> 0%,#<?php echo $settings->items[$i]->btn_bg_hover_color_2; ?> 100%);
				filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#<?php echo $settings->items[$i]->btn_bg_hover_color; ?>', endColorstr='#<?php echo $settings->items[$i]->btn_bg_hover_color_2; ?>',GradientType=<?php echo $gradient_3; ?> );
			<?php } ?>
			<?php if (!empty( $settings->items[$i]->btn_text_hover_color ) ) { ?>
				color: #<?php echo $settings->items[$i]->btn_text_hover_color; ?>;
			<?php } ?>
		}
	<?php } ?>

<?php endfor; ?>


	<?php //RESPONSIVE CSS
	// MEDIUM - GLOBAL SETTING
	$global_settings = FLBuilderModel::get_global_settings(); 
	if ( 
		$settings->btn_font_size_medium <> '' 			||
		$settings->btn_letter_spacing_medium <> '' 		||
		$settings->btn_padding_medium <> '' 			||
		$settings->btn_padding_vertical_medium <> '' 	||
		$settings->btn_border_radius_medium <> '' 		||
		$settings->btn_custom_margin_medium <> ''
	   ) { ?>
		@media only screen and ( max-width: <?php echo $global_settings->medium_breakpoint; ?>px ) {
			<?php if ( $settings->btn_font_size_medium <> '' || $settings->btn_letter_spacing_medium <> '' || $settings->btn_padding_medium <> '' || $settings->btn_padding_vertical_medium <> '' || $settings->btn_border_radius_medium <> '' || $settings->btn_custom_margin_medium <> '' ) {?>
				.fl-node-<?php echo $id; ?> .cta .btn {
					<?php if ( $settings->btn_font_size_medium <> '' ) { ?> font-size: <?php echo $settings->btn_font_size_medium; ?>px;<?php } ?>
					<?php if ( $settings->btn_letter_spacing_medium <> '' ) { ?> letter-spacing: <?php echo $settings->btn_letter_spacing_medium; ?>px;<?php } ?>
					<?php if ( $settings->btn_padding_medium <> '' ) { ?> 
						padding-left: <?php echo $settings->btn_padding_medium; ?>px;
						padding-right: <?php echo $settings->btn_padding_medium; ?>px;
					<?php } ?>
					<?php if ( $settings->btn_padding_vertical_medium <> '' ) { ?> 
						padding-top: <?php echo $settings->btn_padding_vertical_medium; ?>px;
						padding-bottom: <?php echo $settings->btn_padding_vertical_medium; ?>px;
					<?php } ?>
					<?php if ( $settings->btn_border_radius_medium <> '' ) { ?> border-radius: <?php echo $settings->btn_border_radius_medium; ?>px;<?php } ?>
					<?php if ( $settings->btn_custom_margin_medium <> '' ) { ?>
						margin-bottom: <?php echo $settings->btn_custom_margin_medium; ?>px; 
						margin-right: <?php echo $settings->btn_custom_margin_medium; ?>px;
					<?php } ?>
				}
			<?php } ?>
			<?php if ( $settings->btn_custom_margin_medium <> '' ) {?>
				.fl-node-<?php echo $id; ?> .cta .btn.btn-block + .btn.btn-block { 
					margin-right: 0; 
					margin-top: <?php echo $settings->btn_custom_margin_medium; ?>px; 
				}
			<?php } ?>
		}
	<?php } ?>
	<?php //RESPONSIVE CSS
	// MEDIUM - GLOBAL SETTING
	if ( 
		$settings->btn_font_size_responsive <> '' 			||
		$settings->btn_letter_spacing_responsive <> '' 		||
		$settings->btn_padding_responsive <> '' 			||
		$settings->btn_padding_vertical_responsive <> '' 	||
		$settings->btn_border_radius_responsive <> '' 		||
		$settings->btn_custom_margin_responsive <> ''
	   ) { ?>
		@media only screen and ( max-width: <?php echo $global_settings->responsive_breakpoint; ?>px ) {
			<?php if ( $settings->btn_font_size_responsive <> '' || $settings->btn_letter_spacing_responsive <> '' || $settings->btn_padding_responsive <> '' || $settings->btn_padding_vertical_responsive <> '' || $settings->btn_border_radius_responsive <> '' || $settings->btn_custom_margin_responsive <> '' ) {?>
				.fl-node-<?php echo $id; ?> .cta .btn {
					<?php if ( $settings->btn_font_size_responsive <> '' ) { ?> font-size: <?php echo $settings->btn_font_size_responsive; ?>px;<?php } ?>
					<?php if ( $settings->btn_letter_spacing_responsive <> '' ) { ?> letter-spacing: <?php echo $settings->btn_letter_spacing_responsive; ?>px;<?php } ?>
					<?php if ( $settings->btn_padding_responsive <> '' ) { ?> 
						padding-left: <?php echo $settings->btn_padding_responsive; ?>px;
						padding-right: <?php echo $settings->btn_padding_responsive; ?>px;
					<?php } ?>
					<?php if ( $settings->btn_padding_vertical_responsive <> '' ) { ?> 
						padding-top: <?php echo $settings->btn_padding_vertical_responsive; ?>px;
						padding-bottom: <?php echo $settings->btn_padding_vertical_responsive; ?>px;
					<?php } ?>
					<?php if ( $settings->btn_border_radius_responsive <> '' ) { ?> border-radius: <?php echo $settings->btn_border_radius_responsive; ?>px;<?php } ?>
					<?php if ( $settings->btn_custom_margin_responsive <> '' ) { ?>
						margin-bottom: <?php echo $settings->btn_custom_margin_responsive; ?>px; 
						margin-right: <?php echo $settings->btn_custom_margin_responsive; ?>px;
					<?php } ?>
				}
			<?php } ?>
			<?php if ( $settings->btn_custom_margin_responsive <> '' ) {?>
				.fl-node-<?php echo $id; ?> .cta .btn.btn-block + .btn.btn-block { 
					margin-right: 0; 
					margin-top: <?php echo $settings->btn_custom_margin_responsive; ?>px; 
				}
			<?php } ?>
		}
	<?php } ?>