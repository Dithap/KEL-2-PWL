@include('partials.dashboard.head')
@include('partials.dashboard.sidebar')
@include('partials.dashboard.header')
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between g-3">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title">Detail Buku</h3>
                                            <div class="nk-block-des text-soft">
                                                <p>Informasi buku disini.</p>
                                            </div>
                                        </div>
                                        <div class="nk-block-head-content">
                                            <a href="{{route('dashboard.books.index')}}" class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em class="icon ni ni-arrow-left"></em><span>Kembali</span></a>
                                            <a href="{{route('dashboard.books.index')}}" class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em class="icon ni ni-arrow-left"></em></a>
                                        </div>
                                    </div>
                                </div><!-- .nk-block-head -->
                                <div class="nk-block">
                                    <div class="card">
                                        <div class="card-inner">
                                            <div class="row pb-5">
                                                <div class="col-lg-6">
                                                    <div class="product-gallery me-xl-1 me-xxl-5">
                                                        <div class="slider-init" id="sliderFor" data-slick='{"arrows": false, "fade": true, "asNavFor":"#sliderNav", "slidesToShow": 1, "slidesToScroll": 1}'>
                                                            <div class="slider-item rounded">
                                                                <img src="{{asset('storage/books/'. $book->cover_image)}}" class="rounded w-100" alt="">
                                                            </div>
                                                            {{-- <div class="slider-item rounded">
                                                                <img src="./images/product/lg-g.jpg" class="rounded w-100" alt="">
                                                            </div>
                                                            <div class="slider-item rounded">
                                                                <img src="./images/product/lg-d.jpg" class="rounded w-100" alt="">
                                                            </div>
                                                            <div class="slider-item rounded">
                                                                <img src="./images/product/lg-h.jpg" class="rounded w-100" alt="">
                                                            </div>
                                                            <div class="slider-item rounded">
                                                                <img src="./images/product/lg-e.jpg" class="rounded w-100" alt="">
                                                            </div> --}}
                                                        </div><!-- .slider-init -->
                                                        <div class="slider-init slider-nav" id="sliderNav" data-slick='{"arrows": false, "slidesToShow": 5, "slidesToScroll": 1, "asNavFor":"#sliderFor", "centerMode":true, "focusOnSelect": true,
                                "responsive":[ {"breakpoint": 1539,"settings":{"slidesToShow": 4}}, {"breakpoint": 768,"settings":{"slidesToShow": 3}}, {"breakpoint": 420,"settings":{"slidesToShow": 2}} ]
                            }'>
                                                            {{-- <div class="slider-item">
                                                                <div class="thumb">
                                                                    <img src="{{asset('storage/books/'. $book->cover_image)}}" class="rounded" alt="">
                                                                </div>
                                                            </div> --}}
                                                            {{-- <div class="slider-item">
                                                                <div class="thumb">
                                                                    <img src="./images/product/lg-g.jpg" class="rounded" alt="">
                                                                </div>
                                                            </div>
                                                            <div class="slider-item">
                                                                <div class="thumb">
                                                                    <img src="./images/product/lg-d.jpg" class="rounded" alt="">
                                                                </div>
                                                            </div>
                                                            <div class="slider-item">
                                                                <div class="thumb">
                                                                    <img src="./images/product/lg-h.jpg" class="rounded" alt="">
                                                                </div>
                                                            </div>
                                                            <div class="slider-item">
                                                                <div class="thumb">
                                                                    <img src="./images/product/lg-e.jpg" class="rounded" alt="">
                                                                </div>
                                                            </div> --}}
                                                        </div><!-- .slider-nav -->
                                                    </div><!-- .product-gallery -->
                                                </div><!-- .col -->
                                                <div class="col-lg-6">
                                                    <div class="product-info mt-5 me-xxl-5">
                                                        <h4 class="product-price text-primary">{{$book->category->name}}</h4>
                                                        <h2 class="product-title">{{$book->title}}</h2>
                                                        {{-- <div class="product-rating">
                                                            <ul class="rating">
                                                                <li><em class="icon ni ni-star-fill"></em></li>
                                                                <li><em class="icon ni ni-star-fill"></em></li>
                                                                <li><em class="icon ni ni-star-fill"></em></li>
                                                                <li><em class="icon ni ni-star-fill"></em></li>
                                                                <li><em class="icon ni ni-star-half"></em></li>
                                                            </ul>
                                                            <div class="amount">(2 Reviews)</div>
                                                        </div><!-- .product-rating --> --}}
                                                        <div class="product-meta">
                                                            <table class="table table-bordered">
                                                                <tbody>
                                                                    <tr>
                                                                        <th class="text-muted">Pengarang</th>
                                                                        <td class="fw-bold text-secondary">{{ $book->author }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th class="text-muted">Tahun</th>
                                                                        <td class="fw-bold text-secondary">{{ $book->year }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th class="text-muted">Penerbit</th>
                                                                        <td class="fw-bold text-secondary">{{ $book->publisher }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th class="text-muted">Bahasa</th>
                                                                        <td class="fw-bold text-secondary">{{ $book->language }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th class="text-muted">ISBN</th>
                                                                        <td class="fw-bold text-secondary">{{ $book->isbn }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th class="text-muted">Jumlah Tersedia</th>
                                                                        <td class="fw-bold text-secondary">{{ $book->quantity_total }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th class="text-muted">Dilihat</th>
                                                                        <td class="fw-bold text-secondary">{{ $book->viewers }}</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div><!-- .product-info -->
                                                </div><!-- .col -->
                                            </div><!-- .row -->
                                            <hr class="hr border-light">
                                            <div class="row g-gs flex-lg-row-reverse pt-5">
                                                <div class="col-lg-12">
                                                    <div class="product-details entry me-xxl-3">
                                                        <h3>Deskripsi Buku</h3>
                                                        {!!$book->description!!}
                                                    </div>
                                                </div><!-- .col -->
                                            </div><!-- .row -->
                                            <hr class="hr border-light">
                                            <div class="row g-gs flex-lg-row-reverse pt-5">
                                                <div class="col-lg-12">
                                                    <div class="product-details entry me-xxl-3">
                                                        <h3 class="mb-5">Data Peminjaman</h3>
                                                         <form action="{{route('dashboard.book.loans.store')}}" method="post" id="myForm">
                                                            @csrf
                                                            <div class="row gy-4">
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <label class="form-label required-field" for="book_id">Buku</label>
                                                                        <div class="form-control-wrap">
                                                                            <input type="text" class="form-control" id="book_name" name="book_name" value="{{ $book->title }}" readonly>
                                                                            <input type="hidden" class="form-control" id="book_id" name="book_id" value="{{ encrypt_id($book->id) }}">
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
                                                                            <input type="text" class="form-control" id="borrower" name="borrower" value="{{ Auth::user()->name }}" readonly>
                                                                            <input type="hidden" class="form-control" id="borrower_id" name="borrower_id" value="{{ encrypt_id(Auth::user()->id) }}">
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
                                                                            <input type="date" class="form-control" name="loan_date" value="{{date('Y-m-d')}}" readonly>
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
                                                                            <input type="date" class="form-control" name="due_date" value="{{now()->addDays(7)->format('Y-m-d')}}" readonly>
                                                                        </div>
                                                                    </div>
                                                                    @error('due_date')
                                                                            <span class="error-message">{{ $message }}</span>
                                                                        @enderror
                                                                </div>
                                                                <div class="col-sm-12">
                                                                    <div class="form-group">
                                                                        <label class="form-label" for="notes">Catatan</label>
                                                                        <div class="form-control-wrap">
                                                                            <textarea class="form-control no-resize" id="notes" name="notes">{{ old('notes') }}</textarea>
                                                                        </div>
                                                                        @error('notes')
                                                                            <span class="error-message">{{ $message }}</span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 text-end mt-5">
                                                                    <button type="submit" class="btn btn-md btn-primary" id="submitButton">Pinjam</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div><!-- .col -->
                                            </div><!-- .row -->
                                        </div>
                                    </div>
                                </div><!-- .nk-block -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content @e -->
@include('partials.dashboard.footer', ['datatable' => false])
