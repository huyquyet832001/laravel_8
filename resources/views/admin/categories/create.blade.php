@extends("layout")
@section('title')
    Thêm mới Category
@endsection
@section('contents')
    <form method="POST" class="mt-5" action="{{ route('admin.categories.store') }}">
        @csrf
        <div class="mt-3">
            <label>Name</label>
            <input class="mt-3 form-control" type="text" name="name" />
        </div>

        <button class="mt-3 btn btn-primary">Create</button>
    </form>
@endsection
