<div>
    <section
        class="p-3 mx-4 mt-20 border rounded-lg sm:mt-24 sm:mx-16 sm:p-8 border-slate-500 text-slate-200 bg-slate-800">
        <div class="flex items-center justify-between gap-2 py-8 border-b">
            <p class="font-semibold text-md sm:text-2xl">
                No. Invoice
            </p>

            <div class="relative">
                <label for="npm-install-copy-button" class="sr-only">Label</label>
                <input id="npm-install-copy-button" type="text"
                    class="col-span-6 bg-slate-800 border border-gray-300 text-gray-200 text-md sm:text-xl rounded-sm focus:ring-blue-500 focus:border-blue-500 block w-full ps-4 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    value="{{ $invoice->merchant_ref }} " disabled readonly>
                <button data-copy-to-clipboard-target="npm-install-copy-button"
                    data-tooltip-target="tooltip-copy-npm-install-copy-button"
                    class="absolute inline-flex items-center justify-center p-2 -translate-y-1/2 rounded-lg text-slate-200 end-2 top-1/2 dark:text-gray-400 hover:bg-slate-700 dark:hover:bg-gray-800">
                    <span id="default-icon">
                        <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 18 20">
                            <path
                                d="M16 1h-3.278A1.992 1.992 0 0 0 11 0H7a1.993 1.993 0 0 0-1.722 1H2a2 2 0 0 0-2 2v15a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2Zm-3 14H5a1 1 0 0 1 0-2h8a1 1 0 0 1 0 2Zm0-4H5a1 1 0 0 1 0-2h8a1 1 0 1 1 0 2Zm0-5H5a1 1 0 0 1 0-2h2V2h4v2h2a1 1 0 1 1 0 2Z" />
                        </svg>
                    </span>
                    <span id="success-icon" class="inline-flex items-center hidden ">
                        <svg class="w-3.5 h-3.5 text-blue-700 dark:text-blue-500" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 5.917 5.724 10.5 15 1.5" />
                        </svg>
                    </span>
                </button>
                <div id="tooltip-copy-npm-install-copy-button" role="tooltip"
                    class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                    <span id="default-tooltip-message">Copy to clipboard</span>
                    <span id="success-tooltip-message" class="hidden">Copied!</span>
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
            </div>

        </div>

        {{-- <div class="my-4">
            <p class="text-xs font-semibold uppercase ">Factura CUFE:</p>
            <p class="font-semibold">{{ $invoice->tripay_reference }} </p>
        </div> --}}
        <p class="mt-3 font-bold text-center text-md sm:text-xl">Pembayaran Menggunakan QRIS</p>
        <div class="grid grid-cols-2 gap-4 py-5 mb-4 border-b sm:grid-cols-2">
            <div>
                <p class="text-slate-300 ">Status:</p>
                <p
                    class="text-2xl font-semibold @if ($invoice->status == 'PAID') text-green-400
                  @else
                  text-orange-400 @endif ">

                    {{ $invoice->status }}

                </p>
                <div class="my-3">
                    <p class=" text-slate-300">Email:

                    </p>

                    <p class="font-semibold">
                        {{ $invoice['customer_email'] }}</p>
                </div>
                <div class="my-3 ">
                    <p class=" text-slate-300">Nomer HP:

                    </p>

                    <p class="font-semibold">

                        {{ $invoice['customer_phone'] ?? '-' }}

                    </p>

                </div>
                <div class="my-3">
                    <p class=" text-slate-300">Item:

                    </p>

                    <p class="font-semibold">

                        {{ $items[0]['name'] }}

                    </p>

                </div>

            </div>
            <div>
                @if ($invoice->qr_url)
                    <p class="text-slate-300">Scan untuk membayar:</p>
                    <img class="w-auto my-3 h-36" src="{{ $invoice->qr_url }}" />
                @endif
                <div class="my-2">
                    <p class="text-slate-300 ">Jumlah tagihan:</p>
                    <p class="text-2xl font-semibold">Rp {{ number_format($invoice['amount'], 0, ',', '.') }}</p>
                </div>

            </div>
            <div>
                <p class="text-slate-300">Tanggal Request:

                </p>

                <p class="font-semibold">
                    {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $invoice->created_at)->format('d-m-Y H:i') }}
                    WIB</p>
            </div>
            <div>
                <p class="text-slate-300">Batas Membayar:

                </p>

                <p class="font-semibold">
                    {{ \Carbon\Carbon::createFromTimestamp($invoice->expired_time)->timezone('Asia/Jakarta')->format('d-m-Y H:i') }}
                    WIB</p>
            </div>

        </div>

        <div class="grid grid-cols-1 gap-2 py-4 md:grid-cols-2 ">
            <div class="p-2 border rounded-md ">
                <p class="text-slate-300 text-md ">Rincian transaksi:</p>
                @foreach ($items as $item)
                    <p class="text-lg ">{{ $item['name'] }} ({{ number_format($item['price'], 0, ',', '.') }}) x
                        {{ $item['quantity'] }}</p>
                @endforeach
            </div>
            <div class="p-2 border rounded-md ">
                <p class="text-slate-300 text-md ">Total:</p>
                {{ number_format($invoice['amount'], 0, ',', '.') }}
            </div>


        </div>
        <div class="flex justify-end gap-4 mt-5">
            <a href={{ route('index') }} wire:navigate
                class="p-3 px-6 text-sm font-medium text-center text-white border-2 rounded-lg bg-slate-800 hover:bg-slate-600 focus:ring-4 focus:outline-none focus:ring-gray-600 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800 border-slate-600">Kembali
                ke beranda</a>

            <!-- Modal toggle -->
            <a href="#instructions" data-modal-target="default-modal" data-modal-toggle="default-modal"
                class="block px-5 py-3 text-sm font-medium text-center text-white bg-purple-700 rounded-lg hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                type="button">
                Cara Pembayaran

            </a>



        </div>
    </section>
    <div id="instructions" class=""></div>
    <section
        class="p-3 mx-4 mt-20 border rounded-lg sm:mt-20 sm:mx-16 sm:p-8 border-slate-500 text-slate-200 bg-slate-800">
        <div class="py-8 border-b">

            <h1 class="text-2xl font-bold">Cara Pembayaran </h1>
        </div>


        <div class="grid grid-cols-1 gap-2 py-4 md:grid-cols-2">



            @foreach ($instructions as $instruction)
                <div class="p-2 border rounded-md ">
                    <p class="text-xl font-semibold ">{{ $instruction['title'] }}</p>
                    <ul class="mt-3 ">
                        @foreach ($instruction['steps'] as $no => $step)
                            <li class=" text-md"> {!! $no + 1 . '. ' . $step !!}</li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>
    </section>
</div>
