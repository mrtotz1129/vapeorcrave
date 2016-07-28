<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Nicotine extends Model
{
    use SoftDeletes;

    protected $dates = array('deleted_at');
    protected $primaryKey = 'int_nicotine_id';
    protected $fillable = array(
    	'int_nicotine_level',
    );
}
