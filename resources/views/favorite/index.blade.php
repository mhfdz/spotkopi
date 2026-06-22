@extends('layouts.app')

@section('content')
<div class="container mt-4" style="max-width: 1000px;">
    <div class="mb-4">
        <h2 class="fw-bold m-0" style="color: #111; letter-spacing: -0.5px;">Kafe Favorit Saya</h2>
        <p class="text-muted">Daftar tempat nugas yang sudah kamu tandai untuk dikunjungi kembali.</p>
    </div>

    @if($favorites->isEmpty())
        <div class="text-center text-muted py-5" style="background: #fff; border-radius: 8px; border: 1px dashed #ccc;">
            <div style="font-size: 40px; margin-bottom: 10px;">❤️</div>
            <p class="m-0">Belum ada kafe yang kamu tandai sebagai favorit.</p>
            <a href="{{ url('/') }}" class="btn btn-sm btn-dark mt-3 fw-bold">Eksplor Kafe</a>
        </div>
    @else
        <div class="row">
            @foreach($favorites as $fav)
                <div class="col-md-6 mb-3">
                    <div class="card border-0 shadow-sm rounded-3">
                        <div class="card-body d-flex justify-content-between align-items-center p-3">
                            <div>
                                <h5 class="fw-bold m-0" style="color: #111;">{{ $fav->cafe->name }}</h5>
                                <p class="text-muted m-0 small mt-1">Buka: {{ $fav->cafe->jam_operasional }}</p>
                            </div>
                            <div class="d-flex gap-2">
                                <a href="/cafe/{{ $fav->cafe_id }}" class="btn btn-sm btn-dark fw-bold">Detail</a>
                                <form action="{{ route('favorit.toggle', $fav->cafe_id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-outline-danger">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection