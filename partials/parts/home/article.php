<?php

use Cyan\Theme\Helpers\Templates;
use Cyan\Theme\Helpers\Icon;

$page_id = get_option('page_on_front');
$articles_title = get_field('articles_title', $page_id);
$articles_link = get_field('articles_link', $page_id);

$articles_args = [
    'post_type' => 'post',
    'posts_per_page' => 3,
];

$articles = new WP_Query($articles_args);
?>

<section class="container flex flex-col gap-4 my-16 max-md:my-11">

    <div class="flex justify-between items-center">
        <p class="text-5xl font-semibold max-md:text-4xl text-cynBlue"><?php echo $articles_title; ?></p>
        <a href="<?php echo $articles_link['url']; ?>" class="btn-primary py-3 px-6 text-base font-normal max-md:hidden"><?php echo $articles_link['title']; ?></a>
    </div>

    <?php if ($articles->have_posts()) : ?>

        <div class="grid grid-cols-6 grid-rows-2 gap-2 max-lg:hidden">

            <?php while ($articles->have_posts()) : $articles->the_post(); ?>
                <?php Templates::getCard('article', ['project_id' => get_the_ID()]) ?>
            <?php endwhile; ?>

        </div>

        <swiper-container class="w-full lg:hidden" slides-per-view="1.15"
            breakpoints='{ "640":  { "slidesPerView": 1.15 }, "768":  { "slidesPerView": 2.15 }, "1024": { "slidesPerView": 3.25 }, "1280": { "slidesPerView": 4 }}'
            loop="true" autoplay="true">
            <?php while ($articles->have_posts()) : $articles->the_post(); ?>
                <swiper-slide class="w-full px-2 [&_a]:my-2">
                    <?php Templates::getCard('home-blog'); ?>
                </swiper-slide>
            <?php endwhile; ?>
        </swiper-container>

    <?php endif ?>

    <div class="flex justify-center items-center md:hidden">
        <a href="<?php echo $articles_link['url']; ?>" class="btn-primary py-3 px-6 text-base font-normal"><?php echo $articles_link['title']; ?></a>
    </div>

</section>