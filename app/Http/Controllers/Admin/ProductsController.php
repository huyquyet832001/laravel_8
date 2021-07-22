<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductsController extends Controller
{
    //
    public function index()
    {
        //lấy toàn bộ bản ghi trong database products
        // $listDB =   DB::table('products')->get();
        // dd($listDB);
        $listProduct = Product::all();
        return view('admin/products/index', [
            'data' => $listProduct,
        ]);
    }
    public function show()
    {
    }
    public function create()
    {
        $listCategory = Category::all();
        return view('admin/products/create', [
            'data' => $listCategory,
        ]);
    }
    public function store()
    {
        //request()->all() lấy toàn bộ dữ liệu gửi tên
        // dd(request()->all());
        // dd(request()->except('_token')); //except là loại trừ _token không muốn lấy
        $data = request()->except('_token');
        $result =   Product::create($data);

        //thêm mới dữ liệu vào DB

        return redirect()->route('admin.products.index');
    }
    public function edit($id)
    {
        //trả về giao diện cập nhật
        $data = Product::find($id);
        return view('admin/products/edit', [
            'data' => $data,
        ]);
    }
    public function update($id)
    {
        //nhận dữ liệu gửi lên và lưu vào db
        $product = Product::find($id);
        $data = request()->except('_token');
        // $user->name=$data['name'];
        // $user->email=$data['email'];
        // $user->password=$data['password'];
        // $user->gender=$data['gender'];
        // $user->role=$data['role'];
        // $user->address=$data['address'];
        $product->update($data);
        return redirect()->route('admin.products.index');
    }
    public function delete($id)
    {
        //xóa dữ liệu theo id
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('admin.products.index');
    }
}
