<?php

use Cyan\Theme\Helpers\Icon;
use Cyan\Theme\Helpers\Templates;

$categories = get_categories([
	'orderby' => 'name',
	'order'   => 'ASC'
]);
?>

<?php get_header(); ?>

<main class="container">

	<section class="flex gap-3 max-lg:flex-col">

		<div class="w-[20%] border h-fit border-cynLightBlue py-6 px-4 rounded-4xl max-lg:border-none max-lg:w-full">
			<div class="pr-2 text-cynBlue font-bold ">

				<div class="font-semibold text-cynBlueGray text-xl">
					<p>دسته‌بندی‌ها</p>
				</div>
			</div>
			<form id="search-form" action="<?php echo home_url(); ?>" method="get">
				<div class="relative">
					<div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
						<div class="size-6 text-cynLighter ">
							<?php icon::print('Search,-Loupe'); ?>
						</div>
					</div>
					<input type="search"
						id="email-address-icon"
						name="s"
						value="<?php the_search_query() ?>"
						class="bg-cynLightGrey mt-6 rounded-4xl font-base hover:text-black pr-11 block p-2.5 w-full"
						placeholder="جستجو کن">
				</div>
			</form>
			<div class="text-white font-bold text-xl flex lg:flex-col gap-2 rounded-4xl mt-6 max-lg:flex-wrap">
				<?php foreach ($categories as $category) : ?>

					<?php
					$image_id = get_field('category_image', 'category_' . $category->term_id);

					$image_url = '';
					if ($image_id) {
						$image_url = wp_get_attachment_image_src($image_id, 'full')[0];
					}

					if (!empty($image_url) && !empty($category->name)):
					?>
						<a href="<?php echo esc_url(get_category_link($category->term_id)); ?>" class="relative overflow-hidden rounded-3xl py-7 text-center transition-all duration-500 bg-no-repeat bg-cover bg-center hover:bg-cynBlue hover:text-white group max-lg:w-[calc(50%-4px)]" style="background-image: url(<?php echo esc_url($image_url); ?>);">
							<div class="absolute inset-0 bg-black opacity-50"></div>
							<div class="absolute w-full h-full inset-0 transition-all duration-500 group-hover:opacity-100 group-hover:bg-cynBlue"></div>
							<span class="relative z-10"><?php echo esc_html($category->name); ?></span>
						</a>

					<?php endif; ?>

				<?php endforeach;
				wp_reset_postdata();
				?>
			</div>
		</div>


		<div class="w-[80%] max-lg:w-full">
			<div class="text-cynBlue font-semibold text-[44px]">
				<h1>مقالات</h1>
			</div>

			<div class="flex flex-wrap gap-2">

				<?php if (have_posts()) :

					while (have_posts()) : the_post(); ?>

					<?php Templates::getCard('blog'); ?>

					<?php endwhile; ?>

				<?php else : ?>
					<p>پستی دریافت نشد!</p>
				<?php endif; ?>

				<?php wp_reset_postdata(); ?>

			</div>
		</div>

	</section>

	<section class="container">
		<div class="flex items-center justify-end space-x-2 pt-8">
			<?php
			global $wp_query;
			$query = $args['query'] ?? $wp_query;


			$big = 999999999;

			$pagination = paginate_links([
				'screen_reader_text' => ' ',
				'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
				'total' => $query->max_num_pages,
				'aria_current' => 'page',
				'show_all' => true,
				'prev_next' => true,
				'type' => 'array',
				'prev_text' => '&lt;',
				'next_text' => '&gt;',
			]);

			if ($pagination) {
				foreach ($pagination as $link) {
					if (strpos($link, 'current') !== false) {
						echo str_replace(
							'<span',
							'<a href="#" class="w-10 h-10 rounded-full bg-cynBlue text-white flex items-center justify-center transition-all duration-600 text-xs font-medium"',
							str_replace('</span>', '</a>', $link)
						);
					} else {
						echo str_replace(
							'<a',
							'<a class="w-10 h-10 rounded-full border border-cynLightBlue
							 text-cynBlueGray flex items-center justify-center hover:bg-cynBlue hover:text-white transition-all duration-600 text-xs font-medium"',
							$link
						);
					}
				}
			}

			wp_reset_postdata();
			?>
		</div>
	</section>



</main>

<?php get_footer();
