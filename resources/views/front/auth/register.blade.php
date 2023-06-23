<x-front-layout title="{{ trans('Messages.register') }}">
    <x-slot:breadcrumb>
        <!-- Start Breadcrumbs -->
        <div class="breadcrumbs">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="breadcrumbs-content">
                            <h1 class="page-title">{{ trans('Messages.register') }}</h1>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <ul class="breadcrumb-nav">
                            <li><a href="{{ route('home') }}"><i class="lni lni-home"></i>{{ trans('Messages.home') }}</a></li>
                            <li>{{ trans('Messages.register') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Breadcrumbs -->
    </x-slot:breadcrumb>

    <!-- Start Account Register Area -->
    <div class="account-login section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-10 offset-md-1 col-12">
                    <div class="register-form">
                        <div class="title">
                            <h3>{{ trans('Messages.no account') }}</h3>
                            <p>{{ trans('Messages.register title') }}</p>
                        </div>
                        <form class="row" method="post" action="{{ route('register') }}">
                            @csrf
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="reg-fn">{{ trans('Messages.first name') }}</label>
                                    <x-form.input id="reg-fn" name="name" required />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="reg-ln">{{ trans('Messages.last name') }}</label>
                                    <x-form.input id="reg-ln" name="last_name" required />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="reg-email">{{ trans('Messages.email address') }}</label>
                                    <x-form.input type="email" id="reg-email" name="email" required />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="reg-phone">{{ trans('Messages.phone number') }}</label>
                                    <x-form.input type="text" id="reg-phone" name="phone_number" required />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="reg-pass">{{ trans('Messages.password') }}</label>
                                    <x-form.input type="password" id="reg-pass" name="password" required />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="reg-pass-confirm">{{ trans('Messages.confirm password') }}</label>
                                    <x-form.input type="password" id="reg-pass-confirm" name="password_confirmation" required />
                                </div>
                            </div>
                            <div class="button">
                                <button class="btn" type="submit">{{ trans('Messages.register') }}</button>
                            </div>
                            <p class="outer-link">{{ trans('Messages.already') }}<a href="{{ route('login') }}">{{ trans('Messages.sign in') }}</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Account Register Area -->
</x-front-layout>
