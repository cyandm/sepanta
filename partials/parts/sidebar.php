<?php

use Cyan\Theme\Helpers\Icon;

$categories = $args['categories'];

var_dump($categories);
?>




<div class="w-[20%] border h-fit border-cynLightBlue py-6 px-4 rounded-4xl max-lg:border-none max-lg:w-full">
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