<li class="text-sm leading-6">
    <div class="relative group">
        <div
            class="absolute transition rounded-lg opacity-25 -inset-1 bg-gradient-to-r from-purple-600 to-pink-600 blur duration-400 group-hover:opacity-100 group-hover:duration-200">
        </div>

        <div class="relative leading-none text-white rounded-lg bg-slate-800 ring-1 ring-gray-900/5">
            <div class="flex overflow-hidden font-bold rounded-t-lg bg-slate-700 text-md">
                <p class="p-3 px-4 bg-orange-500">
                    3
                </p>
                <p class="p-3 px-2 text-white">

                    <span>Pilih Jumlah <span id="total"></span></span>
                </p>
            </div>
            <div class="p-4 ">

                <div class="flex flex-wrap justify-center gap-3 text-md " role="group">
                    @foreach ($data as $item)
                        <a href="#box-payment" type="button" data-price={{ $item['price'] }}
                            data-name="{{ $item['item_name'] }}" data-code={{ $item['id'] }}
                            class="h-20 sm:h-24 w-full sm:w-40 px-2 py-2 text-center flex flex-col gap-2 items-center justify-center font-medium border rounded-md btn  bg-slate-700 text-slate-400 border-slate-600 rounded-s-lg hover:bg-orange-400 hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-orange-400 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700">

                            <span class="text-sm font-medium block">{{ $item['item_name'] }}</span>
                            <span class="text-xs font-light"> (Rp.{{ number_format($item['price']) }})</span>
                        </a>
                    @endforeach


                </div>


            </div>

        </div>

    </div>
</li>
