<?php

use Cyan\Theme\Helpers\Icon;
use Cyan\Theme\Helpers\Templates;

$project_categories = get_terms(array(
      'taxonomy'   => 'project-cat',
      'orderby'    => 'name',
      'order'      => 'ASC',
      'hide_empty' => true,
));

$project_categories = array_filter($project_categories, function ($category) {
      return $category->slug !== 'uncategorized';
});


get_header(); ?>


<main class="mt-6 container">

      <section>

            <div id="searchPostType" class="bg-cynLightBlue py-3 flex justify-between items-center rounded-4xl px-6 my-6">

                  <form id="search-form" action="<?php echo home_url(); ?>" method="get" class="flex justify-between items-center w-full max-md:flex-col gap-3">

                        <div class="relative max-md:w-full">

                              <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">

                                    <div class="w-6 text-[#7B7B7B] stroke-[1.5] hover:text-cynBlack">
                                          <?php icon::print('Search,-Loupe'); ?>
                                    </div>

                              </div>

                              <input type="search"
                                    id="email-address-icon"
                                    name="s"
                                    value="<?php the_search_query() ?>"
                                    class="bg-cynLightGrey max-md:w-full rounded-4xl text-[#7B7B7B] pt-3 pr-11 border border-transparent hover:border hover:border-cynBlack hover:text-cynBlack transition-all duration-400 block ps-10 p-2.5"
                                    placeholder="جستجو کن">
                        </div>

                        <div class="flex justify-start items-center gap-2 max-sm:flex-col max-sm:items-start ">

                              <div class="flex">

                                    <div class="flex-wrap flex gap-2 [&_div]:transition-all [&_div]:duration-200 [&_div_input]:cursor-pointer md:flex md:items-center">

                                          <div class="flex justify-center items-center gap-2 flex-wrap">

                                                <a href="<?php echo esc_url(get_post_type_archive_link('project')); ?>" class="bg-cynBlue text-white font-normal py-3 px-6 hover:bg-[#8186A9] rounded-4xl transition-all duration-300">
                                                      همه
                                                </a>

                                                <?php foreach ($project_categories as $project_category) : ?>

                                                      <a href="<?php echo esc_url(get_category_link($project_category->term_id)); ?>" class="bg-[#8186A9] text-white font-normal py-3 px-6 hover:bg-cynBlue rounded-4xl transition-all duration-300">
                                                            <?php echo esc_html($project_category->name); ?>
                                                      </a>

                                                <?php endforeach;

                                                wp_reset_postdata(); ?>

                                          </div>

                                    </div>

                              </div>

                        </div>

                  </form>

            </div>

      </section>

      <section>
            <div class="flex gap-3 flex-wrap">

                  <?php if (have_posts()): ?>
                        <?php while (have_posts()): the_post(); ?>

                              <?php Templates::getCard('col-project') ?>

                        <?php endwhile; ?>
                  <?php else: ?>
                        <p>پروژه‌ای یافت نشد!</p>
                  <?php endif; ?>

            </div>
      </section>

      <section class="container">
            <div class="flex items-center justify-end space-x-2 pt-8">
                  <?php
                  global $wp_query;
                  $query = $args['query'] ?? $wp_query;


                  $big = 999999999;

                  $pagination = paginate_links([
                        'screen_reader_text' => ' ',
                        'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                        'total' => $query->max_num_pages,
                        'aria_current' => 'page',
                        'show_all' => true,
                        'prev_next' => true,
                        'type' => 'array',
                        'prev_text' => '&lt;',
                        'next_text' => '&gt;',
                  ]);

                  if ($pagination) {
                        foreach ($pagination as $link) {
                              if (strpos($link, 'current') !== false) {
                                    echo str_replace(
                                          '<span',
                                          '<a href="#" class="w-10 h-10 rounded-full bg-cynBlue text-white flex items-center justify-center transition-all duration-600 text-xs font-medium"',
                                          str_replace('</span>', '</a>', $link)
                                    );
                              } else {
                                    echo str_replace(
                                          '<a',
                                          '<a class="w-10 h-10 rounded-full border border-cynLightBlue
							 text-cynBlueGray flex items-center justify-center hover:bg-cynBlue hover:text-white transition-all duration-600 text-xs font-medium"',
                                          $link
                                    );
                              }
                        }
                  }

                  ?>
            </div>
      </section>

</main>

<?php get_footer(); ?>