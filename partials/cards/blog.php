<?php

use Cyan\Theme\Helpers\Icon; ?>


<section class="container flex gap-3 max-lg:flex-col">

      <div class="w-[25%] max-lg:w-full">

            <div class="shadow-[0px_0px_10px_0px_rgba(0,_0,_0,_0.14)] p-3.5 rounded-3xl ">

                  <form id="search-form">
                        <div class="relative">
                              <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                    <div class="w-6 text-cynBlue stroke-[2]">
                                          <?php icon::print('Search,-Loupe'); ?>
                                    </div>
                              </div>
                              <input type="text"
                                    id="email-address-icon"
                                    name="s"
                                    value="<?php the_search_query() ?>"
                                    class="bg-white rounded-4xl text-[#07162C] font-semibold border border-[#07162C] pt-3 pr-11 focus-visible:border-[#002D74] focus-visible:outline-[#002D74] focus:border-[#002D74] block p-2.5 w-full"
                                    placeholder="جستجو کن">
                        </div>
                  </form>


                  
            </div>

</section>