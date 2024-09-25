@extends('admin.layouts.app')
@section('content')
    <div class="p-4 sm:ml-64 md:pt-16 pt-20">

        <!-- Breadcrumb -->
        <nav class="flex mb-2 px-5 py-3 text-gray-700 border border-gray-200 rounded-lg bg-gray-50" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href={{ route('dashboard') }}
                        class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
                        <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path
                                d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                        </svg>
                        Home
                    </a>
                </li>

                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180  w-3 h-3 mx-1 text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2">{{ Route::currentRouteName() }}</span>
                    </div>
                </li>
            </ol>
        </nav>
        <!-- End Breadcumb-->


        <!-- Main Content-->
        <div class="p-8 border-2  rounded-lg bg-white ">

            <!-- Update password -->

            <div class=" text-center">
                <h4 class="text-2xl font-bold">Ganti Password</h4>
            </div>
            <hr class="h-px my-5 bg-gray-200 border-0">

            @if (session('status'))
                @include('components.toast.success')
            @endif

            <form method="post" action="{{ route('password.update') }}" class="max-w-sm mx-auto pt-4">
                @csrf
                @method('put')

                <div class="mb-5">
                    <label for="current_password" class="block mb-2 text-sm font-medium text-gray-900"> Password Kamu
                        Sekarang</label>
                    <input type="current_password" id="current_password"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        name="current_password" required />
                </div>
                <div class="mb-5">
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900"> Masukkan Password
                        Baru</label>
                    <input type="password" id="password"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        name="password" required />
                </div>
                <div class="mb-5">
                    <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900"> Konfirmasi
                        Password Baru</label>
                    <input type="password" id="password_confirmation"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        name="password_confirmation" required />
                </div>

                <div class="flex justify-end my-3 mt-8">

                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Update
                        Password</button>
                </div>
            </form>

        </div>

    </div>
    </div>
@endsection
