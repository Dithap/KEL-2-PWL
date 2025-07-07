@include('partials.dashboard.head')
@include('partials.dashboard.sidebar')
@include('partials.dashboard.header')

<div class="container mt-4">
    <h1>Hasil Scan QR Code KTM</h1>
    <div class="mb-3">
        <strong>NIM yang dicari:</strong> {{ $nim }}
    </div>
    @if($user)
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $user->name }}</h5>
                <p class="card-text"><strong>NIM:</strong> {{ $user->nim }}</p>
                <p class="card-text"><strong>Email:</strong> {{ $user->email }}</p>
                <!-- Tambahkan data lain jika perlu -->
            </div>
        </div>
    @else
        <div class="alert alert-danger mt-3">Data mahasiswa dengan NIM tersebut tidak ditemukan.</div>
    @endif
    <a href="{{ route('qrcode.scan') }}" class="btn btn-secondary mt-3">Scan Lagi</a>
</div>

@include('partials.dashboard.footer') 