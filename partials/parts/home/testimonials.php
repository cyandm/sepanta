<?php

use Cyan\Theme\Helpers\Templates;
use Cyan\Theme\Helpers\Icon;

$page_id = get_option('page_on_front');
$testimonials_title = get_field('testimonials_title', $page_id);
$testimonials_link = get_field('testimonials_link', $page_id);
?>

<section class="container flex flex-col gap-3 my-16 max-md:my-11">

    <div class="flex justify-between items-start">
        <p class="text-5xl font-semibold max-md:text-4xl text-cynBlack"><?php echo $testimonials_title; ?></p>
        <a href="<?php echo $testimonials_link['url']; ?>" class="size-10 text-[#E6772D] flex">
            <?php Icon::print('Google-2'); ?>
        </a>
    </div>


    <div>
        
    </div>


</section>