@extends('layouts.dashboard')

@section('title', 'المنتجات')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">المنتجات</li>
@endsection

@section('content')
<div class="container">
    <div class="mb-5">
        @if(Auth::user()->can('products.create'))
        <a href="{{ route('dashboard.products.create') }}" class="btn btn-sm btn-outline-primary mr-2">اضافة</a>
        @endif
        <a href="{{ route('dashboard.products.trash') }}" class="btn btn-sm btn-outline-dark">سلة المحذوفات</a>
    </div>


<x-alert type="success" />
<x-alert type="info" />

<form action="{{ URL::current() }}" method="get" class="d-flex justify-content-between mb-4">
    <x-form.input name="name" placeholder="Name" class="mx-2" :value="request('name')" />
    <select name="status" class="form-control mx-2">
        <option value="">الكل</option>
        <option value="active" @selected(request('status') == 'active')>نشط</option>
        <option value="archived" @selected(request('status') == 'archived')>مؤرشف</option>
    </select>
    <button class="btn btn-dark mx-2">بحث</button>
</form>

<table class="table table-responsive">
    <thead>
        <tr>
            <th></th>
            <th>ID</th>
            <th>اسم</th>
            <th>الصنف</th>
            {{-- <th>المتجر</th> --}}
            <th>الحالة</th>
            <th>اضيف بتاريخ</th>
            <th colspan="2"></th>
        </tr>
    </thead>
    <tbody>
        @forelse($products as $product)
        <tr>
            <td><img src="{{ $product->image_url }}" alt="" height="50"></td>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->category->name }}</td>
            {{-- <td>{{ $product->store->name }}</td> --}}
            <td>{{ $product->status }}</td>
            <td>{{ $product->created_at }}</td>
            <td>
                <a href="{{ route('dashboard.products.edit', $product->id) }}" class="btn btn-sm btn-outline-success">تعديل</a>
            </td>
            <td>
                <form action="{{ route('dashboard.products.destroy', $product->id) }}" method="post">
                    @csrf
                    <!-- Form Method Spoofing -->
                    <input type="hidden" name="_method" value="delete">
                    @method('delete')
                    <button type="submit" class="btn btn-sm btn-outline-danger">حذف</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="8">لا يوجد منتجات.</td>
        </tr>
        @endforelse
    </tbody>
</table>

{{ $products->withQueryString()->appends(['search' => 1])->links() }}
</div>
@endsection
