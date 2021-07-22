<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //
    public function index()
    {
        $listUser = User::all();
        return view('admin/users/index', [
            'data' => $listUser,
        ]);
    }
    public function show()
    {
    }
    public function create()
    {
        return view('/admin/users/create');
    }
    public function store()
    {
        //request()->all() lấy toàn bộ dữ liệu gửi tên
        // dd(request()->all());
        // dd(request()->except('_token')); //except là loại trừ _token không muốn lấy
        $data = request()->except('_token');
        $data['password'] = ' $2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi';
        $result =   User::create($data);

        //thêm mới dữ liệu vào DB

        return redirect()->route('admin.users.index');
    }
    public function edit($id)
    {
        //trả về giao diện cập nhật
        $data = User::find($id);
        return view('admin/users/edit', [
            'data' => $data,
        ]);
    }
    public function update($id)
    {
        //nhận dữ liệu gửi lên và lưu vào db

        // $user->name=$data['name'];
        // $user->email=$data['email'];
        // $user->password=$data['password'];
        // $user->gender=$data['gender'];
        // $user->role=$data['role'];
        // $user->address=$data['address'];
        $user = User::find($id);
        $data = request()->except('_token');
        $user->update($data);
        return redirect()->route('admin.users.index');
    }
    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('admin.users.index');
    }
}
