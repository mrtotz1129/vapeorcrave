<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Price extends Model
{
    use SoftDeletes;

    protected $dates = array('deleted_at');
    protected $primaryKey = 'int_price_id';
    protected $fillable = array(
    	'int_product_id_fk',
    	'deci_price'
    );
}
