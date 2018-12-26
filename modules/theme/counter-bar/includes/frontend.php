<?php
$icon =
$icon_position_top =
$icon_position_middle =
$icon_position_bottom =
$preppend = 
$append = '';

if($settings->counterbar_icon_source == "icon") {
	if (!empty($settings->counterbar_icon)) { 
		$icon = '<i class="counterbar-icon '.$settings->counterbar_icon.'"></i>'; 
	}
} else if ($settings->counterbar_icon_source == "image") {
	if (!empty($settings->counterbar_icon_img)) {
		$icon = '<img class="counterbar-icon" src="'.$settings->counterbar_icon_img_src.'" alt="icon">'; 
	}
}
if($settings->counterbar_position == "top") {
	$icon_position_top = $icon;
} else if ($settings->counterbar_position == "middle"){
	$icon_position_middle = $icon;
} else if ($settings->counterbar_position == "bottom"){
	$icon_position_bottom = $icon;
}

if ( isset($settings->counterbar_number_prepend) ) {
	$preppend = '<span class="counterbar-number-prepend">'.$settings->counterbar_number_prepend.'</span>';
}
if ( isset($settings->counterbar_number_append) ) {
	$append = '<span class="counterbar-number-append">'.$settings->counterbar_number_append.'</span>';
}

if ( $settings->counterbar_style != "circle") {
	$aligment = $settings->counterbar_alignment;
}

$number_tag = $settings->counterbar_number_tag <> '' ? $settings->counterbar_number_tag : 'h2';

$output = '<div class="'.$module->get_classname().$aligment.' '.$settings->counterbar_style.'">';
	$output .= '<div class="counterbar-inner">';
		$output .= '<div class="counterbar-content">';
			if($settings->counterbar_style == "circle") {
				$output .= '
				<div class="counterbar-circle">
					<svg class="svg" viewBox="0 0 200 200" version="1.1" preserveAspectRatio="xMinYMin meet">
						<circle class="bar" r="90" cx="100" cy="100" fill="transparent" stroke-dasharray="565.49" stroke-dashoffset="0" transform="rotate(-90 100 100)"/>
						<circle class="bar-counter counterbarscroller" data-percentage="'.$settings->countercircle_percentage.'" data-delay="'.$settings->counterbar_delay.'" r="90" cx="100" cy="100" fill="transparent" stroke-dasharray="565.49" stroke-dashoffset="565.49" stroke-linecap="round" transform="rotate(-90 100 100)" style="stroke-dashoffset: 0px;"/>
					</svg>
				</div>'; 
			} 
			$output .= $icon_position_top;
			$output .= '<'.$number_tag.' class="counterbar-number">'.$preppend.'<span class="counterbarscroller" data-delay="'.$settings->counterbar_delay.'">'.$settings->counterbar_number.'</span>'.$append.'</'.$number_tag.'>';
			$output .= $icon_position_middle;
			if ( !empty($settings->counterbar_title) ) { 
				$output .= '<div class="counterbar-title">'.$settings->counterbar_title.'</div>';
			}
			$output .= $icon_position_bottom;
		$output .= '</div>';
	$output .= '</div>';
$output .= '</div>';
echo $output;
?>