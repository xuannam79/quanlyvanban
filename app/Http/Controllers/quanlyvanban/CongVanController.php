<?php

namespace App\Http\Controllers\quanlyvanban;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

class CongVanController extends Controller
{
    //---------------------------------------------------------------------------------------------------------------------------------
    //Danh sách công văn
    function danhSachCongvanDi(Request $request,$page){
        if(!Session::has('username'))
            return redirect()->route('quanlyvanban.auth.index');
        $sqlQuery = "SELECT c.*,d.TEN_DON_VI FROM congvan c inner join donvi d on d.MA_DON_VI = c.DON_VI_BAN_HANH ";
        $DonVi = \DB::table('donvi')->get()->toArray();
        $dsDonVi = array();
        foreach ($DonVi as $item) {
            $dsDonVi[ $item->MA_DON_VI] = $item->TEN_DON_VI;
        }
        $tuKhoa = '';
        $loaiTimKiem = '';
        //form tìm kiếm văn bản
        if(isset($request->all()['TimKiemVanBanDi'])){
            $loaiTimKiem = $request->all()['LoaiTimKiem'];
            $tuKhoa = $request->all()['keyword'];
            if($loaiTimKiem == 1){
                $sqlQuery = "SELECT c.SO_CONG_VAN,c.TRICH_YEU_NOI_DUNG,d.TEN_DON_VI,c.NGAY_BAN_HANH,c.NGUOI_GUI FROM congvan c inner join donvi d on d.MA_DON_VI = c.DON_VI_BAN_HANH where SO_CONG_VAN like '%{$tuKhoa}%' ";
            }
            else if($loaiTimKiem == 2){
                $sqlQuery = "SELECT c.SO_CONG_VAN,c.TRICH_YEU_NOI_DUNG,d.TEN_DON_VI,c.NGAY_BAN_HANH,c.NGUOI_GUI FROM congvan c inner join donvi d on d.MA_DON_VI = c.DON_VI_BAN_HANH where TRICH_YEU_NOI_DUNG like '%{$tuKhoa}%' ";
            }
            else if($loaiTimKiem == 3){
                $donViTimKiem = $request->all()['DSDonVi'];
                $sqlQuery = "SELECT c.SO_CONG_VAN,c.TRICH_YEU_NOI_DUNG,d.TEN_DON_VI,c.NGAY_BAN_HANH,c.NGUOI_GUI FROM congvan c inner join donvi d on d.MA_DON_VI = c.DON_VI_BAN_HANH where DON_VI_BAN_HANH = '{$donViTimKiem}' ";
            }
        }
        return view('quanlyvanban.congvan.DanhSachCongvanDi')->with(array('page'=>$page,'sqlQuery'=>$sqlQuery,'tuKhoa'=>$tuKhoa,'loaiTimKiem'=>$loaiTimKiem,'DSDonVi'=>$dsDonVi));;
    }

    function trangChu(){
        if(!Session::has('username'))
            return redirect(route('quanlyvanban.auth.index'));
        return view('quanlyvanban.congvan.index');
    }

