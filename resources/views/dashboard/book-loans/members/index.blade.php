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
                                                        <li>
                                                            <div class="drodown">
                                                                <a href="javascript: void(0);" class="btn btn-white btn-dim btn-outline-light"  data-bs-toggle="modal" data-bs-target="#modalFilter"><em class="d-none d-sm-inline icon ni ni-filter"></em><span>Filter</span></a>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div><!-- .nk-block-head-content -->
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
                                <div class="nk-block nk-block-lg">
                                    <div class="card card-bordered card-preview">
                                        <div class="card-inner">
                                            <div class="row">
                                                @foreach ($books as $book)
                                                    <div class="col-md-4 col-sm-5 mb-4">
                                                        <div class="card product-card">
                                                            <div class="product-thumb">
                                                                <a href="{{route('dashboard.books.show', ['id' => encrypt_id($book->id)])}}">
                                                                    <img class="card-img-top book-cover" src="{{asset('storage/books/'.$book->cover_image)}}" alt="">
                                                                </a>
                                                                <ul class="product-badges">
                                                                    <li><span class="badge bg-success">{{$book->category->name}}</span></li>
                                                                </ul>
                                                            </div>
                                                            <div class="card-inner text-center">
                                                                <ul class="product-tags">
                                                                    <li><a href="#">{{$book->author}}</a></li>
                                                                </ul>
                                                                <h5 class="product-title"><a href="{{route('dashboard.book.categories.show', ['id' => encrypt_id($book->id)])}}">{{shorten_text($book->title, 30)}}</a></h5>
                                                                <div class="product-price text-primary h5"><small class="text-muted fs-13px">{{idn_date(get_loan($book->id, Auth::user()->id)['loan_date'], 'd F Y')}} - {{idn_date(get_loan($book->id, Auth::user()->id)['due_date'], 'd F Y')}}</small></div>
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
                    </div>
                </div>
                <!-- content @e -->
@include('partials.dashboard.footer', ['datatable' => false])
