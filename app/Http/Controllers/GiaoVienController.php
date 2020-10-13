<?php 

namespace App\Http\Controllers;

use App\Http\Model\GiaoVienModel;
use Illuminate\Http\Request;
use Excel;
use DB;
use App\GiaoVienImport;

class GiaoVienController
{
	public function getview_all()
	{
		$giao_vien = GiaoVienModel::get_all();
		return view('admin.giao_vien.view_all',['giao_vien'=>$giao_vien]);
	}

	public function getview_insert()
	{
		return view('admin.giao_vien.view_insert');

	}

	public function postview_insert(Request $Request)
	{
			
		$giao_vien = new GiaoVienModel;
		$giao_vien->ten_giao_vien = $Request->ten_giao_vien;
		$giao_vien->ngay_sinh = $Request->ngay_sinh;
		$giao_vien->gioi_tinh = $Request->gioi_tinh;
		$giao_vien->so_dien_thoai = $Request->so_dien_thoai;
		$giao_vien->dia_chi = $Request->dia_chi;
		$giao_vien->email = $Request->email;
		$giao_vien->mat_khau = $Request->mat_khau;

		$giao_vien->insert();
		
		return redirect('admin/giao_vien/view_insert')->with('thong_bao','successful');

	}


	public function getview_update($ma_giao_vien)
	{
		$giao_vien = GiaoVienModel::get_one($ma_giao_vien);
		return view('admin/giao_vien.view_update', ['giao_vien'=>$giao_vien]);
	}


	public function postview_update(Request $Request,$ma_giao_vien)
	{
		$giao_vien = new GiaoVienModel;
		$giao_vien->ma_giao_vien = $ma_giao_vien;
		$giao_vien->ten_giao_vien = $Request->ten_giao_vien;
		$giao_vien->ngay_sinh = $Request->ngay_sinh;
		$giao_vien->gioi_tinh = $Request->gioi_tinh;
		$giao_vien->so_dien_thoai = $Request->so_dien_thoai;
		$giao_vien->dia_chi = $Request->dia_chi;
		$giao_vien->email = $Request->email;
		$giao_vien->mat_khau = $Request->mat_khau;

		$giao_vien->update();

		 return redirect('admin/giao_vien/view_all')->with('thong_bao','successful');
	}


	public function index()
	{
		$data = DB::table('giao_vien')->orderBy('ma_giao_vien', 'DESC')->get();
		return view('admin/giao_vien.view_all', compact('data'));
	}

	public function import(Request $Request){
		
		Excel::import(new GiaoVienImport, $Request->file('select_file'));

		return redirect('admin/giao_vien/view_insert')->with('thong_bao','successful');
	}

	function view_profile(Request $rq){
		$ma_giao_vien = $rq->session()->get('ma_giao_vien');
		$giao_vien = GiaoVienModel::get_profile($ma_giao_vien);

		return view('admin/giao_vien/view_profile',compact('giao_vien'));
	}
	

}