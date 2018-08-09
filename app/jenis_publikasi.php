<?php

namespace App;



class jenis_publikasi extends BaseModel
{
    protected $primaryKey='id';
    protected $table="isi_jenis_publikasi";
    protected $fillable=array('jenis_publikasi');
}
