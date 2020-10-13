<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MonHoc extends Model
{
    protected $table = 'mon_hoc';
    protected $primaryKey = 'ma_mon_hoc';
    public $timestamps = false;
    protected $fillable = ['ten_mon_hoc'];
}
