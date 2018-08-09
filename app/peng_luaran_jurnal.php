<?php

namespace App;



class peng_luaran_jurnal extends BaseModel
{
    protected $primaryKey='id';
    protected $table="peng_luaran_jurnal";
    protected $fillable=array('judul');
}
