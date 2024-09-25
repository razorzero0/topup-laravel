@extends('admin.layouts.app')
@section('content')
    <div class="p-4 pt-20 sm:ml-64 md:pt-16">

        <!-- Breadcrumb -->
        <nav class="flex px-5 py-3 mb-2 text-gray-700 border border-gray-200 rounded-lg bg-gray-50" aria-label="Breadcrumb">
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


        <!-- Main Content-->
        <div class="p-8 bg-white border-2 rounded-lg ">
            <div class="bg-white rounded ">
                <div class="text-center ">
                    <h4 class="text-2xl font-bold">Data Profile</h4>
                </div>
                <hr class="h-px my-5 bg-gray-200 border-0">
                <form method="post" action="{{ route('profile.update') }}" class="max-w-sm pt-4 mx-auto">
                    @csrf
                    @method('patch')
                    <div class="mb-5">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email kamu</label>
                        <input type="email" id="email"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            name="email" value="{{ old('name', $user->email) }}" required />
                    </div>
                    <div class="mb-5">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nama kamu</label>
                        <input type="name" id="name" name="name"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            value="{{ old('name', $user->name) }}" required />
                    </div>
                    <div class="flex justify-between my-3 mt-8">
                        <a href={{ route('edit-password') }}
                            class="text-white bg-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Ganti
                            Password</a>
                        <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Update
                            Profile</button>
                    </div>
                </form>

                <!-- Update password -->

                {{-- <div class="text-center " >
                    <h4 class="text-2xl font-bold">Ganti Password</h4>
                </div>
                <hr class="h-px my-5 bg-gray-200 border-0">
                <form method="post" action="{{ route('profile.update') }}" class="max-w-sm pt-4 mx-auto">
                    @csrf
                    @method('patch')
                    <div class="mb-5">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email kamu</label>
                        <input type="email" id="email"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            name="email" value="{{ old('name', $user->email) }}" required />
                    </div>
                    <div class="mb-5">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nama kamu</label>
                        <input type="name" id="name" name="name"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            value="{{ old('name', $user->name) }}" required />
                    </div>
                    <div class="flex justify-between my-3 mt-8">
                        <a href={{ route('password.store') }}
                            class="text-white bg-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Ganti
                            Password</a>
                        <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Update
                            Profile</button>
                    </div>
                </form> --}}

            </div>

        </div>
    </div>
@endsection
