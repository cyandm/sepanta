<?php
$term_ids = $args['term_ids'] ?? [];
$postId = $args['post-id'] ?? get_the_ID();

$query_args = [
    'post_type' => 'faq',
    'fields' => 'ids',
    'tax_query' => [
        [
            'taxonomy' => 'faq-cat',
            'field' => 'term_id',
            'terms' => $term_ids,
        ]
    ]
];

$faq_group = get_posts($query_args);

if (empty($faq_group))
    return;

?>

<div class="py-6 px-4 bg-cynLightGrey divide-y divide-[#e6e7ed] rounded-3xl shadow-cxl">

    <?php foreach ($faq_group as $index => $postId) : ?>
        <?php get_template_part('partials/cards/faq', null, ['post-id' => $postId]) ?>
    <?php endforeach; ?>
</div>