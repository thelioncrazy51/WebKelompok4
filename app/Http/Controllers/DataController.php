<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class DataController extends Controller
{
    public function showData() {
        // Ambil semua data dari tabel (contoh: 'users')
        $data = DB::table('users')->select('*')->get(); 
        // atau jika pakai Eloquent Model:
        // $data = User::all();

        return view('pages.data', [
            'title' => 'Data'
        ], compact('data'));
    }
}