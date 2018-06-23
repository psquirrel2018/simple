<?php
/**
 * Created by PhpStorm.
 * User: Scott taylor
 * Date: 6/22/18
 * Time: 9:14 AM
 */

$font_selected = cws_theme_get_option( 'cws_theme_font' );

// If (Option Lato True)
if ( 'lato' === $font_selected ) {
    wp_enqueue_style('Lato','https://fonts.googleapis.com/css?family=Lato:400,700,900');
} else {
    wp_enqueue_style('montserrat','https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,900');
}

