<li class="sticky text-sm leading-6 top-24">
    <div class="relative group">
        <div
            class="absolute transition rounded-lg opacity-25 -inset-1 bg-gradient-to-r from-purple-600 to-pink-600 blur duration-400 group-hover:opacity-100 group-hover:duration-200">
        </div>

        <div class="relative leading-none text-white rounded-lg bg-slate-800 ring-1 ring-gray-900/5">
            <div class="flex overflow-hidden font-bold rounded-t-lg bg-slate-700 text-md">
                {{-- <p class="p-3 px-4 bg-orange-500">
                    2
                </p> --}}
                <p class="p-3 text-white ps-8">

                    <span>CHECKOUT</span>
                </p>
            </div>
            <div class="p-4 md:p-2 ">

                <div class="flex flex-col w-full gap-2 px-4 space-y-3 md:p-3 xl:p-6 dark:bg-gray-800">

                    <div
                        class="flex flex-col items-center justify-center w-full pb-4 space-y-4 border-b border-gray-200">
                        <div class="flex justify-between w-full">
                            <p class="text-base leading-4 text-gray-300 dark:text-white">Subtotal</p>
                            <p class="text-base leading-4 text-gray-300 subtotal dark:text-gray-300">Rp
                                {{ number_format($price, 0, ',', '.') }}
                            </p>
                        </div>
                        <div class="flex justify-between w-full">
                            <p class="text-base leading-4 text-gray-300 dark:text-white">Payment</p>
                            <p class="text-base leading-4 text-gray-300 payment-name dark:text-gray-300">
                                {{ $payName }}</p>
                        </div>
                        <div class="flex items-center justify-between w-full flex-wrap ">
                            <p class="text-base leading-4 text-gray-300 dark:text-white">Discount
                                <span
                                    class="p-1 text-xs font-medium leading-3 text-gray-300 bg-gray-600 discount-name dark:bg-white dark:text-gray-300">
                                    {{ $kodeKupon }}</span>
                            </p>
                            <p class="text-base leading-4 text-gray-300 discount-percent dark:text-gray-300">
                                {{ $diskonKupon ? '-' . $diskonKupon . '%' : '-' }}</p>
                        </div>
                        <div class="flex items-center justify-between w-full">
                            <p class="text-base leading-4 text-gray-300 dark:text-white">Item</p>
                            <p class="text-sm sm:text-base  leading-4 text-gray-300 item-name dark:text-gray-300">
                                {{ $itemName }}</p>
                        </div>
                    </div>
                    <div class="flex items-center justify-between w-full">
                        <p class="text-base font-semibold leading-4 text-gray-300 dark:text-white">Total</p>
                        <p class="text-base font-semibold leading-4 text-gray-300 total dark:text-gray-300">Rp
                            {{ number_format($total, 0, ',', '.') }}
                        </p>
                    </div>
                    <button wire:click="makeTransaction" id="checkoutBtn" type="button"
                        class="text-white my-5 bg-purple-700 hover:bg-purple-800 focus:outline-none focus:ring-4 focus:ring-purple-800 focus:bg-purple-950 font-medium rounded-full text-sm px-5 py-2.5 text-center mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">
                        <span wire:loading.remove>
                            Beli
                            Sekarang
                        </span>
                        <div wire:loading>
                            <svg aria-hidden="true"
                                class="inline w-5 h-5 text-gray-200 animate-spin dark:text-gray-600 fill-gray-600 dark:fill-gray-300"
                                viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                    fill="currentColor" />
                                <path
                                    d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                    fill="currentFill" />
                            </svg>
                        </div>
                    </button>
                </div>

            </div>

        </div>

    </div>
</li>
@script
    <script>
        $wire.on('alertSubmit', (event) => {
            Swal.fire({
                title: event[0]['type'] === 'success' ? 'Proses Berhasil' : 'Proses Gagal',
                text: event[0]['message'],
                icon: event[0]['type'],
                customClass: {
                    popup: 'swal2-blur'
                }
            });


        });
    </script>
@endscript

@if ($errors->any())
    @script
        <script>
            Swal.fire({
                title: 'Proses Tertunda',
                text: 'Mohon Periksa Kembali Input/Data Anda',
                icon: 'info',
                customClass: {
                    popup: 'swal2-blur'
                }
            });
        </script>
    @endscript
@endif
