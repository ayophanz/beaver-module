.fl-node-<?php echo $id; ?> .column-background {
	background-image: url(<?php echo $settings->bg_image_src; ?>);
	background-repeat: <?php echo $settings->bg_repeat; ?>;
	background-position: <?php echo $settings->bg_position; ?>;
	background-attachement: <?php echo $settings->bg_attachment; ?>;
	background-size: <?php echo $settings->bg_size; ?>;
}

<?php $global_settings = FLBuilderModel::get_global_settings(); if ( $settings->bg_break == 'medium' ) { ?>
	@media only screen and ( max-width: <?php echo $global_settings->medium_breakpoint; ?>px ) {
		.fl-node-<?php echo $id; ?> .column-background { position: static; }
	}
<?php } ?>