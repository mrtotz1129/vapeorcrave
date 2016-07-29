<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Brand;

class BrandApi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(array(
            'active_brands' => Brand::all()
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
        $brand          =   Brand::create(array(
            'str_brand_name'        => $request->str_brand_name,
            'str_brand_photo_path'  => 'anything' // for now
        ));
        
        return response()
            ->json(
                [
                    'message'       =>  'Brand is successfully created.',
                    'brand'         =>  $brand
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
            'selected_brand_details' => $this->findBrand($id)
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
        $brand = $this->findBrand($id);

        if(count($brand) > 0) {
            $brand->str_brand_name          = $request->str_brand_name;
            $brand->str_brand_photo_path    = null; // for now

            $brand->save();
        }
        return response()
            ->json([
                'message'       =>  'Brand is successfully updated.',
                'brand'         =>  $brand
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
        $brand = $this->findBrand($id);

        if(count($brand) > 0) {
            $brand->delete();
        }

        return response()
            ->json(
                [
                    'message'           =>  'Brand is successfully deleted.'
                ],
                200
            );
    }

    public function findBrand($id) {
        return Brand::find($id);
    }
}
