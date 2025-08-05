<a href="<?php the_permalink(); ?>" class="w-full h-fit relative group">

    <?php echo wp_get_attachment_image(get_post_thumbnail_id(), 'full', false, ['class' => 'object-cover h-[280px] transition-all duration-500']); ?>

    <div class="absolute bottom-0 left-0 h-full w-full p-6 max-md:p-3 flex items-start flex-col gap-2 bg-[#08104F]/50">

        <span class="text-xs font-normal text-cynWhite">
            <?php echo get_the_terms(get_the_ID(), 'service-cat')[0]->name; ?>
        </span>

        <p class="text-xl font-bold text-cynWhite"><?php the_title(); ?></p>

    </div>

</a>