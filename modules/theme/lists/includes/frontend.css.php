<?php if ( !empty($settings->default_icon_color) || $settings->font_size <> '' || $settings->font_weight <> '' || $settings->lineheight <> '' || $settings->spacing <> '' ) { ?>
	.fl-node-<?php echo $id; ?> .lists .list{ 
		<?php if ( !empty($settings->default_icon_color) ) { ?>
			color: #<?php echo $settings->default_icon_color; ?>;
		<?php } ?>
		<?php if ( $settings->font_size <> '' ) { ?>
			font-size: <?php echo $settings->font_size; ?>px;
		<?php } ?>
		<?php if ( $settings->font_weight <> '' ) { ?>
			font-weight: <?php echo $settings->font_weight; ?>;
		<?php } ?>
		<?php if ( $settings->lineheight <> '' ) { ?>
			line-height: <?php echo $settings->lineheight; ?>em;
		<?php } ?>
		<?php if ( $settings->spacing <> '' ) { ?>
			margin-bottom: <?php echo $settings->spacing; ?>px;
		<?php } ?>
	}
<?php } ?>
<?php if ( !empty($settings->default_text_color) ) { ?>
	.fl-node-<?php echo $id; ?> .lists .lists,
	.fl-node-<?php echo $id; ?> .lists .list .list-text{ 
		<?php if ( !empty($settings->default_text_color) ) { ?>
			color: #<?php echo $settings->default_text_color; ?>;
		<?php } ?>
	}
<?php } ?>
<?php for($i = 0; $i < count($settings->items); $i++) : if(!is_object($settings->items[$i])) continue;
	if ( !empty($settings->items[$i]->list_icon_color) ) {
		echo '.fl-node-'.$id.' .lists .list.item-'.($i+1).' {';
			echo 'color: #'.$settings->items[$i]->list_icon_color.';';
		echo '}';
	}
	if ( !empty($settings->items[$i]->list_text_color) ) {
		echo '.fl-node-'.$id.' .lists .list.item-'.($i+1).' .list-text {';
			echo 'color: #'.$settings->items[$i]->list_text_color.';';
		echo '}';
	}
	if ( $settings->items[$i]->list_icon_type == 'image' && !empty($settings->items[$i]->list_icon_image) ) {
		echo '.fl-node-'.$id.' .lists .list.item-'.($i+1).'::before {';
			echo 'background-image: url('.$settings->items[$i]->list_icon_image_src.');';
		echo '}';
	}
endfor; ?>