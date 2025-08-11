<?php /* Template Name: Service */ ?>

<?php

use Cyan\Theme\Helpers\Templates;
use Cyan\Theme\Helpers\Icon;

$current_post_id = get_the_ID();

$project_title = get_field('project_title', get_the_ID());
$project_link = get_field('project_link', get_the_ID());
$project_selected = get_field('project_post', get_the_ID());

// Get current service categories
$current_service_terms = get_the_terms(get_the_ID(), 'service-cat');
$service_term_ids = [];
if ($current_service_terms && !is_wp_error($current_service_terms)) {
    $service_term_ids = wp_list_pluck($current_service_terms, 'term_id');
}

// Get current project categories (if any)
$current_project_terms = get_the_terms(get_the_ID(), 'project-cat');
$project_term_ids = [];
if ($current_project_terms && !is_wp_error($current_project_terms)) {
    $project_term_ids = wp_list_pluck($current_project_terms, 'term_id');
}

$services_title = get_field('services_title', get_the_ID());
$service_faqs = get_field('service_faqs', get_the_ID());

get_header(); ?>

<main>

    <section class="container flex gap-3 max-lg:flex-col items-center">

        <?= wp_get_attachment_image(get_post_thumbnail_id(), 'full', false, ['class' => 'object-cover object-center max-h-[440px] rounded-4xl lg:min-w-1/2']); ?>

        <div class="flex flex-col gap-3">

            <h1 class="text-cynBlack text-6xl font-semibold max-md:text-5xl"><?php the_title(); ?></h1>

            <div class="text-xl font-medium leading-9 text-cynBlue max-md:text-base">
                <?php the_content(); ?>
            </div>

            <a href="#" class="btn-secondary w-fit py-3 px-6 text-base font-normal text-white max-md:w-auto text-center">
                راه های ارتباطی
            </a>

        </div>

    </section>

    <?php
    // Normalize ACF Post Object(s) to an array of IDs
    $project_ids = [];
    if (!empty($project_selected)) {
        if (is_array($project_selected)) {
            foreach ($project_selected as $proj) {
                $project_ids[] = is_object($proj) ? $proj->ID : (int) $proj;
            }
        } else {
            $project_ids[] = is_object($project_selected) ? $project_selected->ID : (int) $project_selected;
        }
        $project_ids = array_filter(array_map('intval', $project_ids));
    }
    ?>

    <?php if (!empty($project_ids)): ?>
        <?php Templates::getPart('projects', [
            'post__in' => $project_ids,
            'posts_per_page' => 6,
            'title' => $project_title,
            'exclude_current' => false
        ]); ?>
    <?php elseif (!empty($project_term_ids)): ?>
        <?php Templates::getPart('projects', [
            'posts_per_page' => 6,
            'tax_query' => [
                [
                    'taxonomy' => 'project-cat',
                    'field' => 'term_id',
                    'terms' => $project_term_ids,
                    'operator' => 'IN'
                ]
            ],
            'title' => $project_title,
            'exclude_current' => false
        ]); ?>
    <?php else: ?>
        <?php Templates::getPart('projects', [
            'posts_per_page' => 6,
            'title' => 'پروژه‌های اخیر'
        ]); ?>
    <?php endif; ?>

    <?php if (!empty($service_term_ids)): ?>
        <?php Templates::getPart('services', [
            'posts_per_page' => 8,
            'post__not_in' => [$current_post_id], // اضافه شد برای حذف پست فعلی
            'tax_query' => [
                [
                    'taxonomy' => 'service-cat',
                    'field' => 'term_id',
                    'terms' => $service_term_ids,
                    'operator' => 'IN' // اضافه شد برای مشخص کردن عملیات
                ]
            ],
            'title' => $services_title,
            'exclude_current' => true,
            'current_post_id' => $current_post_id
        ]); ?>
    <?php endif; ?>

    <?php Templates::getPart('testimonials') ?>

    <?php
    // Normalize ACF Post Object(s) for service-specific FAQs
    $faq_ids = [];
    if (!empty($service_faqs)) {
        if (is_array($service_faqs)) {
            foreach ($service_faqs as $f) {
                $faq_ids[] = is_object($f) ? $f->ID : (int) $f;
            }
        } else {
            $faq_ids[] = is_object($service_faqs) ? $service_faqs->ID : (int) $service_faqs;
        }
        $faq_ids = array_filter(array_map('intval', $faq_ids));
    }
    ?>

    <?php if (!empty($faq_ids)) : ?>
        <?php Templates::getPart('faq-without-cat', ['post__in' => $faq_ids, 'posts_per_page' => -1]) ?>
    <?php else : ?>
        <?php
        // fallback: show all FAQs of related service-cat terms if exists
        if (!empty($service_term_ids)) {
            Templates::getPart('faq-without-cat', [
                'term_ids' => $service_term_ids,
                'posts_per_page' => -1,
            ]);
        } else {
            Templates::getPart('faq-without-cat', ['posts_per_page' => -1]);
        }
        ?>
    <?php endif; ?>

    <?php Templates::getPart('contact') ?>

</main>

<?php get_footer() ?>