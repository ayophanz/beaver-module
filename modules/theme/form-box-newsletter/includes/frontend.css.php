<?php if( $settings->width <> '' || !empty($settings->bg_color) || !empty($settings->color) ) { ?>
.fl-node-<?php echo $id; ?> .form-box-newsletter {
	<?php if( !empty($settings->bg_color) ) { ?>
		background-color: #<?php echo $settings->bg_color; ?>;
	<?php } ?>
	<?php if( !empty($settings->color) ) { ?>
		color: #<?php echo $settings->color; ?>;
	<?php } ?>
	<?php if( $settings->width <> '' ) { ?>
		max-width: <?php echo $settings->width; ?>px;
	<?php } ?>
}
<?php } ?>
<?php if( !empty($settings->bg_color) && !empty($settings->bg_color_bottom) ) { ?>
.fl-node-<?php echo $id; ?> .form-box-newsletter::before {
	background: -moz-linear-gradient(top,  		rgba(<?php echo implode(',', FLBuilderColor::hex_to_rgb($settings->bg_color)) ?>,1) 0%, rgba(<?php echo implode(',', FLBuilderColor::hex_to_rgb($settings->bg_color_bottom)) ?>,1) 100%);
	background: -webkit-linear-gradient(top,  	rgba(<?php echo implode(',', FLBuilderColor::hex_to_rgb($settings->bg_color)) ?>,1) 0%, rgba(<?php echo implode(',', FLBuilderColor::hex_to_rgb($settings->bg_color_bottom)) ?>,1) 100%);
	background: linear-gradient(to bottom,  	rgba(<?php echo implode(',', FLBuilderColor::hex_to_rgb($settings->bg_color)) ?>,1) 0%, rgba(<?php echo implode(',', FLBuilderColor::hex_to_rgb($settings->bg_color_bottom)) ?>,1) 100%);
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#<?php echo $settings->bg_color; ?>', endColorstr='#<?php echo $settings->bg_color_bottom; ?>',GradientType=0 );
}
<?php } ?>


<?php if( !empty($settings->input_bg_color) || !empty($settings->input_color) ) { ?>
.fl-node-<?php echo $id; ?> .form-box-newsletter-form .wysija-input {
	<?php if( !empty($settings->input_bg_color) ) { ?>
		background-color: #<?php echo $settings->input_bg_color; ?>;
	<?php } ?>
	<?php if( !empty($settings->input_color) ) { ?>
		color: rgba(<?php echo implode(',', FLBuilderColor::hex_to_rgb($settings->input_color)) ?>,0.3);
	<?php } ?>
}
<?php } ?>
<?php if( !empty($settings->input_color) ) { ?>
.fl-node-<?php echo $id; ?> .form-box-newsletter-form .wysija-input:focus {
	<?php if( !empty($settings->input_color) ) { ?>
		color: rgba(<?php echo implode(',', FLBuilderColor::hex_to_rgb($settings->input_color)) ?>,1);
	<?php } ?>
}
<?php } ?>

<?php if( $settings->input_spacing <> '' ) { ?>
.fl-node-<?php echo $id; ?> .form-box-newsletter-form .wysija-paragraph {
	<?php if( $settings->input_spacing <> '' ) { ?>
		margin-bottom: <?php echo $settings->input_spacing; ?>px;
	<?php } ?>
}
<?php } ?>
<?php if( !empty($settings->button_color) || !empty($settings->button_bg_color) ) { ?>
.fl-node-<?php echo $id; ?> .form-box-newsletter-form .wysija-submit {
	<?php if( !empty($settings->button_bg_color) ) { ?>
		background-color: #<?php echo $settings->button_bg_color; ?>;
	<?php } ?>
	<?php if( !empty($settings->button_color) ) { ?>
		color: #<?php echo $settings->button_color; ?>;
	<?php } ?>
}
<?php } ?>
<?php if( !empty($settings->button_bg_color) && !empty($settings->button_bg_color_bottom) ) { ?>
.fl-node-<?php echo $id; ?> .form-box-newsletter-form .wysija-submit::before {
	background: -moz-linear-gradient(top,  		rgba(<?php echo implode(',', FLBuilderColor::hex_to_rgb($settings->button_bg_color)) ?>,1) 0%, rgba(<?php echo implode(',', FLBuilderColor::hex_to_rgb($settings->button_bg_color_bottom)) ?>,1) 100%);
	background: -webkit-linear-gradient(top,  	rgba(<?php echo implode(',', FLBuilderColor::hex_to_rgb($settings->button_bg_color)) ?>,1) 0%, rgba(<?php echo implode(',', FLBuilderColor::hex_to_rgb($settings->button_bg_color_bottom)) ?>,1) 100%);
	background: linear-gradient(to bottom,  	rgba(<?php echo implode(',', FLBuilderColor::hex_to_rgb($settings->button_bg_color)) ?>,1) 0%, rgba(<?php echo implode(',', FLBuilderColor::hex_to_rgb($settings->button_bg_color_bottom)) ?>,1) 100%);
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#<?php echo $settings->button_bg_color; ?>', endColorstr='#<?php echo $settings->button_bg_color_bottom; ?>',GradientType=0 );
}
<?php } ?>

