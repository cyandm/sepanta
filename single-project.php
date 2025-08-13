<?php

use Cyan\Theme\Helpers\Templates;
use Cyan\Theme\Helpers\Icon;

$images = [];

for ($i = 1; $i <= 10; $i++) {
    $image = get_field("project_gallery_$i");
    if ($image) {
        $images[] = $image;
    }
}

$projectAttributes = [
    'project_name' => 'نام سازه',
    'project_location' => 'موقعیت مکانی',
    'project_floor' => 'تعداد طبقات',
    'project_under_area' => 'زیر بنای کل پروژه',
    'project_type' => 'نوع سازه',
    'project_faced' => 'نوع نما',
    'project_area' => 'متراژ واحد ها',
    'project_facilities' => 'سیستم تأسیسات',
    'project_security' => 'سیستم ایمنی'
];

// Get current project's terms
$current_project_terms = get_the_terms(get_the_ID(), 'project-cat');
$project_term_ids = [];

if ($current_project_terms && !is_wp_error($current_project_terms)) {
    $project_term_ids = wp_list_pluck($current_project_terms, 'term_id');
}

// First try to get projects from same category
$other_projects = new WP_Query([
    'post_type'      => 'project',
    'posts_per_page' => 4,
    'post__not_in'   => [get_the_ID()],
    'tax_query' => [
        [
            'taxonomy' => 'project-cat',
            'field' => 'term_id',
            'terms' => $project_term_ids
        ]
    ]
]);

// If no projects found in same category, get other projects
if (!$other_projects->have_posts() && !empty($project_term_ids)) {
    $other_projects = new WP_Query([
        'post_type'      => 'project',
        'posts_per_page' => 4,
        'post__not_in'   => [get_the_ID()],
        'tax_query' => [
            [
                'taxonomy' => 'project-cat',
                'field' => 'term_id',
                'terms' => $project_term_ids,
                'operator' => 'NOT IN'
            ]
        ]
    ]);
}

// If still no projects found, get all projects
if (!$other_projects->have_posts()) {
    $other_projects = new WP_Query([
        'post_type'      => 'project',
        'posts_per_page' => 4,
        'post__not_in'   => [get_the_ID()]
    ]);
}

get_header();
?>

