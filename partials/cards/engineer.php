<?php

use Cyan\Theme\Helpers\Icon;

?>

<div class="w-1/3 relative group rounded-4xl">

    <?php echo wp_get_attachment_image(get_post_thumbnail_id(), 'full', false, ['class' => 'object-cover object-top h-[450px] transition-all duration-500 rounded-4xl']); ?>

    <div class="absolute bottom-0 left-0 h-full w-full p-3 flex flex-col justify-between gap-2 bg-[#08104F]/40 rounded-4xl items-end">

        <div class="flex justify-center items-center size-10 rounded-full text-cynWhite cursor-pointer animate-pulst">
            <?php Icon::print('Play') ?>
        </div>

        <div class="flex flex-col gap-1 bg-cynWhite rounded-3xl p-3">
            <span class="text-xl font-medium text-cynBlack">
                <?php echo get_field('engineer_position', get_the_ID()); ?>
            </span>

            <p class="text-base font-normal text-cynBlack"><?php the_title(); ?></p>

            <div class="text-xs font-normal text-cynLighter leading-7"><?php the_content(); ?></div>
        </div>

    </div>

</div>