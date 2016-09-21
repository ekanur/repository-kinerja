<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    protected $connection='pgsql_2';
    protected $table='m_jur';
    protected $primaryKey='jur_kd';
    public $incrementing=false;
    public $timestamps=false;


    public function fakultas()
    {
    	return $this->hasOne("App\Fakultas", "fak_kd", "fak_kd");
    }
}
