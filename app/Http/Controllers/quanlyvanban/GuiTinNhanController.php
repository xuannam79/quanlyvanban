<?php

namespace App\Http\Controllers\quanlyvanban;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GuiTinNhanController extends Controller
{
	public function getGuiTinNhan(){
		return view('quanlyvanban.guitinnhan.index');
	}

	public function postGuiTinNhan(){
		
	}
}