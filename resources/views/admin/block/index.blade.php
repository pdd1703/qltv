@extends('admin.admin')


@section('title', 'Block List')

@section('content')
<h1 class="h3 mb-2 text-gray-800">Block</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="10    0%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Block Code</th>
                        <th>Block Name</th>
                        <th>Position</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $count = 1; @endphp
                    @foreach ($block as $class)
                        <tr>
                            <td>{{ $count }}</td>
                            <td>{{ $class->block_code  }}</td>
                            <td>{{ $class->block_name }}</td>
                            <td>{{ $class->position}}</td>
                            <td>
                                {{-- <a href="user/delete/{{$class->id}}" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Bạn có chắc muốn xóa không ?')">
                                    <i class="fas fa-trash">Delete</i>
                                </a>
                                <a href="user/edit/{{$class->id}}" class="btn btn-primary btn-circle btn-sm">
                                    <i class="fas fa-pen"></i> Edit
                                </a> --}}
                                <a href="{{ route('admin.block.delete', ['id'=>$class->id]) }}" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Bạn có chắc muốn xóa không ?')">
                                    <i class="fas fa-trash">Delete</i>
                                </a>
                                <a href="{{ route('admin.block.edit', ['id'=>$class->id]) }}" class="btn btn-primary btn-circle btn-sm">
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
