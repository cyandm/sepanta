<?php

use Cyan\Theme\Helpers\Icon;

$postId = $args['post-id'] ?? get_the_ID();

if ($postId === 0) {
    throw new ErrorException('post id is invalid', 0, E_WARNING);
}
?>

<div class="py-6 | faq-card"
    id="<?php echo "faq-$postId" ?>">
    <div class="faq-toggle | flex justify-between gap-2 items-center cursor-pointer">
        <span class="text-cynBlue text-xl font-semibold max-md:text-base">
            <?php echo '• ' . get_the_title($postId) ?>
        </span>

        <div class="icon size-8 fill-cynBlue stroke-cynBlue text-cynBlue transition-all [&_svg]:duration-300 rotate-45">
            <?php Icon::print('Delete,-Disabled'); ?>
        </div>
    </div>

    <div class="faq-expert | grid grid-rows-[0fr] transition-all duration-300">
        <div class="overflow-hidden">
            <div class="pt-4 [&_a]:text-[#172EF9] [&_a]:underline text-cynBlue text-base font-normal">
                <?php echo get_the_content(null, false, $postId) ?>
            </div>
        </div>
    </div>
</div>