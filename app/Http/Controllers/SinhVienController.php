<?php 

namespace App\Http\Controllers;

use App\Http\Model\SinhVienModel;
use App\Http\Model\LopModel;
use Illuminate\Http\Request;
use Excel;
use DB;
use App\SinhVienImport;



class SinhVienController
{
	public function getview_all()
	{
		$sinh_vien = SinhVienModel::get_all();
		return view('admin/sinh_vien.view_all',['sinh_vien'=>$sinh_vien]);
	}

	public function getview_insert()
	{
		$array_lop = LopModel::get_all();
		return view('admin/sinh_vien.view_insert',compact('array_lop')
		);

	}

	public function postview_insert(Request $Request)
	{
			

		$sinh_vien = new SinhVienModel;
		$sinh_vien->ten_sinh_vien = $Request->ten_sinh_vien;
		$sinh_vien->ngay_sinh = $Request->ngay_sinh;
		$sinh_vien->gioi_tinh = $Request->gioi_tinh;
		$sinh_vien->so_dien_thoai = $Request->so_dien_thoai;
		$sinh_vien->dia_chi = $Request->dia_chi;
		$sinh_vien->email = $Request->email;
		$sinh_vien->ma_lop = $Request->ma_lop;
		$sinh_vien->insert();

		return redirect('admin/sinh_vien/view_insert')->with('thong_bao','successful');

	}


	public function getview_update($ma_sinh_vien)
	{
		$array_lop = LopModel::get_all();
		$sinh_vien = SinhVienModel::get_one($ma_sinh_vien);
		return view('admin.sinh_vien.view_update',compact('array_lop','sinh_vien'));
	}


	public function postview_update(Request $rq,$ma_sinh_vien)
	{
		$sinh_vien = SinhVienModel::get_one($ma_sinh_vien);

		
		$sinh_vien = new SinhVienModel();
		$sinh_vien->ma_sinh_vien = $ma_sinh_vien;
		$sinh_vien->ten_sinh_vien = $rq->get('ten_sinh_vien');
		$sinh_vien->ngay_sinh = $rq->get('ngay_sinh');
		$sinh_vien->gioi_tinh = $rq->get('gioi_tinh');
		$sinh_vien->so_dien_thoai = $rq->get('so_dien_thoai');
		$sinh_vien->email = $rq->get('email');
		$sinh_vien->ma_lop = $rq->get('ma_lop');
		$sinh_vien->dia_chi = $rq->get('dia_chi');
		$sinh_vien->update();

		 return back()->with('thong_bao','successful');
	}


	public function index()
	{
		$data = DB::table('sinh_vien')->orderBy('ma_sinh_vien', 'DESC')->get();
		return view('admin/sinh_vien.view_all', compact('data'));
	}

	public function import(Request $Request){
		
		Excel::import(new SinhVienImport, $Request->file('select_file'));
		
		return redirect('admin/sinh_vien/view_insert')->with('thong_bao','successful');
	}
}
