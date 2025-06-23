@if (session('success-message'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Sukses',
        text: '{{ session('success-message') }}',
        confirmButtonText: 'OK'
    });
</script>
@endif

@if (session('failed-message'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: '{{ session('failed-message') }}',
            confirmButtonText: 'OK'
        });
    </script>
@endif

@if (session('warning-message'))
    <script>
        Swal.fire({
            icon: 'warning',
            title: 'Informasi',
            text: '{{ session('warning-message') }}',
            confirmButtonText: 'OK'
        });
    </script>
@endif
