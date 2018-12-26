<?php 
if ( ! empty( $settings->title ) ) {
	$title = '<h3 class="box-link-title">'.$settings->title.'</h3>';
}
if ( ! empty( $settings->label ) ) {
	$label = '<p class="box-link-label">'.$settings->label.'</p>';
}
if ( ! empty( $settings->link ) ) {
	$box_start = '<a href="'.$settings->link.'" class="box-link-inner" title="'.$settings->title.' '.$settings->label.'">';
	$box_end = '</a>';
} else {
	$box_start = '<div class="box-link-inner">';
	$box_end = '</div>';
}


$output ='<div class="'.$module->get_classname().'">';
	$output .=$box_start.$title.$label.$box_end;
$output .='</div>';
echo $output;
?>
