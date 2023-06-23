<!DOCTYPE html>
<html class="no-js" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}"
    lang="{{ LaravelLocalization::getCurrentLocale() }}">
{{-- <html class="no-js"  lang="zxx"> --}}

<head>
    @php
        $setting = App\Models\Setting::checkSettings();
    @endphp
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>{{ $title }}</title>
    <meta name="description" content="" />
    {{-- <meta name="viewport" content="width=device-width, initial-scale=1" /> --}}
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="{{ $setting->favicon_url }}" />

    <!-- ========================= CSS here ========================= -->
    <link rel="stylesheet" href="{{ asset('assets/css/LineIcons.3.0.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/tiny-slider.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/glightbox.min.css') }}" />
    @if (LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
        <link rel="stylesheet" href="{{ asset('assets/css/main_Rtl.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap_Rtl.min.css') }}" />
    @endif
    @if (LaravelLocalization::getCurrentLocaleDirection() == 'ltr')
        <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    @endif
    @stack('styles')
</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- /End Preloader -->

    <!-- Start Header Area -->
    <header class="header navbar-area">
        <!-- Start Topbar -->
        <div class="topbar">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="top-left">
                            <ul class="menu-top-link">
                                <li>
                                    <div class="select-position">
                                        <select name="locale" onchange="location =  this.value">
                                            @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                                <option
                                                    value="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
                                                    @selected($localeCode == App::currentLocale())>
                                                    {{ $properties['native'] }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="top-middle">
                            <ul class="useful-links">
                                <li><a href="{{ route('home') }}">{{ trans('Messages.home') }}</a></li>
                                <li><a href="{{ route('about') }}">{{ trans('Messages.about us') }}</a></li>
                                <li><a href="{{ route('contactUs') }}">{{ trans('Messages.contact us') }}</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="top-end">
                            @auth
                                <div class="user">
                                    <i class="lni lni-user"></i>
                                    {{ Auth::user()->name }}
                                </div>
                                <ul class="user-login">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout').submit()">{{ trans('Messages.logout') }}</a>
                                    </li>
                                    <form action="{{ route('logout') }}" id="logout" method="post"
                                        style="display:none">
                                        @csrf
                                    </form>
                                </ul>
                            @else
                                <div class="user">
                                    <i class="lni lni-user"></i>
                                    {{ trans('Messages.hello') }}
                                </div>
                                <ul class="user-login">
                                    <li>
                                        <a href="{{ route('login') }}">{{ trans('Messages.sign in') }} </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('register') }}">{{ trans('Messages.register') }}</a>
                                    </li>
                                </ul>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Topbar -->
        <!-- Start Header Middle -->
        <div class="header-middle">
            <div class="container
