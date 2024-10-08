@extends('home.layouts.app')
@section('content')
    <section class="py-20 mt-4 sm:mt-6 ">
        <div class="max-w-6xl mx-8 md:mx-10 lg:mx-20 xl:mx-auto">
            <div class="grid grid-cols-1 ">
                <ul class="space-y-8">
                    <li class="text-sm leading-6">
                        <div class="relative group">
                            <div
                                class="absolute transition rounded-lg opacity-25 -inset-1 bg-gradient-to-r from-purple-600 to-pink-600 blur duration-400 group-hover:opacity-100 group-hover:duration-200">
                            </div>

                            <div class="relative leading-none text-white rounded-lg bg-slate-800 ring-1 ring-gray-900/5">
                                <div class="flex overflow-hidden font-bold rounded-t-lg bg-slate-700 text-md">

                                    <p class="p-5 text-purple-100 ps-7 sm:ps-12">

                                        <span>CARI PESANAN MU</span>
                                    </p>
                                </div>
                                <div class="pt-1 text-left p-7 sm:text-center">

                                    <p class="my-5 font-bold text-md sm:text-xl text-slate-100">
                                        Pantau transaksi Anda dengan memasukkan Nomor Invoice di bawah ini:

                                    </p>


                                    <form class="max-w-lg mx-auto " action="{{ route('cek-transaction') }}" method="GET">

                                        <div class="w-full ">
                                            <input type="text" id="voice-search"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-4 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="ALGXXXXXXXXXXXXXX" type="text" name="query" id="query"
                                                value="{{ request('query') }}" required />

                                        </div>
                                        <div class="flex justify-end">
                                            <button type="submit"
                                                class="inline-flex my-3 mt-5 items-center py-2.5 px-3 text-xs sm:text-sm font-medium text-white bg-purple-700 rounded-lg border border-purple-700 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-800">
                                                <svg class="w-4 h-4 me-2" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                                </svg>Cari Transaksi
                                            </button>
                                        </div>
                                    </form>

                                </div>

                            </div>

                        </div>
                    </li>
                    @if (request('query'))
                        <li class="text-sm leading-6">
                            <div class="relative group">
                                <div
                                    class="absolute transition rounded-lg opacity-25 -inset-1 bg-gradient-to-r from-purple-600 to-pink-600 blur duration-400 group-hover:opacity-100 group-hover:duration-200">
                                </div>

                                <div
                                    class="relative leading-none text-white rounded-lg bg-slate-800 ring-1 ring-gray-900/5">
                                    <div class="flex overflow-hidden font-bold rounded-t-lg bg-slate-700 text-md">

                                        <p class="p-5 text-purple-100 ps-7 sm:ps-12">

                                            <span>DAFTAR TRANSAKSI</span>
                                        </p>
                                    </div>
                                    <div class="text-left p-7 sm:text-center">

                                        <div class="relative overflow-x-auto ">
                                            @if ($data)
                                                <table class="w-full text-sm text-left rtl:text-right">
                                                    <thead
                                                        class="text-xs text-gray-200 uppercase border-b-2 border-b-slate-700">
                                                        <tr>
                                                            <th scope="col" class="px-6 py-3">

                                                                Tanggal
                                                            </th>
                                                            <th scope="col" class="px-6 py-3">
                                                                No. Invoice
                                                            </th>
                                                            <th scope="col" class="px-6 py-3">
                                                                No. Whatsapp
                                                            </th>
                                                            <th scope="col" class="px-6 py-3">
                                                                Harga
                                                            </th>
                                                            <th scope="col" class="px-6 py-3">
                                                                Status
                                                            </th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        <tr class="text-gray-400 ">
                                                            <th scope="row" class="px-6 py-4 font-medium ">

                                                                {{ $data['created_at'] }}
                                                            </th>
                                                            <td class="px-6 py-4">
                                                                {{ $data['invoice_id'] }}
                                                            </td>
                                                            <td class="px-6 py-4">
                                                                {{ $data['contact'] }}
                                                            </td>
                                                            <td class="px-6 py-4">
                                                                Rp. {{ number_format($data['price']) }}
                                                            </td>
                                                            <td class="px-6 py-4">
                                                                {{ $data['status'] }}
                                                            </td>

                                                        </tr>

                                                    </tbody>
                                                </table>
                                            @else
                                                <div class="h-5 text-center text-slate-100">
                                                    Transaksi tidak ditemukan!
                                                </div>
                                            @endif
                                        </div>

                                    </div>

                                </div>

                            </div>
                        </li>
                    @endif



                </ul>




            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        function DiskonSuccess() {
            Swal.fire({
                title: "Diskon Berhasil Didapat",
                text: "Kupon Valid, Stock tersedia!",
                icon: "success"

            });
        }

        function DiskonFail() {
            Swal.fire({
                title: "Diskon Gagal Didapat",
                text: "Kupon tidak valid atau stock habis!",
                icon: "error"

            });
        }

        // Tampilkan alert saat halaman dimuat (atau bisa dipanggil dari event lain)
        // showAlert();

        function numberFormat(number, decimals, decPoint, thousandsSep) {
            number = parseFloat(number);
            if (isNaN(number)) return 0;

            decimals = isNaN(decimals) ? 2 : Math.abs(decimals);
            decPoint = decPoint === undefined ? ',' : decPoint;
            thousandsSep = thousandsSep === undefined ? '.' : thousandsSep;

            var sign = number < 0 ? '-' : '';
            var integerPart = String(parseInt(Math.abs(number).toFixed(decimals)));
            var fractionalPart = (decimals ? decPoint + Math.abs(number - integerPart).toFixed(decimals).slice(2) : '');

            return sign + integerPart.replace(/\B(?=(\d{3})+(?!\d))/g, thousandsSep) + fractionalPart;
        }

        $(document).ready(function() {
            $('#popup-modal').removeClass('hidden');
            let total = 0;
            let price = 0;
            let item = "";
            let kupon = "";
            let gameCode = "";
            let customer_no = "";
            // Ketika tombol dengan class "btn" diklik:
            $(".btn").click(function() {
                // Ambil nilai dari atribut data-price
                price = $(this).data('price');
                item = $(this).data('name');
                gameCode = $(this).data('code');
                total = price;
                // Ganti nilai input dengan id 'subtotal' dengan nilai price
                $('#subtotal').val(price);
                $('.item-name').text(item);
                $('.subtotal').text('Rp. ' + numberFormat(price, '', ''));
                $('.total').text('Rp. ' + numberFormat(price, '', ''));
            });

            $('#kupon').on('input', function() {
                kupon = $(this).val();
                $('.discount-name').text(kupon);
            });

            $('#idPlayer').on('input', function() {
                customer_no = $(this).val();
            });



            $('#cekKuponBtn').click(function(e) {
                e.preventDefault(); // Mencegah aksi default tombol

                // Nonaktifkan tombol untuk mencegah klik ganda
                $(this).prop('disabled', true);


                // Lakukan AJAX request
                $.ajax({
                    url: "/cekDiskon", // Ganti dengan URL yang sesuai
                    type: "POST",
                    data: {
                        coupon_code: kupon,
                        game_code: gameCode,
                        total: total,
                        _token: "{{ csrf_token() }}" // Sertakan CSRF token
                    },
                    success: function(response) {
                        // Tindakan berdasarkan respons sukses
                        if (response) {
                            console.log(response)
                            DiskonSuccess()

                            $('.discount-percent').text('-' + response['diskon'] + '%');
                            $('.total').text('Rp. ' + numberFormat(response['price'], '', ''));
                        } else {
                            DiskonFail()
                            console.error(response);
                        }
                    },
                    error: function(xhr) {
                        // Tindakan jika terjadi error
                        alert('Terjadi kesalahan, coba lagi.');
                        console.error(xhr.responseText);
                    },
                    complete: function() {
                        // Aktifkan kembali tombol setelah proses selesai (baik sukses atau gagal)
                        $('#cekKuponBtn').prop('disabled', false);
                    }
                });
            });


            $('#checkoutBtn').click(function(e) {
                $(this).text('')
                $(this).append(` <div role="status">
        <svg aria-hidden="true" class="inline w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-gray-600 dark:fill-gray-300" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
            <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
        </svg>
        <span class="sr-only">Loading...</span>
    </div>
`);
                e.preventDefault(); // Mencegah aksi default tombol
                // Nonaktifkan tombol untuk mencegah klik ganda
                $(this).prop('disabled', true);
                // Lakukan AJAX request (sesuaikan URL dan data sesuai kebutuhan)
                $.ajax({
                    url: "/transaction", // Ganti dengan URL yang sesuai
                    type: "POST",
                    data: {
                        customer_no: customer_no,
                        price: total,
                        buyer_sku_code: gameCode,
                        _token: "{{ csrf_token() }}" // Sertakan CSRF token
                    },
                    success: function(response) {
                        // Tindakan berdasarkan respons sukses
                        if (response) {

                            // alert('Transaksi Berhasil!');
                            Swal.fire({
                                title: "Pembayaran Berhasil",
                                text: "Terimakasih telah menggunakan Algoora",
                                icon: "success",
                                willClose: () => {
                                    // Redirect ke halaman lain setelah alert ditutup
                                    window.location.href =
                                        '/'; // Ganti dengan URL tujuan
                                }

                            });
                            console.log(response)
                        } else {
                            Swal.fire({
                                title: "Transaksi Gagal",
                                text: "Mohon periksa id player dan item lagi!",
                                icon: "warning"

                            });
                            console.log(response)
                        }
                    },
                    error: function(xhr) {
                        // Tindakan jika terjadi error
                        console.error(xhr.responseText);
                    },
                    complete: function() {
                        // Aktifkan kembali tombol setelah proses selesai (baik sukses atau gagal)
                        $('#checkoutBtn').prop('disabled', false);
                        $('#checkoutBtn div[role="status"]').remove();
                        $('#checkoutBtn').text('Beli Sekarang')
                    }
                });

            });

        });
    </script>
@endpush
