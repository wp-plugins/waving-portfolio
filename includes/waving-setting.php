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
 * Version:     1.0.2
 * Author:      Abdulrhman Elbuni
 * Author URI:  http://www.itechflare.com/
 * Text Domain: portfolioposttype
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path: /languages
 */

class Waving_Setting
{
    /**
     * Holds the values to be used in the fields callbacks
     */
    private $options;

    /**
     * Start up
     */
    public function __construct()
    {
        add_action( 'admin_init', array( $this, 'page_init' ) );
        add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );
    }

    /**
     * Add options page
     */
    public function add_plugin_page()
    {
        // This page will be under "Settings"
        add_options_page(
            'Waving Portfolio Setting', 
            'Waving Portfolio Setting', 
            'manage_options', 
            'waving-setting-admin', 
            array( $this, 'create_admin_page' )
        );
    }

    /**
     * Options page callback
     */
    public function create_admin_page()
    {
        // Set class property
        $this->options = get_option( 'waving_option' );
        ?>
        <div class="wrap">
            <?php screen_icon(); ?>
            <h2>Waving Portfolio Settings</h2>           
            <form method="post" action="options.php">
            <?php
                // This prints out all hidden setting fields
                settings_fields( 'waving_option_group' );   
                do_settings_sections( 'waving-setting-admin' );
                submit_button(); 
            ?>
            </form>
        </div>
        <?php
    }

    /**
     * Register and add settings
     */
    public function page_init()
    {        
        register_setting(
            'waving_option_group', // Option group
            'waving_option', // Option name
            array( $this, 'sanitize' ) // Sanitize
        );

        add_settings_section(
            'setting_section_id', // ID
            'Color Preference', // Title
            array( $this, 'print_section_info' ), // Callback
            'waving-setting-admin' // Page
        );  

        add_settings_field(
            'background_color', // ID
            'Background Color', // Title 
            array( $this, 'background_color_callback' ), // Callback
            'waving-setting-admin', // Page
            'setting_section_id' // Section           
        );      

        add_settings_field(
            'title', 
            'Title', 
            array( $this, 'title_callback' ), 
            'waving-setting-admin', 
            'setting_section_id'
        );      
    }

    /**
     * Sanitize each setting field as needed
     *
     * @param array $input Contains all settings fields as array keys
     */
    public function sanitize( $input )
    {
        $new_input = array();
        if( isset( $input['background_color'] ) )
            $new_input['background_color'] = sanitize_text_field( $input['background_color'] );

        if( isset( $input['title'] ) )
            $new_input['title'] = sanitize_text_field( $input['title'] );

        return $new_input;
    }

    /** 
     * Print the Section text
     */
    public function print_section_info()
    {
        print 'Enter your settings below:';
    }

    /** 
     * Get the settings option array and print one of its values
     */
    public function background_color_callback()
    {
        printf(
            '<input type="color" id="background_color" name="waving_option[background_color]" value="%s" />',
            isset( $this->options['background_color'] ) ? esc_attr( $this->options['background_color']) : ''
        );
    }

    /** 
     * Get the settings option array and print one of its values
     */
    public function title_callback()
    {
        printf(
            '<input type="text" id="title" name="waving_option[title]" value="%s" />',
            isset( $this->options['title'] ) ? esc_attr( $this->options['title']) : ''
        );
    }
}

if( is_admin() )
    $my_settings_page = new Waving_Setting();