    function danhSachCongVanDen(Request $request,$page){
        $sqlQuery = "SELECT * FROM dscongvanden where  (MA_CVNS = '".Session::get('maNhanSu')."' or (MA_CVDV = '".Session::get('maDonVi')."' and LOAI_GUI = '".Session::get('chucVu')."'))";
        $DonVi = \DB::table('donvi')->get()->toArray();
        $dsDonVi = array();
        foreach ($DonVi as $item) {
            $dsDonVi[ $item->MA_DON_VI] = $item->TEN_DON_VI;
        }
        $tuKhoa = '';
        $loaiTimKiem = '';
        //form tìm kiếm văn bản 
        if(isset($request->all()['TimKiemVanBanDen'])){
            $loaiTimKiem = $request->all()['LoaiTimKiem'];
            $tuKhoa = $request->all()['keyword'];
            if($loaiTimKiem == 1){
                $sqlQuery = "SELECT * FROM dscongvanden where SO_CONG_VAN like '%{$tuKhoa}%' and (MA_CVNS = '".Session::get('maNhanSu')."' or (MA_CVDV = '".Session::get('maDonVi')."' and LOAI_GUI = '".Session::get('chucVu')."'))";
            }
            else if($loaiTimKiem == 2){
                $sqlQuery = "SELECT * FROM dscongvanden where TRICH_YEU_NOI_DUNG like '%{$tuKhoa}%' and (MA_CVNS = '".Session::get('maNhanSu')."' or (MA_CVDV = '".Session::get('maDonVi')."' and LOAI_GUI = '".Session::get('chucVu')."'))";
            }
            else if($loaiTimKiem == 3){
                $donViTimKiem = $request->all()['DSDonVi'];
                $sqlQuery = "SELECT * FROM dscongvanden where DON_VI_BAN_HANH = '{$donViTimKiem}' and (MA_CVNS = '".Session::get('maNhanSu')."' or (MA_CVDV = '".Session::get('maDonVi')."' and LOAI_GUI = '".Session::get('chucVu')."'))";
            }
        }
        //var_dump($KeyWord);
        return view('quanlyvanban.congvan.DanhSachCongVanDen')->with(array('page'=>$page,'sqlQuery'=>$sqlQuery,'tuKhoa'=>$tuKhoa,'loaiTimKiem'=>$loaiTimKiem,'DSDonVi'=>$dsDonVi));
    }
    public function danhSachCongVanDen_TimKiemnangCao(){
        return view('quanlyvanban.congvan.DanhSachCongVanDen_TimKiemNangCao');
    }
    function phanTrang($page,$sqlQuery,$tuKhoa,$loaiTimKiem,$loaiDS=1){
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
                        $IdVanBan =$value->SO_CONG_VAN;
                        $PhongBan =$value->NGUOI_GUI;
                        $Noidungtomtat =$value->TRICH_YEU_NOI_DUNG;
                        $ngaybanhanh = $value->NGAY_BAN_HANH;
                        $donViBanHanh = $value->TEN_DON_VI;
                        $capDoQuanTrong = $value->CAP_DO_QUAN_TRONG;
                        $strCapDoQuanTrong = $capDoQuanTrong=='0'?"<i><font color='red'>Khẩn</font></i>":'';
                        $urlPhanHoi = route('quanlyvanban.congvan.phanhoicongvan',['soCongVan'=>$IdVanBan]);
                        if($tuKhoa != '' and $loaiTimKiem ==1){
                            $IdVanBan=str_replace($tuKhoa,"<b>".$tuKhoa."</b>",$IdVanBan);
                        }
                        else if($tuKhoa != '' and $loaiTimKiem ==2){
                            $Noidungtomtat=str_replace($tuKhoa,"<b>".$tuKhoa."</b>",$Noidungtomtat);
                        }
                        else if($tuKhoa != '' and $loaiTimKiem ==3){
                            $donViBanHanh=str_replace($tuKhoa,"<b>".$tuKhoa."</b>",$donViBanHanh);
                        }
                        // tóm tắt nếu nọi dung quá dài
                        if(strlen($Noidungtomtat)>50) $Noidungtomtat= substr($Noidungtomtat,0,100)."...";
                        if($loaiDS == 1){
                                    echo "
                                    <p style='text-align: left;''>
                                    Số ký hiệu văn bản: {$IdVanBan} - {$donViBanHanh} $strCapDoQuanTrong<br>
                                    Về việc: {$Noidungtomtat}  - <i>{$ngaybanhanh}</i>.<a href='{$urlPhanHoi}' style='color: red;'>Phản hồi văn bản.</a><br>
                                    File đính kèm: 
                                    ";
                                    $dsFile = \DB::table('congvan_filedinhkem')->where('SO_CONG_VAN',$IdVanBan)->get()->toArray();
                                    foreach($dsFile as $key => $value)
                                        echo "<a href='".url("file/{$value->FILE_DINH_KEM}")."' download>".$value->FILE_DINH_KEM.'</a> ';
                                    echo '<hr></p>';
                                }
                        else{
                            echo "
                                <p style='text-align: left;''>
                                Số ký hiệu văn bản: {$IdVanBan}<br>
                                Về việc: {$Noidungtomtat}  - <i>{$ngaybanhanh}</i>.<a href='{$urlPhanHoi}' style='color: red;'>Tình trạng văn bản.</a><br>
                                File đính kèm: 
                                ";
                                $dsFile = \DB::table('congvan_filedinhkem')->where('SO_CONG_VAN',$IdVanBan)->get()->toArray();
                                    foreach($dsFile as $key => $value)
                                        echo "<a href='".url("file/{$value->FILE_DINH_KEM}")."' download>".$value->FILE_DINH_KEM.'</a> ';
                                    echo '<hr></p>';
                        }
            }
            else echo 'Không tìm thấy văn bản nào';
            echo "<br/>";
            // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
            if ($current_page > 1 && $total_page > 1){
                //echo '<a href="/DanhSachCongVanDen/'.($current_page-1).'">Prev</a> | ';
                if($loaiDS == 1)
                echo '<a href='.route('quanlyvanban.congvan.danhsachcongvanden',['page'=>$current_page-1]).'>Prev</a> | ';
                else 
                    echo '<a href='.route('quanlyvanban.congvan.danhsachcongvandi',['page'=>$current_page-1]).'>Prev</a> | ';
            }
           
