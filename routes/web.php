<?php

Route::get('test',function(){
	return view('admin.sinh_vien.view_all');
});

Route::get('vi_du','Controller@vi_du');
Route::post('vi_du_post','Controller@vi_du_post')->name('vi_du_post');



Route::group(['prefix'=>'admin','middleware' => 'CheckLogin'],function(){
	Route::group(['prefix'=>'giao_vien'],function(){
		Route::get('view_all','GiaoVienController@getview_all'); 
	});
});
Route::group(['prefix'=>'admin','middleware' => 'CheckLoginGiaoVien'],function(){
	Route::group(['prefix'=>'giao_vien'],function(){

		Route::get('view_profile','GiaoVienController@view_profile')->name('view_profile');

		Route::get('view_lich_day','PhanCongDayHocController@view_lich_day')->name('view_lich_day');

	});

	Route::group(['prefix' => 'diem_danh', 'as' => 'diem_danh.'],function(){

		Route::get('chon_lop_va_mon_hoc','DiemDanhController@chon_lop_va_mon_hoc')->name('chon_lop_va_mon_hoc');
		Route::get('view_diem_danh_theo_lop_va_mon_hoc','DiemDanhController@view_diem_danh_theo_lop_va_mon_hoc')->name('view_diem_danh_theo_lop_va_mon_hoc');
		Route::get('process_diem_danh','DiemDanhController@process_diem_danh')->name('process_diem_danh');
	
	});
});

Route::group(['prefix'=>'admin', 'middleware' => 'CheckLoginGiaoVu'],function(){
	Route::group(['prefix'=>'giao_vien'],function(){
		
		Route::get('view_update/{ma_giao_vien}','GiaoVienController@getview_update');
		Route::post('view_update/{ma_giao_vien}','GiaoVienController@postview_update');

		Route::get('view_insert','GiaoVienController@getview_insert');
		Route::post('view_insert','GiaoVienController@postview_insert');

		Route::get('import', 'GiaoVienController@index')->name('index');
		Route::post('import', 'GiaoVienController@import')->name('import');
	});
	Route::group(['prefix'=>'sinh_vien'],function(){

		Route::get('view_all','SinhVienController@getview_all');

		Route::get('view_update/{ma_sinh_vien}','SinhVienController@getview_update');
		Route::post('view_update/{ma_sinh_vien}','SinhVienController@postview_update');


		Route::get('view_insert','SinhVienController@getview_insert');
		Route::post('view_insert','SinhVienController@postview_insert');

		Route::get('import', 'SinhVienController@index')->name('index');
		Route::post('import', 'SinhVienController@import')->name('import');


	});

	
	Route::group(['prefix'=>'giao_vu'],function(){
		
		Route::get('view_all','GiaoVuController@getview_all');

		Route::get('view_update/{ma_giao_vu}','GiaoVuController@getview_update');
		Route::post('view_update/{ma_giao_vu}','GiaoVuController@postview_update');

		Route::get('view_insert','GiaoVuController@getview_insert');
		Route::post('view_insert','GiaoVuController@postview_insert');

		Route::get('view_profile','GiaoVuController@view_profile')->name('view_profile');

		Route::get('import', 'GiaoVuController@index')->name('index');
		Route::post('import', 'GiaoVuController@import')->name('import');

		Route::get('chon_lop','GiaoVuController@chon_lop')->name('chon_lop');
		Route::get('view_phan_cong_theo_lop','GiaoVuController@view_phan_cong_theo_lop')->name('view_phan_cong_theo_lop');

		Route::get('chon_giao_vien','GiaoVuController@chon_giao_vien')->name('chon_giao_vien');
		Route::get('view_phan_cong_theo_giao_vien','GiaoVuController@view_phan_cong_theo_giao_vien')->name('view_phan_cong_theo_giao_vien');

	});

	Route::group(['prefix'=>'lop'],function(){
		
		Route::get('view_all','LopController@getview_all');

		Route::get('view_update/{ma_lop}','LopController@getview_update');
		Route::post('view_update/{ma_lop}','LopController@postview_update');

		Route::get('view_insert','LopController@getview_insert');
		Route::post('view_insert','LopController@postview_insert');

		Route::get('view_details/{ma_lop}','LopController@view_details');

		Route::get('import', 'LopController@index')->name('index');
		Route::post('import', 'LopController@import')->name('import');


	});

	Route::group(['prefix'=>'mon_hoc'],function(){
		
		Route::get('view_all','MonHocController@getview_all');

		Route::get('view_update/{ma_mon_hoc}','MonHocController@getview_update');
		Route::post('view_update/{ma_mon_hoc}','MonHocController@postview_update');

		Route::get('view_insert','MonHocController@getview_insert');
		Route::post('view_insert','MonHocController@postview_insert');


		Route::get('import', 'MonHocController@index')->name('index');
		Route::post('import', 'MonHocController@import')->name('import');


	});

		Route::group(['prefix' => 'phan_cong_day_hoc', 'as' => 'phan_cong_day_hoc.'],function(){
			Route::get('chon_lop_va_mon_hoc_va_giao_vien','PhanCongDayHocController@chon_lop_va_mon_hoc_va_giao_vien')->name('chon_lop_va_mon_hoc_va_giao_vien');

			Route::get('view_phan_cong_day_hoc_theo_lop_va_giao_vien_va_mon_hoc','PhanCongDayHocController@view_phan_cong_day_hoc_theo_lop_va_giao_vien_va_mon_hoc')->name('view_phan_cong_day_hoc_theo_lop_va_giao_vien_va_mon_hoc');

			Route::get('process_phan_cong_day_hoc','PhanCongDayHocController@process_phan_cong_day_hoc')->name('process_phan_cong_day_hoc');

			Route::get('import', 'PhanCongDayHocController@index')->name('index');
			Route::post('import', 'PhanCongDayHocController@import')->name('import');


	});

});
Route::get('logout','Controller@logout')->name('logout');

Route::get('login','Controller@login')->name('view_login');
Route::post('process_login','Controller@process_login')->name('process_login');