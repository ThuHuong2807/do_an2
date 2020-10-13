<?php 

namespace App\Http\Model;

use DB;

class SinhVienModel
{
	public $ma_sinh_vien;
	public $ten_sinh_vien;
	public $ngay_sinh;
	public $gioi_tinh;
	public $so_dien_thoai;
	public $email;
	public $ma_lop;
	public $dia_chi;
	static function get_all(){
		$array = DB::select('select * from sinh_vien
			join lop on lop.ma_lop = sinh_vien.ma_lop');
		return $array;
	}
	static function get_theo_ma_lop($ma_lop){
		$array_lop = DB::select("select * from sinh_vien where ma_lop = '$ma_lop'");
		return $array_lop;
	}
	public function insert(){
		DB::insert("insert into sinh_vien(ten_sinh_vien,ngay_sinh,gioi_tinh,so_dien_thoai,email,ma_lop,dia_chi) values (?,?,?,?,?,?,?)",[
			$this->ten_sinh_vien,
			$this->ngay_sinh,
			$this->gioi_tinh,
			$this->so_dien_thoai,
			$this->email,
			$this->ma_lop,
			$this->dia_chi
		]);
	}
	static function get_one($ma_sinh_vien){
		$array = DB::select('select * from sinh_vien where ma_sinh_vien = ?',[
			$ma_sinh_vien
		]);
		return $array[0];
	}
	public function update()
	{
		DB::update("update sinh_vien set 
			ten_sinh_vien = ?,
			ngay_sinh = ?,
			gioi_tinh = ?,
			so_dien_thoai = ?,
			email = ?,
			ma_lop = ?,
			dia_chi = ?
			where ma_sinh_vien = ?",[
			$this->ten_sinh_vien,
			$this->ngay_sinh,
			$this->gioi_tinh,
			$this->so_dien_thoai,
			$this->email,
			$this->ma_lop,
			$this->dia_chi,
			$this->ma_sinh_vien
		]);
} 
	public function ngay_sinh()
	{
		$date = date_create($this->ngay_sinh);
		return date_format($date,"d-m-Y");
	}
}