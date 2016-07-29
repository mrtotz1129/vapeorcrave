<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Volume;

class VolumeApi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(array(
            'active_volumes' => Volume::all()
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
        $volume         =   Volume::create(array(
            'str_volume_name'        => $request->str_volume_name
        ));
        return response()
            ->json(
                array(
                    'message'           =>  'Volume is successfully saved.',
                    'volume'            =>  $volume
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
            'selected_volume_details' => $this->findVolume($id)
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
        $volume = $this->findVolume($id);

        if(count($volume) > 0) {
            $volume->str_volume_name = $request->str_volume_name;

            $volume->save();
        }

        return response()
            ->json(
                array(
                    'message'           =>  'Volume is successfully updated.',
                    'volume'            =>  $volume
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
        $volume = $this->findVolume($id);

        if(count($volume) > 0) {
            $volume->delete();
        }

        return response()
            ->json(
                array(
                    'message'           =>  'Volume is successfully deleted.'
                ),
                201
            );
    }

    public function findVolume($id) {
        return Volume::find($id);
    }
}
