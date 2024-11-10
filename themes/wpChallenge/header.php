<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

	<?php wp_head(); ?>
</head>

<body <?php body_class('bg-white text-gray-900 antialiased'); ?>>

	<?php do_action('tailpress_site_before'); ?>

	<div id="page" class="min-h-screen flex flex-col">

		<?php do_action('tailpress_header'); ?>

		<header>

			<div class="mx-auto container">
				<div class="lg:flex lg:justify-between lg:items-center border-b py-6">
					<div class="flex justify-between items-center">
						<div>
							<?php if (has_custom_logo()) { ?>
								<?php the_custom_logo(); ?>
							<?php } else { ?>
								<a href="<?php echo get_bloginfo('url'); ?>" class="font-extrabold text-lg uppercase">
									<?php echo get_bloginfo('name'); ?>
								</a>

								<p class="text-sm font-light text-gray-600">
									<?php echo get_bloginfo('description'); ?>
								</p>

							<?php } ?>
						</div>

						<div class="flex items-center gap-x-3.5 md:hidden">
							<div class="">
								<a href="#" target="_blank" class="search-btn">
									<img src="<?php echo get_template_directory_uri(); ?>/assets/search-icon.svg" alt="Pesquisa" />
								</a>
							</div>
							
							<a href="#" aria-label="Toggle navigation" id="primary-menu-toggle" class="toogle-menu">
								<svg viewBox="0 0 20 20" class="inline-block w-6 h-6" version="1.1"
									xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
									<g stroke="none" stroke-width="1" fill="currentColor" fill-rule="evenodd">
										<g id="icon-shape">
											<path d="M0,3 L20,3 L20,5 L0,5 L0,3 Z M0,9 L20,9 L20,11 L0,11 L0,9 Z M0,15 L20,15 L20,17 L0,17 L0,15 Z"
												id="Combined-Shape"></path>
										</g>
									</g>
								</svg>
							</a>
						</div>
					</div>

					<div class="hidden md:flex items-center gap-[8px]">
						<?php
						wp_nav_menu(
							array(
								'container_id'    => 'primary-menu',
								'container_class' => 'hidden bg-gray-100 mt-4 p-4 lg:mt-0 lg:p-0 lg:bg-transparent lg:block',
								'menu_class'      => 'lg:flex lg:-mx-4',
								'theme_location'  => 'primary',
								'li_class'        => 'lg:mx-4',
								'fallback_cb'     => false,
							)
						);
						?>

						<div class="relative">
							<a href="#" target="_blank" class="search-btn">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/search-icon.svg" alt="Pesquisa" />
							</a>
						</div>
					</div>

					<div id="search-container" class="absolute w-full hidden left-0 top-[84px]">
						<form class="w-full md:mr-0 flex-col sm:flex-row" action="" method="get">
							<input id="search" class="w-full s-input-field h-[92px] px-[20px] py-[12px] md:px-[100px] md:py-[24px] bg-blue-200 text-[#000] text-[18px] md:text-[24px] outline-none" type="text" name="s" placeholder="Escreva a sua pesquisa aqui" value="<?php the_search_query(); ?>" />
							<a href="#" onclick="submitform()" class="w-[18px] h-[14px] absolute top-1/2 -translate-y-1/2 right-[12px] md:right-[100px]">
								<img class="arrow-img arrow-img-on-hover absolute" src="<?php echo get_template_directory_uri(); ?>/assets/arrow-icon.svg" alt="Seta" width="18" height="14" />
								<img class="arrow-img arrow-img-active absolute" src="<?php echo get_template_directory_uri(); ?>/assets/arrow-white-icon.svg" alt="Seta" width="18" height="14" />
							</a>
						</form>
					</div>

				</div>
			</div>
		</header>

		<div id="content" class="site-content flex-grow">

			<?php if (is_front_page()) { ?>
				<!-- Start introduction -->
				<div class="container mx-auto">
					<div class="px-12 py-16 my-12 rounded-xl bg-gradient-to-r from-blue-50 from-10% via-sky-100 via-30% to-blue-200 to-90%">
						<div class="mx-auto max-w-screen-md">
							<h1 class="text-3xl lg:text-6xl tracking-tight font-extrabold text-gray-800 mb-6">This is a demo for a WordPress Challange using <a href="https://tailwindcss.com" class="text-secondary">Tailwind CSS</a> made by <a href="https://tailpress.io" class="text-primary">João Santos</a>.</h1>
							<p class="text-gray-600 text-xl font-medium mb-10">TailPress is your go-to starting
								point for developing WordPress themes with Tailwind CSS and comes with basic block-editor support out
								of the box.</p>
							<a href="https://github.com/joaosantos"
								class="w-full sm:w-auto flex-none bg-gray-900 text-white text-lg leading-6 font-semibold py-3 px-6 border border-transparent rounded-xl focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-gray-900 focus:outline-none transition-colors duration-200 hover:text-[#000] hover:bg-[#fff]">View on GitHub</a>
						</div>
					</div>
				</div>
				<!-- End introduction -->
			<?php } ?>

			<?php do_action('tailpress_content_start'); ?>

			<main>