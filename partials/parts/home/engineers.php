<?php

use Cyan\Theme\Helpers\Templates;
use Cyan\Theme\Helpers\Icon;

$page_id = get_option('page_on_front');
$engineers_title = get_field('engineers_title', $page_id);
$engineers_link = get_field('engineers_link', $page_id);

$engineers_args = [
    'post_type' => 'engineer',
    'posts_per_page' => 3,
    'tax_query' => [
        [
            'taxonomy' => 'engineer-cat',
            'field' => 'slug',
            'terms' => 'managers'
        ]
    ]
];

$engineers = new WP_Query($engineers_args);
?>

<section class="container flex flex-col gap-4 my-16 max-md:my-11">

    <div class="flex justify-between items-center">
        <p class="text-5xl font-semibold max-md:text-4xl text-cynBlack"><?php echo $engineers_title; ?></p>
        <a href="<?php echo $engineers_link['url']; ?>" class="btn-primary py-3 px-6 text-base font-normal max-md:hidden"><?php echo $engineers_link['title']; ?></a>
    </div>

    <div class="flex gap-3 max-md:flex-col max-lg:flex-wrap">

        <?php while ($engineers->have_posts()) : $engineers->the_post(); ?>
            <?php Templates::getCard('engineer') ?>
        <?php endwhile; ?>

    </div>

    <div class="flex justify-center items-center md:hidden">
        <a href="<?php echo $engineers_link['url']; ?>" class="btn-primary py-3 px-6 text-base font-normal"><?php echo $engineers_link['title']; ?></a>
    </div>

</section>