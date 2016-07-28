<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Price;

class PriceApi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(array(
            'active_product_prices' => Price::join('products', 'prices.int_product_id_fk', '=', 'products.int_product_id')
                ->join('categories', 'products.int_category_id_fk', '=', 'categories.int_category_id')
                ->select('products.str_product_name', 'categories.str_category_name', 'prices.deci_price')
                ->get()
        ));
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
        Price::create(array(
            'int_product_id_fk' => $request->int_product_id_fk,
            'int_price_id'      => $request->int_price_id
        ));
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
        return response()->json(array(
            'selected_product_price_details' => $this->findProductPrice($id)
        ));
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
        $productPrice = $this->findProductPrice($id);

        if(count($productPrice) > 0) {
            $productPrice->int_product_id_fk    = $request->int_product_id_fk;
            $productPrice->deci_price           = $request->deci_price;

            $productPrice->save();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productPrice = $this->findProductPrice($id);

        if(count($productPrice) > 0) {
            $productPrice->delete();
        }
    }

    public function findProductPrice($id) {
        return Price::find($id);
    }
}
