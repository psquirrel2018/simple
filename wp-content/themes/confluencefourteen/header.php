<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head();
    $site_logo = cws_theme_get_option( 'cws_theme_logo' );
    $site_phone = cws_theme_get_option( 'cws_theme_phone' );
    $site_email = cws_theme_get_option( 'cws_theme_email' );

    $font_selected = cws_theme_get_option( 'cws_theme_font' );

    // If (Option Lato True)
    if ( $font_selected === 'lato' ) {
        wp_enqueue_style('Lato','https://fonts.googleapis.com/css?family=Lato:400,700,900');
    } else {
        wp_enqueue_style('montserrat','https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,900');
    }
    ?>
</head>
<body <?php body_class(); ?>>

<a href="#" class="back-to-top" title="Back to top">
    <i class="icon-arrow-up"></i>
</a>

<header class="header-type-1">
    <div class="container-fluid2">
        <div class="row">
            <div class="col-md-12">
                <div class="header-navigation2">

                    <div class="main-menu">
                        <!-- example 2 - using auto margins -->

                        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
                            <div class="container">

                                <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                                    <img src="<?= $site_logo; ?>" alt="logo" class="img-responsive">
                                </a>

                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarDropdown" aria-controls="navbarDropdown" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>

                                <div class="collapse navbar-collapse" id="navbarDropdown">
                                    <?php
                                    wp_nav_menu( array(
                                        'theme_location' => 'mainnav', // Defined when registering the menu
                                        'container'       => false,
                                        'menu_class'      => '',
                                        'fallback_cb'     => '__return_false',
                                        'items_wrap'      => '<ul id="%1$s" class="navbar-nav ml-auto mt-2 mt-lg-0 %2$s">%3$s</ul>',
                                        'depth'           => 2,
                                        'walker'         => new Bootstrap_NavWalker(), // This controls the display of the Bootstrap Navbar
                                    ) );
                                    ?>
                                </div>

                            </div>
                        </nav>

                    </div>
                    <!--<div class="header-right">
                        <div class="social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-youtube"></i></a>
                        </div>
                    </div>-->
                </div>
            </div> <!-- /.col-md-12 -->
        </div> <!-- /.row -->
        <div class="row search-bar">
            <div class="col-md-4 col-md-offset-8 col-lg-3 col-lg-offset-9">
                <?php get_search_form(); ?>
            </div><!--  .col-md-8 -->
        </div><!--  .row -->
    </div> <!-- /.container -->
</header> <!-- /.header-type-1 -->

