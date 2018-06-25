<?php

/* Template Name: Front page Template */

/**
 * Created by PhpStorm.
 * User: Scott Taylor
 * Date: 6/20/18
 * Time: 5:30 PM
 */
get_header();

global $post;
$intro = get_post_meta($post->ID, '_simple_frontpage_welcome_intro', true);
$welcome = get_post_meta($post->ID, '_simple_frontpage_welcome_title', true);
$welcome_copy = get_post_meta($post->ID, '_simple_frontpage_welcome_wysiwyg', true);
$welcome_image = get_post_meta($post->ID, '_simple_frontpage_intro_photo', true);

$divider_image1 = get_post_meta($post->ID, '_simple_frontpage_divider_photo1', true);
$divider_image2 = get_post_meta($post->ID, '_simple_frontpage_divider_photo2', true);


$offer_id = get_post_meta($post->ID, '_simple_frontpage_offer_id', true);
$review_id = get_post_meta($post->ID, '_simple_frontpage_review_id', true);
$reviewsUrl = get_post_meta($post->ID, '_simple_frontpage_reviewsUrl', true);
$offersUrl = get_post_meta($post->ID, '_simple_frontpage_offersUrl', true);

//$address = get_post_meta($post->ID, '_simple_frontpage_address', true);
//$long = get_post_meta($post->ID, '_simple_frontpage_long', true);
//$lat = get_post_meta($post->ID, '_simple_frontpage_lat', true);
$contact_form_id = get_post_meta($post->ID, '_simple_frontpage_gf_id', true);

$google_map = cws_theme_get_option ('cws_theme_g_map');
$slider = get_post_meta($post->ID, '_simple_frontpage_slider_option', true);
$specials = get_post_meta($post->ID, '_simple_frontpage_specials_option', true);
$didYouKnow = get_post_meta($post->ID, '_simple_frontpage_did_you_know_option', true);

?>

<?php
if ($slider === 'yes') { get_template_part('templates/custom-slider'); }
else {
    $custom_shortcode = get_post_meta($post->ID, '_simple_frontpage_custom_shortcode', true );
    ?>
        <div id="slide-container" class="container-fluid">
            <div class="row" style="height:100%;">
                <div class="col-xs-12" style="height:100%;padding:0;">
                    <?php echo do_shortcode( $custom_shortcode ); ?>
                </div>
            </div>
        </div>
<?php } ?>

<div id="intro" class="container-fluid blog-container">
    <div class="row">
        <div class="col-md-8 col col-lg-6" style="padding:0 30px;">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <h2 id="post-<?php the_ID(); ?>">
                        <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a>
                    </h2>
                    <small><!--<?//php the_time('F jS, Y') ?>--> by <?php the_author() ?></small>
                    <div class="entry">
                        <?php the_content('Read the rest of this entry &raquo;'); ?>
                    </div>
                </div>
            <?php endwhile; endif; ?>
        </div>
        <div class="col-md-4 col-lg-6">
            <img src="<?= $welcome_image; ?>" class="img-fluid" />
        </div>
    </div>
</div>

<div id="section-divider1" class="">
    <div class="row">
        <div class="col-md-12">
            <img src="<?= $divider_image1; ?>" style="width:100%;" class="img-fluid" />
        </div>
    </div>
</div>



<?php
if ($specials === 'yes') { get_template_part('templates/specials-packages'); }
else {
    $custom_shortcode2 = get_post_meta($post->ID, '_simple_frontpage_custom_shortcode2', true );
    echo do_shortcode( $custom_shortcode2 );
} ?>



<?php
if ($didYouKnow === 'yes') { get_template_part('templates/did-you-know'); }
else {
    $custom_shortcode3 = get_post_meta($post->ID, '_simple_frontpage_custom_shortcode3', true );
    echo do_shortcode( $custom_shortcode3 );
} ?>

<?php
$loop = new WP_Query(array('post_type' => 'post', 'posts_per_page' => -1, 'orderby'=> 'ASC'));
$loopResults = $loop->get_posts();
?>
<section class="blog-container">
<div id="blog" class="container">
    <div class="row">
        <div class="col-xs-12 text-center">
            <h1>Latest News</h1>
        </div>
    </div>
    <?php foreach ($loopResults as $blogPost): ?>
        <div class="row latest-post py-2">
            <?php
            $postTitle = get_the_title($blogPost->ID);
            $image_ID = get_post_thumbnail_id($blogPost->ID);
            $img_set = wp_get_attachment_image_src( $image_ID,'full');
            $width = 690; // note, how this exceeds the original image size
            $height = 460; // some pixel less than the original
            $crop = true; // if this would be false, You would get...?
            // Aqua Resizer users, You would have get a ? image here with $crop = true
            $new_image = aq_resize($img_set[0], 343, 229, true);
            ?>
            <div class="col-lg-7">
                <h4><?= $postTitle; ?></h4>
                <?php the_excerpt(); ?>
                <p><a class="btn btn-default" href="<?= get_permalink($blogPost->ID) ?>">More</a></p>
            </div>
            <div class="col-lg-5 text-center">
                <a title="<?= $postTitle; ?>" href="<?= get_permalink($blogPost->ID) ?>">
                    <?php echo '<img class="img-responsive" src="'. $new_image. '">'; ?>
                </a>
            </div>
        </div>
    <?php endforeach; ?>
</div>
</section>

<div id="section-divider2" class="">
    <div class="row">
        <div class="col-md-12">
            <img src="<?= $divider_image2; ?>" style="width:100%;" class="img-fluid" />
        </div>
    </div>
</div>

<?php get_footer(); ?>



