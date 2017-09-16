<?php
 if ( ! defined( 'ABSPATH' ) ) { exit; } if ( ! class_exists( 'ReduxFramework_textarea' ) ) { class ReduxFramework_textarea { function __construct( $field = array(), $value = '', $parent ) { $this->parent = $parent; $this->field = $field; $this->value = $value; } function render() { $this->field['placeholder'] = isset( $this->field['placeholder'] ) ? $this->field['placeholder'] : ""; $this->field['rows'] = isset( $this->field['rows'] ) ? $this->field['rows'] : 6; $readonly = ( isset( $this->field['readonly'] ) && $this->field['readonly']) ? ' readonly="readonly"' : ''; ?>
                <textarea <?php echo $readonly; ?> name="<?php echo esc_attr($this->field['name'] . $this->field['name_suffix']); ?>" id="<?php echo $this->field['id']; ?>-textarea" placeholder="<?php echo esc_attr( $this->field['placeholder'] ); ?>" class="large-text <?php echo esc_attr($this->field['class']); ?>" rows="<?php echo esc_attr($this->field['rows']); ?>"><?php echo esc_textarea( $this->value ); ?></textarea>
            <?php
 } function sanitize( $field, $value ) { if ( ! isset( $value ) || empty( $value ) ) { $value = ""; } else { $value = esc_textarea( $value ); } return $value; } } }