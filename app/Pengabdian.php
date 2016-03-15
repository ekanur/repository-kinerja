<?php

namespace App;


class Pengabdian extends BaseModel
{
    protected $primaryKey='id';
    protected $table="pengabdian";
    protected $fillable=array('nama_kegiatan', 'deskripsi', 'url');
}
