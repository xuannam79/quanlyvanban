<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Session;
class CongVan extends Model
{
    public function danhSachCongVanDen(){ 
        return DB::table('dscongvanden')->where('MA_CVNS',Session::get('maNhanSu'))->orWhere('MA_CVDV',Session::get('maDonVi'))->where('LOAI_GUI',Session::get('chucVu'))->paginate(3);
    }
    public function fileDinhKem($soCongVan){
        return DB::table('congvan_filedinhkem')->select('FILE_DINH_KEM')->where('SO_CONG_VAN',$soCongVan)->get();
    }
    public function danhSachCongVanDi(){
        return DB::table('congvan')->join('donvi','donvi.MA_DON_VI','=','congvan.DON_VI_BAN_HANH')->where('NGUOI_GUI',Session::get('maNhanSu'))->paginate(3);
    }

    public function taoMoiCongVan(){

    }

    public function timCongVanDenTheoSoCongVan($soCongVan){
        return DB::table('dscongvanden')->where('SO_CONG_VAN','LIKE','%'.$soCongVan.'%')->where('MA_CVNS',Session::get('maNhanSu'))->orWhere('MA_CVDV',Session::get('maDonVi'))->where('LOAI_GUI',Session::get('chucVu'))->paginate(3);
    }

    public function timCongVanDenTheoTrichYeuNoiDung($trichYeuNoiDung){
        return DB::table('dscongvanden')->where('TRICH_YEU_NOI_DUNG','LIKE','%'.$trichYeuNoiDung.'%')->where('MA_CVNS',Session::get('maNhanSu'))->orWhere('MA_CVDV',Session::get('maDonVi'))->where('LOAI_GUI',Session::get('chucVu'))->paginate(3);
    }

    public function timCongVanDenTheoDonViBanHanh($maDonVi){
    	return DB::table('dscongvanden')->where('DON_VI_BAN_HANH',$maDonVi)->where('MA_CVNS',Session::get('maNhanSu'))->orWhere('MA_CVDV',Session::get('maDonVi'))->where('LOAI_GUI',Session::get('chucVu'))->paginate(3);
    }

    public function timCongVanDiTheoSoCongVan($soCongVan){
        return DB::table('congvan')->join('donvi','donvi.MA_DON_VI','=','congvan.DON_VI_BAN_HANH')->where('SO_CONG_VAN','LIKE','%'.$soCongVan.'%')->where('NGUOI_GUI',Session::get('maNhanSu'))->paginate(3);
    }

    public function timCongVanDiTheoTrichYeuNoiDung($trichYeuNoiDung){
        return DB::table('congvan')->join('donvi','donvi.MA_DON_VI','=','congvan.DON_VI_BAN_HANH')->where('TRICH_YEU_NOI_DUNG','LIKE','%'.$trichYeuNoiDung.'%')->where('NGUOI_GUI',Session::get('maNhanSu'))->paginate(3);
    }

}
