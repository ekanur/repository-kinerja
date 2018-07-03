<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $primaryKey='user_id';
    protected $table='userid_fak';
    public $incrementing=false;
    public $timestamps=false;

}
