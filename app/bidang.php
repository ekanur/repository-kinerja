<?php

namespace App;



class bidang extends BaseModel
{
    protected $primaryKey='id';
    protected $table="isi_bidang";
    protected $fillable=array('bidang','id_kategori_bidang');
}
