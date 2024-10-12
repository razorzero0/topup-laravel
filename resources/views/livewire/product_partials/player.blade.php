<li class="text-sm leading-6">
    <div class="relative group">
        <div
            class="absolute transition rounded-lg opacity-25 -inset-1 bg-gradient-to-r from-purple-600 to-pink-600 blur duration-400 group-hover:opacity-100 group-hover:duration-200">
        </div>

        <div class="relative leading-none text-white rounded-lg bg-slate-800 ring-1 ring-gray-900/5">
            <div class="flex overflow-hidden font-bold rounded-t-lg bg-slate-700 text-md">
                <p class="p-3 px-4 bg-orange-500">
                    2
                </p>
                <p class="p-3 px-2 text-white">

                    <span>Masukkan Tujuan </span>
                </p>
            </div>
            <div class=" px-7 py-4">
                <p class="mb-3">{{ $deskripsiPlayer }}</p>

                <div class="relative mb-1">
                    <div class="absolute inset-y-0 flex items-center pointer-events-none start-0 ps-3">

                        <svg class="w-6 h-6 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M12 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4h-4Z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <input wire:model.blur="id_player" id="idPlayer" type="text" id="input-group-1"
                        class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="{{ $deskripsiPlayer }}">

                </div>
                <p class="text-xs font-normal italic text-justify">{{ $alertPlayer }}</->
                    @error('id_player')
                        <x-input-error :messages="$message" class="mt-2 justify-center" />
                    @enderror
            </div>

        </div>

    </div>
</li>
