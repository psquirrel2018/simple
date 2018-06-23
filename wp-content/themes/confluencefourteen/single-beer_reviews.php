<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
   	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div id="primary">
    <div id="content" role="main">
  			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-6">
						<!-- Display content/loop -->
						<h1><?php the_title(); ?></h1>
						
								<div class="entry-content" style="margin-bottom:40px;"><?php the_content(); ?></div>
					</div>
					<div class="col-lg-3">
						<!-- Display featured image in right-aligned floating div -->
								<div style="margin: 20px auto;">
									<?php the_post_thumbnail( array( 300, 300 ) ); ?>
								</div>
					</div>
					<div class="col-lg-3">
                				<div style="margin-top:20px;">
									
						
								<!-- Display Title and Author Name -->
								<strong>Title: </strong><?php the_title(); ?><br />
								<?php echo esc_html( get_post_meta( get_the_ID(), 'beer', true ) ); ?>
								<br />
							   
							   <strong>Brewer: </strong><br />
								<?php echo esc_html( get_post_meta( get_the_ID(), 'meta-text-two', true ) ); ?>
								 <br />
							   <strong>Style: </strong><br />
								<?php echo esc_html( get_post_meta( get_the_ID(), 'meta-text-three', true ) ); ?>
								<br />
							   <strong>Rating: </strong><br />
								<?php echo esc_html( get_post_meta( get_the_ID(), 'meta-text-four', true ) ); ?>
								<br />
                				<!-- Display yellow stars based on rating -->
                				<strong>Rating: </strong>
                				<?php
                				$nb_stars = intval( get_post_meta( get_the_ID(), 'beer_rating', true ) );
               					for ( $star_counter = 1; $star_counter <= 5; $star_counter++ ) {
									if ( $star_counter <= $nb_stars ) {
										 echo '<img src="' . plugins_url( 'beer-reviews/images/hop.jpg' ) . '" />';
									} 
										else {
											 echo '<img src="' . plugins_url( 'beer-reviews/images/hop.jpg' ). '" />';
										}
 								}
								?>
								<!-- Display beer review contents -->
								</div>
					</div>
					
				</div>
				<div class="row" style="min-height:100px;background-color:#666666; margin-top:100px;">
						<div class="col-lg-4" style="padding:20px;">
							Put Widget in here<br>
							<a href="#" class="btn btn-info">See More IPAs</a>
						</div>
						<div class="col-lg-4" style="padding:20px;">
							Put Widget in here<br>
							<a href="#" class="btn btn-info">American Pale Ales</a>
						</div>
						<div class="col-lg-4" style="padding:20px;">
							Put Widget in here<br>
							<a href="#" class="btn btn-info">Stouts & Porters</a>
						</div>
					</div>
			</div>
    </div>
</div>
		</article>
    				<?php endwhile; endif; ?>
<?php wp_reset_query(); ?>
<?php get_footer(); ?>
<?php



