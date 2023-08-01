
@extends('admin.admin')


@section('title', 'Member list ')

@section('content')
<h1 class="h3 mb-2 text-gray-800">Member</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <h1>Tạo danh mục</h1>
    <form action="{{ route('admin.permission.store') }}" method="post">
        @csrf
        <label>Permission Name</label>
        <input type="text" name="name" required />
        <label>Guard Name</label>
        <input type="text" name="guard_name" required />
        <label>Group</label>
        <input type="text" name="group" required />
        <button type="submit">Thêm</button>
    </form>
        </div>
    </div>
</div>
@endsection

