<div class="p-20 px-5 mt-4 sm:px-20">
    <div class="">
        @include('livewire.home_partials.home-caraousel')
    </div>
    <div class="my-10 text-center mb-14 sm:mb-16">
        <h3 class="mb-4 text-2xl font-extrabold leading-none tracking-tight text-white md:text-3xl lg:text-4xl">🔥
            Popular <span
                class="underline underline-offset-3 decoration-8  decoration-fuchsia-500 dark:decoration-blue-600">Items</span>
        </h3>

    </div>
    <div class="flex flex-wrap justify-center px-3 text-center gap-7 sm:p-4 sm:gap-12 ">

        @foreach ($popular as $item)
            <a href="{{ route('product-detail', $item->product->slug) }}" wire:navigate
                class="relative flex flex-col items-center justify-center w-32 my-2 text-white bg-gray-800 border rounded-lg sm:w-56 h-36 sm:h-56 hover:shadow-lg hover:shadow-slate-700 border-slate-600 product-card">
                <img class="absolute w-16 h-16 border rounded shadow-md sm:w-28 sm:h-28 -top-6 sm:-top-12 sm:rounded-3xl border-slate-600"
                    src="{{ asset($item->product->image) }}" alt="{{ $item->product->name }}" />
                <h4 class="font-sans text-xs font-light sm:text-xl sm:font-normal dark:text-white">
                    {{ $item->product->name }}
                </h4>
                <button type="button"
                    class="absolute -skew-x-12 bottom-5 text-white bg-purple-700 hover:bg-purple-800 focus:outline-none focus:ring-4 focus:ring-red-300 text-sm px-2 font-light sm:py-2 py-1 text-center w-[70%]">
                    Top Up
                </button>
            </a>
        @endforeach



    </div>
    @include('livewire.home_partials.tab')

</div>

@push('scripts')
    <script>
        // Ambil data dari server (diubah menjadi format JSON)
        var products = @json($data); // Ambil data dari controller
        console.log(products);

        // Ambil elemen input dan hasil
        var searchInput = document.getElementById('search');
        var resultDiv = document.getElementById('result');

        // Fungsi pencarian
        searchInput.addEventListener('keyup', function() {
            var query = searchInput.value.toLowerCase(); // Ambil input

            // Filter produk
            var filteredProducts = products.filter(function(product) {
                return product.name.toLowerCase().includes(query);
            });

            // Tampilkan hasil dalam bentuk list dengan <a href="">
            var resultHtml = '';
            if (filteredProducts.length > 0) {
                filteredProducts.forEach(function(product) {
                    resultHtml += '<a href="/pd/' + product.slug + '">' + product.name + '</a>';
                });
                resultDiv.style.display = 'block'; // Tampilkan hasil jika ada
            } else {
                resultHtml = "<p class='p-1 border-slate-600 text-slate-200'>Tidak ada hasil</p>";
                resultDiv.style.display = 'block'; // Tampilkan pesan tidak ada hasil
            }

            resultDiv.innerHTML = resultHtml; // Tampilkan hasil

            // Sembunyikan hasil jika input kosong
            if (query === '') {
                resultDiv.style.display = 'none'; // Sembunyikan hasil jika input kosong
            }
        });

        // Menutup hasil pencarian ketika mengklik di luar elemen input dan hasil
        document.addEventListener('click', function(event) {
            var isClickInside = searchInput.contains(event.target) || resultDiv.contains(event.target);
            if (!isClickInside) {
                resultDiv.style.display = 'none'; // Sembunyikan hasil
            }
        });
    </script>
@endpush
