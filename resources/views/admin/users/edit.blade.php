@extends("layout")
@section('title')
    Sửa Users
@endsection
@section('contents')
    <form method="POST" action="{{ route('admin.users.update', ['id' => $data->id]) }}">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputEmail4">Name</label>
                <input type="text" class="form-control" placeholder="Name" name="name" value="{{ $data->name }}">
            </div>
            <div class="form-group col-md-6">
                <label for="inputEmail4">Email</label>
                <input type="email" class="form-control" id="inputEmail4" placeholder="Email" value="{{ $data->email }}"
                    name="email">
            </div>
            <div class="form-group col-md-6">
                <label>Address</label>
                <input type="text" class="form-control" placeholder="Address" name="address" value="{{ $data->address }}">
            </div>
            <div class="form-group col-md-6">
                <label for="">Gender</label>
                <select name="gender" class="form-control" id="">
                    <option value="1" {{ $data->gender == 1 ? 'selected' : '' }}>male</option>
                    <option value="0" {{ $data->gender == 0 ? 'selected' : '' }}>Female</option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="">Role</label>
                <select name="role" class="form-control" id="">
                    <option value="0" {{ $data->gender == 0 ? 'selected' : '' }}>User</option>
                    <option value="1" {{ $data->gender == 1 ? 'selected' : '' }}>Admin</option>
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
