<?php
/**
 * Portfolio Post Type
 *
 * @package   Portfolio_Post_Type
 * @author    Devin Price
 * @author    Gary Jones
 * @license   GPL-2.0+
 * @link      http://wptheming.com/portfolio-post-type/
 * @copyright 2011-2013 Devin Price
 */

/**
 * Register post types and taxonomies.
 *
 * @package Portfolio_Post_Type
 * @author  Devin Price
 * @author  Gary Jones
 */
class Portfolio_Post_Type_Registrations {

    public $post_type = 'itech_portfolio';
    public $c_post_type = 'Portfolio';

	public $taxonomies = array( 'waving_category', 'waving_tag' );

	public function init() {
		// Add the portfolio post type and taxonomies
		add_action( 'init', array( $this, 'register' ) );
	}

	/**
	 * Initiate registrations of post type and taxonomies.
	 *
	 * @uses Portfolio_Post_Type_Registrations::register_post_type()
	 * @uses Portfolio_Post_Type_Registrations::register_taxonomy_tag()
	 * @uses Portfolio_Post_Type_Registrations::register_taxonomy_category()
	 */
	public function register() {
		$this->register_post_type();
		$this->register_taxonomy_tag();
	}

	/**
	 * Register the custom post type.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/register_post_type
	 */
	protected function register_post_type() {
		$labels = array(
			'name'               => __( $this->c_post_type, 'waving-post-type' ),
			'singular_name'      => __( $this->c_post_type.' Item', 'waving-post-type' ),
			'add_new'            => __( 'Add New Item', 'waving-post-type' ),
			'add_new_item'       => __( 'Add New '.$this->c_post_type.' Item', 'waving-post-type' ),
			'edit_item'          => __( 'Edit '.$this->c_post_type.' Item', 'waving-post-type' ),
			'new_item'           => __( 'Add New '.$this->c_post_type.' Item', 'waving-post-type' ),
			'view_item'          => __( 'View Item', 'waving-post-type' ),
			'search_items'       => __( 'Search '.$this->c_post_type.'', 'waving-post-type' ),
			'not_found'          => __( 'No '.$this->c_post_type.' items found', 'waving-post-type' ),
			'not_found_in_trash' => __( 'No '.$this->c_post_type.' items found in trash', 'waving-post-type' ),
		);

		$supports = array(
			'title',
          	'editor',
//          'excerpt',
			'thumbnail',
//			'comments',
			'author',
//          'custom-fields',
//			'revisions',
		);

		$args = array(
			'labels'          => $labels,
			'supports'        => $supports,
			'public'          => true,
			'capability_type' => 'post',
			'rewrite'         => array( 'slug' => 'waving', ), // Permalinks format
			'menu_position'   => 5,
			'menu_icon'       => ( version_compare( $GLOBALS['wp_version'], '3.8', '>=' ) ) ? 'dashicons-portfolio' : '',
			'has_archive'     => true,
		);

		$args = apply_filters( 'wavingposttype_args', $args );

		register_post_type( $this->post_type, $args );
	}

