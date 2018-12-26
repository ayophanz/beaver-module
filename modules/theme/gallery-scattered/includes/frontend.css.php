.fl-node-<?php echo $id; ?> {
	padding-top: <?php echo $settings->padding_top; ?>px;
	padding-bottom: <?php echo $settings->padding_bottom; ?>px;
	padding-left: <?php echo $settings->padding_left; ?>px;
	padding-right: <?php echo $settings->padding_right; ?>px;
}
<?php if($settings->gallery_btn_text != '') : ?>
.js .fl-node-<?php echo $id; ?> .photostack::after {
	content: '<?php echo $settings->gallery_btn_text; ?>';
}
<?php endif; ?>
<?php if($settings->bg_color != '') : ?>
.fl-node-<?php echo $id; ?> .photostack {
	background-color: rgba(<?php echo implode( ',', FLBuilderColor::hex_to_rgb( $settings->bg_color ) ) ?>, <?php echo $settings->bg_color_opacity/100; ?>);
}
<?php endif; ?>
<?php if($settings->botton_color != '') : ?>
.fl-node-<?php echo $id; ?> .photostack nav span {
	background-color: rgba(<?php echo implode( ',', FLBuilderColor::hex_to_rgb( $settings->botton_color ) ) ?>, 0.6);
}
.fl-node-<?php echo $id; ?> .photostack nav span.current {
	background-color: rgb(<?php echo implode( ',', FLBuilderColor::hex_to_rgb( $settings->botton_color ) ) ?>);
}
.fl-node-<?php echo $id; ?> .photostack nav span::after {
	color: rgb(<?php echo implode( ',', FLBuilderColor::hex_to_rgb( $settings->botton_color_text ) ) ?>);
}
<?php endif; ?>