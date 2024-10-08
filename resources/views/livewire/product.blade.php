<section class="py-20 mt-4 sm:mt-6">
    <div class="max-w-6xl mx-3 md:mx-10 lg:mx-20 xl:mx-auto">
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-2 lg:gap-8">
            <ul class="space-y-8">

                @include('livewire.product_partials.contact')
                @include('livewire.product_partials.player')
                @include('livewire.product_partials.diamonds')
                @include('livewire.product_partials.payment')
                @include('livewire.product_partials.kupon')

            </ul>

            <ul class="space-y-8 sm:block">
                @include('livewire.product_partials.information')
                @include('livewire.product_partials.checkout')
            </ul>




        </div>
    </div>

</section>






@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endpush



{{-- @push('scripts') --}}
{{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
            let kuponStatus = 0;
            let gameCode = "";
            let payCode = "";
            let payName = "";
            let payFlat = 0;
            let payPercent = 0;
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
                $('#cekKuponBtn').prop('disabled', false);
                $('.btn').removeClass('btnActive');
                // Tambahkan class ke tombol yang diklik
                $(this).addClass('btnActive');

                $('.btn-payment').each(function() {
                    $(this).attr('data-price', 0);
                    payFlat = $(this).data('flat');
                    payPercent = $(this).data('percent');

                    $(this).attr('data-price', price);
                    $(this).find('.payment-price').text('Rp. ' + numberFormat(price, '',
                        ''));
                    // if (price < 6000) {
                    //     if (payFlat < 1000 && payPercent <= 3) {

                    //     } else {

                    //         $(this).find('.payment-price').text('');
                    //         $(this).find('.payment-price').append(
                    //             "<span class='text-red-400'>min. Rp10.000</span>");

                    //     }
                    // } else {
                    //     if (payFlat < 1000) {
                    //         var temp = price;
                    //     } else if (payFlat < 3000) {
                    //         var temp = price + 3000
                    //     } else {
                    //         var temp = price + 4000
                    //     }

                    //     $(this).attr('data-price', temp);
                    //     $(this).find('.payment-price').text('Rp. ' + numberFormat(temp, '', ''));
                    // }

                });


            });



            $(".btn-payment").click(function() {

                if ($(this).data('price') > 0) {

                    payName = $(this).data('name')
                    total = $(this).data('price');
                    // console.log(total)
                    $('.subtotal').text('Rp. ' + numberFormat(total, '', ''));
                    $('.payment-name').text(payName);
                    $('.total').text('Rp. ' + numberFormat(total, '', ''));
                }
                // $('#cekKuponBtn').prop('disabled', false);
                $('.btn-payment').removeClass('paymentActive');
                // Tambahkan class ke tombol yang diklik
                $(this).addClass('paymentActive');
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
                $(this).text('')
                $(this).append(` <div role="status">
        <svg aria-hidden="true" class="inline w-5 h-5 text-gray-200 animate-spin dark:text-gray-600 fill-gray-600 dark:fill-gray-300" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
            <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
        </svg>
        <span class="sr-only">Loading...</span>
    </div>
`);

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
                            $('#cekKuponBtn').prop('disabled', true);
                            kuponStatus = 1;

                            $('.discount-percent').text('-' + response['diskon'] + '%');
                            $('.total').text('Rp. ' + numberFormat(response['price'], '', ''));
                        } else {
                            DiskonFail()
                            $('#cekKuponBtn').prop('disabled', false);
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
                        // $('#cekKuponBtn').prop('disabled', false);
                        $('#cekKuponBtn div[role="status"]').remove();
                        $('#cekKuponBtn').text('Beli Sekarang')
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

        }); --}}
{{-- </script> --}}
{{-- @endpush --}}
