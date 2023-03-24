<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\LembagaEkonomi;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\LembagaEkonomiResource;

class LembagaEkonimiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lembagaEkonomi = LembagaEkonomi::all();
        return LembagaEkonomiResource::collection($lembagaEkonomi);
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

        $lembagaEkonomi = LembagaEkonomi::create([
            'nama'     => $request->nama,
        ]);

        return new LembagaEkonomiResource($lembagaEkonomi);
    }

    /**
     * Display the specified resource.
     */
    public function show(LembagaEkonomi $lembagaEkonomi)
    {
        return new LembagaEkonomiResource($lembagaEkonomi);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LembagaEkonomi $lembagaEkonomi)
    {
        $validator = Validator::make($request->all(), [
            'nama'     => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $lembagaEkonomi->update([
            'nama'     => $request->nama,
        ]);

        return new LembagaEkonomiResource($lembagaEkonomi);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LembagaEkonomi $lembagaEkonomi)
    {
        $lembagaEkonomi->delete();

        return new LembagaEkonomiResource($lembagaEkonomi);
    }
}