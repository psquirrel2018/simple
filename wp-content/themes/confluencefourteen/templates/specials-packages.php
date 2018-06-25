<?php
/**
 * Created by PhpStorm.
 * User: Scott taylor
 * Date: 6/14/18
 * Time: 10:48 AM
 */

$specials_heading = get_post_meta($post->ID, '_simple_frontpage_specials_heading', true);
$specials_content = get_post_meta($post->ID, '_simple_frontpage_specials_content', true);
$specials_one = get_post_meta($post->ID, '_simple_frontpage_specials_one', true);
$specials_one_copy = get_post_meta($post->ID, '_simple_frontpage_specials_one_copy', true);
$specials_one_cta = get_post_meta($post->ID, '_simple_frontpage_specials_one_cta', true);
$specials_two = get_post_meta($post->ID, '_simple_frontpage_specials_two', true);
$specials_two_copy = get_post_meta($post->ID, '_simple_frontpage_specials_two_copy', true);
$specials_two_cta = get_post_meta($post->ID, '_simple_frontpage_specials_two_cta', true);
$specials_three = get_post_meta($post->ID, '_simple_frontpage_specials_three', true);
$specials_three_copy = get_post_meta($post->ID, '_simple_frontpage_specials_three_copy', true);
$specials_three_cta = get_post_meta($post->ID, '_simple_frontpage_specials_three_cta', true);
$specials_four = get_post_meta($post->ID, '_simple_frontpage_specials_four', true);
$specials_four_copy = get_post_meta($post->ID, '_simple_frontpage_specials_four_copy', true);
$specials_four_cta = get_post_meta($post->ID, '_simple_frontpage_specials_four_cta', true);
$specials_five = get_post_meta($post->ID, '_simple_frontpage_specials_five', true);
$specials_five_copy = get_post_meta($post->ID, '_simple_frontpage_specials_five_copy', true);
$specials_five_cta = get_post_meta($post->ID, '_simple_frontpage_specials_five_cta', true);

$divider_image3 = get_post_meta($post->ID, '_simple_frontpage_divider_photo3', true);
?>

<div id="our-specials" class="how-we-work" style="padding:60px 0;">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div>
                    <h2 class="section-heading"><?php if($specials_heading !=''){echo $specials_heading;} else {echo '<h1>Specials</h1>';} ?></h2>
                    <h4 class="section-subheading treated"><?php if($specials_content !=''){echo $specials_content;}  ?></h4>
                </div>
            </div>

            <div class="col-md-6">
                <ol class="steps">
                    <li class="steps__strategy">
                        <a href="<?= $specials_one_cta; ?>">
                            <dl>
                                <dt class="brand-beta"><?php if($specials_one !=''){echo $specials_one;}  ?></dt>
                                <dd>
                                    <?php if($specials_one_copy !=''){echo $specials_one_copy;} ?>
                                </dd>
                            </dl>
                        </a>
                    </li>
                    <li class="steps__design">
                        <a href="<?= $specials_two_cta; ?>">
                            <dl>
                                <dt class="brand-beta"><?php if($specials_two !=''){echo $specials_two;} ?></dt>
                                <dd>
                                    <?php if($specials_two_copy !=''){echo $specials_two_copy;} ?>
                                </dd>
                            </dl>
                        </a>
                    </li>
                    <li class="steps__develop">
                        <a href="<?= $specials_three_cta; ?>">
                            <dl>
                                <dt class="brand-beta"><?php if($specials_three !=''){echo $specials_three;} ?></dt>
                                <dd>
                                    <?php if($specials_three_copy !=''){echo $specials_three_copy;} ?>
                                </dd>
                            </dl>
                        </a>
                    </li>
                    <li class="steps__launch">
                        <a href="<?= $specials_four_cta; ?>">
                            <dl>
                                <dt class="brand-beta"><?php if($specials_four !=''){echo $specials_four;} ?></dt>
                                <dd>
                                    <?php if($specials_four_copy !=''){echo $specials_four_copy;} ?>
                                </dd>
                            </dl>
                        </a>
                    </li>
                    <li class="steps__iterate">
                        <a href="<?= $specials_five_cta; ?>">
                            <dl>
                                <dt class="brand-beta"><?php if($specials_five !=''){echo $specials_five;} ?></dt>
                                <dd>
                                    <?php if($specials_five_copy !=''){echo $specials_five_copy;} ?>
                                </dd>
                            </dl>
                        </a>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div id="section-divider1" class="">
    <div class="row">
        <div class="col-md-12">
            <img src="<?= $divider_image3; ?>" style="width:100%;" class="img-fluid" />
        </div>
    </div>
</div>
