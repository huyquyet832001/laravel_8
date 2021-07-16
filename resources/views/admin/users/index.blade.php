@extends("layout")
@section('title')
    Quản lý users
@endsection
@section('contents')
    <div class="row">
        <div class="col-6">
            <a href="{{ route('admin.users.create') }}" class="btn btn-success">
                Create
            </a>
        </div>
    </div>
    @if (!empty($data))
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Address</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Role</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->address }}</td>
                        <td>{{ $item->gender }}</td>
                        <td>{{ $item->role }}</td>
                        <td>
                            <a href="{{ route('admin.users.edit', ['id' => $item->id]) }}"
                                class="btn btn-primary">Update</a>
                        </td>
                        <td>
                            <button class="btn btn-danger" role="button" data-toggle="modal" data-target="#confirm_delete_{{ $item->id }}">Delete</button>

                            <div class="modal fade" id="confirm_delete_{{ $item->id }}" tabindex="-1" role="dialog">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Xác nhận</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Xác nhận xóa bản ghi này?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>

                                        <form method="POST" action="{{ route('admin.users.delete', [ 'id' => $item->id ]) }}">
                                            @csrf
                                            <button type="button" class="btn btn-danger">Xóa</button>
                                        </form>
                                    </div>
                                  </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    @else
        <h2>Không có dữ liệu</h2>
    @endif
@endsection
