<?php if( $settings->title_size <> '' ) { ?>
.fl-node-<?php echo $id; ?> .faq-item .faq-title {
	<?php if( $settings->title_size <> '' ) { ?>
	font-size: <?php echo $settings->title_size; ?>px;
	<?php } ?>
}
<?php } ?>
<?php if( !empty($settings->bar_color_border) || !empty($settings->bar_color_bg) || !empty($settings->title_color) ) { ?>
.fl-node-<?php echo $id; ?> .faq-item:not(.active) .faq-title {
	<?php if( !empty($settings->bar_color_bg) ) { ?>
	background-color: #<?php echo $settings->bar_color_bg; ?>;
	<?php } ?>
	<?php if( !empty($settings->bar_color_border) ) { ?>
	border-color: #<?php echo $settings->bar_color_border; ?>;
	<?php } ?>
	<?php if( !empty($settings->title_color) ) { ?>
	color: #<?php echo $settings->title_color; ?>;
	<?php } ?>
}
<?php } ?>
<?php if( !empty($settings->title_color_icon) ) { ?>
.fl-node-<?php echo $id; ?> .faq-item:not(.active) .faq-title i {
	color: #<?php echo $settings->title_color_icon; ?>;
}
<?php } ?>
<?php if( !empty($settings->desc_color_bg) || !empty($settings->desc_color) ) { ?>
.fl-node-<?php echo $id; ?> .faq-item .faq-desc {
	background-color: #<?php echo $settings->desc_color_bg; ?>;
	color: #<?php echo $settings->desc_color; ?>;
}
<?php } ?>


<?php if( !empty($settings->bar_color_border_active) || !empty($settings->bar_color_bg_active) || !empty($settings->title_active_color) ) { ?>
.fl-node-<?php echo $id; ?> .faq-item.active .faq-title {
	<?php if( !empty($settings->title_active_color) ) { ?>
	border-left-color: #<?php echo $settings->title_active_color; ?>;
	<?php } ?>
	<?php if( !empty($settings->bar_color_bg_active) ) { ?>
	background-color: #<?php echo $settings->bar_color_bg_active; ?>;
	<?php } ?>
	<?php if( !empty($settings->bar_color_border_active) ) { ?>
	border-color: #<?php echo $settings->bar_color_border_active; ?>;
	<?php } ?>
	<?php if( !empty($settings->title_active_color) ) { ?>
	color: #<?php echo $settings->title_active_color; ?>;
	<?php } ?>
}
<?php } ?>
<?php if( !empty($settings->title_active_color_icon) ) { ?>
.fl-node-<?php echo $id; ?> .faq-item.active .faq-title i {
	color: #<?php echo $settings->title_active_color_icon; ?>;
}
<?php } ?>
