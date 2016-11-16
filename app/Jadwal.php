<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    
    protected $connection='pgsql_2';
    protected $table='dtum.t_jadwal';
    public $timestamps=false;

    public function dosen(){
    	return $this->hasMany("App\Dosen", "jwl_sandi", "dsn_sandi");
    }
}
