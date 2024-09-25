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

    <div class="p-12 mt-4">
        <div class="p-4 px-0 sm:px-20">
            @include('components.caraousel.home-caraousel')
        </div>
        <div class="my-10 mb-20 text-center sm:mb-16">
            <h3 class="mb-4 text-2xl font-extrabold leading-none tracking-tight text-white md:text-3xl lg:text-4xl">
                Popular <span
                    class="underline underline-offset-3 decoration-8 decoration-red-500 dark:decoration-blue-600">Items</span>
            </h3>

        </div>
        <div class="flex flex-wrap justify-center gap-20 p-2 text-center sm:p-4 sm:gap-12 ">

            <a href={{ route('item.show', 'ffmax') }}
                class="relative flex flex-col items-center justify-center w-48 h-56 text-white bg-gray-800 border rounded-lg hover:shadow-lg hover:shadow-slate-600 product-card border-slate-600">
                <img class="absolute border shadow-md w-28 h-28 -top-12 rounded-3xl border-slate-600"
                    src="{{ asset('assets/img/ffmax.jpg') }}" />
                <h4 class="font-sans text-xl font-bold dark:text-white">Free Fire Max </h4>
                <button type="button"
                    class="absolute -skew-x-12 bottom-5 text-white bg-purple-700 hover:bg-purple-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium  text-sm px-5 py-2 text-center w-[70%]">Top
                    Up</button>
            </a>
            <a href={{ route('item.show', 'ff') }}
                class="relative flex flex-col items-center justify-center w-48 h-56 text-white bg-gray-800 border rounded-lg hover:shadow-lg hover:shadow-slate-700 border-slate-600 product-card">
                <img class="absolute border shadow-md w-28 h-28 -top-12 rounded-3xl border-slate-600"
                    src="{{ asset('assets/img/ff.jpg') }}" />
                <h4 class="font-sans text-xl font-bold dark:text-white">Free Fire </h4>
                <button type="button"
                    class="absolute -skew-x-12 bottom-5 text-white bg-purple-700 hover:bg-purple-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium  text-sm px-5 py-2 text-center w-[70%]">Top
                    Up</button>
            </a>
            <a href={{ route('item.show', 'ml') }}
                class="relative flex flex-col items-center justify-center w-48 h-56 text-white bg-gray-800 border rounded-lg hover:shadow-lg hover:shadow-slate-700 border-slate-600 product-card">
                <img class="absolute border shadow-md w-28 h-28 -top-12 rounded-3xl border-slate-600"
                    src="{{ asset('assets/img/ml.webp') }}" />
                <h4 class="font-sans text-xl font-bold dark:text-white">Mobile Legends </h4>
                <button type="button"
                    class="absolute -skew-x-12 bottom-5 text-white bg-purple-700 hover:bg-purple-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium  text-sm px-5 py-2 text-center w-[70%]">Top
                    Up</button>
            </a>
            <a href={{ route('item.show', 'gs') }}
                class="relative flex flex-col items-center justify-center w-48 h-56 text-white bg-gray-800 border rounded-lg hover:shadow-lg hover:shadow-slate-700 border-slate-600 product-card">
                <img class="absolute border shadow-md w-28 h-28 -top-12 rounded-3xl border-slate-600"
                    src="{{ asset('assets/img/garena-sheel.png') }}" />
                <h4 class="font-sans text-xl font-bold dark:text-white">Garena Shell </h4>
                <button type="button"
                    class="absolute -skew-x-12 bottom-5 text-white bg-purple-700 hover:bg-purple-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium  text-sm px-5 py-2 text-center w-[70%]">Top
                    Up</button>
            </a>





        </div>
    </div>
@endsection
