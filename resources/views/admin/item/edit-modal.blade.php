<!-- Main modal -->
<div id="edit-item{{ $item->id }}" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full p-4">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 border-b rounded-t md:p-5 dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Tambah Produk
                </h3>
                <button type="button"
                    class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="edit-item{{ $item->id }}">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-3">
                <form class="space-y-4" action={{ route('item.update', $item->id) }} method="post">

                    @csrf
                    @method('PUT')

                    <h3 class="mb-4 font-semibold text-gray-900 dark:text-white"> Pilih satu Gambar</h3>
                    <ul
                        class=" h-40 overflow-y-scroll text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($images as $image)
                            <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                                <div class="flex items-center ps-3 ">
                                    <input @if ($image['name'] == ($item->file ? $item->file['name'] : '0')) checked @endif
                                        id="list-radio-license{{ $no }}" type="radio"
                                        value="{{ $image['id'] }}" name="image"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="list-radio-license{{ $no }}"
                                        class="me-4 py-3 ms-2 text-sm font-medium  text-gray-900 dark:text-gray-300">
                                        {{ $image['name'] }} </label>
                                    <img class="h-8 w-auto " src="{{ asset($image['image']) }}" />
                                </div>
                            </li>
                            @php
                                $no++;
                            @endphp
                        @endforeach

                    </ul>


                    {{-- <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih
                        Satu Gambar</label>
                    <select id="image"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        name="image">
                        @foreach ($images as $image)
                            <option @if ($image['name'] == ($item->file ? $item->file['name'] : '0')) selected @endif value="{{ $image['id'] }}">
                                {{ $image['name'] }} </option>
                        @endforeach

                    </select> --}}

                    <div>
                        <label for="name" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Nama
                        </label>
                        <input id="add-product-name" type="text"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            name="name" value="{{ $item['item_name'] }}" required />
                    </div>
                    <div>
                        <label for="description"
                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Harga</label>
                        <input id="description" type="text" name="price" value="{{ $item['price'] }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            required />
                    </div>
                    <div>
                        <label for="stock"
                            class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Stok</label>
                        <input id="stock" type="text" name="stock" value="{{ $item['stock'] }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            required />
                    </div>

                    <div>
                        <label class="inline-flex items-center me-5 cursor-pointer">
                            <input type="checkbox" name="status" value="1" class="sr-only peer"
                                @if ($item['status']) checked @endif>
                            <div
                                class="relative w-11 h-6 bg-gray-200 rounded-full peer dark:bg-gray-700 peer-focus:ring-4 peer-focus:ring-green-300 dark:peer-focus:ring-green-800 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-green-600">
                            </div>
                            <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">Aktif</span>
                        </label>
                    </div>
                    <button type="submit"
                        class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>

                </form>
            </div>
        </div>
    </div>
</div>
