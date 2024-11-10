<?php get_header(); ?>

<div class="container my-8 mx-auto">

	<?php if (is_single() && ("post" === get_post_type() || "evento" === get_post_type())): ?>
		<?php get_template_part('template-parts/content', 'single'); ?>
	<?php else: ?>
		<?php echo do_shortcode(the_content()); ?>
	<?php endif; ?>

</div>

<?php
get_footer();
