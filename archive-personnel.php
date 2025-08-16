<?php

use Cyan\Theme\Helpers\Icon;
use Cyan\Theme\Helpers\Templates;
?>

<?php get_header(); ?>

<main>

      <section class="container flex flex-col gap-4">

            <div class="flex justify-between items-center">
                  <p class="text-5xl font-semibold max-md:text-4xl text-cynBlue">مدیران مجموعه</p>
            </div>

            <div class="flex gap-3 max-md:flex-col max-lg:flex-wrap">
                  <?php
                  $managers_args = [
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
                  $managers = new WP_Query($managers_args);

                  while ($managers->have_posts()) : $managers->the_post();
                        Templates::getCard('personnel');
                  endwhile;
                  wp_reset_postdata();
                  ?>
            </div>

      </section>

      <section class="container flex flex-col gap-4 my-16 max-md:my-11">

            <div class="flex justify-between items-center">
                  <p class="text-5xl font-semibold max-md:text-4xl text-cynBlue">مهندسین</p>
            </div>

            <div class="flex gap-3 max-md:flex-col flex-wrap">
                  <?php
                  $engineers_args = [
                        'post_type' => 'personnel',
                        'posts_per_page' => 6,
                        'tax_query' => [
                              [
                                    'taxonomy' => 'personnel-cat',
                                    'field' => 'slug',
                                    'terms' => 'engineers'
                              ]
                        ]
                  ];
                  $engineers = new WP_Query($engineers_args);

                  while ($engineers->have_posts()) : $engineers->the_post();
                        Templates::getCard('personnel', ['class' => 'w-[calc(33.333%-8px)]']);
                  endwhile;
                  wp_reset_postdata();
                  ?>
            </div>

      </section>


      <section class="container flex flex-col gap-4 my-16 max-md:my-11">

            <div class="flex justify-between items-center">
                  <p class="text-5xl font-semibold max-md:text-4xl text-cynBlue">طراحان</p>
            </div>

            <div class="flex gap-3 max-md:flex-col max-lg:flex-wrap">
                  <?php
                  $designers_args = [
                        'post_type' => 'personnel',
                        'posts_per_page' => 6,
                        'tax_query' => [
                              [
                                    'taxonomy' => 'personnel-cat',
                                    'field' => 'slug',
                                    'terms' => 'designers'
                              ]
                        ]
                  ];
                  $designers = new WP_Query($designers_args);

                  while ($designers->have_posts()) : $designers->the_post();
                        Templates::getCard('personnel', ['class' => 'w-[calc(33.333%-8px)]']);
                  endwhile;
                  wp_reset_postdata();
                  ?>
            </div>

      </section>

</main>

<?php get_footer(); ?>