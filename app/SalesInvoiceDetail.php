<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalesInvoiceDetail extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'int_sales_invoice_detail_id';
    protected $fillable = array(
    	'int_sales_invoice_id_fk',
    	'int_product_id_fk',
    	'int_price_id_fk',
    	'int_quantity'
    );
}
