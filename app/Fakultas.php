<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fakultas extends Model
{
    protected $connection='pgsql_2';
    protected $table='dtum.m_fak';
    protected $primaryKey='fak_kd';
    public $incrementing=false;
    public $timestamps=false;
}