">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-3 col-7">
                        <!-- Start Header Logo -->
                        <a class="navbar-brand" href="{{ route('home') }}">
                            <img src="{{ $setting->logob_url }}" alt="Logo">
                        </a>
                        <!-- End Header Logo -->
                    </div>
                    <div class="col-lg-5 col-md-7 d-xs-none">
                        <!-- Start Main Menu Search -->
                        <div class="main-menu-search">
                            <!-- navbar search start -->
                            <div class="navbar-search search-style-5">
                                <div class="search-select">
                                    <div class="select-position">
                                        <select id="select1">
                                            <option selected>{{ trans('Messages.all') }}</option>
                                            @foreach (App\Models\Category::where('parent_id', null)->get() as $category)
                                                <option>{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="search-input">
                                    <input type="text" placeholder="{{ trans('Messages.search') }}">
                                </div>
                                <div class="search-btn">
                                    <button><i class="lni lni-search-alt"></i></button>
                                </div>
                            </div>
                            <!-- navbar search Ends -->
                        </div>
                        <!-- End Main Menu Search -->
                    </div>
                    <div class="col-lg-4 col-md-2 col-5">
                        <div class="middle-right-area">
                            <div class="nav-hotline">
                                <i class="lni lni-phone"></i>
                                <h3>{{ trans('Messages.hotline') }} :
                                    <span>{{ $setting->phone }}</span>
                                </h3>
                            </div>
                            <div class="navbar-cart">
                                <x-cart-menu />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Header Middle -->
        <!-- Start Header Bottom -->
        <div class="container
">
            <div class="row align-items-center">
                <div class="col-lg-8 col-md-6 col-12">
                    <div class="nav-inner">
                        <!-- Start Mega Category Menu -->
                        <div class="mega-category-menu">
                            <span class="cat-button"><i
                                    class="lni lni-menu"></i>{{ trans('Messages.categories') }}</span>
                            <ul class="sub-category">
                                @foreach (App\Models\Category::where('parent_id', null)->get() as $category)
                                    <li><a href="#">{{ $category->name }}<i
                                                class="lni lni-chevron-right"></i></a>
                                        @if (count($category->children))
                                            @include('layouts.subcategory', [
                                                'children' => $category->children,
                                            ])
                                        @endif
                                    </li>
                                @endforeach
                            </ul>

                        </div>
                        <!-- End Mega Category Menu -->
                        <!-- Start Navbar -->
                        <nav class="navbar navbar-expand-lg">
                            <button class="navbar-toggler mobile-menu-btn" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                <ul id="nav" class="navbar-nav ms-auto">
                                    <li class="nav-item">
                                        <a href="index.html"
                                            aria-label="Toggle navigation">{{ trans('Messages.home') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        {{-- <a class="dd-menu active collapsed" href="javascript:void(0)" --}}
                                        <a class="dd-menu  collapsed" href="javascript:void(0)"
                                            data-bs-toggle="collapse" data-bs-target="#submenu-1-2"
                                            aria-controls="navbarSupportedContent" aria-expanded="false"
                                            aria-label="Toggle navigation">{{ trans('Messages.pages') }}</a>
                                        <ul class="sub-menu collapse" id="submenu-1-2">
                                            <li class="nav-item"><a
                                                    href="{{ route('about') }}">{{ trans('Messages.about us') }}</a>
                                            </li>
                                            <li class="nav-item"><a
                                                    href="{{ route('faqs') }}">{{ trans('Messages.faqs page') }}</a>
                                            </li>
                                            <li class="nav-item "><a
                                                    href="{{ route('login') }}">{{ trans('Messages.sign in') }}</a>
                                            </li>
                                            <li class="nav-item"><a
                                                    href="{{ route('register') }}">{{ trans('Messages.register') }}</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a class="dd-menu collapsed" href="javascript:void(0)"
                                            data-bs-toggle="collapse" data-bs-target="#submenu-1-3"
                                            aria-controls="navbarSupportedContent" aria-expanded="false"
                                            aria-label="Toggle navigation">{{ trans('Messages.shop') }}</a>
                                        <ul class="sub-menu collapse" id="submenu-1-3">
                                            <li class="nav-item"><a
                                                    href="{{ route('products.index') }}">{{ trans('Messages.shop') }}</a>
                                            </li>
                                            <li class="nav-item"><a
                                                    href="{{ route('cart.index') }}">{{ trans('Messages.cart') }}</a>
                                            </li>
                                            <li class="nav-item"><a
                                                    href="{{ route('checkout') }}">{{ trans('Messages.checkout') }}</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a class="dd-menu collapsed" href="javascript:void(0)"
                                            data-bs-toggle="collapse" data-bs-target="#submenu-1-4"
                                            aria-controls="navbarSupportedContent" aria-expanded="false"
                                            aria-label="Toggle navigation">{{ trans('Messages.blog') }}</a>
                                        <ul class="sub-menu collapse" id="submenu-1-4">
                                            <li class="nav-item"><a
                                                    href="javascript:void(0)">{{ trans('Messages.blog') }}</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('contactUs') }}"
                                            aria-label="Toggle navigation">{{ trans('Messages.contact us') }}</a>
                                    </li>
                                </ul>
                            </div> <!-- navbar collapse -->
                        </nav>
                        <!-- End Navbar -->
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Nav Social -->
                    <div class="nav-social">
                        <h5 class="title">{{ trans('Messages.follow us') }}</h5>
                        <ul>
                            <li>
                                <a href="{{ $setting->facebook }}"><i class="lni lni-facebook-filled"></i></a>
                            </li>
                            <li>
                                <a href="{{ $setting->tiktok }}"><i class="lni lni-tiktok"></i></a>
                            </li>
                            <li>
                                <a href="{{ $setting->instagram }}"><i class="lni lni-instagram"></i></a>
                            </li>
                            <li>
                                <a href="{{ $setting->telegram }}"><i class="lni lni-telegram"></i></a>
                            </li>
                        </ul>
                    </div>
                    <!-- End Nav Social -->
                </div>
            </div>
        </div>
        <!-- End Header Bottom -->
    </header>
    <!-- End Header Area -->

    <!-- Start Breadcrumbs -->

    {{ $breadcrumb ?? '' }}
    <!-- End Breadcrumbs -->

    {{ $slot }}

    <!-- Start Footer Area -->
    <footer class="footer">
        <!-- Start Footer Top -->
        <div class="footer-top">
            <div class="container
">
                <div class="inner-content">
                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-12">
                            <div class="footer-logo">
                                <a href="index.html">
                                    <img src="{{ $setting->logow_url }}" alt="#">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-8 col-12">
                            <div class="footer-newsletter">
                                <h4 class="title">
                                    {{ trans('Messages.subscribe') }}
                                    <span>{{ trans('Messages.subscribe title') }}</span>
                                </h4>
                                <div class="newsletter-form-head">
                                    <form action="#" method="get" target="_blank" class="newsletter-form">
                                        <input name="EMAIL" placeholder="{{ trans('Messages.subscribe email') }}"
                                            type="email">
                                        <div class="button">
                                            <button class="btn">{{ trans('Messages.subscribe button') }}<span
                                                    class="dir-part"></span></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer Top -->
        <!-- Start Footer Middle -->
        <div class="footer-middle">
            <div class="container
">
                <div class="bottom-inner">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-12">
                            <!-- Single Widget -->
                            <div class="single-footer f-contact">
                                <h3>{{ trans('Messages.get in touch with us') }}</h3>
                                <p class="phone">{{ trans('Messages.phone') }}: ({{ $setting->phone }})</p>
                                {{-- <p class="phone">{{ trans('Messages.phone') }}: (+905318339512)</p> --}}
                                <ul>
                                    <li><span>{{ trans('Messages.work time') }} : </span> 9.00 am - 8.00 pm</li>
                                </ul>
                                <p class="mail">
                                    <a href="https://fabulaus@gmail.com">FABulaus@gmail.com</a>
                                </p>
                            </div>
                            <!-- End Single Widget -->
                        </div>

                        <div class="col-lg-3 col-md-6 col-12">
                            <!-- Single Widget -->
                            <div class="single-footer f-link">
                                <h3>{{ trans('Messages.information') }}</h3>
                                <ul>
                                    <li><a href="{{ route('about') }}">{{ trans('Messages.about us') }}</a></li>
                                    <li><a href="{{ route('contactUs') }}">{{ trans('Messages.contact us') }}</a>
                                    </li>
                                    {{-- <li><a href="#">Downloads</a></li> --}}
                                    {{-- <li><a href="#">{{ trans('Messages.sitemap') }}</a></li> --}}
                                    <li><a href="{{ route('faqs') }}">{{ trans('Messages.faqs page') }}</a></li>
                                    <li><a href="{{ route('products.index') }}">{{ trans('Messages.shop') }}</a></li>

                                </ul>
                            </div>
                            <!-- End Single Widget -->
                        </div>
                        <div class="col-lg-3 col-md-6 col-12">
                            <!-- Single Widget -->
                            <div class="single-footer f-link">
                                <h3>{{ trans('Messages.shop departments') }}</h3>
                                <ul>
                                    @foreach (App\Models\Category::all() as $category)
                                        @if ($category->parent_id == null)
                                            <li><a href="#">{{ $category->name }}</a></li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                            <!-- End Single Widget -->
                        </div>
                        <div class="col-lg-3 col-md-6 col-12">
                            <!-- Single Widget -->
                            <div class="single-footer f-contact">
                                <h3>{{ trans('Messages.our location') }}</h3>
                                <div
                                    style="padding-bottom: 50%;
                                    position: relative;">
                                    <iframe
                                        src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d13306.098696130935!2d36.28991153490501!3d33.51374186627497!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2s!4v1686847814319!5m2!1sen!2s"
                                        width="600" height="600"
                                        style=" height: 100%;
                                                width: 100%;
                                                left: 0;
                                                top: 0;
                                                position: absolute;"
                                        allowfullscreen="" loading="lazy"
                                        referrerpolicy="no-referrer-when-downgrade">
                                    </iframe>
                                </div>
                                <!-- End Single Widget -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Footer Middle -->
            <!-- Start Footer Bottom -->
            <div class="footer-bottom">
                <div class="container">
                    <div class="inner-content">
                        <div class="row align-items-center">
                            <div class="col-lg-4 col-12">
                            </div>
                            <div class="col-lg-4 col-12">
                                <div class="copyright">
                                    <p>{{ trans('Messages.designed and developed by') }}<a
                                            href="https://mhdghaithalhalabi.github.io" rel="nofollow"
                                            target="_blank">Mhd Ghaith Alhalabe</a></p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-12">
                                <ul class="socila">
                                    <li>
                                        <span>{{ trans('Messages.follow us') }} :</span>
                                    </li>
                                    <li><a href="{{ $setting->facebook }}"><i
                                                class="lni lni-facebook-filled"></i></a></li>
                                    <li><a href="{{ $setting->tiktok }}"><i class="lni lni-tiktok"></i></a></li>
                                    <li><a href="{{ $setting->instagram }}"><i class="lni lni-instagram"></i></a>
                                    </li>
                                    <li><a href="{{ $setting->telegram }}"><i class="lni lni-telegram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Footer Bottom -->
    </footer>
    <!--/ End Footer Area -->

    <!-- ========================= scroll-top ========================= -->
    <a href="#" class="scroll-top">
        <i class="lni lni-chevron-up"></i>
    </a>

    <!-- ========================= JS here ========================= -->
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    {{-- @if (LaravelLocalization::getCurrentLocaleDirection() == 'rtl') --}}
    {{-- <script src="{{ asset('assets/tiny-slider-rtl/dist/tiny-slider.js') }}"></script> --}}
    {{-- @endif
    @if (LaravelLocalization::getCurrentLocaleDirection() == 'ltr') --}}
    {{-- <script src="{{ asset('assets/js/tiny-slider.js') }}"></script> --}}
    {{-- @endif --}}
    <script src="{{ asset('assets/js/tiny-slider.js') }}"></script>
    <script src="{{ asset('assets/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    @stack('scripts')

</body>

</html>
