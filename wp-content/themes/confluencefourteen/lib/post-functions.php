<?php
/**
 * Include and setup custom metaboxes and fields. (make sure you copy this file to outside the CMB2 directory)
 *
 * Be sure to replace all instances of 'yourprefix_' with your project's prefix.
 * http://nacin.com/2010/05/11/in-wordpress-prefix-everything/
 *
 * @category YourThemeOrPlugin
 * @package  Demo_CMB2
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/WebDevStudios/CMB2
 */

/**
 * Get the bootstrap! If using the plugin from wordpress.org, REMOVE THIS!
 */

if ( file_exists( dirname( __FILE__ ) . '/cmb2/init.php' ) ) {
    require_once dirname( __FILE__ ) . '/cmb2/init.php';
} elseif ( file_exists( dirname( __FILE__ ) . '/CMB2/init.php' ) ) {
    require_once dirname( __FILE__ ) . '/CMB2/init.php';
}

add_action( 'cmb2_admin_init', 'larson_register_posts_metabox' );
/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_admin_init' or 'cmb2_init' hook.
 */
function larson_register_posts_metabox() {

    // Start with an underscore to hide fields from custom fields list
    $prefix = '_larson_posts_';

    /**
     * Sample metabox to demonstrate each field type included
     */
    $cmb_demo = new_cmb2_box( array(
        'id'            => $prefix . 'metabox',
        'title'         => __( 'Blog Post Custom Fields', 'cmb2' ),
        'object_types'  => array( 'post', ), // Post type
        // 'context'    => 'normal',
        // 'priority'   => 'high',
        // 'show_names' => true, // Show field names on the left
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        // 'closed'     => true, // true to keep the metabox closed by default
    ) );

    //Slider Image Fields

    	$cmb_demo->add_field( array(
    	'name' => __( 'Custom Photo', 'cmb2' ),
    	'desc' => __( 'Upload an image or enter a URL.  Make sure the image dimensions are 400x267', 'cmb2' ),
    	'id'   => $prefix . 'custom-photo',
    	'type' => 'file',
    ) );

    $cmb_demo->add_field( array(
        'name' => __( 'Custom Photo', 'cmb2' ),
        'desc' => __( 'Upload an image or enter a URL.  Make sure the image dimensions are 400x267', 'cmb2' ),
        'id'   => $prefix . 'custom-photo2',
        'type' => 'file',
    ) );

    $cmb_demo->add_field( array(
        'name' => __( 'Custom Photo', 'cmb2' ),
        'desc' => __( 'Upload an image or enter a URL.  Make sure the image dimensions are 400x267', 'cmb2' ),
        'id'   => $prefix . 'custom-photo3',
        'type' => 'file',
    ) );




}

