{{-- Delete Confirmation --}}
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });

    function deleteItem(url, message) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: message,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "DELETE",
                    url: url,
                    success: function(response) {
                        if (response.status === 'failed') {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal',
                                text: response.message,
                                confirmButtonText: 'OK'
                            });
                        }else if (response.status === 'warning') {
                            Swal.fire({
                                icon: 'warning',
                                title: 'Informasi',
                                text: response.message,
                                confirmButtonText: 'OK'
                            });
                        } else {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: 'Data berhasil dihapus.',
                                confirmButtonText: 'OK'
                            }).then(() => location.reload());
                        }
                    },
                    error: function(xhr) {
                        Swal.fire(
                            'Terjadi kesalahan!',
                            xhr.responseText,
                            'error'
                        );
                    }
                });
            }
        });
    }
</script>

{{-- Submit Confirmation --}}
<script>
$('#submitButton').click(function(e) {
    e.preventDefault();

    Swal.fire({
        title: 'Apakah Anda yakin?',
        text: 'Pastikan data yang Anda masukkan sudah benar.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, kirim!',
        cancelButtonText: 'Batal',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            // console.log("Form akan dikirim...");

            $('#myForm').off('submit').submit(); // Pastikan hanya submit 1x
        }
    });
});

</script>

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
