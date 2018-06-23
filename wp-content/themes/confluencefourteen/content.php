<div class="container-fluid">
		<div class="col-lg-12">
				<?php //do_action('after_nav'); ?>
		</div>
	</div>
<hr>
<div class="col-lg-12">
			<section class="paragraph-section">
				<div class="secondary beta centered">		
					<?php if ( ! dynamic_sidebar('sidebar2')) : ?>
					<?php endif; ?>
				</div>
			</section>
	<hr>	
</div>

<div class="col-lg-6" style="background-color:#ffffff;">
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


