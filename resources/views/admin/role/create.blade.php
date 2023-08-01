
@extends('admin.admin')


@section('title', 'Role List ')

@section('content')
<h1 class="h3 mb-2 text-gray-800">Member</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <h1>Tạo danh mục</h1>
    <form action="{{ route('admin.role.store') }}" method="post">
        @csrf
        <label>Role Code</label>
        <input type="text" name="role_code" required />
        <label>Role Name</label>
        <input type="text" name="role_name" required />
        <button type="submit">Thêm</button>
    </form>
        </div>
    </div>
</div>
@endsection

