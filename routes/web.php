<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::namespace('Auth')->group(function(){
	Route::get('/',[
		'uses'=>'AuthController@showForm',
		'as'=>'quanlyvanban.auth.index'
	]);
	Route::post('/dang-nhap',[
		'uses'=>'AuthController@kiemTraDangNhap',
		'as'=>'quanlyvanban.auth.kiemtra'
	]);
});
// Quản lý văn bản
Route::namespace('quanlyvanban')->group(function(){
	Route::get('/trang-chu',[
		'uses'=>'CongVanController@trangChu',
		'as'=>'quanlyvanban.congvan.index'
	]);
	Route::get('/danh-sach-cong-van-den',[
		'uses'=>'CongVanController@danhSachCongVanDen',
		'as'=>'quanlyvanban.congvan.danhsachcongvanden'
	]);
	Route::post('/danh-sach-cong-van-den',[
		'uses'=>'CongVanController@danhSachCongVanDen',
		'as'=>'quanlyvanban.congvan.danhsachcongvanden'
	]);
	Route::get('/danh-sach-cong-van-di',[
		'uses'=>'CongVanController@danhSachCongvanDi',
		'as'=>'quanlyvanban.congvan.danhsachcongvandi'
	]);
	Route::post('/danh-sach-cong-van-di',[
		'uses'=>'CongVanController@danhSachCongvanDi',
		'as'=>'quanlyvanban.congvan.danhsachcongvandi'
	]);
	Route::get('/gui-cong-van',[
		'uses'=>'CongVanController@getTaoMoiCongVan',
		'as'=>'quanlyvanban.congvan.taomoicongvan'
	]);
	//route này để tìm kiếm
	// Route::post('/gui-cong-van',[
	// 	'uses'=>'CongVanController@getTaoMoiCongVan',
	// 	'as'=>'quanlyvanban.congvan.taomoicongvan.timkiemnhansu'
	// ]);
	//
	Route::post('/gui-cong-van',[
		'uses'=>'CongVanController@postTaoMoiCongVan',
		'as'=>'quanlyvanban.congvan.taomoicongvan'
	]);
	Route::get('/phan-hoi-cong-van-{soCongVan}',[
		'uses'=>'CongVanController@getPhanHoiCongVan',
		'as'=>'quanlyvanban.congvan.phanhoicongvan'
	]);
	Route::post('/phan-hoi-cong-van-{soCongVan}',[
		'uses'=>'CongVanController@postPhanHoiCongVan',
		'as'=>'quanlyvanban.congvan.phanhoicongvan'
	]);
	//Tim kiem nang cao
	Route::get('/tim-kiem-nang-cao',[
		'uses' => 'CongVanController@danhSachCongVanDen_TimKiemnangCao',
		'as' => 'quanlyvanban.congvan.danhsachcongvanden.timkiemnangcao'
	]);
	//Các route cho biểu mẫu
	Route::get('/danh-sach-bieu-mau',[
		'uses'=>'BieuMauController@danhSachBieuMau',
		'as'=>'quanlyvanban.bieumau.danhsachbieumau'
	]);
	Route::get('/tao-moi-bieu-mau',[
		'uses'=>'BieuMauController@getTaoMoiBieuMau',
		'as'=>'quanlyvanban.bieumau.taomoibieumau'
	]);
	Route::post('/tao-moi-bieu-mau',[
		'uses'=>'BieuMauController@postTaoMoiBieuMau',
		'as'=>'quanlyvanban.bieumau.taomoibieumau'
	]);

});
//Admin

Route::namespace('Admin')->group(function(){
	Route::get('/admin-page', [
	    'uses' =>'IndexController@index',
	    'as' => 'admin.index'
	]);
	Route::get('/admin/quanlynhansu', [
	    'uses' =>'NhanSuController@index',
	    'as' => 'admin.nhansu.index'
	]);
	Route::post('/admin/quanlynhansu', [
	    'uses' =>'NhanSuController@postsearch',
	    'as' => 'admin.nhansu.index'
	]);
	Route::get('/admin/quanlynhansu/them-nhan-su', [
	    'uses' =>'NhanSuController@add',
	    'as' => 'admin.nhansu.add'
	]);
	Route::post('/admin/quanlynhansu/them-nhan-su', [
	    'uses' =>'NhanSuController@postadd',
	    'as' => 'admin.nhansu.add'
	]);
	Route::get('/admin/quanlynhansu/xoa-nhan-su/{id}', [
	    'uses' =>'NhanSuController@delete',
	    'as' => 'admin.nhansu.delete'
	]);
	Route::get('/admin/quanlynhansu/sua-nhan-su/{id}', [
	    'uses' =>'NhanSuController@edit',
	    'as' => 'admin.nhansu.edit'
	]);
	Route::post('/admin/quanlynhansu/sua-nhan-su/{id}', [
	    'uses' =>'NhanSuController@postedit',
	    'as' => 'admin.nhansu.edit'
	]);
});
//Đăng xuất
Route::get('/dang-xuat',function(){
	Session::flush();
	return redirect(url('/'));
});

//test
Route::get('/test',function(){
	return view('quanlyvanban.test.Success');
});