<?php

namespace App;



class status_pemakalah extends BaseModel
{
    protected $primaryKey='id';
    protected $table="isi_status_pemakalah";
    protected $fillable=array('status_pemakalah');
}
