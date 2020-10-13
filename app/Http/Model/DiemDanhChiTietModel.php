<?php 

namespace App\Http\Model;

use DB;

class DiemDanhChiTietModel
{
	public $ma_diem_danh;
	public $ma_sinh_vien;
	public $tinh_trang_di_hoc;
//1:đi học
//2:nghỉ
//3:muộn
//4:có phép

public function insert(){
	DB::insert("insert into diem_danh_chi_tiet(ma_diem_danh,ma_sinh_vien,tinh_trang_di_hoc) values (?,?,?) ",[
		$this->ma_diem_danh,
		$this->ma_sinh_vien,
		$this->tinh_trang_di_hoc
		]);
	}

public function update(){
	DB::update("update diem_danh_chi_tiet
	set 
	tinh_trang_di_hoc = ?
	where ma_diem_danh = ? and ma_sinh_vien = ? ",[
		$this->tinh_trang_di_hoc,
		$this->ma_diem_danh,
		$this->ma_sinh_vien
		]);
	}

	static function get_diem_danh_theo_ma_diem_danh_va_ma_sinh_vien($ma_diem_danh,$ma_sinh_vien){
		$array = DB::select("select * from diem_danh_chi_tiet where ma_diem_danh = ? and ma_sinh_vien = ?",[
			$ma_diem_danh,
			$ma_sinh_vien	
		]);
		return $array;
	}
	static function get_diem_danh_theo_ma_sinh_vien_va_ma_lop_va_ma_mon_hoc_va_ngay_diem_danh($ma_sinh_vien,$ma_lop,$ma_mon_hoc,$ngay_diem_danh){
			$array = DB::select("select * from diem_danh_chi_tiet
				join diem_danh on diem_danh_chi_tiet.ma_diem_danh = diem_danh.ma_diem_danh
			 where ma_sinh_vien = ? and ma_lop = ? and ma_mon_hoc = ? and ngay_diem_danh = ?",[
			$ma_sinh_vien,
			$ma_lop,
			$ma_mon_hoc,
			$ngay_diem_danh
		]);
		return $array;
	}

}