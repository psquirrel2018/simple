<aside class="col-lg-6">
		<?php do_action('before_sidebar'); ?>
		<?php do_action('sidebar_begin'); ?>
    	<?php if ( ! dynamic_sidebar('sidebar1')) : ?>
    	<?php endif; ?>
		<?php do_action('sidebar_end'); ?>
		<?php do_action('after_sidebar'); ?>
</aside>
<div style="clear:both;"></div>