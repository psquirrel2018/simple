<?php
/**
 * Created by PhpStorm.
 * User: Scott Taylor
 * Date: 5/2/18
 * Time: 11:19 AM
 */
?>

        <!-- About Us Start -->
        <div class="col-sm-3 widget">
        <?php if ( ! dynamic_sidebar('footer1')) : ?>
        <?php endif; ?>
        </div>
        <!-- About Us End -->

        <!-- Quick Links Start -->
        <div class="col-sm-3 widget">
            <?php if ( ! dynamic_sidebar('footer2')) : ?>
            <?php endif; ?>
        </div>
        <!-- Quick Links End -->

        <!-- Newsletter Start -->
        <div class="col-sm-3 widget">
            <?php if ( ! dynamic_sidebar('footer3')) : ?>
            <?php endif; ?>
        </div>
        <!-- Newsletter End -->

        <!-- Contact Start -->
        <div class="col-sm-3 widget">
            <?php if ( ! dynamic_sidebar('footer4')) : ?>
            <?php endif; ?>
        </div>
        <!-- Contact End -->