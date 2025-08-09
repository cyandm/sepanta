<?php

use Cyan\Theme\Helpers\Icon;
use Cyan\Theme\Helpers\Templates;
?>


<section class="container flex justify-between items-center border rounded-4xl border-[#E5E5F5] px-3.5 py-2 max-lg:hidden">

      <div class="relative w-1/5 flex justify-start items-center">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                  <div class="size-6 text-[#7B7B7B] max-md:hidden">
                        <?php icon::print('Search,-Loupe'); ?>
                  </div>
            </div>
            <input type="text"
                  id="email-address-icon"
                  name="s"
                  value="<?php the_search_query() ?>"
                  class="text-[#7B7B7B] ps-10 w-4/5 bg-cynLightGrey rounded-4xl py-3 px-3 border-cynBlue outline-cynBlue focus:outline-cynBlue focus:border-cynBlue hover:border-cynBlue hover:text-black max-md:hidden"
                  placeholder="جستجو کن">
      </div>

      <div class="w-3/5 flex justify-center items-center">

            <?php wp_nav_menu([
                  'menu_id' => 'main-menu',
                  'menu_class' => 'flex gap-6 items-center text-cynBlack [&_li]:hover:text-cynBlue [&_li]:transition-all [&_li]:duration-300 max-md:hidden',
                  'depth' => '3',
                  'theme_location' => 'header-menu',
                  'container' => 'ul'
            ]); ?>

      </div>

      <div class="w-1/5 flex justify-end items-center">
            <?php the_custom_logo() ?>
      </div>

</section>