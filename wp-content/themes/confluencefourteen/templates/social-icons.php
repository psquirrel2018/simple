<?php
/**
 * Created by PhpStorm.
 * User: scott taylor
 * Date: 6/13/18
 * Time: 11:04 AM
 */

//Social Media Icons
$fb_url = cws_theme_get_option( 'cws_theme_facebookurl' );
$twitter_url = cws_theme_get_option( 'cws_theme_twitterurl' );
$youtube_url = cws_theme_get_option( 'cws_theme_youtubeurl' );
$in_url = cws_theme_get_option( 'cws_theme_linkedinurl' );
$gp_url = cws_theme_get_option( 'cws_theme_googleplusurl' );
$instagram_url = cws_theme_get_option( 'cws_theme_instagramurl' );
?>
<ul>
    <?php if ($fb_url != '') {?>
        <li><a href="<?= $fb_url; ?>" class="fa fa-facebook fa-lg" target="_blank"></a></li>
    <?php }; ?>
    <?php if ($twitter_url != '') {?>
        <li><a href="<?= $twitter_url; ?>" class="fa fa-twitter fa-lg" target="_blank"></a></li>
    <?php }; ?>
    <?php if ($gplus_url != '') {?>
        <li><a href="<?= $gplus_url; ?>" class="fa fa-google-plus fa-lg" target="_blank"></a></li>
    <?php }; ?>
    <?php if ($youtube_url != '') {?>
        <li><a href="<?= $youtube_url; ?>" class="fa fa-youtube fa-lg" target="_blank"</a></li>
    <?php }; ?>
    <?php if ($in_url != '') {?>
        <li><a href="<?= $in_url; ?>" class="fa fa-linkedin fa-lg" target="_blank"></a></li>
    <?php }; ?>
    <?php if ($instagram_url != '') {?>
        <li><a href="<?= $instagram_url; ?>" class="fa fa-instagram fa-lg" target="_blank"></a></li>
    <?php }; ?>
    <?php if (empty($in_url) && empty($fb_url) && empty($youtube_url) && empty($gplus_url) && empty($twitter_url) && empty($instagram_url)) {?>
        <li>Add Social Media Urls to the Site Options</li>
    <?php }; ?>
</ul>
