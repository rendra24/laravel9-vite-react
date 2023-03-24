<?php

namespace App\Http\Controllers\Api;

use App\Models\Dinding;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\DindingResource;
use Illuminate\Support\Facades\Validator;

class DindingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dinding = Dinding::all();
        return DindingResource::collection($dinding);
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

        $dinding = Dinding::create([
            'nama'     => $request->nama,
        ]);

        return new DindingResource($dinding);
    }

    /**
     * Display the specified resource.
     */
    public function show(Dinding $dinding)
    {
        return new DindingResource($dinding);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dinding $dinding)
    {
        $validator = Validator::make($request->all(), [
            'nama'     => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $dinding->update([
            'nama'     => $request->nama,
        ]);

        return new DindingResource($dinding);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dinding $dinding)
    {
        $dinding->delete();

        return new DindingResource($dinding);
    }
}