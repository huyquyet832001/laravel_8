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
   return view('admin/users/index',[
       'data'=>$listDB,
   ]);
});
Route::view('/admin/users/create',
'admin/users/create'
);

Route::post('/users',function(){
dd($_REQUEST);
});
//view trả ra view tương ứng với url
Route::view('/welcome','welcome');
/*
-match:mapping url với callback tương ứng,mapping theo nhiều phương thức http đã khai báo
-any: mappping url với callback tương ứng tất cả các phương thức http
*/

