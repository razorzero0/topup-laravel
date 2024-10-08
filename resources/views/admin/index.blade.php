@extends('admin.layouts.app')
@section('content')
    <div class="p-4 pt-20 sm:ml-64 md:pt-16 ">
        <!-- Breadcrumb -->
        <nav class="flex px-5 py-3 mb-2 text-gray-700 border border-gray-200 rounded-lg bg-gray-50" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href={{ route('dashboard') }}
                        class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
                        Home
                    </a>
                </li>

                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="w-3 h-3 mx-1 text-gray-400 rtl:rotate-180" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="text-sm font-medium text-gray-500 ms-1 md:ms-2">{{ Route::currentRouteName() }}</span>
                    </div>
                </li>
            </ol>
        </nav>
        <!-- End Breadcumb-->

        <div class="rounded-lg bg-white p-2 ">
            @role('admin')
                <div class="grid grid-cols-1 gap-4  mb-5 sm:grid-cols-4 ">
                    <div class="flex items-center bg-white border rounded-sm overflow-hidden shadow">
                        <div class="p-4 bg-green-400"><svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                                </path>
                            </svg></div>
                        <div class="px-4 text-gray-700">
                            <h3 class="text-sm tracking-wider">Total Member</h3>
                            <p class="text-3xl">{{ $users }}</p>
                        </div>
                    </div>
                    <div class="flex items-center bg-white border rounded-sm overflow-hidden shadow">
                        <div class="p-4 bg-blue-400">
                            <svg class="w-12 h-12 text-white dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5.005 11.19V12l6.998 4.042L19 12v-.81M5 16.15v.81L11.997 21l6.998-4.042v-.81M12.003 3 5.005 7.042l6.998 4.042L19 7.042 12.003 3Z" />
                            </svg>

                        </div>
                        <div class="px-4 text-gray-700">
                            <h3 class="text-sm tracking-wider">Total Item</h3>
                            <p class="text-3xl">{{ $products }}</p>
                        </div>
                    </div>
                    <div class="flex items-center bg-white border rounded-sm overflow-hidden shadow">
                        <div class="p-4 bg-indigo-400"><svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z">
                                </path>
                            </svg></div>
                        <div class="px-4 text-gray-700">
                            <h3 class="text-sm tracking-wider">Total Transaksi</h3>
                            <p class="text-3xl">{{ $transactions }}</p>
                        </div>
                    </div>
                    <div class="flex items-center bg-white border rounded-sm overflow-hidden shadow">
                        <div class="p-4 bg-red-400">
                            <svg class="w-12 h-12 text-gray-800 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 17.345a4.76 4.76 0 0 0 2.558 1.618c2.274.589 4.512-.446 4.999-2.31.487-1.866-1.273-3.9-3.546-4.49-2.273-.59-4.034-2.623-3.547-4.488.486-1.865 2.724-2.899 4.998-2.31.982.236 1.87.793 2.538 1.592m-3.879 12.171V21m0-18v2.2" />
                            </svg>

                        </div>
                        <div class="px-4 text-gray-700">
                            <h3 class="text-sm tracking-wider">Saldo (Rupiah)</h3>
                            <p class="text-3xl">{{ number_format($saldo) }}</p>
                        </div>
                    </div>
                </div>
            @endrole
            <div class="items-center mb-4 overflow-hidden rounded ">
                <img class="object-center w-full " src={{ asset('assets/img/banner.png') }} class="" alt="...">

            </div>

        </div>
    </div>
@endsection
