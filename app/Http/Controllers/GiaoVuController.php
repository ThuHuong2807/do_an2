<?php 

namespace App\Http\Controllers;

use App\Http\Model\GiaoVuModel;
use Illuminate\Http\Request;
use Excel;
use DB;
use App\GiaoVuImport;
use App\Http\Model\LopModel;
use App\Http\Model\GiaoVienModel;
use App\Http\Model\PhanCongDayHocModel;

class GiaoVuController
{
	public function getview_all()
	{
		$giao_vu = GiaoVuModel::get_all();
		return view('admin/giao_vu.view_all',['giao_vu'=>$giao_vu]);
	}

	public function getview_insert()
	{
		return view('admin/giao_vu.view_insert');

	}

	public function postview_insert(Request $Request)
	{
			
		$giao_vu = new GiaoVuModel;
		$giao_vu->ten_giao_vu = $Request->ten_giao_vu;
		$giao_vu->ngay_sinh = $Request->ngay_sinh;
		$giao_vu->gioi_tinh = $Request->gioi_tinh;
		$giao_vu->so_dien_thoai = $Request->so_dien_thoai;
		$giao_vu->dia_chi = $Request->dia_chi;
		$giao_vu->email = $Request->email;
		$giao_vu->mat_khau = $Request->mat_khau;

		$giao_vu->insert();
		
		return redirect('admin/giao_vu/view_insert')->with('thong_bao','successful');

	}


	public function getview_update($ma_giao_vu)
	{
		$giao_vu = GiaoVuModel::get_one($ma_giao_vu);
		return view('admin/giao_vu.view_update', ['giao_vu'=>$giao_vu]);
	}


	public function postview_update(Request $Request,$ma_giao_vu)
	{
		$giao_vu = new GiaoVuModel;
		$giao_vu->ma_giao_vu = $ma_giao_vu;
		$giao_vu->ten_giao_vu = $Request->ten_giao_vu;
		$giao_vu->ngay_sinh = $Request->ngay_sinh;
		$giao_vu->gioi_tinh = $Request->gioi_tinh;
		$giao_vu->so_dien_thoai = $Request->so_dien_thoai;
		$giao_vu->dia_chi = $Request->dia_chi;
		$giao_vu->email = $Request->email;
		$giao_vu->mat_khau = $Request->mat_khau;

		$giao_vu->update();

		 return redirect('admin/giao_vu/view_all')->with('thong_bao','successful');
	}

	function view_profile(Request $rq){
		$ma_giao_vu = $rq->session()->get('ma_giao_vu');
		$giao_vu = GiaoVuModel::get_profile($ma_giao_vu);

		return view('admin/giao_vu/view_profile',compact('giao_vu'));
	}


	public function index()
	{
		$data = DB::table('giao_vu')->orderBy('ma_giao_vu', 'DESC')->get();
		return view('admin/giao_vu.view_all', compact('data'));
	}

	public function import(Request $Request){
		
		Excel::import(new GiaoVuImport, $Request->file('select_file'));

		return redirect('admin/giao_vu/view_insert')->with('thong_bao','successful');
	}

	// function view_phan_cong_theo_lop_va_giao_vien(Request $rp){
	// 	$ma_giao_vien = $rp->ma_giao_vien;
	// 	$ma_lop       = $rp->ma_lop;

	// 	$array_lop       = LopModel::get_all($ma_lop);
	// 	$array_giao_vien = GiaoVienModel::get_all($ma_giao_vien);
	// 	$array           = GiaoVuModel::get_lich_phan_cong($ma_lop,$ma_giao_vien);
	// 	return view('admin/giao_vu.view_phan_cong_theo_lop_va_giao_vien',compact('array','array_lop','array_giao_vien','ma_lop','ma_giao_vien'));
	// }

	function view_phan_cong_theo_lop(Request $rp){
		$ma_lop       = $rp->ma_lop;

		$array_lop       = LopModel::get_all($ma_lop);
		$array           = GiaoVuModel::get_lich_phan_cong_theo_lop($ma_lop);
		return view('admin/giao_vu.view_phan_cong_theo_lop',compact('array','array_lop','ma_lop'));
	}

		function view_phan_cong_theo_giao_vien(Request $rp){
		$ma_giao_vien = $rp->ma_giao_vien;
		$ma_lop       = $rp->ma_lop;


		$array_lop       = LopModel::get_all($ma_lop);
		$array_giao_vien = GiaoVienModel::get_all($ma_giao_vien);
		$array           = GiaoVuModel::get_lich_phan_cong_theo_giao_vien($ma_giao_vien,$ma_lop);
		return view('admin/giao_vu.view_phan_cong_theo_giao_vien',compact('array','array_giao_vien','ma_giao_vien','array_lop','ma_lop'));
	}

	public function chon_giao_vien(request $rp)
	{
		$ma_giao_vu 		= $rp->session()->get('ma_giao_vu');

		$ma_giao_vien 		= $rp->ma_giao_vien;
		$array_giao_vien 	= GiaoVienModel::get_all();

		return view('admin/giao_vu.chon_giao_vien', compact('array_giao_vien','ma_giao_vien'));
	}

		public function chon_lop(request $rp)
	{
		$ma_giao_vu 	= $rp->session()->get('ma_giao_vu');

		$ma_lop 		= $rp->ma_lop;
		$array_lop 	    = LopModel::get_all();

		return view('admin/giao_vu.chon_lop', compact('array_lop','ma_lop'));
	}
}