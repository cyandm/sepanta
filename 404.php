<?php
/*
Template Name: 404
Description: A template for displaying a 404 error page.
More information at https://developer.wordpress.org/themes/templates/template-hierarchy/#404-not-found-hierarchy
*/

?>

<?php get_header(); ?>

<main>
	<section class="mt-20 ">
		<div class="flex justify-center">
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/image/404.svg">
		</div>
		<div class="-mt-28 ">
			<div class=" flex justify-center">
				<a href="/" class="bg-[#08104F] py-3 px-14 rounded-4xl text-white text-sm mt-40 max-sm:py-2 max-sm:px-20">بازگشت به صفحه اصلی</a>
			</div>

		</div>
	</section>
</main>

<?php get_footer();
