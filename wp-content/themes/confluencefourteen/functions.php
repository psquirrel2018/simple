<?php

//require_once( dirname(__FILE__) . '/lib/menu.php');
require_once( dirname(__FILE__) . '/lib/theme-options-cmb.php');
//require_once( dirname(__FILE__) . '/lib/font-option-functions.php');
require_once( dirname(__FILE__) . '/lib/slider-functions.php');
require_once( dirname(__FILE__) . '/lib/front-page-functions.php');
require_once( dirname(__FILE__) . '/lib/bootstrap-navwalker.php');
require_once( dirname(__FILE__) . '/lib/aq_resizer.php');
require_once( dirname(__FILE__) . '/lib/menu2.php');
require_once( dirname(__FILE__) . '/lib/widgets.php');
require_once( dirname(__FILE__) . '/lib/beer-function.php');
require_once( dirname(__FILE__) . '/lib/places-meta.php');

////////////////////////////////////////////////////////////////////
// Enqueue Styles (normal style.css and bootstrap.css)
////////////////////////////////////////////////////////////////////

add_action( 'wp_enqueue_scripts', 'confluence18_scripts');
function confluence18_scripts(){
    wp_enqueue_script('jQ', '//code.jquery.com/jquery-3.3.1.js', array(), '1.0.0', true );
    wp_enqueue_script('bootstrap4', '//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js', array(), '1.0.0', true );
    wp_enqueue_script('imagesloaded.pkgd.min', get_template_directory_uri() . '/js/imagesloaded.pkgd.min.js', array(), '1.0.0', true );
    wp_enqueue_script('jquery.superslides.min', get_template_directory_uri() . '/js/jquery.superslides.min.js', array(), '1.0.0', true );
    wp_enqueue_script('owl.carousel.min', get_template_directory_uri() . '/js/owl.carousel.min.js', array(), '1.0.0', true );
    wp_enqueue_script('settings', get_template_directory_uri() . '/js/settings.js', array(), '1.0.0', true );
}

