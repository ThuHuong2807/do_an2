<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GiaoVu extends Model
{
    protected $table = 'giao_vu';
    protected $primaryKey = 'ma_giao_vu';
    public $timestamps = false;
    protected $fillable = ['ten_giao_vu','ngay_sinh','gioi_tinh','email','mat_khau','so_dien_thoai','dia_chi'];
}
