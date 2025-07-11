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
                                                        <li class="nk-block-tools-opt"><a href="{{route('dashboard.books.index')}}" class="btn btn-white btn-dim btn-outline-light"><em class="icon ni ni-arrow-left"></em><span>Kembali</span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div><!-- .nk-block-head-content -->
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
                                <div class="nk-block nk-block-lg">
                                    <div class="card card-bordered card-preview">
                                        <div class="card-inner">
                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $message)
                                                            <li>{{ $message }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                            <div class="preview-block">
                                                {{-- <span class="preview-title-lg overline-title">Default Preview</span> --}}
                                                <form action="{{route('dashboard.books.update', ['id' => encrypt_id($book->id)])}}" method="post" id="myForm" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('put')
                                                    <div class="row gy-4">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="form-label required-field" for="title">Nama</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="title" placeholder="Contoh: Psikologi Perkembangan Anak" name="title" value="{{ $book->title }}">
                                                                </div>
                                                                @error('title')
                                                                    <span class="error-message">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="form-label required-field" for="author">Pengarang</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="author" placeholder="Contoh: Dr. Aulia Rahman" name="author" value="{{ $book->author }}">
                                                                </div>
                                                                @error('author')
                                                                    <span class="error-message">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="form-label required-field" for="publisher">Penerbit</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="publisher" placeholder="Contoh: Gramedia Pustaka Utama" name="publisher" value="{{ $book->publisher }}">
                                                                </div>
                                                                @error('publisher')
                                                                    <span class="error-message">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="form-label required-field" for="year">Tahun</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="year" placeholder="Contoh: 2023" name="year" value="{{ $book->year }}">
                                                                </div>
                                                                @error('year')
                                                                    <span class="error-message">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="form-label required-field">Kategori</label>
                                                                <div class="form-control-wrap">
                                                                    <select class="form-select js-select2" data-search="on" name="category_id">
                                                                        <option value="placeholder" selected disabled>Pilih Kategori</option>
                                                                        @foreach ($bookCategories as $category)
                                                                        <option value="{{ encrypt_id($category->id) }}" @selected($book->category_id && $category->id === $book->category_id)>{{ $category->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                @error('category_id')
                                                                        <span class="error-message">{{ $message }}</span>
                                                                    @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="form-label required-field" for="isbn">ISBN</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="isbn" placeholder="Contoh: 978-623-1234-567-8" name="isbn" value="{{ $book->isbn }}">
                                                                </div>
                                                                @error('isbn')
                                                                    <span class="error-message">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="form-label required-field" for="language">Bahasa</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="language" placeholder="Contoh: Indonesia" name="language" value="{{ $book->language }}">
                                                                </div>
                                                                @error('language')
                                                                    <span class="error-message">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="form-label required-field" for="quantity_total">Jumlah</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="quantity_total" placeholder="Contoh: 13" name="quantity_total" value="{{ $book->quantity_total }}">
                                                                </div>
                                                                @error('quantity_total')
                                                                    <span class="error-message">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="form-label">Sampul</label>
                                                                <div class="form-control-wrap">
                                                                    <div class="form-file">
                                                                        <input type="file" class="form-file-input" id="cover_image" name="cover_image">
                                                                        <label class="form-file-label" for="cover_image">Choose file</label>
                                                                    </div>
                                                                </div>
                                                                @error('cover_image')
                                                                    <span class="error-message">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label class="form-label" for="description">Deskripsi</label>
                                                                <div class="form-control-wrap">
                                                                    <textarea class="form-control no-resize" id="description" name="description">{{ $book->description }}</textarea>
                                                                </div>
                                                                @error('description')
                                                                    <span class="error-message">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 text-end mt-5">
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
