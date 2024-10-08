  <!-- drawer component -->
  <div id="drawer-navigation"
      class="fixed top-0 left-0 z-40 h-screen p-4 overflow-y-auto transition-transform -translate-x-full bg-slate-900/95 backdrop-blur-sm w-64 dark:bg-gray-800"
      tabindex="-1" aria-labelledby="drawer-navigation-label">
      <div class="flex gap-2 items-center text-slate-200">
          <img src="{{ asset('assets/img/logo/logo-color.png') }}" class="h-9" alt="Algoora Logo">
          <span class="text-lg  font-bold">Algoora</span>
      </div>
      <button type="button" data-drawer-hide="drawer-navigation" aria-controls="drawer-navigation"
          class="text-gray-400 bg-transparent hover:bg-gray-800 hover:text-gray-100 rounded-lg text-sm w-8 h-8 absolute top-2.5 end-2.5 inline-flex items-center justify-center dark:hover:bg-gray-600 dark:hover:text-white">
          <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
          </svg>
          <span class="sr-only">Close menu</span>
      </button>
      <div class="py-4 overflow-y-auto text-white">
          <ul class="space-y-2 font-medium">
              @auth
                  <li>
                      <a href={{ route('dashboard') }}
                          class="flex items-center p-2 text-gray-100 rounded-lg dark:text-white hover:bg-slate-500 dark:hover:bg-gray-700 group">
                          <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-100 dark:group-hover:text-white"
                              aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                              <path
                                  d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                              <path
                                  d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                          </svg>
                          <span class="ms-3">Dashboard</span>
                      </a>
                  </li>
              @endauth

              <li>
                  <a href="{{ route('cek-transaksi') }}"
                      class="flex items-center w-full p-2 text-base text-gray-100 transition duration-75 rounded-lg group hover:bg-slate-500 dark:text-white dark:hover:bg-gray-700"
                      aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                      <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-100 dark:text-gray-400 dark:group-hover:text-white"
                          aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 21">
                          <path
                              d="M15 12a1 1 0 0 0 .962-.726l2-7A1 1 0 0 0 17 3H3.77L3.175.745A1 1 0 0 0 2.208 0H1a1 1 0 0 0 0 2h.438l.6 2.255v.019l2 7 .746 2.986A3 3 0 1 0 9 17a2.966 2.966 0 0 0-.184-1h2.368c-.118.32-.18.659-.184 1a3 3 0 1 0 3-3H6.78l-.5-2H15Z" />
                      </svg>
                      <span class=" ms-3 ">Cek Transaksi</span>

                  </a>

              </li>

              @guest
                  <li>
                      <a href={{ route('login') }}
                          class="flex items-center p-2 text-gray-100 rounded-lg dark:text-white hover:bg-slate-500 dark:hover:bg-gray-700 group">
                          <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-100 dark:group-hover:text-white"
                              aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 16">
                              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M1 8h11m0 0L8 4m4 4-4 4m4-11h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-3" />
                          </svg>
                          <span class="flex-1 ms-3 whitespace-nowrap">Sign In</span>
                      </a>
                  </li>
                  <li>
                      <a href={{ route('register') }})
                          class="flex items-center p-2 text-gray-100 rounded-lg dark:text-white hover:bg-slate-500 dark:hover:bg-gray-700 group">
                          <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-100 dark:group-hover:text-white"
                              aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                              <path d="M5 5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707A2.96 2.96 0 0 0 .13 5H5Z" />
                              <path
                                  d="M6.737 11.061a2.961 2.961 0 0 1 .81-1.515l6.117-6.116A4.839 4.839 0 0 1 16 2.141V2a1.97 1.97 0 0 0-1.933-2H7v5a2 2 0 0 1-2 2H0v11a1.969 1.969 0 0 0 1.933 2h12.134A1.97 1.97 0 0 0 16 18v-3.093l-1.546 1.546c-.413.413-.94.695-1.513.81l-3.4.679a2.947 2.947 0 0 1-1.85-.227 2.96 2.96 0 0 1-1.635-3.257l.681-3.397Z" />
                              <path
                                  d="M8.961 16a.93.93 0 0 0 .189-.019l3.4-.679a.961.961 0 0 0 .49-.263l6.118-6.117a2.884 2.884 0 0 0-4.079-4.078l-6.117 6.117a.96.96 0 0 0-.263.491l-.679 3.4A.961.961 0 0 0 8.961 16Zm7.477-9.8a.958.958 0 0 1 .68-.281.961.961 0 0 1 .682 1.644l-.315.315-1.36-1.36.313-.318Zm-5.911 5.911 4.236-4.236 1.359 1.359-4.236 4.237-1.7.339.341-1.699Z" />
                          </svg>
                          <span class="flex-1 ms-3 whitespace-nowrap">Sign Up</span>
                      </a>
                  </li>
              @endauth
          </ul>
      </div>
  </div>
