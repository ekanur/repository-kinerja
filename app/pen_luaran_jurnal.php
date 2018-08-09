<?php

namespace App;



class pen_luaran_jurnal extends BaseModel
{
    protected $primaryKey='id';
    protected $table="pen_luaran_jurnal";
    protected $fillable=array('judul');
}
