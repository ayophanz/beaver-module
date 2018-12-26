<?php
/**
 * Custom fields - switch
 */
add_action('fl_builder_control_switch', 'fl_switch_field', 1, 5);
function fl_switch_field($name, $value, $field, $settings) {
	if (array_key_exists('options', $field)) {
        $options = $field['options'];
        $keys = array_keys($options);
        $option_0 = $keys[0];
        $option_1 = $keys[1];
        $option_0_label = $options[$option_0];
        $option_1_label = $options[$option_1];	
	
    } else {
        $option_0 = 'yes';
        $option_1 = 'no';
        $option_0_label = 'Yes';
        $option_1_label = 'No';
    }
    echo '<div class="onoffswitch">';
		if ( $value == $option_0 ) {
			$checked = ' checked';
		} else {
			$checked = '';
		}
		echo '<input type="checkbox" id="'.$name.'-box" name="'.$name.'-box" class="onoffswitch-checkbox"'.$checked.' onclick="myFunction()">';
		echo '<label for="'.$name.'-box" class="onoffswitch-label"></label>';
    echo '</div>';
	$classes = $field['class'] <> '' ? $field['class'] : '';
	$classes .= $field['size'] <> '' ? $field['size'] : ' text-full';
	echo '<input type="hidden" id="'.$name.'" name="'.$name.'" value="'.$value.'" class="text'.$classes.'">';
	$output = '
		<script> 
			function myFunction() { 
				var input = document.getElementById("'.$name.'-box");
				var a = input.checked ? "'.$option_0.'" : "'.$option_1.'";
				document.getElementById("'.$name.'-box").value = a;
				document.getElementById("'.$name.'").value = a;
			}
		</script>
	';
}
add_action( 'wp_enqueue_scripts', 'fl_switch' );
function fl_switch() {
    if ( class_exists( 'FLBuilderModel' ) && FLBuilderModel::is_builder_active() ) {
        wp_enqueue_style( 'fl-switch-fields', FL_MODULE_THEME_URL.'fields/switch/switch.css', array(), '' );
    }
}
?>