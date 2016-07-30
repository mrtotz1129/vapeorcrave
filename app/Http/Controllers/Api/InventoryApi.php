<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Inventory;

class InventoryApi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(array(
            'inventories' => $this->queryInventory(null)
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(array(
            'selected_inventory_details' => $this->queryInventory($id)
        ),
            200);
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

    public function queryInventory($id) 
    {
        $inventoryQuery = Inventory::join('branches', 'inventories.int_branch_id_fk', '=', 'branches.int_branch_id')
            ->join('products', 'inventories.int_product_id_fk', '=', 'products.int_product_id')
            ->join('categories', 'products.int_category_id_fk', '=', 'categories.int_category_id')
            ->join('brands', 'products.int_brand_id_fk', '=', 'brands.int_brand_id')
            ->select('inventories.int_inventory_id', 'brands.str_brand_name', 'categories.str_category_name', 'products.str_product_name', 'inventories.int_current_value');

        if($id) {
            $resultQuery = $inventoryQuery->where('inventories.int_inventory_id', '=', $id)
                ->first();
        } else {
            $resultQuery = $inventoryQuery->get();
        }

        return $resultQuery;
    }
}
