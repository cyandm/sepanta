<?php

use Cyan\Theme\Helpers\Templates;
use Cyan\Theme\Helpers\Icon;

// Get parameters passed to this template
$args = wp_parse_args($args ?? [], [
    'page_id' => get_option('page_on_front'),
    'title' => null,
    'posts_per_page' => 8,
    'tax_query' => null,
    'exclude_current' => false,
    'current_post_id' => get_the_ID()
]);

$page_id = $args['page_id'];
$services_title = $args['title'] ?? get_field('services_title', $page_id);

$services_args = [
    'post_type' => 'service',
    'posts_per_page' => $args['posts_per_page'],
];

// Add taxonomy query if provided
if ($args['tax_query']) {
    $services_args['tax_query'] = $args['tax_query'];
}

// Exclude current post if requested
if ($args['exclude_current'] && $args['current_post_id']) {
    $services_args['post__not_in'] = [$args['current_post_id']];
}

$services = new WP_Query($services_args);
?>

<section class="my-16 max-md:my-11 bg-no-repeat bg-size-[100%_500px] backdrop:bg-cynBlack/50 backdrop:opacity-50 bg-center py-11 max-md:py-6" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/image/noise.webp');">

    <div class="container flex flex-col gap-4">

        <div class="flex justify-between items-center">
            <p class="text-5xl font-semibold text-cynBlue max-md:text-4xl"><?php echo $services_title; ?></p>

            <div class="flex gap-2 max-md:hidden">

                <button id="servicePrev"
                    class="p-3 rounded-full bg-[#A9ACC2] cursor-pointer">
                    <div class="text-white size-4 stroke-3">
                        <?php icon::print('Arrow,-Right') ?>
                    </div>
                </button>

                <button id="serviceNext"
                    class="p-3 rounded-full bg-[#A9ACC2] cursor-pointer">
                    <div class="text-white size-4 stroke-3">
                        <?php icon::print('Left-1') ?>
                    </div>
                </button>

            </div>
        </div>

        <div class="flex flex-wrap max-md:flex-col max-md:gap-3 relative">

            <?php if ($services->have_posts()) : ?>

                <swiper-container class="w-full" slides-per-view="1.25" breakpoints='{ "640":  { "slidesPerView": 2.10 }, "768":  { "slidesPerView": 2.25 }, "1024": { "slidesPerView": 3.25 }, "1280": { "slidesPerView": 4.125 }}' loop="true" autoplay="true" space-between="6" navigation="true" navigation-next-el="#serviceNext" navigation-prev-el="#servicePrev">

                    <?php while ($services->have_posts()) : $services->the_post(); ?>

                        <swiper-slide class="w-full">

                            <?php Templates::getCard('service'); ?>

                        </swiper-slide>

                    <?php endwhile; ?>

                </swiper-container>

            <?php else: ?>

                <p class="text-center text-gray-500">هیچ خدمتی یافت نشد.</p>

            <?php endif; ?>

        </div>

    </div>

</section>