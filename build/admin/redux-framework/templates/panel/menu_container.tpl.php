<?php
 ?>
<div class="redux-sidebar">
    <ul class="redux-group-menu">
<?php
 foreach ( $this->parent->sections as $k => $section ) { $title = isset ( $section[ 'title' ] ) ? $section[ 'title' ] : ''; $skip_sec = false; foreach ( $this->parent->hidden_perm_sections as $num => $section_title ) { if ( $section_title == $title ) { $skip_sec = true; } } if ( isset ( $section[ 'customizer_only' ] ) && $section[ 'customizer_only' ] == true ) { continue; } if ( false == $skip_sec ) { echo $this->parent->section_menu ( $k, $section ); $skip_sec = false; } } do_action ( "redux-page-after-sections-menu-{$this->parent->args[ 'opt_name' ]}", $this ); do_action ( "redux/page/{$this->parent->args[ 'opt_name' ]}/menu/after", $this ); ?>
    </ul>
</div>