<?php

namespace App\Http\Controllers\admin;
use App\Http\Requests\TaiSanDonViRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\TaiSanDonVi;
use App\Model\DonVi;
use Session;
class TaiSanDonViController extends Controller
{
    public function __construct(TaiSanDonVi $taiSanDonVi, DonVi $donVi){
        $this->taiSanDonVi = $taiSanDonVi;
        $this->donVi = $donVi;
    }

    public function index(){
    	if(!Session::has('username')||Session::get('quyenTruyCap')!=3)
            return redirect(url('/'));
    	$dsTaiSanDonVi = $this->taiSanDonVi->getAll();
    	$dsDonVi = $this->donVi->dsDonVi();
    	return view("admin.taisan.index",compact('dsTaiSanDonVi','dsDonVi'));
    }

    public function getAdd(){
    	if(!Session::has('username')||Session::get('quyenTruyCap')!=3)
            return redirect(url('/'));
    	$dsDonVi = $this->donVi->dsDonVi();
    	return view("admin.taisan.add",compact('dsDonVi'));

    }
    public function postAdd(TaiSanDonViRequest $request){
    	if(!Session::has('username')||Session::get('quyenTruyCap')!=3)
            return redirect(url('/'));
    	$tenTaiSan = $request->TenTaiSan;
    	$donViTiepNhan = $request->DonViTiepNhan;
    	$soLuong = $request->SoLuong;
    	$ghiChu = $request->GhiChu;
    	$this->taiSanDonVi->add($tenTaiSan,$donViTiepNhan,$soLuong,$ghiChu);
    	$request->session()->flash('msg','Thêm Thành Công');
    	return redirect()->Route('admin.taisan.index');
    }

    public function getEdit($maTaiSan){
    	if(!Session::has('username')||Session::get('quyenTruyCap')!=3)
            return redirect(url('/'));
    	$dsDonVi = $this->donVi->dsDonVi();
    	$taiSan = $this->taiSanDonVi->getByID($maTaiSan)->first();
    	return view("admin.taisan.edit",compact('dsDonVi','taiSan'));
    }
    public function postEdit(TaiSanDonViRequest $request,$maTaiSan){
    	if(!Session::has('username')||Session::get('quyenTruyCap')!=3)
            return redirect(url('/'));
    	$tenTaiSan = $request->TenTaiSan;
    	$donViTiepNhan = $request->DonViTiepNhan;
    	$soLuong = $request->SoLuong;
    	$ghiChu = $request->GhiChu;
    	$this->taiSanDonVi->edit($maTaiSan,$tenTaiSan,$donViTiepNhan,$soLuong,$ghiChu);
    	return redirect()->Route('admin.taisan.index');
    }

    public function delete($maTaiSan){
    	if(!Session::has('username')||Session::get('quyenTruyCap')!=3)
            return redirect(url('/'));
    	$this->taiSanDonVi->remove($maTaiSan);
    	Session::flash('msg','Xóa Thành Công');
    	return redirect()->Route('admin.taisan.index');
    }

    public function search(Request $request){
    	if(!Session::has('username')||Session::get('quyenTruyCap')!=3)
            return redirect(url('/'));
    	$tenTaiSan = $request->TenTaiSan;
    	$tuKhoa = ($tenTaiSan==null)?'':$tenTaiSan;
    	$maDonVi = $request->MaDonVi;
    	$dsTaiSanDonVi = $this->taiSanDonVi->search($tuKhoa,$maDonVi);
    	$dsDonVi = $this->donVi->dsDonVi();
    	return view("admin.taisan.index",compact('dsTaiSanDonVi','dsDonVi'));
    }
    
}
