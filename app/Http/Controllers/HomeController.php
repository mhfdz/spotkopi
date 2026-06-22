<?php

namespace App\Http\Controllers;

use App\Models\Cafe;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Memastikan hanya pengguna yang sudah login yang bisa mengakses rute ini
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Ambil data search jika ada input dari form pencarian
        $search = request('search');

        // Tarik data kafe dari database MySQL dengan filter pencarian jika ada
        $cafes = Cafe::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%")
                         ->orWhere('wifi', 'like', "%{$search}%")
                         ->orWhere('colokan', 'like', "%{$search}%")
                         ->orWhere('kebisingan', 'like', "%{$search}%");
        })->get();

        // Kembalikan ke halaman depan dengan membawa data $cafes
        return view('home', compact('cafes'));
    }
}