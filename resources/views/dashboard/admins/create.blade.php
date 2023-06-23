@extends('layouts.dashboard')

@section('title', 'انشاء مدير')

@section('breadcrumb')
@parent
<li class="breadcrumb-item active">المدراء</li>
@endsection

@section('content')

<form action="{{ route('dashboard.admins.store') }}" method="post" enctype="multipart/form-data">
    @csrf

    @include('dashboard.admins._form')
</form>

@endsection
