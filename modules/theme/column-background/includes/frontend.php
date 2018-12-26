<?php 
	$image = FLBuilderPhoto::get_attachment_data($settings->bg_image);
	$image_alt = $image->alt <> '' ? $image->alt : $image->title;
	$output ='<div class="'.$module->get_classname().'"> <img src="'.$settings->bg_image_src.'" alt="'.$image_alt.'"> </div>';
	echo $output;
?>
