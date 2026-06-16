<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SpotKopi - Direktori Tempat Nugas</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        body { 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
            background-color: #fafafa; 
            color: #333; 
        }
        .search-container {
            max-width: 1000px;
            margin: 30px auto 10px auto;
        }
        .search-form {
            display: flex;
            gap: 10px;
        }
        .search-input {
            flex-grow: 1;
            padding: 12px 16px;
            border: 1px solid #eaeaea;
            border-radius: 6px;
            font-size: 14px;
            outline: none;
        }
        .search-btn { background: #111; color: #fff; font-weight: 600; border-radius: 6px; padding: 12px 24px; border: none; }
        .search-btn:hover { background: #333; color: #fff; }
        .reset-btn { background: #f0f0f0; color: #666; font-weight: 600; border-radius: 6px; padding: 12px 24px; text-decoration: none; display: inline-flex; align-items: center; }
        .reset-btn:hover { background: #e0e0e0; color: #333; }

        .main-container { 
            max-width: 1000px; 
            margin: 20px auto 50px auto; 
        }
        .stats-panel {
            background: #fff;
            border: 1px solid #eaeaea;
            border-radius: 8px;
            padding: 15px 20px;
            margin-bottom: 30px;
        }
        .stat-item {
            font-size: 14px;
            color: #555;
        }
        .stat-value {
            font-weight: bold;
            color: #111;
        }
        .grid { 
            display: grid; 
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); 
            gap: 20px; 
        }
        .card-cafe { 
            background-color: #fff; 
            border: 1px solid #eaeaea; 
            border-radius: 8px; 
            padding: 24px; 
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .card-cafe h2 { margin-top: 0; font-size: 18px; color: #111; margin-bottom: 12px; padding-right: 30px; }
        .card-cafe p { font-size: 14px; color: #555; margin: 8px 0; line-height: 1.6; }
        
        .btn-detail { 
            display: inline-block; 
            margin-top: 16px; 
            padding: 8px 16px; 
            background-color: #111; 
            color: #fff; 
            text-decoration: none; 
            border-radius: 4px; 
            font-size: 13px; 
            font-weight: bold;
            text-align: center;
        }
        .btn-detail:hover { background-color: #333; color: #fff; }

        .favorite-btn {
            position: absolute;
            top: 20px;
            right: 20px;
            font-size: 22px;
            background: none;
            border: none;
            cursor: pointer;
            padding: 0;
            line-height: 1;
            transition: transform 0.1s ease;
        }
        .favorite-btn:hover {
            transform: scale(1.1);
        }
        .badge-container {
            margin: 10px 0;
            display: flex;
            flex-wrap: wrap;
            gap: 5px;
        }
    </style>
</head>
<body>

<!-- Mengikutkan Navbar Utama -->
@include('layouts.app')

<div class="container search-container">
    <form action="/" method="GET" class="search-form">
        <input type="text" name="search" class="search-input" placeholder="Cari nama kafe atau fasilitas (cth: AC, Kencang)..." value="{{ request('search') }}">
        <button type="submit" class="btn search-btn">Cari</button>
        <a href="/" class="reset-btn">Reset</a>
    </form>
</div>

<div class="container main-container">
    
    <!-- Dashboard Summary Panel (Data Terupdate Otomatis) -->
    <div class="stats-panel shadow-sm">
        <div class="row text-center shadow-none m-0">
            <div class="col-md-4 border-end py-2">
                <div class="stat-item">☕ Total Cafe</div>
                <div class="stat-value fs-5">{{ $cafes->count() }}</div>
            </div>
            <div class="col-md-4 border-end py-2">
                <div class="stat-item">⭐ Favorit Saya</div>
                <div class="stat-value fs-5">{{ $favCount }}</div>
            </div>
            <div class="col-md-4 py-2">
                <div class="stat-item">🕒 Riwayat Cari</div>
                <!-- BAGIAN INI YANG DIUBAH -->
                <div class="stat-value fs-5">{{ $historyCount }}</div>
            </div>
        </div>
    </div>

    <!-- Grid Daftar Cafe -->
    <div class="grid">
        @forelse($cafes as $cafe)
        <div class="card-cafe shadow-sm">
            
            <!-- Tombol Favorit Interaktif (Form Submit) -->
            @auth
                <form action="{{ route('favorit.toggle', $cafe->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="favorite-btn" style="color: {{ in_array($cafe->id, $myFavorites) ? '#dc3545' : '#ccc' }};" title="{{ in_array($cafe->id, $myFavorites) ? 'Hapus dari Favorit' : 'Tambah ke Favorit' }}">
                        {{ in_array($cafe->id, $myFavorites) ? '♥' : '♡' }}
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" class="favorite-btn" style="color: #ccc; text-decoration: none;" title="Login untuk memfavoritkan">♡</a>
            @endauth

            <div>
                <h2>{{ $cafe->name }}</h2>
                
                <div class="badge-container">
                    @if($cafe->air_conditioner)
                        <span class="badge bg-primary">AC</span>
                    @endif
                    
                    @if(str_contains(strtolower($cafe->wifi_quality), 'kencang'))
                        <span class="badge bg-success">WiFi Kencang</span>
                    @else
                        <span class="badge bg-secondary">WiFi {{ $cafe->wifi_quality }}</span>
                    @endif

                    @if(str_contains(strtolower($cafe->power_outlets), 'banyak'))
                        <span class="badge bg-warning text-dark">Colokan Banyak</span>
                    @else
                        <span class="badge bg-light text-dark">Colokan Terbatas</span>
                    @endif

                    <span class="badge bg-info text-dark">Kebisingan: {{ $cafe->noise_level }}</span>
                </div>

                <p class="mt-3"><strong>Info Operasional:</strong><br> 
                    Buka {{ $cafe->operating_hours }} <br>
                    Mulai Rp{{ number_format($cafe->price_min, 0, ',', '.') }}
                </p>
            </div>
            
            <a href="/cafe/{{ $cafe->id }}" class="btn-detail">Lihat Detail</a>
        </div>
        @empty
        <div style="grid-column: 1/-1; text-align: center; color: #888; padding: 40px 0;">
            Kafe atau fasilitas yang kamu cari tidak ditemukan.
        </div>
        @endforelse
    </div>
</div>

</body>
</html>