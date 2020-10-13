<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GiaoVien extends Model
{
    protected $table = 'giao_vien';
    protected $primaryKey = 'ma_giao_vien';
    public $timestamps = false;
    protected $fillable = ['ten_giao_vien','ngay_sinh','gioi_tinh','email','mat_khau','so_dien_thoai','dia_chi'];
}
