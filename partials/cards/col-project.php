<?php

use Cyan\Theme\Helpers\Icon;

$project_id = $args['project_id'];
$project_class = $args['class'];
$project_thumbnail = get_field('project_thumbnail', $project_id);
?>

<a href="<?php the_permalink(); ?>" class="w-[calc(25%-9px)] max-xl:w-[calc(33%-5px)] max-lg:w-[calc(50%-6px)] <?= $project_class ?> bg-white flex group max-sm:w-full flex-col">

    <div class="relative h-[266px] max-md:w-full rounded-3xl">
        <?php echo wp_get_attachment_image(get_post_thumbnail_id(), 'full', false, ['class' => 'object-cover h-[266px] opacity-100 group-hover:opacity-0 transition-all duration-500 absolute top-0 right-0 rounded-3xl']); ?>
        <?php echo wp_get_attachment_image($project_thumbnail, 'full', false, ['class' => 'object-cover h-[266px] opacity-0 group-hover:opacity-100 transition-all duration-500 absolute top-0 right-0 rounded-3xl']); ?>
    </div>

    <div class="py-4 px-4 flex flex-col gap-4 border border-t-0 border-cynBorder group-hover:border-cynBlue transition-all duration-500 justify-between max-md:w-full rounded-b-3xl -mt-7 max-md:flex-row max-md:justify-between max-md:items-center">
        <div class="flex flex-col gap-2 mt-5">
            <p class="text-2xl font-medium text-cynBlack"><?php the_title(); ?></p>
            <span class="text-cynLighter text-base font-medium"><?php echo get_the_terms($project_id, 'project-cat')[0]->name; ?></span>
            <span class="text-cynLighter text-base font-medium leading-7 line-clamp-2"><?php the_content(); ?></span>
        </div>

        <div class="w-full flex justify-end items-end max-md:w-1/5 max-md:pt-6">
            <span class="size-9 flex justify-center items-center text-cynBlack">
                <?php Icon::print('Arrow-17') ?>
            </span>
        </div>

    </div>

</a>