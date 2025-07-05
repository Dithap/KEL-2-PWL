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
                                <p>Kelola semua data peminjaman buku perpustakaan.</p>
                            </div>
                        </div>
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="{{ route('peminjaman.create') }}" class="btn btn-primary">
                                    <em class="icon ni ni-plus"></em>
                                    <span>Tambah Peminjaman</span>
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
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $item->user->name ?? 'N/A' }}</td>
                                                <td>{{ $item->judul_buku }}</td>
                                                <td>{{ $item->kode_buku }}</td>
                                                <td>{{ $item->tanggal_pinjam->format('d/m/Y') }}</td>
                                                <td>
                                                    <span class="{{ $item->isLate() ? 'text-danger' : '' }}">
                                                        {{ $item->tanggal_harus_kembali->format('d/m/Y') }}
                                                    </span>
                                                </td>
                                                <td>
                                                    @if($item->status === 'dipinjam')
                                                        @if($item->isLate())
                                                            <span class="badge badge-danger">Terlambat</span>
                                                        @else
                                                            <span class="badge badge-warning">Dipinjam</span>
                                                        @endif
                                                    @elseif($item->status === 'dikembalikan')
                                                        <span class="badge badge-success">Dikembalikan</span>
                                                    @else
                                                        <span class="badge badge-secondary">{{ ucfirst($item->status) }}</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="dropdown">
                                                        <a class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown">
                                                            <em class="icon ni ni-more-h"></em>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <ul class="link-list-opt no-bdr">
                                                                <li>
                                                                    <a href="{{ route('peminjaman.show', $item->id) }}">
                                                                        <em class="icon ni ni-eye"></em>
                                                                        <span>Detail</span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="{{ route('peminjaman.edit', $item->id) }}">
                                                                        <em class="icon ni ni-edit"></em>
                                                                        <span>Edit</span>
                                                                    </a>
                                                                </li>
                                                                @if($item->status === 'dipinjam')
                                                                <li>
                                                                    <form action="{{ route('peminjaman.kembalikan', $item->id) }}" method="POST" style="display: inline;">
                                                                        @csrf
                                                                        <button type="submit" class="btn btn-link p-0" onclick="return confirm('Yakin ingin mengembalikan buku ini?')">
                                                                            <em class="icon ni ni-check-circle"></em>
                                                                            <span>Kembalikan</span>
                                                                        </button>
                                                                    </form>
                                                                </li>
                                                                @endif
                                                                <li>
                                                                    <form action="{{ route('peminjaman.destroy', $item->id) }}" method="POST" style="display: inline;">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="btn btn-link p-0 text-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                                                            <em class="icon ni ni-trash"></em>
                                                                            <span>Hapus</span>
                                                                        </button>
                                                                    </form>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="8" class="text-center">Tidak ada data peminjaman</td>
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
