@extends("layout")
@section('title')
    Sửa Category
@endsection
@section('contents')
    <form method="POST" action="{{ route('admin.categories.update', ['id' => $data->id]) }}">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputEmail4">Name</label>
                <input type="text" class="form-control" placeholder="Name" name="name" value="{{ $data->name }}">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
