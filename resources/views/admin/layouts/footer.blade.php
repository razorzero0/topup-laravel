@push('scripts')
    <script src="https://cdn.jsdelivr.net/gh/bberkay/lightweight-wysiwyg-editor@main/src/wysiwyg.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@9.0.3"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        if (document.getElementById("default-table") && typeof simpleDatatables.DataTable !== 'undefined') {
            const dataTable = new simpleDatatables.DataTable("#default-table", {});
        }
        if (document.getElementById("default-table2") && typeof simpleDatatables.DataTable !== 'undefined') {
            const dataTable = new simpleDatatables.DataTable("#default-table2", {
                perPage: 15,
            });
        }

        if (document.getElementById("add-item-table") && typeof simpleDatatables.DataTable !== 'undefined') {
            const dataTableItem = new simpleDatatables.DataTable("#add-item-table", {});
        }


        // Event listener untuk perubahan nilai di elemen select pertama
        $('#selectCategory').change(function() {
            var selectedKey = $(this).find('option:selected').data('key');
            // console.log(selectedKey)

            // Mengirimkan permintaan AJAX
            $.ajax({
                url: '/get-product', // Rute yang ditangani oleh metode controller
                method: 'GET',
                data: {
                    selectedValue: selectedKey
                },
                success: function(response) {
                    console.log(response)
                    // Memperbarui elemen select kedua dengan data yang diterima
                    $('#selectProduct').empty();
                    $.each(response, function(key, value) {
                        $('#selectProduct').append('<option value="' + value.brand + '">' +
                            value
                            .brand +
                            '</option>');
                    });
                }
            });
        });

        $('#selectCategory2').change(function() {
            var selectedKey = $(this).find('option:selected').data('key');
            // console.log(selectedKey)

            // Mengirimkan permintaan AJAX
            $.ajax({
                url: '/get-product', // Rute yang ditangani oleh metode controller
                method: 'GET',
                data: {
                    selectedValue: selectedKey
                },
                success: function(response) {
                    console.log(response)
                    // Memperbarui elemen select kedua dengan data yang diterima
                    $('#selectProduct2').empty();
                    $.each(response, function(key, value) {
                        $('#selectProduct2').append('<option value="' + value.brand + '">' +
                            value
                            .brand +
                            '</option>');
                    });
                }
            });
        });

        $('#selectProduct').change(function() {
            var selectedValue = $(this).val();
            $('#add-product-name').val(selectedValue)
        })
        $('#selectProduct2').change(function() {
            var selectedValue2 = $(this).val();
            $('#edit-product-name').val(selectedValue2)
        })
    </script>
@endpush
