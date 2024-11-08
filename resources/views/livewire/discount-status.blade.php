<div class="pt-20  flex justify-center p-2">
    <div class="bg-slate-800 mt-0 md:mt-5 p-8 max-w-md  rounded-xl">
        <svg viewBox="0 0 24 24" class="w-16 h-16 mx-auto my-6">
            <!-- Lingkaran hijau -->
            <circle cx="12" cy="12" r="12" fill="#34D399"></circle>

            <!-- Centang putih -->
            <path fill="#FFFFFF"
                d="M18.927,8.2l-6.845,9.289a1.011,1.011,0,0,1-1.43.188L5.764,13.769a1,1,0,1,1,1.25-1.562l4.076,3.261,6.227-8.451A1,1,0,1,1,18.927,8.2Z">
            </path>
        </svg>

        <div class="text-center">
            <h3 class="md:text-2xl text-base text-gray-400 font-semibold text-center">Proses Berhasil!
            </h3>
            <p class="text-gray-500 my-2">Terima kasih telah bertransaksi menggunakan kode diskon kami</p>
            <p class="my-2 mb-8 text-gray-300 ">{{ $transaction->item_name }}</p>
            <a href="{{ route('index') }}"
                class=" text-white w-[60%] sm:w-[30%] -skew-x-12 bg-purple-700 hover:bg-purple-800 focus:outline-none focus:ring-4 focus:ring-purple-800 focus:bg-purple-950 font-medium text-sm px-5 py-2.5 text-center mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900 rounded-md">
                Kembali ke Beranda

            </a>

        </div>
    </div>
</div>
