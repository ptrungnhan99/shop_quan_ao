<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;
    protected $table = 'slider';
    protected $fillable = [
        'id',
        'ten_slider',
        'tieu_de',
        'hinh',
        'trang_thai'
    ];
}
