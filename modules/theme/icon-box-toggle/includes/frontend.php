<?php 
if ( ! empty( $settings->iconbox_icon_source ) ) {
	$iconbox_icon = '';
	if ( $settings->iconbox_icon_source == 'icon' ) {
		$iconbox_icon_type ='<i class="'.$settings->iconbox_icon.'"></i>';
	} else if ( $settings->iconbox_icon_source == 'image' ) {
		$iconbox_icon_type ='<img src="'.$settings->iconbox_img_src.'" alt="icon-separator">';
	}
	$iconbox_icon = '<div class="icon-box-toggle-icon">'.$iconbox_icon_type.'</div>';
}
if ( ! empty( $settings->iconbox_title ) ) {
	$iconbox_title = '<h3 class="icon-box-toggle-title">'.$settings->iconbox_title.'</h3>';
}
if ( ! empty( $settings->iconbox_desc ) ) {
	$iconbox_desc = '<p class="icon-box-toggle-desc">'.$settings->iconbox_desc.'</p>';
}
if ( ! empty( $settings->iconbox_link ) ) {
	$link_text = $settings->iconbox_link_text ? $settings->iconbox_link_text : 'READ MORE';
	$iconbox_link = '<a href="'.$settings->iconbox_link.'" class="icon-box-toggle-link" title="'.$link_text.'">'.$link_text.'</a>';
}
$output ='<div class="'.$module->get_classname().'">';
	$output .='<div class="icon-box-toggle-inner">';
		$output .=$iconbox_icon.$iconbox_title.$iconbox_desc.$iconbox_link;
	$output .='</div>';
$output .='</div>';
echo $output;
?>
