<?php	
$output = '<div class="'.$module->get_classname().'">';
	for($i = 0; $i < count($settings->items); $i++) : if(!is_object($settings->items[$i])) continue;
		$output .= '<div class="skillbar skillbar-item-'.$i.'">
		  <span class="skillbar-title">'.$settings->items[$i]->skillbar_title.'</span>
		  <span class="skillbar-bar-wrapper">
			  <span class="skillbar-bar"></span>
			  <span class="skill-bar-percent"><span class="countscroller" data-delay="'.$settings->skillbar_delay.'">'.$settings->items[$i]->skillbar_percentage.'</span>%</span>
		  </span>
		</div>';
	endfor;
$output .= '</div>';
echo $output;
?>