<?php
/*
				'field_name'   => array(
					'type'          => 'radio',
					'label'         => __( 'Graph Type', 'textdomain' ),
					'default'       => 'Line',
					'options'       => array(
						'Line'      => __( 'Line', 'textdomain' ),
						'Bar'      => __( 'Bar', 'textdomain' ),
						'Radar'     => __( 'Radar', 'textdomain'),
					),
					'toggle'      => array (
						'Line'      => array (
						'fields'    => array ( 'usebeziers', 'beziercurvetension' ),
					 ),
						'Bar'          => array (),
						'Radar'          => array (),
					),
					'hide'        => array(),
					'trigger'      => array(),
					'oncolor'        => '#46a9eb',
					'offcolor'         => '#eeeeee',
				),
*/
add_action('fl_builder_control_radio', 'radio_field', 1, 3);
function radio_field( $name , $value , $field ) {
  $field = array_merge(
      array( 'settings' => array(
        'oncolor' => '#e4e4e4' ,
        'offcolor' => '#a5dc86' ,
      )
    ) , $field );

  $buttoncount = count($field['options']);

?>
<div class="radio-field">
  <style>
	.radio-field .<?php echo $name; ?> {
		background-color: <?php echo $field['offcolor']; ?>;
	}
	.radio-field  .<?php echo $name; ?>:checked + .<?php echo $name; ?> {
		background-color: <?php echo $field['oncolor']; ?>;
	}
  </style>
<?php
  foreach ( $field[ 'options' ] as $key => $option ) {

    $checked = '';
    if ( isset( $value ) && $key == $value ) {
      $checked = 'checked';
    } elseif ( !isset( $value ) && $key == $field[ 'default' ] ) {
      $checked = 'checked';
    }

    $radio = isset( $field[ 'radio' ][ $key ]) ? 'data-radio=\''. json_encode( $field[ 'radio' ] ) . '\'' : '';
    $hide = isset( $field[ 'hide' ][ $key ]) ? 'data-hide="'. json_encode( $field[ 'hide' ] ) . '"' : '';
    $trigger = isset( $field[ 'trigger' ][ $key ] )? 'data-trigger="'. json_encode( $field[ 'trigger' ] ) . '"' : '';

    $html  = sprintf( '<input type="radio" class="%s" id="%s" name="%s" value="%s" %s' , $name , $name . '_' . $key , $name , $key , $checked);
    $html .= sprintf( ' %s %s %s />' , $radio , $hide , $trigger );
    $html .= sprintf( '<label class="%s" for="%s">%s</label>' , $name , $name . '_' . $key , $option );
    echo $html;
  }
?>
</div>
<?php
}
add_action( 'wp_enqueue_scripts', 'radio_scripts' );
function radio_scripts() {
  if ( class_exists( 'FLBuilderModel' ) && FLBuilderModel::is_builder_active() ) {
	  wp_enqueue_style( 'radio_input', FL_MODULE_THEME_URL . 'fields/radio/radio.css', array(), '' );
	  wp_enqueue_script( 'radio_input', FL_MODULE_THEME_URL . 'fields/radio/radio.js', array(), '' );
  }
}
