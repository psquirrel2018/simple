<?php
/**
 * Created by PhpStorm.
 * User: Scott taylor
 * Date: 6/23/18
 * Time: 2:15 PM
 */

$site_phone = cws_theme_get_option( 'cws_theme_phone' );
$site_email = cws_theme_get_option( 'cws_theme_email' );
//$top_bar_phone = cws_theme_get_option( 'cws_theme_top_bar_phone' );
//$top_bar_email = cws_theme_get_option( 'cws_theme_top_bar_email' );
//$top_bar_social = cws_theme_get_option( 'cws_theme_top_bar_social' );

?>
<section style="background-color:#999999;">
    <div id="top-bar" class="container">
        <div class="row">
            <div class="col-md-4">
                <a href="tel:<?= $site_phone; ?>">Tel: <?= $site_phone; ?></a>
            </div> <!-- /.col-md-4 -->
            <div class="col-md-4">

            </div> <!-- /.col-md-4 -->
            <div class="col-md-4 text-right">
                <a href="email:<?= $site_email; ?>">Email: <?= $site_email; ?></a>
            </div> <!-- /.col-md-4 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>
<!--<div class="header-right">
                <div class="social">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-instagram"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-youtube"></i></a>
                </div>
            </div>-->