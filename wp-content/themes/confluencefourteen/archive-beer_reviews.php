<?php get_header(); ?>
	
<div class="col-lg-12" style="background-color:#ffffff;">
		<section class="span12">
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
		</section>
	</div>

<?php get_footer(); ?>