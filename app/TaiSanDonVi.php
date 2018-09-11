<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class TaiSanDonVi extends Model
{
    public function getAll(){
    	return DB::table('taisandonvi')->select('MA_TAI_SAN','TEN_TAI_SAN','TEN_DON_VI','SO_LUONG','taisandonvi.GHI_CHU')->join('donvi','taisandonvi.MA_DON_VI','=','donvi.MA_DON_VI')->paginate(3);
    }
}
