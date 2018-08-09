<?php

namespace App;



class jenis_penelitian extends BaseModel
{
    protected $primaryKey='id';
    protected $table="isi_jenis_penelitian";
    protected $fillable=array('jenis_penelitian');
}
