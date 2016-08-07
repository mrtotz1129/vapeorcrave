<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $table	=	'positions';
    protected $primaryKey	=	'int_position_id';
    protected $fillable		=	[
    	'str_position_name',
    	'int_user_access'
    ];

}
