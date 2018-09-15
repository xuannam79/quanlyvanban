<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class TinNhan extends Model
{
    public function tinNhanMoiNhat($maNhanSu){
    	return DB::table('tinnhan')->select('NOI_DUNG','HO_VA_TEN')->join('nhansu','NGUOI_GUI','=','MA_NHAN_SU')->orderByRaw('NGAY_GUI,GIO_GUI desc')->where('NGUOI_NHAN',$maNhanSu)->take(5)->get();
    }

    public function tinNhanDaGui($maNhanSu){
    	return DB::table('tinnhan')->select('NOI_DUNG','NGAY_GUI')->join('nhansu','NGUOI_GUI','=','MA_NHAN_SU')->orderByRaw('NGAY_GUI desc')->where('NGUOI_GUI',$maNhanSu)->take(5)->get();
    }

    public function guiTinNhan($nguoiGui,$nguoiNhan,$noiDung,$ngayGui){
    	return DB::table('tinnhan')->insert(['NGUOI_GUI'=>$nguoiGui,'NGUOI_NHAN'=>$nguoiNhan,'NOI_DUNG'=>$noiDung,'NGAY_GUI'=>$ngayGui,'DA_DOC'=>0]);
    }

    public function docTinNhan($maTinNhan){
    }
}
