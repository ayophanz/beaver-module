<?php
$column = ( $settings->column <> '' ) ? $settings->column : 'column-4';
echo '<div class="'.$module->get_classname().' columns '.$column.'">';
if(!empty($settings->sidebar)) {
	if(!dynamic_sidebar($settings->sidebar)) {
		dynamic_sidebar();
	}
}
echo '</div>';