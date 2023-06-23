@extends('layouts.dashboard')

@section('title', 'نعديل القواعد')

@section('breadcrumb')
@parent
<li class="breadcrumb-item active">القواعد</li>
<li class="breadcrumb-item active">تعديل القاعدة</li>
@endsection

@section('content')

<form action="{{ route('dashboard.roles.update', $role->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')

    @include('dashboard.roles._form', [
        'button_label' => 'تحديث'
    ])
</form>

@endsection
