<script>
    var datatableLanguage = {
        search: "", // Menghilangkan teks 'Search :'
        searchPlaceholder: "Cari data...", // Placeholder untuk input pencarian
        zeroRecords: "Tidak ditemukan data yang sesuai",   // Teks ketika data tidak ditemukan
        info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri", // Info menampilkan data
        infoEmpty: "Menampilkan 0 sampai 0 dari 0 entri", // Jika tidak ada data
        infoFiltered: "(difilter dari _MAX_ total entri)", // Info setelah difilter
        lengthMenu: "_MENU_",  // Custom teks untuk Show Entries
        paginate: {
            previous: "Sebelumnya", // Custom teks Previous
            next: "Berikutnya"      // Custom teks Next
        },
        processing: '<div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div>',
        emptyTable: "Tidak ada data tersedia",
        zeroRecords: "Tidak ditemukan data yang sesuai",
        processing: '<div class="custom-loader">Memuat data...</div>'
    };
</script>

@if ($page === 'books')
<script>
    $(document).ready(function() {
        $('#bookTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '{{ route('dashboard.books.data') }}',
                type: 'GET',
                data: function(d) {
                    d.name = '{{ $name }}';
                }
            },
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'title', name: 'title' },
                { data: 'category', name: 'category' },
                { data: 'author', name: 'author' },
                { data: 'year', name: 'year' },
                { data: 'quantity_total', name: 'quantity_total' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
                { data: 'created_at', name: 'created_at', visible: false },
                { data: 'id', name: 'id', orderable: true, searchable: false, visible: false },
            ],
            language: datatableLanguage,
            responsive: true,
            autoWidth: false,
            order: [[6, 'desc']],
            pagingType: "simple",
            lengthMenu: [[10, 25, 50, 100, -1], ['Tampilkan 10 data', 'Tampilkan 25 data', 'Tampilkan 50 data', 'Tampilkan 100 data', 'Tampilkan semua']],
            scrollX: true
        });
    });
</script>
@elseif($page === 'book-categories')
@if (is_role(['2']))
    <script>
    $(document).ready(function() {
        $('#bookCategoryTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '{{ route('dashboard.book.categories.data') }}',
                type: 'GET',
                data: function(d) {
                    d.name = '{{ $name }}';
                }
            },
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'name', name: 'name' },
                { data: 'book_count', name: 'book_count' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
                { data: 'created_at', name: 'created_at', visible: false },
                { data: 'id', name: 'id', orderable: true, searchable: false, visible: false },
            ],
            language: datatableLanguage,
            responsive: true,
            autoWidth: false,
            order: [[4, 'desc']],
            pagingType: "simple",
            lengthMenu: [[10, 25, 50, 100, -1], ['Tampilkan 10 data', 'Tampilkan 25 data', 'Tampilkan 50 data', 'Tampilkan 100 data', 'Tampilkan semua']],
            scrollX: true
        });
    });
</script>
@else
<script>
    $(document).ready(function() {
        $('#bookCategoryTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '{{ route('dashboard.book.categories.data') }}',
                type: 'GET',
                data: function(d) {
                    d.name = '{{ $name }}';
                }
            },
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'name', name: 'name' },
                { data: 'book_count', name: 'book_count' },
                { data: 'created_at', name: 'created_at', visible: false },
                { data: 'id', name: 'id', orderable: true, searchable: false, visible: false },
            ],
            language: datatableLanguage,
            responsive: true,
            autoWidth: false,
            order: [[3, 'desc']],
            pagingType: "simple",
            lengthMenu: [[10, 25, 50, 100, -1], ['Tampilkan 10 data', 'Tampilkan 25 data', 'Tampilkan 50 data', 'Tampilkan 100 data', 'Tampilkan semua']],
            scrollX: true
        });
    });
</script>
@endif
@elseif ($page === 'book-loans')
<script>
    $(document).ready(function() {
        $('#bookLoanTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '{{ route('dashboard.book.loans.data') }}',
                type: 'GET',
                data: function(d) {
                    d.name = '{{ $name }}';
                }
            },
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'book_name', name: 'book_name' },
                { data: 'borrower_name', name: 'borrower_name' },
                { data: 'loan_date', name: 'loan_date' },
                { data: 'due_date', name: 'due_date' },
                { data: 'status', name: 'status' },
                { data: 'loan_status', name: 'loan_status' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
                { data: 'created_at', name: 'created_at', visible: false },
                { data: 'id', name: 'id', orderable: true, searchable: false, visible: false },
            ],
            language: datatableLanguage,
            responsive: true,
            autoWidth: false,
            order: [[7, 'desc']],
            pagingType: "simple",
            lengthMenu: [[10, 25, 50, 100, -1], ['Tampilkan 10 data', 'Tampilkan 25 data', 'Tampilkan 50 data', 'Tampilkan 100 data', 'Tampilkan semua']],
            scrollX: true
        });
    });
</script>
@elseif($page === 'users')
<script>
    $(document).ready(function() {
        $('#userTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '{{ route('dashboard.users.data') }}',
                type: 'GET',
                data: function(d) {
                    d.name = '{{ $name }}';
                    d.role = '{{ $role }}';
                    d.status = '{{ $status }}';
                }
            },
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'name', name: 'name' },
                { data: 'email', name: 'email' },
                { data: 'role', name: 'role' },
                { data: 'status', name: 'status' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
                { data: 'created_at', name: 'created_at', visible: false },
                { data: 'id', name: 'id', orderable: true, searchable: false, visible: false },
            ],
            language: datatableLanguage,
            responsive: true,
            autoWidth: false,
            order: [[6, 'desc']],
            pagingType: "simple",
            lengthMenu: [[10, 25, 50, 100, -1], ['Tampilkan 10 data', 'Tampilkan 25 data', 'Tampilkan 50 data', 'Tampilkan 100 data', 'Tampilkan semua']],
            scrollX: true
        });
    });
</script>
@elseif($page === 'roles')
<script>
    $(document).ready(function() {
        $('#roleTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '{{ route('dashboard.roles.data') }}',
                type: 'GET',
            },
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'name', name: 'name' },
                { data: 'account_count', name: 'account_count' },
                { data: 'created_at', name: 'created_at', visible: false },
                { data: 'id', name: 'id', orderable: true, searchable: false, visible: false },
            ],
            language: datatableLanguage,
            responsive: true,
            autoWidth: false,
            order: [[3, 'desc']],
            pagingType: "simple",
            lengthMenu: [[10, 25, 50, 100, -1], ['Tampilkan 10 data', 'Tampilkan 25 data', 'Tampilkan 50 data', 'Tampilkan 100 data', 'Tampilkan semua']],
            scrollX: true
        });
    });
</script>
@endif
