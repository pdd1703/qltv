@extends('admin.admin')


@section('title', 'Edit Block')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Chi tiết thông tin thành viên</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <form action="{{route('admin.block.update', $block['id'])}}" method="POST">
                        @csrf
                    <tr>
                        <input type="hidden" value="{{ $block['id'] }}" name="id">
                        <th>Block Code</th>

                        <td><input style="width: 100%;" value="{{ $block['block_code'] }}" name="block_code"></td>
                    </tr>
                    <tr>
                        <th>Block Name</th>

                        <td><input style="width: 100%;" value="{{ $block['block_name'] }}" name="block_name"></td>
                    </tr>
                    <tr>
                        <th>Position</th>

                        <td><input style="width: 100%;" value="{{ $block['position'] }}" name="position"></td>
                    </tr>
                    <button type="submit">Save</button>
                </form>

                </table>
            </div>
        </div>
    </div>
@endsection
