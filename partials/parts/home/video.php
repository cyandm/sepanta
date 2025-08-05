<?php

use Cyan\Theme\Helpers\Templates;
use Cyan\Theme\Helpers\Icon;

$page_id = get_option('page_on_front');
$video_title = get_field('video_title', $page_id);
$video_file = wp_get_attachment_url(get_field('video_file', $page_id));
$video_cover = wp_get_attachment_url(get_field('video_cover', $page_id));
?>

<?php if (!empty($video_file) && !empty($video_cover)) : ?>

    <section class="container my-16 max-md:my-11">

        <div class="flex max-h-[40rem] relative">
            <video controls poster="<?php echo $video_cover ?>" class="video w-full rounded-4xl cursor-pointer">

                <source src="<?php echo $video_file ?>" type="video/mp4" />

            </video>

            <div class="video-cover absolute top-0 left-0 w-full h-full bg-cover bg-center bg-no-repeat overflow-hidden rounded-4xl cursor-pointer flex flex-col items-center justify-center opacity-100 transition-all duration-300 pointer-events-auto" style="background-image: url(<?= $video_cover ?>);">

                <div class="flex flex-col items-center justify-center gap-4 bg-[#08104F]/50 w-full h-full">
                    <i class="size-20 max-md:size-14 text-cynWhite"><?php Icon::print('Play') ?></i>
                    <p class="text-cynWhite text-4xl font-semibold"><?= $video_title ?></p>
                </div>

            </div>

        </div>

    </section>

<?php endif; ?>