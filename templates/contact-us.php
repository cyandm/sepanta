<?php /* Template Name: contact-us */ ?>
<?php

use Cyan\Theme\Helpers\Icon;
use Cyan\Theme\Helpers\Templates;

$under_title = get_field('under_title');
$contact_img = get_field('contact_img');


get_header();
?>

<main class="container">

    <section class=" mt-6 flex max-lg:flex max-lg:flex-col-reverse">

        <div class="w-1/2 max-lg:w-full flex flex-col gap-4 my-32 max-lg:my-0 max-lg:mx-0 mx-16 max-sm:py-6 max-sm:px-4 ">
            <div class="text-cynBlue text-2xl font-semibold">
                <?php the_title() ?>
            </div>

            <p class="text-base text-cynBlue">
                <?php echo $under_title; ?>
            </p>
            <form action="" method="post" id="contact_form" class="flex flex-col gap-4 [&_label]:w-full">

                <label for="phone" class="flex gap-1.5 items-center font-medium text-cynLighter bg-cynLightGrey w-2/5 px-5 py-3 rounded-4xl ">

                    <div class="size-6 text-cynLighter stroke-[1.25]">
                        <?php icon::print('Phone,-Call-11'); ?>
                    </div>

                    <input
                        type="tel"
                        id="phone"
                        name="phone"
                        placeholder="شماره تماس"
                        pattern="[0-9]{11}"
                        required
                        dir="rtl"
                        class="focus:outline-none w-full" />

                </label>

                <label for="fullname" class="flex items-center gap-1.5 font-medium text-cynLighter bg-cynLightGrey w-2/5 px-5 py-3 rounded-4xl">

                    <div class="size-6 text-cynLighter stroke-[1.25]">
                        <?php icon::print('User,-Profile-7'); ?>
                    </div>

                    <input
                        type="text"
                        id="name"
                        name="name"
                        placeholder="نام شما"
                        required
                        class="focus:outline-none w-full" />

                </label>


                <label for="phone" class="flex gap-1.5 font-medium text-cynLighter bg-cynLightGrey px-5 py-3 rounded-4xl w-full">

                    <div class="size-6 text-cynLighter stroke-[1.25]">
                        <?php icon::print('message-text'); ?>
                    </div>

                    <textarea name="message" id="message" rows="1" maxlength="65525" placeholder="سوالتو اینجا بنویسید" required class="focus:outline-none w-full text-cynTextGray resize-y m-0 align-bottom"></textarea>
                </label>
                <div class="flex justify-end">
                    <a href="#" class="rounded-4xl bg-cynBlue text-white px-6 py-3 flex justify-center gap-1 items-center text-base font-light max-lg:w-full">
                        <span class="size-6">
                            <?php icon::print('Send-message,-Send,-Share-3') ?>
                        </span>
                        ارسال پیام
                    </a>
                </div>


            </form>
        </div>

        <div class="flex w-1/2 max-lg:w-full max-lg:h-96 justify-end max-lg:rounded-bl-none max-lg:rounded-tr-4xl overflow-hidden bg-center bg-no-repeat bg-contain" style="background-image: url('<?php echo wp_get_attachment_image_url($contact_img, 'full') ?>');">
        </div>
    </section>


</main>


<?php get_footer(); ?>