<?php

namespace App\Http\Controllers;

use App\Models\SearchHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SearchHistoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Menampilkan daftar riwayat
    public function index()
    {
        // Ambil riwayat terbaru dari user yang login
        $histories = SearchHistory::where('user_id', Auth::id())->latest()->get();
        return view('history.index', compact('histories'));
    }

    // Menghapus semua riwayat (Opsional, fitur tambahan yang rapi)
    public function clear()
    {
        SearchHistory::where('user_id', Auth::id())->delete();
        return back();
    }
}