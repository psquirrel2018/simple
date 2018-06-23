
	<section id="footer" style="padding:60px 0;">
		<div class="row">
			<div class="col-md-4 padding-y-md" style="padding:0 60px;">
                <h2 class="text-center">This is Footer 1</h2>
				<?php if ( ! dynamic_sidebar('footer1')) : ?>

				<?php endif; ?>
			</div>
			<div class="col-md-4 padding-y-md" style="padding:0 60px;">
                <h2 class="text-center">This is Footer 2</h2>
				<?php if ( ! dynamic_sidebar('footer2')) : ?>
				<?php endif; ?>
			</div>
			<div class="col-md-4 padding-y-md" style="padding:0 60px;">
                <h2 class="text-center">This is Footer 3</h2>
				<?php if ( ! dynamic_sidebar('footer3')) : ?>
				<?php endif; ?>
			</div>
		</div>
	</section>
 
<div class="container-fluid" style="background-color:#231F1D; color:#cccccc; text-align:center; line-height:2em; min-height:60px;">
			<?php echo get_theme_mod('footer_text', 'WordPress site built by Conluence using Bootstrap'); ?>
</div>
	
<?php wp_footer(); ?>
</body>
</html>

<!--
<div class="row">
  <div class="col-md-4">.col-md-4</div>
  <div class="col-md-4">.col-md-4</div>
  <div class="col-md-4">.col-md-4</div>
</div>-->


