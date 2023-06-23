@extends('layouts.dashboard')

@section('title', 'تعديل مستخدم')

@section('breadcrumb')
@parent
<li class="breadcrumb-item active">المستخدمين</li>
<li class="breadcrumb-item active">تعديل مستخدم</li>
@endsection

@section('content')

<form action="{{ route('dashboard.users.update', $user->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')

    @include('dashboard.users._form', [
        'button_label' => 'Update'
    ])
</form>

@endsection
