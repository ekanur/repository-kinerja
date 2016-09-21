<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    //

    protected $connection='pgsql_2';
    protected $table='m_dosen';
    protected $primaryKey='dsn_nip';
    public $incrementing=false;
    public $timestamps=false;

    public function jurusan()
    {
    	return $this->hasOne("App\Jurusan", "jur_kd", "jur_kd");
    }

}
