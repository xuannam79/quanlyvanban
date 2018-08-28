<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DonVi extends Model
{
    public function getAll(){
    	return \DB::table('DonVi')->get();
    }
}
