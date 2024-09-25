@extends('home.layouts.app')
@section('content')
    @include('components.navbar.home-navbar')
    @if (session('error'))
        @push('scripts')
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    Swal.fire({
                        title: "Proses Terhenti",
                        text: "{{ session('error') }}", // Perbaikan penggunaan session
                        icon: "warning"
                    });
                });
                window.addEventListener('pageshow', function(event) {
                    if (event.persisted) {
                        // Jika halaman dimuat dari cache (back/forward), hapus SweetAlert
                        Swal.close();
                    }
                });
            </script>
        @endpush
    @endif

    <div class="p-12 px-2 mt-4">
        <div class="p-4 px-0 sm:px-20">
            @include('components.caraousel.home-caraousel')
        </div>
        <div class="my-10 mb-14 text-center sm:mb-16">
            <h3 class="mb-4 text-2xl font-extrabold leading-none tracking-tight text-white md:text-3xl lg:text-4xl">
                Popular <span
                    class="underline underline-offset-3 decoration-8 decoration-red-500 dark:decoration-blue-600">Items</span>
            </h3>

        </div>
        <div class="flex flex-wrap justify-center gap-7 text-center px-3 sm:p-4 sm:gap-12 ">

            @foreach ($data as $key => $item)
                <a href="{{ route('item.show', $key) }}"
                    class="relative my-2 flex flex-col items-center justify-center w-32 sm:w-56 h-36 sm:h-56 text-white bg-gray-800 border rounded-lg hover:shadow-lg hover:shadow-slate-700 border-slate-600 product-card">
                    <img class="absolute border shadow-md w-16 sm:w-28 h-16 sm:h-28  -top-6 sm:-top-12 rounded sm:rounded-3xl border-slate-600"
                        src="{{ asset($item['img']) }}" alt="{{ $item['name'] }}" />
                    <h4 class="font-sans text-sm font-normal sm:text-xl sm:font-bold dark:text-white">{{ $item['name'] }}
                    </h4>
                    <button type="button"
                        class="absolute -skew-x-12 bottom-5 text-white bg-purple-700 hover:bg-purple-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium text-sm px-5 sm:py-2 py-1 text-center w-[70%]">
                        Top Up
                    </button>
                </a>
            @endforeach



        </div>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript">
        var Tawk_API = Tawk_API || {},
            Tawk_LoadStart = new Date();
        (function() {
            var s1 = document.createElement("script"),
                s0 = document.getElementsByTagName("script")[0];
            s1.async = true;
            s1.src = 'https://embed.tawk.to/66d73d9bea492f34bc0d45b7/1i6schamj';
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            s0.parentNode.insertBefore(s1, s0);
        })();
    </script>
@endpush
