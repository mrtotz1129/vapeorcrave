<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalesInvoice extends Model
{
    protected $primaryKey = 'int_sales_invoice_id';
    protected $fillable = array(
    	'deci_amount_paid',
    	'int_user_id_fk',
    	'str_remarks'
    );
}
