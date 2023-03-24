<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\JenisSanitasi;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\JenisSanitasiResource;

class JenisSanitasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jenis_sanitasi = JenisSanitasi::all();
        return JenisSanitasiResource::collection($jenis_sanitasi);
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

        $bantuan = JenisSanitasi::create([
            'nama'     => $request->nama,
        ]);

        return new JenisSanitasiResource($bantuan);
    }

    /**
     * Display the specified resource.
     */
    public function show(JenisSanitasi $jenisSanitasi)
    {
        return new JenisSanitasiResource($jenisSanitasi);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JenisSanitasi $jenisSanitasi)
    {
        $validator = Validator::make($request->all(), [
            'nama'     => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $jenisSanitasi->update([
            'nama'     => $request->nama,
        ]);

        return new JenisSanitasiResource($jenisSanitasi);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JenisSanitasi $jenisSanitasi)
    {
        $jenisSanitasi->delete();

        return new JenisSanitasiResource($jenisSanitasi);
    }
}