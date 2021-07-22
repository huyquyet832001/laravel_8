<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        //lấy toàn bộ bản ghi trong database products
        // $listDB =   DB::table('products')->get();
        // dd($listDB);
        $listCategory = Category::all();
        return view('admin/categories/index', [
            'data' => $listCategory,
        ]);
    }
    public function show()
    {
    }
    public function create()
    {
        return view('admin/categories/create');
    }
    public function store()
    {
        //request()->all() lấy toàn bộ dữ liệu gửi tên
        // dd(request()->all());
        // dd(request()->except('_token')); //except là loại trừ _token không muốn lấy
        $data = request()->except('_token');
        $result =   Category::create($data);

        //thêm mới dữ liệu vào DB

        return redirect()->route('admin.categories.index');
    }
    public function edit($id)
    {
        //trả về giao diện cập nhật
        $data = Category::find($id);
        return view('admin/categories/edit', [
            'data' => $data,
        ]);
    }
    public function update($id)
    {
        //nhận dữ liệu gửi lên và lưu vào db
        $Category = Category::find($id);
        $data = request()->except('_token');
        // $user->name=$data['name'];
        // $user->email=$data['email'];
        // $user->password=$data['password'];
        // $user->gender=$data['gender'];
        // $user->role=$data['role'];
        // $user->address=$data['address'];
        $Category->update($data);
        return redirect()->route('admin.categories.index');
    }
    public function delete($id)
    {
        //xóa dữ liệu theo id
        $Category = Category::find($id);
        $Category->delete();
        return redirect()->route('admin.categories.index');
    }
}
