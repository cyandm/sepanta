<?php
/*
Template Name: Single
Description: A template for displaying a single post type.
More information at https://developer.wordpress.org/themes/templates/template-hierarchy/#single-hierarchy
*/

use Cyan\Theme\Helpers\Templates;
use Cyan\Theme\Helpers\Icon;





$sidebar_query = new WP_Query([
      'post_type'      => 'post',
      'posts_per_page' => 3,
      'post__not_in'   => [get_the_ID()],
]);

$categories = get_categories(array(
      'orderby' => 'name',
      'order'   => 'ASC',
      'hide_empty' => true,
));

?>
<?php get_header(); ?>

<main>
      <section class="container flex gap-3 max-lg:flex-col">
            <div class="w-[20%] border h-fit border-cynLightBlue mt-6 py-6 px-4 rounded-4xl max-lg:border-none max-lg:w-full">
                  
                  <div class="pr-2 text-cynBlue font-bold ">

                        <div class="font-semibold text-cynBlueGray text-xl">
                              <p>دسته‌بندی‌ها</p>
                        </div>
                  </div>

                  <form id="search-form" action="<?php echo home_url(); ?>" method="get">
                        <div class="relative">
                              <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                    <div class="size-6 text-cynLighter ">
                                          <?php icon::print('Search,-Loupe'); ?>
                                    </div>
                              </div>
                              <input type="search"
                                    id="email-address-icon"
                                    name="s"
                                    value="<?php the_search_query() ?>"
                                    class="bg-cynLightGrey mt-6 rounded-4xl font-base hover:text-black pr-11 block p-2.5 w-full"
                                    placeholder="جستجو کن">
                        </div>
                  </form>

                  <div class="text-white font-bold text-xl flex lg:flex-col gap-2 rounded-4xl mt-6 max-lg:flex-wrap">
                        <?php foreach ($categories as $category) : ?>

                              <?php
                              $image_id = get_field('category_image', 'category_' . $category->term_id);

                              $image_url = '';
                              if ($image_id) {
                                    $image_url = wp_get_attachment_image_src($image_id, 'full')[0];
                              }

                              if (!empty($image_url) && !empty($category->name)):
                              ?>
                                    <a href="<?php echo esc_url(get_category_link($category->term_id)); ?>" class="relative overflow-hidden rounded-3xl py-7 text-center transition-all duration-500 bg-no-repeat bg-cover bg-center hover:bg-cynBlue hover:text-white group max-lg:w-[calc(50%-4px)]" style="background-image: url(<?php echo esc_url($image_url); ?>);">
                                          <div class="absolute inset-0 bg-black opacity-50"></div>
                                          <div class="absolute w-full h-full inset-0 transition-all duration-500 group-hover:opacity-100 group-hover:bg-cynBlue"></div>
                                          <span class="relative z-10"><?php echo esc_html($category->name); ?></span>
                                    </a>

                              <?php endif; ?>

                        <?php endforeach ?>
                  </div>
            </div>

            <div class=" w-[80%] max-lg:w-full">
                  <div class="mt-6 ">
                        <?php the_post_thumbnail('full', ['class' => 'w-full']) ?>
                  </div>
                  <div class="flex justify-between mt-3 mb-4 max-lg:flex-col max-lg:gap-3">

                        <div class="flex gap-6 max-lg:w-full max-lg:justify-between items-center">
                              <div class="flex gap-1 justify-center items-center text-[#00000080]">
                                    <span class="size-6">
                                          <?php icon::print('calendar-schedule-1-1'); ?>
                                    </span>
                                    <?php echo get_the_date(); ?>
                              </div>

                              <div class="flex gap-1 justify-center items-center text-[#00000080]">
                                    <span class="size-6">
                                          <?php icon::print('edit-pen'); ?>
                                    </span>
                                    <?php the_author(); ?>
                              </div>
                        </div>

                        <div class="flex gap-6 text-cynBlue max-lg:w-full max-lg:justify-between items-center">

                              <div class="flex gap-6 max-sm:gap-2">

                                    <div class="flex gap-1 justify-center items-center text-cynBlue font-medium text-xs">
                                          <span class="size-6">
                                                <?php icon::print('Eye-4'); ?>
                                          </span>
                                          <?php
                                          $post_views = (int) get_post_meta(get_the_ID(), 'post_views_count', true);

                                          if ($post_views > 0) {
                                                echo esc_html($post_views) . ' بازدید';
                                          } else {
                                                echo 'بدون بازدید';
                                          }
                                          ?>

                                    </div>

                                    <div class="flex gap-1 justify-center items-center text-cynBlue font-medium text-xs">
                                          <span class="size-6">
                                                <?php icon::print('message-text-2') ?>
                                          </span>

                                          <?php
                                          $count = get_comments_number();
                                          if ($count > 0) {
                                                echo $count . ' ' . 'کامنت';
                                          } else {
                                                echo 'بدون کامنت';
                                          }
                                          ?>
                                    </div>

                              </div>

                              <div>
                                    <button class="rounded-lg text-cynBlue bg-cynLightBlue px-2 py-3 flex justify-center items-center gap-1 cursor-pointer font-medium text-xs" id="shareBtn">
                                          <span class="size-6 stroke-1">
                                                <?php icon::print('Share-1') ?>
                                          </span>
                                          <p>اشتراک گذاری</p>
                                    </button>
                              </div>
                        </div>

                  </div>

                  <div class="mt-3 mb-4 w-full">
                        <hr class="text-[#B5C1D533]">
                  </div>

                  <div class="text-[#222222] font-bold text-xl my-4">
                        <h1 class="h2"><?php the_title() ?></h1>
                  </div>

                  <div class="text-cynBlack font-medium text-base xl:text-justify leading-7 [&_img]:w-full [&_img]:my-4 single-content ">
                        <?php the_content() ?>
                  </div>

            </div>

      </section>


</main>

<?php get_footer();
