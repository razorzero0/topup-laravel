<div class="p-20 px-2 sm:mt-6 sm:px-20">
    <div class="">
        @include('livewire.home_partials.home-caraousel')
    </div>
    <div class="text-center my-14 mb-14 sm:mb-16">
        <h3 class="mb-4 text-2xl font-extrabold leading-none tracking-tight text-white md:text-3xl lg:text-4xl">🔥
            Popular <span
                class="underline underline-offset-3 decoration-8 decoration-red-500 dark:decoration-blue-600">Items</span>
        </h3>

    </div>
    <div class="flex flex-wrap justify-center text-center gap-9 sm:p-4 sm:gap-12 ">

        @foreach ($popular as $item)
            {{-- <a href="{{ route('product-detail', $item->product->slug) }}" wire:navigate
                class="relative flex flex-col items-center justify-center w-32 my-2 text-white bg-gray-800 border rounded-lg sm:w-56 h-36 sm:h-56 hover:shadow-lg hover:shadow-slate-700 border-slate-600 product-card">
                <img class="absolute w-16 h-16 border rounded-lg shadow-md sm:w-28 sm:h-28 -top-6 sm:-top-12 sm:rounded-3xl border-slate-600"
                    src="{{ asset($item->product->image) }}" alt="{{ $item->product->name }}" />

                <h4 class="font-sans text-xs font-light sm:text-xl sm:font-normal dark:text-white">
                    {{ $item->product->name }}
                </h4>
                <button type="button"
                    class="absolute -skew-x-12 bottom-5 text-white bg-purple-700 hover:bg-purple-800 focus:outline-none focus:ring-4 focus:ring-red-300 text-sm px-2 font-light sm:py-2 py-1 text-center w-[70%]">
                    Top Up
                </button>
            </a> --}}
            <a href="{{ route('product-detail', $item->product->slug) }}" wire:navigate
                class="relative flex flex-col items-center p-0 group ">
                <img class="absolute  z-[10] w-16 h-16 border rounded-md shadow-md sm:w-28 sm:h-28 -top-6 sm:-top-12 sm:rounded-lg border-slate-600 group-hover:translate-y-1 sm:group-hover:translate-y-4 group-hover:shadow-lg overflow-hidden duration-100"
                    src="{{ asset($item->product->image) }}" alt="{{ $item->product->name }}"
                    alt="{{ $item->product->name }}')" />

                <div style="clip-path: polygon(0% 0%, 89.4737% 0%, 100% 9.52381%, 100% 100%, 9.52381% 100%, 0% 89.4737%);"
                    class="relative flex flex-col items-center justify-center w-32 gap-2 p-0 my-2 overflow-hidden text-white rounded-md h-28 backdrop-blur-md sm:w-56 sm:h-44 hover:shadow-lg hover:shadow-slate-700 ">
                    <div
                        class="absolute  -z-10 w-full h-full  bg-[linear-gradient(180deg,rgba(30,35,93,0)_0%,rgba(30,35,93,0.88)_55.29%)]">

                    </div>
                    <img class="absolute w-full h-full blur-md -z-20" src="{{ asset($item->product->image) }}"
                        alt="{{ $item->product->name }}" alt="{{ $item->product->name }}')" />
                    <div class="absolute flex-col items-center justify-center w-full bottom-4">
                        <h4 class="font-sans text-xs font-light capitalize sm:text-lg sm:font-normal dark:text-white">
                            {{ ucwords(strtolower($item->product->name)) }}
                        </h4>
                        <button type="button"
                            class="mt-2 border-[0.1px] border-purple-600 -skew-x-12 bottom-5 text-white bg-purple-700 hover:bg-purple-800 focus:outline-none focus:ring-4 focus:ring-red-300 text-xs sm:text-sm px-2 font-light  py-1 text-center w-[70%]">
                            Top Up
                        </button>
                    </div>




                </div>
            </a>
        @endforeach


    </div>
    @include('livewire.home_partials.tab')

</div>

@push('scripts')
    <script>
        // Ambil data dari server (diubah menjadi format JSON)
        var products = @json($data); // Ambil data dari controller


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
                    resultHtml += '<a href="/topup/' + product.slug + '">' + product.name + '</a>';
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
    @if (env('TAWK_STATUS'))
        <script type="text/javascript">
            //TAWK INIT
            var Tawk_API = Tawk_API || {},
                Tawk_LoadStart = new Date();
            (function() {
                var s1 = document.createElement("script"),
                    s0 = document.getElementsByTagName("script")[0];
                s1.async = true;
                s1.src = 'https://embed.tawk.to/{{ env('TAWK_KEY') }}';
                s1.charset = 'UTF-8';
                s1.setAttribute('crossorigin', '*');
                s0.parentNode.insertBefore(s1, s0);
            })();
            // Tampilkan pesan default saat widget dibuka
            // Tawk_API.onChatWindowOpen = function() {
            //     Tawk_API.addEvent('message', {
            //         text: 'Halo! Terima kasih telah menghubungi kami. Ada yang bisa kami bantu?'
            //     });
            // };
        </script>
    @endif
@endpush
