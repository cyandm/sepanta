<?php

use Cyan\Theme\Helpers\Icon;
use Cyan\Theme\Helpers\Templates;

$projects = array(
      'post_type' => 'project',
      'posts_per_page' => 3,
      'post_status' => 'publish'
);

$all_projects = new WP_Query($projects);


get_header(); ?>


<main class="mt-6 container">

      <div id="searchPostType" class="bg-cynLightBlue py-3 flex justify-between items-center rounded-4xl px-6 my-6">

            <form id="search-form" action="<?php echo home_url(); ?>" method="get" class="flex justify-between items-center gap-2 container max-lg:flex max-lg:flex-col">

                  <div class="relative max-lg:w-full">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                              <div class="w-6 text-[#7B7B7B] stroke-[1.5] hover:text-cynBlack">
                                    <?php icon::print('Search,-Loupe'); ?>
                              </div>
                        </div>
                        <input type="search"
                              id="email-address-icon"
                              name="s"
                              value="<?php the_search_query() ?>"
                              class="bg-cynLightGrey w-3/4 rounded-4xl text-[#7B7B7B] pt-3 pr-11 border border-transparent hover:border hover:border-cynBlack hover:text-cynBlack transition-all duration-400 block ps-10 p-2.5 max-lg:w-full"
                              placeholder="جستجو کن">
                  </div>


                  <div class="flex-wrap flex gap-2 [&_div]:transition-all [&_div]:duration-200 [&_div_input]:cursor-pointer">
                        <div class="radio-parent flex justify-center items-center gap-1 text-white font-medium text-base">
                              <input class="hidden"
                                    value="all"
                                    type="radio"
                                    name="search-type"
                                    id="all"
                                    <?php echo $search_type === 'all' ? 'checked' : '' ?> />
                              <label for="all" class="cursor-pointer py-3 px-6 bg-[#08104F66] rounded-3xl hover:bg-cynBlue hover:text-white transition-all duration-300">همه</label>

                        </div>
                  </div>
            </form>

      </div>


      <div class="flex flex-col gap-3">

            <?php if ($all_projects->have_posts()): ?>
                  <?php while ($all_projects->have_posts()):  $all_projects->the_post();


                  ?>

                        <div class="border border-cynLightBlue rounded-3xl flex items-center p-3 gap-4 max-md:gap-2">
                              <div class="w-3/12 h-[180px] max-lg:h-[160px] max-sm:h-[120px] max-lg:w-2/5 max-sm:w-2/5">
                                    <?php if (has_post_thumbnail()) : ?>
                                          <?php the_post_thumbnail('full', ['class' => 'w-full rounded-2xl h-full object-cover object-center']); ?>
                                    <?php endif; ?>
                              </div>
                              <div class="flex flex-col gap-2 max-sm:gap-1 text-cynBlue max-sm:w-3/5">
                                    <p class="text-base font-medium max-md:text-xs">
                                          <?php
                                          $categories = get_the_category();

                                          if (! empty($categories)):
                                                foreach ($categories as $category):
                                                      echo $category->name . ' ';
                                                      var_dump($categories);
                                                      ?>
                                          <?php
                                                endforeach;
                                          endif;
                                          ?>
                                    </p>
                                    <p class="font-bold text-xl max-md:text-base max-md:font-semibold">
                                          <?php the_title(); ?>
                                    </p>
                                    <p class="text-xl font-medium lg:pt-4 lg:leading-7 max-md:text-xs">
                                          <?php the_excerpt(); ?>
                                    </p>
                              </div>
                        </div>

                  <?php endwhile; ?>
            <?php else: ?>
                  <p>خدماتی دریافت نشد!</p>
            <?php endif; ?>

            <?php wp_reset_postdata(); ?>

      </div>


</main>

<?php get_footer(); ?>