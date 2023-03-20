<?php

namespace App\Http\Controllers\Api;

use App\Models\Aset;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\AsetResource;

class AsetsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response = Aset::get()->map(function($aset){
            return [
                'id' => $aset->id,
                'nama' => $aset->nama,
            ];
        });

        return new AsetResource(true, 'List Data Aset', $response);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'nama'     => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //upload image
        // $image = $request->file('image');
        // $image->storeAs('public/posts', $image->hashName());

        //create post
        $post = Aset::create([
            'nama'     => $request->nama,
        ]);

        //return response
        return new AsetResource(true, 'Data Aset Berhasil Ditambahkan!', $post);
    }

    /**
     * Display the specified resource.
     */
    public function show(Aset $aset)
    {
        return new AsetResource(true, 'Data Aset Ditemukan!', $aset);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Aset $aset)
    {

         //define validation rules
         $validator = Validator::make($request->all(), [
            'nama'     => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //check if image is not empty

            //upload image
            // $image = $request->file('image');
            // $image->storeAs('public/posts', $image->hashName());

            //delete old image
            // Storage::delete('public/posts/'.$post->image);

            //update post with new image
            $aset->update([
                // 'image'     => $image->hashName(),
                'nama'     => $request->nama,
            ]);


        //return response
        return new AsetResource(true, 'Data Aset Berhasil Diubah!', $aset);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Aset $aset)
    {
        $aset->delete();

        return new AsetResource(true, 'Data Aset Berhasil Dihapus!', null);
    }
}