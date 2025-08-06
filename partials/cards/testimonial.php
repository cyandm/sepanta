<?php

use Cyan\Theme\Helpers\Icon;
use Cyan\Theme\Helpers\Templates;

$testimonial_name = get_field('testimonial_name');
$testimonial_date = get_field('testimonial_date');
$testimonial_score = get_field('testimonial_score');
$max_score = 5;
?>

<div class="p-5 gap-2 flex flex-col text-base font-normal relative testimonial-cart w-[calc(33%-11px)] max-lg:w-[calc(50%-10px)] after:top-4.5 after:left-0 after:h-4/5 after:w-[1px]
max-md:after:w-0 max-md:after:h-0 max-md:w-full nth-[3]:after:h-0 nth-[3]:after:w-0 max-lg:nth-[3]:after:w-[1px] max-lg:nth-[3]:after:h-4/5 max-md:nth-[3]:after:w-0 max-md:nth-[3]:after:h-0 max-lg:nth-[2]:after:w-0 max-lg:nth-[4]:after:w-0 last:after:h-0 last:after:w-0 before:bottom-0 before:right-4 before:h-[1px] before:w-[88%] lg:nth-4:before:h-0 lg:nth-4:before:w-0 md:nth-5:before:h-0 md:nth-5:before:w-0 nth-6:before:h-0 nth-6:before:w-0">

    <p class="text-xl font-normal"><?php the_title(); ?></p>

    <?php the_content(); ?>

    <div class="w-full flex">

        <?php if (!empty($testimonial_score)): ?>

            <?php for ($score = 1; $score <= $max_score; $score++): ?>

                <span class="size-5 <?php echo ($score <= $testimonial_score) ? '[&_svg_g]:fill-amber-300 [&_svg_g]:stroke-0' : '[&_svg_g]:fill-neutral-200 [&_svg_g]:stroke-0' ?>"><?php echo ($score <= $testimonial_score) ? Icon::print('star-favorite') : Icon::print('star-favorite'); ?></span>

            <?php endfor; ?>

        <?php endif ?>

    </div>

    <div class="flex gap-3">
        <?php the_post_thumbnail('full', ['class' => 'size-11 object-cover object-center rounded-full']); ?>

        <div class="flex flex-col gap-2">

            <span class="text-xs font-medium"><?php echo $testimonial_name ?></span>

            <span class="text-xs font-normal"><?php echo $testimonial_date ?></span>

        </div>

    </div>

</div>