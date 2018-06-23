<?php
/**
 * Created by PhpStorm.
 * User: circdominic
 * Date: 2/23/18
 * Time: 9:18 AM
 */
global $post;
$tools_id = '70';

?>
<div class="flex-center flex-justify flex-column center full-height">
    <div id="tools" class="container">
        <div class="row" style="padding-bottom:60px;">
            <div class="col-sm-12 text-center">
                <h1>The Tools We Use <?php //echo $tools_id; ?></h1>
                <h5>We love technology. A few of our favorite solutions we use to power marketing results, include:</h5>
            </div>
        </div>
        <div class="row">
            <?php $hpTools = get_post_meta( $tools_id, 'larson_tools_group', true );
            //echo $hpTools;
            foreach ( (array) $hpTools as $tool ) {
                $tool_img =  '';
                if ( isset( $tool['image_id'] ) ) {
                    $tool_img = wp_get_attachment_image( $tool['image_id'], 'share-pick', null, array(
                        'class' => 'thumb img-responsive',
                    ) );
                } ?>
                <!-- Slide container -->
                <div class="col-xs-6 col-md-3 text-center">
                    <?= $tool_img; ?>

                </div>
            <?php }  ?>
        </div>
    </div>
</div>



