<?php

namespace App\Http\Controllers\quanlyvanban;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use App\Model\CongVan;
use App\Model\NhanSu;
use App\Model\DonVi;
class CongVanController extends Controller
{
    public function __construct(CongVan $congVan, NhanSu $nhanSu, DonVi $donVi){
        $this->congVan = $congVan;
        $this->nhanSu = $nhanSu;
        $this->donVi = $donVi;
    }
    
    function trangChu(){
        if(!Session::has('username') || Session::get('quyenTruyCap')==3)
            return redirect(route('quanlyvanban.auth.index'));
        return view('quanlyvanban.congvan.index');
    }

    //Danh sách công văn
    function danhSachCongvanDi(Request $request){
        if(!Session::has('username') || Session::get('quyenTruyCap')==3)
            return redirect()->route('quanlyvanban.auth.index');
        $dsCongVanDi = $this->congVan->danhSachCongVanDi();
        $dsDonVi = $this->donVi->getAll();
        //lay danh sach file dinh kem dua vao 1 mang voi index la socongvan va gia tri la mang file dinh kem theo socongvan do
        $dsFile = array();
        foreach($dsCongVanDi as $congVan){
            $soCongVan = $congVan->SO_CONG_VAN;
            $dsFile[$soCongVan] = $this->congVan->fileDinhKem($soCongVan);
        }
        $tuKhoa = '';
        $loaiTimKiem = '';
        //form tìm kiếm văn bản
        if(isset($request->all()['TimKiemVanBanDi'])){
            $loaiTimKiem = $request->all()['LoaiTimKiem'];
            $tuKhoa = $request->all()['keyword'];
            if($loaiTimKiem == 1){
                $dsCongVanDi = $this->congVan->timCongVanDiTheoSoCongVan($tuKhoa);
            }
            else if($loaiTimKiem == 2){
                $dsCongVanDi = $this->congVan->timCongVanDiTheoTrichYeuNoiDung($tuKhoa);
            }
        }
        return view('quanlyvanban.congvan.DanhSachCongvanDi',compact('dsCongVanDi','dsDonVi','dsFile'));
    }

    function danhSachCongVanDen(Request $request){
        if(!Session::has('username') || Session::get('quyenTruyCap')==3)
            return redirect()->route('quanlyvanban.auth.index');
        $dsDonVi = $this->donVi->getAll();
        $dsCongVanDen = $this->congVan->danhSachCongVanDen();
        //lay danh sach file dinh kem dua vao 1 mang voi index la socongvan va gia tri la mang file dinh kem theo socongvan do
        $dsFile = array();
        foreach($dsCongVanDen as $congVan){
            $soCongVan = $congVan->SO_CONG_VAN;
            $dsFile[$soCongVan] = $this->congVan->fileDinhKem($soCongVan);
        }
        $tuKhoa = '';
        $loaiTimKiem = '';
        //form tìm kiếm văn bản 
        if(isset($request->all()['TimKiemVanBanDen'])){
            $loaiTimKiem = $request->all()['LoaiTimKiem'];
            $tuKhoa = $request->all()['keyword'];
            if($loaiTimKiem == 1){
                $dsCongVanDen = $this->congVan->timCongVanDenTheoSoCongVan($tuKhoa);
            }
            else if($loaiTimKiem == 2){
                $dsCongVanDen = $this->congVan->timCongVanDenTheoTrichYeuNoiDung($tuKhoa);
            }
            else if($loaiTimKiem == 3){
                $donViTimKiem = $request->all()['DSDonVi'];
                $dsCongVanDen = $this->congVan->timCongVanDenTheoDonViBanHanh($donViTimKiem);
            }
        }
        //var_dump($KeyWord);
        return view('quanlyvanban.congvan.DanhSachCongVanDen',compact('dsDonVi','dsCongVanDen','dsFile'));
    }

    public function danhSachCongVanDen_TimKiemnangCao(){
        if(!Session::has('username') || Session::get('quyenTruyCap')==3)
            return redirect()->route('quanlyvanban.auth.index');
        return view('quanlyvanban.congvan.DanhSachCongVanDen_TimKiemNangCao');
    }
    

    //---------------------------------------------------------------------------------------------------------------------------------
    //Tạo mới công văn
    public function getTaoMoiCongVan(){
        if(!Session::has('username') || Session::get('quyenTruyCap')==3)
            return redirect()->route('quanlyvanban.auth.index');
    	$dsLoaiVanBan = \DB::table('l_vanban')->get()->toArray();
    	$dsDonVi = \DB::table('donvi')->get()->toArray();
    	$dsNhanSu = \DB::table('nhansu')->get();
        $dsNguoiKyDuyet = $this->nhanSu->getByIdDonVi(Session::get("maDonVi"));
    	return view('quanlyvanban.congvan.frmTaoMoiCongVan',compact('dsNguoiKyDuyet','dsLoaiVanBan','dsDonVi','dsNhanSu'));
    }

    function postTaoMoiCongVan(Request $request){
    	$soCongVan = $request->SoCongVan;
    	$loaiVanBan = $request->LoaiVanBan;
    	$ngayBanHanh = $request->NgayBanHanh;
    	$capDoQuanTrong = isset($request->CapDoQuanTrong)?'1':'0';
    	$donViBanHanh = Session::get('maDonVi');
    	$trichYeuNoiDung = $request->TrichYeuNoiDung;
        $nguoiGui = session('maNhanSu');
        $nguoiKyDuyet = $request->NguoiKyDuyet;
    	$FileDinhKem = ($request->file('FileDinhKem')!==null)?$request->file('FileDinhKem'):array();
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
        if(!Session::has('username') || Session::get('quyenTruyCap')==3)
            return redirect()->route('quanlyvanban.auth.index');
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
        if(!Session::has('username') || Session::get('quyenTruyCap')==3)
            return redirect()->route('quanlyvanban.auth.index');
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
