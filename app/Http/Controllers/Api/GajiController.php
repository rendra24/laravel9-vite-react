<?php

namespace App\Http\Controllers\Api;

use App\Models\Gaji;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\GajiResource;
use Illuminate\Support\Facades\Validator;

class GajiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gaji = Gaji::all();
        return GajiResource::collection($gaji);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'gaji'     => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $gaji = Gaji::create([
            'gaji'     => $request->gaji,
        ]);

        return new GajiResource($gaji);
    }

    /**
     * Display the specified resource.
     */
    public function show(Gaji $gaji)
    {
        return new GajiResource($gaji);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gaji $gaji)
    {
        $validator = Validator::make($request->all(), [
            'gaji'     => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $gaji->update([
            'gaji'     => $request->gaji,
        ]);

        return new GajiResource($gaji);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gaji $gaji)
    {
        $gaji->delete();

        return new GajiResource($gaji);
    }
}