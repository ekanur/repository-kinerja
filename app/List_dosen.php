<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
class List_dosen extends Model
{
    //

    protected $connection='pgsql_2';
    protected $table='dtum.m_dosen';
    protected $primaryKey='dsn_nip';
      protected $fillable=array('dsn_nm');
      protected $orderBy='DESC';

}
