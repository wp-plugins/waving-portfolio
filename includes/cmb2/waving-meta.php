<?php
/**
 * Include and setup custom metaboxes and fields. (make sure you copy this file to outside the CMB directory)
 *
 *
 * @category waving-portfolio
 * @package  Metaboxes
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 */

/**
 * Get the bootstrap! If using the plugin from wordpress.org, REMOVE THIS!
 */

if ( file_exists( dirname( __FILE__ ) . '/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/init.php';
} elseif ( file_exists( dirname( __FILE__ ) . '/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/init.php';
}

add_action( 'cmb2_init', 'waving_posrtfolio_register_metabox' );
/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_init' hook.
 */
function waving_posrtfolio_register_metabox() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_waving_portfolio_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$cmb_demo = new_cmb2_box( array(
		'id'            => $prefix . 'metabox',
		'title'         => __( 'Waving Portfolio', 'cmb2' ),
		'object_types'  => array( 'itech_portfolio'), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // true to keep the metabox closed by default
	) );

	$cmb_demo->add_field( array(
		'name'         => __( 'Select gallary images', 'cmb2' ),
		'desc'         => __( 'Upload or add multiple images to be shown inside of your portfolio element', 'cmb2' ),
		'id'           => $prefix . 'file_list',
		'type'         => 'file_list',
		'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
	) );
    
    $cmb_demo->add_field( array(
      'name' => __( 'Title font size', 'cmb2' ),
      'desc' => __( 'Sliding panel title font size', 'cmb2' ),
      'id'   => $prefix . 'fontsize',
      'type' => 'text_small',
      'default' => '15',
      'attributes' => array(
          'type' => 'number',
          'pattern' => '\d*',
          'min' => '8',
          'max' => '50',
      )
    ) ); 
    
    $cmb_demo->add_field( array(
      'name' => __( 'Sliding panel excerpt length', 'cmb2' ),
      'desc' => __( 'Number of characters in excerpt', 'cmb2' ),
      'id'   => $prefix . 'excerpt_length',
      'type' => 'text_small',
      'default' => '20',
      'attributes' => array(
          'type' => 'number',
          'pattern' => '\d*',
          'min' => '8',
          'max' => '50',
      )
    ) ); 
    
    $cmb_demo->add_field( array(
		'name' => __( 'Hyperlink', 'cmb2' ),
		'desc' => __( 'Portfolio item hyperlink', 'cmb2' ),
		'id'   => $prefix . 'hyperlink',
		'type' => 'text_url',
	) );
    
    $cmb_demo->add_field( array(
		'name' => __( 'On click over sliding panel', 'cmb2' ),
		'desc' => __( 'Redirect to hyperlink [Check] or Modal window [Uncheck]', 'cmb2' ),
		'id'   => $prefix . 'hori',
		'type' => 'checkbox',
	) );
    
    $cmb_demo->add_field( array(
		'name' => __( 'Enable description', 'cmb2' ),
		'desc' => __( 'Enable excerpt in sliding panel', 'cmb2' ),
		'id'   => $prefix . 'excerpt',
		'type' => 'checkbox',
	) );

}
