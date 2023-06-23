@extends('layouts.dashboard')

@section('title', 'المدراء')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">المدراء</li>
@endsection

@section('content')

<div class="mb-5">
    <a href="{{ route('dashboard.admins.create') }}" class="btn btn-sm btn-outline-primary mr-2">انشاء</a>
</div>

<x-alert type="success" />
<x-alert type="info" />

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>الاسم</th>
            <th>الايميل</th>
            <th>القواعد</th>
            <th>انشأ في</th>
            <th colspan="2"></th>
        </tr>
    </thead>
    <tbody>
        @forelse($admins as $admin)
        <tr>
            <td>{{ $admin->id }}</td>
            {{-- <td><a href="{{ route('dashboard.admins.show', $admin->id) }}">{{ $admin->name }}</a></td> --}}
            <td>{{ $admin->name}} </td>
            <td>{{ $admin->email }}</td>
            <td></td>
            <td>{{ $admin->created_at }}</td>
            <td>
                @can('admins.update')
                <a href="{{ route('dashboard.admins.edit', $admin->id) }}" class="btn btn-sm btn-outline-success">تعديل</a>
                @endcan
            </td>
            <td>
                @can('admins.delete')
                <form action="{{ route('dashboard.admins.destroy', $admin->id) }}" method="post">
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
            <td colspan="6">لا يوجد مدراء</td>
        </tr>
        @endforelse
    </tbody>
</table>

{{ $admins->withQueryString()->links() }}

@endsection
