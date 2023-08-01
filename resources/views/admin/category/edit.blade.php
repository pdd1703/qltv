@extends('admin.admin')


@section('title', 'Edit Category') ')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Chi tiết thông tin thành viên</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <form action="{{route('admin.category.update', $category['id'])}}" method="POST">
                        @csrf
                    <tr>
                        <input type="hidden" value="{{ $category['id'] }}" name="id">
                        <th>Category Code</th>

                        <td><input style="width: 100%;" value="{{ $category['category_code'] }}" name="category_code"></td>
                    </tr>
                    <tr>
                        <th>Category Name</th>

                        <td><input style="width: 100%;" value="{{ $category['category_name'] }}" name="category_name"></td>
                    </tr>
                    <button type="submit">Save</button>
                </form>

                </table>
            </div>
        </div>
    </div>
@endsection
