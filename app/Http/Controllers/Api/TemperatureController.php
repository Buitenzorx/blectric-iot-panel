<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Models\Temperature;
use Illuminate\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades;


 
class TemperatureController extends Controller
{
    //1. Method untuk menampilkan data
    //2. Method untuk menyimpan data

    public function TempData(){
        $temperatures = Temperature::orderBy('created_at','desc')->get();
        return response()->json([
            'status' => 'success',
            'message' => 'List data temperature',
            'data' => $temperatures
        ]);
    }

    public function TempStore(Request $request){
        $value = $request->input('value');
        $temperatures = Temperature::create([
            'value' => $value
        ]);
        return response()->json([
            'status'=>'success',
            'message'=>'List data temperature',
            'data'=> $temperatures
        ]);
    }
}
