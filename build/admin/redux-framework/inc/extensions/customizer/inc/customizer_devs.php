<?php
 if ( ! class_exists( 'Redux_Customizer_Control_rAds' ) && ! class_exists( 'Redux_Customizer_section_rAds' ) ) { class Redux_Customizer_section_rAds extends WP_Customize_Section { public $type = 'redux-rAds'; protected function render() { ?>
                    <li id="accordion-section-<?php echo esc_attr( $this->id ); ?>" class="accordion-section rAdsContainer"></li>
                <?php
 } } class Redux_Customizer_Control_rAds extends WP_Customize_Control { public function render() { } public function label() { } public function description() { } public function title() { } } }