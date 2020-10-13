<?php 

namespace App\Http\Model;

use DB;

class GiaoVuModel
{
	public $ma_giao_vu;
	public $ten_giao_vu;
	public $ngay_sinh;
	public $gioi_tinh;
	public $so_dien_thoai;
	public $email;
	public $mat_khau;
	public $dia_chi;
	static function get_all(){
		$array = DB::select('select * from giao_vu');
		return $array;
	}
	public function insert(){
		DB::insert("insert into giao_vu(ten_giao_vu,ngay_sinh,gioi_tinh,so_dien_thoai,email,mat_khau,dia_chi) values (?,?,?,?,?,?,?)",[
			$this->ten_giao_vu,
			$this->ngay_sinh,
			$this->gioi_tinh,
			$this->so_dien_thoai,
			$this->email,
			$this->mat_khau,
			$this->dia_chi
		]);
	}
	static function get_one($ma_giao_vu){
		$array = DB::select('select * from giao_vu where ma_giao_vu = ?',[
			$ma_giao_vu
		]);
		return $array[0];
	}
	public function get_login()
	{
		$array = DB::select('select * from giao_vu where email = ? and mat_khau = ?',[
			$this->email,
			$this->mat_khau
		]);
		return $array;
	}
	public function update()
	{
		DB::update("update giao_vu set 
			ten_giao_vu = ?,
			ngay_sinh = ?,
			gioi_tinh = ?,
			so_dien_thoai = ?,
			email = ?,
			mat_khau = ?,
			dia_chi = ?
			where ma_giao_vu = ?",[
			$this->ten_giao_vu,
			$this->ngay_sinh,
			$this->gioi_tinh,
			$this->so_dien_thoai,
			$this->email,
			$this->mat_khau,
			$this->dia_chi,
			$this->ma_giao_vu
		]);
	}

	static function get_profile($ma_giao_vu){
		$array = DB::select('select * from giao_vu where ma_giao_vu = ?',[
			$ma_giao_vu
		]);
		return $array[0];
	}
	// static function get_lich_phan_cong($ma_lop,$ma_giao_vien){
	// 	$array = DB::select('select phan_cong.*,lop.ten_lop,mon_hoc.ten_mon_hoc,giao_vien.ten_giao_vien from phan_cong 
	// 		inner join lop on phan_cong.ma_lop = lop.ma_lop 
	// 		inner join mon_hoc on phan_cong.ma_mon_hoc = mon_hoc.ma_mon_hoc 
	// 		inner join giao_vien on phan_cong.ma_giao_vien = giao_vien.ma_giao_vien
	// 		where phan_cong.ma_giao_vien = ? and phan_cong.ma_lop = ?',[
	// 		$ma_giao_vien,
	// 		$ma_lop
	// 	]);
	// 	return $array;
	// }
	static function get_lich_phan_cong_theo_lop($ma_lop){
		$array = DB::select('select phan_cong.*,lop.ten_lop,mon_hoc.ten_mon_hoc,giao_vien.ten_giao_vien from phan_cong 
			inner join lop on phan_cong.ma_lop = lop.ma_lop 
			inner join mon_hoc on phan_cong.ma_mon_hoc = mon_hoc.ma_mon_hoc 
			inner join giao_vien on phan_cong.ma_giao_vien = giao_vien.ma_giao_vien
			where phan_cong.ma_lop = ? ',[
			$ma_lop
		]);
		return $array;
	}
	static function get_lich_phan_cong_theo_giao_vien($ma_giao_vien){
		$array = DB::select('select phan_cong.*,lop.ten_lop,mon_hoc.ten_mon_hoc,giao_vien.ten_giao_vien from phan_cong 
			inner join lop on phan_cong.ma_lop = lop.ma_lop 
			inner join mon_hoc on phan_cong.ma_mon_hoc = mon_hoc.ma_mon_hoc 
			inner join giao_vien on phan_cong.ma_giao_vien = giao_vien.ma_giao_vien
			where phan_cong.ma_giao_vien = ? ',[
			$ma_giao_vien
		]);
		return $array;
	}

}