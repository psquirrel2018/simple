<?php
/**
 * Created by PhpStorm.
 * User: Scott Taylor
 * Date: 2/23/18
 * Time: 9:18 AM
 */
global $post;
$slider_id = get_post_meta($post->ID, '_simple_frontpage_slider_id', true);

?>

<div class="banner flex-center flex-justify flex-column center full-height" style="background: rgba(25,7,33, 0.9);">
    <div id="slider">
        <ul class="slides-container" style="background: rgba(25,7,33, 0.9);">
            <?php $hpSlider = get_post_meta( $slider_id, 'larson_slides_group', true );
            foreach ( (array) $hpSlider as $slide ) {
                $img = $title = $secondaryTitle = $cta = $ctaUrl = '';
                if ( isset( $slide['message'] ) )
                    $title = esc_html( $slide['message'] );
                if ( isset( $slide['secondary-message'] ) )
                    $secondaryTitle = esc_html( $slide['secondary-message'] );
                if ( isset( $slide['cta'] ) )
                    $cta = esc_html( $slide['cta'] );
                if ( isset( $slide['cta-url'] ) )
                    $ctaUrl = esc_html( $slide['cta-url'] );
                if ( isset( $slide['image_id'] ) ) {
                    $img = wp_get_attachment_image_url( $slide['image_id'], 'full');
                } ?>
                <!-- Slide container -->
                <li class="pos-abs bg-overlay-info" style="z-index:1;width: 100%; height: 100%;background:url('<?= $img; ?>');position: absolute; z-index: -1; top: 0px; left: 0px; bottom: 0px; right: 0px; overflow: hidden; background-size: cover;background-color: transparent; background-repeat: no-repeat; background-position: 50% 50%;">
                    <div class="tint">
                        <div class="content text-center">
                            <h1 class="em-100 white uppercase container lm-title lh1"><?= $title; ?></h1>
                            <p class="em-300 sky-blue type-h5 ptm container-xs mbml hidden-xs"><?= $secondaryTitle; ?></p>
                            <?php if($ctaUrl) { ?>
                            <div id="play-banner" class="flex-row flex-column-mobile flex-center flex-justify pointer mbvl pvtl">
                                <a href="<?= $ctaUrl; ?>" class="btn btn-primary type-p mbn deskonly-mlm ptm-mobile"><?= $cta; ?></a></p>
                            <?php } ?>
                        </div>
                    </div>
                </li>
            <?php }  ?>
        </ul>
        <nav class="slides-navigation" style="z-index:10000;margin:-100px 0 0 10px;position:relative;">
            <a href="#" class="prev"><i class="fa fa-angle-left fa-2x"></i></a>
            <a href="#" class="next"><i class="fa fa-angle-right fa-2x"></i></a>
        </nav>
    </div>
</div>