<?php if( $settings->title_size <> '' || $settings->title_spacing <> '' || !empty($settings->title_color)  || !empty($settings->title_weight) ) { ?>
.fl-node-<?php echo $id; ?> .form-box-newsletter .form-box-newsletter-title {
	<?php if( !empty($settings->title_color) ) { ?>
		color: #<?php echo $settings->title_color; ?>;
	<?php } ?>
	<?php if( $settings->title_size <> '' ) { ?>
		font-size: <?php echo $settings->title_size; ?>px;
	<?php } ?>
	<?php if( !empty($settings->title_weight) ) { ?>
		font-weight: <?php echo $settings->title_weight; ?>;
	<?php } ?>
	<?php if( $settings->title_spacing <> '' ) { ?>
		margin-bottom: <?php echo $settings->title_spacing; ?>px;
	<?php } ?>
}
<?php } ?>

<?php if( $settings->desc_size <> '' || $settings->desc_spacing <> '' || !empty($settings->desc_color)  || !empty($settings->desc_weight) ) { ?>
.fl-node-<?php echo $id; ?> .form-box-newsletter .form-box-newsletter-desc {
	<?php if( !empty($settings->desc_color) ) { ?>
		color: #<?php echo $settings->desc_color; ?>;
	<?php } ?>
	<?php if( $settings->desc_size <> '' ) { ?>
		font-size: <?php echo $settings->desc_size; ?>px;
	<?php } ?>
	<?php if( !empty($settings->desc_weight) ) { ?>
		font-weight: <?php echo $settings->desc_weight; ?>;
	<?php } ?>
	<?php if( $settings->desc_spacing <> '' ) { ?>
		margin-bottom: <?php echo $settings->desc_spacing; ?>px;
	<?php } ?>
}
<?php } ?>

<?php if( $settings->note_size <> '' || $settings->note_spacing <> '' || !empty($settings->note_color)  || !empty($settings->note_weight) ) { ?>
.fl-node-<?php echo $id; ?> .form-box-newsletter .form-box-newsletter-note {
	<?php if( !empty($settings->note_color) ) { ?>
		color: #<?php echo $settings->note_color; ?>;
	<?php } ?>
	<?php if( $settings->note_size <> '' ) { ?>
		font-size: <?php echo $settings->note_size; ?>px;
	<?php } ?>
	<?php if( !empty($settings->note_weight) ) { ?>
		font-weight: <?php echo $settings->note_weight; ?>;
	<?php } ?>
	<?php if( $settings->note_spacing <> '' ) { ?>
		margin-bottom: <?php echo $settings->note_spacing; ?>px;
	<?php } ?>
}
<?php } ?>

<?php 
	// MEDIUM - GLOBAL SETTING
	$global_settings = FLBuilderModel::get_global_settings(); 
	if ( $settings->title_size_medium <> '' || $settings->desc_size_medium <> '' ) { ?>
	@media only screen and ( max-width: <?php echo $global_settings->medium_breakpoint; ?>px ) {
		<?php if ( $settings->title_size_medium <> '' ) { ?>
			.fl-node-<?php echo $id; ?> .form-box-newsletter .form-box-newsletter-title {
				<?php if( $settings->title_size_medium <> '' ) { ?>
					font-size: <?php echo $settings->title_size_medium; ?>px;
				<?php } ?>
			}
		<?php } ?>
		<?php if ( $settings->desc_size_medium <> '' ) { ?>
			.fl-node-<?php echo $id; ?> .form-box-newsletter .form-box-newsletter-desc {
				<?php if( $settings->desc_size_medium <> '' ) { ?>
					font-size: <?php echo $settings->desc_size_medium; ?>px;
				<?php } ?>
			}
		<?php } ?>
	}
<?php } ?>
<?php 
	// RESPONSIVE - GLOBAL SETTING
	if ( $settings->title_size_responsive <> '' || $settings->desc_size_responsive <> '' ) { ?>
	@media only screen and ( max-width: <?php echo $global_settings->responsive_breakpoint; ?>px ) {
		<?php if ( $settings->title_size_responsive <> '' ) { ?>
			.fl-node-<?php echo $id; ?> .form-box-newsletter .form-box-newsletter-title {
				<?php if( $settings->title_size_responsive <> '' ) { ?>
					font-size: <?php echo $settings->title_size_responsive; ?>px;
				<?php } ?>
			}
		<?php } ?>
		<?php if ( $settings->desc_size_responsive <> '' ) { ?>
			.fl-node-<?php echo $id; ?> .form-box-newsletter .form-box-newsletter-desc {
				<?php if( $settings->desc_size_responsive <> '' ) { ?>
					font-size: <?php echo $settings->desc_size_responsive; ?>px;
				<?php } ?>
			}
		<?php } ?>
	}
<?php } ?>
