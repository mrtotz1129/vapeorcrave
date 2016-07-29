<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Position;

class PositionApi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(array(
            'active_positions' => Position::all()
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
        $position          =   Position::create(array(
            'str_position_name'     => $request->str_position_name,
            'int_position_access'   => $request->int_position_access
        ));
        
        return response()
            ->json(
                [
                    'message'       =>  'Position is successfully created.',
                    'position'      =>  $position
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
            'selected_position_details' => $this->findPosition($id)
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
        $position = $this->findPosition($id);

        if(count($position) > 0) {
            $position->str_position_name    = $request->str_position_name;
            $position->int_user_access      = $request->int_user_access;

            $position->save();
        }
        return response()
            ->json([
                'message'       =>  'Position is successfully updated.',
                'position'      =>  $position
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
        $position = $this->findPosition($id);

        if(count($position) > 0) {
            $position->delete();
        }

        return response()
            ->json(
                [
                    'message'           =>  'Position is successfully deleted.'
                ],
                200
            );
    }

    public function findPosition($id) {
        return Position::find($id);
    }
}
