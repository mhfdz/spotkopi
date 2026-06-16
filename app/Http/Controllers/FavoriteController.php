<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function __construct()
    {
        // Memastikan fitur ini hanya bisa diakses user yang sudah login
        $this->middleware('auth');
    }

    // Fungsi klik ikon hati (Jika belum ada -> tambah, jika sudah ada -> hapus)
    public function toggle($cafe_id)
    {
        $user_id = Auth::id();

        $existing = Favorite::where('user_id', $user_id)->where('cafe_id', $cafe_id)->first();

        if ($existing) {
            $existing->delete();
        } else {
            Favorite::create([
                'user_id' => $user_id,
                'cafe_id' => $cafe_id
            ]);
        }

        return back();
    }

    // Menampilkan halaman daftar kafe favorit saya
    public function index()
    {
        $favorites = Favorite::where('user_id', Auth::id())->with('cafe')->get();
        return view('favorite.index', compact('favorites'));
    }
}