<?php if ( !empty($settings->font_family) && $settings->font_family['family'] != "Default" || $settings->font_size <> '' || $settings->font_lineheight <> '' || !empty($settings->color) || $settings->font_weight <> '' ) { ?>
	.fl-node-<?php echo $id; ?> .rich-text-advanced *:not(i):not(h1):not(h2):not(h3):not(h4):not(h5):not(h6):not(a){ 
		<?php if ( !empty($settings->font_family) && $settings->font_family['family'] != "Default" ) { ?>
			<?php FLBuilderFonts::font_css( $settings->font_family ); ?>
		<?php } ?>
		<?php if ($settings->font_size <> '') { ?>
			font-size: <?php echo $settings->font_size; ?>px;
		<?php } ?>
		<?php if ($settings->font_lineheight <> '') { ?>
			line-height: <?php echo $settings->font_lineheight; ?>em;
		<?php } ?>
		<?php if ($settings->letter_spacing <> '') { ?>
			letter-spacing: <?php echo $settings->letter_spacing; ?>px;
		<?php } ?>
		<?php if ($settings->font_weight <> '') { ?>
			font-weight: <?php echo $settings->font_weight; ?>;
		<?php } ?>
		<?php if ( !empty($settings->color) ) { ?>
			color: #<?php echo $settings->color; ?>;
		<?php } ?>
	}
<?php } ?>

<?php if ( !empty($settings->link_color) ) { ?>
	.fl-node-<?php echo $id; ?> .rich-text-advanced *:not(i):not(h1):not(h2):not(h3):not(h4):not(h5):not(h6) a{ 
		<?php if ( !empty($settings->link_color) ) { ?>
			color: #<?php echo $settings->link_color; ?>;
		<?php } ?>
	}
<?php } ?>

<?php if ( !empty($settings->link_hover_color) ) { ?>
	.fl-node-<?php echo $id; ?> .rich-text-advanced *:not(i):not(h1):not(h2):not(h3):not(h4):not(h5):not(h6) a:hover{ 
		<?php if ( !empty($settings->link_hover_color) ) { ?>
			color: #<?php echo $settings->link_hover_color; ?>;
		<?php } ?>
	}
<?php } ?>

<?php if ( !empty($settings->heading_font_family) && $settings->heading_font_family['family'] != "Default" || $settings->font_size <> '' || !empty($settings->heading_color) ) { ?>
	.fl-node-<?php echo $id; ?> .rich-text-advanced h1, .rich-text-advanced h2, .rich-text-advanced h3, .rich-text-advanced h4, .rich-text-advanced h5, .rich-text-advanced h6{ 
		<?php if ( !empty($settings->heading_font_family) && $settings->heading_font_family['family'] != "Default" ) { ?>
			<?php FLBuilderFonts::font_css( $settings->heading_font_family ); ?>
		<?php } ?>
		<?php if ($settings->font_size <> '') { ?>
			font-size: <?php echo $settings->font_size; ?>px;
		<?php } ?>
		<?php if ( !empty($settings->heading_color) ) { ?>
			color: #<?php echo $settings->heading_color; ?>;
		<?php } ?>
	}
<?php } ?>

<?php if ( !empty($settings->heading_link_color) ) { ?>
	.fl-node-<?php echo $id; ?> .rich-text-advanced h1 a, .rich-text-advanced h2 a, .rich-text-advanced h3 a, .rich-text-advanced h4 a, .rich-text-advanced h5 a, .rich-text-advanced h6 a{ 
		<?php if ( !empty($settings->heading_link_color) ) { ?>
			color: #<?php echo $settings->heading_link_color; ?>;
		<?php } ?>
	}
<?php } ?>

<?php if ( !empty($settings->heading_link_hover_color) ) { ?>
	.fl-node-<?php echo $id; ?> .rich-text-advanced h1 a:hover, .rich-text-advanced h2 a:hover, .rich-text-advanced h3 a:hover, .rich-text-advanced h4 a:hover, .rich-text-advanced h5 a:hover, .rich-text-advanced h6 a:hover{ 
		<?php if ( !empty($settings->heading_link_hover_color) ) { ?>
			color: #<?php echo $settings->heading_link_hover_color; ?>;
		<?php } ?>
	}
<?php } ?>



