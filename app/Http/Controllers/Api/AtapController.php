<?php

namespace App\Http\Controllers\Api;

use App\Models\Atap;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\AtapResource;
use Illuminate\Support\Facades\Validator;

class AtapController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $get = Atap::get();

       return AtapResource::collection($get);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama'     => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $atap = Atap::create([
            'nama'     => $request->nama,
        ]);

        //return response
        return new AtapResource($atap);
    }

    /**
     * Display the specified resource.
     */
    public function show(Atap $atap)
    {
        return new AtapResource($atap);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Atap $atap)
    {
         //define validation rules
         $validator = Validator::make($request->all(), [
            'nama'     => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }


            $atap->update([
                'nama'     => $request->nama,
            ]);

        //return response
        return new AtapResource($atap);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Atap $atap)
    {
        $atap->delete();

        return new AtapResource($atap);
    }
}