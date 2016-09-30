<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    //
    protected $connection='pgsql_2';
    protected $table="pegawai.pegawai";
    protected $primaryKey='kd_pegawai';

    public $incrementing=false;
    public $timestamps=false;


    public function unit_kerja(){
    	return $this->hasOne("App\Unit_kerja", "kode_unit", "kode_unit");
    }

    // public function user(){
    // 	return $this->hasOne("App\User", "nip", "user_id");
    // }
}
