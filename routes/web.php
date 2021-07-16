<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
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
    $listDB =   DB::table('users')->get();
    // dd($listDB);
    return view('admin/users/index', [
        'data' => $listDB,
    ]);
})->name('admin.users.index');
//trả về giao diện thêm mới
Route::view(
    '/admin/users/create',
    'admin/users/create'
)->name('admin.users.create');
//nhận dữ liệu gửi lên và lưu vào db
Route::post('admin/users/store', function () {
   
   return redirect()->route('admin.users.index');
})->name('admin.users.store');

Route::get('admin/users/edit/{id}', function ($id) {
    //trả về giao diện cập nhật
  $data =  DB::table('users')->find($id);
    return view('admin/users/edit',[
        'data'=>$data,
    ]);
})->name('admin.users.edit');
Route::post('admin/users/update/{id}', function () {
    //nhận dữ liệu gửi lên và lưu vào db
})->name('admin.users.update');
Route::post('admin/users/delete/{id}', function () {
    //xóa dữ liệu theo id
    return redirect()->route('admin.users.index');
})->name('admin.users.delete');
//view trả ra view tương ứng với url
Route::view('/welcome', 'welcome');
/*
-match:mapping url với callback tương ứng,mapping theo nhiều phương thức http đã khai báo
-any: mappping url với callback tương ứng tất cả các phương thức http
*/
