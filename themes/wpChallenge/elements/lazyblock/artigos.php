<?php
global $wp;
$h = '';
$n_articles = 6;

$title = getMultiLevelArrayData($attributes, "title");
$description = getMultiLevelArrayData($attributes, "description");
$max_quantity = getMultiLevelArrayData($attributes, "max_quantity");
if (is_numeric($max_quantity) && ($max_quantity > 0)) {
    $n_articles = $max_quantity;
}

$args = array(
    'post_type'  => 'post',
    'post_status' => 'publish',
    'posts_per_page' => $n_articles
);
$query = new WP_Query($args);

if ($query->have_posts()) :
    while ($query->have_posts()) :

        $query->the_post();
        $post_thumbnail = get_the_post_thumbnail_url($post->ID);
        $post_title = get_the_title();
        $post_date = get_the_date('F Y');
        $post_content = get_the_content();

        $h .= "<div class='card flex flex-col'>
                    <a class='cursor-pointer article-img' href='" . get_the_permalink($post->ID) . "'>
                        <img class='w-full h-full object-cover' src='${post_thumbnail}' title='${post_title}' alt='${post_title}'/>
                    </a>
                    <div class='flex flex-col justify-between p-[24px]'>
                        <div>
                            <div class='flex gap-[32px] justify-between items-center'>
                            <h4 class='font-bold pb-[16px] text-[#262A34] leading-2'>{$post_title}</h4>
                            <a class='arrow top-0 right-0' href='" . get_the_permalink($post->ID) . "'>
                                <img src='" . get_template_directory_uri() . "/assets/arrow-article.svg' alt='Seta' width='18' height='14' />
                            </a>
                            </div>
                            <h6 class='text-[#90959E] text-[14px] font-light leading-3'>{$post_date}</h6>
                        </div>  
                    </div>
                </div>";
    endwhile;
endif;
wp_reset_postdata();
?>

<section class="artigos relative">
    <div class="absolute top-0 left-0 w-full h-[105px] bg-[#FFFFFF]"></div>
    <div class="container relative z-1">

        <?php if (!empty($title)): ?>
            <div class="title-wrapper pb-8 md:pb-6">
                <h2><?php echo esc_attr($title); ?></h2>

                <?php if (!empty($description)): ?>
                    <p class="mt-2"><?php echo esc_attr($description); ?></p>
                <?php endif; ?>
            </div>

        <?php endif; ?>

        <div class="cards grid grid-cols-1 md:grid-cols-3 gap-[46px]">
            <?php
            echo $h;
            ?>
        </div>
    </div>
</section>
<script>
    (function($) {
        $("section.artigos .card a.arrow").on("mouseover", function() {
                $(this).closest(".card").addClass("active");
            })
            .on("mouseleave", function() {
                $(this).closest(".card").removeClass("active");
            });
    })(jQuery);
</script>