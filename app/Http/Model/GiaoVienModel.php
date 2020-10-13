<?php 

namespace App\Http\Model;

use DB;

class GiaoVienModel
{
	public $ma_giao_vien;
	public $ten_giao_vien;
	public $ngay_sinh;
	public $gioi_tinh;
	public $so_dien_thoai;
	public $email;
	public $mat_khau;
	public $dia_chi;
	static function get_all(){
		$array = DB::select('select * from giao_vien');
		return $array;
	}
	public function insert(){
		DB::insert("insert into giao_vien(ten_giao_vien,ngay_sinh,gioi_tinh,so_dien_thoai,email,mat_khau,dia_chi) values (?,?,?,?,?,?,?)",[
			$this->ten_giao_vien,
			$this->ngay_sinh,
			$this->gioi_tinh,
			$this->so_dien_thoai,
			$this->email,
			$this->mat_khau,
			$this->dia_chi
		]);
	}
	public function get_login1()
	{	
		
		$array1 = DB::select('select * from giao_vien where email = ? and mat_khau = ?',[
			$this->email_1,
			$this->mat_khau_1
		]);
		
		return $array1;
	}
	static function get_one($ma_giao_vien){
		$array = DB::select('select * from giao_vien where ma_giao_vien = ?',[
			$ma_giao_vien
		]);
		return $array[0];
	}
	public function update()
	{
		DB::update("update giao_vien set 
			ten_giao_vien = ?,
			ngay_sinh = ?,
			gioi_tinh = ?,
			so_dien_thoai = ?,
			email = ?,
			mat_khau = ?,
			dia_chi = ?
			where ma_giao_vien = ?",[
			$this->ten_giao_vien,
			$this->ngay_sinh,
			$this->gioi_tinh,
			$this->so_dien_thoai,
			$this->email,
			$this->mat_khau,
			$this->dia_chi,
			$this->ma_giao_vien
		]);
	}

	static function get_profile($ma_giao_vien){
		$array = DB::select('select * from giao_vien where ma_giao_vien = ?',[
			$ma_giao_vien
		]);
		return $array[0];
	}
}