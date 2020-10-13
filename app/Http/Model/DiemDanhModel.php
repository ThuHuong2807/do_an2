<?php 

namespace App\Http\Model;

use DB;

class DiemDanhModel
{
	public $ma_diem_danh;
	public $ma_lop;
	public $ma_mon_hoc;
	public $ma_giao_vien;
	public $ngay_diem_danh;

	public function insert()
	{
		DB::insert("insert into diem_danh(ma_lop,ma_mon_hoc,ma_giao_vien,ngay_diem_danh) values (?,?,?,?)",[
			$this->ma_lop,
			$this->ma_mon_hoc,
			$this->ma_giao_vien,
			$this->ngay_diem_danh
		]);
	}

	public function update(){
	DB::update("update diem_danh
	set 
	tinh_trang_di_hoc = ?
	where ma_diem_danh = ? and ma_sinh_vien = ? ",[
		$this->tinh_trang_di_hoc,
		$this->ma_diem_danh,
		$this->ma_sinh_vien
		]);
	}

	static function get_diem_danh_theo_ma_mon_va_ma_lop_va_ngay_diem_danh($ma_mon_hoc,$ma_lop,$ngay_diem_danh){
		$array = DB::select("select ma_diem_danh from diem_danh where ma_mon_hoc = ? and ma_lop = ? and ngay_diem_danh = ?",[
			$ma_mon_hoc,
			$ma_lop,
			$ngay_diem_danh
		]);
		return $array;
	}

	static function get_giao_vien_duoc_phan_cong($ma_lop,$ma_mon_hoc,$ngay_diem_danh,$ma_giao_vien){
			$array = DB::select("select * from diem_danh_chi_tiet
				join diem_danh on diem_danh_chi_tiet.ma_diem_danh = diem_danh.ma_diem_danh
			 where ma_giao_vien = ? and ma_lop = ? and ma_mon_hoc = ? and ngay_diem_danh = ?",[
			$ma_giao_vien,
			$ma_lop,
			$ma_mon_hoc,
			$ngay_diem_danh
		]);
		return $array;
	}

	static function count_sv_tinh_trang($ma_lop,$ma_mon_hoc,$tinh_trang){
		$array = DB::select("
			SELECT * FROM diem_danh JOIN diem_danh_chi_tiet ON diem_danh.ma_diem_danh = diem_danh_chi_tiet.ma_diem_danh
			JOIN lop ON lop.ma_lop = diem_danh.ma_lop
			JOIN mon_hoc ON mon_hoc.ma_mon_hoc = diem_danh.ma_mon_hoc
			WHERE lop.ma_lop = ?
			AND mon_hoc.ma_mon_hoc = ?
			AND diem_danh_chi_tiet.tinh_trang_di_hoc = ?
			",[
			$ma_lop,
			$ma_mon_hoc,
			$tinh_trang
		]);
		return $array;
	}
}