<main class="container">

    <section class="flex gap-3 max-lg:flex-col items-center">

        <?= wp_get_attachment_image(get_post_thumbnail_id(), 'full', false, ['class' => 'object-cover object-center max-h-[440px] rounded-4xl lg:min-w-1/2']); ?>

        <div class="flex flex-col gap-3">

            <h1 class="text-cynBlack text-6xl font-semibold max-md:text-5xl"><?php the_title(); ?></h1>

            <div class="text-xl font-medium leading-9 text-cynBlue max-md:text-base">
                <?php the_content(); ?>
            </div>

        </div>

    </section>

    <section class="flex items-center gap-3 my-16 max-md:my-11 max-lg:flex-col">

        <div class="w-1/2 max-lg:w-full relative h-fit">

            <div class="mb-4">
                <p class="text-5xl max-md:text-4xl font-semibold text-cynBlack">جزییات پروژه</p>
            </div>

            <!-- اسلایدر اصلی -->
            <swiper-container
                id="product-gallery"
                class="mySwiper2 pswp-gallery"
                loop="true"
                space-between="10"
                navigation="true"
                navigation-next-el="#gallery-next"
                navigation-prev-el="#gallery-prev"
                thumbs-swiper="#swiperProductThumbs">

                <?php if (has_post_thumbnail()) : ?>
                    <swiper-slide>
                        <a href="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>" data-pswp-width="1200" data-pswp-height="800" target="_blank">
                            <?php the_post_thumbnail('full', ['class' => 'w-full h-[440px] max-sm:h-[290px] object-cover rounded-3xl']); ?>
                        </a>
                    </swiper-slide>
                <?php endif; ?>

                <?php
                if ($images) :
                    foreach ($images as $image):
                        if (get_post_thumbnail_id() == $image) continue;
                ?>
                        <swiper-slide>
                            <a href="<?php echo wp_get_attachment_image_url($image, 'full'); ?>" data-pswp-width="1200" data-pswp-height="800" target="_blank">
                                <?php echo wp_get_attachment_image($image, 'full', false, ['class' => 'w-full h-[440px] max-sm:h-[290px] object-cover object-center rounded-3xl']) ?>
                            </a>
                        </swiper-slide>
                <?php
                    endforeach;
                endif;
                ?>
            </swiper-container>

            <!-- اسلایدر تامبنیل -->
            <swiper-container
                id="swiperProductThumbs"
                class="mySwiper mt-3"
                space-between="10"
                slides-per-view="2.25"
                breakpoints='{ "420":  { "slidesPerView": 3.5 }}'
                free-mode="true"
                watch-slides-progress="true">

                <?php if (has_post_thumbnail()) : ?>
                    <swiper-slide class="cursor-pointer">
                        <?php the_post_thumbnail('full', ['class' => 'w-full h-32 object-cover rounded-lg opacity-80 hover:opacity-100 transition-opacity']); ?>
                    </swiper-slide>
                <?php endif; ?>

                <?php
                if ($images) :
                    foreach ($images as $image):
                        if (get_post_thumbnail_id() == $image) continue;
                ?>
                        <swiper-slide class="cursor-pointer">
                            <?php echo wp_get_attachment_image($image, 'full', false, ['class' => 'w-full h-32 object-cover object-center rounded-2xl opacity-80 hover:opacity-100 transition-opacity']) ?>
                        </swiper-slide>
                <?php
                    endforeach;
                endif;
                ?>
            </swiper-container>

            <!-- دکمه‌های ناوبری -->
            <div class="flex justify-between gap-3 absolute top-[41%] max-sm:top-[38%] z-10 w-full">
                <button id="gallery-prev" class="swiper-button-prev bg-cynLightBlue cursor-pointer [&_svg]:size-8 text-cynBlue rounded-full flex items-center justify-center">
                    <?php Icon::print('Arrow-19'); ?>
                </button>
                <button id="gallery-next" class="swiper-button-next bg-cynLightBlue cursor-pointer [&_svg]:size-8 text-cynBlue rounded-full flex items-center justify-center">
                    <?php Icon::print('Arrow-27'); ?>
                </button>
            </div>

        </div>

        <div class="w-1/2 max-lg:w-full flex flex-col">
            <ul class="w-full border border-cynLightBlue">

                <?php foreach ($projectAttributes as $fieldName => $fieldLabel): ?>
                    <?php $value = get_field($fieldName); ?>
                    <?php if ($value): ?>
                        <li class="nth-[odd]:bg-cynLightBlue p-3 flex justify-between items-center w-full">
                            <p class="text-base font-semibold"><?php echo $fieldLabel; ?></p>
                            <p class="text-base max-md:text-xs font-medium"><?php echo $value; ?></p>
                        </li>
                    <?php endif; ?>
                <?php endforeach; ?>

            </ul>
        </div>

    </section>

    <?php if ($other_projects->have_posts()): ?>

        <section class="flex flex-col gap-4 my-16 max-md:my-11">

            <div class="flex items-center">
                <?php
                // Determine section title based on what's being displayed
                $first_project = $other_projects->posts[0];
                $first_project_terms = get_the_terms($first_project->ID, 'project-cat');
                $current_project_terms = get_the_terms(get_the_ID(), 'project-cat');

                $same_category = false;
                if ($first_project_terms && $current_project_terms) {
                    $first_term_ids = wp_list_pluck($first_project_terms, 'term_id');
                    $current_term_ids = wp_list_pluck($current_project_terms, 'term_id');
                    $same_category = !empty(array_intersect($first_term_ids, $current_term_ids));
                }
                ?>
                <p class="text-5xl font-semibold max-md:text-4xl text-cynBlack">
                    دیگر پروژه ها
                </p>
            </div>

            <div class="flex flex-wrap gap-3">

                <?php while ($other_projects->have_posts()) : $other_projects->the_post(); ?>
                    <?php Templates::getCard('col-project', ['class' => 'max-xl:last:hidden max-lg:last:flex']) ?>
                <?php endwhile; ?>

            </div>


        </section>

    <?php endif ?>

    <?php wp_reset_postdata(); ?>

</main>

<?php get_footer() ?>