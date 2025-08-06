<?php

use Cyan\Theme\Helpers\Icon; ?>


<a href="<?php the_permalink(); ?>" class="border border-cynLightBlue hover:border-cynBlue transition-all duration-300 rounded-3xl w-full flex flex-col gap-2.5 col-span-3 first:row-span-2 not-first:flex not-first:flex-row first:flex-col not-first:[&_div_img]:h-full first:[&>div]:w-full">


    <div class="relative w-7/12">
        <?php if (has_post_thumbnail()) : ?>
            <?php the_post_thumbnail('full', ['class' => 'w-full rounded-3xl object-cover object-center']); ?>
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

    <div class="w-5/12 p-3 pb-5 [&_*]:leading-7 [&_p]:gap-1">

        <p class="text-xl font-bold text-cynBlack">
            <?php the_title(); ?>
        </p>

        <div class="text-base font-medium text-cynLighter line-clamp-3">
            <?php the_excerpt(); ?>
        </div>

    </div>

</a>