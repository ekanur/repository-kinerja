<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit_kerja extends Model
{
    //
    protected $connection='pgsql_2';
    protected $table='pegawai.unit_kerja';
    protected $primaryKey='kode_unit';

    public $incrementing=false;
    public $timestamps=false;
}
