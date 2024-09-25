<nav
    class=" dark:bg-gray-900 fixed w-full  top-0 start-0 dark:border-gray-600 backdrop-blur-lg bg-slate-600/70 z-[9999]">
    <div class="flex flex-wrap items-center justify-between max-w-screen-xl p-3 px-8 mx-auto">
        <a href={{ route('index') }} class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo">
            <span class="self-center text-2xl font-semibold text-white whitespace-nowrap">Algoora</span>
        </a>
        <div class="flex space-x-3 md:order-2 md:space-x-0 rtl:space-x-reverse">
            @auth
                <a href={{ route('dashboard') }}
                    class="px-6 py-3 text-sm font-medium text-center text-white bg-purple-700 border border-purple-900 rounded-lg hover:bg-purple-900 focus:ring-4 focus:outline-none focus:ring-purple-950 ">Dashboard</a>
            @endauth
            @guest
                <a href={{ route('login') }}
                    class="px-6 py-3 text-sm font-medium text-center text-white border rounded-lg bg-slate-800 hover:bg-slate-600 focus:ring-4 focus:outline-none focus:ring-gray-600 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800 border-slate-600">Masuk</a>
            @endguest

            <button data-collapse-toggle="navbar-sticky" type="button"
                class="inline-flex items-center justify-center w-10 h-10 p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-sticky" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
        </div>
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
            {{-- <ul
                class="flex flex-col p-4 mt-4 font-medium border border-gray-100 rounded-lg md:p-0 bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                <li>
                    <a href="#"
                        class="block px-3 py-2 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500"
                        aria-current="page">Home</a>
                </li>
                <li>
                    <a href="#"
                        class="block px-3 py-2 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">About</a>
                </li>
                <li>
                    <a href="#"
                        class="block px-3 py-2 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Services</a>
                </li>
                <li>
                    <a href="#"
                        class="block px-3 py-2 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Contact</a>
                </li>
            </ul> --}}
        </div>
    </div>
</nav>
