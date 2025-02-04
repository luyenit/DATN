<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class danh_muc extends Model
{
    use HasFactory;

    public $fillable = [
        'ten_danh_muc',
        'anh_danh_muc',
        'is_active',
    ];
    public function san_phams()
    {
        return $this->hasMany(san_pham::class);
    }

    // khuyến mãi theo danh mục 
    public function khuyen_mais()
{
    return $this->hasMany(khuyen_mai::class);
}


}
