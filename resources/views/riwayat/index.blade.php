@include('partials.dashboard.head')
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
                                <p>Riwayat semua peminjaman dan pengembalian buku perpustakaan.</p>
                            </div>
                        </div>
                    </div>
                </div>

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
                                            <th>Tanggal Kembali</th>
                                            <th>Status</th>
                                            <th>Catatan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($riwayat as $index => $item)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $item->user->name ?? 'N/A' }}</td>
                                                <td>{{ $item->judul_buku }}</td>
                                                <td>{{ $item->kode_buku }}</td>
                                                <td>{{ $item->tanggal_pinjam ? $item->tanggal_pinjam->format('d/m/Y') : '-' }}</td>
                                                <td>{{ $item->tanggal_harus_kembali ? $item->tanggal_harus_kembali->format('d/m/Y') : '-' }}</td>
                                                <td>{{ $item->tanggal_kembali ? $item->tanggal_kembali->format('d/m/Y') : '-' }}</td>
                                                <td>
                                                    @if($item->status === 'dipinjam')
                                                        <span class="badge badge-warning">Dipinjam</span>
                                                    @elseif($item->status === 'dikembalikan')
                                                        <span class="badge badge-success">Dikembalikan</span>
                                                    @elseif($item->status === 'terlambat')
                                                        <span class="badge badge-danger">Terlambat</span>
                                                    @else
                                                        <span class="badge badge-secondary">{{ ucfirst($item->status) }}</span>
                                                    @endif
                                                </td>
                                                <td>{{ $item->catatan }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="9" class="text-center">Tidak ada data riwayat</td>
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
