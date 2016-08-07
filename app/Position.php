<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Position extends Model
{
    protected $table	=	'positions';
    protected $primaryKey	=	'int_position_id';
	protected $dates = array('deleted_at');
    protected $fillable		=	[
    	'str_position_name',
    	'int_user_access'
    ];

    use SoftDeletes;
}
