<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Verifikator extends Model
{
    protected $primaryKey="nip_dosen";
    protected $table="verifikator";

    public $incrementing=false;
}
