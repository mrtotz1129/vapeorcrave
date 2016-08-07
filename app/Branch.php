<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Branch extends Model
{
    use SoftDeletes;

    protected $table = 'branches';
	protected $dates = array('deleted_at');
    protected $primaryKey = 'int_branch_id';
    protected $fillable = array(
    	'str_branch_location'
    );
}
