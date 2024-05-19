<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Led;
use Illuminate\Http\Request;

class LedController extends Controller
{
    //CRUD

    function index(){
        $leds = Led::orderBy('name', 'ASC')
            ->get();

        return response()
        -> json([
            'message' => "Data Berhasil Ditampilkan",
            'data' => $leds
        ], 200);
    }

    function show($id){
        $led =  Led::find($id);
        
        if (!$led){
            return response()
            -> json([
                'message' => "Data Tidak Ditemukan",
                'data' => null
            ], 404);
        }
        
        return response()
        -> json([
            'message' => "Data Berhasil Ditampilkan",
            'data' => $led
        ], 200);
        }

    function store(Request $request){
        $validated = $request
        ->validate([
            "name" => [
                "required",
                "string",
                "min:3",
                "max:255",
            ],
            "pin" => [
                "required",
                "numeric",
                "between:0,39",
            ],
            "status" => [
                "required",
                "boolean",
            ],            
        ]);
    $led = Led::create($validated);

    return response()
        -> json([
            'message' => "Data Berhasil Ditambahkan",
            'data' => $led
        ], 201);

    }

    function update(Request $request, $id){
        $led =  Led::find($id);
        
        if (!$led){
            return response()
            -> json([
                'message' => "Data Tidak Ditemukan",
                'data' => null
            ], 404);
        }

        $validated = $request
        ->validate([
            "name" => [
                "required",
                "string",
                "min:3",
                "max:255",
            ],
            "pin" => [
                "required",
                "numeric",
                "between:0,39",
            ],
            "status" => [
                "required",
                "boolean",
            ],            
        ]);

        $led->update($validated);
        return response()
            -> json([
                'message' => "Data Berhasil Diubah",
                'data' => $led
            ], 200);

    }

    function destroy($id){
        $led =  Led::find($id);
        
        if (!$led){
            return response()
            -> json([
                'message' => "Data Tidak Ditemukan",
                'data' => null
            ], 404);
        }
        $led->delete();
        return response()
        -> json([
            'message' => "Data Berhasil Dihapus",
            'data' => $led
        ], 200);
    }
}
