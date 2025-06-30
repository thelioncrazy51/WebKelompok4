<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataController extends Controller
{
    public function showData() {
        $data = DB::table('users')->get()->map(function($user) {
            // Tambahkan kolom password_plain hanya jika password ada
            if (isset($user->password)) {
                $user->password_plain = '***HASHED***'; // Default value
                // Jika benar-benar perlu, bisa ditambahkan logika khusus
            }
            return $user;
        });

        return view('pages.data', [
            'title' => 'Data'
        ], compact('data'));
    }
}
