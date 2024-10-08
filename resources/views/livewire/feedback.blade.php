<section class="py-20 mt-4 sm:mt-6 ">
    <div class="max-w-2xl mx-4 md:mx-10 lg:mx-20 xl:mx-auto">
        <div class="grid grid-cols-1 ">
            <ul class="space-y-8">
                <li class="text-sm leading-6">
                    <div class="relative group">
                        <div
                            class="absolute transition rounded-lg opacity-25 -inset-1 bg-gradient-to-r from-purple-600 to-pink-600 blur duration-400 group-hover:opacity-100 group-hover:duration-200">
                        </div>

                        <div class="relative leading-none text-white rounded-lg bg-slate-800 ring-1 ring-gray-900/5">
                            <div class="flex overflow-hidden font-bold rounded-t-lg bg-slate-700 text-md ">

                                <p class="p-5 text-purple-100 ps-7 sm:ps-12  w-full text-center">

                                    <span class="text-lg  sm:text-xl font-bold">Beri Masukan Kepada
                                        Kami</span>
                                </p>
                            </div>
                            <div class="pt-4 text-left p-7 sm:text-center ">



                                <p class="mb-5 leading-relaxed text-gray-200">Jika Anda mengalami masalah atau
                                    menyukai
                                    produk kami, silakan bagikan kepada kami!
                                </p>
                                <div class="mb-4 text-left">
                                    <label for="name" class="text-md  leading-7 text-gray-200">Nama</label>
                                    <input wire:model="name" type="text" id="name"
                                        class="w-full rounded border border-gray-300 bg-white py-1 px-3 text-base leading-8 text-gray-700 outline-none transition-colors duration-200 ease-in-out focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200"
                                        placeholder="naruto" />
                                </div>
                                <div class="mb-4 text-left">
                                    <label for="email" class="text-md  leading-7 text-gray-200">Email</label>
                                    <input wire:model="email" type="email" id="email" name="email"
                                        class="w-full rounded border border-gray-300 bg-white py-1 px-3 text-base leading-8 text-gray-700 outline-none transition-colors duration-200 ease-in-out focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200"
                                        placeholder="example@gmail.com" />
                                </div>
                                <div class="mb-4 text-left">
                                    <label for="message" class="text-md leading-7 text-gray-200">Message</label>
                                    <textarea id="message" name="message" wire:model="message"
                                        class="h-32 w-full resize-none rounded border border-gray-300 bg-white py-1 px-3 text-base leading-6 text-gray-700 outline-none transition-colors duration-200 ease-in-out focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200"></textarea>
                                </div>
                                <div class="flex justify-end">


                                    <button wire:click="sendEmail"
                                        class="rounded-lg mt-3  border-0 bg-purple-700 py-2 px-10 text-lg text-white hover:bg-purple-800 focus:outline-none"><span
                                            wire:loading.remove>
                                            Kirim Pesan
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




            </ul>




        </div>
    </div>
</section>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endpush

@script
    <script>
        $wire.on('alert', (event) => {

            Swal.fire({
                title: event[0]['type'] === 'success' ? 'Proses Sukses' : 'Proses Gagal',
                text: event[0]['message'],
                icon: event[0]['type'],
                customClass: {
                    popup: 'swal2-blur'
                }
            });


        });
    </script>
@endscript
