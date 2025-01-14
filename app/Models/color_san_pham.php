<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class color_san_pham extends Model
{
    use HasFactory;

    protected $fillable = [
        'ten_color',
        'ma_mau'
    ];

    public function bien_the_san_phams()
    {
        return $this->hasMany(bien_the_san_pham::class);
    }
    public function san_pham()
    {
        return $this->belongsTo(san_pham::class); // Quan hệ với model sản phẩm
    }
}