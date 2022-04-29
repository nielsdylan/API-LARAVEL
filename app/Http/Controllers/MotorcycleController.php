<?php

namespace App\Http\Controllers;

use App\Models\Motorcycle;
use Illuminate\Http\Request;

class MotorcycleController extends Controller
{
    //
    public function index()
    {
        $motorcycles = Motorcycle::where('active',1)->get();
        // return response()->json([
        //     'success'=>true,
        //     'status'=>200,
        //     'data'=>$users
        // ]);
        return response()->json($motorcycles);
    }
    public function create()
    {
        # code...
    }
    public function store(Request $request)
    {
        $motorcycles            = new Motorcycle();
        $motorcycles->trademark = $request->trademark;
        $motorcycles->model     = $request->model ;
        $motorcycles->reference = $request->reference;
        $motorcycles->price     = $request->price;
        $motorcycles->image     = $request->image;
        $motorcycles->save();

        return response()->json([
            'success'=>true,
            'status'=>200,
            'data'=>$motorcycles
        ]);
    }
    public function edit()
    {
        # code...
    }
    public function update(Request $request, $motorcycle_id)
    {
        // return $motorcycle_id;

        $motorcycle = Motorcycle::where('active', 1)->where('motorcycle_id', $motorcycle_id )
        ->update([
            'trademark' =>  $request->trademark,
            'model'     =>  $request->model,
            'reference' =>  $request->reference,
            'price'     =>  $request->price,
            'image'     =>  $request->image
        ]);
        if ($motorcycle==true) {
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
    public function delete($motorcycle_id)
    {
        # code...
        // return $motorcycle_id;
        $user = Motorcycle::where('active', 1)->where('motorcycle_id', $motorcycle_id )
        ->update([
            'active' =>  0
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
