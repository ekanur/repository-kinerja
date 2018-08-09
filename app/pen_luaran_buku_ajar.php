<?php

namespace App;



class pen_luaran_buku_ajar extends BaseModel
{
    protected $primaryKey='id';
    protected $table="pen_luaran_buku_ajar";
    protected $fillable=array('judul');
}
