<?php

namespace App\Http\Controllers\admin;
use App\Http\Requests\NhanSuRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\NhanSu;
use Session;
class NhanSuController extends Controller
{
    public function __construct(NhanSu $mNhanSu){
    	$this->mNhanSu = $mNhanSu;
    }	
    public function index(){
        if(!Session::has('username'))
            return redirect(url('/'));
    	$id = '';
    	$hoten='';
    	$danhsach = $this->mNhanSu->layDanhSachNhanSu();
    	return view('admin.nhansu.index',compact('danhsach','id','hoten'));
    }
    public function delete($id){
    	DB::table('nhansu')->where('MA_NHAN_SU', $id)->delete();
    	session()->flash('msg','Xóa Nhân Sự Thành Công');
    	return redirect()->Route('admin.nhansu.index');
    }
    public function add(){
        if(!Session::has('username'))
            return redirect(url('/'));
    	return view('admin.nhansu.add');
    }
    public function postadd(NhanSuRequest $request){
    	$id = $request->id;
    	$hoten = $request->name;
    	$namsinh = $request->birthday;
    	$gioitinh = $request->sex;
    	$diachi = $request->address;
    	$sodienthoai = $request->phone;
    	$email = $request->email;
        if($this->mNhanSu->getItem($id)!=null){
            $request->session()->flash('msg','ID đã tồn tại');
        }
        else{
    	   $this->mNhanSu->themNhanSu($id,$hoten,$namsinh,$gioitinh,$diachi,$sodienthoai,$email);
           $request->session()->flash('msg','Thêm Nhân Sự Thành Công');
        }
    	return redirect()->Route('admin.nhansu.index');
    	//$insert = $this->mNhanSu->insertItem($id,$hoten,$gioitinh,$diachi,$sodienthoai,$email);
    }
    public function edit($id){
        if(!Session::has('username'))
            return redirect(url('/'));
    	$danhsach = $this->mNhanSu->getItem($id);
    	return view('admin.nhansu.edit',compact('danhsach'));
    }
    public function postedit(NhanSuRequest $request,$id){
    	$hoten = $request->name;
    	$namsinh = $request->birthday;
    	$gioitinh = $request->sex;
    	$diachi = $request->address;
    	$sodienthoai = $request->phone;
    	$email = $request->email;
    	DB::table('nhansu')->where('Ma_NHAN_SU',$id)->update(['HO_VA_TEN' => $hoten,'NAM_SINH' => $namsinh,'GIOI_TINH' => $gioitinh,'DIA_CHI' => $diachi,'SO_DIEN_THOAI' => $sodienthoai,'EMAIL' => $email]);
    	$request->session()->flash('msg','Sửa Nhân Sự Thành Công');
    	return redirect()->Route('admin.nhansu.index');
    	//$insert = $this->mNhanSu->insertItem($id,$hoten,$gioitinh,$diachi,$sodienthoai,$email);
    } 
    public function postsearch(Request $request){
    	$manhansu = $request->manhansu;
    	$hoten = $request->fullname;
    	$danhsach = $this->mNhanSu->getItemConditon($manhansu,$hoten);
    	return view('admin.nhansu.index',compact('danhsach','manhansu','hoten'));
    }
}
