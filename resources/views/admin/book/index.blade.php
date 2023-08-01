@extends('admin.admin')


@section('title', 'Books')

@section('content')
<h1 class="h3 mb-2 text-gray-800">Books</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Author ID</th>
                        <th>Category ID</th>
                        <th>Publishing Company ID</th>
                        <th>Block ID</th>
                        <th>Shelf</th>
                        <th>Summary</th>
                        <th>Publishing Year</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $count = 1; @endphp
                    @foreach ($book as $class)
                        <tr>
                            <td>{{ $count }}</td>
                            <td>{{ $class->title }}</td>
                            <td>{{ $class->author_id }}</td>
                            <td>{{ $class->category_id }}</td>
                            <td>{{ $class->publishing_company_id }}</td>
                            <td>{{ $class->block_id}}</td>
                            <td>{{ $class->shelf}}</td>
                            <td>{{ $class->summary}}</td>
                            <td>{{ $class->publishing_year}}</td>
                            <td>{{ $class->block_id}}</td>
                            <td>
                                <a href="{{ route('admin.book.delete', ['id'=>$class->id]) }}" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Bạn có chắc muốn xóa không ?')">
                                    <i class="fas fa-trash">Delete</i>
                                </a>
                                <a href="{{ route('admin.book.edit', ['id'=>$class->id]) }}" class="btn btn-primary btn-circle btn-sm">
                                    <i class="fas fa-pen">Edit</i>
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
