<?php for($i = 0; $i < count($settings->items); $i++) : if(!is_object($settings->items[$i])) continue; ?>
	<?php if ( ! empty( $settings->items[$i]->slider_bg_image ) || ! empty( $settings->items[$i]->slider_bg_color ) ) { ?>
		.fl-node-<?php echo $id; ?> .slider-flickity-thumb-item.item-<?php echo ($i+1); ?>{
			<?php if ( ! empty( $settings->items[$i]->slider_bg_image ) ) { ?>
				background-image: url(<?php echo $settings->items[$i]->slider_bg_image_src; ?>);
			<?php } ?>
			<?php if ( ! empty( $settings->items[$i]->slider_bg_color ) ) { ?>
				background-color: #<?php echo $settings->items[$i]->slider_bg_color; ?>;
			<?php } ?>
		}
	<?php } ?>
	<?php if ( ! empty( $settings->items[$i]->slider_title_color ) ) { ?>
		.fl-node-<?php echo $id; ?> .slider-flickity-thumb-item.item-<?php echo ($i+1); ?> .slider-flickity-thumb-info-content .title {
			color: #<?php echo $settings->items[$i]->slider_title_color; ?>;
		}
	<?php } ?>
	<?php if ( ! empty( $settings->items[$i]->slider_text_color ) ) { ?>
		.fl-node-<?php echo $id; ?> .slider-flickity-thumb-item.item-<?php echo ($i+1); ?> .slider-flickity-thumb-info-content .description {
			color: #<?php echo $settings->items[$i]->slider_text_color; ?>;
		}
	<?php } ?>

	<?php if ( ! empty( $settings->items[$i]->slider_thumbnail_label_color ) ) { ?>
		.fl-node-<?php echo $id; ?> .slider-flickity-thumb-nav-item.item-<?php echo ($i+1); ?> .nav_title {
			color: #<?php echo $settings->items[$i]->slider_thumbnail_label_color; ?>;
		}
	<?php } else if ( ! empty( $settings->items[$i]->slider_title_color ) ) { ?>
		.fl-node-<?php echo $id; ?> .slider-flickity-thumb-nav-item.item-<?php echo ($i+1); ?> .nav_title {
			color: #<?php echo $settings->items[$i]->slider_title_color; ?>;
		}
	<?php } ?>

<?php endfor; ?>
<?php if ( ! empty( $settings->slider_thumbnails_margin_top ) ) { ?>
	.fl-node-<?php echo $id; ?> .slider-flickity-thumb-nav {
		margin-top: <?php echo $settings->slider_thumbnails_margin_top; ?>px;
	}
<?php } ?>
<?php if ( ! empty( $settings->slider_thumbnails_active_margin_top ) ) { ?>
	.fl-node-<?php echo $id; ?> .slider-flickity-thumb-nav .flickity-slider .slider-flickity-thumb-nav-item.is-nav-selected img { 
		transform: translateY(<?php echo $settings->slider_thumbnails_active_margin_top; ?>px); 
		-webkit-transform: translateY(<?php echo $settings->slider_thumbnails_active_margin_top; ?>px);
	}
<?php } ?>
<?php if ( ! empty( $settings->slider_thumbnails_background ) ) { ?>
	.fl-node-<?php echo $id; ?> .slider-flickity-thumb-nav { 
		background-image: url(<?php echo $settings->slider_thumbnails_background_src; ?>);
		background-position: <?php echo $settings->slider_thumbnails_background_position; ?>;
	}
<?php } ?>