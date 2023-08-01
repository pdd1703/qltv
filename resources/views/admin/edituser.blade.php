@extends('admin.admin')


@section('title', 'Member list ')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Chi tiết thông tin thành viên</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <form action="/admin/user/edit" method="POST">
                        @csrf
                    <tr>
                        <input type="hidden" value="{{ $data['users']->id }}" name="id">
                        <th>Name</th>

                        <td><input style="width: 100%;" value="{{ $data['users']->name }}" name="name"></td>
                    </tr>
                    <tr>
                        <th>Email</th>

                        <td><input style="width: 100%;" value="{{ $data['users']->email }}" name="email"></td>
                    </tr>
                    <tr>
                        <th>Role</th>

                        <td><select name= "role" id="cars">
                            <option >Chose Role</option>
                            <option value="1">Admin</option>
                            <option value="2">Mananer</option>
                            <option value="3">User</option>
                          </select></td>
                    </tr>
                    <button type="submit">Save</button>
                </form>

                </table>
            </div>
        </div>
    </div>
@endsection
