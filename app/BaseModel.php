<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

class BaseModel extends Model
{
	use SoftDeletes;
	protected $dates=['deleted_at'];
    public function selectQuery($sql){
    	return DB::select($sql);
    }

    public function sqlStatement($sql){
    	DB::statement($sql);
    }
}
