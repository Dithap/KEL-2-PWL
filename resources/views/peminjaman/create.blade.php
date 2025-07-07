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
                                <p>Tambah data peminjaman buku baru.</p>
                            </div>
                        </div>
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="{{ route('peminjaman.index') }}" class="btn btn-outline-secondary">
                                    <em class="icon ni ni-arrow-left"></em>
                                    <span>Kembali</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="nk-block">
                    <div class="card card-bordered">
                        <div class="card-inner">
                            <form action="{{ route('peminjaman.store') }}" method="POST">
                                @csrf
                                
                                <div class="row g-4">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="judul_buku">Judul Buku <span class="text-danger">*</span></label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control @error('judul_buku') is-invalid @enderror" 
                                                       id="judul_buku" name="judul_buku" value="{{ old('judul_buku') }}" 
                                                       placeholder="Masukkan judul buku" required>
                                                @error('judul_buku')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="kode_buku">Kode Buku <span class="text-danger">*</span></label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control @error('kode_buku') is-invalid @enderror" 
                                                       id="kode_buku" name="kode_buku" value="{{ old('kode_buku') }}" 
                                                       placeholder="Masukkan kode buku" required>
                                                @error('kode_buku')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="tanggal_harus_kembali">Tanggal Harus Kembali <span class="text-danger">*</span></label>
                                            <div class="form-control-wrap">
                                                <input type="date" class="form-control @error('tanggal_harus_kembali') is-invalid @enderror" 
                                                       id="tanggal_harus_kembali" name="tanggal_harus_kembali" 
                                                       value="{{ old('tanggal_harus_kembali') }}" required>
                                                @error('tanggal_harus_kembali')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label" for="catatan">Catatan</label>
                                            <div class="form-control-wrap">
                                                <textarea class="form-control @error('catatan') is-invalid @enderror" 
                                                          id="catatan" name="catatan" rows="3" 
                                                          placeholder="Catatan tambahan (opsional)">{{ old('catatan') }}</textarea>
                                                @error('catatan')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">
                                                <em class="icon ni ni-save"></em>
                                                <span>Simpan Peminjaman</span>
                                            </button>
                                            <a href="{{ route('peminjaman.index') }}" class="btn btn-outline-secondary">
                                                <span>Batal</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('partials.dashboard.footer') 