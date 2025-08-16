<?php

use Cyan\Theme\Helpers\Icon;

$args = isset($args['class']) ? $args['class'] : null;
$personnel_position = get_field('personnel_position', get_the_ID());
$personnel_video = wp_get_attachment_url(get_field('personnel_video', get_the_ID()));
$has_video = 'modal-opener data-modal-name="introduction-modal"'
?>

<div class="<?= $args ? $args : 'w-1/3' ?> max-lg:w-[calc(50%-6px)] max-md:w-full relative group rounded-4xl group cursor-pointer" <?= !empty($personnel_video) ? $has_video : '' ?> data-video-url="<?= !empty($personnel_video) ? $personnel_video : '' ?>">

    <?php echo wp_get_attachment_image(get_post_thumbnail_id(), 'full', false, ['class' => 'object-cover object-top h-[450px] rounded-4xl']); ?>

    <div class="absolute bottom-0 left-0 h-full w-full p-3 flex flex-col justify-between gap-2 bg-[#08104F]/40 group-hover:bg-transparent rounded-4xl items-end transition-all duration-500">

        <div class="flex justify-center items-center size-10 rounded-full text-cynWhite cursor-pointer animate-pulse">
            <?php if (!empty($personnel_video)): ?>
                <?php Icon::print('Play') ?>
            <?php endif ?>
        </div>

        <div class="flex flex-col gap-1 bg-cynWhite rounded-3xl p-3">

            <span class="text-xl font-medium text-cynBlack">
                <?php echo $personnel_position; ?>
            </span>

            <p class="text-base font-normal text-cynBlack"><?php the_title(); ?></p>

            <div class="text-xs font-normal text-cynLighter leading-7"><?php the_content(); ?></div>
        </div>

    </div>

</div>