	/**
	 * Register a taxonomy for '.$this->c_post_type.' Categories.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/register_taxonomy
	 */
	protected function register_taxonomy_category() {
		$labels = array(
			'name'                       => __( $this->c_post_type.' Categories', 'waving-post-type' ),
			'singular_name'              => __( $this->c_post_type.' Category', 'waving-post-type' ),
			'menu_name'                  => __( $this->c_post_type.' Categories', 'waving-post-type' ),
			'edit_item'                  => __( 'Edit '.$this->c_post_type.' Category', 'waving-post-type' ),
			'update_item'                => __( 'Update '.$this->c_post_type.' Category', 'waving-post-type' ),
			'add_new_item'               => __( 'Add New '.$this->c_post_type.' Category', 'waving-post-type' ),
			'new_item_name'              => __( 'New '.$this->c_post_type.' Category Name', 'waving-post-type' ),
			'parent_item'                => __( 'Parent '.$this->c_post_type.' Category', 'waving-post-type' ),
			'parent_item_colon'          => __( 'Parent '.$this->c_post_type.' Category:', 'waving-post-type' ),
			'all_items'                  => __( 'All '.$this->c_post_type.' Categories', 'waving-post-type' ),
			'search_items'               => __( 'Search '.$this->c_post_type.' Categories', 'waving-post-type' ),
			'popular_items'              => __( 'Popular '.$this->c_post_type.' Categories', 'waving-post-type' ),
			'separate_items_with_commas' => __( 'Separate waving categories with commas', 'waving-post-type' ),
			'add_or_remove_items'        => __( 'Add or remove waving categories', 'waving-post-type' ),
			'choose_from_most_used'      => __( 'Choose from the most used waving categories', 'waving-post-type' ),
			'not_found'                  => __( 'No waving categories found.', 'waving-post-type' ),
		);

		$args = array(
			'labels'            => $labels,
			'public'            => true,
			'show_in_nav_menus' => true,
			'show_ui'           => true,
			'show_tagcloud'     => true,
			'hierarchical'      => true,
			'rewrite'           => array( 'slug' => 'waving_portfolio_category' ),
			'show_admin_column' => true,
			'query_var'         => true,
		);

		$args = apply_filters( 'wavingposttype_category_args', $args );

		register_taxonomy( $this->taxonomies[0], $this->post_type, $args );
	}

	/**
	 * Register a taxonomy for'.$this->c_post_type.'Tags.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/register_taxonomy
	 */
	protected function register_taxonomy_tag() {
		$labels = array(
			'name'                       => __( $this->c_post_type.' Tags', 'waving-post-type' ),
			'singular_name'              => __( $this->c_post_type.' Tag', 'waving-post-type' ),
			'menu_name'                  => __( $this->c_post_type.' Tags', 'waving-post-type' ),
			'edit_item'                  => __( 'Edit '.$this->c_post_type.' Tag', 'waving-post-type' ),
			'update_item'                => __( 'Update '.$this->c_post_type.' Tag', 'waving-post-type' ),
			'add_new_item'               => __( 'Add New '.$this->c_post_type.' Tag', 'waving-post-type' ),
			'new_item_name'              => __( 'New '.$this->c_post_type.' Tag Name', 'waving-post-type' ),
			'parent_item'                => __( 'Parent '.$this->c_post_type.' Tag', 'waving-post-type' ),
			'parent_item_colon'          => __( 'Parent '.$this->c_post_type.' Tag:', 'waving-post-type' ),
			'all_items'                  => __( 'All '.$this->c_post_type.' Tags', 'waving-post-type' ),
			'search_items'               => __( 'Search '.$this->c_post_type.' Tags', 'waving-post-type' ),
			'popular_items'              => __( 'Popular '.$this->c_post_type.' Tags', 'waving-post-type' ),
			'separate_items_with_commas' => __( 'Separate waving tags with commas', 'waving-post-type' ),
			'add_or_remove_items'        => __( 'Add or remove waving tags', 'waving-post-type' ),
			'choose_from_most_used'      => __( 'Choose from the most used waving tags', 'waving-post-type' ),
			'not_found'                  => __( 'No waving tags found.', 'waving-post-type' ),
		);

		$args = array(
			'labels'            => $labels,
			'public'            => true,
			'show_in_nav_menus' => true,
			'show_ui'           => true,
			'show_tagcloud'     => true,
			'hierarchical'      => false,
			'rewrite'           => array( 'slug' => 'waving_portfolio_category' ),
			'show_admin_column' => true,
			'query_var'         => true,
		);

		$args = apply_filters( 'wavingposttype_tag_args', $args );

		register_taxonomy( $this->taxonomies[1], $this->post_type, $args );

	}
}
