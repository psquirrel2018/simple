<?php

$slider_id = get_post_meta($post->ID, '_simple_frontpage_slider_id', true);

?>

<div id="slider" class="container-fluid">
    <div class="row" style="height:100%;">
        <div class="col-xs-12" style="height:100%;padding:0;">
            <ul class="slides-container">
                <?php $hpSlider = get_post_meta( $slider_id, 'simple_slides_group', true );
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
                        $img = wp_get_attachment_image( $slide['image_id'], 'share-pick', null, array(
                            'class' => 'thumb img-responsive',
                        ) );
                    } ?>
                    <!-- Slide container -->
                    <li>
                        <?= $img; ?>
                        <div class="tint">
                            <div class="content text-center">
                                <h1><?= $title; ?></h1>
                                <h5><?= $secondaryTitle; ?></h5>
                                <?php if($ctaUrl) { ?>
                                    <p><a href="<?= $ctaUrl; ?>" class="btn btn-primary"><?= $cta; ?></a></p>
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
</div>