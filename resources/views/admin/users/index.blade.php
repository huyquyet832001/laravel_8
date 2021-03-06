@extends("layout")
@section('title')
Quản lý users
@endsection
@section('contents')
@if(!empty($data))
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Address</th>
            <th scope="col">Gender</th>
            <th scope="col">Role</th>
            
        </tr>
    </thead>
    <tbody>     
@foreach($data as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->email}}</td>
            <td>{{$item->address}}</td>
            <td>{{$item->gender}}</td>
            <td>{{$item->role}}</td>
        </tr>     
@endforeach
    </tbody>
</table>

@else
<h2>Không có dữ liệu</h2>
@endif
@endsection