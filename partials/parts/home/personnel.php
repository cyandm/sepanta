<?php

use Cyan\Theme\Helpers\Templates;
use Cyan\Theme\Helpers\Icon;

$page_id = get_option('page_on_front');
$personnel_title = get_field('personnel_title', $page_id);
$personnel_link = get_field('personnel_link', $page_id);

$personnel_args = [
    'post_type' => 'personnel',
    'posts_per_page' => 3,
    'tax_query' => [
        [
            'taxonomy' => 'personnel-cat',
            'field' => 'slug',
            'terms' => 'managers'
        ]
    ]
];

$personnel = new WP_Query($personnel_args);
?>

<section class="container flex flex-col gap-4 my-16 max-md:my-11">

    <div class="flex justify-between items-center">
        <p class="text-5xl font-semibold max-md:text-4xl text-cynBlue"><?php echo $personnel_title; ?></p>
        <a href="<?php echo $personnel_link['url']; ?>" class="btn-primary py-3 px-6 text-base font-normal max-md:hidden"><?php echo $personnel_link['title']; ?></a>
    </div>

    <div class="flex gap-3 max-md:flex-col max-lg:flex-wrap">

        <?php while ($personnel->have_posts()) : $personnel->the_post(); ?>
            <?php Templates::getCard('personnel') ?>
        <?php endwhile; ?>

    </div>

    <div class="flex justify-center items-center md:hidden">
        <a href="<?php echo $personnel_link['url']; ?>" class="btn-primary py-3 px-6 text-base font-normal"><?php echo $personnel_link['title']; ?></a>
    </div>

</section>