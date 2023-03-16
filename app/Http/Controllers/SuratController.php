<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SuratController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {

        $surat = Surat::latest()->get();

        return Inertia::render('Master/Surat/List', [
            'surat' => $surat
        ]);
    }
}