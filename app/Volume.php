<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Volume extends Model
{
    use SoftDeletes;

    protected $dates = array('deleted_at');
    protected $primaryKey = 'int_volume_id';
    protected $fillable = array(
    	'str_volume_name',
    );
}
