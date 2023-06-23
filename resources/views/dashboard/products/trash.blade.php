@extends('layouts.dashboard')

@section('title', 'سلة محذوفات المنتجات')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item">المنتجات</li>
    <li class="breadcrumb-item active">سلة محذوفات</li>
@endsection

@section('content')

<div class="mb-5">
    <a href="{{ route('dashboard.products.index') }}" class="btn btn-sm btn-outline-primary">رجوع</a>
</div>

<x-alert type="success" />
<x-alert type="info" />

<form action="{{ URL::current() }}" method="get" class="d-flex justify-content-between mb-4">
    <x-form.input name="name" placeholder="Name" class="mx-2" :value="request('name')" />
    <select name="status" class="form-control mx-2">
        <option value="">All</option>
        <option value="active" @selected(request('status') == 'active')>نشط</option>
        <option value="archived" @selected(request('status') == 'archived')>مؤرشف</option>
    </select>
    <button class="btn btn-dark mx-2">بحث</button>
</form>

<table class="table">
    <thead>
        <tr>
            <th></th>
            <th>ID</th>
            <th>اسم</th>
            <th>حالة</th>
            <th>حذف بتاريخ</th>
            <th colspan="2"></th>
        </tr>
    </thead>
    <tbody>
        @forelse($products as $product)
        <tr>
            <td><img src="{{ asset('storage/' . $product->image) }}" alt="" height="50"></td>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->status }}</td>
            <td>{{ $product->deleted_at }}</td>
            <td>
                <form action="{{ route('dashboard.products.restore', $product->id) }}" method="post">
                    @csrf
                    @method('put')
                    <button type="submit" class="btn btn-sm btn-outline-info">استعادة</button>
                </form>
            </td>
            <td>
                <form action="{{ route('dashboard.products.force-delete', $product->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-sm btn-outline-danger">حذف نهائي</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="7">لا يوجد منتجات في السلة</td>
        </tr>
        @endforelse
    </tbody>
</table>

{{ $products->withQueryString()->appends(['search' => 1])->links() }}

@endsection
