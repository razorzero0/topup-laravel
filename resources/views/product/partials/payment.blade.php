<li class="text-sm leading-6">
    <div class="relative group">
        <div
            class="absolute transition rounded-lg opacity-25 -inset-1 bg-gradient-to-r from-purple-600 to-pink-600 blur duration-400 group-hover:opacity-100 group-hover:duration-200">
        </div>

        <div class="relative leading-none text-white rounded-lg bg-slate-800 ring-1 ring-gray-900/5">
            <div class="flex overflow-hidden font-bold rounded-t-lg bg-slate-700 text-md">
                <p class="p-3 px-4 bg-orange-500">
                    4
                </p>
                <p class="p-3 px-2 text-white">

                    <span>PILIH PEMBAYARAN <span id="total"></span></span>
                </p>
            </div>
            <div class="flex flex-col gap-4 p-7">


                <button type="button"
                    class="w-full px-4 py-2 font-medium border rounded-md bg-slate-700 text-slate-400 border-slate-600 rounded-s-lg hover:bg-slate-600 hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-slate-500 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700">
                    <div class="flex items-center justify-between">
                        <div class="text-md">
                            <span>QRIS (All Payment)</span>
                            <img class="h-8 my-4 mb-1" src={{ asset('assets/img/qris.webp') }} />
                        </div>
                        <span class="text-lg italic text-slate-400"> SOON</span>
                        {{-- <span class="text-lg text-slate-400"> Rp. 12.000</span> --}}
                    </div>
                </button>

                <div id="accordion-flush" data-accordion="collapse"
                    data-active-classes="bg-slate-500 dark:bg-gray-900 text-gray-900 dark:text-white"
                    data-inactive-classes="text-slate-400 dark:text-gray-400">
                    <h2 id="accordion-flush-heading-2 ">
                        <button type="button"
                            class="flex items-center justify-between w-full gap-3 p-4 py-5 font-medium border border-b rounded-lg bg-slate-700 text-slate-400 hover:bg-slate-600 hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-slate-500 focus:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700 rtl:text-right border-slate-600 dark:border-gray-700 dark:text-gray-400"
                            data-accordion-target="#accordion-flush-body-2" aria-expanded="false"
                            aria-controls="accordion-flush-body-2">
                            <span>E-Wallet</span>
                            <div class="flex gap-2">
                                <span>Rp.0 ~ Rp.0</span>
                                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M9 5 5 1 1 5" />
                                </svg>
                            </div>
                        </button>
                    </h2>
                    <div id="accordion-flush-body-2" class="hidden" aria-labelledby="accordion-flush-heading-2">
                        <div
                            class="py-5 italic text-center border-b border-slate-700 dark:border-gray-700 text-slate-400">
                            SOON
                        </div>
                    </div>

                </div>



            </div>

        </div>

    </div>
</li>
