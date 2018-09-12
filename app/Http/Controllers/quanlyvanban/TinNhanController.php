<?php

namespace App\Http\Controllers\quanlyvanban;

use Illuminate\Http\Request;
use App\Http\Requests\TinNhanRequest;
use App\Http\Controllers\Controller;
use App\Model\TinNhan;
use Session;

class TinNhanController extends Controller
{
    public function __construct(TinNhan $tinNhan){
    	$this->tinNhan = $tinNhan;
    }

    public function tinNhanMoiNhat(){
    	if(!Session::has('username') || Session::get('quyenTruyCap')==3)
            return redirect(route('quanlyvanban.auth.index'));
    	$dsTinNhanDen = $this->tinNhan->tinNhanMoiNhat(Session::get('maNhanSu'));
    	$dsTinNhanDi = $this->tinNhan->tinNhanDaGui(Session::get('maNhanSu'));
        return view('quanlyvanban.congvan.index',compact('dsTinNhanDen','dsTinNhanDi'));
    }
}
