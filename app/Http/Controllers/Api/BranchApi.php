<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Branch;

class BranchApi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(array(
            'active_branches' => Branch::all()
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
        $branch          =   Branch::create(array(
            'str_branch_location'   => $request->str_branch_location
        ));
        
        return response()
            ->json(
                [
                    'message'       =>  'Branch is successfully created.',
                    'branch'        =>  $branch
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
            'selected_branch_details' => $this->findBranch($id)
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
        $branch = $this->findBranch($id);

        if(count($branch) > 0) {
            $branch->str_branch_location     = $request->str_branch_location;

            $branch->save();
        }
        return response()
            ->json([
                'message'       =>  'Branch is successfully updated.',
                'branch'        =>  $branch
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
        $branch = $this->findBranch($id);
        $branch->delete();
        return response()
            ->json(
                    [
                        'message'       =>  'Branch is successfully deleted.'
                    ],
                    201
                );
    }

    public function findBranch($id) {
        return Branch::find($id);
    }
}
