<?php

namespace App;



class Akademik extends BaseModel
{
    protected $primaryKey='id';
    protected $table='akademik';
    protected $fillable=array('nama_kegiatan', 'deskripsi', 'url');
}
