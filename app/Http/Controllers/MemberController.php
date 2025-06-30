<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    /**
     * Menampilkan dashboard member
     */
    public function dashboard()
    {
        return view('member.dashboard', [
            'title' => 'Dashboard Member',
            'user' => Auth::user()
        ]);
    }

    /**
     * Menampilkan halaman prediksi panen
     */
    public function harvestPrediction()
    {
        return view('member.harvest-prediction', [
            'title' => 'Prediksi Panen',
            'user' => Auth::user()
        ]);
    }

    /**
     * Menampilkan halaman produk
     */
    public function products()
    {
        return view('member.products', [
            'title' => 'Produk',
            'user' => Auth::user()
        ]);
    }
}
