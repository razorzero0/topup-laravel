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
                        <span class="text-sm font-medium text-gray-500 ms-1 md:ms-2">{{ Request::segment(1) }}</span>

                    </div>
                </li>
            </ol>
        </nav>
        <!-- End Breadcumb-->


        <!-- Main Content-->
        <div class="p-8 bg-white border-2 rounded-lg ">
            <div class="overflow-x-hidden bg-white rounded">
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="p-4 mb-1 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                            role="alert">
                            <span class="font-medium">{{ $error }}</span>
                        </div>
                    @endforeach
                @endif
                @if (session('success'))
                    <div class="flex items-center p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                        role="alert">
                        <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                        </svg>
                        <span class="sr-only">Info</span>
                        <div>
                            <span class="font-medium">{{ session('success') }}</span>
                        </div>
                    </div>
                @endif
                <div class="text-center ">
                    <h4 class="text-2xl font-bold text-gray-700">Daftar Item {{ $name }}</h4>
                </div>
                <div class="flex flex-wrap justify-between mt-5">
                    <a href={{ route('product.index') }} type="button"
                        class="focus:outline-none text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Daftar
                        Produk</a>
                    <a href={{ route('list-item', request()->segment(2)) }} type="button"
                        class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800  focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900 cursor-pointer">Tambah
                        Item</a>

                </div>
                <hr class="h-px my-5 bg-gray-200 border-0">
                <div class="flex justify-between mb-3 font-semibold text-gray-500 text-md">
                    <span>TOTAL HARGA</span>
                    <span>Rp. {{ number_format($harga) }}</span>

                </div>
                <div class="flex flex-wrap justify-between ">
                    <form method="post" action="{{ route('disable-all-item') }}">
                        @csrf
                        <input value="{{ $id_product }}" name="id" class="hidden" />
                        <button type="submit"
                            onclick="return confirm(
                                            'Apakah Anda yakin ingin melanjutkan?')"
                            class="focus:outline-none text-white bg-orange-700 hover:bg-orange-800  focus:ring-4 focus:ring-orange-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-orange-600 dark:hover:bg-orange-700 dark:focus:ring-orange-900 cursor-pointer">Nonaktifkan
                            Semua Item</button>
                    </form>
                    <form method="post" action="{{ route('enable-all-item') }}">
                        @csrf
                        <input value="{{ $id_product }}" name="id" class="hidden" />
                        <button type="submit"
                            class="focus:outline-none text-white bg-green-700 hover:bg-green-800  focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-900 cursor-pointer">Aktifkan
                            Semua Item</button>
                    </form>
                </div>

                <table id="default-table" class="w-full ">
                    <thead>

                        <tr>
                            <th>
                                <span class="flex items-center">
                                    NO
                                    <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                    </svg>
                                </span>
                            </th>
                            <th>
                                <span class="flex items-center">
                                    Nama
                                    <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                    </svg>
                                </span>
                            </th>
                            <th>
                                <span class="flex items-center">
                                    KP
                                    <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                    </svg>
                                </span>
                            </th>

                            <th data-type="date" data-format="YYYY/DD/MM">
                                <span class="flex items-center">
                                    Harga
                                    <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                    </svg>
                                </span>
                            </th>
                            {{-- <th>
                                <span class="flex items-center">
                                    Total Harga
                                    <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                    </svg>
                                </span>
                            </th> --}}

                            <th>
                                <span class="flex items-center">
                                    Stock
                                    <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                    </svg>
                                </span>
                            </th>
                            <th>
                                <span class="flex items-center">
                                    Gambar
                                    <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                    </svg>
                                </span>
                            </th>
                            <th>
                                <span class="flex items-center">
                                    Status
                                    <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                    </svg>
                                </span>
                            </th>
                            <th>
                                <span class="flex items-center">
                                    Aksi
                                </span>
                            </th>

                        </tr>
                    </thead>
                    <tbody>

                        @php
                            $no = 1;
                        @endphp
                        @foreach ($data as $item)
                            <tr>
                                <td class="font-medium text-gray-900 whitespace-nowrap">{{ $no++ }}</td>
                                <td> {{ $item['item_name'] }} </td>
                                <td> {{ $item['buyer_sku_code'] }} </td>

                                <td>
                                    Rp. {{ number_format($item['price']) }}
                                </td>
                                {{-- <td>
                                    Rp. {{ number_format($item['total_price']) }}
                                </td> --}}
                                <td>
                                    {{ $item['stock'] }} </td>

                                <td>
                                    @if ($item->image)
                                        <img src="{{ asset($item->file['image']) }}" class="w-auto h-10" />
                                    @endif
                                </td>
                                <td>

                                    <span class="  {{ $item['status'] ? 'text-green-500' : 'text-red-500' }}">
                                        {{ $item['status'] ? 'Aktif' : 'Tidak Aktif' }}</span>
                                </td>
                                <td class="flex gap-1">

                                    <button data-modal-target="edit-item{{ $item->id }}"
                                        data-modal-toggle="edit-item{{ $item->id }}"
                                        class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-3 py-2.5 text-center ">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-4 h-4"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                            <path fill-rule="evenodd"
                                                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                        </svg>
                                    </button>
                                    @include('admin.item.edit-modal')

                                    <form class="" method="post"
                                        action="{{ route('item.destroy', $item['id']) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300  shadow-red-500/50 font-medium rounded-lg text-sm px-3 py-2.5 text-center "
                                            onclick="return confirm(
                                        'Apakah Anda yakin ingin melanjutkan?')">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-4 h-4"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0" />
                                            </svg>
                                            </svg>

                                        </button>
                                    </form>
                                </td>


                            </tr>
                        @endforeach


                    </tbody>
                </table>


            </div>

        </div>

        <!-- Main Content-->
        <div class="p-2 mt-4 bg-white border-2 rounded-lg sm:p-12 ">
            <div class="bg-white rounded ">
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="p-4 mb-1 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                            role="alert">
                            <span class="font-medium">{{ $error }}</span>
                        </div>
                    @endforeach
                @endif
                @if (session('success'))
                    <div class="flex items-center p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                        role="alert">
                        <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                        </svg>
                        <span class="sr-only">Info</span>
                        <div>
                            <span class="font-medium">{{ session('success') }}</span>
                        </div>
                    </div>
                @endif
                <div class="text-center ">
                    <h4 class="text-2xl font-bold text-gray-700">Tambah Item</h4>
                </div>
                <div class="flex justify-end mt-5">

                    <button type="button" onclick="location.reload()"
                        class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">Reload
                        Item</button>

                </div>
                <hr class="h-px my-5 bg-gray-200 border-0">

                <table id="add-item-table">
                    <thead>

                        <tr>
                            <th class="w-2 border">
                                <span class="flex items-center">
                                    NO
                                    <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                    </svg>
                                </span>
                            </th>
                            <th>
                                <span class="flex items-center">
                                    Nama
                                    <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                    </svg>
                                </span>
                            </th>
                            <th>
                                <span class="flex items-center">
                                    Sku code
                                    <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                    </svg>
                                </span>
                            </th>
                            <th data-type="date" data-format="YYYY/DD/MM">
                                <span class="flex items-center">
                                    Produk
                                    <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                    </svg>
                                </span>
                            </th>
                            <th data-type="date" data-format="YYYY/DD/MM">
                                <span class="flex items-center">
                                    Harga
                                    <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                    </svg>
                                </span>
                            </th>


                            <th>
                                <span class="flex items-center">
                                    Aksi
                                </span>
                            </th>

                        </tr>
                    </thead>
                    <tbody>

                        @php
                            $no = 1;
                        @endphp
                        @foreach ($digiData as $item)
                            <tr>
                                <td class="font-medium text-gray-900 whitespace-nowrap">{{ $no++ }}</td>
                                <td>{{ $item['product_name'] }}</td>
                                <td>{{ $item['buyer_sku_code'] }}</td>
                                <td>{{ $item['brand'] }}</td>
                                <td class="">Rp. {{ number_format($item['price']) }}</td>

                                <td class="flex gap-1">

                                    <form method="post" action="{{ route('item.store') }}">
                                        @csrf
                                        <input class="hidden" name="product_name" value="{{ $item['product_name'] }}" />
                                        <input class="hidden" name="buyer_sku_code"
                                            value="{{ $item['buyer_sku_code'] }}" />
                                        <input class="hidden" name="price" value="{{ $item['price'] }}" />
                                        <input class="hidden" name="stock" value="{{ $item['stock'] }}" />
                                        <input class="hidden" name="product_id" value="{{ request()->segment(2) }}" />

                                        <button
                                            class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-3 py-2.5 text-center ">
                                            <svg class="w-5 h-5 text-white" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5" />
                                            </svg>


                                        </button>

                                    </form>
                                </td>


                            </tr>
                        @endforeach


                    </tbody>
                </table>


            </div>

        </div>
    </div>
@endsection
