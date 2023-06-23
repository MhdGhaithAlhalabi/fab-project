@extends('layouts.dashboard')
@section('title', 'تعديل الاصناف')
@section('breadcrumb')
@parent
<li class="breadcrumb-item active">الاصناف</li>
<li class="breadcrumb-item active">تعديل الصنف</li>
@endsection
@section('content')
<form action="{{ route('dashboard.categories.update', $category->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')

    @include('dashboard.categories._form', [
        'button_label' => 'تحديث'
    ])
</form>

@endsection
