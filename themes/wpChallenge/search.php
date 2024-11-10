<?php get_header(); ?>
<?php
global $wp;

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$qvar = $wp->query_vars['s'];
$args = array(
	'post_type'  => "post",
	'post_status' => 'publish',
	'posts_per_page' => 12,
	'paged' => $paged
);
if (!empty($qvar)) {
	$args["s"] = $qvar;
}
$loop = new WP_Query($args);
$found_posts = $loop->found_posts;
?>
<section class="search">
	<div class="container mx-auto">

		<div class="search-form md:px-[90px]">
			<form action="http://localhost/wpChallenge/?s=a" method="get" class="search-form  my-[28px] pb-[8px]">
				<input class="w-100 s-input-field border-b-2 border-b-slate-800 outline-none" type="text" name="s" id="search" value="<?php the_search_query(); ?>" />
				<input type="submit" value="&nbsp;">
			</form>
		</div>
		<?php if ($found_posts > 0) : ?>
			<div class="results-wrapper md:px-[90px] mb-[92px]">
				<p class="mb-[4px] !text-[28px] !leading-[34px] font-medium"><?php _e("Resultados da pesquisa para “{$qvar}”", "wpchallenge"); ?></p>
				<p class="mb-[32px] text-[#8E9093] !text-[12px] tracking-[0.38px] !leading-[18px]"><?php
					$total = intVal($found_posts);

					if ($total == 1) {
						_e("1 resultado encontrado", "wpchallenge");
					} else {
						_e("$total resultados encontrados", "wpchallenge");
					}
					?></p>
				<?php
				if ($found_posts > 0) :
					if ($loop->have_posts()) :
						while ($loop->have_posts()) :
							$loop->the_post();

							$title = get_the_title();
							$excerpt = get_the_excerpt();
							if (strlen($excerpt) > 999) {
								$excerpt = substr($excerpt, 0, 999);
								$excerpt .= "…";
							}
							$permalink = get_the_permalink($post->ID);
				?>
					<p class="p2 leading-[24px] tracking-[0.5px] underline"><a class="" href="<?php echo esc_url($permalink); ?>"><?php echo esc_attr($title); ?></a></p>
					<p class="line-clamp excerpt p2 leading-[24px] tracking-[0.5px] mb-[42px]" style="color: rgba(0,0,0,0.7)"><?php echo $excerpt; ?></p>
				<?php
						endwhile;
					endif;
				endif;
				?>

				<div class="flex justify-between">
					<div>
						<p class="text-[#8E9093] !text-[12px] tracking-[0.38px] !leading-[18px]"><?php
						$counter = $paged * 10;

						if ($counter > $total)
							$counter = $total;

						_e("$counter de $total resultados", "wpchallenge");
						?>
						</p>
					</div>
					<div class="pagination flex align-items gap-[8px]">
						<?php
						echo paginate_links(array(
							'base'         => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
							'total'        => $loop->max_num_pages,
							'current'      => $paged,
							'format'       => '?paged=%#%',
							'show_all'     => false,
							'type'         => 'plain',
							'end_size'     => 0,
							'mid_size'     => 0,
							'prev_next'    => true,
							'prev_text'    => "<img src='" . get_template_directory_uri() . "/assets/svg/Icones-Actions/icn-arrow-back-gray.svg' alt='' width='14' height='14' />",
							'next_text'    => "<img src='" . get_template_directory_uri() . "/assets/arrow-article.svg' alt='' width='14' height='14' />",
							'add_args'     => false,
							'add_fragment' => '',
						));
						?>
					</div>
				</div>

			</div><!--.results-wrapper-->
			<?php wp_reset_postdata(); ?>
		<?php else: ?>
			<div class="px-[90px]">
				<div class="flex items-center gap-[10px] mb-[400px]">
					<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/info-red-icon.svg" alt="" width="24" height="24" />
					<p class="p1"><?php _e("Não foram encontrados resultados para a sua pesquisa", "wpchallenge"); ?></p>
				</div>
			</div>
		<?php endif; ?>
	</div>
</section>
<style>
	.search-results .pagination a {
		display: flex;
		align-items: center;
	}

	.search-results .pagination .page-numbers:not(.prev, .next, .current) {
		display: none !important;
	}
</style>
<?php get_footer(); ?>