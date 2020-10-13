<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhanCong extends Model
{
    protected $table = 'phan_cong';
    protected $primaryKey = ['ma_lop','ma_mon_hoc'];
    public $timestamps = false;
    protected $incremeting = false;
    protected $fillable = ['ten_giao_vien','ten_lop','ten_mon_hoc'];
}
