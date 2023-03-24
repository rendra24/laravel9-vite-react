<?php

namespace App\Http\Controllers\Api;

use App\Models\AirMinum;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\AirMinumResource;
use Illuminate\Support\Facades\Validator;

class AirMinumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $airMinum = AirMinum::all();
        return AirMinumResource::collection($airMinum);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama'     => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $airMinum = AirMinum::create([
            'nama'     => $request->nama,
        ]);

        return new AirMinumResource($airMinum);
    }

    /**
     * Display the specified resource.
     */
    public function show(AirMinum $airMinum)
    {
        return new AirMinumResource($airMinum);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AirMinum $airMinum)
    {
        $validator = Validator::make($request->all(), [
            'nama'     => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $airMinum->update([
            'nama'     => $request->nama,
        ]);

        return new AirMinumResource($airMinum);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AirMinum $airMinum)
    {
        $airMinum->delete();

        return new AirMinumResource($airMinum);
    }
}