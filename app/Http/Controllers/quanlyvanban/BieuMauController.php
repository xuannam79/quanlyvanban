<?php

namespace App\Http\Controllers\quanlyvanban;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\BieuMauRequest;
use Session;
use App\BieuMau;
use App\DonVi;
use App\NhanSu;
class BieuMauController extends Controller
{
    public function __construct(BieuMau $bieuMau,NhanSU $nhanSu,DonVi $donVi){
        $this->bieuMau = $bieuMau;
        $this->donVi = $donVi;
        $this->nhanSu = $nhanSu;
    }

    public function danhSachBieuMau(){
        if(!Session::has('username'))
            return redirect(url('/'));
    	$dsBieuMau = $this->bieuMau->getAll();
        return view('quanlyvanban.bieumau.DanhSachBieuMau',compact('dsBieuMau'));
    }
    public function getTaoMoiBieuMau(){
    	$dsDonVi = $this->donVi->getAll();
    	$dsNhanSu = $this->nhanSu->getAll();
    	return view('quanlyvanban.bieumau.FormTaoMoiBieuMau',compact('dsDonVi','dsNhanSu'));
    }
    public function postTaoMoiBieuMau(BieuMauRequest $request){
    	$maBieumau = time();
    	$tenBieuMau = $request->TenBieuMau;
    	$donViBanHanh = $request->DonViBanHanh;
    	$ngayBanHanh = $request->NgayBanHanh;
    	$ngayGui = $request->NgayGui;
    	$trichYeuNoiDung = $request->TrichYeuNoiDung;
    	$nguoiKyDuyet = $request->NguoiKyDuyet;
    	$fileDinhKem = ($request->file('FileDinhKem')!==null)?$request->file('FileDinhKem'):array();
    	$values = array('MA_BIEU_MAU'=>$maBieumau,'TEN_NHOM_BIEU_MAU'=>$tenBieuMau,'NGAY_BAN_HANH'=>$ngayBanHanh,'DON_VI_BAN_HANH'=>$donViBanHanh,'NGAY_GUI'=>$ngayGui,'TRICH_YEU_NOI_DUNG'=>$trichYeuNoiDung,'NGUOI_KY_DUYET'=>$nguoiKyDuyet);
        $this->bieuMau->themMoi($values);
    	foreach ($fileDinhKem as $file) {
            //lấy mã biểu mẫu (là một timestamp) để làm ràng buộc thêm vào bảng bieumau_filedinhkem
            $tenFileMoi = time().$file->getClientOriginalName();
            $file->move('file_bieumau', $tenFileMoi);
            //them vao bang congvan_filedinhkem
            $this->bieuMau->themFileDinhKem(array('MA_BIEU_MAU'=>$maBieumau,'FILE_DINH_KEM'=>$tenFileMoi));
        }
    	return redirect()->route('quanlyvanban.bieumau.danhsachbieumau');
    }
    
}
