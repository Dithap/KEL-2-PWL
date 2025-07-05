@extends('partials.dashboard.head')

@section('content')
    @include('partials.dashboard.sidebar')
    @include('partials.dashboard.header')

    <div class="container mt-4">
        <h1>👤 Profil Pengguna</h1>
        <div class="mb-3">
            <strong>NIM:</strong> {{ Auth::user()->nim ?? '-' }}
        </div>
        <div class="mb-4">
            <strong>QR Code KTM:</strong><br>
            @if(Auth::user()->nim)
                {!! QrCode::size(180)->generate(Auth::user()->nim) !!}
            @else
                <span class="text-danger">NIM belum diisi.</span>
            @endif
        </div>
        <p>Halaman ini masih dalam pengembangan.</p>
    </div>

    @include('partials.dashboard.footer')
@endsection
