<?php
$page_id = get_option('page_on_front');
$vision_title = get_field('vision_title', $page_id);
$vision_desc = get_field('vision_desc', $page_id);
?>


<section class="border-b-2 border-cynBlue my-16 max-md:my-11">

    <div class="container flex max-md:flex-col gap-4 lg:gap-10">

        <div class="flex flex-col justify-center gap-3 text-cynBlack w-1/2 max-md:w-full">

            <p class="text-5xl max-md:text-4xl font-semibold"><?php echo $vision_title ?></p>

            <p class="text-xl font-medium leading-9"><?php echo $vision_desc ?></p>

        </div>

        <div class="w-1/2 flex justify-end max-md:w-full">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/image/buildings.svg">
        </div>

    </div>

</section>