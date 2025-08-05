<?php /* Template Name: about */ ?>

<?php

use Cyan\Theme\Helpers\Templates;

$about_video = wp_get_attachment_url(get_field('about_video'));
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

            <video controls poster="<?php echo $about_video_cover ?>" class="w-full rounded-2xl">

                  <source src="<?php echo $about_video ?>" type="video/mp4" />

            </video>

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

      <div class="flex gap-3 max-sm:flex-col max-md:fle
      x-col justify-center mt-16 max-sm:items-center">
            <?php echo wp_get_attachment_image($about_img_one, 'full') ?>
            <?php echo wp_get_attachment_image($about_img_two, 'full') ?>
      </div>
</section>
<section class=" container">
            <p class="py-16 text-[#505050] leading-8 text-xl">
                  <?php echo $under_photo_12 ?>
            </p>
</section>
<?php get_footer(); ?>