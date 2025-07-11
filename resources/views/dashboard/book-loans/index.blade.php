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
                                                        <li class="nk-block-tools-opt"><a href="{{route('dashboard.book.loans.create')}}" class="btn btn-primary"><em class="icon ni ni-plus"></em><span>{{is_role(['1']) ? 'Pinjam' : 'Tambah Peminjam'}}</span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div><!-- .nk-block-head-content -->
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
                                <div class="nk-block nk-block-lg">
                                    <div class="card card-bordered card-preview">
                                        <div class="card-inner">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered nowrap" id="bookLoanTable" border="1">
                                                    <thead>
                                                        <tr>
                                                            <th style="width: 5%;">No</th>
                                                            <th>Judul Buku</th>
                                                            <th>Peminjam</th>
                                                            <th>Tanggal Pinjam</th>
                                                            <th>Tanggal Wajib Kembali</th>
                                                            <th>Status Permohonan Peminjaman</th>
                                                            <th>Status Peminjaman</th>
                                                            <th style="width: 10% !important;"></th>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content @e -->
@include('partials.dashboard.footer', ['datatable' => true])
