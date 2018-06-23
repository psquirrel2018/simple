<?php
/**
 * Created by PhpStorm.
 * User: circdominic
 * Date: 6/13/18
 * Time: 10:51 AM
 */
//$contact_form_id = get_post_meta($post->ID, '_simple_frontpage_gf_id', true);
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-8 col-xs-12" style="padding:0;" id="our-location">
            <div class="rects bg-middle flex-center flex-justify white uppercase em-200 lh1 active"><a href="/our-location/" style="color:#ffffff;"><span>Our Location</span></a>
            </div>
            <?php
            wp_reset_postdata();
            $map = get_fields($post->ID);
            //echo '<pre>' . print_r($map, true) . '</pre>';
            ?>
            <div class="map-wrapper blue">
                <?php if(is_array($map) && array_key_exists('address',$map) && array_key_exists('lat',$map['address']) && array_key_exists('lng',$map['address']) && array_key_exists('address',$map['address']) ) { ?>
                    <div class="office-map" data-lat="<?= $map["address"]["lat"] ?>" data-lng="<?= $map["address"]["lng"] ?>" data-address="<?= $map["address"]["address"] ?>" style="height:800px;"></div>
                <?php } ?>
            </div>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-12" style="padding:0;">
            <div class="rects stat white uppercase em-200 bg-right flex-center flex-justify">Contact Us</div>
            <div class="contact-wrapper blue">
                <?php gravity_form($contact_form_id, false, false, false, '', true, 12); ?>
            </div>
        </div>
    </div>
</div>
