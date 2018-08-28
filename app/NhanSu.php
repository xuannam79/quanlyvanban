<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NhanSu extends Model
{
    public function getAll(){
    	return \DB::table('nhansu')->get();
    }
}
