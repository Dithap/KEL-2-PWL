@include('partials.dashboard.head')

<body class="nk-body bg-white npc-default pg-auth">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- wrap @s -->
            <div class="nk-wrap nk-wrap-nosidebar">
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="nk-split nk-split-page nk-split-md">
                        <div class="nk-split-content nk-block-area nk-block-area-column nk-auth-container bg-white">
                            <div class="nk-block nk-block-middle nk-auth-body">
                                <div class="brand-logo pb-5">
                                    <a href="javascript: void(0);" class="logo-link">
                                        <img class="logo-light logo-img logo-img-lg" src="{{asset('assets/global/waska-library-logo.png')}}" srcset="{{asset('assets/global/waska-library-logo.png')}}" alt="logo">
                                        <img class="logo-dark logo-img logo-img-lg" src="{{asset('assets/global/waska-library-logo.png')}}" srcset="{{asset('assets/global/waska-library-logo.png')}}" alt="logo-dark">
                                    </a>
                                </div>
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <h5 class="nk-block-title">Daftar</h5>
                                        <div class="nk-block-des">
                                            <p>Daftar akun untuk mengakses panel dashboard.</p>
                                        </div>
                                    </div>
                                </div><!-- .nk-block-head -->
                                <form action="{{route('register.action')}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="name">Nama</label>
                                        </div>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control form-control-lg" id="name" placeholder="Nama" name="name" value="{{old('name')}}">
                                        </div>
                                        @error('name')
                                        <span class="error-message">{{$message}}</span>
                                        @enderror
                                    </div><!-- .form-group -->
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="email">Email</label>
                                        </div>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control form-control-lg" id="email" placeholder="Email" name="email" value="{{old('email')}}">
                                        </div>
                                        @error('email')
                                        <span class="error-message">{{$message}}</span>
                                        @enderror
                                    </div><!-- .form-group -->
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="phone_number">Nomor Telepon</label>
                                        </div>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control form-control-lg" id="phone_number" placeholder="Nomor Telepon" name="phone_number" value="{{old('phone_number')}}">
                                        </div>
                                        @error('phone_number')
                                        <span class="error-message">{{$message}}</span>
                                        @enderror
                                    </div><!-- .form-group -->
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="password">Password</label>
                                        </div>
                                        <div class="form-control-wrap">
                                            <input type="password" class="form-control form-control-lg" id="password" placeholder="Password" name="password">
                                        </div>
                                        @error('password')
                                        <span class="error-message">{{$message}}</span>
                                        @enderror
                                    </div><!-- .form-group -->
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="password_confirmation">Ulangi Password</label>
                                        </div>
                                        <div class="form-control-wrap">
                                            <input type="password" class="form-control form-control-lg" id="password_confirmation" placeholder="Ulangi Password" name="password_confirmation">
                                        </div>
                                        @error('password_confirmation')
                                        <span class="error-message">{{$message}}</span>
                                        @enderror
                                    </div><!-- .form-group -->
                                    <div class="form-group mt-5">
                                        <button class="btn btn-lg btn-primary btn-block">Daftar</button>
                                    </div>
                                </form><!-- form -->
                                <div class="text-center mt-5">
                                    <span class="fw-500">Belum memiliki akun? <a href="#">Daftar</a></span>
                                </div>
                            </div><!-- .nk-block -->
                            {{-- <div class="nk-block nk-auth-footer">
                                <div class="mt-3 text-center">
                                    <p>&copy; {{date('Y')}}. Kelompok 02.</p>
                                </div>
                            </div><!-- .nk-block --> --}}
                        </div><!-- .nk-split-content -->
                        <div class="nk-split-content nk-split-stretch bg-abstract"></div><!-- nk-split-content -->
                    </div><!-- .nk-split -->
                </div>
                <!-- wrap @e -->
            </div>
            <!-- content @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
    <!-- JavaScript -->
    <script src="{{asset('assets/dashboard/js/bundle.js?ver=3.0.3')}}"></script>
    <script src="{{asset('assets/dashboard/js/scripts.js?ver=3.0.3')}}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

    @include('partials.app.sweetalert')
</body>

</html>
