<?php

namespace App\Http\Controllers\quanlyvanban;

use Illuminate\Http\Request;
use App\Http\Requests\TinNhanRequest;
use App\Http\Controllers\Controller;
use App\Model\TinNhan;
use App\Model\NhanSu;
use Session;

class TinNhanController extends Controller
{
    public function __construct(TinNhan $tinNhan, NhanSu $nhanSu){
    	$this->tinNhan = $tinNhan;
    	$this->nhanSu = $nhanSu;
    }

    public function tinNhanMoiNhat(){
    	if(!Session::has('username') || Session::get('quyenTruyCap')==3)
            return redirect(route('quanlyvanban.auth.index'));
    	$dsTinNhanDen = $this->tinNhan->tinNhanMoiNhat(Session::get('maNhanSu'));
    	$dsTinNhanDi = $this->tinNhan->tinNhanDaGui(Session::get('maNhanSu'));
        return view('quanlyvanban.congvan.index',compact('dsTinNhanDen','dsTinNhanDi'));
    }

    public function getGuiTinNhan(){
    	if(!Session::has('username') || Session::get('quyenTruyCap')==3)
            return redirect(route('quanlyvanban.auth.index'));
    	$dsNguoiNhan = $this->nhanSu->getAllExceptMe(Session::get('maNhanSu'));
    	return view('quanlyvanban.guitinnhan.index',compact('dsNguoiNhan'));
    }

    public function postGuiTinNhan(TinNhanRequest $request){
    	if(!Session::has('username') || Session::get('quyenTruyCap')==3)
            return redirect(route('quanlyvanban.auth.index'));
        //đặt múi giờ để lấy ngày và giờ việt nam
        date_default_timezone_set("Asia/Bangkok");
        $nguoiGui = Session::get('maNhanSu');
        $dsNguoiNhan = $request->DanhSachNguoiNhan;
        $noiDungTinNhan = $request->NoiDungTinNhan;
        $ngayGui = date('Y-m-d');
        $gioGui = date('H:i:s');
        foreach($dsNguoiNhan as $nguoiNhan){
            $this->tinNhan->guiTinNhan($nguoiGui,$nguoiNhan,$noiDungTinNhan,$ngayGui,$gioGui);
        }
        if( $request->file('FileDinhKem') != null){
            $fileDinhKem = $request->file('FileDinhKem');
            foreach($fileDinhKem as $file){
                $path = $file->store('file_tinnhan');
                $tmp = explode("/", $path);
                $tenFile = end($tmp);
                foreach($dsNguoiNhan as $nguoiNhan){
                    $this->tinNhan->luuFileDinhKem($nguoiGui,$nguoiNhan,$tenFile);
                }
            }
        }
        return 'success';
    }
}
