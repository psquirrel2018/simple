	
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
			
			<?php $args = array( 'post_type' => 'story', 'posts_per_page' => 10 ); ?>
			<?php $loop = new WP_Query( $args ); ?>
			<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
  			<?php the_title(); ?>
  			<?php echo '<div class="entry-content">'; ?>
  			<?php the_content(); ?>
  			<?php echo '</div>'; ?>
		<?php endwhile; ?>
			
			
			<?php $args = array( 'post_type' => 'places', 'posts_per_page' => 10 ); ?>
			<?php $loop = new WP_Query( $args ); ?>
			<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
  			<?php the_title(); ?>
  			<?php echo '<div class="entry-content">'; ?>
  			<?php the_content(); ?>
  			<?php echo '</div>'; ?>
		<?php endwhile; ?>
			
			
		</section>
	</div>