            // Lặp khoảng giữa
            for ($i = 1; $i <= $total_page; $i++){
             // Nếu là trang hiện tại thì hiển thị thẻ span
            // ngược lại hiển thị thẻ a
                if ($i == $current_page){
                 echo '<span>'.$i.'</span> | ';
                }
                else{
                    if($loaiDS == 1)
                        echo '<a href='.route('quanlyvanban.congvan.danhsachcongvanden',['page'=>$i]).'>'.$i.'</a> | ';
                    else
                        echo '<a href='.route('quanlyvanban.congvan.danhsachcongvandi',['page'=>$i]).'>'.$i.'</a> | ';
                }
            }
 
        // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
        if ($current_page < $total_page && $total_page > 1){
            if($loaiDS == 1)
                echo '<a href='.route('quanlyvanban.congvan.danhsachcongvanden',['page'=>$current_page+1]).'>Next</a> ';
            else 
                echo '<a href='.route('quanlyvanban.congvan.danhsachcongvandi',['page'=>$current_page+1]).'>Next</a> ';
        }
    }

    //---------------------------------------------------------------------------------------------------------------------------------
    //Tạo mới công văn
    public function getTaoMoiCongVan(){
    	$LoaiVanBan = \DB::table('l_vanban')->get()->toArray();
    	$DonVi = \DB::table('donvi')->get()->toArray();
    	$NhanSu = \DB::table('nhansu')->get()->toArray();
    	$dsLoaiVanBan = array();
    	$dsDonVi = array();
    	$dsNhanSu = array();
        //khi có yêu cầu tìm kiếm người ký duyệt
        // if(isset($request->TimNguoiKyDuyet)){
        //     $donViTimKiem = $request->DonViTimKiem;
        //     $nhanSuTimKiem = $request->NhanSuTimKiem;
        //     $DonVi = \DB::table('donvi')->where('MA_DON_VI',$donViTimKiem)->get()->toArray();
        //     $NhanSu = \DB::table('nhansu')->where('HO_VA_TEN',$nhanSuTimKiem)->get()->toArray();  
        // }
    	//truyền dữ liệu lấy từ database vào mảng tham số
    	foreach ($LoaiVanBan as $item) {
    		$dsLoaiVanBan[ $item->MA_L_NVANBAN] = $item->TEN_L_NVANBAN;
    	}
    	foreach ($DonVi as $item) {
    		$dsDonVi[ $item->MA_DON_VI] = $item->TEN_DON_VI;
    	}
    	foreach ($NhanSu as $item) {   
    		$dsNhanSu[ $item->MA_NHAN_SU] = $item->HO_VA_TEN;
    	}
    	//danh sách các mảng tham số truyền vào view
    	$data = array('dsLoaiVanBan'=>$dsLoaiVanBan,'dsDonVi'=>$dsDonVi,'dsNhanSu'=>$dsNhanSu);
    	return view('quanlyvanban.congvan.frmTaoMoiCongVan')->with($data);
    }

    function postTaoMoiCongVan(Request $request){
    	$this->Validate(
            $request,
            [
                'FileDinhKem' => 'required'
            ],
            [
                'required' => ':attribute'
            ],
            [
                'FileDinhKem' => 'Chưa chọn File đính kèm'
            ]
        );
    	$soCongVan = $request->all()['SoCongVan'];
    	$loaiVanBan = $request->all()['LoaiVanBan'];
    	$ngayBanHanh = $request->all()['NgayBanHanh'];
    	$capDoQuanTrong = isset($request->all()['CapDoQuanTrong'])?'1':'0';
        
    	$donViBanHanh = Session::get('maDonVi');
    	$trichYeuNoiDung = $request->all()['TrichYeuNoiDung'];
    	$FileDinhKem = ($request->file('FileDinhKem')!==null)?$request->file('FileDinhKem'):array();
    	$nguoiGui = session('maNhanSu');
    	$nguoiKyDuyet = $request->all()['NguoiKyDuyet'];
    	$loaiGui = $request->all()['LoaiGui'];
    	//them vao bảng congvan
    	\DB::table('congvan')->insert(array('SO_CONG_VAN'=>$soCongVan,'LOAI_VAN_BAN'=>$loaiVanBan,'NGAY_BAN_HANH'=>$ngayBanHanh,'DON_VI_BAN_HANH'=>$donViBanHanh,'CAP_DO_QUAN_TRONG'=>$capDoQuanTrong,'TRICH_YEU_NOI_DUNG'=>$trichYeuNoiDung,'NGUOI_GUI'=>$nguoiGui,'NGUOI_KY_DUYET'=>$nguoiKyDuyet,'LOAI_GUI'=>$loaiGui));
        foreach ($FileDinhKem as $file) {
            //lưu file vào thư mục public\file với định dạng tên timestamp+tên file
            $tenFileMoi = time().$file->getClientOriginalName();
            $file->move('file', $tenFileMoi);
            //them vao bang congvan_filedinhkem
            \DB::table('congvan_filedinhkem')->insert(array('SO_CONG_VAN'=>$soCongVan,'FILE_DINH_KEM'=>$tenFileMoi,'FILE_KHA_DUNG'=>'1'));
        }
        if($loaiGui==1){
            $dsNguoiNhan = $request->all()['GuiChoCaNhan'];
            //them vao db bang congvan_nhansu
            foreach ($dsNguoiNhan as $value) {
                \DB::table('congvan_nhansu')->insert(array('SO_CONG_VAN'=>$soCongVan,'MA_NHAN_SU'=>$value,'NGAY_NHAN'=>date('y-m-d')));    
            }
        }
        else if($loaiGui==2){
            $dsDonViNhan = $request->all()['GuiChoDonVi'];
            $guiCho = $request->all()['GuiCho'];
            //them vao db bang congvan_donvi
            foreach ($dsDonViNhan as $value){
            \DB::table('congvan_donvi')->insert(array('SO_CONG_VAN'=>$soCongVan,'MA_DON_VI'=>$value,'LOAI_GUI'=>$guiCho,'NGAY_NHAN'=>date('y-m-d')));
            }
        }
        else if($loaiGui == 3){
             $dsTatCaDonVi = \DB::table('donvi')->select('MA_DON_VI')->get()->toArray();
             foreach ($dsTatCaDonVi as $value) {
                \DB::table('congvan_donvi')->insert(array('SO_CONG_VAN'=>$soCongVan,'MA_DON_VI'=>$value->MA_DON_VI,'LOAI_GUI'=>'3','NGAY_NHAN'=>date('y-m-d')));    
             }
        }
    	return redirect()->route('quanlyvanban.congvan.danhsachcongvandi',['page'=>1]);
    }

    //---------------------------------------------------------------------------------------------------------------------------------
    //Chỉnh sửa công văn
    public function frmChinhSuaCongVan($soCongVan){
        //khai báo biến
        $congvan = \DB::table('congvan')->where('SO_CONG_VAN',$soCongVan)->get();
        $LoaiVanBan = \DB::table('l_vanban')->get()->toArray();
        $DonVi = \DB::table('donvi')->get()->toArray();
        $NhanSu = \DB::table('nhansu')->get()->toArray();
        $danhSachFileDinhKem = \DB::table('congvan_filedinhkem')->where('SO_CONG_VAN',$soCongVan)->get()->toArray();
        $loaiGui = $congvan->first()->LOAI_GUI;
        $danhSachGui = array();
        $dsLoaiVanBan = array();
        $dsDonVi = array();
        $dsNhanSu = array();
        //lấy danh sách gửi(1-Nhân sự, 2-đơn vị)
        if($loaiGui==1){
            $dsGui = \DB::table('congvan_nhansu')->select('congvan_nhansu.MA_NHAN_SU','HO_VA_TEN')->join('nhansu','nhansu.MA_NHAN_SU','=','congvan_nhansu.MA_NHAN_SU')->where('SO_CONG_VAN',$soCongVan)->get()->toArray();
            foreach ($dsGui as $item) {
                $danhSachGui[ $item->MA_NHAN_SU] = $item->HO_VA_TEN;
            }
        }
        else {
            $dsGui = \DB::table('congvan_donvi')->select('congvan_donvi.MA_DON_VI','TEN_DON_VI')->join('donvi','donvi.MA_DON_VI','=','congvan_donvi.MA_DON_VI')->where('SO_CONG_VAN',$soCongVan)->get()->toArray();
            foreach ($dsGui as $item) {
                $danhSachGui[ $item->MA_DON_VI] = $item->TEN_DON_VI;
            }
        }
        //truyền dữ liệu lấy từ database vào mảng tham số
        foreach ($LoaiVanBan as $item) {
            $dsLoaiVanBan[ $item->MA_L_NVANBAN] = $item->TEN_L_NVANBAN;
        }
        foreach ($DonVi as $item) {
            $dsDonVi[ $item->MA_DON_VI] = $item->TEN_DON_VI;
        }
        foreach ($NhanSu as $item) {
            $dsNhanSu[ $item->MA_NHAN_SU] = $item->HO_VA_TEN;
        }
        //danh sách các mảng tham số truyền vào view
        $data = array('dsLoaiVanBan'=>$dsLoaiVanBan,'dsDonVi'=>$dsDonVi,'dsNhanSu'=>$dsNhanSu,'congvan'=>$congvan,'danhSachGui'=>$danhSachGui,'loaiGui'=>$loaiGui,'danhSachFileDinhKem'=>$danhSachFileDinhKem);
        return view('frmChinhSuaCongVan')->with($data);
    }
    function chinhSuaCongVan(Request $request){
        $soCongVan = $request->all()['SoCongVan'];
    	$loaiVanBan = $request->all()['LoaiVanBan'];
    	$ngayBanHanh = $request->all()['NgayBanHanh'];
    	$capDoQuanTrong = isset($request->all()['CapDoQuanTrong'])?'1':'0';
    	$trichYeuNoiDung = $request->all()['TrichYeuNoiDung'];
    	$fileDinhKemCu = isset($request->all()['FileDK'])?$request->all()['FileDK']:array();
        $FileDinhKem = ($request->file('FileDinhKem')=="NULL")?$request->file('FileDinhKem'):array();
    	$nguoiKyDuyet = $request->all()['NguoiKyDuyet'];
    	$loaiGui = $request->all()['LoaiGui'];
        //update cac truong trong congvan_filedinhkem = false vao bang congvan_filedinhkem
    	\DB::table('congvan_filedinhkem')->whereIn('FILE_DINH_KEM',$fileDinhKemCu)->update(['FILE_KHA_DUNG'=>'0']);
        foreach ($FileDinhKem as $file) {
    		//lưu file vào thư mục public\file với định dạng tên timestamp+tên file
            $tenFileMoi = time().$file->getClientOriginalName();
    		$file->move('file', $tenFileMoi);
            \DB::table('congvan_filedinhkem')->insert(array('SO_CONG_VAN'=>$soCongVan,'FILE_DINH_KEM'=>$tenFileMoi,'FILE_KHA_DUNG'=>'1'));
            //them moi vao congvna_filedinhkem
            //$data = array();
    	}
    	if($loaiGui==1){
    		$dsNguoiNhan = $request->all()['GuiChoCaNhan'];
    		//xoa het bang ghi trong table congvan_nhansu voi SO_CONG_VAN 
            \DB::table('congvan_nhansu')->where('SO_CONG_VAN','=',$soCongVan)->delete();
            //them vao db bang congvan_nhansu
            foreach ($dsNguoiNhan as $item) {
                $nguoiNhan = array('SO_CONG_VAN'=>$soCongVan,'MA_NHAN_SU'=>$item,'NGAY_NHAN'=>date('y-m-d'));
            }
    	}
    	else if($loaiGui==2){
    		$dsDonViNhan = $request->all()['GuiChoDonVi'];
    		//xoa het bang ghi trong table congvan_nhansu voi SO_CONG_VAN
            //them vao db bang congvan_donvi
    	}
        else if($loaiGui == 3){

        }
        return 1;
    }

    //---------------------------------------------------------------------------------------------------------------------------------
    //Phản hồi công văn
    public function getPhanHoiCongVan($soCongVan){
        $dsPhanHoi = \DB::table('congvan_phanhoi')->select('NOI_DUNG_PHAN_HOI','TEN_DON_VI','congvan_phanhoi.MA_DON_VI','congvan_phanhoi.MA_PHAN_HOI')->join('donvi','congvan_phanhoi.MA_DON_VI','=','donvi.MA_DON_VI')->where('SO_CONG_VAN',$soCongVan)->get()->toArray();

        $dsFile =  \DB::table('congvan_phanhoi_filedinhkem')->get()->toArray();
        return view('quanlyvanban.congvan.PhanHoiCongVan')->with(array('dsPhanHoi'=>$dsPhanHoi,'soCongVan'=>$soCongVan,'dsFile'=>$dsFile));
    }
    public function postPhanHoiCongVan(Request $request){
        $maPhanHoi = time();
        $soCongVan = $request->all()['SoCongVan'];
        $noiDungPhanHoi = $request->all()['NoiDungPhanHoi'];
        $maDonVi = Session::get('maDonVi');

        $FileDinhKem = ($request->file('FileDinhKem')==null)?array():$request->file('FileDinhKem');

        \DB::table('congvan_phanhoi')->insert(array('MA_PHAN_HOI'=>$maPhanHoi,'SO_CONG_VAN'=>$soCongVan,'MA_DON_VI'=>$maDonVi,'NOI_DUNG_PHAN_HOI'=>$noiDungPhanHoi));
        foreach ($FileDinhKem as $file) {
            //lưu file vào thư mục public\file với định dạng tên timestamp+tên file
            $tenFileMoi = time().$file->getClientOriginalName();
            $file->move('file_ykienphanhoi', $tenFileMoi);
            //them vao bang congvan_filedinhkem
            \DB::table('congvan_phanhoi_filedinhkem')->insert(array('MA_PHAN_HOI'=>$maPhanHoi,'FILE_DINH_KEM'=>$tenFileMoi));
        }
        return redirect()->route('quanlyvanban.congvan.phanhoicongvan',['soCongVan'=>$soCongVan]);
    }
}
