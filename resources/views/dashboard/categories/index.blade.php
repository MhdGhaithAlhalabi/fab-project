@extends('layouts.dashboard')

@section('title', 'الاصناف')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">الاصناف</li>
@endsection

@section('content')
    <div class="container">
        <div class="mb-5">
            @if (Auth::user()->can('categories.create'))
                <a href="{{ route('dashboard.categories.create') }}" class="btn btn-sm btn-outline-primary mr-2">اضافة</a>
            @endif
            <a href="{{ route('dashboard.categories.trash') }}" class="btn btn-sm btn-outline-dark">سلة المحذوفات</a>
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
                    <th>الاسم</th>
                    <th>اسم الاب</th>
                    <th>عدد المنتجات #</th>
                    <th>الحالة</th>
                    <th>اضيف بتاريخ</th>
                    <th colspan="2"></th>
                </tr>
            </thead>
            <tbody>
                @forelse($categories as $category)
                    <tr>

                        <td>
                            @if ($category->image)
                                <img src="{{ asset('storage/' . $category->image) }}" alt="" height="50">
                            @endif
                        </td>
                        <td>{{ $category->id }}</td>
                        <td><a href="{{ route('dashboard.categories.show', $category->id) }}">{{ $category->name }}</a></td>
                        <td>{{ $category->parent->name }}</td>
                        <td>{{ $category->products_number }}</td>
                        <td>{{ $category->status }}</td>
                        <td>{{ $category->created_at }}</td>
                        <td>
                            @can('categories.update')
                                <a href="{{ route('dashboard.categories.edit', $category->id) }}"
                                    class="btn btn-sm btn-outline-success">تعديل</a>
                            @endcan
                        </td>
                        <td>
                            @can('categories.delete')
                                <form action="{{ route('dashboard.categories.destroy', $category->id) }}" method="post">
                                    @csrf
                                    <!-- Form Method Spoofing -->
                                    <input type="hidden" name="_method" value="delete">
                                    @method('delete')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">حذف</button>
                                </form>
                            @endcan
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9">لا يوجد اي صنف مضاف .</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{ $categories->withQueryString()->appends(['search' => 1])->links() }}
    </div>
@endsection
