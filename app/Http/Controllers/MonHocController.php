<?php 

namespace App\Http\Controllers;

use App\Http\Model\MonHocModel;
use Illuminate\Http\Request;
use Excel;
use DB;
use App\MonHocImport;

class MonHocController
{
	function getview_all(){
		$mon_hoc = MonHocModel::get_all();

		return view('admin/mon_hoc.view_all',['mon_hoc'=>$mon_hoc]);
	}
	public function getview_insert()
	{
		return view('admin/mon_hoc.view_insert');

	}

	public function postview_insert(Request $Request)
	{


		$mon_hoc = new MonHocModel;
		$mon_hoc->ten_mon_hoc = $Request->ten_mon_hoc;
		$mon_hoc->insert();
		
		return redirect('admin/mon_hoc/view_insert')->with('thong_bao','successful');

	}


		public function getview_update($ma_mon_hoc)
	{
		$mon_hoc = MonHocModel::get_one($ma_mon_hoc);
		return view('admin/mon_hoc.view_update', ['mon_hoc'=>$mon_hoc]);

	}

		public function postview_update(Request $Request, $ma_mon_hoc)
	{

		$mon_hoc = new MonHocModel;
		$mon_hoc->ma_mon_hoc = $ma_mon_hoc;
		$mon_hoc->ten_mon_hoc = $Request->ten_mon_hoc;
		$mon_hoc->update();

		return redirect('admin/mon_hoc/view_all')->with('thong_bao','successful');

	}

	   	public function index()
	{
		$data = DB::table('mon_hoc')->orderBy('ma_mon_hoc', 'DESC')->get();
		return view('admin/mon_hoc.view_all', compact('data'));
	}

	public function import(Request $Request){
		
		Excel::import(new MonHocImport, $Request->file('select_file'));

		return redirect('admin/mon_hoc/view_insert')->with('thong_bao','successful');

	}
}