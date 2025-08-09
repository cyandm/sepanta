<?php

use Cyan\Theme\Helpers\Icon;
use Cyan\Theme\Helpers\Templates;

$address_text = get_option('address_text');
$address_link = get_option('address_link');
$phone_number = get_option('phone_number');
$telegram_link = get_option('telegram_link');
$instagram_link = get_option('instagram_link');
$whatsapp_link = get_option('whatsapp_link');
$logo = get_option('logo');

?>

<?php Templates::getPart('backdrop'); ?>

<section class="bg-cynLightGrey rounded-4xl p-8 max-md:py-4 max-md:px-3 flex justify-between max-md:flex-col-reverse max-md:gap-7">

    <div class="flex gap-11 max-md:gap-0.5 max-md:flex-col">

        <div class="">
            <?php wp_nav_menu([
                'menu_id' => 'footer-menu-col-1',
                'menu_class' => 'flex gap-4 max-md:gap-0.5 flex-col text-cynBlue max-md:[&_li_a]:flex max-md:[&_li_a]:rounded-xl max-md:[&_li_a]:px-3 max-md:[&_li_a]:py-2 max-md:[&_li_a]:w-full max-md:[&_li_a]:bg-white max-md:gap-0',
                'depth' => '3',
                'theme_location' => 'footer-menu',
                'container' => 'ul'
            ]); ?>

        </div>

        <div class="">
            <?php wp_nav_menu([
                'menu_id' => 'footer-menu-col-2',
                'menu_class' => 'flex gap-4 max-md:gap-0.5 flex-col text-cynBlue max-md:[&_li_a]:flex max-md:[&_li_a]:rounded-xl max-md:[&_li_a]:px-3 max-md:[&_li_a]:py-2 max-md:[&_li_a]:w-full max-md:[&_li_a]:bg-white max-md:gap-0',
                'depth' => '3',
                'theme_location' => 'footer-menu-two',
                'container' => 'ul'
            ]); ?>

        </div>

        <div class="flex gap-4 flex-col text-cynBlue max-sm:mt-3 ">

            <?php if ($address_text) : ?>

                <a href=" <?php echo $address_link ?>">
                    آدرس:
                    <?php echo $address_text ?>
                </a>

            <?php endif; ?>


            <?php if ($phone_number) : ?>

                <a href="tel:<?php echo $phone_number ?>">
                    شماره تماس : <?php echo $phone_number ?>
                </a>

            <?php endif; ?>


            <?php if ($telegram_link || $instagram_link || $whatsapp_link) : ?>
                <div class="flex gap-3 mt-3 rounded-2xl max-md:justify-center">

                    <?php if ($telegram_link) : ?>
                        <a href="<?php echo $telegram_link ?>" class="bg-cynBlue  rounded-4xl text-white">
                            <div class="size-7 flex items-center justify-center p-1">
                                <?php icon::print('Telegram'); ?>
                            </div>
                        </a>
                    <?php endif; ?>

                    <?php if ($instagram_link) : ?>
                        <a href="<?php echo $instagram_link ?>" class="bg-cynBlue rounded-4xl text-white">
                            <div class="size-7 flex items-center justify-center p-1">
                                <?php icon::print('Instagram'); ?>
                            </div>
                        </a>
                    <?php endif; ?>

                    <?php if ($whatsapp_link) : ?>
                        <a href="<?php echo $whatsapp_link ?>" class="bg-cynBlue  rounded-4xl text-white">
                            <div class="size-7 flex items-center justify-center p-1">
                                <?php icon::print('Whatsup'); ?>
                            </div>
                        </a>
                    <?php endif; ?>

                </div>
            <?php endif; ?>
        </div>

    </div>

    <div class="flex justify-center items-center">
        <img src="<?php echo $logo ?>" alt="logo">
    </div>

</section>