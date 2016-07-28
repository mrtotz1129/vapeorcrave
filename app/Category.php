<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $dates = array('deleted_at');
    protected $primaryKey = 'int_category_id';
    protected $fillable = array(
    	'str_category_name',
    );
}
