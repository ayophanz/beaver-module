<?php 
$output ='<div class="'.$module->get_classname().'">';
	for($i = 0; $i < count($settings->items); $i++) : if(!is_object($settings->items[$i])) continue;
		$socialmedia_icon = '';
		if ( $settings->items[$i]->socialmedia_icon_source == 'icon' ) {
			$socialmedia_icon ='<i class="'.$settings->items[$i]->socialmedia_icon.'"></i>';
		} else if ( $settings->items[$i]->socialmedia_icon_source == 'image' ) {
			$socialmedia_icon ='<img src="'.$settings->items[$i]->socialmedia_img_src.'" alt="'.$settings->items[$i]->socialmedia_title.'">';
		}
		$output .= '<a href="'.$settings->items[$i]->socialmedia_link.'" class="'.$module->textToClass($settings->items[$i]->socialmedia_title).' social-meida-icon-'.($i+1).'" target="_blank" title="'.$settings->items[$i]->socialmedia_title.'">'.$socialmedia_icon.'</a>';
	endfor;
$output .='</div>';
echo $output;
?>
