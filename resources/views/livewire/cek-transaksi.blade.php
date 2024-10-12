<section class="py-20 mt-4 sm:mt-6 ">
    <div class="max-w-6xl mx-8 md:mx-10 lg:mx-20 xl:mx-auto">
        <div class="grid grid-cols-1 ">
            <ul class="space-y-8">
                <li class="text-sm leading-6">
                    <div class="relative group">
                        <div
                            class="absolute transition rounded-lg opacity-25 -inset-1 bg-gradient-to-r from-purple-600 to-pink-600 blur duration-400 group-hover:opacity-100 group-hover:duration-200">
                        </div>

                        <div class="relative leading-none text-white rounded-lg bg-slate-800 ring-1 ring-gray-900/5">
                            <div class="flex overflow-hidden font-bold rounded-t-lg bg-slate-700 text-md ">

                                <p class="p-5 text-purple-100 ps-7 sm:ps-12">

                                    <span>CARI PESANAN MU</span>
                                </p>
                            </div>
                            <div class="pt-1 text-left p-7 sm:text-center">

                                <p class="my-5 font-bold text-md sm:text-xl text-slate-100">
                                    Pantau transaksi Anda dengan memasukkan Nomor Invoice di bawah ini:

                                </p>


                                <form wire:submit="cekInvoice" class="max-w-lg mx-auto " method="GET">

                                    <div class="w-full ">
                                        <input wire:model="query" type="text" id="voice-search"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-4 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="ALGXXXXXXXXXXXXXX" type="text" name="query" id="query"
                                            value="{{ request('query') }}" required />

                                    </div>
                                    <div class="flex justify-end">
                                        <button type="submit"
                                            class="inline-flex my-3 mt-5 w-[70%] sm:w-[30%] items-center justify-center py-2.5 px-3 text-xs sm:text-sm font-medium text-white bg-purple-700 rounded-lg border border-purple-700 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-800">
                                            <svg wire:loading.remove class="w-4 h-4 me-2" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                            </svg><span wire:loading.remove>
                                                Cari Transaksi
                                            </span>
                                            <div wire:loading>
                                                <svg aria-hidden="true"
                                                    class="inline w-5 h-5 text-gray-200 animate-spin dark:text-gray-600 fill-gray-600 dark:fill-gray-300"
                                                    viewBox="0 0 100 101" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
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
                                </form>

                            </div>

                        </div>

                    </div>
                </li>
                @if ($query)
                    <li class="text-sm leading-6">
                        <div class="relative group">
                            <div
                                class="absolute transition rounded-lg opacity-25 -inset-1 bg-gradient-to-r from-purple-600 to-pink-600 blur duration-400 group-hover:opacity-100 group-hover:duration-200">
                            </div>

                            <div
                                class="relative leading-none text-white rounded-lg bg-slate-800 ring-1 ring-gray-900/5">
                                <div class="flex overflow-hidden font-bold rounded-t-lg bg-slate-700 text-md">

                                    <p class="p-5 text-purple-100 ps-7 sm:ps-12">

                                        <span>DAFTAR TRANSAKSI</span>
                                    </p>
                                </div>
                                <div class="text-left p-7 sm:text-center">

                                    <div class="relative overflow-x-auto  " id="scrollme">
                                        @if ($data)
                                            <table class="w-full text-sm text-left rtl:text-right">
                                                <thead
                                                    class="text-xs text-gray-200 uppercase border-b-2 border-b-slate-700">
                                                    <tr>
                                                        <th scope="col" class="px-6 py-3">

                                                            Tanggal
                                                        </th>
                                                        <th scope="col" class="px-6 py-3">
                                                            No. Invoice
                                                        </th>
                                                        <th scope="col" class="px-6 py-3">
                                                            No. Whatsapp
                                                        </th>
                                                        <th scope="col" class="px-6 py-3">
                                                            Harga
                                                        </th>
                                                        <th scope="col" class="px-6 py-3">
                                                            Status
                                                        </th>

                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <tr class="text-gray-400 ">
                                                        <th scope="row" class="px-6 py-4 font-medium ">

                                                            {{ $data['created_at'] }}
                                                        </th>
                                                        <td class="px-6 py-4">
                                                            {{ $data['merchant_ref'] }}
                                                        </td>
                                                        <td class="px-6 py-4">


                                                            {{ substr($data['customer_phone'], 0, 3) . str_repeat('X', strlen($data['customer_phone']) - 6) . substr($data['customer_phone'], -3) }}
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            Rp. {{ number_format($data['amount'], 0, ',', '.') }}
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            @if (strtolower($data['status']) == 'paid')
                                                                <span
                                                                    class="bg-green-100 text-green-800 text-xs font-medium me-2 px-4 py-0.5 rounded-xl dark:bg-gray-700 dark:text-green-400 border border-green-400">{{ $data['status'] }}</span>
                                                            @elseif(strtolower($data['status']) == 'failed')
                                                                <span
                                                                    class="bg-red-100 text-red-800 text-xs font-medium me-2 px-4 py-0.5 rounded-xl dark:bg-gray-700 dark:text-red-400 border border-red-400">{{ $data['status'] }}</span>
                                                            @else
                                                                <span
                                                                    class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-4 py-0.5 rounded-xl dark:bg-gray-700 dark:text-yellow-300 border border-yellow-300">{{ $data['status'] }}</span>
                                                            @endif

                                                        </td>

                                                    </tr>

                                                </tbody>
                                            </table>
                                        @else
                                            <div class="h-5 text-center text-slate-100">
                                                Transaksi tidak ditemukan!
                                            </div>
                                        @endif
                                    </div>

                                </div>

                            </div>

                        </div>
                    </li>
                @endif



            </ul>




        </div>
    </div>
</section>
