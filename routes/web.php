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

Route::namespace('quanlyvanban')->group(function(){
	Route::get('/trang-chu',[
		'uses'=>'CongVanController@trangChu',
		'as'=>'quanlyvanban.congvan.index'
	]);
	Route::get('/danh-sach-cong-van-den-{page}',[
		'uses'=>'CongVanController@danhSachCongVanDen',
		'as'=>'quanlyvanban.congvan.danhsachcongvanden'
	]);
	Route::post('/danh-sach-cong-van-den-{page}',[
		'uses'=>'CongVanController@danhSachCongVanDen',
		'as'=>'quanlyvanban.congvan.danhsachcongvanden'
	]);
	Route::get('/danh-sach-cong-van-di-{page}',[
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
	Route::get('/danh-sach-bieu-mau-{page}',[
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
//Đăng xuất
Route::get('/dang-xuat',function(){
	Session::flush();
	return redirect(url('/'));
});
//Biểu mẫu


Route::get('/FrmChinhSuaCongVan/{soCongVan}','CongVanController@frmChinhSuaCongVan');
Route::post('/ChinhSuaCongVan','CongVanController@chinhSuaCongVan');



//danh sách công văn
Route::get('/TimKiemNangcao',function(){return view('TrangChu');});
//phản hồi văn bản
//Biểu mẫu
Route::get('/DanhSachBieuMau/{page}','BieuMauController@danhSachBieuMau');
Route::get('/TaoMoiBieuMau','BieuMauController@getTaoMoiBieuMau');
Route::post('/TaoMoiBieuMau','BieuMauController@postTaoMoiBieuMau');

// Nhan su controller
Route::get('/DanhSachNhanSu', 'NhanSuController@danhSachNhanSu');
Route::get('/FormThemNhanSu','NhanSuController@formThemNhanSu');
Route::post('/ThemNhanSu','NhanSuController@themNhanSu');
Route::get('/ChiTietNhanSu/{maNhanSu}','NhanSuController@chiTietNhanSu');
//test
Route::get('/test',function(){
	return view('quanlyvanban.test.Success');
});