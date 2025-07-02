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
                                                        <li class="nk-block-tools-opt"><a href="{{route('dashboard.users.create')}}" class="btn btn-primary"><em class="icon ni ni-plus"></em><span>Tambah</span></a></li>
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
                                                <table class="table table-striped table-bordered nowrap" id="userTable" border="1">
                                                    <thead>
                                                        <tr>
                                                            <th style="width: 10% !important;">No</th>
                                                            <th>Nama</th>
                                                            <th>Email</th>
                                                            <th>Hak Akses</th>
                                                            <th>Status</th>
                                                            <th style="width: 10% !important;"></th>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="modalFilter">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Filter</h5>
                                                <a href="javascript:void(0);" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                    <em class="icon ni ni-cross"></em>
                                                </a>
                                            </div>
                                            <form action="{{route('dashboard.users.index')}}" class="form-validate is-alter" method="get">
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label class="form-label" for="name">Nama Pengguna</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control" id="name" placeholder="Contoh: Yuki" name="name">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label">Role/Hak Akses</label>
                                                        <div class="form-control-wrap">
                                                            <select class="form-select js-select2" name="role">
                                                                <option value="all" @selected(isset($role) && $role === 'all')>Semua</option>
                                                                @foreach ($roles as $item)
                                                                <option value="{{encrypt_id($item->id)}}" @selected(isset($role) && $role === encrypt_id($item->id))>{{$item->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label">Status</label>
                                                        <div class="form-control-wrap">
                                                            <select class="form-select js-select2" name="status">
                                                                <option value="all" @selected(isset($status) && $status === 'all')>Semua</option>
                                                                <option value="active" @selected(isset($status) && $status === 'active')>Aktif</option>
                                                                <option value="nonactive" @selected(isset($status) && $status === 'nonactive')>Nonaktif</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer bg-light">
                                                    <span class="sub-text">
                                                        <button type="submit" class="btn btn-sm btn-primary">Filter</button>
                                                    </span>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content @e -->
@include('partials.dashboard.footer', ['datatable' => true])
