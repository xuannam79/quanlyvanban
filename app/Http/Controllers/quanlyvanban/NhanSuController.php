<?php

namespace App\Http\Controllers\quanlyvanban;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\NhanSu;
use Session;
class NhanSuController extends Controller
{
    public function __construct(NhanSu $nhanSu){
        $this->nhanSu = $nhanSu;
    }

    public function danhSachNhanSu(){
        $data = \DB::table('nhansu')->get()->toArray();
        return view('DanhSachNhanSu')->with(['dsNhanSu'=>$data]);
    }

    public function nhanSuDonVi(){
        $dsNhanSu = $this->nhanSu->getByMaDonVi(Session::get('maDonVi'));
        return view('quanlyvanban.nhansu.index',compact('dsNhanSu'));
    }
    public function chiTietNhanSuDonVi($maNhanSu){
        $nhanSu = $this->nhanSu->getByMaNhanSu($maNhanSu);
        $dsChucVu = $this->nhanSu->getDanhSachChucVu($maNhanSu);
        return view('quanlyvanban.nhansu.ChiTietNhanSu',compact('nhanSu','dsChucVu'));
    }
}
