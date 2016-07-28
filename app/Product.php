<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $dates = array('deleted_at');
    protected $primaryKey = 'int_product_id';
    protected $fillable = array(
    	'str_product_name',
    	'int_category_id_fk',
    	'int_brand_id_fk',
    	'int_volume_id_fk',
    	'int_nicotine_id_fk',
    	'str_product_photo_path'
    );
}
