<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class DonVi extends Model
{
    public function getAll(){
    	return DB::table('donvi')->get();
    }
}
