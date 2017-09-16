<?php
 if ( ! defined( 'ABSPATH' ) ) { exit; } if ( ! class_exists( 'ReduxFramework_select_image' ) ) { class ReduxFramework_select_image { function __construct( $field = array(), $value = '', $parent ) { $this->parent = $parent; $this->field = $field; $this->value = $value; } function render() { if ( ! empty( $this->field['options'] ) ) { if ( isset( $this->value ) ) { $name = explode( ".", $this->value ); $name = str_replace( '.' . end( $name ), '', $this->value ); $name = basename( $name ); $filename = trim($name); } $x = 1; if ( ! empty( $this->field['width'] ) ) { $width = ' style="width:' . $this->field['width'] . ';"'; } else { $width = ' style="width: 40%;"'; } $placeholder = ( isset( $this->field['placeholder'] ) ) ? esc_attr( $this->field['placeholder'] ) : __( 'Select an item', 'redux-framework' ); if ( isset( $this->field['select2'] ) ) { $select2_params = json_encode( $this->field['select2'] ); $select2_params = htmlspecialchars( $select2_params, ENT_QUOTES ); echo '<input type="hidden" class="select2_params" value="' . $select2_params . '">'; } echo '<select data-id="' . $this->field['id'] . '" data-placeholder="' . $placeholder . '" name="' . $this->field['name'] . $this->field['name_suffix'] . '" class="redux-select-item redux-select-images ' . $this->field['class'] . '"' . $width . ' rows="6">'; echo '<option></option>'; foreach ( $this->field['options'] as $k => $v ) { if ( ! is_array( $v ) ) { $v = array( 'img' => $v ); } if ( ! isset( $v['title'] ) ) { $v['title'] = ''; } if ( ! isset( $v['alt'] ) ) { $v['alt'] = $v['title']; } $selected = selected( $this->value, $v['img'], false ); if ( '' != $selected ) { $arrNum = $x; } echo '<option value="' . $v['img'] . '" ' . $selected . '>' . $v['alt'] . '</option>'; $x ++; } echo '</select>'; echo '<br /><br />'; echo '<div>'; if ( ! isset( $arrNum ) ) { $this->value = ''; } if ( '' == $this->value ) { echo '<img src="#" class="redux-preview-image" style="visibility:hidden;" id="image_' . $this->field['id'] . '">'; } else { echo '<img src=' . $this->field['options'][ $arrNum - 1 ]['img'] . ' class="redux-preview-image" id="image_' . $this->field['id'] . '">'; } echo '</div>'; } else { echo '<strong>' . __( 'No items of this type were found.', 'redux-framework' ) . '</strong>'; } } function enqueue() { wp_enqueue_style( 'select2-css' ); wp_enqueue_script( 'field-select-image-js', ReduxFramework::$_url . 'inc/fields/select_image/field_select_image' . Redux_Functions::isMin() . '.js', array('jquery', 'select2-js', 'redux-js'), time(), true ); if ($this->parent->args['dev_mode']) { wp_enqueue_style( 'redux-field-select-image-css', ReduxFramework::$_url . 'inc/fields/select_image/field_select_image.css', array(), time(), 'all' ); } } } }