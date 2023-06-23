@extends('layouts.dashboard')
@section('title', 'خصائص المنتج')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item">المنتج {{ $product->name }}</li>
    <li class="breadcrumb-item active">اضافة خصائص</li>
@endsection
@section('content')
    <form action="{{ route('dashboard.products.storeAttributes',[$product]) }}" method="post" enctype="multipart/form-data">
        @csrf
            @include('dashboard.products.attribute._form2')
    </form>

@endsection
@push('scripts')
<script src="{{ asset('js/tagify.min.js') }}"></script>
<script src="{{ asset('js/tagify.polyfills.min.js') }}"></script>
<script>
    var inputElm = document.querySelector('[name=values]'),
        tagify = new Tagify(inputElm);
</script>
