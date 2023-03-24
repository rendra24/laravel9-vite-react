<?php

namespace App\Http\Controllers\Api;

use App\Models\Lantai;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\LantaiResource;
use Illuminate\Support\Facades\Validator;

class LantaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lantai = Lantai::all();
        return LantaiResource::collection($lantai);
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

        $bantuan = Lantai::create([
            'nama'     => $request->nama,
        ]);

        return new LantaiResource($bantuan);
    }

    /**
     * Display the specified resource.
     */
    public function show(Lantai $lantai)
    {
        return new LantaiResource($lantai);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lantai $lantai)
    {
        $validator = Validator::make($request->all(), [
            'nama'     => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $lantai->update([
            'nama'     => $request->nama,
        ]);

        return new LantaiResource($lantai);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lantai $lantai)
    {
        $lantai->delete();

        return new LantaiResource($lantai);
    }
}