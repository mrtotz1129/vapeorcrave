<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;
use Input;

use App\Inventory;
use App\Price;
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
            'active_products' => $this->queryProduct(null)
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
        try {
            DB::beginTransaction();

            $product = Product::create(array(
                'str_product_name'          => $request->str_product_name,
                'int_category_id_fk'        => $request->int_category_id_fk,
                'int_brand_id_fk'           => $request->int_brand_id_fk,
                'int_volume_id_fk'          => $request->int_volume_id_fk,
                'int_nicotine_id_fk'        => $request->int_nicotine_id_fk,
                'str_product_photo_path'    => 'kahit ano' // for now
            ));

            $price                          = Price::create(array(
                'int_product_id_fk' => $product->int_product_id,
                'deci_price'        => $request->deci_price
            ));

            DB::commit();

            return response()
                ->json(
                    [
                        'message'       =>  'Product is successfully created.',
                        'product'      =>   $this->queryProduct($product->int_product_id)
                    ],
                    201
                );
        } catch(QueryException $ex) {
            DB::rollBack();
            return response()
                ->json(
                    array(
                        'message'       =>  $ex->getMessage()
                    ),
                    500
                );
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
        return response()->json(array(
            'selected_product_details' => $this->queryProduct($id)
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
        try {
            DB::beginTransaction();

            $product        = $this->findProduct($id);

            if(count($product) > 0) {
                $product->str_product_name          = $request->str_product_name;
                $product->int_category_id_fk        = $request->int_category_id_fk;
                $product->int_brand_id_fk           = $request->int_brand_id_fk;
                $product->int_volume_id_fk          = $request->int_volume_id_fk;
                $product->int_nicotine_id_fk        = $request->int_nicotine_id_fk;
                $product->str_product_photo_path    = 'kahit ano'; // for the meantime

                $product->save();

                $price                              = Price::create(array(
                    'int_product_id_fk' => $product->int_product_id,
                    'deci_price'        => $request->deci_price
                ));

                DB::commit();
            }

            return response()
                ->json([
                    'message'       =>  'Product is successfully updated.',
                    'product'      =>   $this->queryProduct($product->int_product_id)
                ],
                    200
                );
        } catch(QueryException $ex) {
            DB::rollBack();
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

    public function queryProduct($id)
    {
        $productQuery = Product::join('brands', 'products.int_brand_id_fk', '=', 'brands.int_brand_id')
            ->join('categories', 'products.int_category_id_fk', '=', 'categories.int_category_id')
            ->join('volumes', 'products.int_volume_id_fk', '=', 'volumes.int_volume_id')
            ->join('nicotines', 'products.int_nicotine_id_fk', '=', 'nicotines.int_nicotine_id')
            ->join('prices', 'prices.int_product_id_fk', '=', 'products.int_product_id')
            ->select('products.int_product_id',
                'products.str_product_photo_path',
                'products.str_product_name',
                'categories.str_category_name',
                'volumes.str_volume_name',
                'nicotines.int_nicotine_level',
                'prices.deci_price',
                'prices.int_price_id',
                'brands.str_brand_name',
                'products.int_category_id_fk',
                'products.int_brand_id_fk',
                'products.int_volume_id_fk',
                'products.int_nicotine_id_fk');
        if($id) {
            $resultQuery = $productQuery->where('products.int_product_id', '=', $id)
                ->first();
        } else {
            $resultQuery = $productQuery->orderBy('prices.created_at')
                ->groupBy('prices.int_product_id_fk')
                ->get();
        }

        return $resultQuery;
    }

    public function findProduct($id) 
    {
        return Product::find($id);
    }

    public function getProductInventories()
    {
        return response()->json(array(
            'inventories' => $this->queryInventory(null)
        ),
            200);
    }

    public function storeProductInventories($id, Request $request)
    {
        $productInventory = $this->queryInventory($id);

        $inventory          =   Inventory::create(array(
            'int_branch_id_fk'  => $request->int_branch_id,
            'int_product_id_fk' => $id,
            'int_prev_value'    => !$productInventory ? 0 : $productInventory->int_current_value,
            'int_current_value' => !$productInventory ? $request->int_quantity : $productInventory->int_current_value + $request->int_quantity,
            'bool_is_consigned' => false,   // for now
            'int_user_id_fk'    => 1,       // for now
            'int_branch_id_fk'  => 1,
        ));

        return response()
            ->json(
                array(
                    'message'       =>  'Inventory stock is successfully updated.',
                    'inventory'     =>  $inventory
                ),
                200
            );
    }

     public function queryInventory($id) 
    {
        $inventoryQuery = Inventory::join('branches', 'inventories.int_branch_id_fk', '=', 'branches.int_branch_id')
            ->rightJoin('products', 'inventories.int_product_id_fk', '=', 'products.int_product_id')
            ->join('categories', 'products.int_category_id_fk', '=', 'categories.int_category_id')
            ->join('brands', 'products.int_brand_id_fk', '=', 'brands.int_brand_id')
            ->select('inventories.int_inventory_id',
                'brands.str_brand_name',
                'categories.str_category_name',
                'products.str_product_name',
                'inventories.int_current_value',
                'inventories.int_product_id_fk',
                'products.int_product_id');

        if($id) {
            $resultQuery = $inventoryQuery->where('inventories.int_product_id_fk', '=', $id)
                ->orderBy('inventories.created_at', 'DESC')
                ->first();
        } else {
            $resultQuery = $inventoryQuery
                ->orderBy('inventories.created_at', 'desc')
                ->groupBy('products.int_product_id', 'branches.int_branch_id')
                ->get();
        }

        return $resultQuery;
    }
}
