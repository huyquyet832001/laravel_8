@extends("layout")
@section('title')
    Thêm mới Products
@endsection
@section('contents')
    <form method="POST" class="mt-5" action="{{ route('admin.products.store') }}">
        @csrf
        <div class="mt-3">
            <label>Name</label>
            <input class="mt-3 form-control" type="text" name="name" />
        </div>
        <div class="mt-3">
            <label>Price</label>
            <input class="mt-3 form-control" type="text" name="price" />
        </div>
        <div class="mt-3">
            <label>Quantity</label>
            <input class="mt-3 form-control" type="text" name="quantity" />
        </div>
        <div class="mt-3">
            <label>Category_id</label>
            <select class="custom-select rounded-0" name="category_id" id="exampleSelectRounded0">
                @foreach ($data as $rel)
                    <option value="{{ $rel->id }}">{{ $rel->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mt-3">
            <label>Image</label>
            <input class="mt-3 form-control" type="file" name="image" />
        </div>

        <button class="mt-3 btn btn-primary">Create</button>
    </form>
@endsection
