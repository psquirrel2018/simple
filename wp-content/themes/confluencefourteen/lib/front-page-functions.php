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

/**
 * Conditionally displays a metabox when used as a callback in the 'show_on_cb' cmb2_box parameter
 *
 * @param  CMB2 object $cmb CMB2 object
 *
 * @return bool             True if metabox should show
 */
function simple_show_if_front_page( $cmb ) {
    // Don't show this metabox if it's not the front page template
    if ( $cmb->object_id !== get_option( 'page_on_front' ) ) {
        return false;
    }
    return true;
}

add_action( 'cmb2_admin_init', 'simple_metabox' );
/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_admin_init' or 'cmb2_init' hook.
 */
function simple_metabox() {

    // Start with an underscore to hide fields from custom fields list
    $prefix = '_simple_frontpage_';

    /**
     * Sample metabox to demonstrate each field type included
     */
    $cmb_demo = new_cmb2_box( array(
        'id'            => $prefix . 'metabox',
        'title'         => __( 'Homepage Custom Fields', 'cmb2' ),
        'object_types'  => array( 'page', ), // Post type
        'show_on' => array('key' => 'page-template', 'value' => 'front-page.php'),
        'show_on_cb' => '_simple_frontpage_show_if_front_page', // function should return a bool value
        // 'context'    => 'normal',
        // 'priority'   => 'high',
        // 'show_names' => true, // Show field names on the left
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        // 'closed'     => true, // true to keep the metabox closed by default
    ) );

    $cmb_demo->add_field( array(
        'name' => __( 'Intro Photo', 'cmb2' ),
        'desc' => __( 'Upload an image or enter a URL.  Make sure the image dimensions are 600x600', 'cmb2' ),
        'id'   => $prefix . 'intro_photo',
        'type' => 'file',
    ) );

    $cmb_demo->add_field( array(
        'name' => __( 'Divider Photo 1', 'cmb2' ),
        'desc' => __( 'Upload an image or enter a URL.  Make sure the image dimensions are 600x600', 'cmb2' ),
        'id'   => $prefix . 'divider_photo1',
        'type' => 'file',
    ) );

    $cmb_demo->add_field( array(
        'name' => __( 'Divider Photo 2', 'cmb2' ),
        'desc' => __( 'Upload an image or enter a URL.  Make sure the image dimensions are 600x600', 'cmb2' ),
        'id'   => $prefix . 'divider_photo2',
        'type' => 'file',
    ) );

    $cmb_demo->add_field( array(
        'name' => __( 'Divider Photo 3', 'cmb2' ),
        'desc' => __( 'Upload an image or enter a URL.  Make sure the image dimensions are 600x600', 'cmb2' ),
        'id'   => $prefix . 'divider_photo3',
        'type' => 'file',
    ) );

    $cmb_demo->add_field( array(
        'name' => __( 'Divider Photo 4', 'cmb2' ),
        'desc' => __( 'Upload an image or enter a URL.  Make sure the image dimensions are 600x600', 'cmb2' ),
        'id'   => $prefix . 'divider_photo4',
        'type' => 'file',
    ) );

    $cmb_demo->add_field( array(
        'name'             => esc_html__( 'Do you want to use this theme\'s custom full screen slider?', 'cmb2' ),
        'desc'             => esc_html__( 'If not, you can use a shortcode to put in a revSlider, wowSlider, or what ever you want.  However, the plugin must also have height and width settings.', 'cmb2' ),
        'id'               => $prefix . 'slider_option',
        'type'             => 'radio_inline',
        'show_option_none' => 'No',
        'options'          => array(
            'yes' => esc_html__( 'Yes', 'cmb2' )
        ),
    ) );

    $cmb_demo->add_field( array(
        'name' => __( 'REQUIRED - Slider Post ID - If using the theme\'s full width slider', 'cmb2' ),
        'desc' => __( 'Enter the post id of the Slider to use on the homepage', 'cmb2' ),
        'id'   => $prefix . 'slider_id',
        'type' => 'text',
    ) );
    $cmb_demo->add_field( array(
        'name' => __( 'Custom Shortcode for slider or video - If you selected "No" above, then something must be added here for the theme to work properly.', 'cmb2' ),
        'desc' => __( 'Enter shortcode to something that is set to full width.  It does not need to be full height, just full width.', 'cmb2' ),
        'id'   => $prefix . 'custom_shortcode',
        'type' => 'text',
    ) );

    $cmb_demo->add_field( array(
        'name'             => esc_html__( 'Do you want to use this theme\'s Promos & Packages section?', 'cmb2' ),
        'desc'             => esc_html__( 'If not, you can use a shortcode to put in a revSlider, wowSlider, or what ever you want...', 'cmb2' ),
        'id'               => $prefix . 'specials_option',
        'type'             => 'radio_inline',
        'show_option_none' => 'No',
        'options'          => array(
            'yes' => esc_html__( 'Yes', 'cmb2' )
        ),
    ) );

    $cmb_demo->add_field( array(
        'name' => __( 'Specials/Packages Heading', 'cmb2' ),
        'desc' => __( 'Change this if you want the section title to be something other than "Specials"', 'cmb2' ),
        'id'   => $prefix . 'specials_heading',
        'type' => 'text',
    ) );
    $cmb_demo->add_field( array(
        'name'    => __( 'Specials/Packages Content', 'cmb2' ),
        'desc'    => __( 'Describe this section. Tell your user about this section with good SEO Keywords', 'cmb2' ),
        'id'      => $prefix . 'specials_content',
        'type'    => 'wysiwyg',
        'options' => array( 'textarea_rows' => 2, ),
    ) );

    $cmb_demo->add_field( array(
        'name' => __( 'Special One', 'cmb2' ),
        'desc' => __( 'Enter a title for this special', 'cmb2' ),
        'id'   => $prefix . 'specials_one',
        'type' => 'text',
    ) );
    $cmb_demo->add_field( array(
        'name'    => __( 'Special One Details', 'cmb2' ),
        'desc'    => __( 'field description (optional)', 'cmb2' ),
        'id'      => $prefix . 'specials_one_copy',
        'type'    => 'wysiwyg',
        'options' => array( 'textarea_rows' => 2, ),
    ) );
    $cmb_demo->add_field( array(
        'name' => esc_html__( 'Special One URL', 'cmb2' ),
        'desc' => esc_html__( 'enter the page url so that it looks like /your-page\'s name/', 'cmb2' ),
        'id'   => $prefix . 'specials_one_cta',
        'type' => 'text_url',
        // 'protocols' => array('http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet'), // Array of allowed protocols
        // 'repeatable' => true,
    ) );


    $cmb_demo->add_field( array(
        'name' => __( 'Special Two', 'cmb2' ),
        'desc' => __( '', 'cmb2' ),
        'id'   => $prefix . 'specials_two',
        'type' => 'text',
    ) );
    $cmb_demo->add_field( array(
        'name'    => __( 'Special Two Details', 'cmb2' ),
        'desc'    => __( 'field description (optional)', 'cmb2' ),
        'id'      => $prefix . 'specials_two_copy',
        'type'    => 'wysiwyg',
        'options' => array( 'textarea_rows' => 2, ),
    ) );
    $cmb_demo->add_field( array(
        'name' => esc_html__( 'Special Two URL', 'cmb2' ),
        'desc' => esc_html__( 'enter the page url so that it looks like /your-page\'s name/', 'cmb2' ),
        'id'   => $prefix . 'specials_two_cta',
        'type' => 'text_url',
        // 'protocols' => array('http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet'), // Array of allowed protocols
        // 'repeatable' => true,
    ) );


    $cmb_demo->add_field( array(
        'name' => __( 'Special Three', 'cmb2' ),
        'desc' => __( '', 'cmb2' ),
        'id'   => $prefix . 'specials_three',
        'type' => 'text',
    ) );
    $cmb_demo->add_field( array(
        'name'    => __( 'Special Three Content', 'cmb2' ),
        'desc'    => __( 'field description (optional)', 'cmb2' ),
        'id'      => $prefix . 'specials_three_copy',
        'type'    => 'wysiwyg',
        'options' => array( 'textarea_rows' => 2, ),
    ) );
    $cmb_demo->add_field( array(
        'name' => esc_html__( 'Special Three URL', 'cmb2' ),
        'desc' => esc_html__( 'enter the page url so that it looks like /your-page\'s name/', 'cmb2' ),
        'id'   => $prefix . 'specials_three_cta',
        'type' => 'text_url',
        // 'protocols' => array('http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet'), // Array of allowed protocols
        // 'repeatable' => true,
    ) );


    $cmb_demo->add_field( array(
        'name' => __( 'Special Four', 'cmb2' ),
        'desc' => __( '', 'cmb2' ),
        'id'   => $prefix . 'specials_four',
        'type' => 'text',
    ) );
    $cmb_demo->add_field( array(
        'name'    => __( 'Special Four Content', 'cmb2' ),
        'desc'    => __( 'field description (optional)', 'cmb2' ),
        'id'      => $prefix . 'specials_four_copy',
        'type'    => 'wysiwyg',
        'options' => array( 'textarea_rows' => 2, ),
    ) );
    $cmb_demo->add_field( array(
        'name' => esc_html__( 'Special Four URL', 'cmb2' ),
        'desc' => esc_html__( 'enter the page url so that it looks like /your-page\'s name/', 'cmb2' ),
        'id'   => $prefix . 'specials_four_cta',
        'type' => 'text_url',
        // 'protocols' => array('http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet'), // Array of allowed protocols
        // 'repeatable' => true,
    ) );

    $cmb_demo->add_field( array(
        'name' => __( 'Special Five', 'cmb2' ),
        'desc' => __( '', 'cmb2' ),
        'id'   => $prefix . 'specials_five',
        'type' => 'text',
    ) );
    $cmb_demo->add_field( array(
        'name'    => __( 'Special Five Content', 'cmb2' ),
        'desc'    => __( 'field description (optional)', 'cmb2' ),
        'id'      => $prefix . 'specials_five_copy',
        'type'    => 'wysiwyg',
        'options' => array( 'textarea_rows' => 2, ),
    ) );
    $cmb_demo->add_field( array(
        'name' => esc_html__( 'Special Five URL', 'cmb2' ),
        'desc' => esc_html__( 'enter the page url so that it looks like /your-page\'s name/', 'cmb2' ),
        'id'   => $prefix . 'specials_five_cta',
        'type' => 'text_url',
        // 'protocols' => array('http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet'), // Array of allowed protocols
        // 'repeatable' => true,
    ) );


    $cmb_demo->add_field( array(
        'name'             => esc_html__( 'Do you want to use this theme\'s Did You Know', 'cmb2' ),
        'desc'             => esc_html__( 'If not, you can use a shortcode to put in a revSlider, wowSlider, or what ever you want...', 'cmb2' ),
        'id'               => $prefix . 'did_you_know_option',
        'type'             => 'radio_inline',
        'show_option_none' => 'No',
        'options'          => array(
            'yes' => esc_html__( 'Yes', 'cmb2' )
        ),
    ) );

    // Intro & Welcome Copy

    $cmb_demo->add_field( array(
        'name' => __( 'Intro Copy', 'cmb2' ),
        'desc' => __( 'This is the: Welcome To... copy', 'cmb2' ),
        'id'   => $prefix . 'welcome_intro',
        'type' => 'text',
        // 'repeatable' => true,
    ) );

    $cmb_demo->add_field( array(
        'name'       => __( 'Welcome Title', 'cmb2' ),
        'desc'       => __( 'field description (optional)', 'cmb2' ),
        'id'         => $prefix . 'welcome_title',
        'type'       => 'text',
        //'show_on_cb' => 'yourprefix_hide_if_no_cats', // function should return a bool value
        // 'sanitization_cb' => 'my_custom_sanitization', // custom sanitization callback parameter
        // 'escape_cb'       => 'my_custom_escaping',  // custom escaping callback parameter
        // 'on_front'        => false, // Optionally designate a field to wp-admin only
        // 'repeatable'      => true,
    ) );

    $cmb_demo->add_field( array(
        'name'    => __( 'Welcome and SEO Copy wysiwyg', 'cmb2' ),
        'desc'    => __( 'field description (optional)', 'cmb2' ),
        'id'      => $prefix . 'welcome_wysiwyg',
        'type'    => 'wysiwyg',
        'options' => array( 'textarea_rows' => 5, ),
    ) );

    $cmb_demo->add_field( array(
        'name'    => __( 'Optional Extra Homepage Content', 'cmb2' ),
        'desc'    => __( ' (optional)', 'cmb2' ),
        'id'      => $prefix . 'welcome_wysiwyg_optional'
        //'type'    => 'wysiwyg',
        //'options' => array( 'textarea_rows' => 5, ),
    ) );

    $cmb_demo->add_field( array(
        'name'       => __( 'Welcome Title2', 'cmb2' ),
        'desc'       => __( 'field description (optional)', 'cmb2' ),
        'id'         => $prefix . 'welcome_title2',
        'type'       => 'text',
        //'show_on_cb' => 'yourprefix_hide_if_no_cats', // function should return a bool value
        // 'sanitization_cb' => 'my_custom_sanitization', // custom sanitization callback parameter
        // 'escape_cb'       => 'my_custom_escaping',  // custom escaping callback parameter
        // 'on_front'        => false, // Optionally designate a field to wp-admin only
        // 'repeatable'      => true,
    ) );

    $cmb_demo->add_field( array(
        'name'    => __( 'Welcome Copy 2 wysiwyg', 'cmb2' ),
        'desc'    => __( 'field description (optional)', 'cmb2' ),
        'id'      => $prefix . 'welcome_wysiwyg2',
        'type'    => 'wysiwyg',
        'options' => array( 'textarea_rows' => 5, ),
    ) );

    $cmb_demo->add_field( array(
        'name' => __('OPTIONAL - Reviews Post ID', 'cmb2' ),
        'desc' => __( 'Enter the post id of the Reviews data', 'cmb2' ),
        'id'   => $prefix . 'review_id',
        'type' => 'text',
    ) );

    $cmb_demo->add_field( array(
        'name' => __('Required if Reviews are enabled - Reviews Page URL', 'cmb2' ),
        'desc' => __( 'OPTIONAL - Enter the page url where all the reviews can be read', 'cmb2' ),
        'id'   => $prefix . 'reviewsUrl',
        'type' => 'text_url',
    ) );

    $cmb_demo->add_field( array(
        'name' => __( 'MAP address ', 'cmb2' ),
        'desc' => __( 'get from, Google', 'cmb2' ),
        'id'   => $prefix . 'address',
        'type' => 'text',
    ) );

    $cmb_demo->add_field( array(
        'name' => __( 'MAP Longitude ', 'cmb2' ),
        'desc' => __( 'get from, Google', 'cmb2' ),
        'id'   => $prefix . 'long',
        'type' => 'text',
    ) );

    $cmb_demo->add_field( array(
        'name' => __( 'MAP Latitude ', 'cmb2' ),
        'desc' => __( 'get from, Google', 'cmb2' ),
        'id'   => $prefix . 'lat',
        'type' => 'text',
    ) );

    $cmb_demo->add_field( array(
        'name' => __( 'Gravity Form ID ', 'cmb2' ),
        'desc' => __( 'get from, Google', 'cmb2' ),
        'id'   => $prefix . 'gf_id',
        'type' => 'text',
    ) );
}