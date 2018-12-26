<?php 
if (!empty($settings->bg_image)) {
	$poster = ' poster="'.$settings->bg_image_src.'" ';
}
$mp4_video = FLBuilderPhoto::get_attachment_data($settings->video);
$webm_video = FLBuilderPhoto::get_attachment_data($settings->video_webm);
$output ='<div class="'.$module->get_classname().'">';
  $output .='<video id="videojs_'.$id.'" class="video-js vjs-default-skin vjs-big-play-centered" preload="auto" controls'.$poster.'data-setup="{}">';
	  if($settings->video_type == 'media_library') {
		if (!empty($settings->video)) {
			$output .='<source src="'.$mp4_video->url.'" type="video/mp4">';
		}
		if (!empty($settings->video_webm)) {
			$output .='<source src="'.$webm_video->url.'" type="video/webm">';
		}
	  } else if ($settings->video_type == 'url') {
		if (!empty($settings->video_url)) {
			$output .='<source src="'.$settings->video_url.'" type="video/mp4">';
		}
		if (!empty($settings->video_webm_url)) {
			$output .='<source src="'.$settings->video_webm_url.'" type="video/webm">';
		}
	  }
  $output .='</video>';
$output .='</div>';
echo $output;
?>