<?php if ( !empty($settings->font_family_h1) && $settings->font_family_h1['family'] != "Default" || $settings->font_weight_h1 <> '' || $settings->font_size_h1 <> '' || $settings->font_lineheight_h1 <> '' || $settings->font_color_h1 <> '' ) { ?>
	.fl-node-<?php echo $id; ?> .rich-text-advanced h1{ 
	<?php if ( !empty($settings->font_family_h1) && $settings->font_family_h1['family'] != "Default" ) { ?>
		<?php FLBuilderFonts::font_css( $settings->font_family_h1 ); ?>
	<?php } ?>
	<?php if ( $settings->font_weight_h1 <> '' ) { ?>
		font-weight: <?php echo $settings->font_weight_h1; ?>;
	<?php } ?>
	<?php if ( $settings->font_size_h1 <> '' ) { ?>
		font-size: <?php echo $settings->font_size_h1; ?>px;
	<?php } ?>
	<?php if ( $settings->font_lineheight_h1 <> '' ) { ?>
		line-height: <?php echo $settings->font_lineheight_h1; ?>em;
	<?php } ?>
	<?php if ($settings->letter_spacing_h1 <> '') { ?>
			letter-spacing: <?php echo $settings->letter_spacing_h1; ?>px;
	<?php } ?>
	<?php if ( $settings->font_color_h1 <> '' ) { ?>
		color: #<?php echo $settings->font_color_h1; ?>;
	<?php } ?>
	}
<?php } ?>

<?php if ( !empty($settings->font_family_h2) && $settings->font_family_h2['family'] != "Default" || $settings->font_weight_h2 <> '' || $settings->font_size_h2 <> '' || $settings->font_lineheight_h2 <> '' || $settings->font_color_h2 <> '' ) { ?>
	.fl-node-<?php echo $id; ?> .rich-text-advanced h2{ 
	<?php if ( !empty($settings->font_family_h2) && $settings->font_family_h2['family'] != "Default" ) { ?>
		<?php FLBuilderFonts::font_css( $settings->font_family_h2 ); ?>
	<?php } ?>
	<?php if ( $settings->font_weight_h2 <> '' ) { ?>
		font-weight: <?php echo $settings->font_weight_h2; ?>;
	<?php } ?>
	<?php if ( $settings->font_size_h2 <> '' ) { ?>
		font-size: <?php echo $settings->font_size_h2; ?>px;
	<?php } ?>
	<?php if ( $settings->font_lineheight_h2 <> '' ) { ?>
		line-height: <?php echo $settings->font_lineheight_h2; ?>em;
	<?php } ?>
	<?php if ($settings->letter_spacing_h2 <> '') { ?>
			letter-spacing: <?php echo $settings->letter_spacing_h2; ?>px;
	<?php } ?>
	<?php if ( $settings->font_color_h2 <> '' ) { ?>
		color: #<?php echo $settings->font_color_h2; ?>;
	<?php } ?>
	}
<?php } ?>

<?php if ( !empty($settings->font_family_h3) && $settings->font_family_h3['family'] != "Default" || $settings->font_weight_h3 <> '' || $settings->font_size_h3 <> '' || $settings->font_lineheight_h3 <> '' || $settings->font_color_h3 <> '' ) { ?>
	.fl-node-<?php echo $id; ?> .rich-text-advanced h3{ 
	<?php if ( !empty($settings->font_family_h3) && $settings->font_family_h3['family'] != "Default" ) { ?>
		<?php FLBuilderFonts::font_css( $settings->font_family_h3 ); ?>
	<?php } ?>
	<?php if ( $settings->font_weight_h3 <> '' ) { ?>
		font-weight: <?php echo $settings->font_weight_h3; ?>;
	<?php } ?>
	<?php if ( $settings->font_size_h3 <> '' ) { ?>
		font-size: <?php echo $settings->font_size_h3; ?>px;
	<?php } ?>
	<?php if ( $settings->font_lineheight_h3 <> '' ) { ?>
		line-height: <?php echo $settings->font_lineheight_h3; ?>em;
	<?php } ?>
	<?php if ($settings->letter_spacing_h3 <> '') { ?>
			letter-spacing: <?php echo $settings->letter_spacing_h3; ?>px;
	<?php } ?>
	<?php if ( $settings->font_color_h3 <> '' ) { ?>
		color: #<?php echo $settings->font_color_h3; ?>;
	<?php } ?>
	}
<?php } ?>

