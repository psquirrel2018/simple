<hr>
<div class="col-lg-12">
	<div class="col-lg-6">

						<?php if ( ! dynamic_sidebar('story1img')) : ?>
						<?php endif; ?>
	</div>
	<div class="col-lg-6">
						<?php if ( ! dynamic_sidebar('story1')) : ?>
						<?php endif; ?>	
	</div>
</div>

<div class="col-lg-12">
			<section class="paragraph-section">
				<div class="secondary beta centered">		
					<?php if ( ! dynamic_sidebar('sidebar4')) : ?>
					<?php endif; ?>
				</div>
			</section>
</div>
<hr>
<div class="col-lg-12" style="background-color:#f2f2f2;">
<div class="col-lg-6">
				
					<?php if ( ! dynamic_sidebar('story2')) : ?>
					<?php endif; ?>
</div>
<div class="col-lg-6">
					<?php if ( ! dynamic_sidebar('story2img')) : ?>
					<?php endif; ?>	
</div>
</div>
<div class="col-lg-12" style="background-color:#ffffff;">
			<section class="paragraph-section">
				<div class="secondary beta centered">		
					<?php if ( ! dynamic_sidebar('sidebar3')) : ?>
					<?php endif; ?>
				</div>
			</section>
</div>

<div class="container-fluid">
	<div class="row" style="padding-top:10px;">
		
			<!--<section class="paragraph-section">
				<div class="secondary beta centered">	-->	
					
				<?php $args = array( 'post_type' => array( 'story', 'places', 'beer_reviews' ), 
									 'posts_per_page'      => 6,
				);
					$query = new WP_Query( $args ); 
					$loop = new WP_Query( $args );
					while ( $loop->have_posts() ) : $loop->the_post();
					echo '<div class="row" style="padding-top:10px;"><div class="col-lg-3">'; 
					  the_post_thumbnail( array( 300, 300 ) ); 
					echo '</div>';
					echo '<div class="col-lg-9">'; 
						the_title(); 
					echo '<br>';
						the_content();	
					echo '</div></div>';
						endwhile; ?>
				<!--</div>
			</section>-->
		</div>
</div>