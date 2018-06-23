<?php /*
Template Name: Story Page Template
*/
?>

<?php get_header (); ?>

<div class="container-fluid">
	<div class="col-lg-12">
				<?php do_action('after_nav'); ?>
		</div>
	<div class="row">
		<?php get_template_part('story_content'); ?>
	</div>
	<div class="col-lg-12">
		<?php get_template_part('story1'); ?>
	</div>
	
</div>

<?php get_footer (); ?>
