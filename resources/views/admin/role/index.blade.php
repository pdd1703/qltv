@extends('admin.admin')


@section('title', 'Role List')

@section('content')
<h1 class="h3 mb-2 text-gray-800">role</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Role Code</th>
                        <th>Role Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $count = 1; @endphp
                    @foreach ($role as $class)
                        <tr>
                            <td>{{ $count }}</td>
                            <td>{{ $class->role_code  }}</td>
                            <td>{{ $class->role_name }}</td>
                            <td>
                                <a href="{{ route('admin.role.delete', ['id'=>$class->id]) }}" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Bạn có chắc muốn xóa không ?')">
                                    <i class="fas fa-trash">Delete</i>
                                </a>
                                <a href="{{ route('admin.role.edit', ['id'=>$class->id]) }}" class="btn btn-primary btn-circle btn-sm">
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
