<?php

namespace App\Http\Controllers;

use App\Models\Cafe;
use Illuminate\Http\Request;

class RecommendationController extends Controller
{
    public function index()
    {
        return view('recommendation.index', ['topCafes' => []]);
    }

    public function calculate(Request $request)
    {
        // Menangkap input dari form
        $w_wifi = $request->input('weight_wifi', 1);
        $w_colokan = $request->input('weight_outlets', 1);
        $w_harga = $request->input('weight_price', 1);
        $w_kebisingan = $request->input('weight_noise', 1);
        $w_ac = 1;

        $cafes = Cafe::all();
        if ($cafes->isEmpty()) return back();

        $matrix = [];
        // 1. Transformasi data
        foreach ($cafes as $cafe) {
            $c1 = stripos($cafe->wifi_quality, 'kencang') !== false ? 3 : (stripos($cafe->wifi_quality, 'sedang') !== false ? 2 : 1);
            $c2 = stripos($cafe->power_outlets, 'banyak') !== false ? 3 : (stripos($cafe->power_outlets, 'cukup') !== false ? 2 : 1);
            $c3 = stripos($cafe->noise_level, 'sunyi') !== false ? 3 : (stripos($cafe->noise_level, 'sedang') !== false ? 2 : 1);
            $c4 = $cafe->air_conditioner ? 1 : 0;
            $c5 = $cafe->price_min;

            $matrix[] = ['cafe' => $cafe, 'c1' => $c1, 'c2' => $c2, 'c3' => $c3, 'c4' => $c4, 'c5' => $c5];
        }

        // 2. Normalisasi
        $max_c1 = max(array_column($matrix, 'c1')) ?: 1;
        $max_c2 = max(array_column($matrix, 'c2')) ?: 1;
        $max_c3 = max(array_column($matrix, 'c3')) ?: 1;
        $max_c4 = max(array_column($matrix, 'c4')) ?: 1;
        $min_c5 = min(array_column($matrix, 'c5')) ?: 1;

        $results = [];
        $total_bobot = $w_wifi + $w_colokan + $w_kebisingan + $w_ac + $w_harga;

        foreach ($matrix as $row) {
            $n_c1 = $row['c1'] / $max_c1;
            $n_c2 = $row['c2'] / $max_c2;
            $n_c3 = $row['c3'] / $max_c3;
            $n_c4 = $row['c4'] / $max_c4;
            $n_c5 = $row['c5'] == 0 ? 0 : ($min_c5 / $row['c5']);

            $skor = ($n_c1 * $w_wifi) + ($n_c2 * $w_colokan) + ($n_c3 * $w_kebisingan) + ($n_c4 * $w_ac) + ($n_c5 * $w_harga);
            $skor_100 = ($skor / $total_bobot) * 100;

            $row['cafe']->skor = round($skor_100, 1);
            $results[] = $row['cafe'];
        }

        // 3. Pengurutan dengan Tie-Breaker (Jika skor sama, urutkan berdasarkan Nama)
        usort($results, function($a, $b) {
            // Jika skor beda, urutkan dari skor tertinggi
            if ($b->skor != $a->skor) {
                return $b->skor <=> $a->skor;
            }
            // Jika skor sama (Tie), urutkan berdasarkan nama (A-Z)
            return strcmp($a->name, $b->name);
        });

        $topCafes = array_slice($results, 0, 5);

        return view('recommendation.index', compact('topCafes'));
    }
}