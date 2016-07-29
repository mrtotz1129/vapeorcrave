<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;

use Input;

class UserApi extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(array(
            'active_users' => $this->queryUser(null)
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
        $user          =   User::create(array(
            'name'                  => $request->name,
            'email'                 => $request->email,
            'password'              => bcrypt($request->password),
            'int_position_id_fk'    => $request->int_position_id_fk,
            'int_branch_id_fk'      => $request->int_branch_id_fk
        ));
        
        return response()
            ->json(
                [
                    'message'       =>  'User is successfully created.',
                    'user'          =>  $user
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
            'selected_user_details' => $this->queryUser($id)
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
        $user = $this->queryUser($id);

        if(count($user) > 0) {
            $user->name                 = $request->name;
            $user->email                = $request->email;
            $user->password             = bcrypt($request->password);
            $user->int_position_id_fk   = $request->int_position_id_fk;
            $user->int_branch_id_fk     = $request->int_branch_id_fk;

            $user->save();
        }
        return response()
            ->json([
                'message'       =>  'User is successfully updated.',
                'user'          =>  $user
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
        $user = $this->queryUser($id);

        if(count($user) > 0) {
            $user->delete();
        }

        return response()
            ->json(
                [
                    'message'           =>  'User is successfully deleted.'
                ],
                200
            );
    }
    
    public function queryUser($id) 
    {
        $userQuery = User::join('positions', 'users.int_position_id_fk', '=', 'positions.int_position_id')
            ->join('branches', 'users.int_branch_id_fk', '=', 'branches.int_branch_id')
            ->select('users.id', 'users.email', 'users.name', 'positions.str_position_name', 'branches.str_branch_location');

        if($id) {
            $resultQuery = $userQuery->where('users.id', '=', $id)
                ->first();
        } else if(Input::get('branchId')) {
            $resultQuery = $userQuery->where('branches.int_branch_id', '=', Input::get('branchId'))
                ->get();
        } else {
            $resultQuery = $userQuery->get();
        }

        return $resultQuery;
    }
}
