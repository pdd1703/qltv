@extends('admin.admin')


@section('title', 'Edit permission') ')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Chi tiết thông tin thành viên</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <form action="{{route('admin.permission.update', $permission['id'])}}" method="POST">
                        @csrf
                    <tr>
                        <input type="hidden" value="{{ $permission['id'] }}" name="id">
                        <th>Name</th>

                        <td><input style="width: 100%;" value="{{ $permission['name'] }}" name="name"></td>
                    </tr>
                    <tr>
                        <th>Guard Name</th>

                        <td><input style="width: 100%;" value="{{ $permission['guard_name'] }}" name="guard_name"></td>
                    </tr>
                    <tr>
                        <th>Group</th>

                        <td><input style="width: 100%;" value="{{ $permission['group'] }}" name="group"></td>
                    </tr>
                    <button type="submit">Save</button>
                </form>

                </table>
            </div>
        </div>
    </div>
@endsection
