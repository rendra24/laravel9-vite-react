<?php

namespace App\Http\Controllers\Surat;

use Illuminate\Http\Request;
use App\Models\Surat\Kehilangan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\Surat\KehilanganResource;

class KehilanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $surat_kehilangan = Kehilangan::all();

        return KehilanganResource::collection($surat_kehilangan);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'desa_id'               => 'required',
            'keluarga_anggota_id'   => 'required',
            'nik'                   => 'required',
            'keterangan'            => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $kehilangan = Kehilangan::create([
            'nomor_surat'           => rand(),
            'desa_id'               => $request->desa_id,
            'keluarga_anggota_id'   => $request->keluarga_anggota_id,
            'nik'                   => $request->nik,
            'keterangan'            => $request->nik,
        ]);

        return new KehilanganResource($kehilangan);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}