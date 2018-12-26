<?php if( !empty($settings->active_color) ) { ?>
.fl-node-<?php echo $id; ?> .tabs-icon-nav li.active .tab-icon-nav-button {
	border-color: #<?php echo $settings->active_color; ?>;
}
<?php } ?>

<?php if( $settings->tab_nav_spacing <> '' ) { ?>
.fl-node-<?php echo $id; ?> .tabs-icon-nav {
	margin-bottom: <?php echo $settings->tab_icon_size; ?>px;
}
<?php } ?>
<?php if( $settings->tab_icon_size <> '' ) { ?>
.fl-node-<?php echo $id; ?> .tabs-icon-nav li.tab-icon-item .tab-icon-nav-icon-wrapper,
.fl-node-<?php echo $id; ?> .tabs-icon-nav li.tab-icon-item .tab-icon-nav-icon {
	max-width: <?php echo $settings->tab_icon_size; ?>px;
	font-size: <?php echo $settings->tab_icon_size; ?>px;
	line-height: <?php echo $settings->tab_icon_size; ?>px;
}
<?php } ?>

<?php for($i = 0; $i < count($settings->items); $i++) : if(!is_object($settings->items[$i])) continue; ?>

	<?php if( !empty($settings->items[$i]->tab_icon_color) ) { ?>
	.fl-node-<?php echo $id; ?> .tabs-icon-nav li.tab-icon-item-<?php echo ($i+1); ?> .tab-icon-nav-icon {
		color: #<?php echo $settings->items[$i]->tab_icon_color; ?>;
	}
	<?php } ?>

<?php endfor; ?>



<?php 
	if (
		$settings->btn_width == ' btn-custom' && 
		$settings->btn_custom_width <> '' || 
		$settings->btn_font_size <> '' ||  
		$settings->btn_font_weight <> '' || 
		$settings->btn_padding <> '' || 
		$settings->btn_padding_vertical <> '' 
	) { ?>
	.fl-node-<?php echo $id; ?> .btn {
		<?php if ($settings->btn_width == ' btn-custom' && $settings->btn_custom_width <> '' ) { ?>
			min-width: <?php echo $settings->btn_custom_width; ?>px;
		<?php } ?>
		<?php if ( $settings->btn_font_size <> '' ) { ?>
			font-size: <?php echo $settings->btn_font_size; ?>px;
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
	}
<?php } ?>

<?php if ( $settings->btn_custom_margin <> '' ) { ?>
	.fl-node-<?php echo $id; ?> .btn { margin-bottom: <?php echo $settings->btn_custom_margin; ?>px; margin-right: <?php echo $settings->btn_custom_margin; ?>px; }
	.fl-node-<?php echo $id; ?> .btn:only-child { margin-right: 0; }
	.fl-node-<?php echo $id; ?> .btn.btn-block + .btn.btn-block { margin-right: 0; margin-top: <?php echo $settings->btn_custom_margin; ?>px; }
<?php } ?>

<?php for($i = 0; $i < count($settings->items); $i++) : if(!is_object($settings->items[$i])) continue; ?>

	<?php if (!empty( $settings->items[$i]->btn_bg_color ) || !empty( $settings->items[$i]->btn_text_color ) || !empty( $settings->items[$i]->btn_border_color ) ) { ?>
		.fl-node-<?php echo $id; ?> .btn-<?php echo $i; ?> {
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
		.fl-node-<?php echo $id; ?> .btn-<?php echo $i; ?>::after {
			<?php if ( $settings->items[$i]->btn_style == ' btn-flat' ) { ?>
				border-color: #<?php echo $settings->items[$i]->btn_bg_hover_color <> '' ? $settings->items[$i]->btn_bg_hover_color : $settings->items[$i]->btn_bg_color; ?>;
			<?php } else if ( !empty( $settings->items[$i]->btn_border_color ) ) { ?>
				border-color: #<?php echo $settings->items[$i]->btn_border_color <> '' ? $settings->items[$i]->btn_border_color : $settings->items[$i]->btn_bg_color; ?>;
			<?php } ?>
		}
	<?php } ?>



	<?php //HOVER
		if (!empty( $settings->items[$i]->btn_bg_hover_color ) || !empty( $settings->items[$i]->btn_text_hover_color ) || !empty( $settings->items[$i]->btn_border_hover_color ) ) { ?>
		.fl-node-<?php echo $id; ?> .btn-<?php echo $i; ?>:hover {
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