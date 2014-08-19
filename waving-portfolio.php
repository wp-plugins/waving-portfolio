<?php
/**
 * Waving Portfolio
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
 * Description: Free plugin with very slick design to professionally promote & present your job portfolio.
 * Version:     1.1.5
 * Author:      Abdulrhman Elbuni
 * Author URI:  http://www.itechflare.com/
 * Text Domain: portfolioposttype
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path: /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Required files for registering the post type and taxonomies.
require plugin_dir_path( __FILE__ ) . 'includes/waving-portfolio-type.php';
require plugin_dir_path( __FILE__ ) . 'includes/class-portfolio-post-type-registrations.php';
// Disabling setting page for the time being
// require plugin_dir_path( __FILE__ ) . 'includes/waving-setting.php';

// Instantiate registration class, so we can add it as a dependency to main plugin class.
$portfolio_post_type_registrations = new Portfolio_Post_Type_Registrations;

// Instantiate main plugin file, so activation callback does not need to be static.
$waving_portfolio = new Waving_Portfolio_Type( $portfolio_post_type_registrations );
// Register callback that is fired when the plugin is activated.
register_activation_hook( __FILE__, array( $waving_portfolio, 'activate' ) );

// Initialise registrations for post-activation requests.
$portfolio_post_type_registrations->init();

add_theme_support( 'post-thumbnails' );

/**
 * Adds styling to the dashboard for the post type and adds portfolio posts
 * to the "At a Glance" metabox.
 *
 * Adds custom taxonomy body classes to portfolio posts on the front end.
 */

if ( is_admin() ) {
	// Loads for users viewing the WordPress dashboard
	if ( ! class_exists( 'Gamajo_Dashboard_Glancer' ) ) {
		require plugin_dir_path( __FILE__ ) . 'includes/class-gamajo-dashboard-glancer.php';  // WP 3.8
	}
	if ( ! class_exists( 'Gamajo_Dashboard_RightNow' ) ) {
		require plugin_dir_path( __FILE__ ) . 'includes/class-gamajo-dashboard-rightnow.php'; // WP 3.7
	}
	require plugin_dir_path( __FILE__ ) . 'includes/class-portfolio-post-type-admin.php';
	$portfolio_post_type_admin = new Portfolio_Post_Type_Admin( $portfolio_post_type_registrations );
	$portfolio_post_type_admin->init();
} else {
	// Loads for users viewing the front end
	if ( apply_filters( 'portfolioposttype_add_taxonomy_terms_classes', true ) ) {
		if ( ! class_exists( 'Gamajo_Single_Entry_Term_Body_Classes' ) ) {
			require plugin_dir_path( __FILE__ ) . 'includes/class-gamajo-single-entry-term-body-classes.php';
		}
		$portfolio_post_type_body_classes = new Gamajo_Single_Entry_Term_Body_Classes;
		$portfolio_post_type_body_classes->init( 'portfolio' );
	}
}

// Initialize controller
//
//$waving_controller = new Waving_Controller( );
        
// [waving effect="value"]
function waving_func( $atts ) {
        extract( shortcode_atts( array(
                'effect' => 12,
                'width' => 0,
                'height' => 250,
                'theme'=> 'dark', 
                'all' => 'true',
				'clicking' => 'true',
                'showcat' => 'true',
                'tag' => ''),
                $atts ) );
        return Building_Portfolio_List($width, $height, $effect,$theme,$tag, $showcat, $all, $clicking);
}

add_shortcode( 'waving', 'waving_func');

// Enqueue scripts

function my_scripts_method() {
    
  $params = array(
      'loadingImageSrc' => plugins_url( 'assets/images/loading.gif' , __FILE__ ),
      'closeImageSrc' => plugins_url( 'assets/images/closelabel.gif' , __FILE__ ),
      );
  
  // Loading waving hover effect scripts
	wp_enqueue_script(
		'waving-hover-script',
		plugins_url( 'assets/js/jquery.hoverdir.js' , __FILE__ ),
		array( 'jquery' )
	);
        wp_enqueue_script(
		'modernizer-script',
		plugins_url( 'assets/js/modernizr.custom.97074.js' , __FILE__ )
	);
        
        // Loading lightbox effect script
        wp_enqueue_script(
		'lightbox-script',
		plugins_url( 'assets/js/jquery.lightbox.js' , __FILE__ )
	);

        wp_enqueue_style( 'waving-default',
                plugins_url( 'assets/css/style.css' , __FILE__ ));
        wp_enqueue_style( 'lightbox-default',
                plugins_url( 'assets/css/lightbox.css' , __FILE__ ));
        wp_enqueue_style( 'modal-default',
                plugins_url( 'assets/css/modal.css' , __FILE__ ));
        
        wp_register_script('my-custom-script', 
                plugins_url( 'assets/js/custom.js' , __FILE__ ),'','1.1', true);
        
        
        wp_enqueue_script(
		'classie-script',
		plugins_url( 'assets/js/classie.js' , __FILE__ ),'','',true
	);
        wp_enqueue_script(
		'modal-script',
		plugins_url( 'assets/js/modalEffects.js' , __FILE__ ),'','',true
	);
        
        wp_localize_script( 'lightbox-script', 'pluginSetting', $params );
        wp_enqueue_script('my-custom-script');


}

