<?php

namespace App\Http\Controllers\Api;

use App\Models\Bantuan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\BantuanResource;
use Illuminate\Support\Facades\Validator;

class BantuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bantuan = Bantuan::all();
        return BantuanResource::collection($bantuan);
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

        $bantuan = Bantuan::create([
            'nama'     => $request->nama,
        ]);

        return new BantuanResource($bantuan);
    }

    /**
     * Display the specified resource.
     */
    public function show(Bantuan $bantuan)
    {
        return new BantuanResource($bantuan);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bantuan $bantuan)
    {
        $validator = Validator::make($request->all(), [
            'nama'     => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $bantuan->update([
            'nama'     => $request->nama,
        ]);

        return new BantuanResource($bantuan);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bantuan $bantuan)
    {
        $bantuan->delete();

        return new BantuanResource($bantuan);
    }
}