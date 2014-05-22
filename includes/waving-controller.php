<?php

/**
 * Waving Portfolio Controller
 *
 * @package   waving_portfolio
 * @author    Abdulrhman Elbuni
 * @license   GPL-2.0+
 * @link      http://www.itechflare.com/
 * @copyright 2014-2015 iTechFlare
 *
 * @wordpress-plugin
 * Plugin Name: Waving Portfolio
 * Plugin URI:  http://www.itechflare.com/
 * Description: Enables a portfolio post type and taxonomies.
 * Version:     1.0.1
 * Author:      Abdulrhman Elbuni
 * Author URI:  http://www.itechflare.com/
 * Text Domain: portfolioposttype
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path: /languages
 */

class Waving_Controller {

	public function __construct( ) {
		$this->init();
	}

	private function init() {
            add_shortcode( 'waving', 'waving_func' );
        }
        
        // [bartag foo="foo-value"]
        public function waving_func( $atts ) {
                extract( shortcode_atts( array(
                        'effect' => ''), $atts ) );

                echo "foo = {$effect}";
        }
}

?>
