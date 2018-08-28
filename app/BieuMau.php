<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BieuMau extends Model
{
    public function getAll(){    	
    	return \DB::table('bieumau')->select('bieumau.*','TEN_DON_VI','HO_VA_TEN')->join('donvi','donvi.MA_DON_VI','=','bieumau.DON_VI_BAN_HANH')->join('nhansu','nhansu.MA_NHAN_SU','=','bieumau.NGUOI_KY_DUYET')->paginate(2);
    }
    //Thêm mới biểu mẫu
    public function themMoi(array $values){
    	\DB::table('bieumau')->insert($values);
    }

    //Thêm mới vào table bieumau_filedinhkem
    public function themFileDinhKem(array $values){
    	\DB::table('bieumau_filedinhkem')->insert($values);	
    }
}
