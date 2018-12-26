<?php 
if ( !empty( $settings->title_prefix ) ) {
	if ( !empty( $settings->title_title_prefix_width ) ) { $title_title_prefix_width = ' max-width-enable'; }
	$title_prefix ='<span class="title-prefix'.$title_title_prefix_width.'">'.$settings->title_prefix.'</span>';
}
if ( !empty( $settings->title ) ) {
	$title = '<span class="title">'.$settings->title.'</span>';
}
if ( !empty( $settings->title_suffix ) ) {
	if ( !empty( $settings->title_title_suffix_width ) ) { $title_title_suffix_width = ' max-width-enable'; }
	$title_suffix ='<span class="title-suffix'.$title_title_suffix_width.'">'.$settings->title_suffix.'</span>';
}
if ( !empty( $settings->title_desc ) ) {
	if ( !empty( $settings->title_desc_width ) ) { $title_desc_width = ' max-width-enable'; }
	$title_desc ='<p class="heading-advance-desc'.$title_desc_width.'">'.$settings->title_desc.'</p>';
}
if ( !empty( $settings->title_desc_extra ) ) {
	if ( !empty( $settings->title_desc_width ) ) { $title_desc_width = ' max-width-enable'; }
	$title_desc_extra ='<p class="heading-advance-desc extra'.$title_desc_width.'">'.$settings->title_desc_extra.'</p>';
}
if ( empty($settings->title_separator_icon_source) ) {
	$title_separator_icon_source = ' has-separator';
}
if ( !empty( $settings->title_separator_style ) ) {
	if ( $settings->title_separator_icon_source == 'none' ) {
		$title_sep_type_class = 'none';
	}
	if ( $settings->title_separator_icon_source == 'icon' && !empty($settings->title_separator_icon) ) {
		$title_sep_type ='<i class="'.$settings->title_separator_icon.'"></i>';
		$title_sep_type_class = 'icon';
	} else if ( $settings->title_separator_icon_source == 'text' && !empty($settings->title_separator_text) ) {
		$title_sep_type =$settings->title_separator_text;
		$title_sep_type_class = 'text';
	} else if ( $settings->title_separator_icon_source == 'image' && !empty($settings->title_separator_img) ) {
		$title_sep_type ='<img src="'.$settings->title_separator_img_src.'" alt="icon-separator">';
		$title_sep_type_class = 'image';
	}
	
	$title_sep ='<div class="heading-advance-separator '.$settings->title_separator_style.' '.$settings->title_separator_icon_position.'">
		<div><span></span></div>
		<div class="'.$title_sep_type_class.'">'.$title_sep_type.'</div>
		<div><span></span></div>
	</div>';
	
	if ( $settings->title_separator_icon_position == 'top' || $settings->title_separator_icon_position == 'left-top' || $settings->title_separator_icon_position == 'right-top' ) {
		$title_sep_top = $title_sep;
	} else if ( $settings->title_separator_icon_position == 'middle' || $settings->title_separator_icon_position == 'left-middle' || $settings->title_separator_icon_position == 'right-middle' ) {
		$title_sep_middle = $title_sep;
		$title_sep_class =' has-separator-middle';
	} else if ( $settings->title_separator_icon_position == 'bottom' || $settings->title_separator_icon_position == 'left-bottom' || $settings->title_separator_icon_position == 'right-bottom' ) {
		$title_sep_bottom = $title_sep;
	}
}
if ( !empty( $settings->title_link ) ) {
	if ( !empty( $settings->title_prefix ) ) {
		$a_prefix = $settings->title_prefix.' ';
	}
	if ( !empty( $settings->title ) ) {
		$a_title = $settings->title;
	}
	if ( !empty( $settings->title_suffix ) ) {
		$a_suffix = ' '.$settings->title_suffix;
	}
	$a_link_title = $a_prefix.$a_title.$a_suffix;
	if ( $settings->title_link_style !== 'button' ) {
		$a_link_before ='<a href="'.$settings->title_link.'" title="'.$a_link_title.'">';
		$a_link_after ='</a>';
	} else {
		$a_link_button ='<a href="'.$settings->title_link.'" class="heading-advance-button '.$settings->title_link_align.'" title="'.$settings->title_link_label.'">'.$settings->title_link_label.'</a>';
	}
	
	if ( $settings->title_icon_source !== 'none' ) {
		$a_link_icon_before ='<a href="'.$settings->title_link.'" title="'.$a_link_title.'">';
		$a_link_icon_after ='</a>';
	}
}
if ( $settings->title_icon_source !== 'none' ) {
	
	if ( $settings->title_icon_source == 'image' ) {
		$title_icon_source = ' source-image';
	} else if ( $settings->title_icon_source == 'icon' ) {
		$title_icon_source = ' source-icon';
	}
	
	if ( $settings->title_icon_position == '' ) {
		$title_icon_position = ' icon-sides';
	} else if ( $settings->title_icon_position == 'top' ) {
		$title_icon_position = ' icon-top';
		if ( $settings->title_position == 'right' ) {
			$title_icon_position_align = ' icon-top-right';
		} else {
			$title_icon_position_align = ' icon-top-left';
		}
		if ( $settings->title_icon_float == 'left' )  $title_icon_float = ' icon-float-left';
		if ( $settings->title_icon_float == 'right' ) $title_icon_float = ' icon-float-right';
	} else if ( $settings->title_icon_position == 'bottom' ) {
		$title_icon_position = ' icon-bottom';
		if ( $settings->title_position == 'right' ) {
			$title_icon_position_align = ' icon-bottom-right';
		} else {
			$title_icon_position_align = ' icon-bottom-left';
		}
	}
	
	if ( $settings->title_icon_source == 'icon' && !empty($settings->title_icon_icon) ) {
		$title_icon ='<div class="heading-advance-icon'.$settings->title_icon_source_effect.$title_icon_source.$title_icon_position.$title_icon_position_align.$title_icon_float.'">'.$a_link_icon_before.'<i class="'.$settings->title_icon_icon.'"></i>'.$a_link_icon_after.'</div>';
	} else if ( $settings->title_icon_source == 'image' && !empty($settings->title_icon_img) ) {
		$title_icon ='<div class="heading-advance-icon'.$title_icon_source.$title_icon_position.$title_icon_position_align.$title_icon_float.'">'.$a_link_icon_before.'<img src="'.$settings->title_icon_img_src.'" alt="icon-separator">'.$a_link_icon_after.'</div>';
	}
	if ( $settings->title_position == 'right' && $settings->title_icon_position != 'top' || $settings->title_icon_position == 'bottom' ) {
		$title_icon_right = $title_icon;
	} else {
		$title_icon_left = $title_icon;
	}
}
$output ='<div class="'.$module->get_classname().' '.$settings->border_position.$title_separator_icon_source.'">';
	if ( !empty( $settings->title_width ) ) { $title_width = ' max-width-enable'; }
	$output .='<div class="heading-advance-box '.$title_width.$settings->title_position.$settings->mobile_target_centered.'">';
		$output .=$title_icon_left;
		$output .=$title_sep_top;
		if ( !empty( $settings->title_title_width ) ) { $title_title_width = ' max-width-enable'; }
		$output .='<'.$settings->title_tag.' class="heading-advance-title'.$title_title_width.$title_sep_class.'">';
			$output .=$a_link_before.$title_prefix;
				$output .=$title;
			$output .=$title_suffix.$a_link_after;
		$output .='</'.$settings->title_tag.'>';
		$output .=$title_sep_middle;
		$output .=$title_desc.$title_desc_extra;
		$output .=$title_sep_bottom;
		$output .=$title_icon_right;
		$output .=$a_link_button;
	$output .='</div>';
$output .='</div>';
echo $output;
?>
