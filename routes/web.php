<?php

use App\Models\Cafe;
use App\Models\Favorite;
use App\Models\SearchHistory;
use App\Http\Controllers\RecommendationController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\SearchHistoryController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// HOME
// Tambahkan ini agar /dashboard dikenali oleh Laravel
Route::get('/dashboard', function () {
    return redirect('/'); // Mengarahkan user kembali ke halaman utama (home)
})->name('dashboard');

Route::get('/', function () {
    $search = request('search');

    if ($search && Auth::check()) {
        SearchHistory::create([
            'user_id' => Auth::id(),
            'keyword' => $search
        ]);
    }

    $cafes = Cafe::when($search, function ($query, $search) {
        return $query->where('name', 'like', "%{$search}%");
    })->get();

    $favCount = Auth::check()
        ? Favorite::where('user_id', Auth::id())->count()
        : 0;

    $historyCount = Auth::check()
        ? SearchHistory::where('user_id', Auth::id())->count()
        : 0;

    return view('home', compact('cafes', 'favCount', 'historyCount'));
});

// REKOMENDASI
Route::get('/rekomendasi', [RecommendationController::class, 'index'])->name('rekomendasi');
Route::post('/rekomendasi', [RecommendationController::class, 'calculate'])->name('rekomendasi.calculate');

// FAVORIT
Route::post('/favorit/toggle/{cafe_id}', [FavoriteController::class, 'toggle'])->name('favorit.toggle');
Route::get('/favorit', [FavoriteController::class, 'index'])->name('favorit.index');

// RIWAYAT
Route::get('/riwayat', [SearchHistoryController::class, 'index'])->name('riwayat.index');
Route::post('/riwayat/clear', [SearchHistoryController::class, 'clear'])->name('riwayat.clear');

// DETAIL CAFE (FIX UTAMA)
Route::get('/cafe/{id}', function ($id) {
    $cafe = Cafe::findOrFail($id);
    return view('show', compact('cafe'));
})->name('cafe.show');

Auth::routes();