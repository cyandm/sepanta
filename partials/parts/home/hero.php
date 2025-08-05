<?php

use Cyan\Theme\Helpers\Icon;

$hero_img_1 = get_field('hero_img_1');
$hero_img_2 = get_field('hero_img_2');
$hero_title_1 = get_field('hero_title_1');
$hero_title_2 = get_field('hero_title_2');
$hero_link_1 = get_field('hero_link_1');
$hero_link_2 = get_field('hero_link_2');
$hero_link_3 = get_field('hero_link_3');
$hero_link_4 = get_field('hero_link_4');
?>

<section class="container flex gap-3 max-md:gap-2 max-lg:flex-col mb-16 max-md:mb-11">

    <div class="w-3/5 max-xl:w-1/2 max-lg:w-full">

        <a href="<?php echo $hero_link_1['url']; ?>" class="w-full h-fit rounded-4xl max-md:rounded-3xl relative group">

            <?php echo wp_get_attachment_image($hero_img_1, 'full', false, ['class' => 'rounded-4xl max-md:rounded-3xl object-cover h-[660px] max-lg:h-[400px] max-md:h-[235px]']); ?>

            <div class="absolute bottom-0 left-0 w-full p-6 max-md:p-3 flex justify-between items-center bg-gradient-to-t from-[#08104F] to-transparent rounded-4xl max-md:rounded-3xl">

                <p class="text-[2.5rem] font-semibold text-cynWhite max-md:text-xl max-md:font-bold"><?php echo $hero_title_1; ?></p>

                <div class="gap-3 p-3 rounded-full bg-cynWhite/15 flex justify-between items-center">

                    <p class="text-cynWhite text-xl font-semibold max-md:text-xs max-md:font-medium">
                        <?php echo $hero_link_1['title']; ?>
                    </p>

                    <span class="size-7 bg-cynWhite text-cynBlack rounded-full [&_svg]:rotate-[45deg] [&_svg]:group-hover:rotate-[0deg] [&_svg]:transition-all [&_svg]:duration-300 [&_svg]:stroke-[1.5] p-0.5 flex justify-center items-center">
                        <?php echo Icon::get('Arrow-6'); ?>
                    </span>

                </div>

            </div>

        </a>

    </div>

    <div class="w-2/5 flex flex-wrap gap-3 max-md:gap-2 max-xl:w-1/2 max-lg:w-full">

        <a href="<?php echo $hero_link_2['url']; ?>" class="w-full h-fit rounded-4xl max-md:rounded-3xl relative group">

            <?php echo wp_get_attachment_image($hero_img_2, 'full', false, ['class' => 'rounded-4xl max-md:rounded-3xl object-cover h-[527px] max-lg:h-[400px] max-md:h-[235px]']); ?>

            <div class="absolute bottom-0 left-0 w-full p-6 max-md:p-3 flex justify-between items-center bg-gradient-to-t from-[#08104F] to-transparent rounded-4xl max-md:rounded-3xl">

                <p class="text-4xl font-semibold text-cynWhite max-md:text-xl max-md:font-bold"><?php echo $hero_title_2; ?></p>

                <div class="gap-3 p-3 rounded-full bg-cynWhite/15 flex justify-between items-center">

                    <p class="text-cynWhite text-xl font-semibold max-md:text-xs max-md:font-medium">
                        <?php echo $hero_link_2['title']; ?>
                    </p>

                    <span class="size-7 bg-cynWhite text-cynBlack rounded-full [&_svg]:rotate-[45deg] [&_svg]:group-hover:rotate-[0deg] [&_svg]:transition-all [&_svg]:duration-300 [&_svg]:stroke-[1.5] p-0.5 flex justify-center items-center">
                        <?php echo Icon::get('Arrow-6'); ?>
                    </span>

                </div>

            </div>

        </a>

        <a href="<?php echo $hero_link_3['url']; ?>" class="w-[calc(50%-6px)] py-11 px-6 max-md:py-6 max-md:px-3 bg-cynBlue text-cynWhite rounded-4xl max-md:rounded-3xl flex justify-between items-center group">
            <p class="text-xl font-semibold max-md:text-sm max-md:font-medium">
                <?php echo $hero_link_3['title']; ?>
            </p>
            <span class="size-7 bg-cynWhite text-cynBlack rounded-full [&_svg]:rotate-[45deg] [&_svg]:group-hover:rotate-[0deg] [&_svg]:transition-all [&_svg]:duration-300 [&_svg]:stroke-[1.5] p-0.5 flex justify-center items-center">
                <?php echo Icon::get('Arrow-6'); ?>
            </span>
        </a>

        <a href="<?php echo $hero_link_4['url']; ?>" class="w-[calc(50%-6px)] py-11 px-6 max-md:py-6 max-md:px-3 bg-cynBlue text-cynWhite rounded-4xl max-md:rounded-3xl flex justify-between items-center group">
            <p class="text-xl font-semibold max-md:text-sm max-md:font-medium">
                <?php echo $hero_link_4['title']; ?>
            </p>
            <span class="size-7 bg-cynWhite text-cynBlack rounded-full [&_svg]:rotate-[45deg] [&_svg]:group-hover:rotate-[0deg] [&_svg]:transition-all [&_svg]:duration-300 [&_svg]:stroke-[1.5] p-0.5 flex justify-center items-center">
                <?php echo Icon::get('Arrow-6'); ?>
            </span>
        </a>

    </div>

</section>