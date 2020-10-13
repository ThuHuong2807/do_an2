<?php 

namespace App\Http\Controllers;

use App\Http\Model\LopModel;
use Illuminate\Http\Request;
use Excel;
use DB;
use App\LopImport;


class LopController
{
	function getview_all(){
		$lop = LopModel::get_all();

		return view('admin/lop.view_all',['lop'=>$lop]);
	}
	public function getview_insert()
	{
		return view('admin/lop.view_insert');

	}

	public function postview_insert(Request $Request)
	{
	

		$lop = new LopModel;
		$lop->ten_lop = $Request->ten_lop;
		$lop->insert();
		
		return redirect('admin/lop/view_insert')->with('thong_bao','successful');

	}

		public function getview_update($ma_lop)
	{
		$lop = LopModel::get_one($ma_lop);
		return view('admin/lop.view_update', ['lop'=>$lop]);

	}

		public function postview_update(Request $Request, $ma_lop)
	{

		$lop = new LopModel;
		$lop->ma_lop = $ma_lop;
		$lop->ten_lop = $Request->ten_lop;
		$lop->update();

		return redirect('admin/lop/view_all')->with('thong_bao','successful');

	}

	public function view_details($ma_lop)
    {
        $sinh_vien_lop = LopModel::view_details($ma_lop);
        return view('admin/lop.view_details', ['sinh_vien_lop'=>$sinh_vien_lop]);
    }

    	public function index()
	{
		$data = DB::table('lop')->orderBy('ma_lop', 'DESC')->get();
		return view('admin/lop.view_all', compact('data'));
	}

	public function import(Request $Request){
		
		Excel::import(new LopImport, $Request->file('select_file'));

		return redirect('admin/lop/view_insert')->with('thong_bao','successful');

	}

}