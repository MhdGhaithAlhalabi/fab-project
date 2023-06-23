@extends('layouts.dashboard')

@section('title', $category->name)

@section('breadcrumb')
@parent
<li class="breadcrumb-item active">الاصناف</li>
<li class="breadcrumb-item active">{{ $category->name }}</li>
@endsection

@section('content')
<div class="container">


<table class="table table-responsive">
    <thead>
        <tr>
            <th></th>
            <th>الاسم</th>
            {{-- <th>المتجر</th> --}}
            <th>الحالة</th>
            <th> اضيف في</th>
        </tr>
    </thead>
    <tbody>
        @php
            $products = $category->products()->latest()->paginate(5);
        @endphp
        @forelse($products as $product)
        <tr>
            <td><img src="{{ asset('storage/' . $product->image) }}" alt="" height="50"></td>
            <td>{{ $product->name }}</td>
            {{-- <td>{{ $product->store->name }}</td> --}}
            <td>{{ $product->status }}</td>
            <td>{{ $product->created_at }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="4">لا يوجد منتجات</td>
        </tr>
        @endforelse
    </tbody>
</table>

{{ $products->links() }}
</div>
@endsection
