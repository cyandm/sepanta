<?php

use Cyan\Theme\Helpers\Templates;
use Cyan\Theme\Helpers\Icon;

$contact_image = get_option('contact_image');
$contact_title = get_option('contact_title');
$contact_address = get_option('contact_address');
$contact_address_link = get_option('contact_address_link');
$contact_tel = get_option('contact_tel');
$contact_social = get_option('contact_social');
$contact_social_link = get_option('contact_social_link');
?>

<section class="container flex max-md:flex-col-reverse gap-8 items-center my-16 max-md:my-11">

    <div class="md:w-1/2 flex flex-col gap-6">

        <?php if ($contact_title): ?>
            <p class="text-5xl font-semibold text-cynBlue max-md:text-4xl"><?= $contact_title ?></p>
        <?php endif; ?>

        <?php if ($contact_address && !empty($contact_address_link)): ?>
            <a href="<?= $contact_address_link ?>" class="text-xl font-medium text-cynBlue"><span class="text-xl font-bold"> آدرس : </span><?= $contact_address ?></a>
        <?php endif; ?>

        <?php if ($contact_tel && !empty($contact_tel)): ?>
            <a href="tel:<?= $contact_tel ?>" class="text-xl font-medium text-cynBlue"><span class="text-xl font-bold"> شماره تلفن : </span><?= $contact_tel ?></a>
        <?php endif; ?>

        <?php if ($contact_social && !empty($contact_social_link)): ?>
            <a href="<?= $contact_social_link ?>" class="text-xl font-medium text-cynBlue flex items-center gap-1">
                <p class="text-xl font-bold">شبکه های اجتماعی : </p>
                <div class="bg-[#E1E2EA] py-1 px-2 rounded-lg w-fit text-cynBlue flex gap-1 items-center text-xl font-medium max-md:text-base">

                    <?= $contact_social ?>

                    <div class="size-8 rounded-full p-1 bg-white flex justify-center items-center">
                        <?php Icon::print('Instagram') ?>
                    </div>

                </div>
            </a>
        <?php endif; ?>

    </div>

    <?php if ($contact_image): ?>
        <div class="md:w-1/2">
            <img src="<?= $contact_image ?>" alt="" class="w-full">
        </div>
    <?php endif; ?>

</section>