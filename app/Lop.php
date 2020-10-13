<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lop extends Model
{
    protected $table = 'lop';
    protected $primaryKey = 'ma_lop';
    public $timestamps = false;
    protected $fillable = ['ten_lop'];
}
