<?php /* Template Name: search */ ?>

<?php

use Cyan\Theme\Helpers\Icon;
use Cyan\Theme\Helpers\Templates;

defined('ABSPATH') || exit;

global $wp_query;

$search_type = empty($_GET['search-type']) ? 'all' : $_GET['search-type'];

?>

<?php get_header() ?>

<main class="pb-56 max-md:pb-32">
    <div id="searchPostType" class="bg-cynBar py-2 flex justify-between items-center rounded-lg px-4 max-md:flex-col max-md:gap-5">

        <form id="search-form" class="flex justify-between items-center max-md:flex-col gap-2 max-md:w-full container">

            <div class="">
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                        <div class="w-6">
                            <?php icon::print('Search,-Loupe'); ?>
                        </div>
                    </div>
                    <input type="text"
                        id="email-address-icon"
                        name="s"
                        value="<?php the_search_query() ?>"
                        class="bg-white rounded-4xl border border-cynText text-[#07162C]  pt-3 pr-11  focus-visible:bg-[#F4F6F9] focus-visible:border-cynText focus-visible:outline-cynText focus:border-cynText  block w-full ps-10 p-2.5 "
                        placeholder="حالا هرچی">
                </div>
            </div>

            <div class='max-md:px-2'>
                <div class="flex justify-start items-center gap-2 max-sm:flex-col max-sm:items-start">

                    <div class="flex">

                        <div class="p-2 flex-wrap flex gap-2 [&_div]:transition-all [&_div]:duration-200 [&_div_input]:cursor-pointer">
                            <div class="radio-parent flex justify-center items-center gap-1 text-white font-normal py-4 px-4 bg-[#08104F66] rounded-4xl hover:bg-cynBackGroundBlue">
                                <input
                                    value="all"
                                    type="radio"
                                    name="search-type"
                                    id="all"
                                    <?php echo $search_type === 'all' ? 'checked' : '' ?> />
                                <label for="all">همه</label>

                            </div>

                            <div class="radio-parent flex justify-center items-center gap-1 text-white font-normal py-4 px-4 bg-[#08104F66] rounded-4xl hover:bg-cynBackGroundBlue">
                                <input
                                    value="product"
                                    type="radio"
                                    name="search-type"
                                    id="product"
                                    <?php echo $search_type === 'product' ? 'checked' : '' ?>>
                                <label for="product">خدمات</label>
                            </div>

                            <div class="radio-parent flex justify-center items-center gap-1 text-white font-normal py-4 px-4 bg-[#08104F66] rounded-4xl hover:bg-cynBackGroundBlue">
                                <input class="custom filter blog_input"
                                    value="post"
                                    type="radio"
                                    name="search-type"
                                    id="blog" --
                                    <?php echo $search_type === 'post' ? 'checked' : '' ?>>
                                <label for="blog">بلاگ ها</label>

                            </div>
                            <div class="radio-parent flex justify-center items-center gap-1 text-white font-normal py-4 px-4 bg-[#08104F66] rounded-4xl border hover:bg-cynBackGroundBlue">
                                <input class="custom filter blog_input"
                                    value="post"
                                    type="radio"
                                    name="search-type"
                                    id="blog" --
                                    <?php echo $search_type === 'post' ? 'checked' : '' ?>>
                                <label for="blog">پروژه</label>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>

    <div class="p-2 container">

        <?php if (! empty($_GET['s'])) : ?>

            <?php if (have_posts()) : ?>

                <div id="searchPostsWrapper"
                    class="">
                    <?php while (have_posts()) :
                        the_post()
                    ?>
                        <div class="">
                            <?php Templates::getCard('search') ?>
                        </div>
                    <?php endwhile; ?>
                </div>

            <?php
            else :
                //Templates::getPart('search-not-found');
                echo 'نتیجه‌ای یافت نشد.';
            endif;
            ?>

        <?php endif; ?>
    </div>

</main>


<?php get_footer() ?>