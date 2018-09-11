<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class TaiSanDonVi extends Model
{
    private $page = 5;
    public function getAll(){
    	return DB::table('taisandonvi')->select('MA_TAI_SAN','TEN_TAI_SAN','TEN_DON_VI','SO_LUONG','taisandonvi.GHI_CHU')->join('donvi','taisandonvi.MA_DON_VI','=','donvi.MA_DON_VI')->paginate($this->page);
    }
    public function getByID($maTaiSan){
        return DB::table('taisandonvi')->select('MA_TAI_SAN','TEN_TAI_SAN','TEN_DON_VI','SO_LUONG','taisandonvi.GHI_CHU')->join('donvi','taisandonvi.MA_DON_VI','=','donvi.MA_DON_VI')->where('MA_TAI_SAN',$maTaiSan)->paginate($this->page);
    }

    public function add($tenTaiSan, $maDonVi, $soLuong, $ghiChu){
        DB::table('taisandonvi')->insert(['TEN_TAI_SAN'=>$tenTaiSan,'MA_DON_VI'=>$maDonVi,'SO_LUONG' => $soLuong,'GHI_CHU'=>$ghiChu]);
    }

    public function edit($maTaiSan,$tenTaiSan, $maDonVi, $soLuong, $ghiChu){
        DB::table('taisandonvi')->where('MA_TAI_SAN',$maTaiSan)->update(['TEN_TAI_SAN'=>$tenTaiSan,'MA_DON_VI'=>$maDonVi,'SO_LUONG' => $soLuong,'GHI_CHU'=>$ghiChu]);
    }

    public function remove($maTaiSan){
        DB::table('taisandonvi')->where('MA_TAI_SAN',$maTaiSan)->delete();
    }

    public function search($tenTaiSan,$maDonVi){
        return DB::table('taisandonvi')->select('MA_TAI_SAN','TEN_TAI_SAN','TEN_DON_VI','SO_LUONG','taisandonvi.GHI_CHU')->join('donvi','taisandonvi.MA_DON_VI','=','donvi.MA_DON_VI')->where('TEN_TAI_SAN','like','%'.$tenTaiSan.'%')->where('taisandonvi.MA_DON_VI',$maDonVi)->paginate($this->page);
    }
}
