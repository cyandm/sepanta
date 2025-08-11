<?php
// Accept args for flexibility: selecting by post__in (ACF) or by taxonomy
$args = wp_parse_args($args ?? [], [
    'posts_per_page' => -1,
    'post__in' => null,
    'tax_query' => null,
    'term_ids' => null, // convenience to build tax_query for faq-cat
    'orderby' => 'menu_order',
    'order' => 'ASC',
]);

$query_args = [
    'post_type' => 'faq',
    'posts_per_page' => $args['posts_per_page'],
    'post_status' => 'publish',
    'orderby' => $args['orderby'],
    'order' => $args['order'],
    'fields' => 'ids',
];

if (!empty($args['post__in'])) {
    $query_args['post__in'] = array_map('intval', (array) $args['post__in']);
    $query_args['orderby'] = 'post__in';
}

if (!empty($args['term_ids']) && empty($args['tax_query'])) {
    $query_args['tax_query'] = [[
        'taxonomy' => 'faq-cat',
        'field' => 'term_id',
        'terms' => array_map('intval', (array) $args['term_ids']),
    ]];
}

if (!empty($args['tax_query'])) {
    $query_args['tax_query'] = $args['tax_query'];
}

$faqs = get_posts($query_args);

if (empty($faqs)) {
    return;
}
?>

<section class="container my-16 max-md:my-11 flex flex-col gap-4" id="faq">
    <div class="text-5xl font-semibold text-cynBlue max-md:text-4xl">
        <?php _e('اگه سوالی داری...', 'cyn-dm') ?>
    </div>

    <div class="fade-in-down" anim-delay="0.2">
        <div class="py-2 px-4 bg-cynLightGrey divide-y divide-[#e6e7ed] rounded-3xl shadow-cxl">
            <?php foreach ($faqs as $postId) : ?>
                <?php get_template_part('partials/cards/faq', null, ['post-id' => $postId]) ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>