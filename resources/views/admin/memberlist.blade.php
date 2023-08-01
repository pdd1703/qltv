@extends('admin.admin')


@section('title', 'Member list ')

@section('content')
<h1 class="h3 mb-2 text-gray-800">Member</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $count = 1; @endphp
                    @foreach ($data['users'] as $class)
                        <tr>
                            <td>{{ $count }}</td>
                            <td>{{ $class->name  }}</td>
                            <td>{{ $class->email }}</td>
                            <td>
                                <a href="" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Bạn có chắc muốn xóa không ?')">
                                    <i class="fas fa-trash">Edit</i>
                                </a>
                                <a href="" class="btn btn-primary btn-circle btn-sm">
                                    <i class="fas fa-pen"></i> Delete
                                </a>
                            </td>
                        </tr>
                    @php $count++; @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
