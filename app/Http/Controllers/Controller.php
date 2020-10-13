<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Illuminate\Http\Request;
use App\Http\Model\LopModel;
use App\Http\Model\GiaoVuModel;
use App\Http\Model\GiaoVienModel;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function test()
    {
    	return view('admin.layout.index');
    }
    public function login(Request $rq)
    {
    	return view('admin.login');
    }
    public function process_login(Request $rq)
    {

		$giao_vu           = new GiaoVuModel();
        $giao_vu->email    = $rq->get('email');
        $giao_vu->mat_khau = $rq->get('password');
        $array             = $giao_vu->get_login();

        if(count($array)==1){
            $rq->session()->put('ma_giao_vu',$array[0]->ma_giao_vu);
            $rq->session()->put('ten',$array[0]->ten_giao_vu);
   
            return redirect()->route('phan_cong_day_hoc.chon_lop_va_mon_hoc_va_giao_vien');
        }

        $giao_vien             = new GiaoVienModel();
        $giao_vien->email_1    = $rq->get('email');
        $giao_vien->mat_khau_1 = $rq->get('password');
        $array_giao_vien       = $giao_vien->get_login1();
        
        if(count($array_giao_vien)==1){
            $rq->session()->put('ma_giao_vien',$array_giao_vien[0]->ma_giao_vien);
            $rq->session()->put('ten',$array_giao_vien[0]->ten_giao_vien);
       
            return redirect()->route('diem_danh.chon_lop_va_mon_hoc');
        }
        return redirect()->route('view_login')->with('thong_bao','You entered the wrong email or password. Please login again!');
    }
    public function logout(Request $rq)
    {
        $rq->session()->flush();
        return redirect()->route('view_login')->with('thong_bao','Logged out successfully');
    }
    public function vi_du()
    {
        $array_lop = LopModel::get_all();
        return view("vi_du",compact('array_lop'));
    }
    public function vi_du_post (Request $rq)
    {
        $array_lop = $rq->get('array_lop');
        dd($array_lop);
    }
}
