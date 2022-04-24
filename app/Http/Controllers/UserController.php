<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index()
    {
        $users = User::where('active',1)->get();
        // return response()->json([
        //     'success'=>true,
        //     'status'=>200,
        //     'data'=>$users
        // ]);
        return response()->json($users);
    }
    public function create()
    {
        # code...
    }
    public function store(Request $request)
    {
        // return $request;
        $user               = new User();
        $user->dni          = $request->dni;
        $user->last_name    = $request->last_name ;
        $user->email        = $request->email;
        $user->whatsapp     = $request->whatsapp;
        $user->telephone    = $request->telephone;
        $user->save();

        return response()->json([
            'success'=>true,
            'status'=>200,
            'data'=>$user
        ]);
    }
    public function edit()
    {
        # code...
    }
    public function update(Request $request, $user_id)
    {

        $user = User::where('active', 1)->where('user_id', $user_id )
        ->update([
            'dni'       =>  $request->dni,
            'last_name' =>  $request->last_name,
            'email'     =>  $request->email,
            'whatsapp'  =>  $request->whatsapp,
            'telephone' =>  $request->telephone
        ]);
        if ($user==true) {
            return response()->json([
                'success'=>true,
                'status'=>200
            ]);
        } else {
            return response()->json([
                'success'=>false,
                'status'=>404
            ]);
        }

    }
    public function delete($user_id)
    {
        # code...
        $user = User::where('active', 1)->where('user_id', $user_id )
        ->update([
            'active'       =>  0
        ]);
        if ($user==true) {
            return response()->json([
                'success'=>true,
                'status'=>200
            ]);
        } else {
            return response()->json([
                'success'=>false,
                'status'=>404
            ]);
        }
    }
}
