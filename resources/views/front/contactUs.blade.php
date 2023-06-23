<x-front-layout title="{{ trans('Messages.contact us') }}">

    <x-slot:breadcrumb>
        <div class="breadcrumbs">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="breadcrumbs-content">
                            <h1 class="page-title">{{ trans('Messages.contact us') }}</h1>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <ul class="breadcrumb-nav">
                            <li><a href="{{ route('home') }}"><i class="lni lni-home"></i>
                                    {{ trans('Messages.home') }}</a></li>
                            <li>{{ trans('Messages.contact us') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </x-slot:breadcrumb>

    <section id="contact-us" class="contact-us section">
        <div class="container">
            <div class="contact-head">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title">
                            <h2>{{ trans('Messages.contact us') }}</h2>
                            <p>{{ trans('Messages.contact title2') }}</p>
                        </div>
                    </div>
                </div>
                <div class="contact-info">
                    <div class="row">
                        <div class="col-lg-4 col-md-12 col-12">
                            <div class="single-info-head">

                                <div class="single-info">
                                    <i class="lni lni-map"></i>
                                    <h3>{{ trans('Messages.contact address') }}</h3>
                                    <ul>
                                        <li>{{ trans('Messages.contact full address') }}</li>
                                    </ul>
                                </div>


                                <div class="single-info">
                                    <i class="lni lni-phone"></i>

                                    <h3>{{ trans('Messages.get in touch with us') }}</h3>
                                    <ul>
                                        <li><a href="tel:+18005554400">+1 800 555 44 00</a></li>
                                        <li><a href="tel:+321556667890">+321 55 666 7890</a></li>
                                    </ul>
                                </div>


                                {{-- <div class="single-info">
                                    <i class="lni lni-envelope"></i>
                                    <h3>Mail at</h3>
                                    <ul>
                                        <li><a
                                                href="/cdn-cgi/l/email-protection#562523262639242216253e392631243f32257835393b"><span
                                                    class="__cf_email__"
                                                    data-cfemail="14676164647b666054677c7b6473667d70673a777b79">[email&#160;protected]</span></a>
                                        </li>
                                        <li><a
                                                href="/cdn-cgi/l/email-protection#3754564552524577445f584750455e53441954585a"><span
                                                    class="__cf_email__"
                                                    data-cfemail="82e1e3f0e7e7f0c2f1eaedf2e5f0ebe6f1ace1edef">[email&#160;protected]</span></a>
                                        </li>
                                    </ul>
                                </div> --}}

                            </div>
                        </div>
                        <div class="col-lg-8 col-md-12 col-12">
                            <div class="contact-form-head">
                                <div class="form-main">
                                    <form class="form" method="post" action="assets/mail/mail.php">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-12">
                                                <div class="form-group">
                                                    <input name="name" type="text" placeholder="{{ trans('Messages.user name') }}
                                                        required="required">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-12">
                                                <div class="form-group">

                                                    <input name="subject" type="text" placeholder="{{ trans('Messages.contact subject') }}"
                                                        required="required">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-12">
                                                <div class="form-group">
                                                    <input name="email" type="email" placeholder="{{ trans('Messages.email address') }}"
                                                        required="required">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-12">
                                                <div class="form-group">
                                                    <input name="phone" type="text" placeholder="{{ trans('Messages.phone') }}"
                                                        required="required">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group message">
                                                    <textarea name="message" placeholder="{{ trans('Messages.contact message') }}"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group button">
                                                    <button type="submit" class="btn ">{{ trans('Messages.contact submit message') }} </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-front-layout>
