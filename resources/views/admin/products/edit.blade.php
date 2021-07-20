@extends("layout")
@section('title')
    Sửa Products
@endsection
@section('contents')
    <form method="POST" action="{{ route('admin.products.update', ['id' => $data->id]) }}">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputEmail4">Name</label>
                <input type="text" class="form-control" placeholder="Name" name="name" value="{{ $data->name }}">
            </div>
            <div class="form-group col-md-6">
                <label for="inputEmail4">Price</label>
                <input type="number" class="form-control" placeholder="Price" value="{{ $data->price }}" name="price">
            </div>
            <div class="form-group col-md-6">
                <label>Quantity</label>
                <input type="text" class="form-control" placeholder="quantity" name="quantity"
                    value="{{ $data->quantity }}">
            </div>
            <div class="form-group col-md-6">
                <label for="">Category_id</label>
                <input type="text" class="form-control" placeholder="category_id" name="category_id"
                    value="{{ $data->category_id }}">
            </div>
            <div class="form-group col-md-6">
                <label for="">Image</label>
                <input type="text" class="form-control" placeholder="Image" name="image" value="{{ $data->image }}">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
