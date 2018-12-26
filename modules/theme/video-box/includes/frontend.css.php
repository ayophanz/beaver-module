.fl-node-<?php echo $id; ?> .video-box .video-js .vjs-poster,
.fl-node-<?php echo $id; ?> .video-box .video-js .vjs-poster::after {
	<?php if(!empty($settings->bg_color)) : ?>
		background-color: #<?php echo $settings->bg_color; ?>;
	<?php endif; ?>
}
<?php if(!empty($settings->bg_color) && !empty($settings->bg_image) && !empty($settings->bg_image_opacity)) : ?>
.fl-node-<?php echo $id; ?> .video-box .video-js .vjs-poster::after {
	background-color: #<?php echo $settings->bg_color; ?>;
	opacity: <?php echo $settings->bg_image_opacity/100; ?>;
}
<?php endif; ?>
