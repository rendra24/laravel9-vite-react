<?php

namespace App\Http\Controllers\Api;

use App\Models\Pemasaran;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PemasaranResource;
use Illuminate\Support\Facades\Validator;

class PemasaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pemasaran = Pemasaran::all();
        return PemasaranResource::collection($pemasaran);
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

        $bantuan = Pemasaran::create([
            'nama'     => $request->nama,
        ]);

        return new PemasaranResource($bantuan);
    }

    /**
     * Display the specified resource.
     */
    public function show(Pemasaran $pemasaran)
    {
        return new PemasaranResource($pemasaran);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pemasaran $pemasaran)
    {
        $validator = Validator::make($request->all(), [
            'nama'     => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $pemasaran->update([
            'nama'     => $request->nama,
        ]);

        return new PemasaranResource($pemasaran);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pemasaran $pemasaran)
    {
        $pemasaran->delete();

        return new PemasaranResource($pemasaran);
    }
}