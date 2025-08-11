<?php

use Cyan\Theme\Helpers\Icon;

$project_id = $args['project_id'];
$project_thumbnail = get_field('project_thumbnail', $project_id);
?>

<a href="<?php the_permalink(); ?>" class="w-1/2 bg-white flex md:flex-row md:first:[&>div>img]:rounded-tr-4xl md:last:[&>div>img]:rounded-bl-4xl md:[&:nth-child(4n+3)]:flex-row-reverse md:[&:nth-child(4n+4)]:flex-row-reverse md:[&:nth-last-child(2)]:[&>div]:rounded-br-4xl md:[&:nth-child(2)]:[&>div]:rounded-tl-4xl group max-md:w-full max-md:flex-col md:[&:nth-child(5)]:[&>div>img]:rounded-br-4xl md:[&:nth-child(5)]:[&>div]:!rounded-br-none md:[&:nth-child(6)]:[&>div]:rounded-bl-4xl md:[&:nth-child(6)]:[&>div>img]:rounded-bl-none">

    <div class="w-1/2 relative h-[266px] max-md:w-full max-md:rounded-3xl">
        <?php echo wp_get_attachment_image(get_post_thumbnail_id(), 'full', false, ['class' => 'object-cover h-[266px] opacity-100 group-hover:opacity-0 transition-all duration-500 absolute top-0 right-0 max-md:rounded-3xl']); ?>
        <?php echo wp_get_attachment_image($project_thumbnail, 'full', false, ['class' => 'object-cover h-[266px] opacity-0 group-hover:opacity-100 transition-all duration-500 absolute top-0 right-0 max-md:rounded-3xl']); ?>
    </div>

    <div class="w-1/2 py-4 px-4 flex flex-col gap-4 border border-cynBorder justify-between max-md:w-full max-md:rounded-b-3xl max-md:-mt-7 max-md:flex-row max-md:justify-between max-md:items-center">
        <div class="flex flex-col gap-2 max-md:mt-5">
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