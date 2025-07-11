@include('partials.dashboard.head')
@include('partials.dashboard.sidebar')
@include('partials.dashboard.header')
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title">{{$page_title}}</h3>
                                        </div><!-- .nk-block-head-content -->
                                        <div class="nk-block-head-content">
                                            <div class="toggle-wrap nk-block-tools-toggle">
                                                <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                                <div class="toggle-expand-content" data-content="pageMenu">
                                                    <ul class="nk-block-tools g-3">
                                                        <li class="nk-block-tools-opt"><a href="{{route('dashboard.book.loans.index')}}" class="btn btn-white btn-dim btn-outline-light"><em class="icon ni ni-arrow-left"></em><span>Kembali</span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div><!-- .nk-block-head-content -->
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
                                <div class="nk-block nk-block-lg">
                                    <div class="card card-bordered card-preview">
                                        <div class="card-inner">
                                            {{-- @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $message)
                                                            <li>{{ $message }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif --}}
                                            <div class="preview-block">
                                                {{-- <span class="preview-title-lg overline-title">Default Preview</span> --}}
                                                <form action="{{route('dashboard.book.loans.store')}}" method="post" id="myForm">
                                                    @csrf
                                                    <div class="row gy-4">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="form-label required-field" for="book_id">Buku</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="book_name" name="book_name" value="{{ $bookLoan->book->title }}" readonly>
                                                                </div>
                                                                @error('book_id')
                                                                    <span class="error-message">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="form-label required-field" for="book_id">Peminjam</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="borrower" name="borrower" value="{{ $bookLoan->borrower->name }}" readonly>
                                                                </div>
                                                                @error('borrower_id')
                                                                    <span class="error-message">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="form-label required-field">Tanggal Pinjam</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="date" class="form-control" name="loan_date" value="{{$bookLoan->loan_date}}" readonly>
                                                                </div>
                                                            </div>
                                                            @error('loan_date')
                                                                    <span class="error-message">{{ $message }}</span>
                                                                @enderror
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="form-label required-field">Tanggal Wajib Dikembalikan</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="date" class="form-control" name="due_date" value="{{$bookLoan->due_date}}" readonly>
                                                                </div>
                                                            </div>
                                                            @error('due_date')
                                                                    <span class="error-message">{{ $message }}</span>
                                                                @enderror
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="form-label required-field" for="fine_amount">Denda Keterlambatan Perhari</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="number" class="form-control" id="fine_amount" placeholder="Contoh: 12000" name="fine_amount" value="{{ $bookLoan->fine_amount }}">
                                                                </div>
                                                                @error('fine_amount')
                                                                    <span class="error-message">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label" for="notes">Catatan</label>
                                                                <div class="form-control-wrap">
                                                                    <textarea class="form-control no-resize" id="notes" name="notes" readonly>{{ $bookLoan->notes }}</textarea>
                                                                </div>
                                                                @error('notes')
                                                                    <span class="error-message">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        @if ($bookLoan->status === '0')
                                                            <div class="col-sm-12 text-end mt-5">
                                                            <a href="javascript:void(0);" class="btn btn-success mx-1" onclick="statusAction('{{route('dashboard.book.loans.process.action', ['id' => encrypt_id($bookLoan->id), 'action' => 'accept'])}}', 'Apakah Anda yakin ingin menyetujui peminjaman buku {{$bookLoan->book->title}}?', 'Ya, Setujui')">
                                                                Terima
                                                            </a>
                                                            <a href="javascript:void(0);" class="btn btn-danger mx-1" onclick="statusAction('{{route('dashboard.book.loans.process.action', ['id' => encrypt_id($bookLoan->id), 'action' => 'reject'])}}', 'Apakah Anda yakin ingin menolak peminjaman buku {{$bookLoan->book->title}}?', 'Ya, Setujui')">
                                                                Tolak
                                                            </a>
                                                        </div>
                                                        @endif
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div><!-- .card-preview -->
                                </div><!-- .nk-block -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content @e -->
@include('partials.dashboard.footer')
