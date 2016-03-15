<?php

namespace App;

class Kegiatan_penunjang extends BaseModel
{
    protected $primaryKey='id';
    protected $table="kegiatan_penunjang";
    protected $fillable=array('nama_kegiatan', 'deskripsi', 'url');
}