function Building_Portfolio_List($width, $height, $fx, $theme, $tag, $showCategory,$all, $click)
{
	if($click == "true") $disableClicking = 'class="md-trigger"';
	else $disableClicking = '';
	
    $lists = array();
    $modals = array();
    $paramCustom = array();
    $categoryMenu = array();
    // Filtered category list
    $cat_lists = array();
    
    // Get portfolio posts
    $type = 'portfolio';
    
    // Check whether tag is empty or not
    $tagCondition = ($tag=='')?null:$tag;
    
    $listHeader = '<section style="text-align:center"><ul id="da-thumbs" class="da-thumbs-'.$tagCondition.'">';
    $listFooter = '</ul></section>';
    
    $i = 1;
        
    $args=array(
      'post_type' => $type,
      'post_status' => 'publish',
      'posts_per_page' => -1,
      'portfolio_tag' => $tagCondition,
      'cache_results' => false);

	if($theme == 'light')
	{
		wp_enqueue_style( 'modal-light-theme',
                plugins_url( 'assets/css/light.css' , __FILE__ ));
	}

 // print out categories
  $taxonomy = 'portfolio_category';
  $image_code = '';
 
    $my_query = null;
    $my_query = new WP_Query($args);
    if( $my_query->have_posts() ) {
        while ($my_query->have_posts()) : $my_query->the_post(); 
            
			$i = rand(); 
			
            // Initialize categories to be used for categories menu rendering
           $temp_cat_cmp_array[] = get_the_terms( get_the_ID(),$taxonomy);
           
           // ========= Start: Ensure that cat_list variable is unique ============
           
           if(count($temp_cat_cmp_array) != 0 && $temp_cat_cmp_array[0] != null){
            foreach($temp_cat_cmp_array[0] as $cat_cmp)
            {
              $cmp_result = false;
              if(count($cat_lists) != 0){
                foreach($cat_lists as $cat_val)
                {
                  if($cat_val == $cat_cmp)
                  {
                    $cmp_result = true;
                  }
                }
              }
              if(!$cmp_result)
              {
                array_push($cat_lists, $cat_cmp);
              }
            }
           }
           unset($temp_cat_cmp_array);
           $temp_cat_cmp_array = array();
           
           // ========= End: Ensure that cat_list variable is unique ============
           
            $image = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID() ), 'single-post-thumbnail' );    
            // IF there is no image don't render a list
            if($image!=""){
                $gImages = get_post_gallery_images(get_the_ID());
                $gallary = "";
                
                // Building the gallary
                if(!empty($gImages) ){
                    $j=1;
                    foreach($gImages as $img){
                        $gallary = $gallary.'<a href="'.$img.'" class="lightbox" rel="portfolios'.$i.'"><img class="multiple-borders" src="'.$img.'" width="100" /></a>';
                    }
                }
                
                $modal = '<div class="md-modal md-effect-12" id="modal-'.$i.'">
                  <div id="md-close" class="waving-close"></div>
                  <div class="md-content">
                    <h3>'.  get_the_title().'</h3>
                      <div class="modal-gallary">
                        '.$gallary.'<br/><br/>
                      </div>
                    <div class="modal-waving-content">'.get_the_content().'</div>
                  </div>
                  </div>';
                
                $categories = get_the_terms( get_the_ID(),$taxonomy);
                $cat_class = "";
                if( $categories ){
                  foreach($categories as $cat)
                  {
                    $cat_class = $cat_class. " waving-" . $cat->slug;
                  }
                }
                
                if($width != 0){
                  $image_code = '<img src="'.$image[0].'" style="width:'.$width.'px" />';
                }else
                {
                  $image_code = '<img src="'.$image[0].'" style="height:'.$height.'px" >';
                }
                
                $list = '<li class="waving-item '.$cat_class.'">
                        <a '.$disableClicking.' data-modal="modal-'.$i.'">
                                '.$image_code.'
                                <div style="display: block; left: 100%; top: 0px; overflow: hidden; -webkit-transition: all 300ms ease; transition: all 300ms ease;"><span>'.get_the_title().'</span></div>
                        </a>
                </li>';
                array_push($modals, $modal);
                array_push($lists, $list);
                $i++;
            }
        endwhile;
    }
    wp_reset_query();
    
    // ========= Start: Print out categories ============
    if(count($cat_lists)!=0){
      $paramCustom = array("all" => $all,
        "initialClass"=>$cat_lists[0]->slug);
    }else{
      $paramCustom = array("all" => "1",
        "initialClass"=>"0");
    }

    if($all == "true" && count($cat_lists)!=0)
    {
      $categoryMenu[] = '<button class="waving-button" onClick="ShowLists(\'all\',\''.$tagCondition.'\')">All</button>';
    }

    if(count($cat_lists)!=0){
      foreach($cat_lists as $term_cat)
      {
        $categoryMenu[] = '<button class="waving-button" onClick="ShowLists(\''.$term_cat->slug.'\',\''.$tagCondition.'\')">'.$term_cat->name.'</button>';
      }
    }

    // ========= End: Print out categories ============
    
    $static = '<div class="md-overlay"></div><div id="waving-dim"></div>';
    
    wp_localize_script( 'my-custom-script', 'pluginSetting', $paramCustom );
    
    $catMenu = ($showCategory=="true")?implode("",$categoryMenu):'';
    
    return $catMenu.''.implode("",$modals).''.$listHeader.''.implode("",$lists).''.$listFooter.''.$static;
}

add_action( 'wp_enqueue_scripts', 'my_scripts_method' );

// Setting gallary attributes to full size by Default
function amethyst_gallery_atts( $out, $pairs, $atts ) {
   
    $atts = shortcode_atts( array(
        'columns' => '2',
        'size' => 'full',
         ), $atts );

    $out['columns'] = $atts['columns'];
    $out['size'] = $atts['size'];

    return $out;

}
add_filter( 'shortcode_atts_gallery', 'amethyst_gallery_atts', 10, 3 );