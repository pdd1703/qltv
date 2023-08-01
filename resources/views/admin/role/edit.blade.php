@extends('admin.admin')


@section('title', 'Edit Role')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Chi tiết thông tin thành viên</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <form action="{{route('admin.role.update', $role['id'])}}" method="POST">
                        @csrf
                    <tr>
                        <input type="hidden" value="{{ $role['id'] }}" name="id">
                        <th>Role Code</th>

                        <td><input style="width: 100%;" value="{{ $role['role_code'] }}" name="role_code"></td>
                    </tr>
                    <tr>
                        <th>Role Name</th>

                        <td><input style="width: 100%;" value="{{ $role['role_name'] }}" name="role_name"></td>
                    </tr>
                    <button type="submit">Save</button>
                </form>

                </table>
            </div>
        </div>
    </div>
@endsection
