<?php 

namespace App\Http\Model;

use DB;

class MonHocModel
{
	public $ma_mon_hoc;
	public $ten_mon_hoc;
	static function get_all(){
		$array = DB::select('select * from mon_hoc');
		return $array;
	}
	public function insert(){
		DB::insert("insert into mon_hoc(ten_mon_hoc) values (?)",[
			$this->ten_mon_hoc
		]);
	}
	static function get_one($ma_mon_hoc){
		$array = DB::select('select * from mon_hoc where ma_mon_hoc = ?',[
			$ma_mon_hoc
		]);
		return $array[0];
	}
	public function update()
	{
		DB::update("update mon_hoc set ten_mon_hoc = ? where ma_mon_hoc = ?",[
			$this->ten_mon_hoc,
			$this->ma_mon_hoc
		]);
	}
}