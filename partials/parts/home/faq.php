<?php
$faq_cats = get_terms([
    'taxonomy' => 'faq-cat',
    'hide_empty' => true
]);

?>


<section class="container my-16 max-md:my-11 flex flex-col gap-4" id="faq">
    <div class="text-5xl font-semibold text-cynBlue max-md:text-4xl">
        <?php _e('اگه سوالی داری...', 'cyn-dm') ?>
    </div>

    <div class="grid grid-cols-6 gap-3 max-xl:grid-cols-8 max-md:flex max-md:flex-col">
        <div class="col-span-1 max-xl:col-span-2 flex flex-col gap-4 max-md:flex-row max-md:flex-wrap max-md:justify-center max-md:gap-2">
            <?php foreach ($faq_cats as $index => $category) : ?>
                <div class="fade-in-down"
                    anim-delay="<?php echo $index * 0.3 ?>">
                    <div id="<?php echo "faq-cat-" . $category->term_id ?>"
                        class="faq-handler | rounded-full cursor-pointer duration-300 bg-[#9C9FB9] text-white text-center py-3 px-6 border hover:bg-cynBlue hover:border-primary-0 hover:text-white transition-all shadow-cxl hover:shadow-cxt text-base font-medium">
                        <?php echo $category->name ?>
                    </div>
                </div>
            <?php endforeach; ?>
            <div class="fade-in-down"
                anim-delay="<?php echo count($faq_cats) * 0.3 ?>">
                <a href="tel:<?php echo get_option('phone_number') ?>"
                    class="rounded-full block cursor-pointer duration-300 text-white bg-[#9C9FB9] text-center py-3 px-6 border hover:bg-cynBlue hover:border-primary-0 hover:text-white transition-all shadow-cxl hover:shadow-cxt text-base font-medium">
                    <?php _e('تماس با ما', 'cyn-dm') ?>
                </a>
            </div>
        </div>

        <div class="col-span-5 max-xl:col-span-6 max-md:col-span-6">
            <div class="fade-in-down"
                anim-delay="0.8">
                <?php foreach ($faq_cats as $index => $category) : ?>

                    <div class="faq-panel grid grid-rows-[0fr] transition-all duration-700"
                        controlled-by="<?php echo "faq-cat-" . $category->term_id ?>">
                        <div class="overflow-hidden">
                            <?php get_template_part('partials/parts/faq-group', null, ['term_ids' => [$category->term_id]]); ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>