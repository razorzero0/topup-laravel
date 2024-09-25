@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@9.0.3"></script>
    <script>
        if (document.getElementById("default-table") && typeof simpleDatatables.DataTable !== 'undefined') {
            const dataTable = new simpleDatatables.DataTable("#default-table", {


            });
        }
    </script>
@endpush
