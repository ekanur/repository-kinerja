<?php

namespace App;



class pengabdian_non_dilitabmas extends BaseModel
{
    protected $primaryKey='id';
    protected $table="pengabdian_non_dilitabmas";
    protected $fillable=array('judul', 'ketua','jenis_pengabdian','skema','tahun');
}
