<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Litabmas extends Model
{
    protected $connection='pgsql_4';
    protected $table="data.litabmas";
    protected $primaryKey="id_litabmas";

    public $incrementing=false;

    public function anggota(){
    	return $this->hasMany("App\LitabmasAnggota", "id_litabmas", "id_litabmas");
    }
}
