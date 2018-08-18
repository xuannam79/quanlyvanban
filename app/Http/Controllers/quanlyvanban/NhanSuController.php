<?php

namespace App\Http\Controllers\quanlyvanban;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

class NhanSuController extends Controller
{
    public function danhSachNhanSu(){
        $data = \DB::table('nhansu')->get()->toArray();
        return view('DanhSachNhanSu')->with(['dsNhanSu'=>$data]);
    }
    public function chiTietNhanSu($maNhanSu){
        $data = \DB::table('nhansu')->where('MA_NHAN_SU',$maNhanSu)->get()->toArray();
        $dsChucVu = \DB::table('nhansu')->select('TEN_DON_VI','TEN_CHUC_VU','TU_NGAY','DEN_NGAY')->join('nhansu_thuocdonvi','nhansu_thuocdonvi.MA_NHAN_SU','=','nhansu.MA_NHAN_SU')->join('donvi','nhansu_thuocdonvi.MA_DON_VI','=','donvi.MA_DON_VI')->join('chucvu','nhansu_thuocdonvi.MA_CHUC_VU','=','chucvu.MA_CHUC_VU')->where('nhansu.MA_NHAN_SU',$maNhanSu)->get()->toArray();
        return view('chiTietNhanSu')->with(['nhanSu'=>$data,'dsChucVu'=>$dsChucVu]);
    }
    public function formThemNhanSu(){
    	$data = \DB::table('donvi')->get()->toArray();
    	$dsDonVi = array();
    	$dsLoaiNhanVien = array('1' => 'Nhân viên chính thức', '2' => 'Nhân viên kiêm nhiệm','3' => 'Nhân viên hợp đồng');
    	$dsChucVu = array('1' => 'Trưởng phòng', '2'=>'Phó phòng','3'=>'Thường');
    	foreach ($data as $item) {
    		$dsDonVi[ $item->MA_DON_VI] = $item->TEN_DON_VI;
    	}
        $dsThamSo = array('dsDonVi'=>$dsDonVi,'dsChucVu'=>$dsChucVu,'dsLoaiNhanVien'=>$dsLoaiNhanVien);
    	return view('ThemNhanSu')->with($dsThamSo);
    } 
    public function themNhanSu(Request $request){
        $this->Validate(
            $request,
            [
                'MaNhanSu' => 'required',
                'TenNhanSu'=> 'required',
                'NamSinh'=> 'required',
                'DiaChi' => 'required',
                'Email' => 'required',
                'SoDienThoai' => 'required',
                'GioiTinh' => 'required',
                'TenDangNhap'=>'required'
            ],
            [
                'required' => ':attribute không được để trống!'
            ],
            [
                'MaNhanSu' => 'Mã nhân sự',
                'TenNhanSu'=> 'Tên nhân sự',
                'NamSinh'=> 'Năm sinh',
                'DiaChi' => 'Địa chỉ',
                'Email' => 'Email',
                'SoDienThoai' => 'Số điện thoại',
                'GioiTinh' => 'Giới tính',
                'TenDangNhap' => 'Tên đăng nhập'
            ]
        );
       
        $maNhanSu = $request->all()['MaNhanSu'];
        $tenNhanSu = $request->all()['TenNhanSu'];
        $gioiTinh = $request->all()['GioiTinh'];
        $namSinh = $request->all()['NamSinh'];
        $tenDangNhap = $request->all()['TenDangNhap'];
        $matKhau = isset($request->all()['MatKhau'])?$request->all()['MatKhau']:'';
        $diaChi = $request->all()['DiaChi'];
        $email = $request->all()['Email'];
        $soDienThoai = $request->all()['SoDienThoai'];
        //insert vao bang nhan su
        $donVi = $request->all()['DonVi'];
        $chucVu = $request->all()['ChucVu'];
        $loaiNhanVien = $request->all()['LoaiNhanVien'];
        $ngayBatDau = $request->all()['NgayBatDau'];
        $duLieuTruyenVao_nhansu = array('MA_NHAN_SU' => $maNhanSu,'HO_VA_TEN'=>$tenNhanSu,'NAM_SINH'=>$namSinh,'GIOI_TINH'=>$gioiTinh,'DIA_CHI'=>$diaChi,'SO_DIEN_THOAI'=>$soDienThoai,'EMAIL'=>$email);
        \DB::table('nhansu')->insert($duLieuTruyenVao_nhansu);
        for($i = 0; $i < count($chucVu) ; $i++ ){
            //them vao bang nhansu_thuocdonvi
            $duLieuTruyenVao_nhansu_thuocdonvi = array('MA_NHAN_SU'=>$maNhanSu,'MA_DON_VI'=>$donVi[$i],'MA_CHUC_VU'=>$chucVu[$i],'MA_LOAI_NV'=>$loaiNhanVien[$i],'TU_NGAY'=>$ngayBatDau[$i]);
            \DB::table('nhansu_thuocdonvi')->insert($duLieuTruyenVao_nhansu_thuocdonvi);
        }
        $data = array('donVi' => $donVi,'chucVu'=>$chucVu,'loaiNhanVien'=>$loaiNhanVien,'ngayBatDau'=>$ngayBatDau);
        return view('Fail')->with($data);
    }
    function tenDangNhapDaTonTai($tenDangNhap){
        $danhSachTaiKhoanHienCo = \DB::table('taikhoan')->where('TEN_DANG_NHAP',$tenDangNhap)->get();
        if(count($danhSachTaiKhoanHienCo)>0){
            Session::flash('TDNTonTai','Tên đăng nhập này đã tồn tại');
            return view('ThemNhanSu');
        }
    }
}
