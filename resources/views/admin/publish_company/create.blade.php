
@extends('admin.admin')


@section('title', 'Company list ')

@section('content')
<h1 class="h3 mb-2 text-gray-800">Member</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <h1>Tạo danh mục</h1>
    <form action="{{ route('admin.publishCompany.store') }}" method="post">
        @csrf
        <label>Company Code</label>
        <input type="text" name="company_code" required />
        <label>Company Name</label>
        <input type="text" name="company_name" required />
        <button type="submit">Thêm</button>
    </form>
        </div>
    </div>
</div>
@endsection