<?php if ( !empty($settings->font_family_h4) && $settings->font_family_h4['family'] != "Default" || $settings->font_weight_h4 <> '' || $settings->font_size_h4 <> '' || $settings->font_lineheight_h4 <> '' || $settings->font_color_h4 <> '' ) { ?>
	.fl-node-<?php echo $id; ?> .rich-text-advanced h4{ 
	<?php if ( !empty($settings->font_family_h4) && $settings->font_family_h4['family'] != "Default" ) { ?>
		<?php FLBuilderFonts::font_css( $settings->font_family_h4 ); ?>
	<?php } ?>
	<?php if ( $settings->font_weight_h4 <> '' ) { ?>
		font-weight: <?php echo $settings->font_weight_h4; ?>;
	<?php } ?>
	<?php if ( $settings->font_size_h4 <> '' ) { ?>
		font-size: <?php echo $settings->font_size_h4; ?>px;
	<?php } ?>
	<?php if ( $settings->font_lineheight_h4 <> '' ) { ?>
		line-height: <?php echo $settings->font_lineheight_h4; ?>em;
	<?php } ?>
	<?php if ($settings->letter_spacing_h4 <> '') { ?>
			letter-spacing: <?php echo $settings->letter_spacing_h4; ?>px;
	<?php } ?>
	<?php if ( $settings->font_color_h4 <> '' ) { ?>
		color: #<?php echo $settings->font_color_h4; ?>;
	<?php } ?>
	}
<?php } ?>

<?php if ( !empty($settings->font_family_h5) && $settings->font_family_h5['family'] != "Default" || $settings->font_weight_h5 <> '' || $settings->font_size_h5 <> '' || $settings->font_lineheight_h5 <> '' || $settings->font_color_h5 <> '' ) { ?>
	.fl-node-<?php echo $id; ?> .rich-text-advanced h5{ 
	<?php if ( !empty($settings->font_family_h5) && $settings->font_family_h5['family'] != "Default" ) { ?>
		<?php FLBuilderFonts::font_css( $settings->font_family_h5 ); ?>
	<?php } ?>
	<?php if ( $settings->font_weight_h5 <> '' ) { ?>
		font-weight: <?php echo $settings->font_weight_h5; ?>;
	<?php } ?>
	<?php if ( $settings->font_size_h5 <> '' ) { ?>
		font-size: <?php echo $settings->font_size_h5; ?>px;
	<?php } ?>
	<?php if ( $settings->font_lineheight_h5 <> '' ) { ?>
		line-height: <?php echo $settings->font_lineheight_h5; ?>em;
	<?php } ?>
	<?php if ($settings->letter_spacing_h5 <> '') { ?>
			letter-spacing: <?php echo $settings->letter_spacing_h5; ?>px;
	<?php } ?>
	<?php if ( $settings->font_color_h5 <> '' ) { ?>
		color: #<?php echo $settings->font_color_h5; ?>;
	<?php } ?>
	}
<?php } ?>

<?php if ( !empty($settings->font_family_h6) && $settings->font_family_h6['family'] != "Default" || $settings->font_weight_h6 <> '' || $settings->font_size_h6 <> '' || $settings->font_lineheight_h6 <> '' || $settings->font_color_h6 <> '' ) { ?>
	.fl-node-<?php echo $id; ?> .rich-text-advanced h6{ 
	<?php if ( !empty($settings->font_family_h6) && $settings->font_family_h6['family'] != "Default" ) { ?>
		<?php FLBuilderFonts::font_css( $settings->font_family_h6 ); ?>
	<?php } ?>
	<?php if ( $settings->font_weight_h6 <> '' ) { ?>
		font-weight: <?php echo $settings->font_weight_h6; ?>;
	<?php } ?>
	<?php if ( $settings->font_size_h6 <> '' ) { ?>
		font-size: <?php echo $settings->font_size_h6; ?>px;
	<?php } ?>
	<?php if ( $settings->font_lineheight_h6 <> '' ) { ?>
		line-height: <?php echo $settings->font_lineheight_h6; ?>em;
	<?php } ?>
	<?php if ($settings->letter_spacing_h6 <> '') { ?>
			letter-spacing: <?php echo $settings->letter_spacing_h6; ?>px;
	<?php } ?>
	<?php if ( $settings->font_color_h6 <> '' ) { ?>
		color: #<?php echo $settings->font_color_h6; ?>;
	<?php } ?>
	}
<?php } ?>
