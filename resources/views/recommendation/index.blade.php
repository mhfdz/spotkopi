@extends('layouts.app')

@section('content')
<div class="container mt-4" style="max-width: 900px;">
    <div class="mb-4 text-center">
        <h2 class="fw-bold">Rekomendasi Cerdas (SAW)</h2>
    </div>

    <div class="card border-0 shadow-sm p-4 mb-5">
        <form action="{{ route('rekomendasi.calculate') }}" method="POST">
            @csrf
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="fw-bold">Prioritas WiFi</label>
                    <select name="weight_wifi" class="form-select">
                        <option value="5">Sangat Penting</option>
                        <option value="3">Penting</option>
                        <option value="1">Biasa Saja</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="fw-bold">Prioritas Colokan</label>
                    <select name="weight_outlets" class="form-select">
                        <option value="5">Sangat Penting</option>
                        <option value="3">Penting</option>
                        <option value="1">Biasa Saja</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="fw-bold">Prioritas Harga</label>
                    <select name="weight_price" class="form-select">
                        <option value="5">Sangat Penting</option>
                        <option value="3">Penting</option>
                        <option value="1">Biasa Saja</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="fw-bold">Prioritas Kebisingan</label>
                    <select name="weight_noise" class="form-select">
                        <option value="5">Sangat Penting</option>
                        <option value="3">Penting</option>
                        <option value="1">Biasa Saja</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-dark mt-3 w-100">Hitung Rekomendasi</button>
        </form>
    </div>

    @if(isset($topCafes) && count($topCafes) > 0)
        <h4>Hasil Perankingan:</h4>
        <ul class="list-group">
            @foreach($topCafes as $cafe)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <a href="{{ url('/cafe/' . $cafe->id) }}" class="text-decoration-none">
                            <strong style="color: #0d6efd;">{{ $cafe->name }}</strong>
                        </a>
                        <br>
                        <small class="text-muted">Buka {{ $cafe->operating_hours }}</small>
                    </div>
                    <span class="badge bg-primary fs-6">Skor: {{ $cafe->skor }}</span>
                </li>
            @endforeach
        </ul>
    @else
        <p class="text-center text-muted">Belum ada hasil, silakan klik tombol Hitung.</p>
    @endif
</div>
@endsection