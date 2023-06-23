@extends('layouts.dashboard')

@section('title', 'تعديل مدير')

@section('breadcrumb')
@parent
<li class="breadcrumb-item active">المدراء</li>
<li class="breadcrumb-item active">تعديل مدير</li>
@endsection

@section('content')

<form action="{{ route('dashboard.admins.update', $admin->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')

    @include('dashboard.admins._form2', [
        'button_label' => 'التحديث'
    ])
</form>

@endsection
