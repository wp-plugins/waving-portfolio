<?php


// add new buttons
add_filter('mce_buttons', 'myplugin_register_buttons');

function myplugin_register_buttons($buttons) {
   array_push($buttons, 'separator', 'waving');
   return $buttons;
}
 
// Load the TinyMCE plugin : editor_plugin.js (wp2.5)
add_filter('mce_external_plugins', 'waving_register_tinymce_javascript');

function waving_register_tinymce_javascript($plugin_array) {
   $plugin_array['waving'] = plugins_url( 'js/plugins/waving/plugin.js.php' , __FILE__ );
   return $plugin_array;
}

?>
