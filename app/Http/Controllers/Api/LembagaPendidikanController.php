<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\LembagaPendidikan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\LembagaPendidikanResource;

class LembagaPendidikanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pendidikan = LembagaPendidikan::all();
        return LembagaPendidikanResource::collection($pendidikan);
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

        $lembaga_pendidikan = LembagaPendidikan::create([
            'nama'     => $request->nama,
        ]);

        return new LembagaPendidikanResource($lembaga_pendidikan);
    }

    /**
     * Display the specified resource.
     */
    public function show(LembagaPendidikan $lembagaPendidikan)
    {
        return new LembagaPendidikanResource($lembagaPendidikan);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LembagaPendidikan $lembagaPendidikan)
    {
        $validator = Validator::make($request->all(), [
            'nama'     => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $lembagaPendidikan->update([
            'nama'     => $request->nama,
        ]);

        return new LembagaPendidikanResource($lembagaPendidikan);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LembagaPendidikan $lembagaPendidikan)
    {
        $lembagaPendidikan->delete();

        return new LembagaPendidikanResource($lembagaPendidikan);
    }
}
