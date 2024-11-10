<?php

/**
 * Theme setup.
 */
function tailpress_setup()
{
	add_theme_support('title-tag');

	register_nav_menus(
		array(
			'primary' => __('Primary Menu', 'tailpress'),
			'mobile-menu' => __('Mobile Menu', 'tailpress'),
		)
	);

	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);

	add_theme_support('custom-logo');
	add_theme_support('post-thumbnails');

	add_theme_support('align-wide');
	add_theme_support('wp-block-styles');

	add_theme_support('responsive-embeds');

	add_theme_support('editor-styles');
	add_editor_style('css/editor-style.css');
}

add_action('after_setup_theme', 'tailpress_setup');

/**
 * Enqueue theme assets.
 */
function tailpress_enqueue_scripts()
{
	$theme = wp_get_theme();

	wp_enqueue_style('jqueryuicss', tailpress_asset('css/jquery-ui.min.css'), array(), $theme->get('Version'));
	wp_enqueue_script('jqueryuijs', tailpress_asset('js/jquery-ui.min.js'), array('jquery'), '', true);

	wp_enqueue_style('tailpress', tailpress_asset('css/app.css'), array(), $theme->get('Version'));
	wp_enqueue_script('tailpress', tailpress_asset('js/app.js'), array(), $theme->get('Version'));
}

add_action('wp_enqueue_scripts', 'tailpress_enqueue_scripts');

/**
 * Get asset path.
 *
 * @param string  $path Path to asset.
 *
 * @return string
 */
function tailpress_asset($path)
{
	if (wp_get_environment_type() === 'production') {
		return get_stylesheet_directory_uri() . '/' . $path;
	}

	return add_query_arg('time', time(),  get_stylesheet_directory_uri() . '/' . $path);
}

/**
 * Adds option 'li_class' to 'wp_nav_menu'.
 *
 * @param string  $classes String of classes.
 * @param mixed   $item The current item.
 * @param WP_Term $args Holds the nav menu arguments.
 *
 * @return array
 */
function tailpress_nav_menu_add_li_class($classes, $item, $args, $depth)
{
	if (isset($args->li_class)) {
		$classes[] = $args->li_class;
	}

	if (isset($args->{"li_class_$depth"})) {
		$classes[] = $args->{"li_class_$depth"};
	}

	return $classes;
}

add_filter('nav_menu_css_class', 'tailpress_nav_menu_add_li_class', 10, 4);

/**
 * Adds option 'submenu_class' to 'wp_nav_menu'.
 *
 * @param string  $classes String of classes.
 * @param mixed   $item The current item.
 * @param WP_Term $args Holds the nav menu arguments.
 *
 * @return array
 */
function tailpress_nav_menu_add_submenu_class($classes, $args, $depth)
{
	if (isset($args->submenu_class)) {
		$classes[] = $args->submenu_class;
	}

	if (isset($args->{"submenu_class_$depth"})) {
		$classes[] = $args->{"submenu_class_$depth"};
	}

	return $classes;
}

add_filter('nav_menu_submenu_css_class', 'tailpress_nav_menu_add_submenu_class', 10, 3);

/**
 * Defining Lazy Blocks
 */
$lazy_blocks = array();
$dir = dirname(__FILE__) . '/elements/lazyblock';
$fileNames = array();
if (is_dir($dir)) {
	$handle = opendir($dir);
	while (false !== ($file = readdir($handle))) {
		if (is_file($dir . '/' . $file) && is_readable($dir . '/' . $file)) {
			$fileNames[] = explode('.', $file)[0];
		}
	}
	closedir($handle);
	$lazy_blocks = array_reverse($fileNames);
} else {
	die('Lazyblocks not found.');
}

/* load lazyblocks */
foreach ($lazy_blocks as $lazy_block) {
	// filter for output.
	add_filter('lazyblock/' . $lazy_block . '/callback', 'lazy_block_output', 10, 2);
	// filter to remove default wrapper
	add_filter('lazyblock/' . $lazy_block . '/frontend_allow_wrapper', '__return_false');
}

if (!function_exists('lazy_block_output')) :
	/**
	 * Render Callback
	 *
	 * @param string $output - block output.
	 * @param array  $attributes - block attributes.
	 */
	function lazy_block_output($output, $attributes)
	{
		ob_start();
		set_query_var('attributes', $attributes);
		get_template_part('/elements/' . $attributes['lazyblock']['slug']);
		return ob_get_clean();
	}
endif;

if (!(function_exists('getMultiLevelArrayData'))) {
	function getMultiLevelArrayData($array = null, $key_level_1 = "", $key_level_2 = "", $default_str = "")
	{

		if (empty($array) || !is_array($array) || empty($key_level_1))
			return $default_str;

		if (array_key_exists($key_level_1, $array)) {
			if (!empty($key_level_2)) {
				if (is_array($array[$key_level_1])) {
					if (array_key_exists($key_level_2, $array[$key_level_1])) {
						return $array[$key_level_1][$key_level_2];
					}
				}
			} else {
				return $array[$key_level_1];
			}
		}

		return $default_str;
	}
}
