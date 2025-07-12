<!doctype html>
<html class="no-js" lang="en">
    <head>
        <title>Waska Library</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="author" content="ThemeZaa">
        <meta name="viewport" content="width=device-width,initial-scale=1.0" />
        <meta name="description" content="Elevate your online presence with Crafto - a modern, versatile, multipurpose Bootstrap 5 responsive HTML5, SCSS template using highly creative 48+ ready demos.">
        <!-- favicon icon -->
        <link rel="shortcut icon" href="{{asset('assets/global/waska-library-logo-only.png')}}">
        <link rel="apple-touch-icon" href="{{asset('assets/global/waska-library-logo-only.png')}}">
        <link rel="apple-touch-icon" sizes="72x72" href="{{asset('assets/global/waska-library-logo-only.png')}}">
        <link rel="apple-touch-icon" sizes="114x114" href="{{asset('assets/global/waska-library-logo-only.png')}}">
        <!-- google fonts preconnect -->
        <link rel="preconnect" href="https://fonts.googleapis.com" crossorigin>
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <!-- style sheets and font icons  -->
        <link rel="stylesheet" href="{{asset('assets/landing/css/vendors.min.css')}}"/>
        <link rel="stylesheet" href="{{asset('assets/landing/css/icon.min.css')}}"/>
        <link rel="stylesheet" href="{{asset('assets/landing/css/style.css')}}"/>
        <link rel="stylesheet" href="{{asset('assets/landing/css/responsive.css')}}"/>
        <link rel="stylesheet" href="{{asset('assets/landing/demos/hosting/hosting.css')}}" />
    </head>
    <body data-mobile-nav-style="full-screen-menu" data-mobile-nav-bg-color="">
        <!-- start header -->
        <header class="header-with-topbar">
            {{-- <div class="header-top-bar top-bar-dark cover-background" style="background-image: url('{{asset('assets/landing/images/demo-hosting-header-bg.jpg')}}')">
                <div class="container-fluid">
                    <div class="row h-42px align-items-center m-0">
                        <div class="col-md-7 text-center text-md-start">
                            <div class="fs-13 text-white"><span class="opacity-6 me-5px">Pusat Informasi dan Manajemen Koleksi Buku</div>
                        </div>
                        <div class="col-5 text-end d-none d-md-flex">
                            <a href="javascript: void(0);" class="widget fs-13 text-white text-white-hover opacity-8"><i class="feather icon-feather-mail text-white position-relative top-1px"></i>waskalibrary@wastukancana.ac.id</a>
                        </div>
                    </div>
                </div>
            </div> --}}
            <!-- start navigation -->
            <nav class="navbar navbar-expand-lg mini-header header-light bg-white header-reverse header-demo glass-effect" data-header-hover="light">
                <div class="container-lg">
                    <div class="col-auto me-auto ps-lg-0">
                        <a class="navbar-brand" href="index.html">
                            <img src="{{asset('assets/landing/images/waska-lib-logo.png')}}" data-at2x="{{asset('assets/landing/images/waska-lib-logo.png')}}" alt="" class="default-logo">
                            <img src="{{asset('assets/landing/images/waska-lib-logo.png')}}" data-at2x="{{asset('assets/landing/images/waska-lib-logo.png')}}" alt="" class="alt-logo">
                            <img src="{{asset('assets/landing/images/waska-lib-logo.png')}}" data-at2x="{{asset('assets/global/waska-library-logo.png')}}" alt="" class="mobile-logo">
                        </a>
                    </div>
                    <div class="col-auto menu-order position-static">
                        <button class="navbar-toggler float-start" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-label="Toggle navigation">
                            <span class="navbar-toggler-line"></span>
                            <span class="navbar-toggler-line"></span>
                            <span class="navbar-toggler-line"></span>
                            <span class="navbar-toggler-line"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a href="{{route('login')}}" class="nav-link">Masuk</a>
                                    <i class="fa-solid fa-angle-down" role="button" aria-expanded="false"></i>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('register')}}" class="nav-link">Daftar</a>
                                    <i class="fa-solid fa-angle-down" role="button" aria-expanded="false"></i>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- end navigation -->
        </header>
        <!-- end header -->
        <!-- start banner -->
        <section class="cover-background full-screen bg-dark-gray ipad-top-space-margin position-relative section-dark md-h-auto" style="background-image: url('{{asset('assets/landing/images/hero-library.jpg')}}')">
            <div id="particles-style-01" class="h-100 position-absolute left-0px top-0 w-100" data-particle="true" data-particle-options='{"particles": {"number": {"value": 12,"density": {"enable": true,"value_area": 2000}},"color": {"value": ["#ed00a8", "#ed00a8", "#ed00a8", "#ed00a8"]},"shape": {"type": "edge","stroke":{"width":0,"color":"#000000"}},"opacity": {"value": 0.8,"random": false,"anim": {"enable": false,"speed": 1,"sync": false}},"size": {"value": 5,"random": true,"anim": {"enable": false,"sync": true}},"line_linked":{"enable":false,"distance":0,"color":"#ffffff","opacity":0.4,"width":1},"move": {"enable": true,"speed":1,"direction": "right","random": false,"straight": false}},"interactivity": {"detect_on": "canvas","events": {"onhover": {"enable": false,"mode": "repulse"},"onclick": {"enable": false,"mode": "push"},"resize": true}},"retina_detect": false}'></div>
            <div class="container d-flex align-items-center justify-content-center h-100">
                <div class="row align-items-center justify-content-center w-100">
                    <div class="col-xl-7 col-lg-8 col-md-10 text-white text-center">
                        <div class="fs-90 fw-600 mb-20px">
                            <div class="d-inline-block">
                                Waska Library
                            </div>
                        </div>
                        <div class="fs-20 fw-400 mb-30px w-80 mx-auto opacity-7">
                            Aplikasi Perpustakaan Digital STT Wastukancana
                        </div>
                        <div class="overflow-hidden pt-30px">
                            <a href="{{Auth::check() ? route('dashboard.overview') : route('login')}}" class="btn btn-extra-large fw-600 btn-rounded with-rounded btn-white btn-box-shadow d-table d-lg-inline-block lg-mb-15px md-mx-auto">{{Auth::check() ? 'Dasbor' : 'Masuk'}}<span class="text-white" style="background-color: #665223;"><i class="fa-solid fa-arrow-right"></i></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end banner -->
        <!-- start footer -->
        <footer class="footer-dark bg-dark-blue pb-0 cover-background background-position-left-top" style="background-image: url('images/demo-hosting-footer-bg.jpg')">
            <div class="container">
                <div class="row justify-content-center mb-5 md-mb-8 sm-mb-40px">
                    <!-- start footer column -->
                    <div class="col-6 col-lg-3 last-paragraph-no-margin order-sm-1 md-mb-40px xs-mb-30px">
                        <a href="demo-hosting.html" class="footer-logo mb-15px d-inline-block"><img src="images/demo-hosting-logo-white.png" data-at2x="images/demo-hosting-logo-white@2x.png" alt=""></a>
                        <p class="w-90 lg-w-100">Lorem ipsum amet adipiscing elit to eiusmod ad tempor incididunt enim.</p>
                        <div class="elements-social social-icon-style-02 mt-20px xs-mt-15px">
                            <ul class="small-icon light">
                                <li class="my-0"><a class="facebook" href="https://www.facebook.com/" target="_blank"><i class="fa-brands fa-facebook-f"></i></a></li>
                                <li class="my-0"><a class="dribbble" href="http://www.dribbble.com" target="_blank"><i class="fa-brands fa-dribbble"></i></a></li>
                                <li class="my-0"><a class="twitter" href="http://www.twitter.com" target="_blank"><i class="fa-brands fa-twitter"></i></a></li>
                                <li class="my-0"><a class="instagram" href="http://www.instagram.com" target="_blank"><i class="fa-brands fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- end footer column -->
                    <!-- start footer column -->
                    <div class="col-6 col-lg-2 col-sm-4 xs-mb-30px order-sm-3 order-lg-2">
                        <span class="fs-17 fw-500 d-block text-white mb-5px">Company</span>
                        <ul>
                            <li><a href="demo-hosting-about.html">About</a></li>
                            <li><a href="demo-hosting-hosting.html">Hosting</a></li>
                            <li><a href="demo-hosting-domain.html">Domain</a></li>
                            <li><a href="demo-hosting-pricing.html">Pricing</a></li>
                        </ul>
                    </div>
                    <!-- end footer column -->
                    <!-- start footer column -->
                    <div class="col-6 col-lg-2 col-sm-4 xs-mb-30px order-sm-4 order-lg-3">
                        <span class="fs-17 fw-500 d-block text-white mb-5px">Customer</span>
                        <ul>
                            <li><a href="demo-hosting-support.html">Client support</a></li>
                            <li><a href="demo-hosting-support.html">Help center</a></li>
                            <li><a href="demo-hosting-about.html">System status</a></li>
                            <li><a href="demo-hosting-contact.html">Feedback</a></li>
                        </ul>
                    </div>
                    <!-- end footer column -->
                    <!-- start footer column -->
                    <div class="col-6 col-lg-2 col-sm-4 xs-mb-30px order-sm-5 order-lg-4">
                        <span class="fs-17 fw-500 d-block text-white mb-5px">Say hello</span>
                        <span class="d-inline-flex w-100">Need support?</span>
                        <a href="mailto:hi@domain.com" class="text-white lh-22 text-decoration-line-bottom d-inline-block mb-20px">hi@domain.com</a>
                        <span class="d-inline-flex w-100">Customer care</span>
                        <a href="tel:12345678910" class="text-white lh-22 d-inline-flex">+1 234 567 8910</a>
                    </div>
                    <!-- end footer column -->
                    <!-- start footer column -->
                    <div class="col-lg-3 col-sm-6 ps-30px sm-ps-15px md-mb-40px xs-mb-0 order-sm-2 order-lg-5">
                        <span class="fs-17 fw-500 d-block text-white mb-5px">Subscribe our newsletter</span>
                        <p class="mb-20px">Subscribe our newsletter to get the latest news and updates!</p>
                        <div class="d-inline-block w-100 newsletter-style-02 position-relative mb-15px">
                            <form action="email-templates/subscribe-newsletter.php" method="post" class="position-relative w-100">
                                <input class="input-small bg-transparent-white-light fs-14 border-color-transparent w-100 form-control pe-50px ps-20px lg-ps-15px required" type="email" name="email" placeholder="Enter your email" />
                                <input type="hidden" name="redirect" value="">
                                <button class="btn pe-20px submit" aria-label="submit"><i class="icon bi bi-envelope icon-small text-white"></i></button>
                                <div class="form-results border-radius-4px pt-5px pb-5px ps-15px pe-15px fs-14 lh-22 mt-10px w-100 text-center position-absolute d-none"></div>
                            </form>
                        </div>
                        <div class="footer-card">
                            <a href="#" class="d-inline-block me-5px xxl-me-0 align-middle"><img src="https://via.placeholder.com/55x20" alt=""></a>
                            <a href="#" class="d-inline-block me-5px xxl-me-0 align-middle"><img src="https://via.placeholder.com/55x20" alt=""></a>
                            <a href="#" class="d-inline-block me-5px xxl-me-0 align-middle"><img src="https://via.placeholder.com/55x20" alt=""></a>
                            <a href="#" class="d-inline-block me-5px xxl-me-0 align-middle"><img src="https://via.placeholder.com/55x20" alt=""></a>
                        </div>
                    </div>
                    <!-- end footer column -->
                </div>
                <div class="border-top border-color-transparent-white-light pt-35px pb-35px text-center">
                    <span class="fs-13 w-60 lg-w-70 md-w-100 d-block mx-auto lh-22">This site is protected by reCAPTCHA and the Google <a href="#" class="text-white text-decoration-line-bottom">privacy policy</a> and <a href="#" class="text-white text-decoration-line-bottom">terms of service</a> apply. You must not use this website if you disagree with any of these website standard terms and conditions.</span>
                </div>
            </div>
        </footer>
        <!-- end footer -->
        <!-- start sticky elements -->
        <div class="sticky-wrap z-index-1 d-none d-xl-inline-block" data-animation-delay="100" data-shadow-animation="true">
            <div class="elements-social social-icon-style-10">
                <ul class="fs-14">
                    <li class="me-30px"><a class="facebook" href="https://www.facebook.com/" target="_blank">
                            <i class="fa-brands fa-facebook-f me-10px"></i>
                            <span class="alt-font">Facebook</span>
                        </a>
                    </li>
                    <li class="me-30px">
                        <a class="dribbble" href="http://www.dribbble.com" target="_blank">
                            <i class="fa-brands fa-dribbble me-10px"></i>
                            <span class="alt-font">Dribbble</span>
                        </a>
                    </li>
                    <li class="me-30px">
                        <a class="twitter" href="http://www.twitter.com" target="_blank">
                            <i class="fa-brands fa-twitter me-10px"></i>
                            <span class="alt-font">Twitter</span>
                        </a>
                    </li>
                    <li>
                        <a class="instagram" href="http://www.instagram.com" target="_blank">
                            <i class="fa-brands fa-instagram me-10px"></i>
                            <span class="alt-font">Instagram</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- end sticky elements -->
         <!-- start scroll progress -->
        <div class="scroll-progress d-none d-xxl-block">
          <a href="#" class="scroll-top" aria-label="scroll">
            <span class="scroll-text">Scroll</span><span class="scroll-line"><span class="scroll-point"></span></span>
          </a>
        </div>
        <!-- end scroll progress -->
        <!-- javascript libraries -->
        <script type="text/javascript" src="{{asset('assets/landing/js/jquery.js')}}"></script>
        <script type="text/javascript" src="{{asset('assets/landing/js/vendors.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('assets/landing/js/main.js')}}"></script>
    </body>
</html>
