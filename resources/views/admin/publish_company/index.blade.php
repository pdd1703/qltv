@extends('admin.admin')


@section('title', 'Publish Company')

@section('content')
<h1 class="h3 mb-2 text-gray-800">Publish Company</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Company Code</th>
                        <th>Company Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $count = 1; @endphp
                    @foreach ($publish_company as $class)
                        <tr>
                            <td>{{ $count }}</td>
                            <td>{{ $class->company_code  }}</td>
                            <td>{{ $class->company_name }}</td>
                            <td>
                                <a href="{{ route('admin.publishCompany.delete', ['id'=>$class->id]) }}" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Bạn có chắc muốn xóa không ?')">
                                    <i class="fas fa-trash">Delete</i>
                                </a>
                                <a href="{{ route('admin.publishCompany.edit', ['id'=>$class->id]) }}" class="btn btn-primary btn-circle btn-sm">
                                    <i class="fas fa-pen">Edit</i>
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
