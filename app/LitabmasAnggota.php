<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LitabmasAnggota extends Model
{
    protected $connection="pgsql_4";
    protected $table="data.anggota_litabmas";


    public function litabmas(){
    	return $this->belongsTo("App\Litabmas", "id_litabmas", "id_litabmas");
    }

    public function pegawai(){
    	return $this->belongsTo("App\LitabmasPegawai", "id_ptk", "id_ptk");
    }
}
