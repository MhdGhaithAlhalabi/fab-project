@extends('layouts.dashboard')

@section('title', 'تعديل الملف الشخصي')

@section('breadcrumb')
@parent
<li class="breadcrumb-item active">تعديل الملف الشخصي</li>
@endsection

@section('content')

<x-alert type="success" />

<form action="{{ route('dashboard.profile.update') }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('patch')

    <div class="form-row">
        <div class="col-md-6">
            <x-form.input name="first_name" label="الاسم الاول" :value="$user->profile->first_name" />
        </div>
        <div class="col-md-6">
            <x-form.input name="last_name" label="اسم العائلة" :value="$user->profile->last_name" />
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-6">
            <x-form.input name="birthday" type="date" label="تاريخ الميلاد" :value="$user->profile->birthday" />
        </div>
        <div class="col-md-6">
            <x-form.radio name="gender" label="الجنس" :options="['male'=>'ذكر', 'female'=>'انثى']" :checked="$user->profile->gender" />
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-4">
            <x-form.input name="street_address" label="عنوان الشارع" :value="$user->profile->street_address" />
        </div>
        <div class="col-md-4">
            <x-form.input name="city" label="المدينة" :value="$user->profile->city" />
        </div>
        <div class="col-md-4">
            <x-form.input name="state" label="المحافظة" :value="$user->profile->state" />
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-4">
            <x-form.input name="postal_code" label="Postal Code" :value="$user->profile->postal_code" />
        </div>
        <div class="col-md-4">
            <x-form.select name="country" :options="$countries" label="البلدة" :selected="$user->profile->country" />
        </div>
        <div class="col-md-4">
            <x-form.select name="locale" :options="$locales" label="الجنسية" :selected="$user->profile->locale" />
        </div>
    </div>

    <button type="submit" class="btn btn-primary">حفظ</button>
</form>

@endsection
