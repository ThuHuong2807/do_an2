<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SinhVien extends Model
{
    protected $table = 'sinh_vien';
    protected $primaryKey = 'ma_sinh_vien';
    public $timestamps = false;
    protected $fillable = ['ten_sinh_vien','ngay_sinh','gioi_tinh','dia_chi','ma_lop','so_dien_thoai','email'];
}
