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
            <div class="py-4 px-4">
                <p class="mb-3">Masukkan {{ $deskripsiPlayer }}</p>
                @if (strtolower($product['name']) == 'mobile legends')
                    <div class="flex flex-wrap ">
                        <div class="relative  pe-2 mb-2 w-2/3">
                            <div class="absolute inset-y-0 flex items-center pointer-events-none start-0 ps-4">
                                <svg class="w-6 h-6 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M12 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4h-4Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input wire:model.blur="id_player" id="idPlayer" type="text" id="input-group-1"
                                class="text-center bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="{{ $deskripsiPlayer }}">
                        </div>
                        <div class="relative   mb-2 w-1/3 ">
                            <div class="absolute inset-y-0 flex items-center pointer-events-none start-0 ps-1 md:ps-4">
                                <b class="text-lg font-bold text-slate-800">
                                    {{ '(' }}
                                </b>

                            </div>
                            <div class="absolute inset-y-0 flex items-center pointer-events-none end-0 pe-1 md:pe-4">
                                <b class="text-lg font-bold text-slate-800">
                                    {{ ')' }}
                                </b>

                            </div>
                            <input wire:model.blur="zona_id" id="idPlayer" type="text" id="input-group-1"
                                class=" text-center bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-2 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Zona ID">
                        </div>
                    </div>
                @else
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
                @endif


                <p class="text-xs italic font-normal text-justify">{{ $alertPlayer }}</->
                    @error('id_player')
                        <x-input-error :messages="$message" class="justify-center mt-2" />
                    @enderror
                    @error('zona_id')
                        <x-input-error :messages="$message" class="justify-center mt-2" />
                    @enderror
            </div>

        </div>

    </div>
</li>
