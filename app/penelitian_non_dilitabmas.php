<?php

namespace App;



class penelitian_non_dilitabmas extends BaseModel
{
    protected $primaryKey='id';
    protected $table="penelitian_non_dilitabmas";
    protected $fillable=array('judul', 'ketua', 'kategori_bidang','kategori_tse' ,'tahun');
}
