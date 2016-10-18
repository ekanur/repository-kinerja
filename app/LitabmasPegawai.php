<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LitabmasPegawai extends Model
{
    protected $connection ="pgsql_5";
    protected $table="pegawai.pegawai";
    protected $primaryKey="id_ptk";

    public $incrementing=false;
    public $timestamp=false;

    public function anggota(){
    	return $this->hasMany("App\LitabmasAnggota", "id_ptk", "id_ptk");
    }
}
