<?php

namespace App;



class tse extends BaseModel
{
    protected $primaryKey='id';
    protected $table="isi_tse";
    protected $fillable=array('tse','id_kategori_tse');
}
