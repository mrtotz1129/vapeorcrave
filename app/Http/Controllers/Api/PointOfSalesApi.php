<?php

namespace App\Http\Controllers\Api;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
    
use DB;
use Auth;

use App\Inventory;
use App\SalesInvoice;
use App\SalesInvoiceDetail;


class PointOfSalesApi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $salesInvoice = SalesInvoice::create(array(
                'deci_amount_paid'  => $request->deci_amount_paid,
                'int_user_id_fk'    => Auth::user()->id,
                'str_remarks'       => $request->str_remarks
            ));

            foreach($request->products as $product) {
                SalesInvoiceDetail::create(array(
                    'int_sales_invoice_id_fk'   => $salesInvoice->int_sales_invoice_id,
                    'int_product_id_fk'         => $product['int_product_id'],
                    'int_price_id_fk'           => $product['int_price_id'],
                    'int_quantity'              => $product['int_quantity']
                ));

                // Update stock (decrease)
                $inventory = Inventory::where('int_product_id_fk', '=', (int) $product['int_product_id'])
                    ->orderBy('created_at', 'desc')
                    ->first();

                $inventory->int_prev_value  = $inventory->int_current_value;
                $inventory->int_current_value  -= (int) $product['int_quantity'];

                $inventory->save();
            }

            DB::commit();
            return response()
                ->json(
                        array(
                                'message'       =>  'Transaction successful.'
                            ),
                        201
                    );

        } catch(Exception $ex) {
            DB::rollBack();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
