<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    //chỉ định tên table trong trường hợp không đặt tên theo quy tắc Eloquent
    protected $table = 'products';
    //mặc định,Eloquent coi primary key là cột id
    protected $primarykey = "id";
    protected $fillable = [
        'name',
        'price',
        'image',
        'quantity',
        'category_id',
    ];
}