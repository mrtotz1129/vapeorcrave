<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Product;

class ProductApi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(array(
            'active_products' => Product::join('brands', 'products.int_brand_id_fk', '=', 'brands.int_brand_id')
                ->join('categories', 'products.int_category_id_fk', '=', 'categories.int_category_id')
                ->join('volumes', 'products.int_volume_id_fk', '=', 'volumes.int_volume_id')
                ->join('nicotines', 'products.int_nicotine_id_fk', '=', 'nicotines.int_nicotine_id')
                ->select('products.int_product_id', 'products.str_product_photo_path', 'products.str_product_name', 'categories.str_category_name', 'volumes.str_volume_name', 'nicotines.int_nicotine_level')
                ->get()
        ),
            200);
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
        $product = Product::create(array(
            'str_product_name'          => $request->str_product_name,
            'int_category_id_fk'        => $request->int_category_id_fk,
            'int_brand_id_fk'           => $request->int_brand_id_fk,
            'int_volume_id_fk'          => $request->int_volume_id_fk,
            'int_nicotine_id_fk'        => $request->int_nicotine_id_fk,
            'str_product_photo_path'    => null, // for now
        ));

        return response()
            ->json(
                [
                    'message'       =>  'Product is successfully created.',
                    'product'      =>  $product
                ],
                201
            );
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
            'selected_product_details' => $this->findProduct($id)
        ),
            200);
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
        $product = $this->findProduct($id);

        if(count($product) > 0) {
            $product->str_product_name          = $request->str_product_name;
            $product->int_category_id_fk        = $request->int_category_id_fk;
            $product->int_brand_id_fk           = $request->int_brand_id_fk;
            $product->int_volume_id_fk          = $request->int_volume_id_fk;
            $product->int_nicotine_id_fk        = $request->int_nicotine_id_fk;
            $product->str_product_photo_path    = $request->str_product_photo_path;

            $product->save();
        }

        return response()
            ->json([
                'message'       =>  'Product is successfully updated.',
                'product'       =>  $product
            ],
                200
            );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = $this->findProduct($id);

        if(count($product) > 0) {
            $product->delete();
        }

        return response()
            ->json(
                [
                    'message'           =>  'Product is successfully deleted.'
                ],
                200
            );
    }

    public function findProduct($id) {
        return Product::find($id);
    }
}
