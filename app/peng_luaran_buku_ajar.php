<?php

namespace App;



class peng_luaran_buku_ajar extends BaseModel
{
    protected $primaryKey='id';
    protected $table="peng_luaran_buku_ajar";
    protected $fillable=array('judul');
}
