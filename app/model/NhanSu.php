<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class NhanSu extends Model
{
    public function layDanhSachNhanSu(){
    	//return Cat::OrderBy('cat_id','desc')->get(); // lấy giảm dần
   	  return DB::table('nhansu')->distinct()->paginate(3); // phân trang
    }
    public function themNhanSu($id,$hoten,$namsinh,$gioitinh,$diachi,$sodienthoai,$email){
   	  return DB::table('nhansu')->insert(['MA_NHAN_SU' => $id ,'HO_VA_TEN' => $hoten,'NAM_SINH' => $namsinh,'GIOI_TINH' => $gioitinh,'DIA_CHI' => $diachi,'SO_DIEN_THOAI' => $sodienthoai,'EMAIL' => $email]);
    }
    public function getItem($id){
      return DB::table('nhansu')->where('MA_NHAN_SU',$id)->first();
    }	
    public function getItemConditon($id,$name){
      return DB::table('nhansu')->where('MA_NHAN_SU','LIKE','%'.$id.'%')->orwhere('HO_VA_TEN','LIKE','%'.$name.'%')->paginate(3);
    }
    public function getAll(){
      return \DB::table('nhansu')->get();
    }
    
}
