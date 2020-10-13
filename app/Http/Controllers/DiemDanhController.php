<?php 

namespace App\Http\Controllers;

use App\Http\Model\LopModel;
use App\Http\Model\MonHocModel;
use App\Http\Model\SinhVienModel;
use App\Http\Model\GiaoVienModel;
use App\Http\Model\DiemDanhModel;
use App\Http\Model\DiemDanhChiTietModel;
use App\Http\Model\PhanCongDayHocModel;
use Illuminate\Http\Request;

class DiemDanhController
{	
	public function chon_lop_va_mon_hoc(request $rq)
	{	
			
		$ma_giao_vien = $rq->session()->get('ma_giao_vien');

		$array_lop = PhanCongDayHocModel::get_lop_duoc_phan_cong($ma_giao_vien);

		$array_mon_hoc = PhanCongDayHocModel::get_mon_hoc_duoc_phan_cong($ma_giao_vien);
		
		return view('admin.diem_danh.chon_lop_va_mon_hoc', compact('array_lop','array_mon_hoc'));
	}

	public function view_diem_danh_theo_lop_va_mon_hoc(request $rq)
	{
		$ma_giao_vien = $rq->session()->get('ma_giao_vien');
		$array_lop = PhanCongDayHocModel::get_lop_duoc_phan_cong($ma_giao_vien);
		$array_mon_hoc = PhanCongDayHocModel::get_mon_hoc_duoc_phan_cong($ma_giao_vien);

		$ma_mon_hoc = $rq->get('ma_mon_hoc');
		$ma_lop = $rq->get('ma_lop');
		$ngay_diem_danh =  date("Y-m-d");

		$array_sinh_vien = SinhVienModel::get_theo_ma_lop($ma_lop);
		$array_diem_danh = [];

		foreach ($array_sinh_vien as $sinh_vien) {
			$ma_sinh_vien = $sinh_vien->ma_sinh_vien;

			$check_diem_danh_chi_tiet = DiemDanhChiTietModel::get_diem_danh_theo_ma_sinh_vien_va_ma_lop_va_ma_mon_hoc_va_ngay_diem_danh($ma_sinh_vien,$ma_lop,$ma_mon_hoc,$ngay_diem_danh);

			if (count($check_diem_danh_chi_tiet)>0) {
				$tinh_trang_di_hoc = $check_diem_danh_chi_tiet[0]->tinh_trang_di_hoc;
			}
			else
			{
				$tinh_trang_di_hoc = 1;
			}
			$array_diem_danh[$ma_sinh_vien] = $tinh_trang_di_hoc;
		}

		$sv_di_hoc = DiemDanhModel::count_sv_tinh_trang($ma_lop, $ma_mon_hoc, '1');
		$sv_nghi_hoc = DiemDanhModel::count_sv_tinh_trang($ma_lop, $ma_mon_hoc, '2');
		$sv_di_muon = DiemDanhModel::count_sv_tinh_trang($ma_lop, $ma_mon_hoc, '3');
		$sv_co_phep = DiemDanhModel::count_sv_tinh_trang($ma_lop, $ma_mon_hoc, '4');

		return view('admin.diem_danh.view_diem_danh_theo_lop_va_mon_hoc', compact('array_mon_hoc','array_lop','ma_lop','ma_mon_hoc','array_sinh_vien','array_diem_danh','sv_di_hoc','sv_nghi_hoc','sv_di_muon','sv_co_phep'));
	}

	public function view_diem_danh_theo_lop_mon_hoc_va_ngay(request $rq)
	{
		$ma_giao_vien = $rq->session()->get('ma_giao_vien');
		$array_lop = PhanCongDayHocModel::get_lop_duoc_phan_cong($ma_giao_vien);
		$array_mon_hoc = PhanCongDayHocModel::get_mon_hoc_duoc_phan_cong($ma_giao_vien);

		$ma_mon_hoc = $rq->get('ma_mon_hoc');
		$ma_lop = $rq->get('ma_lop');
		$ngay_diem_danh =  date("Y-m-d");

		$array_sinh_vien = SinhVienModel::get_theo_ma_lop($ma_lop);
		$array_diem_danh = [];

		foreach ($array_sinh_vien as $sinh_vien) {
			$ma_sinh_vien = $sinh_vien->ma_sinh_vien;

			$check_diem_danh_chi_tiet = DiemDanhChiTietModel::get_diem_danh_theo_ma_sinh_vien_va_ma_lop_va_ma_mon_hoc_va_ngay_diem_danh($ma_sinh_vien,$ma_lop,$ma_mon_hoc,$ngay_diem_danh);

			if (count($check_diem_danh_chi_tiet)>0) {
				$tinh_trang_di_hoc = $check_diem_danh_chi_tiet[0]->tinh_trang_di_hoc;
			}
			else
			{
				$tinh_trang_di_hoc = 1;
			}
			$array_diem_danh[$ma_sinh_vien] = $tinh_trang_di_hoc;
		}

		return view('admin.diem_danh.view_diem_danh_theo_lop_mon_hoc_va_ngay', compact('array_mon_hoc','array_lop','ma_lop','ma_mon_hoc','array_sinh_vien','array_diem_danh'));
	}

