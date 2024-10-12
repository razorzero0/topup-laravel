@php
    function cekActive($route)
    {
        if ($route == Route::currentRouteName()) {
            return 'tabActive';
        }
    }
@endphp
<nav class=" dark:bg-gray-900 fixed w-full  top-0 start-0 dark:border-gray-800 backdrop-blur-md bg-slate-800/90 z-[999]">
    <div class="flex flex-wrap items-center justify-between max-w-screen-xl p-3 px-8 mx-auto">
        <div class="flex items-center gap-5">
            <a href={{ route('index') }} wire:navigate class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="{{ asset('assets/img/logo/logo-color.png') }}" class="h-9" alt="Algoora Logo">
                <span class=" text-2xl  font-semibold text-white whitespace-nowrap">Algoora</span>
            </a>


            <div class=" hidden lg:block ">
                <ul class="flex flex-wrap -mb-px text-sm font-medium text-center ">
                    <li class="me-2  {{ cekActive('index') }}">
                        <a wire:navigate href={{ route('index') }}
                            class="inline-flex items-center justify-center p-4 border-b-2 border-transparent rounded-t-lg  hover:text-purple-500 group text-gray-100">
                            <svg class="w-5 h-5 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M11.293 3.293a1 1 0 0 1 1.414 0l6 6 2 2a1 1 0 0 1-1.414 1.414L19 12.414V19a2 2 0 0 1-2 2h-3a1 1 0 0 1-1-1v-3h-2v3a1 1 0 0 1-1 1H7a2 2 0 0 1-2-2v-6.586l-.293.293a1 1 0 0 1-1.414-1.414l2-2 6-6Z"
                                    clip-rule="evenodd" />
                            </svg>


                            Beranda
                        </a>
                    </li>
                    <li class="me-2 {{ cekActive('cek-transaksi') }}">
                        <a href="{{ route('cek-transaksi') }}" wire:navigate
                            class="inline-flex items-center justify-center p-4 border-b-2 border-transparent rounded-t-lg  hover:text-purple-500 group text-gray-100">
                            <svg class="w-4 h-4 me-2 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>

                            Cek Transaksi
                        </a>
                    </li>

                </ul>
            </div>

        </div>
        <div class="hidden sm:flex gap-2 space-x-3 md:order-2 md:space-x-0 rtl:space-x-reverse">
            <div class="hidden sm:flex  items-center ">

                <div class="relative hidden md:block">
                    <div class="absolute top-3 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-slate-400 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                        <span class="sr-only">Search icon</span>
                    </div>
                    <input type="text" id="search"
                        class="block w-full p-2 ps-10 text-sm text-gray-200 border border-gray-800 rounded-lg bg-slate-700 focus:ring-purple-800 focus:border-purple-800 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-100 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Search..." autocomplete="off">
                    <div id="result" class="search-result border-none"></div>
                </div>

            </div>
            @auth
                <a href={{ route('dashboard') }}
                    class=" px-6 py-3 text-sm font-medium text-center text-white bg-purple-700 border border-purple-900 rounded-lg hover:bg-purple-900 focus:ring-4 focus:outline-none focus:ring-purple-950 ">Panel</a>
            @endauth
            @guest
                <a href={{ route('login') }}
                    class=" px-6 py-3 text-sm font-medium text-center text-white border rounded-lg bg-slate-800 hover:bg-slate-600 focus:ring-4 focus:outline-none focus:ring-gray-600 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800 border-slate-600">Masuk</a>
            @endguest





        </div>
        <div class="block sm:hidden">
            <button
                class="text-white bg-purple-700 border border-purple-900 rounded-lg hover:bg-purple-900 focus:ring-4 focus:outline-none  font-medium text-sm px-5 py-2.5 "
                type="button" data-drawer-target="drawer-navigation" data-drawer-show="drawer-navigation"
                aria-controls="drawer-navigation">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
        </div>
        @include('livewire.layouts.sidebar')
    </div>
</nav>
