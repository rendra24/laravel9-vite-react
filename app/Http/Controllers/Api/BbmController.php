<?php

namespace App\Http\Controllers\Api;

use App\Models\Bbm;
use Illuminate\Http\Request;
use App\Http\Resources\BbmResource;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class BbmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bbm = Bbm::all();
        return BbmResource::collection($bbm);
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

        $bbm = Bbm::create([
            'nama'     => $request->nama,
        ]);

        return new BbmResource($bbm);
    }

    /**
     * Display the specified resource.
     */
    public function show(Bbm $bbm)
    {
        return new BbmResource($bbm);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bbm $bbm)
    {
        $validator = Validator::make($request->all(), [
            'nama'     => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $bbm->update([
            'nama'     => $request->nama,
        ]);

        return new BbmResource($bbm);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bbm $bbm)
    {
        $bbm->delete();

        return new BbmResource($bbm);
    }
}