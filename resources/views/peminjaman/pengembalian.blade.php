@extends('partials.dashboard.head')

@section('content')
    @include('partials.dashboard.sidebar')
    @include('partials.dashboard.header')

    <div class="nk-content">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between">
                            <div class="nk-block-head-content">
                                <h3 class="nk-block-title page-title">{{ $page_title }}</h3>
                                <div class="nk-block-des text-soft">
                                    <p>Kelola pengembalian buku yang sedang dipinjam.</p>
                                </div>
                            </div>
                            <div class="nk-block-head-content">
                                <div class="toggle-wrap nk-block-tools-toggle">
                                    <a href="{{ route('peminjaman.index') }}" class="btn btn-outline-secondary">
                                        <em class="icon ni ni-arrow-left"></em>
                                        <span>Kembali ke Peminjaman</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <div class="nk-block">
                        <div class="card card-bordered">
                            <div class="card-inner">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Peminjam</th>
                                                <th>Judul Buku</th>
                                                <th>Kode Buku</th>
                                                <th>Tanggal Pinjam</th>
                                                <th>Harus Kembali</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($peminjaman as $index => $item)
                                                <tr class="{{ $item->isLate() ? 'table-danger' : '' }}">
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $item->user->name ?? 'N/A' }}</td>
                                                    <td>{{ $item->judul_buku }}</td>
                                                    <td>{{ $item->kode_buku }}</td>
                                                    <td>{{ $item->tanggal_pinjam->format('d/m/Y') }}</td>
                                                    <td>
                                                        <span class="{{ $item->isLate() ? 'text-danger font-weight-bold' : '' }}">
                                                            {{ $item->tanggal_harus_kembali->format('d/m/Y') }}
                                                            @if($item->isLate())
                                                                <br><small class="text-danger">(Terlambat {{ $item->days_late }} hari)</small>
                                                            @endif
                                                        </span>
                                                    </td>
                                                    <td>
                                                        @if($item->isLate())
                                                            <span class="badge badge-danger">Terlambat</span>
                                                        @else
                                                            <span class="badge badge-warning">Dipinjam</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <form action="{{ route('peminjaman.kembalikan', $item->id) }}" method="POST" style="display: inline;">
                                                            @csrf
                                                            <button type="submit" class="btn btn-sm btn-success" 
                                                                    onclick="return confirm('Yakin ingin mengembalikan buku ini?')">
                                                                <em class="icon ni ni-check-circle"></em>
                                                                <span>Kembalikan</span>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="8" class="text-center">Tidak ada buku yang sedang dipinjam</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('partials.dashboard.footer')
@endsection
