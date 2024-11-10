<?php
$previous_post = get_previous_post();
$previous_post_url = "";
$previous_post_title = "";

$next_post = get_next_post();
$next_post_url = "";
$next_post_title = "";

if (is_a($previous_post, 'WP_Post')) {
	$previous_post_url = get_permalink($previous_post->ID);
	$previous_post_title = get_the_title($previous_post->ID);
}
if (is_a($next_post, 'WP_Post')) {
	$next_post_url = get_permalink($next_post->ID);
	$next_post_title = get_the_title($next_post->ID);
}

$title = get_the_title();
?>
<article id="post-<?php the_ID(); ?>">
	<div class="!max-w-none md:px-5">

		<div class="w-full mb-10">
			<div class="is-layout-flow wp-block-column">
				<div class="container breadcrumbs px-0">
					<p><span style="color: #5b6270;"><?php echo __('Notícias', 'wpchallenge'); ?> /</span> <span style="color: #0a4876;"><?php echo $title; ?></span></p>
				</div>
			</div>
		</div>


		<div class="container flex flex-col px-0 md:flex-row md:gap-[48px]">

			<div class="sidebar w-full md:w-[20%] min-w-[240px] hidden md:block">

				<div class="navigate mb-[41px] flex gap-[12px]">
					<a href="<?php echo $previous_post_url; ?>" alt="" title="<?php echo $previous_post_title; ?>" class="arrow arrow-sidebar arrow-left rotate-180 <?php if ($previous_post_url != "") { echo "active"; }; ?>"><img class="!w-[28px] !h-[28px] md:!w-[12.29px] md:!h-[9.56px]" src="<?php echo get_template_directory_uri() . "/assets/arrow-article.svg"; ?>" alt="<?php echo __('Seta', 'wpchallenge'); ?>" width="12.29" height="9.56"></a>
					<a href="<?php echo $next_post_url; ?>" alt="" title="<?php echo $next_post_title; ?>" class="arrow arrow-sidebar <?php if ($next_post_url != "") {echo "active";}; ?>"><img class="!w-[28px] !h-[28px] md:!w-[12.29px] md:!h-[9.56px]" src="<?php echo get_template_directory_uri() . "/assets/arrow-article.svg"; ?>" alt="<?php echo __('Seta', 'wpchallenge'); ?>" width="12.29" height="9.56"></a>
				</div>

				<div class="info mb-[56px]">
					<p class="!leading-[22px] mb-[8px] text-[#0A4876]"><?php echo get_the_date(__('j \d\e F Y')); ?></p>
				</div>

			</div>

			<div class="the-content">
				<h1 class="h2 text-[#0A4876] pb-[18px]"><?php echo $title; ?></h1>
				<?php the_content(); ?>
			</div>

		</div>

		<?php
		wp_link_pages(
			array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __('Pages:', 'tailpress') . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __('Page', 'tailpress') . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			)
		);
		?>
</article>
<script>
	(function($) {
		$(document).ready(function() {
			$('article .sidebar .arrow.arrow-sidebar:not(.active)').on("click", function(e) {
				e.preventDefault();
			});
		});
	})(jQuery);
</script>