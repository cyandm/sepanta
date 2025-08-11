<?php

use Cyan\Theme\Helpers\Templates;
use Cyan\Theme\Helpers\Icon;

$testimonials_args = [
    'post_type' => 'testimonial',
    'posts_per_page' => 6,
];

$testimonials = new WP_Query($testimonials_args);

$page_id = get_option('page_on_front');
$testimonials_title = get_field('testimonials_title', $page_id);
$testimonials_link = get_field('testimonials_link', $page_id);
?>

<section class="container flex flex-col gap-3 my-16 max-md:my-11">

    <div class="flex justify-between items-start">
        <p class="text-5xl font-semibold max-md:text-4xl text-cynBlue"><?php echo $testimonials_title; ?></p>
        <a href="<?php echo $testimonials_link['url']; ?>" class="size-10 text-[#E6772D] flex">
            <?php Icon::print('Google-2'); ?>
        </a>
    </div>

    <?php if ($testimonials->have_posts()) : ?>

        <div class="flex flex-wrap max-md:flex-col max-md:gap-0 gap-5">

            <?php while ($testimonials->have_posts()) : $testimonials->the_post(); ?>
                <?php Templates::getCard('testimonial', ['testimonial_id' => get_the_ID()]) ?>
            <?php endwhile; ?>

        </div>

    <?php endif ?>

</section>