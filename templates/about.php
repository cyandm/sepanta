<?php /* Template Name: about */ ?>

<?php

use Cyan\Theme\Helpers\Templates;
use Cyan\Theme\Helpers\Icon;


$video_title = get_field('video_title', $page_id);
$video_file = wp_get_attachment_url(get_field('video_file', $page_id));
$video_cover = wp_get_attachment_url(get_field('video_cover', $page_id));
$about_video_cover = wp_get_attachment_url(get_field('about_video_cover'));
$text_under_video_one = get_field('text_under_video_one');
$text_under_video_two = get_field('text_under_video_two');
$about_img_one = get_field('about_img_one');
$about_img_two = get_field('about_img_two');
$under_photo_12 = get_field('under_photo_12');
get_header(); ?>

<section class="container py-16">
      <div>
            <h1 class="text-cynBlue text-center text-5xl"><?php the_title(); ?></h1>
      </div>
</section>
<section>
      <div class="container">

            <?php if (!empty($video_file) && !empty($video_cover)) : ?>

                  <section class="container my-16 max-md:my-11">

                        <div class="flex max-h-[40rem] relative">
                              <video controls poster="<?php echo $video_cover ?>" class="video w-full rounded-4xl cursor-pointer">

                                    <source src="<?php echo $video_file ?>" type="video/mp4" />

                              </video>

                              <div class="video-cover absolute top-0 left-0 w-full h-full bg-cover bg-center bg-no-repeat overflow-hidden rounded-4xl cursor-pointer flex flex-col items-center justify-center opacity-100 transition-all duration-300 pointer-events-auto" style="background-image: url(<?= $video_cover ?>);">

                                    <div class="flex flex-col items-center justify-center gap-4 bg-[#08104F]/50 w-full h-full">
                                          <i class="size-20 max-md:size-14 text-cynWhite"><?php Icon::print('Play') ?></i>
                                          <p class="text-cynBlack text-4xl font-semibold"><?= $video_title ?></p>
                                    </div>

                              </div>

                        </div>

                  </section>

            <?php endif; ?>
      </div>
</section>
<section class="mt-6">
      <div class="container">
            <p class="text-[#505050] leading-9 text-xl ">
                  <?php echo ($text_under_video_one) ?>
            </p>
            <p class="text-[#505050] leading-9 mt-16 text-xl">
                  <?php echo ($text_under_video_two) ?>
            </p>
      </div>
</section>
<section class="container">

      <section class="container flex gap-3 justify-center max-sm:flex max-sm:flex-col max-sm:order-1 my-16 max-lg:my-6">
            <div class="w-1/2 max-md:w-full">
                  <?php echo wp_get_attachment_image($about_img_one, 'full', false, ['class' => 'w-full h-[500px] max-md:h-[280px] object-cover rounded-4xl']) ?>
            </div>
            <div class="w-1/2 max-md:w-full">
                  <?php echo wp_get_attachment_image($about_img_two, 'full', false, ['class' => 'w-full h-[500px] max-md:h-[280px] object-cover rounded-4xl']) ?>
            </div>
      </section>


</section>
<section class=" container">
      <p class="py-16 text-[#505050] leading-8 text-xl">
            <?php echo $under_photo_12 ?>
      </p>
</section>
<?php get_footer(); ?>