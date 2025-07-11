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
                                                        <div class="product-meta">
                                                            <ul class="d-flex flex-wrap ailgn-center g-2 pt-1">
                                                                {{-- <li class="w-140px">
                                                                    <div class="form-control-wrap number-spinner-wrap">
                                                                        <button class="btn btn-icon btn-outline-light number-spinner-btn number-minus" data-number="minus"><em class="icon ni ni-minus"></em></button>
                                                                        <input type="number" class="form-control number-spinner" value="0">
                                                                        <button class="btn btn-icon btn-outline-light number-spinner-btn number-plus" data-number="plus"><em class="icon ni ni-plus"></em></button>
                                                                    </div>
                                                                </li> --}}
                                                                <li>
                                                                    <button class="btn btn-primary">Pinjam</button>
                                                                </li>
                                                                <li class="ms-n1">
                                                                    <button class="btn btn-icon btn-trigger text-primary"><em class="icon ni ni-heart"></em></button>
                                                                </li>
                                                            </ul>
                                                        </div><!-- .product-meta -->
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
                                        </div>
                                    </div>
                                </div><!-- .nk-block -->
                                <div class="nk-block nk-block-lg">
                                    <div class="nk-block-head">
                                        <div class="nk-block-between g-3">
                                            <div class="nk-block-head-content">
                                                <h3 class="nk-block-title page-title">Kamu Mungkin Ingin Membaca</h3>
                                            </div>
                                        </div>
                                    </div><!-- .nk-block-head -->
                                    <div class="slider-init row" data-slick='{"slidesToShow": 4, "centerMode": false, "slidesToScroll": 1, "infinite":false, "responsive":[ {"breakpoint": 1540,"settings":{"slidesToShow": 3}},{"breakpoint": 992,"settings":{"slidesToShow": 2}}, {"breakpoint": 576,"settings":{"slidesToShow": 1}} ]}'>
                                        @foreach ($relatedBooks as $relatedBook)
                                        <div class="col">
                                            <div class="card card-bordered product-card">
                                                <div class="product-thumb">
                                                    <a href="{{route('dashboard.books.show', ['id' => encrypt_id($relatedBook->id)])}}">
                                                        <img class="card-img-top" src="{{asset('storage/books/'. $relatedBook->cover_image)}}" alt="">
                                                    </a>
                                                    <ul class="product-badges">
                                                        <li><span class="badge bg-success">{{$relatedBook->category->name}}</span></li>
                                                    </ul>
                                                    <ul class="product-actions">
                                                        <li><a href="#"><em class="icon ni ni-cart"></em></a></li>
                                                        <li><a href="#"><em class="icon ni ni-heart"></em></a></li>
                                                    </ul>
                                                </div>
                                                <div class="card-inner text-center">
                                                    <ul class="product-tags">
                                                        <li><a href="#">{{$relatedBook->author}}</a></li>
                                                    </ul>
                                                    <h5 class="product-title"><a href="{{route('dashboard.books.show', ['id' => encrypt_id($relatedBook->id)])}}">{{shorten_text($relatedBook->title, 30)}}</a></h5>
                                                    <div class="product-price text-primary h5"><small class="text-muted del fs-13px">$350</small> $324</div>
                                                </div>
                                            </div>
                                        </div><!-- .col -->
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content @e -->
@include('partials.dashboard.footer', ['datatable' => false])
