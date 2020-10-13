<?php 

namespace App\Http\Controllers;

use App\Http\Model\LopModel;
use App\Http\Model\MonHocModel;
use App\Http\Model\SinhVienModel;
use App\Http\Model\GiaoVienModel;
use App\Http\Model\PhanCongDayHocModel;
use Illuminate\Http\Request;
use Excel;
use DB;
use App\PhanCongImport;

class PhanCongDayHocController
{	
	public function chon_lop_va_mon_hoc_va_giao_vien(request $rq)
	{
		$ma_giao_vu 		= $rq->session()->get('ma_giao_vu');
		$array_giao_vien 	= GiaoVienModel::get_all();
		$array_lop 			= LopModel::get_all();
		$array_mon_hoc 		= MonHocModel::get_all();

		return view('admin.phan_cong_day_hoc.chon_lop_va_mon_hoc_va_giao_vien', compact('array_lop','array_mon_hoc','array_giao_vien'));
	}

	public function view_phan_cong_day_hoc_theo_lop_va_giao_vien_va_mon_hoc(request $rq)
	{
		$ma_giao_vu 		= $rq->session()->get('ma_giao_vu');
		$array_giao_vien	= GiaoVienModel::get_all();
		$array_lop 			= LopModel::get_all();
		$array_mon_hoc		= MonHocModel::get_all();

		$ma_mon_hoc 		= $rq->get('ma_mon_hoc');
		$ma_lop 			= $rq->get('ma_lop');
		$giao_vien    		= $rq->get('ma_giao_vien');

	}

	public function process_phan_cong_day_hoc(request $rq)
	{
		$array_phan_cong_day_hoc	= $rq->get('array_phan_cong_day_hoc');
		$ma_lop 					= $rq->get('ma_lop');
		$ma_giao_vien 				= $rq->get('ma_giao_vien');
		$ma_mon_hoc 				= $rq->get('ma_mon_hoc');
		$phan_cong_day_hoc = PhanCongDayHocModel::get_phan_cong_day_hoc_theo_lop_va_giao_vien_va_mon_hoc($ma_lop,$ma_mon_hoc);

		// dd(count($phan_cong_day_hoc));
		if (count($phan_cong_day_hoc)==0) {
			$ma_giao_vu 			= $rq->session()->get('ma_giao_vu');
			$object 				= new PhanCongDayHocModel();
			$object->ma_lop 		= $ma_lop;
			$object->ma_giao_vien   = $ma_giao_vien;
			$object->ma_mon_hoc 	= $ma_mon_hoc;
			$object->ma_giao_vu 	= $ma_giao_vu;

			$object->insert();

		}
		else{

			$ma_giao_vu 			= $rq->session()->get('ma_giao_vu');
			$object 				= new PhanCongDayHocModel();
			$object->ma_lop 		= $ma_lop;
			$object->ma_mon_hoc 	= $ma_mon_hoc;
			$object->ma_giao_vien   = $ma_giao_vien;
			$object->ma_giao_vu 	= $ma_giao_vu;
			$object->update();
		}
		$array_giao_vien	= GiaoVienModel::get_all();
		$array_lop 			= LopModel::get_all();
		$array_mon_hoc		= MonHocModel::get_all();
		$phan_cong_day_hoc = PhanCongDayHocModel::get_phan_cong_day_hoc_theo_lop_va_giao_vien_va_mon_hoc($ma_lop,$ma_mon_hoc);
// dd($array_phan_cong_day_hoc	);

		return view(("admin.phan_cong_day_hoc.view_phan_cong_day_hoc_theo_lop_va_giao_vien_va_mon_hoc"),compact('array_giao_vien','ma_giao_vien','array_lop','ma_lop','array_mon_hoc','ma_mon_hoc','phan_cong_day_hoc'));

	}
	function view_lich_day(Request $rq){
		$ma_giao_vien    = $rq->session()->get('ma_giao_vien');

		$array_lich_day = PhanCongDayHocModel::get_lich_day($ma_giao_vien);

		return view('admin.giao_vien.view_lich_day',compact('array_lich_day'));
	}

	public function index()
	{
		$data = DB::table('phan_cong_day_hoc')->orderBy('ma_lop','ma_mon_hoc', 'DESC')->get();
		return view('admin/phan_cong_day_hoc.chon_lop_va_mon_hoc_va_giao_vien', compact('data'));
	}

	public function import(Request $Request){
		
		Excel::import(new PhanCongImport, $Request->file('select_file'));

		return redirect('admin/phan_cong_day_hoc/chon_lop_va_mon_hoc_va_giao_vien')->with('thong_bao','successful');
	}
		
}

