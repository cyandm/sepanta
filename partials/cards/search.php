<a href="<?php echo get_permalink() ?>"
    class="py-5 px-3 flex gap-2 border-b border-b-cynBlue/14">
    <div>
        <?php the_post_thumbnail([100, 100], ['class' => 'rounded-md min-w-[80px]']) ?>
    </div>

    <div class="flex gap-2 flex-col">
        <div class="text-lg  md:text-2xl ">
            <?php the_title() ?>
        </div>

        <div class="text-gray-500">
            <span>
                <?php echo get_post_type_object(get_post_type())->labels->singular_name ?>
            </span>

        </div>
    </div>
</a>