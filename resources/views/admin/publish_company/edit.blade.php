@extends('admin.admin')


@section('title', 'Edit Company')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Chi tiết thông tin thành viên</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <form action="{{route('admin.publishCompany.update', $publish_company['id'])}}" method="POST">
                        @csrf
                    <tr>
                        <input type="hidden" value="{{ $publish_company['id'] }}" name="id">
                        <th>Company Code</th>

                        <td><input style="width: 100%;" value="{{ $publish_company['company_code'] }}" name="company_code"></td>
                    </tr>
                    <tr>
                        <th>Company Name</th>

                        <td><input style="width: 100%;" value="{{ $publish_company['company_name'] }}" name="company_name"></td>
                    </tr>
                    <button type="submit">Save</button>
                </form>

                </table>
            </div>
        </div>
    </div>
@endsection
