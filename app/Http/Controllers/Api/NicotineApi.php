<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Nicotine;

class NicotineApi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(array(
            'active_nicotine_levels' => Nicotine::all()
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
        $nicotine           =   Nicotine::create(array(
            'int_nicotine_level'    => $request->int_nicotine_level
        ));
        return response()
            ->json(
                array(
                    'message'       =>  'Nicotine level is successfully saved.',
                    'nicotine'      =>  $nicotine
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
            'selected_nicotine_level_details' => $this->findNicotineLevel($id)
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
        $nicotine = $this->findNicotineLevel($id);

        if(count($nicotine) > 0) {
            $nicotine->int_nicotine_level = $request->int_nicotine_level;

            $nicotine->save();
        }

        return response()
            ->json(
                array(
                    'message'           =>  'Nicotine level is successfully updated.',
                    'nicotine'          =>  $nicotine
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
        $nicotine = $this->findNicotineLevel($id);

        if(count($nicotine) > 0) {
            $nicotine->delete();
        }

        return response()
            ->json(
                array(
                    'message'           =>  'Nicotine level is successfully deleted.',
                ),
                201
            );
    }

    public function findNicotineLevel($id) {
        return Nicotine::find($id);
    }
}
