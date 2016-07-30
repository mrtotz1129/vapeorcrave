<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inventory extends Model
{
    use SoftDeletes;

    protected $dates = array('deleted_at');
    protected $primaryKey = 'int_inventory_id';
    protected $fillable = array(
    	'int_branch_id_fk',
    	'int_product_id_fk',
    	'int_prev_value',
    	'int_current_value',
    	'bool_is_consigned',
    	'int_user_id_fk',
    	'int_sales_invoice_detail_id_fk'
    );
}
