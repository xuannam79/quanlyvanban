<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
class AuthController extends Controller
{
    public function kiemTraDangNhap(Request $request){
            $tendangnhap = $request->all()['username'];
            $matkhau = $request->all()['password'];
            $data = \DB::table('taikhoan')->join('nhansu_thuocdonvi','taikhoan.MA_NHAN_SU','=','nhansu_thuocdonvi.MA_NHAN_SU')->join('nhansu','nhansu_thuocdonvi.MA_NHAN_SU','=','nhansu.MA_NHAN_SU')->join('donvi','donvi.MA_DON_VI','=','nhansu_thuocdonvi.MA_DON_VI')->where('TEN_DANG_NHAP',$tendangnhap)->where('MAT_KHAU',$matkhau)->get();
            if(count($data)>0){
                if($data->first()->QUYEN_TRUY_CAP == 3){
                    foreach ($data as $value) {
                        Session::put( array('username' => $value->TEN_DANG_NHAP,'chucVu' => $value->MA_CHUC_VU,'maNhanSu' => $value->MA_NHAN_SU,'tenNhanSu'=>$value->HO_VA_TEN,'maDonVi'=>$value->MA_DON_VI,'tenDonVi'=>$value->TEN_DON_VI,'quyenTruyCap'=>$value->QUYEN_TRUY_CAP));
                    }
                    return redirect()->route('admin.index');
                }
                else{
                    foreach ($data as $value) {
                    Session::put(array('username' => $value->TEN_DANG_NHAP,'chucVu' => $value->MA_CHUC_VU,'maNhanSu' => $value->MA_NHAN_SU,'tenNhanSu'=>$value->HO_VA_TEN,'maDonVi'=>$value->MA_DON_VI,'tenDonVi'=>$value->TEN_DON_VI,'quyenTruyCap'=>$value->QUYEN_TRUY_CAP));
                    }
                    return redirect()->route('quanlyvanban.congvan.index');
                }
            }
            else{
                return 'đăng nhập thất bại <br> <a href = "'.route('quanlyvanban.auth.index').'">quay lai</a>';
            }
            
    }
    public function showForm(){
        return view('quanlyvanban.auth.index');
    }
}
