<?php

use Cyan\Theme\Helpers\Icon;
?>


<a href="<?php the_permalink(); ?>" class="border border-cynLightBlue hover:border-cynBlue transition-all duration-300 block w-[calc(33%-5px)] rounded-3xl max-lg:flex max-lg:w-full">

      <div class="relative max-sm:w-2/5">
            <?php if (has_post_thumbnail()) : ?>
                  <?php the_post_thumbnail('full', ['class' => 'w-full rounded-3xl object-cover object-center max-md:w-full max-sm:h-45']); ?>
            <?php endif; ?>

            <div class="absolute top-3 right-3 flex gap-2">

                  <div class="px-5 py-1 rounded-2xl bg-white/20 backdrop-blur-md max-lg:hidden text-white flex flex-col items-center gap-1">

                        <div class="size-5 text-white">
                              <?php icon::print('message-text-2'); ?>
                        </div>

                        <span class="text-xs">
                              <?php
                              $count = get_comments_number();
                              if ($count > 0) {
                                    echo $count;
                              } else {
                                    echo '0';
                              }
                              ?>
                        </span>
                  </div>

                  <div class="px-2 py-1 rounded-2xl bg-white/20 backdrop-blur-md max-lg:hidden text-white flex flex-col items-center gap-1">

                        <div class="size-5">
                              <?php icon::print('calendar-schedule-1-1'); ?>
                        </div>

                        <span class="text-xs font-normal flex whitespace-nowrap">
                              <?php echo get_the_date(); ?>
                        </span>
                  </div>

            </div>

      </div>

      <div class="p-3 pb-5 [&_*]:leading-7 [&_p]:gap-1 max-md:w-3/5">
            <p class="text-base font-semibold text-cynBlack">
                  <?php the_title(); ?>
            </p>

            <div class="text-xs font-medium text-cynLighter line-clamp-2">
                  <?php the_excerpt(); ?>
            </div>
      </div>
</a>