<?php
global $wp;
$h = '';
$filters = array();

if (!empty($_GET['filtro'])) {

    $filter_order = 'ASC';
    switch ($_GET['filtro']) {
        case 'data':
            $filter_by = 'date';
            break;
        case 'data desc':
            $filter_by = 'date';
            $filter_order = 'DESC';
            break;
        default:
            $filter_by = 'date';
    }

    $filters = array(
        'orderby'    => $filter_by,
        'order'      => $filter_order
    );
}

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array(
    'post_type'  => 'evento',
    'post_status' => 'publish',
    'posts_per_page' => 10,
    'paged' => $paged
);
$args = array_merge($args, $filters);
$query = new WP_Query($args);

if ($query->have_posts()) {
    while ($query->have_posts()) {
        $query->the_post();
        $post_thumbnail = get_the_post_thumbnail_url($post->ID);
        $title = get_the_title();
        $date = get_the_date('Y');
        $content = get_the_content();
        $url = get_the_permalink($post->ID);

        $excerpt = get_the_excerpt();
        if ($excerpt == '') {
            $content = get_the_content();
            $content = apply_filters('the_content', $content);
            $content = str_replace(']]>', ']]>', $content);
            $content = strip_tags($content);
            $excerpt = substr($content, 0, 46);
            if (strlen($excerpt) > 46) {
                $excerpt .= '…';
            }
        } else {
            if (strlen(get_the_excerpt()) > 46) {
                $excerpt = substr(get_the_excerpt(), 0, 46);
                $excerpt .= '…<br/>';
            }
        }

        $arrow = "";
        if ($url != "") {
            $arrow = "<a href='${url}' target='_blank' alt='' title='' class='arrow'><img src='" . get_template_directory_uri() . "/assets/arrow-article.svg' alt='" . __('Seta', 'wpchallenge') . "' width='18' height='14' /></a>";
        }
        $h .= "<div class='evento w-full flex flex-col md:flex-row justify-between items-center p-[20px]'>
                <div class='flex items-center md:w-[20%] mb-[0] gap-[10px]'>
                    <h4 class='text-[#0A4876]'>$title</h4>
                </div>
                <div class='flex flex-1 items-center'>
                    <p class='flex-1  text-[#5B6270] !text-[14px] !leading-[18px] px-[18px] py-[5px]'>$excerpt</p>
                    $arrow
                </div>
            </div>";
    }
}
wp_reset_postdata();
?>
<section class="eventos">
    <div class="container">

        <form class='eventos-filters'>

            <div class="flex flex-col mb-[30px] md:flex-row md:mb-[60px]">
                <select class="filtro p-2 bg-neutral-50 text-[#5B6270] outline-none" name="filtro">
                    <?php
                    $orderby_options = array(
                        'data' => __('Mais Recentes', 'wpchallenge'),
                        'data desc' => __('Mais Antigos', 'wpchallenge')
                    );

                    foreach ($orderby_options as $value => $label) {
                    ?>
                        <option value='<?php echo $value; ?>' <?php if (!empty($_GET['filtro'])) {selected($_GET['filtro'], $value);} ?>><?php echo $label; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
        </form>

        <div class="grid grid-cols-1">
            <?php
            if ($h != '') {
                echo $h;
            }
            ?>
        </div>


        <div class='mt-[46px] text-[#90959E] text-[14px] flex justify-center md:justify-between'>
            <div class="hidden md:block">
                <?php
                if ($h != '') {
                    echo "<p>" . __('Pag. ' . $paged . ' de ' . $query->max_num_pages, 'wpchallenge') . "<p>";
                } else {
                    echo "<p>" . __('0 Resultados', 'wpchallenge') . "<p>";
                }
                ?>
            </div>
            <div class="right flex gap-[18px]">
                <?php 
                $arrow_left = '<img class="!w-[12.29px] !h-[9.56px] rotate-180" src="' . get_template_directory_uri() . '/assets/arrow-article.svg" alt="' . __('Seta', 'wpchallenge') . '" width="12.29" height="9.56">';
                $arrow_right = '<img class="!w-[12.29px] !h-[9.56px]" src="' . get_template_directory_uri() . '/assets/arrow-article.svg" alt="' . __('Seta', 'wpchallenge') . '" width="12.29" height="9.56">';
                ?>
                <div>
                    <?php if ($paged == 1) { ?>
                        <span class="flex items-center font-semibold opacity-30 gap-[7px]">
                            <?php 
                            echo $arrow_left;
                            echo __('Anterior', 'wpchallenge'); ?>
                        </span>
                    <?php }
                    previous_posts_link('<span class="flex items-center font-semibold gap-[7px]">' . $arrow_left . __('Anterior', 'wpchallenge') . '</span>') ?>
                </div>
                <div class="align_right">
                    <?php if ($paged == $query->max_num_pages) { ?>
                        <span class="flex items-center font-semibold opacity-30 gap-[7px]">
                            <?php 
                            echo __('Próxima', 'wpchallenge');
                            echo $arrow_right; ?>
                            </span>
                    <?php }
                    next_posts_link('<span class="flex items-center font-semibold gap-[7px]">' . __('Próxima', 'wpchallenge') .  $arrow_right . '</span>', $query->max_num_pages) ?>
                </div>
            </div>

        </div>
    </div>
</section>