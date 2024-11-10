<?php
global $swiper;
?>
</main>

<?php do_action('tailpress_content_end'); ?>

</div>

<?php do_action('tailpress_content_after'); ?>

<footer id="colophon" class="site-footer bg-gray-50 py-12" role="contentinfo">
	<?php do_action('tailpress_footer'); ?>

	<div class="container mx-auto text-center text-gray-500">
		&copy; <?php echo date_i18n('Y'); ?> - <?php echo get_bloginfo('name'); ?>
	</div>
</footer>

</div>

<div id="menu" class="top-0 z-[200] bg-blue-200 ">
    <header class="mobile-header relative w-full flex mx-auto">
        <div class="container mx-auto flex justify-end gap-[0px] flex-row sm:gap-[0px]">
            <div class="header-right flex flex-row-reverse md:flex-row items-center">
                <a href="#" class="toogle-menu mobile flex mt-[15px]">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 mm-close" viewBox="0 0 20 20" fill="#F2EFE3">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </a>
            </div>
        </div>
    </header>
    <div class="content">
        <?php
        wp_nav_menu(
            array(
                'container_id'    => 'mobile-menu',
                'container_class' => 'container',
                'menu_class'      => '',
                'theme_location'  => 'mobile-menu',
                'li_class'        => '', 
                'fallback_cb'     => false, 
            )
        );
        ?>
    </div>
</div>
<script type="text/javascript">
(function($) {
	$(function(){
		$(document).on("click", "#primary-menu-toggle", function(e) { 
			$(this).toggleClass('opened');
		});
	});
})(jQuery);
//mobile menu
if( document.querySelectorAll(".toogle-menu").length ) {
	document.querySelectorAll(".toogle-menu").forEach(function(element){
		element.addEventListener('click', function () {
			const menu = document.getElementById("menu");
			if(menu.classList.contains("show")) {
				menu.classList.remove("show");
				document.querySelector("body").classList.remove("menu-opened");
			} else {
				menu.classList.add("show");
				document.querySelector("body").classList.add("menu-opened");
			}
		});
	});
}
</script> 

<?php wp_footer(); ?>

<?php
if (!empty($swiper)) {

	if ($swiper['id'] > 0) { ?>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
		<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
		<?php if (!empty($swiper)): ?>
			<?php if (array_key_exists("js", $swiper)): ?>
				<script>
					jQuery(document).ready(function() {
						<?php
						echo $swiper['js'];
						?>
					});
				</script>
			<?php endif; ?>
		<?php endif; ?>
		<style>
			<?php
			foreach ($swiper['css'] as $key => $css) {
				echo '#swiper_' . $key . ' ' . implode('#swiper_' . $key . ' ', $css);
			}
			?>
		</style>
<?php
	}
}
?>
</body>
</html>