function confluence18_theme_styles() {
    //wp_enqueue_style('montserrat','https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,900');
    //wp_enqueue_style('Lato','https://fonts.googleapis.com/css?family=Lato:400,700,900');
    wp_register_style('bootstrap4css', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css', array(), '1', 'all' );
    wp_register_style('font-awesome.min', get_template_directory_uri() .'/css/font-awesome.min.css', array(), null, 'all' );
    wp_register_style('owl-carousel', get_template_directory_uri() .'/css/owl.carousel.css', array(), null, 'all' );
    wp_register_style('superslides', get_template_directory_uri() .'/css/superslides.css', array(), null, 'all' );
    wp_register_style('old', get_template_directory_uri() .'/css/oldstyles.css', array(), null, 'all' );
    wp_register_style('styles', get_stylesheet_uri(), array(), null, 'all' );
    wp_register_style('cwsCustom', get_template_directory_uri(). '/cwsDynamicStyles.php', array(), null, 'all' );
    wp_enqueue_style( 'bootstrap4css' );
    wp_enqueue_style( 'owl-carousel' );
    wp_enqueue_style( 'supperslides' );
    wp_enqueue_style( 'old' );
    wp_enqueue_style( 'font-awesome.min' );
    wp_enqueue_style( 'styles' );
    wp_enqueue_style( 'cwsCustom' );
}
add_action( 'wp_enqueue_scripts', 'confluence18_theme_styles' );

add_filter('nav_menu_css_class', 'add_classes_on_li', 1, 3);
function add_classes_on_li($classes, $item, $args)
{
    $classes[] = 'nav-item';

    return $classes;
}

add_filter('wp_nav_menu', 'add_classes_on_a');
function add_classes_on_a($ulclass)
{
    return preg_replace('/<a /', '<a class="nav-link"', $ulclass);
}


// add title tag support
add_theme_support( 'title-tag' );

//Adding custom meta boxes to the theme for the Places Slider
function places_slider_meta_box(){
	add_meta_box('places_slider_box', 'Places Slider Box', 'places_slider_box_callback', 'page', 'side');
}
add_action('add_meta_boxes', 'places_slider_meta_box');

function places_slider_box_callback($post){
    wp_nonce_field(basename(__FILE__), 'places_slider_nonce');
    $places_slider_stored_meta = get_post_meta($post->ID);
	//wp_die('<pre>'.print_r($places_slider_stored_meta, true).'</pre>');
    ?>
    <p>
        <label for="meta-text" class="places-slider-title">Places Slider Input Field</label>
        <input type="text" name="meta-text" id="meta-text" value="<?php echo $places_slider_stored_meta['meta-text'][0]; ?>" />
    </p>
    <?php
}
//Adding custom meta boxes SAVE to the theme for the Places Slider

function places_slider_meta_save($post_id){
	global $post;
	//wp_die('<pre>'.print_r($post, true).'</pre>');
	if($post->post_type == 'places' || $post->post_type == 'stories') {
		//check save status
		$is_autosave = wp_is_post_autosave( $post_id );
		$is_revision = wp_is_post_revision( $post_id );
		$is_valid_nonce = ( isset( $_POST[ 'places_slider_nonce' ]) && wp_verify_nonce( $_POST['places_slider_nonce'], basename(__FILE))) ? 'true' : 'false';
		//wp_die('<pre>'.print_r($_POST, true).'</pre>');
		if ($is_autosave || $is_revision || !$is_valid_nonce){
			return;
		}
		if ( isset($_POST['meta-text'])){
			update_post_meta($post_id, 'meta-text', sanitize_text_field($_POST['meta-text']));
		}
	}
}
add_action('save_post', 'places_slider_meta_save');

//Adding the homepage rev slider to the pages
function custom_banner_function () {
	echo putRevSlider( get_post_meta( get_the_ID(), 'meta-text', true ) );
}

//Adding announcement before nav and after nav
add_action ('before_nav', 'announcement');
add_action('after_nav', 'custom_banner_function');

//Creating Custom Post types for the homepage slider
function setup_slides_cpt(){
    $labels = array(
        'name' => _x('slides', 'post type general name'),
        'singular_name' => _x('Slide', 'post type singular name'),
        'add_new' => _x('Add New', 'slide'),
        'add_new_item' => __('Add New Slide'),
        'edit_item' => __('Edit Slide'),
        'new_item' => __('New Slide'),
        'all_items' => __('All Slides'),
        'view_item' => __('View Slide'),
        'search_items' => __('Search Slides'),
        'not_found' => __('No Slides Found'),
        'not_found_in_trash' => __('No Slides found in the trash'),
        'parent_item_colon' => '',
        'menu_name' => 'Slides'
    );
    $args = array(
        'labels' => $labels,
        'description' => 'The homepage slides',
        'rewrite' => array('slug' => 'slides'),
        'public' => true,
        'menu_position' => 5,
        'supports' => array('title', 'thumbnail', 'excerpt', 'custom-fields'),
        'has_archive' => true,
        'taxonomies' => array(''),
        'menu_icon' => 'dashicons-images-alt2',
    );
    register_post_type('slides', $args);
}
add_action('init', 'setup_slides_cpt');

//Creating Custom Post types for Stories and places
function setup_a_new_cpt(){
	$labels = array(
		'name' => _x('Places', 'post type general name'),
		'singular_name' => _x('Place', 'post type singular name'),
		'add_new' => _x('Add New', 'place'),
		'add_new_item' => __('Add New place'),
		'edit_item' => __('Edit Place'),
		'new_item' => __('New Place'),
		'all_items' => __('All Places'),
		'view_item' => __('View Place'),
		'search_items' => __('Search Places'),
		'not_found' => __('No Places Found'),
		'not_found_in_trash' => __('No Places found in the trash'),
		'parent_item_colon' => '',
		'menu_name' => 'Places'
		);
	$args = array(
		'labels' => $labels,
		'description' => 'The Places you have visited',
		'rewrite' => array('slug' => 'places'),
		'public' => true,
		'menu_position' => 5,
		'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'comments', 'custom-fields'),
		'has_archive' => true,
		'taxonomies' => array(''),
		'menu_icon' => plugins_url('images/icon.png', __FILE__),
		);
	register_post_type('places', $args);
}
add_action('init', 'setup_a_new_cpt');

add_action( 'init', 'create_post_type' );
function create_post_type() {
  register_post_type( 'story',
    array(
      'labels' => array(
        'name' => __( 'Stories' ),
        'singular_name' => __( 'Story' )
      ),
		'rewrite' => array('slug' => 'stories'),
      'public' => true,
		'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'comments', 'custom-fields'),
		'menu_position' => 5,
      'has_archive' => true,
		'taxonomies' => array(''),
		'menu_icon' => plugins_url('images/icon.png', __FILE__),
    )
  );
}

function update_the_places_messages( $messages ) {
	global $post, $post_ID;
	$messages['places'] = array(
		0 => '', 
		1 => sprintf( __('Place updated. <a href="%s">View Place</a>'), esc_url( get_permalink($post_ID) ) ),
		2 => __('Custom field updated.'),
		3 => __('Custom field deleted.'),
		4 => __('Place updated.'),
		5 => isset($_GET['revision']) ? sprintf( __('Place restored to revision from %s'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __('Place published. <a href="%s">View Place</a>'), esc_url( get_permalink($post_ID) ) ),
		7 => __('Place saved.'),
		8 => sprintf( __('Place submitted. <a target="_blank" href="%s">Preview Place</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
		9 => sprintf( __('Place scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Place</a>'), date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
		10 => sprintf( __('Place draft updated. <a target="_blank" href="%s">Preview Place</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
	);
	return $messages;
}
add_filter( 'post_updated_messages', 'update_the_places_messages' );

//Adding Featured Image Support to all Custom Post Types
add_theme_support( 'post-thumbnails', array( 'post','places', 'story', 'beer_reviews' ) ); // Beers, places and Stories



//Adding a tagline below the slider if wanted
//function tagline () {
	 //echo '<div class="container-fluid" style="background-color:#231F1D; text-align:center; margin:15px 0 0 0;"><hr></div>';
//}

//add_action ('before_sidebar', 'tagline');
//add_action ('after_sidebar', 'tagline');

// Allow Shortcodes in the Excerpt field
// add_filter('after_sidebar', 'do_shortcode');

// Theme customizer sample
add_action('admin_menu', 'voce_customizer_link_example');
function voce_customizer_link_example() {
    add_theme_page('Customize', 'Customize', 'edit_theme_options', 'customize.php');
}
add_action('customize_register', 'voce_customizer_example');
function voce_customizer_example($wp_customize){
    $wp_customize->add_section('voce_customizer_settings', array(
        'title' => 'Example Settings',
        'priority' => 35,
        )
    );
    $wp_customize->add_setting('background_setting', array(
        'default' => '#ffffff',
        )
    );
    $wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize, 'background_setting', array(
        'label' => 'Background Color',
        'section' => 'voce_customizer_settings',
        'settings' => 'background_setting',
        )
        )
    );
    $wp_customize->add_setting('footer_text', array(
        'default' => 'WordPress Demonstration Theme built by Confluence on the Bootstrap CSS Framework',
        )
        );
    $wp_customize->add_control('footer_text', array(
        'label' => 'Footer Text',
        'section' => 'voce_customizer_settings',
        'type' => 'text',
        )
        );
}

//Adding the logo to the container to the left of the Menu
function announcement () {
	echo '<a href="http://www.confluence.solutions/fourteen/"><img style="max-height:100px;" src="http://www.confluence.solutions/fourteen/wp-content/uploads/2014/12/confluence-logo-white.png"></a>';
}