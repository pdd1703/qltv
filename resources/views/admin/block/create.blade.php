
@extends('admin.admin')


@section('title', 'Block list ')

@section('content')
<h1 class="h3 mb-2 text-gray-800">Member</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <h1>Tạo danh mục</h1>
    <form action="{{ route('admin.block.store') }}" method="post">
        @csrf
        <label>Block Code</label>
        <input type="text" name="block_code" required />
        <label>Block Name</label>
        <input type="text" name="block_name" required />
        <label>Position</label>
        <input type="text" name="position" required />
        <button type="submit">Thêm</button>
    </form>
        </div>
    </div>
</div>
@endsection

