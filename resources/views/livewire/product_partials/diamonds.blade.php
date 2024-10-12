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

                    <span>Pilih Jumlah </span> @error('itemId')
                        <x-input-error :messages="$message" class="mt-3 ms-3" />
                    @enderror

                </p>
            </div>
            <div class="p-4 ">

                <div x-data="{ activeButton: null }" class="grid grid-cols-2 gap-2 text-md " role="group">
                    @foreach ($data as $item)
                        <a href="#box-payment" @click="activeButton = {{ $item['id'] }}"
                            :class="{ 'btnActive': activeButton === {{ $item['id'] }} }" type="button"
                            wire:click="addItem({{ $item['price'] }}, '{{ addslashes($item['item_name']) }}', '{{ $item['id'] }}','{{ $item['buyer_sku_code'] }}')"
                            class="flex flex-col items-center justify-center h-24 p-1 py-2 font-medium text-center border rounded-md  btn bg-slate-700 text-slate-400 border-slate-600 rounded-s-lg hover:bg-orange-400 hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-orange-400 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700">

                            <span class="block text-xs font-medium">{{ $item['item_name'] }}</span>
                            <div class=" flex w-full justify-around items-center ">
                                <hr class="border border-slate-500 w-[80%]" />
                                <img class="w-auto h-4 sm:h-8 " src="{{ asset($item->file['image']) }}" />
                            </div>
                            <span class="text-xs font-light"> (Rp.{{ number_format($item['price']) }})</span>
                        </a>
                    @endforeach


                </div>


            </div>

        </div>

    </div>
</li>
