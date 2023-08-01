@extends('admin.admin')


@section('title', 'Categories List')

@section('content')
<h1 class="h3 mb-2 text-gray-800">Categories</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="10    0%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Category Code</th>
                        <th>Category Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $count = 1; @endphp
                    @foreach ($category as $class)
                        <tr>
                            <td>{{ $count }}</td>
                            <td>{{ $class->category_code  }}</td>
                            <td>{{ $class->category_name }}</td>
                            <td>
                                {{-- <a href="user/delete/{{$class->id}}" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Bạn có chắc muốn xóa không ?')">
                                    <i class="fas fa-trash">Delete</i>
                                </a>
                                <a href="user/edit/{{$class->id}}" class="btn btn-primary btn-circle btn-sm">
                                    <i class="fas fa-pen"></i> Edit
                                </a> --}}
                                <a href="{{ route('admin.category.index.delete', ['id'=>$class->id]) }}" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Bạn có chắc muốn xóa không ?')">
                                    <i class="fas fa-trash">Delete</i>
                                </a>
                                <a href="{{ route('admin.category.edit', ['id'=>$class->id]) }}" class="btn btn-primary btn-circle btn-sm">
                                    <i class="fas fa-pen"></i> Edit
                                </a>
                            </td>
                        </tr>
                    @php
                    $count++;
                    @endphp
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
</div>
@endsection
