@extends('layouts.dashboard')

@section('title', 'المنتجات')

@section('breadcrumb')
@parent
<li class="breadcrumb-item">المنتجات</li>
<li class="breadcrumb-item active">اضافة منتج</li>
@endsection

@section('content')
    <div class="container">
        @if($errors->any())
        <div class="alert alert-danger">
            <h3>حدث خطأ !</h3>
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
<form action="{{ route('dashboard.products.store') }}" method="post" enctype="multipart/form-data">
    @csrf

    <div class="card">

        <div class="card-header">
            <strong>ادخل بيانات المنتج</strong>
        </div>

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


                        <div class="form-group mt-3 col-md-12">
                            <label>الاسم - {{ $lang }}</label>
                            <input type="text" name="{{ $key }}[name]" class="form-control"
                                placeholder="الاسم">
                        </div>

                        <div class="form-group col-md-12">
                            <label>الوصف - {{ $lang }}</label>
                            <textarea name="{{ $key }}[description]" class="form-control" cols="30" rows="10"></textarea>
                        </div>
                        <div class="form-group col-md-12">
                            <label>وصف طويل - {{ $lang }}</label>
                            <textarea name="{{ $key }}[details]" class="form-control" cols="30" rows="10"></textarea>
                        </div>
                        <div class="form-group mt-3 col-md-12">
                            <label>خصائص - {{ $lang }}</label>
                            <input type="text" name="{{ $key }}[features]" class="form-control"
                                placeholder="خصائص">
                        </div>
                        <div class="form-group mt-3 col-md-12">
                            <label>مواصفات - {{ $lang }}</label>
                            <input type="text" name="{{ $key }}[specifications]" class="form-control"
                                placeholder="مواصفات">
                        </div>

                    </div>
                @endforeach

            </div>

        </div>
    </div>

    @include('dashboard.products._form2')
</form>
</div>
@endsection
