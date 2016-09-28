<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KdGen extends Model
{
    protected $connection='pgsql_2';
    protected $table='dtum.t_kdgen';
    protected $primaryKey='kd_komp';
    public $incrementing=false;
    public $timestamps=false;

    public function dosen(){
    	return $this->belongsTo("App\Dosen", "dsn_sandi", "dsn_sandi");
    }
}
