@extends('layouts.app')

@section('content')
<div class="container mt-4" style="max-width: 800px;">
    <!-- Tombol Kembali -->
    <div class="mb-4">
        <a href="/" class="text-decoration-none text-dark fw-semibold d-inline-flex align-items-center gap-2" style="font-size: 14px;">
            ← Kembali ke Dashboard
        </a>
    </div>

    <!-- Blok Utama Detail Kafe -->
    <div class="card border-0 shadow-sm p-4 mb-4" style="background: #fff; border-radius: 12px;">
        <div class="d-flex justify-content-between align-items-start border-bottom pb-3 mb-4">
            <div>
                <h1 class="fw-bold m-0" style="letter-spacing: -1px; color: #111;">{{ $cafe->name }}</h1>
                <p class="text-muted m-0 mt-1">📍 Semarang, Jawa Tengah</p>
            </div>
            <span class="badge bg-dark px-3 py-2 fs-6" style="border-radius: 6px;">
                Mulai Rp{{ number_format($cafe->price_min, 0, ',', '.') }}
            </span>
        </div>

        <!-- Grid Informasi -->
        <div class="row g-4">
            <!-- Kolom Kiri: Fasilitas Utama -->
            <div class="col-md-7">
                <h5 class="fw-bold mb-3" style="color: #111;">Kondisi & Fasilitas Tempat</h5>
                
                <div class="list-group list-group-flush">
                    <div class="list-group-item d-flex justify-content-between align-items-center px-0 py-3">
                        <span class="text-muted">❄️ Air Conditioner (AC)</span>
                        <span class="fw-semibold">{{ $cafe->air_conditioner ? 'Tersedia (Dingin)' : 'Tidak Ada / Area Terbuka' }}</span>
                    </div>
                    <div class="list-group-item d-flex justify-content-between align-items-center px-0 py-3">
                        <span class="text-muted">🌐 Kualitas WiFi</span>
                        <span class="badge {{ str_contains(strtolower($cafe->wifi_quality), 'kencang') ? 'bg-success' : 'bg-secondary' }} px-3 py-2">
                            {{ $cafe->wifi_quality }}
                        </span>
                    </div>
                    <div class="list-group-item d-flex justify-content-between align-items-center px-0 py-3">
                        <span class="text-muted">🔌 Sumber Kontak (Colokan)</span>
                        <span class="fw-semibold">{{ $cafe->power_outlets }}</span>
                    </div>
                    <div class="list-group-item d-flex justify-content-between align-items-center px-0 py-3">
                        <span class="text-muted">🔊 Tingkat Kebisingan</span>
                        <span class="fw-semibold text-capitalize">{{ $cafe->noise_level }}</span>
                    </div>
                </div>
            </div>

            <!-- Kolom Kanan: Jam Operasional & Catatan -->
            <div class="col-md-5">
                <div class="p-3 style-panel" style="background: #fafafa; border-radius: 8px; border: 1px solid #eaeaea;">
                    <h6 class="fw-bold mb-3" style="color: #111;">🕒 Jam Operasional</h6>
                    <p class="m-0 text-muted" style="font-size: 14px; line-height: 1.6;">
                        Setiap Hari<br>
                        <span class="fw-bold text-dark" style="font-size: 16px;">{{ $cafe->operating_hours }}</span>
                    </p>
                    
                    <hr class="my-3" style="border-color: #eaeaea;">

                    <h6 class="fw-bold mb-2" style="color: #111;">💡 Tips Nugas</h6>
                    <p class="m-0 text-muted" style="font-size: 13px; line-height: 1.5;">
                        @if(str_contains(strtolower($cafe->noise_level), 'sepi') || str_contains(strtolower($cafe->noise_level), 'tenang'))
                            Cocok untuk pengerjaan tugas yang butuh konsentrasi tinggi atau *coding* serius.
                        @else
                            Lebih disarankan untuk diskusi kelompok atau kerja santai sambil ngobrol.
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection