<?php

namespace App;



class Penelitian extends BaseModel
{
    protected $primaryKey='id';
    protected $table="penelitian";
    protected $fillable=array('nama_kegiatan', 'deskripsi', 'url');
}
