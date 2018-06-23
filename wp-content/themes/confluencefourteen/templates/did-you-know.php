<?php
/**
 * Created by PhpStorm.
 * User: Scott Taylor
 * Date: 6/14/18
 * Time: 10:51 AM
 */
$welcome2 = get_post_meta($post->ID, '_simple_frontpage_welcome_title2', true);
$welcome_copy2 = get_post_meta($post->ID, '_simple_frontpage_welcome_wysiwyg2', true);
$welcome_image2 = get_post_meta($post->ID, '_simple_frontpage_welcome_image2', true);
?>

<div class="container-fluid bg-grey pvvl" style="padding:60px 0;">
    <div class="flex-row flex-column-mobile flex-center-mobile flex-justify-mobile display-block-tablet container limit-width">
        <div class="flex-column prvl flex-1 center-text-mobile">
            <h1 class="em-100 lh1 type-mlrg ls-title uppercase dark-blue"><?= $welcome2; ?></h1>
            <p class="em-200 medium-blue type-h5 mtm">
                <?= $welcome_copy2; ?>
            </p>
        </div>
        <div class="flex-1 pos-rel">
            <?= $welcome_image2; ?>
        </div>
    </div>
</div>
