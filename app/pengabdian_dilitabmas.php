<?php

namespace App;



class pengabdian_dilitabmas extends BaseModel
{
    protected $primaryKey='id';
    protected $table="pengabdian_dilitabmas";
    protected $fillable=array('judul', 'ketua', 'skema','tahun','jumlah_mahasiswa');
}
