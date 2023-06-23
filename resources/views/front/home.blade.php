<x-front-layout>
    <!-- Start Hero Area -->
    <section class="hero-area">
        <div class="container">
            <x-alert type="info" />


                {{-- <div class="col-lg-8 col-12 custom-padding-right">
                    <div class="slider-head">
                        <div class="hero-slider">
                            <div class="single-slider" style="background-image: url({{ $setting->first_left_url }});">
                                <div class="content">
                                    <h2><span>{{ $setting->uptitle_first_left }} </span>
                                        {{ $setting->title_first_left }}
                                    </h2>
                                    <p>{{ $setting->downtitle_first_left }}</p>
                                    <h3> {{ Currency::format($setting->downprice_first_left) }}</h3>
                                    <div class="button">
                                        <a href="product-grids.html" class="btn">{{ trans('Messages.shop now') }}
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div> --}}
                <div class="row">
                    <div class="col-lg-8 col-12 custom-padding-right">
                        <div class="slider-head" style="direction: ltr">
                            <!-- Start Hero Slider -->
                            <div class="hero-slider">
                                <!-- Start Single Slider -->
                                <div class="single-slider" style="background-image: url({{ $setting->first_left_url }});">
                                    <div class="content">
                                        <h2><span>{{ $setting->uptitle_first_left }} </span>
                                            {{ $setting->title_first_left }}
                                        </h2>
                                        <p>{{ $setting->downtitle_first_left }}</p>
                                        <h3> {{ Currency::format($setting->downprice_first_left) }}</h3>
                                        <div class="button">
                                            <a href="product-grids.html" class="btn">{{ trans('Messages.shop now') }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Slider -->
                                <!-- Start Single Slider -->
                                <div class="single-slider" style="background-image: url({{ $setting->first_left_url }});">
                                    <div class="content">
                                        <h2><span>{{ $setting->uptitle_first_left }} </span>
                                            {{ $setting->title_first_left }}
                                        </h2>
                                        <p>{{ $setting->downtitle_first_left }}</p>
                                        <h3> {{ Currency::format($setting->downprice_first_left) }}</h3>
                                        <div class="button">
                                            <a href="product-grids.html" class="btn">{{ trans('Messages.shop now') }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Slider -->
                            </div>
                            <!-- End Hero Slider -->
                        </div>
                    </div>

                <div class="col-lg-4 col-12">
                    <div class="row">
                        <div class="col-lg-12 col-md-6 col-12 md-custom-padding">
                            <!-- Start Small Banner -->
                            <div class="hero-small-banner"
                                style="background-image: url({{ $setting->first_right_url }});">
                                <div class="content">
                                    <h2>
                                        <span>{{ $setting->title_first_right }}</span>
                                        {{ $setting->downtitle_first_right }}
                                    </h2>
                                    <h3>{{ Currency::format($setting->downprice_first_right) }}</h3>
                                </div>
                            </div>
                            <!-- End Small Banner -->
                        </div>
                        <div class="col-lg-12 col-md-6 col-12">
                            <!-- Start Small Banner -->
                            <div class="hero-small-banner style2">
                                <div class="content">
                                    <h2>{{ $setting->title_first_right2 }}</h2>
                                    <p>{{ $setting->downtitle_first_right2 }}</p>
                                    <div class="button">
                                        <a class="btn" href=""> {{ trans('Messages.shop now') }}</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Start Small Banner -->
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- End Hero Area -->

    <!-- Start Featured Categories Area -->
    <section class="featured-categories section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>{{ trans('Messages.featured categories') }}</h2>
                        <p>{{ trans('Messages.featured categories title') }}</p>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach (App\Models\Category::all() as $category)
                    @if ($category->parent_id == null)
                        <div class="col-lg-4 col-md-6 col-12">
                            <!-- Start Single Category -->
                            <div class="single-category">
                                <h3 class="heading">{{ $category->name }}</h3>
                                <ul>
                                    @foreach ($category->children as $sub)
                                        <li><a href="#">{{ $sub->name }}</a></li>
                                    @endforeach
                                </ul>
                                <div class="images">
                                    <img src="{{ $category->image_url }}" width="201" height="204" alt="#">
                                </div>
                            </div>
                            <!-- End Single Category -->
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Features Area -->

    <!-- Start Trending Product Area -->
    <section class="trending-product section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>{{ trans('Messages.trending product') }}</h2>
                        <p>{{ trans('Messages.trending product title') }}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($popular as $product)
                    <div class="col-lg-3 col-md-6 col-12">
                        <x-product-card :product="$product" />
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Trending Product Area -->

    <!-- Start Banner Area -->
    <section class="banner section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="single-banner" style="background-image:url({{ $setting->second_right_url }})">
                        <div class="content">
                            <h2>{{ $setting->title_second_right }}</h2>
                            <p>{{ $setting->downtitle_second_right }}</p>
                            <div class="button">
                                <a href="product-grids.html" class="btn">{{ trans('Messages.shop now') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="single-banner custom-responsive-margin"
                        style="background-image:url('{{ $setting->second_left_url }}')">
                        <div class="content">
                            <h2>{{ $setting->title_second_left }}</h2>
                            <p>{{ $setting->downtitle_second_left }}</p>
                            <div class="button">
                                <a href="product-grids.html" class="btn">{{ trans('Messages.shop now') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!-- Start Special Offer -->
    <section class="special-offer section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>{{ trans('Messages.special offer') }}</h2>
                        <p>{{ trans('Messages.special offer title') }}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="row">
                        @foreach ($featured as $product)
                            <div class="col-lg-4 col-md-4 col-12">
                                <x-product-card :product="$product" />
                            </div>
                        @endforeach
                        {{-- <div class="col-lg-4 col-md-4 col-12">
                            <!-- Start Single Product -->
                            <div class="single-product">
                                <div class="product-image">
                                    <img src="https://via.placeholder.com/335x335" alt="#">
                                    <div class="button">
                                        <a href="product-details.html" class="btn"><i class="lni lni-cart"></i> Add to
                                            Cart</a>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <span class="category">Camera</span>
                                    <h4 class="title">
                                        <a href="product-grids.html">WiFi Security Camera</a>
                                    </h4>
                                    <ul class="review">
                                        <li><i class="lni lni-star-filled"></i></li>
                                        <li><i class="lni lni-star-filled"></i></li>
                                        <li><i class="lni lni-star-filled"></i></li>
                                        <li><i class="lni lni-star-filled"></i></li>
                                        <li><i class="lni lni-star-filled"></i></li>
                                        <li><span>5.0 Review(s)</span></li>
                                    </ul>
                                    <div class="price">
                                        <span>$399.00</span>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Product -->
                        </div>
                        <div class="col-lg-4 col-md-4 col-12">
                            <!-- Start Single Product -->
                            <div class="single-product">
                                <div class="product-image">
                                    <img src="https://via.placeholder.com/335x335" alt="#">
                                    <div class="button">
                                        <a href="product-details.html" class="btn"><i class="lni lni-cart"></i> Add to
                                            Cart</a>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <span class="category">Laptop</span>
                                    <h4 class="title">
                                        <a href="product-grids.html">Apple MacBook Air</a>
                                    </h4>
                                    <ul class="review">
                                        <li><i class="lni lni-star-filled"></i></li>
                                        <li><i class="lni lni-star-filled"></i></li>
                                        <li><i class="lni lni-star-filled"></i></li>
                                        <li><i class="lni lni-star-filled"></i></li>
                                        <li><i class="lni lni-star-filled"></i></li>
                                        <li><span>5.0 Review(s)</span></li>
                                    </ul>
                                    <div class="price">
                                        <span>$899.00</span>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Product -->
                        </div>
                        <div class="col-lg-4 col-md-4 col-12">
                            <!-- Start Single Product -->
                            <div class="single-product">
                                <div class="product-image">
                                    <img src="https://via.placeholder.com/335x335" alt="#">
                                    <div class="button">
                                        <a href="product-details.html" class="btn"><i class="lni lni-cart"></i> Add to
                                            Cart</a>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <span class="category">Speaker</span>
                                    <h4 class="title">
                                        <a href="product-grids.html">Bluetooth Speaker</a>
                                    </h4>
                                    <ul class="review">
                                        <li><i class="lni lni-star-filled"></i></li>
                                        <li><i class="lni lni-star-filled"></i></li>
                                        <li><i class="lni lni-star-filled"></i></li>
                                        <li><i class="lni lni-star-filled"></i></li>
                                        <li><i class="lni lni-star"></i></li>
                                        <li><span>4.0 Review(s)</span></li>
                                    </ul>
                                    <div class="price">
                                        <span>$70.00</span>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Product -->
                        </div> --}}
                    </div>
                    <!-- Start Banner -->
                    <div class="single-banner right"
                        style="background-image:url({{ $setting->third_url }});margin-top: 30px;">
                        <div class="content">
                            <h2>{{ $setting->title_third }}</h2>
                            <p>{{ $setting->downtitle_third }}</p>
                            <div class="price">
                                <span>{{ Currency::format($setting->downprice_third) }}</span>
                            </div>
                            <div class="button">
                                <a href="product-grids.html" class="btn">{{ trans('Messages.shop now') }}</a>
                            </div>
                        </div>
                    </div>
                    <!-- End Banner -->
                </div>
                {{-- <div class="col-lg-4 col-md-12 col-12">
                    <div class="offer-content">
                        <div class="image">
                            <img src="https://via.placeholder.com/510x600" alt="#">
                            <span class="sale-tag">-50%</span>
                        </div>
                        <div class="text">
                            <h2><a href="product-grids.html">Bluetooth Headphone</a></h2>
                            <ul class="review">
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><span>5.0 Review(s)</span></li>
                            </ul>
                            <div class="price">
                                <span>$200.00</span>
                                <span class="discount-price">$400.00</span>
                            </div>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry incididunt ut
                                eiusmod tempor labores.</p>
                        </div>
                        <div class="box-head">
                            <div class="box">
                                <h1 id="days">000</h1>
                                <h2 id="daystxt">Days</h2>
                            </div>
                            <div class="box">
                                <h1 id="hours">00</h1>
                                <h2 id="hourstxt">Hours</h2>
                            </div>
                            <div class="box">
                                <h1 id="minutes">00</h1>
                                <h2 id="minutestxt">Minutes</h2>
                            </div>
                            <div class="box">
                                <h1 id="seconds">00</h1>
                                <h2 id="secondstxt">Secondes</h2>
                            </div>
                        </div>
                        <div style="background: rgb(204, 24, 24);" class="alert">
                            <h1 style="padding: 50px 80px;color: white;">We are sorry, Event ended ! </h1>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>
    <!-- End Special Offer -->

    <!-- Start Home Product List -->
    <section class="home-product-list section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-12 custom-responsive-margin">
                    <h4 class="list-title">{{ trans('Messages.our product') }}</h4>
                    @foreach ($products as $product)
                        <div class="single-list">
                            <div class="list-image">
                                <a href="product-grids.html"><img src="{{ $product->image_url }}" alt="#"></a>
                            </div>
                            <div class="list-info">
                                <h3>
                                    <a href="product-grids.html">{{ $product->name }}</a>
                                </h3>
                                <span>{{ Currency::format($product->price) }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="col-lg-4 col-md-4 col-12 custom-responsive-margin">
                    <h4 class="list-title">{{ trans('Messages.new product') }}</h4>
                    @foreach ($new as $product)
                        <div class="single-list">
                            <div class="list-image">
                                <a href="product-grids.html"><img src="{{ $product->image_url }}" alt="#"></a>
                            </div>
                            <div class="list-info">
                                <h3>
                                    <a href="product-grids.html">{{ $product->name }}</a>
                                </h3>
                                <span>{{ Currency::format($product->price) }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <h4 class="list-title">{{ trans('Messages.top rated') }}</h4>
                    <!-- Start Single List -->
                    @foreach ($rating as $product)
                        <div class="single-list">
                            <div class="list-image">
                                <a href="product-grids.html"><img src="{{ $product->image_url }}"
                                        alt="#"></a>
                            </div>
                            <div class="list-info">
                                <h3>
                                    <a href="product-grids.html">{{ $product->name }}</a>
                                </h3>
                                <span>{{ Currency::format($product->price) }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- End Home Product List -->

    <!-- Start Blog Section Area -->
    <section class="blog-section section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>{{ trans('Messages.our latest news') }}</h2>
                        <p>{{ trans('Messages.our latest news title') }}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Blog -->
                    <div class="single-blog">
                        <div class="blog-img">
                            <a href="blog-single-sidebar.html">
                                <img src="https://via.placeholder.com/370x215" alt="#">
                            </a>
                        </div>
                        <div class="blog-content">
                            <a class="category" href="javascript:void(0)">eCommerce</a>
                            <h4>
                                <a href="blog-single-sidebar.html">What information is needed for shipping?</a>
                            </h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt.</p>
                            <div class="button">
                                <a href="javascript:void(0)" class="btn">Read More</a>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Blog -->
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Blog -->
                    <div class="single-blog">
                        <div class="blog-img">
                            <a href="blog-single-sidebar.html">
                                <img src="https://via.placeholder.com/370x215" alt="#">
                            </a>
                        </div>
                        <div class="blog-content">
                            <a class="category" href="javascript:void(0)">Gaming</a>
                            <h4>
                                <a href="blog-single-sidebar.html">Interesting fact about gaming consoles</a>
                            </h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt.</p>
                            <div class="button">
                                <a href="javascript:void(0)" class="btn">Read More</a>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Blog -->
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Blog -->
                    <div class="single-blog">
                        <div class="blog-img">
                            <a href="blog-single-sidebar.html">
                                <img src="https://via.placeholder.com/370x215" alt="#">
                            </a>
                        </div>
                        <div class="blog-content">
                            <a class="category" href="javascript:void(0)">Electronic</a>
                            <h4>
                                <a href="blog-single-sidebar.html">Electronics, instrumentation & control engineering
                                </a>
                            </h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt.</p>
                            <div class="button">
                                <a href="javascript:void(0)" class="btn">Read More</a>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Blog -->
                </div>
            </div>
        </div>
    </section>
    <!-- End Blog Section Area -->

    <!-- Start Shipping Info -->
    <section class="shipping-info">
        <div class="container">
            <ul>
                <!-- Free Shipping -->
                <li>
                    <div class="media-icon">
                        <i class="lni lni-delivery"></i>
                    </div>
                    <div class="media-body">
                        <h5>{{ trans('Messages.free shipping') }}</h5>
                        <span>{{ trans('Messages.free shipping title') }}</span>
                    </div>
                </li>
                <!-- Money Return -->
                <li>
                    <div class="media-icon">
                        <i class="lni lni-support"></i>
                    </div>
                    <div class="media-body">
                        <h5>{{ trans('Messages.24/7 support') }}</h5>
                        <span>{{ trans('Messages.24/7 support title') }}</span>
                    </div>
                </li>
                <!-- Support 24/7 -->
                <li>
                    <div class="media-icon">
                        <i class="lni lni-credit-cards"></i>
                    </div>
                    <div class="media-body">
                        <h5>{{ trans('Messages.online payment') }}</h5>
                        <span>{{ trans('Messages.online payment title') }}</span>
                    </div>
                </li>
                <!-- Safe Payment -->
                <li>
                    <div class="media-icon">
                        <i class="lni lni-reload"></i>
                    </div>
                    <div class="media-body">
                        <h5>{{ trans('Messages.easy return') }}</h5>
                        <span>{{ trans('Messages.easy return title') }}</span>
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <!-- End Shipping Info -->
    @push('scripts')
    <script type="text/javascript">
        //========= Hero Slider
        tns({
            container: '.hero-slider',
            slideBy: 'page',
            autoplay: true,
            autoplayButtonOutput: false,
            mouseDrag: true,
            gutter: 0,
            items: 1,
            nav: false,
            controls: true,
            controlsText: ['<i class="lni lni-chevron-left"></i>', '<i class="lni lni-chevron-right"></i>'],
        });

        //======== Brand Slider

    </script>
@endpush
</x-front-layout>
