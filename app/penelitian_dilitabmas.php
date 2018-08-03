<?php

namespace App;



class penelitian_dilitabmas extends BaseModel
{
    protected $primaryKey='id';
    protected $table="penelitian_dilitabmas";
    protected $fillable=array('judul', 'ketua', 'kategori_bidang','kategori_tse' ,'tahun');
}
