<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HarvestController extends Controller
{
    /**
     * Menampilkan halaman prediksi panen
     */
    public function prediction()
    {
        return view('harvest.prediction', [
            'title' => 'Prediksi Panen',
            'user' => Auth::user()
        ]);
    }
}
