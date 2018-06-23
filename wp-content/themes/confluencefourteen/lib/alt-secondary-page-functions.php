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

add_action( 'cmb2_admin_init', 'alt_secondary_page_register_demo_metabox' );
/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_admin_init' or 'cmb2_init' hook.
 */
function alt_secondary_page_register_demo_metabox() {

    // Start with an underscore to hide fields from custom fields list
    $prefix = '_confluence_secondary_';

    /**
     * Sample metabox to demonstrate each field type included
     */
    $cmb_demo = new_cmb2_box( array(
        'id'            => $prefix . 'metabox',
        'title'         => __( 'Secondary Page Custom Fields', 'cmb2' ),
        'object_types'  => array( 'page', ), // Post type
        'show_on' => array('key' => 'page-template', 'value' => array('alt-secondary.php')),
        //'show_on_cb' => '_larson_frontpage_show_if_front_page', // function should return a bool value
        // 'context'    => 'normal',
        // 'priority'   => 'high',
        // 'show_names' => true, // Show field names on the left
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        // 'closed'     => true, // true to keep the metabox closed by default
    ) );

    $cmb_demo->add_field( array(
        'name' => __( 'Right Sidebar H1 Title', 'cmb2' ),
        'desc' => __( 'This is the: title that goes in the right sidebar of the Alt Secondary template', 'cmb2' ),
        'id'   => $prefix . 'sidebar_title',
        'type' => 'text',
        // 'repeatable' => true,
    ) );

    $cmb_demo->add_field( array(
        'name' => __( 'Sidebar Copy', 'cmb2' ),
        'desc' => __( 'This is the: right sidebar copy for the Alt Secondary Template copy', 'cmb2' ),
        'id'   => $prefix . 'sidebar_content',
        'type' => 'textarea',
        // 'repeatable' => true,
    ) );

    $cmb_demo->add_field( array(
        'name' => __( 'Right Sidebar Photo', 'cmb2' ),
        'desc' => __( 'Upload an image or enter a URL.  Make sure the image dimensions are 600x600', 'cmb2' ),
        'id'   => $prefix . 'sidebar_photo',
        'type' => 'file',
    ) );

}