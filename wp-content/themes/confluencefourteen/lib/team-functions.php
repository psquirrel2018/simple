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

add_action( 'cmb2_admin_init', 'larson_team_register_repeatable_group_field_metabox' );
/**
 * Hook in and add a metabox to demonstrate repeatable grouped fields
 */
function larson_team_register_repeatable_group_field_metabox() {

    // Start with an underscore to hide fields from custom fields list
    $prefix = 'larson_team_group';

    /**
     * Repeatable Field Groups
     */
    $cmb_group = new_cmb2_box( array(
        'id'           => $prefix . 'metabox',
        'title'        => __( 'Repeating Field Group for the Homepage Slider', 'cmb2' ),
        'object_types' => array( 'team', ),
    ) );

    // $group_field_id is the field id string, so in this case: $prefix . 'demo'
    $group_field_id = $cmb_group->add_field( array(
        'id'          => 'larson_team_group',
        'type'        => 'group',
        'description' => __( 'Generates reusable form entries for the slides', 'cmb2' ),
        'options'     => array(
            'group_title'   => __( 'Team Member', 'cmb2' ), // {#} gets replaced by row number
            'add_button'    => __( 'Add Another Member', 'cmb2' ),
            'remove_button' => __( 'Remove Member', 'cmb2' ),
            'sortable'      => true, // beta
            // 'closed'     => true, // true to have the groups closed by default
        ),
    ) );

    /**
     * Group fields works the same, except ids only need
     * to be unique to the group. Prefix is not needed.
     * The parent field's id needs to be passed as the first argument.
     */

    $cmb_group->add_group_field( $group_field_id, array(
        'name' => __( 'Member', 'cmb2' ),
        'id'   => 'image',
        'type' => 'file',
    ) );

    $cmb_group->add_group_field( $group_field_id, array(
        'name' => __( 'Member name', 'cmb2' ),
        'id'   => 'name',
        'type' => 'text',
    ) );

    $cmb_group->add_group_field( $group_field_id, array(
        'name' => __( 'Member title', 'cmb2' ),
        'id'   => 'title',
        'type' => 'text',
    ) );

    $cmb_group->add_group_field( $group_field_id, array(
        'name' => __( 'Member Full Bio', 'cmb2' ),
        'id'   => 'bio',
        'type' => 'textarea',
    ) );

    $cmb_group->add_group_field( $group_field_id, array(
        'name' => __( 'Button Label', 'cmb2' ),
        'id'   => 'cta',
        'type' => 'text',
    ) );

    $cmb_group->add_group_field( $group_field_id, array(
        'name' => __( 'CTA URL', 'cmb2' ),
        'id'   => 'cta-url',
        'type' => 'text_url',
    ) );

}
