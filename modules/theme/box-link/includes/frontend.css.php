.fl-node-<?php echo $id; ?> .box-link {
	<?php if(!empty($settings->height)) : ?>
		height: <?php echo $settings->height; ?>px;
	<?php endif; ?>
	<?php if(!empty($settings->bg_color)) : ?>
		background-color: #<?php echo $settings->bg_color; ?>;
	<?php endif; ?>
}
.fl-node-<?php echo $id; ?> .box-link::after {
	<?php if (!empty($settings->bg_image)) { ?>
		background-image: url(<?php echo $settings->bg_image_src; ?>);
	<?php } ?>
}
<?php if(!empty($settings->bg_color) && !empty($settings->bg_image) && !empty($settings->bg_image_opacity)) : ?>
.fl-node-<?php echo $id; ?> .box-link::before {
	background-color: #<?php echo $settings->bg_color; ?>;
	opacity: <?php echo $settings->bg_image_opacity/100; ?>;
}
<?php endif; ?>
<?php if(!empty($settings->font_size)) : ?>
.fl-node-<?php echo $id; ?> .box-link-title {
	font-size: <?php echo $settings->font_size; ?>px;
}
<?php endif; ?>
<?php if(!empty($settings->font_size_label)) : ?>
.fl-node-<?php echo $id; ?> .box-link-label {
	font-size: <?php echo $settings->font_size_label; ?>px;
}
<?php endif; ?>
