<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Category;

class CategoryApi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(array(
            'active_categories' => Category::all()
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
        $category           =   Category::create(array(
            'str_category_name' => $request->str_category_name
        ));
        return response()
            ->json(
                array(
                    'message'           =>  'Category is successfully saved.',
                    'category'          =>  $category
                ),
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
            'selected_category_details' => $this->findCategory($id)
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
        $category = $this->findCategory($id);

        if(count($category) > 0) {
            $category->str_category_name   = $request->str_category_name;

            $category->save();
        }

        return response()
            ->json(
                array(
                    'message'           =>  'Category is successfully updated.',
                    'category'          =>  $category
                ),
                201
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
        $category = $this->findCategory($id);

        if(count($category) > 0) {
            $category->delete();
        }

        return response()
            ->json(
                array(
                    'message'           =>  'Category is successfully deleted.'
                ),
                201
            );
    }

    public function findCategory($id) {
        return Category::find($id);
    }
}
