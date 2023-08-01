@extends('admin.admin')


@section('title', 'Permission')

@section('content')
<h1 class="h3 mb-2 text-gray-800">Permission</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="10    0%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Guard Name</th>
                        <th>Group</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $count = 1; @endphp
                    @foreach ($permission as $class)
                        <tr>
                            <td>{{ $count }}</td>
                            <td>{{ $class->name }}</td>
                            <td>{{ $class->guard_name }}</td>
                            <td>{{ $class->group }}</td>
                            <td>

                                <a href="{{ route('admin.permission.delete', ['id'=>$class->id]) }}" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Bạn có chắc muốn xóa không ?')">
                                    <i class="fas fa-trash">Delete</i>
                                </a>
                                <a href="{{ route('admin.permission.edit', ['id'=>$class->id]) }}" class="btn btn-primary btn-circle btn-sm">
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
<h1 class="h3 mb-2 text-gray-800">Info</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="10    0%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Guard Name</th>
                        <th>Group</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $count = 1; @endphp
                    @foreach ($permission as $class)
                        <tr>
                            <td>{{ $count }}</td>
                            <td>{{ $class->name }}</td>
                            <td>{{ $class->guard_name }}</td>
                            <td>{{ $class->group }}</td>
                            <td>

                                <a href="{{ route('admin.permission.delete', ['id'=>$class->id]) }}" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Bạn có chắc muốn xóa không ?')">
                                    <i class="fas fa-trash">Delete</i>
                                </a>
                                <a href="{{ route('admin.permission.edit', ['id'=>$class->id]) }}" class="btn btn-primary btn-circle btn-sm">
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
