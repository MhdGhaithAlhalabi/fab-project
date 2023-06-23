@extends('layouts.dashboard')

@section('title', 'انشاء القواعد')

@section('breadcrumb')
@parent
<li class="breadcrumb-item active">القواعد</li>
@endsection

@section('content')

<form action="{{ route('dashboard.roles.store') }}" method="post" enctype="multipart/form-data">
    @csrf

    @include('dashboard.roles._form')
</form>

@endsection
