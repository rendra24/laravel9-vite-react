<?php

namespace App\Http\Controllers\Api;

use App\Models\Penerangan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\PeneranganResource;

class PeneranganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penerangan = Penerangan::all();
        return PeneranganResource::collection($penerangan);
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

        $penerangan = Penerangan::create([
            'nama'     => $request->nama,
        ]);

        return new PeneranganResource($penerangan);
    }

    /**
     * Display the specified resource.
     */
    public function show(Penerangan $penerangan)
    {
        return new PeneranganResource($penerangan);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Penerangan $penerangan)
    {
        $validator = Validator::make($request->all(), [
            'nama'     => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $penerangan->update([
            'nama'     => $request->nama,
        ]);

        return new PeneranganResource($penerangan);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penerangan $penerangan)
    {
        $penerangan->delete();

        return new PeneranganResource($penerangan);
    }
}