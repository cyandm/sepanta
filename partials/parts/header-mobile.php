<?php

use Cyan\Theme\Helpers\Icon;
use Cyan\Theme\Helpers\Templates;

$address_link = get_option('address_link');
$phone_number = get_option('phone_number');
$telegram_link = get_option('telegram_link');
$instagram_link = get_option('instagram_link');
$whatsapp_link = get_option('whatsapp_link');
?>

<section class="bg-white p-5 w-0 fixed inset-0 z-50 opacity-0 pointer-events-none data-[active='true']:w-full data-[active='true']:opacity-100 data-[active='true']:pointer-events-auto duration-500" modal data-modal-name="menu-modal" data-active="false">

      <div class="flex justify-between items-center">

            <div class="size-8 flex justify-center items-center text-cynBlue" modal-closer data-modal-name="menu-modal">
                  <?php icon::print('Arrow,-Forward'); ?>
            </div>

            <div><?php the_custom_logo() ?></div>

      </div>

      <div>

            <?php wp_nav_menu([
                  'menu_id' => 'mobile-menu',
                  'menu_class' => 'gap-0.5 [&>li]:border-t [&>li]:border-[#F4F4F6] [&>li]:first:border-t-0 flex-col text-cynBlack [&_li_a]:flex [&_li_a]:py-2 [&_li_a]:w-full text-base font-Medium [&_li_ul]:bg-cynLightGrey [&_li_ul_li_a]:pr-2',
                  'depth' => '3',
                  'theme_location' => 'header-menu',
                  'container' => 'ul'
            ]); ?>

      </div>

      <div class="flex gap-4 flex-col text-cynBlack max-sm:mt-3 text-base py-1 font-Medium">

            <?php if ($phone_number) : ?>
                  <p>
                        شماره تماس ها
                  </p>
                  <a href="tel:<?php echo $phone_number ?>">
                        <?php echo $phone_number ?>

                  </a>

            <?php endif; ?>

            <?php if ($telegram_link || $instagram_link || $whatsapp_link) : ?>
                  <p>
                        شبکه های اجتماعی
                  </p>
                  <div class="flex gap-3 mt-3 rounded-2xl">

                        <?php if ($telegram_link) : ?>
                              <a href="<?php echo $telegram_link ?>" class="bg-cynBlue  rounded-4xl text-white">
                                    <div class="size-7 flex items-center justify-center p-1">
                                          <?php icon::print('Telegram'); ?>
                                    </div>
                              </a>
                        <?php endif; ?>

                        <?php if ($instagram_link) : ?>
                              <a href="<?php echo $instagram_link ?>" class="bg-cynBlue rounded-4xl text-white">
                                    <div class="size-7 flex items-center justify-center p-1">
                                          <?php icon::print('Instagram'); ?>
                                    </div>
                              </a>
                        <?php endif; ?>

                        <?php if ($whatsapp_link) : ?>
                              <a href="<?php echo $whatsapp_link ?>" class="bg-cynBlue  rounded-4xl text-white">
                                    <div class="size-7 flex items-center justify-center p-1">
                                          <?php icon::print('Whatsup'); ?>
                                    </div>
                              </a>
                        <?php endif; ?>

                  </div>
            <?php endif; ?>
      </div>

</section>



<section class="lg:hidden container flex justify-between items-center border rounded-4xl border-[#E5E5F5] px-3 py-2">

      <div class="size-10 flex justify-center items-center py-2 px-2 scale-x-[-1] bg-cynLightGrey text-[#7B7B7B] rounded-4xl stroke-2" modal-opener data-modal-name="menu-modal">
            <?php icon::print('menu-burger-square-6'); ?>
      </div>

      <div>
            <?php the_custom_logo() ?>
      </div>

      <a href="/?s=&search-type=all" class="bg-cynLightGrey text-[#7B7B7B] rounded-4xl size-10 py-2 px-2 stroke-2 flex justify-center items-center">
            <?php icon::print('Search,-Loupe'); ?>
      </a>

</section>