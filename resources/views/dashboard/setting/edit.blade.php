@extends('layouts.dashboard')

@section('title', 'تعديل الاعدادات')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">تعديل الاعدادات</li>
@endsection

@section('content')
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <h3>حدث خطأ !</h3>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <x-alert type="success" />

        <form action="{{ route('dashboard.setting.update', $settings) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')

            <div class="card-block">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    @foreach (config('app.languages') as $key => $lang)
                        <li class="nav-item">
                            <a class="nav-link @if ($loop->index == 0) active @endif" id="home-tab"
                                data-toggle="tab" href="#{{ $key }}" role="tab" aria-controls="home"
                                aria-selected="true">{{ $lang }}</a>
                        </li>
                    @endforeach
                </ul>
                <div class="tab-content" id="myTabContent">
                    @foreach (config('app.languages') as $key => $lang)
                        <div class="tab-pane mt-3 fade @if ($loop->index == 0) show active in @endif"
                            id="{{ $key }}" role="tabpanel" aria-labelledby="home-tab">
                            <br>
                            <div class="row">
                                <div class="form-group mt-3 col-md-4">
                                    <label> عنوان اول يسار - {{ $lang }}</label>
                                    <input type="text" class="form-control" name="{{ $key }}[title_first_left]"
                                        @if ($settings->translate($key)) value="
                        {{ $settings->translate($key)->title_first_left }}
                        " @endif />
                                </div>
                                <div class="form-group mt-3 col-md-4">
                                    <label>كتابة فوق فاتحة اول يسار - {{ $lang }}</label>
                                    <input type="text" class="form-control"
                                        name="{{ $key }}[uptitle_first_left]" class="form-control"
                                        @if ($settings->translate($key)) value="
                        {{ $settings->translate($key)->uptitle_first_left }}
                        " @endif />
                                </div>
                                <div class="form-group mt-3 col-md-4">
                                    <label>كتابة تحت العنوان اول يسار - {{ $lang }}</label>
                                    <input name="{{ $key }}[downtitle_first_left]" type="text"
                                        class="form-control"
                                        @if ($settings->translate($key)) value="
                        {{ $settings->translate($key)->downtitle_first_left }}
                        " @endif />
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group mt-3 col-md-4">
                                    <label> عنوان اول يمين 1 - {{ $lang }}</label>
                                    <input type="text" class="form-control"
                                        name="{{ $key }}[title_first_right]"
                                        @if ($settings->translate($key)) value="
                        {{ $settings->translate($key)->title_first_right }}
                        " @endif />
                                </div>
                                <div class="form-group mt-3 col-md-4">
                                    <label>كتابة فوق فاتحة اول يمين 1 - {{ $lang }}</label>
                                    <input type="text" class="form-control"
                                        name="{{ $key }}[uptitle_first_right]" class="form-control"
                                        @if ($settings->translate($key)) value="
                        {{ $settings->translate($key)->uptitle_first_right }}
                        " @endif />
                                </div>
                                <div class="form-group mt-3 col-md-4">
                                    <label>كتابة تحت العنوان اول يمين 1 - {{ $lang }}</label>
                                    <input name="{{ $key }}[downtitle_first_right]" type="text"
                                        class="form-control"
                                        @if ($settings->translate($key)) value="
                        {{ $settings->translate($key)->downtitle_first_right }}
                        " @endif />
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group mt-3 col-md-6">
                                    <label> عنوان اول يمين 2 - {{ $lang }}</label>
                                    <input type="text" class="form-control"
                                        name="{{ $key }}[title_first_right2]"
                                        @if ($settings->translate($key)) value="
                        {{ $settings->translate($key)->title_first_right2 }}
                        " @endif />
                                </div>
                                <div class="form-group mt-3 col-md-6">
                                    <label>كتابة تحت العنوان اول يمين 2 - {{ $lang }}</label>
                                    <input name="{{ $key }}[downtitle_first_right2]" type="text"
                                        class="form-control"
                                        @if ($settings->translate($key)) value="
                        {{ $settings->translate($key)->downtitle_first_right2 }}
                        " @endif />
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group mt-3 col-md-6">
                                    <label> عنوان تاني يمين - {{ $lang }}</label>
                                    <input type="text" class="form-control"
                                        name="{{ $key }}[title_second_right]"
                                        @if ($settings->translate($key)) value="
                        {{ $settings->translate($key)->title_second_right }}
                        " @endif />
                                </div>
                                <div class="form-group mt-3 col-md-6">
                                    <label>كتابة تحت العنوان تاني يمين - {{ $lang }}</label>
                                    <input name="{{ $key }}[downtitle_second_right]" type="text"
                                        class="form-control"
                                        @if ($settings->translate($key)) value="
                        {{ $settings->translate($key)->downtitle_second_right }}
                        " @endif />
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group mt-3 col-md-6">
                                    <label> عنوان تاني يسار - {{ $lang }}</label>
                                    <input type="text" class="form-control"
                                        name="{{ $key }}[title_second_left]"
                                        @if ($settings->translate($key)) value="
                        {{ $settings->translate($key)->title_second_left }}
                        " @endif />
                                </div>
                                <div class="form-group mt-3 col-md-6">
                                    <label>كتابة تحت العنوان تاني يسار - {{ $lang }}</label>
                                    <input name="{{ $key }}[downtitle_second_left]" type="text"
                                        class="form-control"
                                        @if ($settings->translate($key)) value="
                        {{ $settings->translate($key)->downtitle_second_left }}
                        " @endif />
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group mt-3 col-md-6">
                                    <label> عنوان تالت - {{ $lang }}</label>
                                    <input type="text" class="form-control" name="{{ $key }}[title_third]"
                                        @if ($settings->translate($key)) value="
                        {{ $settings->translate($key)->title_third }}
                        " @endif />
                                </div>
                                <div class="form-group mt-3 col-md-6">
                                    <label>كتابة تحت العنوان تالت - {{ $lang }}</label>
                                    <input name="{{ $key }}[downtitle_third]" type="text" class="form-control"
                                        @if ($settings->translate($key)) value="
                        {{ $settings->translate($key)->downtitle_third }}
                        " @endif />
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="row">
                <div class="form-group mt-3 col-md-4">
                    <label>سعر اول يسار</label>
                    <input type="text" class="form-control" name="downprice_first_left"
                        value="
            {{ $settings->downprice_first_left }}
            " />
                </div>
                <div class="form-group mt-3 col-md-4">
                    <label>سعر اول يمين</label>
                    <input type="text" class="form-control" name="downprice_first_right"
                        value="
            {{ $settings->downprice_first_right }}
            " />

                </div>
                <div class="form-group mt-3 col-md-4">
                    <label> سعر ثالث</label>
                    <input type="text" class="form-control" name="downprice_third"
                        value="
            {{ $settings->downprice_third }}
            " />
                </div>
            </div>


            <div class="row">
                <div class="form-group mt-3 col-mx-1">
                    <label>موبايل</label>
                    <input type="text" class="form-control" name="phone"
                        value="
        {{ $settings->phone }}
        " />
                </div>
                <div class="form-group mt-3 col-mx-1">
                    <label>رابط الفيسبوك</label>
                    <input type="text" class="form-control" name="facebook"
                        value="
        {{ $settings->facebook }}
        " />
                </div>
                <div class="form-group mt-3 col-mx-1">
                    <label>رابط انستاجرام</label>
                    <input type="text" class="form-control" name="instagram"
                        value="
        {{ $settings->instagram }}
        " />
                </div>
                <div class="form-group mt-3 col-mx-1">
                    <label>رابط تيك توك</label>
                    <input type="text" class="form-control" name="tiktok"
                        value="
        {{ $settings->tiktok }}
        " />
                </div>
                <div class="form-group mt-3 col-mx-1">
                    <label>رابط تيليجرام</label>
                    <input type="text" class="form-control" name="telegram"
                        value="
        {{ $settings->telegram }}
        " />

                </div>
            </div>

            <div class="row">
                <div class="mt-3 col-md-4">
                    <div class="form-group mt-3 col-md-6">
                        <label>صورة ايقونة</label>
                        <input type="file" name="favicon" />
                    </div>
                    <div class="mt-3 col-md-6">
                        <img src="{{ $settings->favicon_url }}" height="200px" width="200px" />
                    </div>
                </div>
                <div class="mt-3 col-md-4">
                    <div class="form-group mt-3 col-md-6">
                        <label>صورة لوغو ابيض</label>
                        <input type="file" name="logo_w" />
                    </div>
                    <div class="mt-3 col-md-6">
                        <img src="{{ $settings->logow_url }}" height="200px" width="200px" />
                    </div>
                </div>
                <div class="mt-3 col-md-4">
                    <div class="form-group mt-3 col-md-6">
                        <label>صورة لوغو اسود</label>
                        <input type="file" name="logo_b" />
                    </div>
                    <div class="mt-3 col-md-6">
                        <img src="{{ $settings->logob_url }}" height="200px" width="200px" />
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="mt-3 col-md-6">
                    <div class="form-group mt-3 col-md-6">
                        <label>صورة اول يسار</label>
                        <input type="file" name="image_first_left" />

                    </div>
                    <div class="mt-3 col-md-6">
                        <img src="{{ $settings->first_left_url }}" height="200px" width="200px" />

                    </div>
                </div>
                <div class="mt-3 col-md-6">
                    <div class="form-group mt-3 col-md-6">
                        <label>صورة اول يمين</label>
                        <input type="file" name="image_first_right" />

                    </div>
                    <div class="mt-3 col-md-6">
                        <img src="{{ $settings->first_right_url }}" height="200px" width="200px" />

                    </div>
                </div>

            </div>
            <div class="row">
                <div class="mt-3 col-md-6">
                    <div class="form-group mt-3 col-md-6">
                        <label>صورة تاني يسار</label>
                        <input type="file" name="image_second_left" />

                    </div>
                    <div class="mt-3 col-md-6">
                        <img src="{{ $settings->second_left_url }}" height="200px" width="200px" />

                    </div>
                </div>
                <div class="mt-3 col-md-6">
                    <div class="form-group mt-3 col-md-6">
                        <label>صورة تاني يمين</label>
                        <input type="file" name="image_second_right" />

                    </div>
                    <div class="mt-3 col-md-6">
                        <img src="{{ $settings->second_right_url }}" height="200px" width="200px" />

                    </div>
                </div>

            </div>

            <div class="row">
                <div class="mt-3 col-md-12">
                    <div class="form-group mt-3 col-md-6">
                        <label>صورة ثالث كبير </label>
                        <input type="file" name="image_third" />
                    </div>
                    <div class="form-group mt-3 col-md-6">
                        <img src="{{ $settings->third_url }}" height="200px" width="200px" />
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">حفظ</button>
        </form>
    </div>
@endsection
