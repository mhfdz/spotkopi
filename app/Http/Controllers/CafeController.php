<?php

namespace App\Http\Controllers;

use App\Models\Cafe;
use Illuminate\Http\Request;

class CafeController extends Controller
{
    public function show($id)
{
    $cafe = \App\Models\Cafe::findOrFail($id);
    return view('show', compact('cafe'));
}
    public function index()
    {
        // Mengambil seluruh data kafe dari database
        $cafes = Cafe::all();

        // Mengirim data tersebut ke file tampilan web yang akan kita buat bernama 'home'
        return view('home', compact('cafes'));
    }
}