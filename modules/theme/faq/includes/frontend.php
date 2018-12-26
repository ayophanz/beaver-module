<?php global $wp_embed;
$output = '<div class="'.$module->get_classname().'">';
	for($i = 0; $i < count($settings->items); $i++) : if(!is_object($settings->items[$i])) continue;
		$output .='<div class="faq-item faq-item-'.($i+1).'">';
			if ( ! empty( $settings->items[$i]->faq_title ) ) {
				$output .= '<'.$settings->title_tag.' class="faq-title">'.$settings->items[$i]->faq_title.'<i class="'.$settings->icon.'"></i></'.$settings->title_tag.'>';
			}
			$output .= '<div class="faq-desc"><div class="faq-desc-content">'.wpautop( $wp_embed->autoembed( $settings->items[$i]->faq_text ) ).'</div></div>';
		$output .='</div>';
	endfor;
$output .= '</div>';
echo $output;
?>