@extends('layouts.dashboard')
@section('title', 'تعديل المنتجات')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item">المنتجات</li>
    <li class="breadcrumb-item active">تعديل المنتج</li>
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
    <form action="{{ route('dashboard.products.update', $product->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        @include('dashboard.products._form', [
            'button_label' => 'تعديل',
        ])
    </form>

    {{-- <form action="{{ route('dashboard.attributes.update', $product->id) }}" method="post">
        @csrf
        @method('put')
        @php
                $attr2 = [];
                $gh2 = [];
                $values22 = [];
                $attributes = App\Models\Attribute::all();
                $attributes_id = $attributes->pluck('id')->toArray();
                foreach ($product->attributes as $ff) {
                $attr2[] = $ff;
                }
                $values21 = collect($attr2);
                foreach ($values21 as $h) {
                $values22[] = $h->pivot->attribute_id;
                $gh2[] = $h;
                }
                $gh = collect($gh2);
                $values22_id = $values22;
            @endphp
        <div class="card">
            <div class="card-header">
                <strong>ادخل بيانات المنتج</strong>
            </div>
        <div class="card-block">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                @foreach (config('app.languages') as $key => $lang)
                    <li class="nav-item">
                        <a class="nav-link @if ($loop->index == 0) active @endif"
                            id="home-tab"
                            data-toggle="tab"
                            href="#{{ $key }}"
                            role="tab"
                            aria-controls="home"
                            aria-selected="true">{{ $lang }}</a>
                    </li>
                @endforeach
            </ul>

            <div class="tab-content" id="myTabContent">
                @foreach (config('app.languages') as $key => $lang)
                    <div class="tab-pane mt-3 fade  @if ($loop->index == 0) show active in @endif"
                        id="{{ $key }}" role="tabpanel" aria-labelledby="home-tab">
                        <br>
                        <label>الاسم - {{ $lang }}</label>
                        @foreach (App\Models\Attribute::all() as $attribute2)
                            @if (!in_array($attribute2->id, $values22_id))
                            <div class="form-group mt-3 col-md-12">
                                <input
                                data-id="{{ $key }}{{ $attribute2->id }}"
                                type="checkbox"
                                class="ingredient-enable">
                                {{ $attribute2->translate('ar')->name }}

                                <input
                                value="{{ $attribute2->value  ?? null }}"
                                data-id="{{ $key }}{{ $attribute2->id }}"
                                name="{{ $key }}[{{ $attribute2->id }}]"
                                type="text"
                                class="ingredient-amount form-control"
                                placeholder="values">
                            </div>
                            @else
                            @php
                                $values = [];
                                foreach ($product->attributes as $att) {
                                if ($att->pivot->attribute_id == $attribute2->id) {
                                $values_ar = $att->pivot->values_ar;
                                $values_en = $att->pivot->values_en;
                                $values_tr = $att->pivot->values_tr;
                                }
                                }
                                $values_ar = collect($values_ar);
                                $values_ar = implode(',', $values_ar->toArray());
                                $values_en = collect($values_en);
                                $values_en = implode(',', $values_en->toArray());
                                $values_tr = collect($values_tr);
                                $values_tr = implode(',', $values_tr->toArray());
                            @endphp
                                <div class="form-group mt-3 col-md-12">
                                <input
                                data-id="{{ $key }}{{ $attribute2->id }}"
                                type="checkbox"
                                class="ingredient-enable">
                                {{ $attribute2->translate('ar')->name }}
                                <input
                                value="@if ($key == 'ar') {{ $values_ar  }} @endif @if ($key == 'en') {{ $values_en }} @endif @if ($key == 'tr') {{ $values_tr }} @endif"
                                data-id="{{ $key }}{{ $attribute2->id }}"
                                name="{{ $key }}[{{ $attribute2->id }}]"
                                type="text"
                                class="ingredient-amount form-control"
                                placeholder="values">
                            </div>
                            @endif
                        @endforeach
                    </div>
                @endforeach
        </div>
        </div>
        </div>
        <input type="hidden" name="product_id" value="{{ $product->id }}"></input>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">تعديل الخصائص</button>
        </div>
    </form> --}}

@endsection
