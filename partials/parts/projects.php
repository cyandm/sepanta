<?php

use Cyan\Theme\Helpers\Templates;
use Cyan\Theme\Helpers\Icon;

// Get parameters passed to this template
$args = wp_parse_args($args ?? [], [
    'page_id' => get_option('page_on_front'),
    'title' => null,
    'link' => null,
    'posts_per_page' => 4,
    'tax_query' => null,
    'post__in' => null,
    'orderby' => null,
    'exclude_current' => false,
    'current_post_id' => get_the_ID()
]);

$page_id = $args['page_id'];
$projects_title = $args['title'] ?? get_field('projects_title', $page_id);
$projects_link = $args['link'] ?? get_field('projects_link', $page_id);

$projects_args = [
    'post_type' => 'project',
    'posts_per_page' => $args['posts_per_page'],
];

// Add taxonomy query if provided
if ($args['tax_query']) {
    $projects_args['tax_query'] = $args['tax_query'];
}

// If a specific list of project IDs is provided, use it and preserve order
if (!empty($args['post__in'])) {
    $projects_args['post__in'] = array_map('intval', (array) $args['post__in']);
    $projects_args['orderby'] = 'post__in';
    // Respect the requested posts_per_page cap
    if ($args['posts_per_page'] > 0) {
        $projects_args['posts_per_page'] = (int) $args['posts_per_page'];
    } else {
        $projects_args['posts_per_page'] = count($projects_args['post__in']);
    }
}

// Allow overriding orderby explicitly if passed
if (!empty($args['orderby'])) {
    $projects_args['orderby'] = $args['orderby'];
}

// Exclude current post if requested
if ($args['exclude_current'] && $args['current_post_id']) {
    $projects_args['post__not_in'] = [$args['current_post_id']];
}

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