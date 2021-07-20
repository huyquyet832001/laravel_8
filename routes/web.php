<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/users', function () {
    //lấy toàn bộ bản ghi trong database users
    // $listDB =   DB::table('users')->get();
    // dd($listDB);
    $listUser = User::all();
    return view('admin/users/index', [
        'data' => $listUser,
    ]);
})->name('admin.users.index');
//trả về giao diện thêm mới
Route::view(
    '/admin/users/create',
    'admin/users/create'
)->name('admin.users.create');
//nhận dữ liệu gửi lên và lưu vào db
Route::post('admin/users/store', function () {
    //request()->all() lấy toàn bộ dữ liệu gửi tên
    // dd(request()->all());
    // dd(request()->except('_token')); //except là loại trừ _token không muốn lấy
    $data = request()->except('_token');
    $data['password'] = ' $2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi';
    $result =   User::create($data);

    //thêm mới dữ liệu vào DB

    return redirect()->route('admin.users.index');
})->name('admin.users.store');

Route::get('admin/users/edit/{id}', function ($id) {
    //trả về giao diện cập nhật
    $data = User::find($id);
    return view('admin/users/edit', [
        'data' => $data,
    ]);
})->name('admin.users.edit');
Route::post('admin/users/update/{id}', function ($id) {
    //nhận dữ liệu gửi lên và lưu vào db
    $user = User::find($id);
    $data = request()->except('_token');
    // $user->name=$data['name'];
    // $user->email=$data['email'];
    // $user->password=$data['password'];
    // $user->gender=$data['gender'];
    // $user->role=$data['role'];
    // $user->address=$data['address'];
    $user->update($data);
    return redirect()->route('admin.users.index');
})->name('admin.users.update');
Route::post('admin/users/delete/{id}', function ($id) {
    //xóa dữ liệu theo id
    $user = User::find($id);
    $user->delete();
    return redirect()->route('admin.users.index');
})->name('admin.users.delete');
//view trả ra view tương ứng với url
Route::view('/welcome', 'welcome');
/*
-match:mapping url với callback tương ứng,mapping theo nhiều phương thức http đã khai báo
-any: mappping url với callback tương ứng tất cả các phương thức http
*/
//Route Products

Route::get('/admin/products', function () {
    //lấy toàn bộ bản ghi trong database products
    // $listDB =   DB::table('products')->get();
    // dd($listDB);
    $listProduct = Product::all();
    return view('admin/products/index', [
        'data' => $listProduct,
    ]);
})->name('admin.products.index');
Route::get(
    '/admin/products/create',
    function () {
        $listCategory = Category::all();
        return view('admin.products.create', [
            'data' => $listCategory,
        ]);
    }
)->name('admin.products.create');


Route::post('admin/products/store', function () {
    //request()->all() lấy toàn bộ dữ liệu gửi tên
    // dd(request()->all());
    // dd(request()->except('_token')); //except là loại trừ _token không muốn lấy
    $data = request()->except('_token');
    $result =   Product::create($data);

    //thêm mới dữ liệu vào DB

    return redirect()->route('admin.products.index');
})->name('admin.products.store');

Route::get('admin/products/edit/{id}', function ($id) {
    //trả về giao diện cập nhật
    $data = Product::find($id);
    return view('admin/products/edit', [
        'data' => $data,
    ]);
})->name('admin.products.edit');
Route::post('admin/products/update/{id}', function ($id) {
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
})->name('admin.products.update');
Route::post('admin/products/delete/{id}', function ($id) {
    //xóa dữ liệu theo id
    $product = Product::find($id);
    $product->delete();
    return redirect()->route('admin.products.index');
})->name('admin.products.delete');



//Route Category

Route::get('/admin/categories', function () {
    //lấy toàn bộ bản ghi trong database products
    // $listDB =   DB::table('products')->get();
    // dd($listDB);
    $listCategory = Category::all();
    return view('admin/categories/index', [
        'data' => $listCategory,
    ]);
})->name('admin.categories.index');
Route::view(
    '/admin/categories/create',
    'admin/categories/create'
)->name('admin.categories.create');

Route::post('admin/categories/store', function () {
    //request()->all() lấy toàn bộ dữ liệu gửi tên
    // dd(request()->all());
    // dd(request()->except('_token')); //except là loại trừ _token không muốn lấy
    $data = request()->except('_token');
    $result =   Category::create($data);

    //thêm mới dữ liệu vào DB

    return redirect()->route('admin.categories.index');
})->name('admin.categories.store');

Route::get('admin/categories/edit/{id}', function ($id) {
    //trả về giao diện cập nhật
    $data = Category::find($id);
    return view('admin/categories/edit', [
        'data' => $data,
    ]);
})->name('admin.categories.edit');
Route::post('admin/categories/update/{id}', function ($id) {
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
})->name('admin.categories.update');
Route::post('admin/categories/delete/{id}', function ($id) {
    //xóa dữ liệu theo id
    $Category = Category::find($id);
    $Category->delete();
    return redirect()->route('admin.categories.index');
})->name('admin.categories.delete');
