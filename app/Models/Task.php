<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    use HasFactory;
    // Chỉ định tên bảng
    protected $table = 'dataseed';
    public $fillable = ['name', 'description','state'];

     // Tắt timestamps
     public $timestamps = false;
}
