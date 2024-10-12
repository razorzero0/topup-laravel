<li class="text-sm leading-6" id="box-payment">
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

                    <span>PILIH PEMBAYARAN </span>
                    @error('payCode')
                        <x-input-error :messages="$message" class="mt-3 ms-3" />
                    @enderror
                </p>
            </div>
            <div class="flex flex-col gap-4 p-7" x-data="{ activeButton: null }">
                @php
                    $no = 0;
                @endphp
                @foreach ($payment as $key => $channel)
                    <div id="accordion-flush" data-accordion="collapse"
                        data-active-classes="bg-slate-500 dark:bg-gray-900 text-gray-900 dark:text-white"
                        data-inactive-classes="text-slate-400 dark:text-gray-400">
                        <h2 id="accordion-flush-heading-{{ $no }} ">
                            <button type="button"
                                class="flex items-center justify-between w-full gap-3 p-4 py-5 font-medium border border-b rounded-lg bg-slate-700 text-slate-200 hover:bg-slate-600 hover:text-white focus:z-10  dark:hover:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700 rtl:text-right border-slate-600 dark:border-gray-700 dark:text-gray-400"
                                data-accordion-target="#accordion-flush-body-{{ $no }}" aria-expanded="false"
                                aria-controls="accordion-flush-body-{{ $no }}">
                                <div class=" text-left w-[90%] ">
                                    <span class="block pb-1 text-sm sm:text-lg ">{{ $key }}</span>

                                    <hr class="border w-full border-slate-500" />
                                </div>
                                <div class="flex gap-2">
                                    {{-- <span>Rp.0 ~ Rp.0</span> --}}
                                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M9 5 5 1 1 5" />
                                    </svg>
                                </div>
                            </button>
                        </h2>

                        <div id="accordion-flush-body{{ $no }}"
                            aria-labelledby="accordion-flush-heading-{{ $no }}">
                            <div class="grid grid-cols-2 gap-2 pt-4 lg:grid-cols-3">
                                @foreach ($channel as $data)
                                    @php
                                        $feeItem = $fee->where('group', $data['group'])->first();
                                        $feePlusPrice = isset($feeItem['fee'])
                                            ? $itemPrice + $feeItem['fee']
                                            : $itemPrice;
                                    @endphp
                                    <button
                                        @if ($itemPrice >= $data['minimum_amount']) @click="activeButton = '{{ $data['code'] }}'; $wire.addPay({{ $feePlusPrice }}, '{{ $data['name'] }}', '{{ $data['code'] }}','{{ $data['group'] }}')" @endif
                                        :class="{ 'paymentActive': activeButton === '{{ $data['code'] }}' }"
                                        class="h-24 p-2 border sm:h-28 rounded-xl bg-slate-700 text-slate-200 border-slate-600 hover:bg-slate-500">
                                        <div class="flex justify-between pb-2 border-b">
                                            <img class="w-14 p-0.5 rounded-md bg-slate-200 h-6 border border-slate-700"
                                                src="{{ $data['icon_url'] }}" />
                                            <span
                                                class="text-xs payment-price sm:text-md font-extralight sm:font-medium">

                                                @if ($itemPrice >= $data['minimum_amount'])
                                                    Rp {{ number_format($feePlusPrice, 0, ',', '.') }}
                                                @else
                                                    <span class="text-xs text-red-500 ">Min. Rp
                                                        {{ number_format($data['minimum_amount'], 0, ',', '.') }}</span>
                                                @endif

                                            </span>
                                        </div>
                                        <div class="pt-2">
                                            <span class="text-xs font-light">{{ $data['name'] }}</span>
                                        </div>
                                    </button>
                                @endforeach
                            </div>
                        </div>

                    </div>
                    @php
                        $no++;
                    @endphp
                @endforeach

            </div>

        </div>

    </div>
</li>
