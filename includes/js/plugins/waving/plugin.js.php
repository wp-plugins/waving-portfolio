<?php

// Include wp-load
$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );
  
// Act as a javascript file
header('Content-Type: application/javascript');

$path = realpath('../../../get-custom-post-list.php');

$wavingPostPath = plugin_dir_url($path );

?>

var my_editor = null;

tinymce.PluginManager.add('waving', function(editor) {

    my_editor = editor;

	my_editor.addCommand('OpenClosifyWindow', function() {
		// editor.execCommand('mceInsertContent', false, '<div>hello</div>');
        my_editor.windowManager.open({
            title: 'Generate Waving Portfolio Shortcode',
            url: '<?php echo $wavingPostPath.'get-custom-post-list.php'; ?>',
            width: 650,
            height: 500,
            buttons: [{
                text: 'Close',
                onclick: 'close',
            }]
            },{
              post_type: 'itech_portfolio'
          });
	});

	my_editor.addButton('waving', {
		icon: 'waving icon dashicons-wordpress',
		tooltip: 'Waving Portfolio Builder',
		cmd: 'OpenClosifyWindow'
	});

	my_editor.addMenuItem('waving', {
		icon: 'waving icon dashicons-wordpress',
		text: 'Waving Portfolio Builder',
		cmd: 'OpenClosifyWindow',
		context: 'insert'
	});
});

function insert_data(data){

    my_editor.selection.setContent(data);
}