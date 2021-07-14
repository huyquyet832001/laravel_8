@extends("layout")
@section('title')
Thêm mới Users
@endsection
@section('contents')
<form method="POST" action="/admin/users">
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputEmail4">Name</label>
            <input type="text" class="form-control" placeholder="Name" name="name">
        </div>
        <div class="form-group col-md-6">
            <label for="inputEmail4">Email</label>
            <input type="email" class="form-control" id="inputEmail4" placeholder="Email" name="email">
        </div>
        <div class="form-group col-md-6">
            <label>Address</label>
            <input type="text" class="form-control" placeholder="Address" name="address">
        </div>
        <div class="form-group col-md-6">
            <label for="">Gender</label>
            <select name="gender" id="">
                <option value="1">male</option>
                <option value="0">Female</option>
            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="">Role</label>
            <select name="role" id="">
                <option value="0">User</option>
                <option value="1">Admin</option>
            </select>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Create</button>
</form>
@endsection