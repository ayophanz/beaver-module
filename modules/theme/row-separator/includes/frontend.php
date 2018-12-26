<?php 
$color = $position = '';

$output ='<div class="'.$module->get_classname().'">';
	if ($settings->row_separator_style == 'arrow') {
		$color = !empty($settings->row_separator_color) ? '#'.$settings->row_separator_color : '#333';
		if( $settings->row_separator_position == 'top') {
			$position = ' style="display:table; margin: auto; margin-bottom: -50px; transform: scaleY(-1); -webkit-transform: scaleY(-1);"';
		} else {
			$position = ' style="display:table; margin: auto; margin-top: -50px;"';
		}
		$output .='<svg'.$position.' fill="'.$color.'" version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 100 50" style="enable-background:new 0 0 100 50;" xml:space="preserve" width="100" height="50" preserveAspectRatio="xMidYMid"><g><polygon points="50,0.5 0,50.5 100,50.5"/></g></svg>';
	}
	if ($settings->row_separator_style == 'wide-arrow') {
		$color = !empty($settings->row_separator_color) ? '#'.$settings->row_separator_color : '#333';
		if( $settings->row_separator_position == 'top') {
			$position = ' style="margin-bottom: -55px; transform: scaleY(-1); -webkit-transform: scaleY(-1);"';
		} else {
			$position = ' style="margin-top: -55px;"';
		}
		$output .='<svg'.$position.' fill="'.$color.'" width="100%" height="100" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 612 100" style="enable-background:new 0 0 612 100;" xml:space="preserve"><path d="M0,0h306h306v0L0,0L0,0z M0,50h612v50H0V50z M612,0.2L459.7,25L306,50L152.3,25L0,0.2V50h612L612,0.2L612,0.2z" /></svg>';
	}
	if ($settings->row_separator_style == 'wide-arrow-larger') {
		$color = !empty($settings->row_separator_color) ? '#'.$settings->row_separator_color : '#333';
		if( $settings->row_separator_position == 'top') {
			$position = ' style="margin-bottom: -110px; transform: scaleY(-1); -webkit-transform: scaleY(-1);"';
		} else {
			$position = ' style="margin-top: -110px;"';
		}
		$output .='<svg'.$position.' fill="'.$color.'" width="100%" height="200" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 612 100" style="enable-background:new 0 0 612 100;" xml:space="preserve"><path d="M0,0h306h306v0L0,0L0,0z M0,50h612v50H0V50z M612,0.2L459.7,25L306,50L152.3,25L0,0.2V50h612L612,0.2L612,0.2z" /></svg>';
	}
	if ($settings->row_separator_style == 'slant-right') {
		$color = !empty($settings->row_separator_color) ? '#'.$settings->row_separator_color : '#333';
		if( $settings->row_separator_position == 'top') {
			$position = ' style="margin-bottom: -99px; transform: scaleY(-1); -webkit-transform: scaleY(-1);"';
		} else {
			$position = ' style="margin-top: -99px;"';
		}
		$output .='<svg'.$position.' fill="'.$color.'" version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"viewBox="0 0 1170 100" style="enable-background:new 0 0 1170 100;" width="100%" height="100" xml:space="preserve" preserveAspectRatio="none"><g><polygon points="1170,101 0,101 1170,0"/></g></svg>';
	}
	if ($settings->row_separator_style == 'slant-left') {
		$color = !empty($settings->row_separator_color) ? '#'.$settings->row_separator_color : '#333';
		if( $settings->row_separator_position == 'top') {
			$position = ' style="margin-bottom: -99px; transform: scaleY(-1); -webkit-transform: scaleY(-1);"';
		} else {
			$position = ' style="margin-top: -99px;"';
		}
		$output .='<svg'.$position.' fill="'.$color.'" version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"viewBox="0 0 1170 100" style="enable-background:new 0 0 1170 100;" xml:space="preserve" width="100%" height="100" preserveAspectRatio="none"><g><polygon points="0,101 1170,101 0,0"/></g></svg>';
	}
	if ($settings->row_separator_style == 'curved-right') {
		$color = !empty($settings->row_separator_color) ? '#'.$settings->row_separator_color : '#333';
		if( $settings->row_separator_position == 'top') {
			$position = ' style="margin-bottom: -99px;"';
		} else {
			$position = ' style="margin-top: -99px; transform: scaleY(-1); -webkit-transform: scaleY(-1);"';
		}
		$output .='<svg'.$position.' fill="'.$color.'" version="1.1" id="curveUpColor" xmlns="http://www.w3.org/2000/svg" x="0px"y="0px" viewBox="0 0 1170 100" style="enable-background:new 0 0 1170 100;" xml:space="preserve" width="100%" height="100" preserveAspectRatio="none"><path d="M-0.1,0L0,100.1c585-133.3,936.1-133.3,1170.1,0.1l0-100.2L-0.1,0z"/></svg>';
	}
	if ($settings->row_separator_style == 'curved-left') {
		$color = !empty($settings->row_separator_color) ? '#'.$settings->row_separator_color : '#333';
		if( $settings->row_separator_position == 'top') {
			$position = ' style="margin-bottom: -99px;"';
		} else {
			$position = ' style="margin-top: -99px; transform: scaleY(-1); -webkit-transform: scaleY(-1);"';
		}
		$output .='<svg'.$position.' fill="'.$color.'" version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px"y="0px" viewBox="0 0 1170 100" style="enable-background:new 0 0 1170 100;" xml:space="preserve" width="100%" height="100" preserveAspectRatio="none"><path d="M-0.1-0.1l0,100.2C233.9-33.2,585-33.3,1170,100.1L1170.1,0L-0.1-0.1z"/></svg>';
	}
	if ($settings->row_separator_style == 'bubbles') {
		$color = !empty($settings->row_separator_color) ? '#'.$settings->row_separator_color : '#333';
		if( $settings->row_separator_position == 'top') {
			$position = ' style="margin-bottom: -140px;"';
		} else {
			$position = ' style="margin-top: -140px; transform: scaleY(-1); -webkit-transform: scaleY(-1);"';
		}
		$output .='<svg'.$position.' fill="'.$color.'" version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"viewBox="0 0 1170 100" style="enable-background:new 0 0 1170 100;" xml:space="preserve"><path class="st0" d="M-0.1-0.1l1170.1,0.1l0,48.7c-11.7-3-24.9-9.2-38.6-20.3c0,0-22.2,18.9-58.6,11.1c-3.5,14.1-11.6,40.1-50.5,43.2s-58.6-22.6-62.2-30.8c-6.2,0.9-63.1,18.7-85.8-22.8c-5.9,11.5-45.5,25.2-64.3-0.4c-22.8,50.8-86.1,66.4-118.3,19c-13.8,2.3-43.9,5.7-56.4-15.3c-21.3,41.9-85.1,36.6-106.7,6.9c0,0-59.4,39.5-89.7-14.8c0,0-38.3,20-59.5-1.7c0,0-36.9,30.2-76.8,9.4c0,0-19.4,10.8-64.6,8.8c0,0-35.6,0.8-56.5-23.7c0,0-35.6,10.1-59.2-1.2c0,0-34.7,31.5-91.2,10.9c0,0-11.4,14.7-31.5,22.9L-0.1-0.1z"/></svg>';
	}
	if ($settings->row_separator_style == 'envelope') {
		$color = !empty($settings->row_separator_color) ? '#'.$settings->row_separator_color : '#333';
		if( $settings->row_separator_position == 'top') {
			$position = ' style="margin-bottom: -99px; transform: scaleY(-1); -webkit-transform: scaleY(-1);"';
		} else {
			$position = ' style="margin-top: -99px;"';
		}
		$output .='<svg'.$position.' version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"viewBox="0 0 1170 100" style="enable-background:new 0 0 1170 100;" xml:space="preserve" width="100%" height="100" preserveAspectRatio="none"><polygon fill="'.$color.'" points="1170.5,142 -0.5,101 -0.5,1 1170.5,42 "/><polygon fill="#59ABE3" points="51.3,17.6 16.1,16.4 20.4,5.9 55.7,7.2 "/><polygon fill="#D2527F" points="123.6,20.1 88.3,18.9 92.7,8.5 127.9,9.7 "/><polygon fill="#59ABE3" points="197.8,22.7 162.6,21.5 166.9,11.1 202.2,12.3 "/><polygon fill="#D2527F" points="270.1,25.3 234.8,24 239.2,13.6 274.4,14.8 "/><polygon fill="#59ABE3" points="343.8,27.9 308.6,26.6 312.9,16.2 348.2,17.4 "/><polygon fill="#D2527F" points="416.1,30.4 380.8,29.2 385.2,18.7 420.4,19.9 "/><polygon fill="#59ABE3" points="490.3,33 455.1,31.8 459.4,21.3 494.7,22.5 "/><polygon fill="#D2527F" points="562.6,35.5 527.3,34.3 531.7,23.8 566.9,25.1 "/><polygon fill="#59ABE3" points="635.8,38.1 600.6,36.8 604.9,26.4 640.1,27.6 "/><polygon fill="#D2527F" points="708.1,40.6 672.8,39.4 677.1,28.9 712.4,30.2 "/><polygon fill="#59ABE3" points="782.3,43.2 747.1,42 751.4,31.5 786.6,32.8 "/><polygon fill="#D2527F" points="854.6,45.7 819.3,44.5 823.6,34.1 858.9,35.3 "/><polygon fill="#59ABE3" points="928.3,48.3 893.1,47.1 897.4,36.6 932.6,37.9 "/><polygon fill="#D2527F" points="1000.6,50.9 965.3,49.6 969.6,39.2 1004.9,40.4 "/><polygon fill="#59ABE3" points="1074.8,53.5 1039.6,52.2 1043.9,41.8 1079.1,43 "/><polygon fill="#D2527F" points="1147.1,56 1111.8,54.7 1116.1,44.3 1151.4,45.5 "/></svg>';
	}
$output .='</div>';
echo $output;
?>