	public function process_diem_danh(request $rq)
	{
		$array_diem_danh = $rq->get('array_diem_danh');
		$ma_mon_hoc = $rq->get('ma_mon_hoc');
		$ma_lop = $rq->get('ma_lop');

		$ngay_diem_danh =  date("Y-m-d");
		$diem_danh = DiemDanhModel::get_diem_danh_theo_ma_mon_va_ma_lop_va_ngay_diem_danh($ma_mon_hoc,$ma_lop,$ngay_diem_danh);

		if (count($diem_danh)==0) {
			$ma_giao_vien = $rq->session()->get('ma_giao_vien');
			$object = new DiemDanhModel();
			$object->ma_mon_hoc = $ma_mon_hoc;
			$object->ma_lop = $ma_lop;
			$object->ma_giao_vien = $ma_giao_vien;
			$object->ngay_diem_danh = $ngay_diem_danh;
			$object->insert();
			$diem_danh = DiemDanhModel::get_diem_danh_theo_ma_mon_va_ma_lop_va_ngay_diem_danh($ma_mon_hoc,$ma_lop,$ngay_diem_danh);
		}

		$ma_diem_danh = $diem_danh[0]->ma_diem_danh;
		

		foreach ($array_diem_danh as $ma_sinh_vien => $tinh_trang_di_hoc){
			$object = new DiemDanhChiTietModel();
			$object->ma_diem_danh = $ma_diem_danh;
			$object->ma_sinh_vien = $ma_sinh_vien;
			$object->tinh_trang_di_hoc = $tinh_trang_di_hoc;

			$check_diem_danh = DiemDanhChiTietModel::get_diem_danh_theo_ma_diem_danh_va_ma_sinh_vien($ma_diem_danh,$ma_sinh_vien);
			if (count($check_diem_danh)==0) {
				$object->insert();
			}
			else
			{
				$object->update();

			}

		}
		return redirect()->back()->with('thong_bao', 'successful');
	}


	// public function xem_lich_su_diem_danh(request $rq)
	// {	
			
	// 	$ma_giao_vien = $rq->session()->get('ma_giao_vien');

	// 	$array_lop = PhanCongDayHocModel::get_lop_duoc_phan_cong($ma_giao_vien);
	// 	// $array_giao_vien = GiaoVienModel::get_giao_vien_duoc_phan_cong($ma_giao_vien);
	// 	$array_mon_hoc = PhanCongDayHocModel::get_mon_hoc_duoc_phan_cong($ma_giao_vien);
	// 	$ngay_diem_danh =  date("Y-m-d");
		
	// 	return view('admin.diem_danh.xem_lich_su_diem_danh', compact('array_lop','array_mon_hoc'));
	// }

	public function xem_lich_su_diem_danh(request $rq)
	{
		$ma_giao_vien 		= $rq->session()->get('ma_giao_vien');
		$array_giao_vien 	= GiaoVienModel::get_all();
		$array_lop 			= LopModel::get_all();
		$array_mon_hoc 		= MonHocModel::get_all();

		$ma_mon_hoc = $rq->get('ma_mon_hoc');
		$ma_lop = $rq->get('ma_lop');
	

		$ngay_diem_danh =  date("Y-m-d");
		$diem_danh = DiemDanhModel::get_diem_danh_theo_ma_mon_va_ma_lop_va_ngay_diem_danh($ma_mon_hoc,$ma_lop,$ngay_diem_danh);

		return view('admin.diem_danh.xem_lich_su_diem_danh', compact('array_lop','array_mon_hoc','array_giao_vien'));
	}


}
