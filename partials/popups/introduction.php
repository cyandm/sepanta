<?php

use Cyan\Theme\Helpers\Icon;

?>

<section modal
    data-modal-name="introduction-modal"
    data-active="false"
    class="mx-auto w-3/5 max-lg:w-4/5 max-md:w-[90%] flex flex-col justify-center gap-2 fixed inset-0 z-50 transition-all duration-300 data-[active='true']:opacity-100 data-[active='true']:pointer-events-auto data-[active='false']:opacity-0 data-[active='false']:pointer-events-none">
    <!-- Buttons -->
    <div class="flex flex-row justify-end gap-4">

        <!-- Closer -->
        <div modal-closer
            data-modal-name="introduction-modal">
            <div class="flex">
                <div>
                    <a class="bg-white p-1 border border-cynLightBlue rounded-full cursor-pointer block">
                        <div class="text-cynBlue size-8">
                            <?php icon::print('Delete,-Disabled') ?>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <video class="video-plyr rounded-4xl"
        controls
        playsinline>
        <source src="#" />
    </video>



</section>