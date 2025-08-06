<?php

use Cyan\Theme\Helpers\Templates;
use Cyan\Theme\Helpers\Icon;

$projects_title = get_field('projects_title');
$projects_link = get_field('projects_link');

$projects_args = [
    'post_type' => 'project',
    'posts_per_page' => 4,
];

$projects = new WP_Query($projects_args);
?>

<section class="container flex flex-col gap-4 my-16 max-md:my-11">

    <div class="flex justify-between items-center">
        <p class="text-5xl font-semibold max-md:text-4xl text-cynBlue"><?php echo $projects_title; ?></p>
        <a href="<?php echo $projects_link['url']; ?>" class="btn-primary py-3 px-6 text-base font-normal max-md:hidden"><?php echo $projects_link['title']; ?></a>
    </div>

    <?php if ($projects->have_posts()) : ?>

        <div class="flex flex-wrap max-md:flex-col max-md:gap-3">

            <?php while ($projects->have_posts()) : $projects->the_post(); ?>
                <?php Templates::getCard('project', ['project_id' => get_the_ID()]) ?>
            <?php endwhile; ?>

        </div>

    <?php endif ?>

    <div class="flex justify-center items-center md:hidden">
        <a href="<?php echo $projects_link['url']; ?>" class="btn-primary py-3 px-6 text-base font-normal"><?php echo $projects_link['title']; ?></a>
    </div>

</section>