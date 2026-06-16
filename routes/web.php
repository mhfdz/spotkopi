<?php

use App\Models\Cafe;
use App\Models\Favorite;
use App\Models\SearchHistory;
use App\Http\Controllers\RecommendationController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\SearchHistoryController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Route Halaman Utama
Route::get('/', function () {
    $search = request('search');
    if ($search && Auth::check()) {
        SearchHistory::create(['user_id' => Auth::id(), 'keyword' => $search]);
    }
    $cafes = Cafe::when($search, function ($query, $search) {
        return $query->where('name', 'like', "%{$search}%");
    })->get();
    
    $favCount = Auth::check() ? Favorite::where('user_id', Auth::id())->count() : 0;
    $myFavorites = Auth::check() ? Favorite::where('user_id', Auth::id())->pluck('cafe_id')->toArray() : [];
    $historyCount = Auth::check() ? SearchHistory::where('user_id', Auth::id())->count() : 0;

    return view('home', compact('cafes', 'favCount', 'myFavorites', 'historyCount'));
});

// Route Rekomendasi
Route::get('/rekomendasi', [RecommendationController::class, 'index'])->name('rekomendasi');
Route::post('/rekomendasi', [RecommendationController::class, 'calculate'])->name('rekomendasi.calculate');

// Route Favorit
Route::post('/favorit/toggle/{cafe_id}', [FavoriteController::class, 'toggle'])->name('favorit.toggle');
Route::get('/favorit', [FavoriteController::class, 'index'])->name('favorit.index');

// Route Riwayat
Route::get('/riwayat', [SearchHistoryController::class, 'index'])->name('riwayat.index');
Route::post('/riwayat/clear', [SearchHistoryController::class, 'clear'])->name('riwayat.clear');

// Route Detail
Route::get('/cafe/{id}', function ($id) {
    $cafe = Cafe::findOrFail($id); 
    return view('show', compact('cafe')); 
});

Auth::routes();