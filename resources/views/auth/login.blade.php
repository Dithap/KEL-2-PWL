<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <base href="../../../">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="{{asset('assets/global/waska-library-logo-only.png')}}">
    <!-- Page Title  -->
    <title>{{$page_title}} - Waska Library</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="{{asset('assets/dashboard/css/dashlite.css?ver=3.0.3')}}">
    <link id="skin-default" rel="stylesheet" href="{{asset('assets/dashboard/css/theme.css?ver=3.0.3')}}">
    <link rel="stylesheet" href="{{asset('assets/dashboard/css/custom.css')}}">
</head>

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
                                    <a href="html/index.html" class="logo-link">
                                        <img class="logo-light logo-img logo-img-lg" src="{{asset('assets/global/waska-library-logo.png')}}" srcset="{{asset('assets/global/waska-library-logo.png')}}" alt="logo">
                                        <img class="logo-dark logo-img logo-img-lg" src="{{asset('assets/global/waska-library-logo.png')}}" srcset="{{asset('assets/global/waska-library-logo.png')}}" alt="logo-dark">
                                    </a>
                                </div>
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <h5 class="nk-block-title">Masuk</h5>
                                        <div class="nk-block-des">
                                            <p>Akses panel menggunakan username dan password.</p>
                                        </div>
                                    </div>
                                </div><!-- .nk-block-head -->
                                <form action="#">
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="username">Username</label>
                                        </div>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control form-control-lg" id="username" placeholder="Username">
                                        </div>
                                    </div><!-- .form-group -->
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="password">Password</label>
                                        </div>
                                        <div class="form-control-wrap">
                                            <a tabindex="-1" href="#" class="form-icon form-icon-right passcode-switch lg" data-target="password">
                                                <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                                <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                            </a>
                                            <input type="password" class="form-control form-control-lg" id="password" placeholder="Password">
                                        </div>
                                    </div><!-- .form-group -->
                                    <div class="form-group">
                                        <button class="btn btn-lg btn-primary btn-block">Sign in</button>
                                    </div>
                                </form><!-- form -->
                                <div class="text-center mt-5">
                                    <span class="fw-500">Belum memiliki akun? <a href="#">Daftar</a></span>
                                </div>
                            </div><!-- .nk-block -->
                            <div class="nk-block nk-auth-footer">
                                <div class="mt-3 text-center">
                                    <p>&copy; {{date('Y')}}. Kelompok 02.</p>
                                </div>
                            </div><!-- .nk-block -->
                        </div><!-- .nk-split-content -->
                        <div class="nk-split-content nk-split-stretch login-background" style="background-image: url('{{ asset('assets/global/book-shelf-2.jpg') }}');">

                            {{-- <img src="{{asset('assets/global/book-shelf-2.jpg')}}" style="height: ;"> --}}
                        </div><!-- .nk-split-content -->
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
</body>

</html>
