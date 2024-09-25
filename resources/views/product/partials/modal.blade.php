@if (session('success'))
    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            function showAlert() {
                Swal.fire({
                    title: "Transaksi Berhasil",
                    text: "{{ session('success') }}",
                    icon: "success",
                    willClose: () => {
                        // Redirect ke halaman lain setelah alert ditutup
                        window.location.href = '/'; // Ganti dengan URL tujuan
                    }

                });
            }

            document.addEventListener("DOMContentLoaded", function() {
                showAlert();
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
@if ($errors->any())
    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                title: "Transaksi Gagal",
                text: "Mohon Periksa ID Player dan Item",
                icon: "error",
                willClose: () => {
                    // Redirect ke halaman lain setelah alert ditutup
                    window.location.href = '/'; // Ganti dengan URL tujuan
                }

            });
            }
        </script>
    @endpush
@endif
