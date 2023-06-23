<x-front-layout title="{{ trans('Messages.about us') }}">

    <x-slot:breadcrumb>
        <div class="breadcrumbs">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="breadcrumbs-content">
                            <h1 class="page-title">{{ trans('Messages.about us') }}</h1>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <ul class="breadcrumb-nav">
                            <li><a href="{{ route('home') }}"><i class="lni lni-home"></i>
                                    {{ trans('Messages.home') }}</a></li>
                            {{-- <li><a href="{{ route('products.index') }}">{{ trans('Messages.shop') }}</a></li> --}}
                            <li>{{ trans('Messages.about us') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </x-slot:breadcrumb>

    <section class="about-us section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12 col-12">
                    <div class="content-left">
                        <img src="{{ asset('assets/images/imageone.png') }}">
                        <a
                            href="https://www.youtube.com/watch?v=n3ZWcbGdyJw"
                            class="glightbox video"
                            ><i class="lni lni-play"></i></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-12">

                    <div class="content-right">
                        <h2>{{ trans('Messages.about title') }}</h2>
                        <p>{{ trans('Messages.about title2') }}</p>
                        <p>{{ trans('Messages.about title3') }}</p>
                    </div>
                </div>
            </div>
        </div>

    </section>

    @push('scripts')

    <script type="text/javascript">
     GLightbox({
        'selector': '.glightbox.video',
        'type':'video',
        'source':'youtube',
        'width':900,
        'autoplayVideos':true,
        });
        </script>
          {{-- const portfolioDetailsLightbox = GLightbox({
            selector: '.portfolio-details-lightbox',
            width: '90%',
            height: '90vh'
          }); --}}
 {{-- <script type="text/javascript">
GLightbox({
    'href':'https://www.youtube.com/watch?v=r44RKWyfcFw&fbclid=IwAR21beSJORalzmzokxDRcGfkZA1AtRTE__l5N4r09HcGS5Y6vOluyouM9EM','type':'video','source':'youtube','width':900,'autoplayVideos':true,
    });
</script> --}}

     @endpush

</x-front-layout>
