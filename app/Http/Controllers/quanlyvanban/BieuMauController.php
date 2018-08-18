<?php

namespace App\Http\Controllers\quanlyvanban;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

class BieuMauController extends Controller
{
    public function danhSachBieuMau($page){
        if(!Session::has('username'))
            return redirect(url('/dangnhap'));
    	$sqlQuery = "SELECT b.*,TEN_DON_VI,nhansu.HO_VA_TEN FROM bieumau b inner join donvi on donvi.MA_DON_VI = b.DON_VI_BAN_HANH inner join nhansu on nhansu.MA_NHAN_SU = b.NGUOI_KY_DUYET";
    	$tuKhoa = '';
        $loaiTimKiem = '';
    	return view('quanlyvanban.bieumau.DanhSachBieuMau')->with(array('page'=>$page,'sqlQuery'=>$sqlQuery,'tuKhoa'=>$tuKhoa,'loaiTimKiem'=>$loaiTimKiem));
    }
    public function getTaoMoiBieuMau(){
    	$DonVi = \DB::table('donvi')->get()->toArray();
    	$NhanSu = \DB::table('nhansu')->get()->toArray();
    	$dsDonVi = array();
    	$dsNhanSu = array();
    	foreach ($DonVi as $item) {
    		$dsDonVi[ $item->MA_DON_VI] = $item->TEN_DON_VI;
    	}
    	foreach ($NhanSu as $item) {   
    		$dsNhanSu[ $item->MA_NHAN_SU] = $item->HO_VA_TEN;
    	}
    	$data = array('dsDonVi'=>$dsDonVi,'dsNhanSu'=>$dsNhanSu);
    	return view('quanlyvanban.bieumau.FormTaoMoiBieuMau')->with($data);
    }
    public function postTaoMoiBieuMau(Request $request){
    	$maBieumau = time();
    	$tenBieuMau = $request->TenBieuMau;
    	$donViBanHanh = $request->DonViBanHanh;
    	$ngayBanHanh = $request->NgayBanHanh;
    	$ngayGui = $request->NgayGui;
    	$trichYeuNoiDung = $request->TrichYeuNoiDung;
    	$nguoiKyDuyet = $request->NguoiKyDuyet;
    	$fileDinhKem = ($request->file('FileDinhKem')!==null)?$request->file('FileDinhKem'):array();
    	\DB::table('bieumau')->insert(array('MA_BIEU_MAU'=>$maBieumau,'TEN_NHOM_BIEU_MAU'=>$tenBieuMau,'NGAY_BAN_HANH'=>$ngayBanHanh,'DON_VI_BAN_HANH'=>$donViBanHanh,'NGAY_GUI'=>$ngayGui,'TRICH_YEU_NOI_DUNG'=>$trichYeuNoiDung,'NGUOI_KY_DUYET'=>$nguoiKyDuyet));
    	foreach ($fileDinhKem as $file) {
            //lưu file vào thư mục public\file với định dạng tên timestamp+tên file
            $tenFileMoi = time().$file->getClientOriginalName();
            $file->move('file_bieumau', $tenFileMoi);
            //them vao bang congvan_filedinhkem
            \DB::table('bieumau_filedinhkem')->insert(array('MA_BIEU_MAU'=>$maBieumau,'FILE_DINH_KEM'=>$tenFileMoi));
        }
    	return redirect(url('/DanhSachBieuMau/1'));
    }
    function phanTrang($page,$sqlQuery,$tuKhoa,$loaiTimKiem){
        //ds cong van gui cho nhan su hop voi cong van gui cho don vi
            $data = \DB::select($sqlQuery);
            $total_records = count($data);
            $current_page = $page;
            $limit = 4;
            if($total_records<$limit)
                $limit = $total_records;
            $total_page = ($total_records!=0)? ceil($total_records / $limit):1;
            // Giới hạn current_page trong khoảng 1 đến total_page
            if ($current_page > $total_page){
                $current_page = $total_page;
            }
            else if ($current_page < 1){
                 $current_page = 1;
            }
            // Tìm Start
            $start = ($current_page - 1) * $limit;
            // Lấy dữ liệu theo limit và start
            $data1 = \DB::select($sqlQuery." limit {$start},{$limit}");
           // $data1 = \DB::table('dscongvanden')->skip($start)->take($limit)->get()->toArray();
            // lặp để hiển thị
            if($total_records>0)
            foreach ($data1 as $value) {
            		$maBieuMau = $value->MA_BIEU_MAU;
                        $tenBieuMau =$value->TEN_NHOM_BIEU_MAU;
                        $donViBanHanh =$value->TEN_DON_VI;
                        $ngaybanhanh = $value->NGAY_BAN_HANH;
                        $ngayGui = $value->NGAY_GUI;
                        $trichyeunoiDung = $value->TRICH_YEU_NOI_DUNG;
                        $ngươiKyDuyet = $value->HO_VA_TEN;
                        // tóm tắt nếu nọi dung quá dài
                        if(strlen($trichyeunoiDung)>50) $trichyeunoiDung= substr($trichyeunoiDung,0,100)."...";
                        echo "
                        <p style='text-align: left;''>
                        (Tên biểu mẫu: {$tenBieuMau}) - {$donViBanHanh} <br>
                        Về việc: {$trichyeunoiDung}  - <i>{$ngaybanhanh}</i>.<br>
                                    File đính kèm: 
                                    ";
                        $dsFile = \DB::table('bieumau_filedinhkem')->where('MA_BIEU_MAU',$maBieuMau)->get()->toArray();
                        foreach($dsFile as $key => $value)
                        echo "<a href='".url("file_bieumau/{$value->FILE_DINH_KEM}")."' download>".$value->FILE_DINH_KEM.'</a> ';
                                    echo '<hr></p>';
            }
            else echo 'Không tìm thấy biểu mẫu nào';
            echo "<br/>";
            // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
            if ($current_page > 1 && $total_page > 1){
                if($loaiDS == 1)
                echo '<a href='.url('/DanhSachBieuMau').'/'.($current_page-1).'>Prev</a> | ';
            }
           
            // Lặp khoảng giữa
            for ($i = 1; $i <= $total_page; $i++){
             // Nếu là trang hiện tại thì hiển thị thẻ span
            // ngược lại hiển thị thẻ a
                if ($i == $current_page){
                 echo '<span>'.$i.'</span> | ';
                }
                else{
                        echo '<a href='.url('/DanhSachBieuMau').'/'.$i.'>'.$i.'</a> | ';

                }
            }
 
        // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
        if ($current_page < $total_page && $total_page > 1){
                echo '<a href='.url('/DanhSachBieuMau').'/'.($current_page+1).'>Next</a> ';
        }
    }
}
