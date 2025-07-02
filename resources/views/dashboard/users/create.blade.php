@include('partials.dashboard.head')
@include('partials.dashboard.sidebar', ['page' => 'users'])
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
                                                        <li class="nk-block-tools-opt"><a href="{{route('dashboard.users.index')}}" class="btn btn-white btn-dim btn-outline-light"><em class="icon ni ni-arrow-left"></em><span>Kembali</span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div><!-- .nk-block-head-content -->
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
                                <div class="nk-block nk-block-lg">
                                    <div class="card card-bordered card-preview">
                                        <div class="card-inner">
                                            <div class="preview-block">
                                                {{-- <span class="preview-title-lg overline-title">Default Preview</span> --}}
                                                <form action="{{route('dashboard.users.store')}}" method="post" id="myForm">
                                                    @csrf
                                                    <div class="row gy-4">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="form-label required-field" for="name">Nama</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="name" placeholder="Contoh: Ditha" name="name" value="{{ old('name') }}">
                                                                </div>
                                                                @error('name')
                                                                    <span class="error-message">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="form-label required-field" for="email">Email</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="email" placeholder="Contoh: Ditha@gmail.com" name="email" value="{{ old('email') }}">
                                                                </div>
                                                                @error('email')
                                                                    <span class="error-message">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="form-label required-field" for="phone_number">Nomor Telepon</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="phone_number" placeholder="Contoh: 0812345679" name="phone_number" value="{{ old('phone_number') }}">
                                                                </div>
                                                                @error('phone_number')
                                                                    <span class="error-message">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="form-label required-field">Hak Akses</label>
                                                                <div class="form-control-wrap">
                                                                    <select class="form-select js-select2" name="role_id">
                                                                        <option value="placeholder" disabled {{ old('role_id') == 'placeholder' ? 'selected' : '' }}>Pilih Hak Akses</option>
                                                                        @foreach ($roles as $item)
                                                                        <option value="{{$item->id}}" {{ old('role_id') == $item->id ? 'selected' : '' }}>{{$item->name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                @error('role_id')
                                                                    <span class="error-message">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="form-label required-field" for="password">Password</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="password" class="form-control" id="password" placeholder="Contoh: Rahasia123!" name="password">
                                                                </div>
                                                                @error('password')
                                                                    <span class="error-message">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="form-label required-field" for="password_confirmation">Ulangi Password</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="password" class="form-control" id="password_confirmation" placeholder="Ketik ulang password" name="password_confirmation">
                                                                </div>
                                                                @error('password_confirmation')
                                                                    <span class="error-message">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 text-end mt-5">
                                                            <a href="{{ route('dashboard.users.create') }}" class="btn btn-md btn-warning mx-2">Reset</a>
                                                            <button type="submit" class="btn btn-md btn-primary" id="submitButton">Tambah</button>
                                                        </div>
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
