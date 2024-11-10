<?php
global $swiper;
if (!empty($swiper)) {
    if ($swiper['id'] != "") {
        $swiper['id'] = $swiper['id'] + 1;
    } else {
        $swiper['id'] = 1;
    }
} else {
    $swiper['id'] = 1;
}
?>
<?php if (isset($attributes['slider']) && (is_array($attributes['slider']))) : ?>
    <section class="slider-thumbs">
        <div class="container ">

            <!--gallery-->
            <div class="gallery mx-auto max-w-[900px] flex w-full">

                <!--gallery-top-->
                <div class="relative swiper-container gallery-top overflow-hidden">

                    <div class="swiper-wrapper">
                        <?php foreach ($attributes['slider'] as $slide) : ?>

                            <?php $slide_link = getMultiLevelArrayData($slide, "link"); ?>
                            <div class="swiper-slide !h-auto max-h-[300px]">
                                <div class="swiper-slide-container">

                                    <?php if (!empty($slide_link)) : ?><a href="<?php echo esc_url($slide_link); ?>"><?php endif; ?>

                                        <img class="relative !h-auto max-h-[300px] object-cover" src="<?php echo getMultiLevelArrayData($slide, "image", "url", ""); ?>" alt="<?php echo getMultiLevelArrayData($slide, "image", "alt", ""); ?>" />

                                    <?php if (!empty($slide_link)) : ?></a><?php endif; ?>

                                </div>
                            </div>

                        <?php endforeach; ?>
                    </div>

                    <!-- Add Arrows -->
                    <div class="hidden xs:block">
                        <div class="swiper-button swiper-button-prev">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/slider-arrow-previous.svg" alt="<?php echo esc_html('Anterior', 'wpchallenge'); ?>" width="13.5" height="13.5" />
                        </div>
                        <div class="swiper-button swiper-button-next">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/slider-arrow-next.svg" alt="<?php echo esc_html('Próxima', 'wpchallenge'); ?>" width="13.5" height="13.5" />
                        </div>
                    </div>
                    <div class="swiper-pagination absolute bottom-2"></div>

                </div><!--gallery-top-->

            </div><!--gallery-->
        </div>
    </section>
<?php endif; ?>
<script>
    jQuery(document).ready(function() {
        var galleryTop = new Swiper('.gallery-top', {
            navigation: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true
            },
            spaceBetween: 12,
            loop: true,
            autoplay: {
                delay: 4000,
                disableOnInteraction: false
            },
            loopedSlides: 1,
            breakpoints: {
                0: {
                    slidesPerView: 1,
                    navigation: {
                        enabled: false,
                    }
                },
                769: {
                    slidesPerView: 4,
                    navigation: {
                        enabled: true,
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev',
                    },
                }
            },
        });
    });
</script>