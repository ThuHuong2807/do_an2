<?php 

namespace App\Http\Model;

use DB;

class PhanCongDayHocModel
{
	public $ma_giao_vien;
	public $ma_lop;
	public $ma_mon_hoc;
	static function get_lop_duoc_phan_cong($ma_giao_vien){
		$array = DB::select('select * from lop
			join phan_cong on phan_cong.ma_lop = lop.ma_lop
		 where ma_giao_vien = ?',[
			$ma_giao_vien
		]);
		
		return $array;
	}

	static function get_mon_hoc_duoc_phan_cong($ma_giao_vien){
		$array = DB::select('select * from mon_hoc
			join phan_cong on phan_cong.ma_mon_hoc = mon_hoc.ma_mon_hoc
		 where ma_giao_vien = ?',[
			$ma_giao_vien
		]);

		return $array;
	}

	public function insert()
	{
		DB::insert("insert into phan_cong(ma_lop,ma_mon_hoc,ma_giao_vien) values (?,?,?)",[
			$this->ma_lop,
			$this->ma_mon_hoc,
			$this->ma_giao_vien
		]);
	}

	public function update(){
	DB::update("update phan_cong set ma_giao_vien = ? where ma_mon_hoc = ? and ma_lop = ? ",[
		$this->ma_giao_vien,
		$this->ma_mon_hoc,
		$this->ma_lop
		]);
	}

	static function get_phan_cong_day_hoc_theo_lop_va_giao_vien_va_mon_hoc($ma_lop,$ma_mon_hoc){
	$array = DB::select("select phan_cong.*,giao_vien.ten_giao_vien,mon_hoc.ten_mon_hoc,lop.ten_lop from 
		phan_cong inner join giao_vien on phan_cong.ma_giao_vien = giao_vien.ma_giao_vien 
		inner join mon_hoc on mon_hoc.ma_mon_hoc = phan_cong.ma_mon_hoc 
		inner join lop on lop.ma_lop = phan_cong.ma_lop
		where phan_cong.ma_lop = ? and phan_cong.ma_mon_hoc = ?",[
		$ma_lop,
		$ma_mon_hoc
	]);
	return $array;
	}

	static function delete($ma_lop,$ma_mon_hoc){
		DB::delete("delete from phan_cong where ma_lop = ? and ma_mon_hoc = ?",[
			$ma_lop,
			$ma_mon_hoc,
		]);
	}


	static function get_phan_cong_day_hoc_theo_ma_lop_va_ma_mon_hoc($ma_lop,$ma_mon_hoc){
		$array = DB::select("select * from phan_cong where ma_lop = ? and ma_mon_hoc = ?",[
			$ma_lop,
			$ma_mon_hoc	
		]);
		return $array;
	}

	static function get_lich_day($ma_giao_vien){
		$array = DB::select('select * from phan_cong 
			inner join lop on phan_cong.ma_lop = lop.ma_lop
			inner join mon_hoc on phan_cong.ma_mon_hoc = mon_hoc.ma_mon_hoc
			where ma_giao_vien = ?',[
			$ma_giao_vien
		]);
		return $array;
	}
	
}