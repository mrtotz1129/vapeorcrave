<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
	use SoftDeletes;

	protected $dates = array('deleted_at');
    protected $primaryKey = 'int_brand_id';
    protected $fillable = array(
    	'str_brand_name',
    	'str_brand_photo_path'
    );
}
