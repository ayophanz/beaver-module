<?php
$output = '<ul class="'.$module->get_classname().'">';
	for($i = 0; $i < count($settings->items); $i++) : if(!is_object($settings->items[$i])) continue;
		$listClass = '';
		if ( !empty($settings->items[$i]->list_icon) ) {
			$listClass = ' has-icon';
		}
		$list_icon_type = '';
		if ( $settings->items[$i]->list_icon_type == 'image' && !empty($settings->items[$i]->list_icon_image) ) {
			$list_icon_type = ' '.$settings->items[$i]->list_icon_type;
		}
		$output .= '<li class="list item-'.($i+1).$listClass.$list_icon_type.'">';
			if ( $settings->items[$i]->list_icon_type == '' && !empty($settings->items[$i]->list_icon) ) {
				$output .= '<i class="list-icon '.$settings->items[$i]->list_icon.'"></i>';
			}
			if ( !empty($settings->items[$i]->list_text) ) {
				$output .= '<span class="list-text">'.$settings->items[$i]->list_text.'</span>';
			}
			if ( !empty($settings->items[$i]->list_content) ) {
				global $wp_embed;
				$output .= '<div class="list-content">'.wpautop( $wp_embed->autoembed( $settings->items[$i]->list_content ) ).'</div>';
			}
		$output .= '</li>';
	endfor;
$output .= '</ul>';
echo $output;
?>